let aboutTeks = document.getElementById('aboutteks');
let kursi = document.getElementById('kursi');

window.addEventListener('scroll', () => {
    let value = Math.min(Math.max(window.scrollY, 0), 350);

    aboutTeks.style.top = (value * 3 - 400) + 'px'; 
    kursi.style.top = (value * 1 - 100) + 'px'; 
});
