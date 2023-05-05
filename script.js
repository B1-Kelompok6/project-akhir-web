let aboutTeks = document.getElementById('aboutteks');
let kursi = document.getElementById('kursi');
// let stars = document.getElementById('stars');


window.addEventListener('scroll', () => {
    let value = Math.min(Math.max(window.scrollY, 0), 350);

    aboutTeks.style.top = value * 2 + 'px';
    kursi.style.top = value * 1 + 'px';
    // stars.style.top = value * 1 + 'px';
});
