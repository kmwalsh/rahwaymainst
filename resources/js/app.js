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