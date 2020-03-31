/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

//https://davidwalsh.name/javascript-debounce-function
function debounce(func, wait, immediate) {
  var timeout;
  return function () {
    var context = this,
        args = arguments;

    var later = function later() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };

    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
}

; //sticky header

var headerHeight = document.getElementsByClassName('site-header')[0].offsetHeight;
document.getElementsByClassName('js-site-content')[0].style.paddingTop = headerHeight + "px";
window.addEventListener('scroll', debounce(checkHeader, 1));

function checkHeader() {
  var scrollPosition = Math.round(window.scrollY);

  if (scrollPosition > 100) {
    document.getElementsByClassName('site-header')[0].classList.add('sticky');
  } else {
    document.getElementsByClassName('site-header')[0].classList.remove('sticky');
  }
} //mobile menu open/close


var toggler = document.getElementsByClassName('js-navbar-toggler')[0];
var menu = document.getElementsByClassName('js-navbar-collapse')[0];
var close = document.getElementsByClassName('js-navbar-close')[0];
toggler.addEventListener('click', function (event) {
  if (!menu.classList.contains('open')) {
    menu.classList.add('open');
    document.body.classList.add('no-scroll');
  } else {
    closeMenu();
  }
});
close.addEventListener('click', function (event) {
  closeMenu();
});

function closeMenu() {
  menu.classList.remove('open');
  document.body.classList.remove('no-scroll');
} // https://www.tailwindtoolbox.com/components/modal
// begin modal


var openmodal = document.querySelectorAll('.modal-open');

for (var i = 0; i < openmodal.length; i++) {
  openmodal[i].addEventListener('click', function (event) {
    event.preventDefault();
    toggleModal();
  });
}

var overlay = document.querySelector('.modal-overlay');

if (document.body.contains(overlay)) {
  overlay.addEventListener('click', toggleModal);
}

var closemodal = document.querySelectorAll('.modal-close');

for (var i = 0; i < closemodal.length; i++) {
  closemodal[i].addEventListener('click', function (e) {
    e.preventDefault();
    toggleModal();
  });
}

document.onkeydown = function (evt) {
  evt = evt || window.event;
  var isEscape = false;

  if ("key" in evt) {
    isEscape = evt.key === "Escape" || evt.key === "Esc";
  } else {
    isEscape = evt.keyCode === 27;
  }

  if (isEscape && document.body.classList.contains('modal-active')) {
    toggleModal();
  }
};

function toggleModal() {
  var body = document.querySelector('body');
  var modal = document.querySelector('.modal');
  modal.classList.toggle('opacity-0');
  modal.classList.toggle('pointer-events-none');
  body.classList.toggle('modal-active');
  document.body.classList.toggle('no-scroll');
} //end modal
//textarea counter


var textarea = document.querySelectorAll(".js-count-text");
textarea.forEach(function (textarea) {
  var counterEl = textarea.parentNode.querySelector(".js-count-characters");
  var counter = counterEl.querySelector(".counter");
  var maxlength = counterEl.querySelector(".maxlength");
  var counterError = counterEl.querySelector(".counter-error");
  maxlength.innerHTML = textarea.getAttribute("maxlength");
  counter.innerHTML = textarea.value.length;
  textarea.addEventListener("input", function (event) {
    var target = event.currentTarget;
    var maxLength = target.getAttribute("maxlength");
    var currentLength = target.value.length;

    if (currentLength >= maxLength) {
      counterError.innerHTML = "&mdash; You have reached the maximum number of characters.";
    } else {
      counterError.innerHTML = "";
    }

    counter.innerHTML = currentLength;
  });
}); //

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\kmw\code\rahwaymainst\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\Users\kmw\code\rahwaymainst\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });