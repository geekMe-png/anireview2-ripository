const menuBtn = document.querySelector('#menu-btn');
const menuList = document.querySelector('#menu-list');
const header = document.querySelector('#header');
const openBtn = document.querySelector('#menu-btn-open');
const closeBtn = document.querySelector('#menu-btn-close');
const menuOptions = {
    duration: 300,
    easing: 'ease',
    fill: 'forwards',
}

menuBtn.addEventListener('click', () => {
    menuList.classList.toggle('hidden');
    openBtn.classList.toggle('active');
    closeBtn.classList.toggle('active');
});