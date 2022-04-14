//responsive dropdown arrow for the navigation links
const menuBtn = document.getElementById('menu-dropdown-btn')
const menuDrop = document.querySelector('.menu')
menuBtn.addEventListener('click', () => {
    menuDrop.classList.toggle('active')
})