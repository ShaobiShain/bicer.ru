let currentIndex = 0;
const slides = document.querySelectorAll('.slide');
const slideInterval = 8000;
 
function changeSlide() {
  slides[currentIndex].style.opacity = 0;
  currentIndex = (currentIndex + 1) % slides.length;
  slides[currentIndex].style.opacity = 1;
}
 
setInterval(changeSlide, slideInterval);


btn = document.getElementById("cart_btn")
btn.onclick = function(){
  window.location = "./cart.html"
}






