(function ($) {
    "use strict";

    // PAGE LOADING
    $(window).on("load", function (e) {
        $("#global-loader").fadeOut("slow");
    })

    // COLOR THEME
    $(document).on("click", "a[data-theme]", function () {
        $("head link#theme").attr("href", $(this).data("theme"));
        $(this).toggleClass('active').siblings().removeClass('active');
    });

    // FULL SCREEN
    $(document).on("click", ".fullscreen-button", function toggleFullScreen() {
        $('.fullscreen-button').addClass('fullscreen-button');
        if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
            if (document.documentElement.requestFullScreen) {
                document.documentElement.requestFullScreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullScreen) {
                document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            }
        } else {
            $('html').removeClass('fullscreen-button');
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
    })

    // BACK TO TOP BUTTON
    $(window).on("scroll", function (e) {
        if ($(this).scrollTop() > 0) {
            $('#back-to-top').fadeIn('slow');
        } else {
            $('#back-to-top').fadeOut('slow');
        }
    });
    $(document).on("click", "#back-to-top", function (e) {
        $("html, body").animate({
            scrollTop: 0
        }, 0);
        return false;
    });


    // COVER IMAGE
    $(".cover-image").each(function () {
        var attr = $(this).attr('data-bs-image-src');
        if (typeof attr !== typeof undefined && attr !== false) {
            $(this).css('background', 'url(' + attr + ') center center');
        }
    });

    // QUANTITY CART INCREASE AND DECREASE
    $('.add').on('click', function () {
        var $qty = $(this).closest('div').find('.qty');
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal)) {
            $qty.val(currentVal + 1);
        }
    });
    $('.minus').on('click', function () {
        var $qty = $(this).closest('div').find('.qty');
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal) && currentVal > 0) {
            $qty.val(currentVal - 1);
        }
    });

    // CHART CIRCLE
    if ($('.chart-circle').length) {
        $('.chart-circle').each(function () {
            let $this = $(this);
            $this.circleProgress({
                fill: {
                    color: $this.attr('data-bs-color')
                },
                size: $this.height(),
                startAngle: -Math.PI / 4 * 2,
                emptyFill: '#edf0f5',
                lineCap: 'round'
            });
        });
    }

    // MODAL
    // SHOWING MODAL WITH EFFECT
    $('.modal-effect').on('click', function (e) {
        e.preventDefault();
        var effect = $(this).attr('data-bs-effect');
        $('#modaldemo8').addClass(effect);
    });

    // HIDE MODAL WITH EFFECT
    $('#modaldemo8').on('hidden.bs.modal', function (e) {
        $(this).removeClass(function (index, className) {
            return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
        });
    });

    // CARD
    const DIV_CARD = 'div.card';

    // TOOLTIP
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    // POPOVER
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })

    // BY DEFAULT, BOOTSTRAP DOESN'T AUTO CLOSE POPOVER AFTER APPEARING IN THE PAGE 
    $(document).on('click', function (e) {
        $('[data-toggle="popover"],[data-original-title]').each(function () {
            //the 'is' for buttons that trigger popups
            //the 'has' for icons within a button that triggers a popup
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                (($(this).popover('hide').data('bs.popover') || {}).inState || {}).click = false // fix for BS 3.3.6
            }

        });
    });

    // TOAST
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    var toastList = toastElList.map(function (toastEl) {
        return new bootstrap.Toast(toastEl)
    })
    $(document).on("click", '#liveToastBtn', function () {
        $('.toast').toast('show');
    })

    //  FUNCTION FOR REMOVE CARD
    $(document).on('click', '[data-bs-toggle="card-remove"]', function (e) {
        let $card = $(this).closest(DIV_CARD);
        $card.remove();
        e.preventDefault();
        return false;
    });


    // FUNCTIONS FOR COLLAPSED CARD
    $(document).on('click', '[data-bs-toggle="card-collapse"]', function (e) {
        let $card = $(this).closest(DIV_CARD);
        $card.toggleClass('card-collapsed');
        e.preventDefault();
        return false;
    });

    // CARD FULL SCREEN
    $(document).on('click', '[data-bs-toggle="card-fullscreen"]', function (e) {
        let $card = $(this).closest(DIV_CARD);
        $card.toggleClass('card-fullscreen').removeClass('card-collapsed');
        e.preventDefault();
        return false;
    });


    // INPUT FILE BROWSER
    $(document).on('change', '.file-browserinput', function () {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    }); // We can watch for our custom `fileselect` event like this

    // FILE UPLOAD
    $('.file-browserinput').on('fileselect', function (event, numFiles, label) {
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        if (input.length) {
            input.val(log);
        } else {
            if (log) alert(log);
        }
    });

    // ACCORDION STYLE
    $(document).on("click", '[data-bs-toggle="collapse"]', function () {
        $(this).toggleClass('active').siblings().removeClass('active');
    });

    // EMAIL INBOX
    $(".clickable-row").on('click', function () {
        window.location = $(this).data("href");
    });



    // ______________ SWITCHER-toggle ______________//

	$('.layout-setting').on("click", function(e) {
		if (!(document.querySelector('body').classList.contains('dark-mode'))) {
			$('body').addClass('dark-mode');
			$('body').removeClass('light-mode');
			$('body').removeClass('transparent-mode');

			localStorage.setItem('sashdarkMode', true);
			localStorage.removeItem('sashlightMode');
			localStorage.removeItem('sashtransparentMode');
		} else {
			$('body').removeClass('dark-mode');
			$('body').addClass('light-mode');

			localStorage.setItem('sashlightMode', true);
			localStorage.removeItem('sashtransparentMode');
			localStorage.removeItem('sashdarkMode');
		}
	});


    /******* Theme Style ********/

	//---- Light mode ----- //
	// $('body').addClass('light-mode');
	// $('body').removeClass('transparent-mode');
	// $('body').removeClass('dark-mode');

	//---- Dark mode ----- //
	// $('body').addClass('dark-mode');
	// $('body').removeClass('light-mode');
	// $('body').removeClass('transparent-mode');

	//---- Transparent mode ----//
	// $('body').addClass('transparent-mode');
	// $('body').removeClass('light-mode');
	// $('body').removeClass('dark-mode');


	/******* Transparent Bg-Image Style *******/

	// Bg-Image1 Style
	// $('body').addClass('bg-img1');
	// $('body').addClass('transparent-mode');
	// $('body').removeClass('light-mode');
	// $('body').removeClass('dark-mode');

	// Bg-Image2 Style
	// $('body').addClass('bg-img2');
	// $('body').addClass('transparent-mode');
	// $('body').removeClass('light-mode');
	// $('body').removeClass('dark-mode');

	// Bg-Image3 Style
	// $('body').addClass('bg-img3');
	// $('body').addClass('transparent-mode');
	// $('body').removeClass('light-mode');
	// $('body').removeClass('dark-mode');

	// Bg-Image4 Style
	// $('body').addClass('bg-img4');
	// $('body').addClass('transparent-mode');
	// $('body').removeClass('light-mode');
	// $('body').removeClass('dark-mode');


	/******* RTL VERSION *******/

	// $('body').addClass('rtl');

    let bodyRtl = $('body').hasClass('rtl');
    if (bodyRtl) {
        $('body').addClass('rtl');

        $('#slide-left').removeClass('d-none');
        $('#slide-right').removeClass('d-none');
        $("html[lang=en]").attr("dir", "rtl");
        $('body').removeClass('ltr');
        $("head link#style").attr("href", $(this));
        (document.getElementById("style").setAttribute("href", "../assets/plugins/bootstrap/css/bootstrap.rtl.min.css"));
        var carousel = $('.owl-carousel');
        $.each(carousel, function (index, element) {
            // element == this
            var carouselData = $(element).data('owl.carousel');
            carouselData.settings.rtl = true; //don't know if both are necessary
            carouselData.options.rtl = true;
            $(element).trigger('refresh.owl.carousel');
        });
    } 


	/******* Header Styles ********/

	// $('body').addClass('header-light');
	// $('body').addClass('color-header');
	// $('body').addClass('dark-header');
	// $('body').addClass('gradient-header');


	/******* Menu Styles ********/

	// $('body').addClass('light-menu');	
	// $('body').addClass('color-menu');
	// $('body').addClass('dark-menu');
	// $('body').addClass('gradient-menu');


	/******* Full Width Layout Start ********/

	// $('body').addClass('layout-boxed'); 
	

	/******** *Header-Position Styles Start* ********/

	// $('body').addClass('scrollable-layout');


	/******* Navigation Style *******/

	// ***** Horizontal Click Menu ***** //

	// $('body').addClass('horizontal');

    let bodyhorizontal = $('body').hasClass('horizontal');
    if (bodyhorizontal) {
        if( !document.querySelector('.login-img') ){
            ActiveSubmenu();
            checkHoriMenu();
            responsive();
        }
        if(window.innerWidth>=992){
            let li = document.querySelectorAll('.side-menu li')
            li.forEach((e, i) => {
                e.classList.remove('is-expanded')
            })
            var animationSpeed = 300;
            // first level
            var parent = $("[data-bs-toggle='sub-slide']").parents('ul');
            var ul = parent.find('ul:visible').slideUp(animationSpeed);
            ul.removeClass('open');
            var parent1 = $("[data-bs-toggle='sub-slide2']").parents('ul');
            var ul1 = parent1.find('ul:visible').slideUp(animationSpeed);
            ul1.removeClass('open');
        }
        $('body').addClass('horizontal');
        $(".main-content").addClass("hor-content");
        $(".main-content").removeClass("app-content");
        $(".main-container").addClass("container");
        $(".main-container").removeClass("container-fluid");
        $(".app-header").addClass("hor-header");
        $(".hor-header").removeClass("app-header");
        $(".app-sidebar").addClass("horizontal-main")
        $(".main-sidemenu").addClass("container")
        $('body').removeClass('sidebar-mini');
        $('body').removeClass('sidenav-toggled');
        $('body').removeClass('horizontal-hover');
        $('body').removeClass('default-menu');
        $('body').removeClass('icontext-menu');
        $('body').removeClass('icon-overlay');
        $('body').removeClass('closed-leftmenu');
        $('body').removeClass('hover-submenu');
        $('body').removeClass('hover-submenu1');
        // // To enable no-wrap horizontal style
        $('#slide-left').removeClass('d-none');
        $('#slide-right').removeClass('d-none');
        document.querySelector('.horizontal .side-menu')?.classList.add('flex-nowrap')
        // To enable wrap horizontal style
        // $('#slide-left').addClass('d-none');
        // $('#slide-right').addClass('d-none');
        // document.querySelector('.horizontal .side-menu').style.flexWrap = 'wrap'
        
    } 

	// ***** Horizontal Hover Menu ***** //

	// $('body').addClass('horizontal-hover');

    function light() {
        if (document.querySelector('body').classList.contains('light-mode')) {
            $('#myonoffswitch8').prop('checked', true);
            $('#myonoffswitch12').prop('checked', true);
        }
    }
    light();
    let bodyhorizontalHover = $('body').hasClass('horizontal-hover');
    if (bodyhorizontalHover) {
        if( !document.querySelector('.login-img') ){
            checkHoriMenu();
            responsive();
        }
        if(window.innerWidth>=992){
            let li = document.querySelectorAll('.side-menu li')
            li.forEach((e, i) => {
                e.classList.remove('is-expanded')
            })
            var animationSpeed = 300;
            // first level
            var parent = $("[data-bs-toggle='sub-slide']").parents('ul');
            var ul = parent.find('ul:visible').slideUp(animationSpeed);
            ul.removeClass('open');
            var parent1 = $("[data-bs-toggle='sub-slide2']").parents('ul');
            var ul1 = parent1.find('ul:visible').slideUp(animationSpeed);
            ul1.removeClass('open');
        }
        $('body').addClass('horizontal-hover');
        $('body').addClass('horizontal');
        // $('#slide-left').addClass('d-none');
        // $('#slide-right').addClass('d-none');
        // document.querySelector('.horizontal .side-menu').style.flexWrap = 'wrap'
        $('#slide-left').addClass('d-none');
        $('#slide-right').addClass('d-none');
        document.querySelector('.horizontal .side-menu')?.classList.add('flex-nowrap')
        $(".main-content").addClass("hor-content");
        $(".main-content").removeClass("app-content");
        $(".main-container").addClass("container");
        $(".main-container").removeClass("container-fluid");
        $(".app-header").addClass("hor-header");
        $(".app-header").removeClass("app-header");
        $(".app-sidebar").addClass("horizontal-main")
        $(".main-sidemenu").addClass("container")
        $('body').removeClass('sidebar-mini');
        $('body').removeClass('sidenav-toggled');
        $('body').removeClass('default-menu');
        $('body').removeClass('icontext-menu');
        $('body').removeClass('icon-overlay');
        $('body').removeClass('closed-leftmenu');
        $('body').removeClass('hover-submenu');
        $('body').removeClass('hover-submenu1');
    }

	// Sidemenu layout Styles //

	// ***** Icon with Text *****//
	// $('body').addClass('icontext-menu');
	// $('body').addClass('sidenav-toggled');
	// if(document.querySelector('.icontext-menu').firstElementChild.classList.contains('login-img') !== true){
	// icontext();
	// }

	// ***** Icon Overlay ***** //
	// $('body').addClass('icon-overlay');
	// $('body').addClass('sidenav-toggled');

	// ***** closed-leftmenu ***** //
	// $('body').addClass('closed-leftmenu');
	// $('body').addClass('sidenav-toggled')

	// ***** hover-submenu ***** //
	// $('body').addClass('hover-submenu');
	// $('body').addClass('sidenav-toggled')
	// if(document.querySelector('.hover-submenu').firstElementChild.classList.contains('login-img') !== true){
	// hovermenu();
	// }

	// ***** hover-submenu style 1 ***** //
	// $('body').addClass('hover-submenu1');
	// $('body').addClass('sidenav-toggled')
	// if(document.querySelector('.hover-submenu1').firstElementChild.classList.contains('login-img') !== true){
	// hovermenu();
	// }


})(jQuery);

