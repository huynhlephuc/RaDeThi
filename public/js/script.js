
// =============================
let hamburger__nav = document.querySelector('.hamburger__nav');
let nagavition__header = document.querySelector('.nagavition__header');
hamburger__nav.addEventListener('click',()=>{
    hamburger__nav.classList.toggle('active');
    nagavition__header.classList.toggle('active');
})