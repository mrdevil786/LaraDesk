const handleThemeUpdate = (cssVars) => {
    const root = document.querySelector(':root');
    const keys = Object.keys(cssVars);
    keys.forEach(key => {
        root.style.setProperty(key, cssVars[key]);
    });
}

function dynamicPrimaryColor(primaryColor) {
    'use strict'
    
    primaryColor.forEach((item) => {
        item.addEventListener('input', (e) => {
            const cssPropName = `--primary-${e.target.getAttribute('data-id')}`;
            const cssPropName1 = `--primary-${e.target.getAttribute('data-id1')}`;
            const cssPropName2 = `--primary-${e.target.getAttribute('data-id2')}`;
            const cssPropName7 = `--primary-${e.target.getAttribute('data-id7')}`;
            const cssPropName8 = `--darkprimary-${e.target.getAttribute('data-id8')}`;
            const cssPropName3 = `--dark-${e.target.getAttribute('data-id3')}`;
            const cssPropName4 = `--transparent-${e.target.getAttribute('data-id4')}`;
            const cssPropName5 = `--transparent-${e.target.getAttribute('data-id5')}`;
            const cssPropName6 = `--transparent-${e.target.getAttribute('data-id6')}`;
            const cssPropName9 = `--transparentprimary-${e.target.getAttribute('data-id9')}`;
            handleThemeUpdate({
                [cssPropName]: e.target.value,
                // 95 is used as the opacity 0.95  
                [cssPropName1]: e.target.value + 95,
                [cssPropName2]: e.target.value,
                [cssPropName3]: e.target.value,
                [cssPropName4]: e.target.value,
                [cssPropName5]: e.target.value,
                [cssPropName6]: e.target.value + 95,
                [cssPropName7]: e.target.value + 20,
                [cssPropName8]: e.target.value + 20,
                [cssPropName9]: e.target.value + 20,
            });
        });
    });
}

(function() {
    'use strict'

    // Light theme color picker
    // const LightThemeSwitchers = document.querySelectorAll('.light-mode .switch_section span');
    const dynamicPrimaryLight = document.querySelectorAll('input.color-primary-light');

    // themeSwitch(LightThemeSwitchers);
    dynamicPrimaryColor(dynamicPrimaryLight);

    // dark theme color picker

    // const DarkThemeSwitchers = document.querySelectorAll('.dark-mode .switch_section span')
    const DarkDynamicPrimaryLight = document.querySelectorAll('input.color-primary-dark');

    // themeSwitch(DarkThemeSwitchers);
    dynamicPrimaryColor(DarkDynamicPrimaryLight);

    // tranparent theme color picker

    // const transparentThemeSwitchers = document.querySelectorAll('.transparent-mode .switch_section span')
    const transparentDynamicPrimaryLight = document.querySelectorAll('input.color-primary-transparent');

    // themeSwitch(transparentThemeSwitchers);
    dynamicPrimaryColor(transparentDynamicPrimaryLight);

    // tranparent theme bgcolor picker

    // const transparentBgThemeSwitchers = document.querySelectorAll('.transparent-mode .switch_section span')
    const transparentDynamicPBgLight = document.querySelectorAll('input.color-bg-transparent');

    // themeSwitch(transparentBgThemeSwitchers);
    dynamicPrimaryColor(transparentDynamicPBgLight);

    localStorageBackup();

    $('#myonoffswitch1').on('click', function(){
        document.querySelector('body')?.classList.remove('dark-mode');
        document.querySelector('body')?.classList.remove('transparent-mode');
        document.querySelector('body')?.classList.remove('bg-img1');
        document.querySelector('body')?.classList.remove('bg-img2');
        document.querySelector('body')?.classList.remove('bg-img3');
        document.querySelector('body')?.classList.remove('bg-img4');
        
        localStorage.removeItem('sashBgImage');
        $('#myonoffswitch1').prop('checked', true);

        localStorage.setItem('sashlightMode', true);
        localStorage.removeItem('sashdarkMode');
        localStorage.removeItem('sashtransparentMode');
    })
    $('#myonoffswitch2').on('click', function(){
    document.querySelector('body')?.classList.remove('light-mode');
    document.querySelector('body')?.classList.remove('transparent-mode');
    document.querySelector('body')?.classList.remove('bg-img1');
    document.querySelector('body')?.classList.remove('bg-img2');
    document.querySelector('body')?.classList.remove('bg-img3');
    document.querySelector('body')?.classList.remove('bg-img4');
    
    localStorage.setItem('sashdarkMode', true);
    localStorage.removeItem('sashlightMode');
    localStorage.removeItem('sashtransparentMode');
    
    localStorage.removeItem('sashBgImage');
    $('#myonoffswitch2').prop('checked', true);
    })
    $('#myonoffswitchTransparent').on('click', function(){
    document.querySelector('body')?.classList.remove('dark-mode');
    document.querySelector('body')?.classList.remove('light-mode');
    document.querySelector('body')?.classList.remove('bg-img1');
    document.querySelector('body')?.classList.remove('bg-img2');
    document.querySelector('body')?.classList.remove('bg-img3');
    document.querySelector('body')?.classList.remove('bg-img4');
    
    localStorage.removeItem('sashBgImage');
    $('#myonoffswitchTransparent').prop('checked', true);
    
    localStorage.setItem('sashtransparentMode', true);
    localStorage.removeItem('sashlightMode');
    localStorage.removeItem('sashdarkMode');
    })
        
})();