// REPLY
function replay() {
    "use strict";

    let replayButtom = document.querySelectorAll('.reply a')
    // Creating Div
    let Div = document.createElement('div')
    Div.setAttribute('class', "comment mt-5 d-grid")
    // creating textarea
    let textArea = document.createElement('textarea')
    textArea.setAttribute('class', "form-control")
    textArea.setAttribute('rows', "5")
    textArea.innerText = "Your Comment";
    // creating Cancel buttons
    let cancelButton = document.createElement('button');
    cancelButton.setAttribute('class', "btn btn-danger");
    cancelButton.innerText = "Cancel";

    let buttonDiv = document.createElement('div')
    buttonDiv.setAttribute('class', "btn-list ms-auto mt-2")

    // Creating submit button
    let submitButton = document.createElement('button');
    submitButton.setAttribute('class', "btn btn-success ms-3");
    submitButton.innerText = "Submit";

    // appending text are to div
    Div.append(textArea)
    Div.append(buttonDiv);
    buttonDiv.append(cancelButton);
    buttonDiv.append(submitButton);

    replayButtom.forEach((element, index) => {

        element.addEventListener('click', () => {
            let replay = $(element).parent()
            replay.append(Div)

            cancelButton.addEventListener('click', () => {
                Div.remove()
            })
        })
    })


}
replay()

// OFF-CANVAS STYLE
$('.off-canvas').on('click', function () {
    $('body').addClass('overflow-y-scroll');
    $('body').addClass('pe-0');
});