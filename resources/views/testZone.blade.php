<div id="carouselExample" class="carousel-container">
    <!-- Carousel wrapper -->
    <div class="carousel-inner">
        <!-- Item 1 -->
        <div class="carousel-item active">
            <img src="https://dinamikaindomedia.co.id/sliders/GFc0ytKYo6BB4cWlZ7lh5dVxtVMOxZuLnhTYauve.png" class="carousel-image" alt="Banner 1">
        </div>
        <!-- Item 2 -->
        <div class="carousel-item hidden">
            <img src="https://dinamikaindomedia.co.id/sliders/u2PFm2n2qRXBOMHyxmfLzrmqmxakLS8vlepkcOWS.png" class="carousel-image" alt="Banner 2">
        </div>
        <!-- Item 3 -->
        <div class="carousel-item hidden">
            <img src="https://dinamikaindomedia.co.id/sliders/kQ6mLDnGCdpCnm1CkxxeIyJehj9Ymjop5pGsZDiu.png" class="carousel-image" alt="Banner 3">
        </div>
        <!-- Item 4 -->
        <div class="carousel-item hidden">
            <img src="https://dinamikaindomedia.co.id/sliders/GCOk0ftAf02OWXzcTXoAZBvWNjho7Eqvo3Fvn53P.png" class="carousel-image" alt="Banner 4">
        </div>
    </div>
    <!-- Slider controls -->
    <button type="button" class="carousel-control prev">
        <svg class="control-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
        </svg>
        <span class="sr-only">Previous</span>
    </button>
    <button type="button" class="carousel-control next">
        <svg class="control-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <span class="sr-only">Next</span>
    </button>
</div>

<style>
html {
    scroll-behavior: smooth;
}

.carousel-container {
    position: relative;
    width: 100%;
    max-width: 8xl;
    height: 100vh;
    overflow: hidden;
}

.carousel-inner {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.carousel-item {
    min-width: 100%;
    display: flex;
    transition: opacity 0.5s ease-in-out;
}

.carousel-item img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures images cover the container */
}

.carousel-item.hidden {
    opacity: 0;
}

.carousel-item.active {
    opacity: 1;
}

.carousel-control {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 48px;
    height: 48px;
    background-color: rgba(0, 0, 0, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 30;
    border-radius: 50%;
}

.carousel-control.prev {
    left: 16px;
}

.carousel-control.next {
    right: 16px;
}

.control-icon {
    width: 24px;
    height: 24px;
    fill: white;
}

.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    border: 0;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.getElementById('carouselExample');
    const items = carousel.querySelectorAll('.carousel-item');
    const prevButton = carousel.querySelector('.prev');
    const nextButton = carousel.querySelector('.next');
    let currentIndex = 0;

    function showSlide(index) {
        items.forEach((item, i) => {
            item.classList.toggle('active', i === index);
            item.classList.toggle('hidden', i !== index);
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % items.length;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        showSlide(currentIndex);
    }

    prevButton.addEventListener('click', prevSlide);
    nextButton.addEventListener('click', nextSlide);

    setInterval(nextSlide, 3000); // Automatic slide every 3 seconds
});
</script>
