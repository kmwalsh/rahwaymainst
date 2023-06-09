//https://davidwalsh.name/javascript-debounce-function
function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};

//get the sticky header size on load or when user resizes window
//we hide some header elements on mobile so we catch the resize event
//in case the user switches portrait/landscape
window.addEventListener('DOMContentLoaded', stickyHeader);
window.addEventListener('resize', debounce(stickyHeader, 100));

function stickyHeader() {
  let headerHeight = 0;
  //sticky header
  headerHeight = document.getElementsByClassName('site-header')[0].offsetHeight;
  document.getElementsByClassName('js-site-content')[0].style.paddingTop = headerHeight + "px";
}

// add the sticky class when the user has scrolled a little bit
window.addEventListener('scroll', debounce(checkHeader, 100));

function checkHeader() {
  let scrollPosition = Math.round(window.scrollY);
  if (scrollPosition > 100) {
    document.getElementsByClassName('site-header')[0].classList.add('sticky');
  }  else {
      document.getElementsByClassName('site-header')[0].classList.remove('sticky');
  }
}

//mobile menu open/close
let toggler = document.getElementsByClassName('js-navbar-toggler')[0];
let menu = document.getElementsByClassName('js-navbar-collapse')[0];
let close = document.getElementsByClassName('js-navbar-close')[0];

toggler.addEventListener('click', event => {
    if ( ! menu.classList.contains('open') ) {
        menu.classList.add('open');
        document.body.classList.add('no-scroll');
    } else {
        closeMenu();
    }
});

close.addEventListener('click', event => {
    closeMenu();
});

function closeMenu() {
    menu.classList.remove('open');
    document.body.classList.remove('no-scroll');
}

// https://www.tailwindtoolbox.com/components/modal
// begin modal
var openmodal = document.querySelectorAll('.modal-open')
for (var i = 0; i < openmodal.length; i++) {
  openmodal[i].addEventListener('click', function(event){
    event.preventDefault()
    toggleModal()
  })
}

const overlay = document.querySelector('.modal-overlay')
if ( document.body.contains(overlay)) {
  overlay.addEventListener('click', toggleModal)
}

var closemodal = document.querySelectorAll('.modal-close')
for (var i = 0; i < closemodal.length; i++) {
  closemodal[i].addEventListener('click', function(e){
    e.preventDefault();
    toggleModal();
  })
}

document.onkeydown = function(evt) {
  evt = evt || window.event
  var isEscape = false
  if ("key" in evt) {
    isEscape = (evt.key === "Escape" || evt.key === "Esc")
  } else {
    isEscape = (evt.keyCode === 27)
  }
  if (isEscape && document.body.classList.contains('modal-active')) {
    toggleModal()
  }
};

function toggleModal () {
  const body = document.querySelector('body')
  const modal = document.querySelector('.modal')
  modal.classList.toggle('opacity-0')
  modal.classList.toggle('pointer-events-none')
  body.classList.toggle('modal-active')
  document.body.classList.toggle('no-scroll');
}

//end modal

//textarea counter
const textarea = document.querySelectorAll(".js-count-text");

textarea.forEach(textarea => {
  const counterEl = textarea.parentNode.querySelector(".js-count-characters");
  const counter = counterEl.querySelector(".counter");
  const maxlength = counterEl.querySelector(".maxlength");
  const counterError = counterEl.querySelector(".counter-error");
  
  maxlength.innerHTML = textarea.getAttribute("maxlength");
  counter.innerHTML = textarea.value.length;
  
  textarea.addEventListener("input", event => {
      const target = event.currentTarget;
      const maxLength = target.getAttribute("maxlength");
      const currentLength = target.value.length;
  
      if (currentLength >= maxLength) {
          counterError.innerHTML = "&mdash; You have reached the maximum number of characters.";
      } else {
        counterError.innerHTML = "";
      }
      counter.innerHTML = currentLength;

  });
});

//