function localStorageBackup() {
    'use strict'

    // if there is a value stored, update color picker and background color
    // Used to retrive the data from local storage
    if (localStorage.sashprimaryColor) {
        // document.getElementById('colorID').value = localStorage.sashprimaryColor;
        document.querySelector('html').style.setProperty('--primary-bg-color', localStorage.sashprimaryColor);
        document.querySelector('html').style.setProperty('--primary-bg-hover', localStorage.sashprimaryHoverColor);
        document.querySelector('html').style.setProperty('--primary-bg-border', localStorage.sashprimaryBorderColor);
        document.querySelector('html').style.setProperty('--primary-transparentcolor', localStorage.sashprimaryTransparent);
		document.querySelector('body')?.classList.add('light-mode');
		document.querySelector('body')?.classList.remove('dark-mode');
		document.querySelector('body')?.classList.remove('transparent-mode');

        $('#myonoffswitch3').prop('checked', true);
        $('#myonoffswitch6').prop('checked', true);
        $('#myonoffswitch1').prop('checked', true);
    }

    if (localStorage.sashdarkPrimary) {
        // document.getElementById('darkPrimaryColorID').value = localStorage.sashdarkPrimary;
        document.querySelector('html').style.setProperty('--primary-bg-color', localStorage.sashdarkPrimary);
        document.querySelector('html').style.setProperty('--primary-bg-hover', localStorage.sashdarkPrimary);
        document.querySelector('html').style.setProperty('--primary-bg-border', localStorage.sashdarkPrimary);
        document.querySelector('html').style.setProperty('--dark-primary', localStorage.sashdarkPrimary);
        document.querySelector('html').style.setProperty('--darkprimary-transparentcolor', localStorage.sashdarkprimaryTransparent);
		document.querySelector('body')?.classList.add('dark-mode');
		document.querySelector('body')?.classList.remove('light-mode');
		document.querySelector('body')?.classList.remove('transparent-mode');

        $('#myonoffswitch2').prop('checked', true);

    }


    if (localStorage.sashtransparentPrimary) {
        // document.getElementById('transparentPrimaryColorID').value = localStorage.sashtransparentPrimary;
        document.querySelector('html').style.setProperty('--primary-bg-color', localStorage.sashtransparentPrimary);
        document.querySelector('html').style.setProperty('--primary-bg-hover', localStorage.sashtransparentPrimary);
        document.querySelector('html').style.setProperty('--primary-bg-border', localStorage.sashtransparentPrimary);
        document.querySelector('html').style.setProperty('--transparent-primary', localStorage.sashtransparentPrimary);
        document.querySelector('html').style.setProperty('--transparentprimary-transparentcolor', localStorage.sashtransparentprimaryTransparent);
		document.querySelector('body')?.classList.add('transparent-mode');
		document.querySelector('body')?.classList.remove('dark-mode');
		document.querySelector('body')?.classList.remove('light-mode');

        $('#myonoffswitchTransparent').prop('checked', true);
    }

    if (localStorage.sashtransparentBgImgPrimary) {
		// document.getElementById('transparentBgImgPrimaryColorID').value = localStorage.sashtransparentBgImgPrimary;
		document.querySelector('html').style.setProperty('--primary-bg-color', localStorage.sashtransparentBgImgPrimary);
		document.querySelector('html').style.setProperty('--primary-bg-hover', localStorage.sashtransparentBgImgPrimary);
		document.querySelector('html').style.setProperty('--primary-bg-border', localStorage.sashtransparentBgImgPrimary);
		document.querySelector('html').style.setProperty('--transparent-primary', localStorage.sashtransparentBgImgPrimary);
		document.querySelector('html').style.setProperty('--transparentprimary-transparentcolor', localStorage.sashtransparentBgImgprimaryTransparent);
		document.querySelector('body')?.classList.add('transparent-mode');
		document.querySelector('body')?.classList.remove('dark-mode');
		document.querySelector('body')?.classList.remove('light-mode');
		
		$('#myonoffswitchTransparent').prop('checked', true);
	}
    
    if (localStorage.sashtransparentBgColor) {
        // document.getElementById('transparentBgColorID').value = localStorage.sashtransparentBgColor;
        document.querySelector('html').style.setProperty('--transparent-body', localStorage.sashtransparentBgColor);
        document.querySelector('html').style.setProperty('--transparent-mode', localStorage.sashtransparentThemeColor);
        document.querySelector('html').style.setProperty('--transparentprimary-transparentcolor', localStorage.sashtransparentprimaryTransparent);
        document.querySelector('body').classList.add('transparent-mode');
        document.querySelector('body').classList.remove('dark-mode');
        document.querySelector('body').classList.remove('light-mode');


        $('#myonoffswitchTransparent').prop('checked', true);
    }
	if (localStorage.sashBgImage) {
		document.querySelector('body')?.classList.add('transparent-mode');
        let bgImg = localStorage.sashBgImage.split(' ')[0];
		document.querySelector('body')?.classList.add(bgImg);
		document.querySelector('body')?.classList.remove('dark-mode');
		document.querySelector('body')?.classList.remove('light-mode');
		
		$('#myonoffswitchTransparent').prop('checked', true);
	}

    if(localStorage.sashlightMode){
        document.querySelector('body')?.classList.add('light-mode');
		document.querySelector('body')?.classList.remove('dark-mode');
		document.querySelector('body')?.classList.remove('transparent-mode');
        $('#myonoffswitch1').prop('checked', true);
        $('#myonoffswitch3').prop('checked', true);
        $('#myonoffswitch6').prop('checked', true);
    }
    if(localStorage.sashdarkMode){
        document.querySelector('body')?.classList.remove('light-mode');
		document.querySelector('body')?.classList.add('dark-mode');
		document.querySelector('body')?.classList.remove('transparent-mode');
        $('#myonoffswitch2').prop('checked', true);
        $('#myonoffswitch5').prop('checked', true);
        $('#myonoffswitch8').prop('checked', true);
    }
    if(localStorage.sashtransparentMode){
        document.querySelector('body')?.classList.remove('light-mode');
		document.querySelector('body')?.classList.remove('dark-mode');
		document.querySelector('body')?.classList.add('transparent-mode');
        $('#myonoffswitchTransparent').prop('checked', true);
        $('#myonoffswitch3').prop('checked', false);
        $('#myonoffswitch6').prop('checked', false);
        $('#myonoffswitch5').prop('checked', false);
        $('#myonoffswitch8').prop('checked', false);
    }
    if(localStorage.sashhorizontal){
        document.querySelector('body').classList.add('horizontal')
    }
    if(localStorage.sashhorizontalHover){
        document.querySelector('body').classList.add('horizontal-hover')
    }
    if(localStorage.sashrtl){
        document.querySelector('body').classList.add('rtl')
    }
}

