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

//foreach 

//