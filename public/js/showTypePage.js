const typeListsBtn = document.getElementById('typeListsBtn');
const background = document.querySelector('.background');
const sideBar = document.querySelector('.side-bar');
let width = sideBar.clientWidth;

typeListsBtn.addEventListener('click', () => {
    background.style.display = 'block';
    sideBar.style.transform = 'translateX(0)';
});

background.addEventListener('click', e => {
    sideBar.style.transform = `translateX(-${width}px)`;
    e.target.style.display = 'none';
});
