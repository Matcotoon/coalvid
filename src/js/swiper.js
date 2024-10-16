const swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,  // Muestra 3 propiedades al mismo tiempo
    spaceBetween: 10,  // Espacio entre las propiedades en píxeles
    loop: true,  // Opcional: hace que el slider sea infinito
    breakpoints:{
        768:{
            slidesPerView: 2
        },
        1024:{
            slidesPerView: 3
        },

    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
})