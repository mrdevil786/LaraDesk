! function ($) {
    "use strict";
    var instances = [],
        defaultOptions = {
            precision: 100,
            elapse: false,
            defer: false
        };

    /* 
     * Countdown Timer Class Definition
     */
    var Countdown = function (el, finalDate, options) {
        this.el = el;
        this.$el = $(el);
        this.interval = null;
        this.offset = {};
        this.options = $.extend({}, defaultOptions);
        this.instanceNumber = instances.length;
        instances.push(this);
        this.$el.data("countdown-instance", this.instanceNumber);
        if (options) {
            if (typeof options === "function") {
                this.$el.on("update.countdown", options);
                this.$el.on("stoped.countdown", options);
                this.$el.on("finish.countdown", options);
            } else {
                this.options = $.extend({}, defaultOptions, options);
            }
        }
        this.setFinalDate(finalDate);
        if (this.options.defer === false) {
            this.start();
        }
    };

    /* 
     * Countdown Timer Methods
     */
    Countdown.prototype.start = function () {
        if (this.interval !== null) {
            clearInterval(this.interval);
        }
        var self = this;
        this.update();
        this.interval = setInterval(function () {
            self.update.call(self);
        }, this.options.precision);
    }

    Countdown.prototype.stop = function () {
        clearInterval(this.interval);
        this.interval = null;
        this.dispatchEvent("stoped");
    }

    Countdown.prototype.toggle = function () {
        if (this.interval) {
            this.stop();
        } else {
            this.start();
        }
    }

    Countdown.prototype.pause = function () {
        this.stop();
    }

    Countdown.prototype.resume = function () {
        this.start();
    }

    Countdown.prototype.remove = function () {
        this.stop.call(this);
        instances[this.instanceNumber] = null;
        delete this.$el.data().countdownInstance;
    }

    Countdown.prototype.setFinalDate = function (value) {
        this.finalDate = parseDateString(value);
    }

    Countdown.prototype.update = function () {
        if (this.$el.closest("html").length === 0) {
            this.remove();
            return;
        }
        var hasEventsAttached = $._data(this.el, "events") !== undefined,
            now = new Date(),
            newTotalSecsLeft;
        newTotalSecsLeft = this.finalDate.getTime() - now.getTime();
        newTotalSecsLeft = Math.ceil(newTotalSecsLeft / 1e3);
        newTotalSecsLeft = !this.options.elapse && newTotalSecsLeft < 0 ? 0 : Math.abs(newTotalSecsLeft);
        if (this.totalSecsLeft === newTotalSecsLeft || !hasEventsAttached) {
            return;
        } else {
            this.totalSecsLeft = newTotalSecsLeft;
        }
        this.elapsed = now >= this.finalDate;
        this.offset = {
            seconds: this.totalSecsLeft % 60,
            minutes: Math.floor(this.totalSecsLeft / 60) % 60,
            hours: Math.floor(this.totalSecsLeft / 60 / 60) % 24,
            days: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
            daysToWeek: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
            daysToMonth: Math.floor(this.totalSecsLeft / 60 / 60 / 24 % 30.4368),
            weeks: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 7),
            weeksToMonth: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 7) % 4,
            months: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 30.4368),
            years: Math.abs(this.finalDate.getFullYear() - now.getFullYear()),
            totalDays: Math.floor(this.totalSecsLeft / 60 / 60 / 24),
            totalHours: Math.floor(this.totalSecsLeft / 60 / 60),
            totalMinutes: Math.floor(this.totalSecsLeft / 60),
            totalSeconds: this.totalSecsLeft
        };
        if (!this.options.elapse && this.totalSecsLeft === 0) {
            this.stop();
            this.dispatchEvent("finish");
        } else {
            this.dispatchEvent("update");
        }
    }

    Countdown.prototype.dispatchEvent = function (eventName) {
        var event = $.Event(eventName + ".countdown");
        event.finalDate = this.finalDate;
        event.elapsed = this.elapsed;
        event.offset = $.extend({}, this.offset);
        event.strftime = strftime(this.offset);
        this.$el.trigger(event);
    }


    /* 
     * Utility Functions
     */
    function parseDateString(dateString) {
        if (dateString instanceof Date) {
            return dateString;
        } else {
            throw new Error("Couldn't cast `" + dateString + "` to a date object.");
        }
    }

    function escapedRegExp(str) {
        var sanitize = str.toString().replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
        return new RegExp(sanitize);
    }

    function strftime(offsetObject) {
        var DIRECTIVE_KEY_MAP = {
            Y: "years",
            m: "months",
            n: "daysToMonth",
            d: "daysToWeek",
            w: "weeks",
            W: "weeksToMonth",
            H: "hours",
            M: "minutes",
            S: "seconds",
            D: "totalDays",
            I: "totalHours",
            N: "totalMinutes",
            T: "totalSeconds"
        };
        return function (format) {
            var directives = format.match(/%(-|!)?[A-Z]{1}(:[^;]+;)?/gi);
            if (directives) {
                for (var i = 0, len = directives.length; i < len; ++i) {
                    var directive = directives[i].match(/%(-|!)?([a-zA-Z]{1})(:[^;]+;)?/),
                        regexp = escapedRegExp(directive[0]),
                        modifier = directive[1] || "",
                        plural = directive[3] || "",
                        value = null;
                    directive = directive[2];
                    if (DIRECTIVE_KEY_MAP.hasOwnProperty(directive)) {
                        value = DIRECTIVE_KEY_MAP[directive];
                        value = Number(offsetObject[value]);
                    }
                    if (value !== null) {
                        if (modifier === "!") {
                            value = pluralize(plural, value);
                        }
                        if (modifier === "") {
                            if (value < 10) {
                                value = "0" + value.toString();
                            }
                        }
                        format = format.replace(regexp, value.toString());
                    }
                }
            }
            format = format.replace(/%%/, "%");
            return format;
        };
    }

    function pluralize(format, count) {
        var plural = "s",
            singular = "";
        if (format) {
            format = format.replace(/(:|;|\s)/gi, "").split(/\,/);
            if (format.length === 1) {
                plural = format[0];
            } else {
                singular = format[0];
                plural = format[1];
            }
        }
        if (Math.abs(count) > 1) {
            return plural;
        } else {
            return singular;
        }
    }

    /* 
     * Countdown Timer Plugin Definition
     */
    $.fn.countdown = function () {
        var argumentsArray = Array.prototype.slice.call(arguments, 0);
        return this.each(function () {
            var instanceNumber = $(this).data("countdown-instance");
            if (instanceNumber !== undefined) {
                var instance = instances[instanceNumber],
                    method = argumentsArray[0];
                if (Countdown.prototype.hasOwnProperty(method)) {
                    instance[method].apply(instance, argumentsArray.slice(1));
                } else if (String(method).match(/^[$A-Z_][0-9A-Z_$]*$/i) === null) {
                    instance.setFinalDate.call(instance, method);
                    instance.start();
                } else {
                    $.error("Method %s does not exist on jQuery.countdown".replace(/\%s/gi, method));
                }
            } else {
                new Countdown(this, argumentsArray[0], argumentsArray[1]);
            }
        });
    };
}(window.jQuery);