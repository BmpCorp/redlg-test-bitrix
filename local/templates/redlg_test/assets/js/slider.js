var swiper = new Swiper(".swiper-container", {
    slidesPerView: 3,
    //spaceBetween: 30,
    navigation: {
        prevEl: ".swiper-button-prev",
        nextEl: ".swiper-button-next"
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true
    }
});