// triggers on changing the color picker
function changePrimaryColor() {
    'use strict'

    $('#myonoffswitch3').prop('checked', true);
    $('#myonoffswitch6').prop('checked', true);
    checkOptions();

    var userColor = document.getElementById('colorID').value;
    localStorage.setItem('sashprimaryColor', userColor);
    // to store value as opacity 0.95 we use 95
    localStorage.setItem('sashprimaryHoverColor', userColor + 95);
    localStorage.setItem('sashprimaryBorderColor', userColor);
    localStorage.setItem('sashprimaryTransparent', userColor + 20);

    // removing dark theme properties
    localStorage.removeItem('sashdarkPrimary')
    localStorage.removeItem('sashtransparentBgColor');
    localStorage.removeItem('sashtransparentThemeColor');
    localStorage.removeItem('sashtransparentPrimary');
    localStorage.removeItem('sashtransparentBgImgPrimary');
	localStorage.removeItem('sashtransparentBgImgprimaryTransparent');
    localStorage.removeItem('sashdarkprimaryTransparent');
    document.querySelector('body').classList.add('light-mode');
    document.querySelector('body').classList.remove('transparent-mode');
    document.querySelector('body').classList.remove('dark-mode');
	localStorage.removeItem('sashBgImage');

    $('#myonoffswitch1').prop('checked', true);
    names()
    
    localStorage.setItem('sashlightMode', true);
    localStorage.removeItem('sashdarkMode');
    localStorage.removeItem('sashtransparentMode');
}

