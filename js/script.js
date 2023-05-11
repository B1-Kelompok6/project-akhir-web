let aboutTeks = document.getElementById('aboutteks');
let kursi = document.getElementById('kursi');

window.addEventListener('scroll', () => {
    let value = Math.min(Math.max(window.scrollY, 0), 350);

    aboutTeks.style.top = (value * 3 - 400) + 'px'; 
    kursi.style.top = (value * 1 - 100) + 'px'; 
});

// Ambil button "Review" dan pop up
const btnReview = document.getElementById("btn-review");
const popup = document.querySelector(".popup");

// Tambahkan event listener pada button "Review"
btnReview.addEventListener("click", () => {
  // Tampilkan pop up
  popup.style.display = "block";
});

// Ambil tombol close pada pop up
const btnClose = document.querySelector(".popup .close");

// Tambahkan event listener pada tombol close
btnClose.addEventListener("click", () => {
  // Sembunyikan pop up
  popup.style.display = "none";
});

function trailer() {
    var popup_trailer = document.getElementById("trailer");
    popup_trailer.classList.toggle("show");
  }