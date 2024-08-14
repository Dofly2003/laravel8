document.addEventListener('DOMContentLoaded', function () {
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-item');

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    // Pindah slide secara otomatis setiap 5 detik
    setInterval(nextSlide, 5000);

    // Pastikan tombol bekerja
    document.querySelector('.carousel-item button[onclick="prevSlide()"]').addEventListener('click', prevSlide);
    document.querySelector('.carousel-item button[onclick="nextSlide()"]').addEventListener('click', nextSlide);
});