function darkPrimaryColor() {
    'use strict'

    var userColor = document.getElementById('darkPrimaryColorID').value;
    localStorage.setItem('sashdarkPrimary', userColor);
    localStorage.setItem('sashdarkprimaryTransparent', userColor + 20);
    $('#myonoffswitch5').prop('checked', true);
    $('#myonoffswitch8').prop('checked', true);
    checkOptions();

    // removing light theme data 
    localStorage.removeItem('sashprimaryColor')
    localStorage.removeItem('sashprimaryHoverColor')
    localStorage.removeItem('sashprimaryBorderColor')
    localStorage.removeItem('sashprimaryTransparent');
    localStorage.removeItem('sashtransparentBgImgPrimary');
	localStorage.removeItem('sashtransparentBgImgprimaryTransparent');

    localStorage.removeItem('sashtransparentBgColor');
    localStorage.removeItem('sashtransparentThemeColor');
    localStorage.removeItem('sashtransparentPrimary');
	localStorage.removeItem('sashBgImage');

    document.querySelector('body').classList.add('dark-mode');
    document.querySelector('body').classList.remove('light-mode');
    document.querySelector('body').classList.remove('transparent-mode');

    $('#myonoffswitch2').prop('checked', true);
    names()

    localStorage.setItem('sashdarkMode', true);
    localStorage.removeItem('sashlightMode');
    localStorage.removeItem('sashtransparentMode');
}

function transparentPrimaryColor() {
    'use strict'
    
    $('#myonoffswitch3').prop('checked', false);
    $('#myonoffswitch6').prop('checked', false);
    $('#myonoffswitch5').prop('checked', false);
    $('#myonoffswitch8').prop('checked', false);

    var userColor = document.getElementById('transparentPrimaryColorID').value;
    localStorage.setItem('sashtransparentPrimary', userColor);
    localStorage.setItem('sashtransparentprimaryTransparent', userColor + 20);

    // removing light theme data 
    localStorage.removeItem('sashdarkPrimary');
    localStorage.removeItem('sashprimaryColor')
    localStorage.removeItem('sashprimaryHoverColor')
    localStorage.removeItem('sashprimaryBorderColor')
    localStorage.removeItem('sashprimaryTransparent');
    localStorage.removeItem('sashtransparentBgImgPrimary');
	localStorage.removeItem('sashtransparentBgImgprimaryTransparent');
    document.querySelector('body').classList.add('transparent-mode');
    document.querySelector('body').classList.remove('light-mode');
    document.querySelector('body').classList.remove('dark-mode');
	document.querySelector('body')?.classList.remove('bg-img1');
	document.querySelector('body')?.classList.remove('bg-img2');
	document.querySelector('body')?.classList.remove('bg-img3');
	document.querySelector('body')?.classList.remove('bg-img4');

    $('#myonoffswitchTransparent').prop('checked', true);
    checkOptions();
    names()

    localStorage.setItem('sashtransparentMode', true);
    localStorage.removeItem('sashlightMode');
    localStorage.removeItem('sashdarkMode');
}

