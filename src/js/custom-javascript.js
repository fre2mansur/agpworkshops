(function($){
  window.onload = function(){classCheck()};
   
    var navbar = document.getElementById("navbar");
    var content = document.getElementById("main");
    var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
      content.classList.add("cmt-5");
    navbar.classList.add("sticky");
    navbar.classList.add("b-edge-shadow");
    navbar.classList.add("p-2");
    navbar.classList.remove("b-edge-no-shadow");
    navbar.classList.remove("p-3");
  } else {
    content.classList.remove("cmt-5");
    navbar.classList.remove("sticky");
    navbar.classList.remove("p-2");
    navbar.classList.add("b-edge-no-shadow");
    navbar.classList.add("p-3");
  }
 }
function classCheck(){
  window.onscroll = function() {myFunction()};
}
})(jQuery);



jQuery(document).ready(function($) {
  var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
  jQuery('.sidebar ul li a').each(function() {
   if (this.href === path) {
    $(this).addClass('active');
   }
  });
 });
