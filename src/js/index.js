/* Carousel */
startCarousel();
function startCarousel() {

  const carouselItems = document.querySelectorAll('.hero-carousel-item');
  let currentItemIndex = 0;
  
  setInterval(()=>{
    carouselItems[currentItemIndex].style.opacity = 0;
    currentItemIndex = (currentItemIndex + 1) % carouselItems.length;
    carouselItems[currentItemIndex].style.opacity = 1;
  }, 4000);

}