function transparentBgImgPrimaryColor() {
    'use strict'

    $('#myonoffswitch3').prop('checked', false);
    $('#myonoffswitch6').prop('checked', false);
    $('#myonoffswitch5').prop('checked', false);
    $('#myonoffswitch8').prop('checked', false);
	var userColor = document.getElementById('transparentBgImgPrimaryColorID').value;
	localStorage.setItem('sashtransparentBgImgPrimary', userColor);
	localStorage.setItem('sashtransparentBgImgprimaryTransparent', userColor+20);
	if(
		document.querySelector('body')?.classList.contains('bg-img1') == false &&
		document.querySelector('body')?.classList.contains('bg-img2') == false &&
		document.querySelector('body')?.classList.contains('bg-img3') == false &&
		document.querySelector('body')?.classList.contains('bg-img4') == false
		){
		document.querySelector('body')?.classList.add('bg-img1');
        localStorage.setItem('sashBgImage', 'bg-img1')
	}
    // removing light theme data 
	localStorage.removeItem('sashdarkPrimary');
	localStorage.removeItem('sashprimaryColor')
	localStorage.removeItem('sashprimaryHoverColor')
	localStorage.removeItem('sashprimaryBorderColor')
	localStorage.removeItem('sashprimaryTransparent');
	localStorage.removeItem('sashdarkprimaryTransparent');
	localStorage.removeItem('sashtransparentPrimary')
	localStorage.removeItem('sashtransparentprimaryTransparent');
	document.querySelector('body').classList.add('transparent-mode');
	document.querySelector('body')?.classList.remove('light-mode');
	document.querySelector('body')?.classList.remove('dark-mode');

	$('#myonoffswitchTransparent').prop('checked', true);
    checkOptions();
	names();
    
    localStorage.setItem('sashtransparentMode', true);
    localStorage.removeItem('sashlightMode');
    localStorage.removeItem('sashdarkMode');
}


function transparentBgColor() {
    'use strict'

    $('#myonoffswitch3').prop('checked', false);
    $('#myonoffswitch6').prop('checked', false);
    $('#myonoffswitch5').prop('checked', false);
    $('#myonoffswitch8').prop('checked', false);
    var userColor = document.getElementById('transparentBgColorID').value;
    localStorage.setItem('sashtransparentBgColor', userColor);
    localStorage.setItem('sashtransparentThemeColor', userColor + 95);
    localStorage.setItem('sashtransparentprimaryTransparent', userColor + 20);
    localStorage.removeItem('sashtransparentBgImgPrimary');
	localStorage.removeItem('sashtransparentBgImgprimaryTransparent');

    // removing light theme data 
    localStorage.removeItem('sashdarkPrimary');
    localStorage.removeItem('sashprimaryColor')
    localStorage.removeItem('sashprimaryHoverColor')
    localStorage.removeItem('sashprimaryBorderColor')
    localStorage.removeItem('sashprimaryTransparent');
	localStorage.removeItem('sashBgImage');
    document.querySelector('body').classList.add('transparent-mode');
    document.querySelector('body').classList.remove('light-mode');
    document.querySelector('body').classList.remove('dark-mode');
	document.querySelector('body')?.classList.remove('bg-img1');
	document.querySelector('body')?.classList.remove('bg-img2');
	document.querySelector('body')?.classList.remove('bg-img3');
	document.querySelector('body')?.classList.remove('bg-img4');

    $('#myonoffswitchTransparent').prop('checked', true);
    checkOptions();
    
    localStorage.setItem('sashtransparentMode', true);
    localStorage.removeItem('sashlightMode');
    localStorage.removeItem('sashdarkMode');
}


function bgImage(e) {
    'use strict'

    $('#myonoffswitch3').prop('checked', false);
    $('#myonoffswitch6').prop('checked', false);
    $('#myonoffswitch5').prop('checked', false);
    $('#myonoffswitch8').prop('checked', false);
	let imgID = e.getAttribute('class');
	localStorage.setItem('sashBgImage', imgID);
    
    // removing light theme data 
	localStorage.removeItem('sashdarkPrimary');
	localStorage.removeItem('sashprimaryColor')
	localStorage.removeItem('sashtransparentBgColor');
	localStorage.removeItem('sashtransparentThemeColor');
	localStorage.removeItem('sashtransparentprimaryTransparent');
	document.querySelector('body').classList.add('transparent-mode');
	document.querySelector('body')?.classList.remove('light-mode');
	document.querySelector('body')?.classList.remove('dark-mode');

	$('#myonoffswitchTransparent').prop('checked', true);
    checkOptions();
    
    localStorage.setItem('sashtransparentMode', true);
    localStorage.removeItem('sashlightMode');
    localStorage.removeItem('sashdarkMode');
}

// to check the value is hexa or not
const isValidHex = (hexValue) => /^#([A-Fa-f0-9]{3,4}){1,2}$/.test(hexValue)

const getChunksFromString = (st, chunkSize) => st.match(new RegExp(`.{${chunkSize}}`, "g"))
    // convert hex value to 256
const convertHexUnitTo256 = (hexStr) => parseInt(hexStr.repeat(2 / hexStr.length), 16)
    // get alpha value is equla to 1 if there was no value is asigned to alpha in function
const getAlphafloat = (a, alpha) => {
        if (typeof a !== "undefined") { return a / 255 }
        if ((typeof alpha != "number") || alpha < 0 || alpha > 1) {
            return 1
        }
        return alpha
    }
    // convertion of hex code to rgba code 
function hexToRgba(hexValue, alpha) {
    'use strict'

    if (!isValidHex(hexValue)) { return null }
    const chunkSize = Math.floor((hexValue.length - 1) / 3)
    const hexArr = getChunksFromString(hexValue.slice(1), chunkSize)
    const [r, g, b, a] = hexArr.map(convertHexUnitTo256)
    return `rgba(${r}, ${g}, ${b}, ${getAlphafloat(a, alpha)})`
}


let myVarVal, myVarVal1, myVarVal2, myVarVal3

function names() {
    'use strict'

    let primaryColorVal = getComputedStyle(document.documentElement).getPropertyValue('--primary-bg-color').trim();

    //get variable
    myVarVal = localStorage.getItem("sashprimaryColor") || localStorage.getItem("sashdarkPrimary") || localStorage.getItem("sashtransparentPrimary") || localStorage.getItem("sashtransparentBgImgPrimary")  || primaryColorVal;
    myVarVal1 = localStorage.getItem("sashprimaryColor") || localStorage.getItem("sashdarkPrimary") || localStorage.getItem("sashtransparentPrimary") || localStorage.getItem("sashtransparentBgImgPrimary")  || "#05c3fb";
    myVarVal2 = localStorage.getItem("sashprimaryColor") || localStorage.getItem("sashdarkPrimary") || localStorage.getItem("sashtransparentPrimary") || localStorage.getItem("sashtransparentBgImgPrimary")  || null;
    myVarVal3 = localStorage.getItem("sashprimaryColor") || localStorage.getItem("sashdarkPrimary") || localStorage.getItem("sashtransparentPrimary") || localStorage.getItem("sashtransparentBgImgPrimary") || null;

    if(document.querySelector('#transactions') !== null){
        index();
    }
    
    let colorData = hexToRgba(myVarVal || "#6c5ffc", 0.1)
    document.querySelector('html').style.setProperty('--primary01', colorData);

    let colorData1 = hexToRgba(myVarVal || "#6c5ffc", 0.2)
    document.querySelector('html').style.setProperty('--primary02', colorData1);

    let colorData2 = hexToRgba(myVarVal || "#6c5ffc", 0.3)
    document.querySelector('html').style.setProperty('--primary03', colorData2);

    let colorData3 = hexToRgba(myVarVal || "#6c5ffc", 0.6)
    document.querySelector('html').style.setProperty('--primary06', colorData3);

    let colorData4 = hexToRgba(myVarVal || "#6c5ffc", 0.9)
    document.querySelector('html').style.setProperty('--primary09', colorData4);

    let colorData5 = hexToRgba(myVarVal || "#6c5ffc", 0.05)
    document.querySelector('html').style.setProperty('--primary005', colorData5);

}
names()

