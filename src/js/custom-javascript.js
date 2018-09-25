var $ = jQuery;
var ham = document.querySelectorAll(".ham");
var menuBtn = document.querySelectorAll(".menu-btn");
var search = document.getElementById("search-box");
var header = document.querySelector('.mobile-menu-parent');


var windowWidth = $(window).width();


$("#mobilemenu").on('show.bs.collapse', function(){
  header.classList.toggle('active-mobile');
})

$("#mobilemenu").on('shown.bs.collapse', function(){
        ham[0].classList.toggle('active-mobile'); ham[1].classList.toggle('active-mobile'); 
 });
$("#mobilemenu").on('hidden.bs.collapse', function(){
        ham[0].classList.toggle('active-mobile');
        ham[1].classList.toggle('active-mobile');
        header.classList.toggle('active-mobile'); 
        $('#collapseOne').removeClass('show');
});

/*
Mobile Drop Down
*/
var triggers = Array.from(document.querySelectorAll('[data-toggle="collapseDropDown"]'));

window.addEventListener('click', function (ev) {
  var elm = ev.target;
  if (triggers.includes(elm)) {
    var selector = elm.getAttribute('data-target');
    collapse(selector, 'toggle');
  }
}, false);


var fnmap = {
  'toggle': 'toggle',
  'showCollapse': 'add',
  'hide': 'remove' };

var collapse = function collapse(selector, cmd) {
  var targets = Array.from(document.querySelectorAll(selector));
  targets.forEach(function (target) {
    target.classList[fnmap[cmd]]('showCollapse');
  });
  
};

$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (windowWidth < 768){
    if (scroll > 100) {
        $('.logo').addClass("resize");
    } 
      else {
        $('.logo').removeClass("resize");
    }
    } 
});

// //Homepage Gallery Script
// jQuery.fn.random = function() {
//   var randomIndex = Math.floor(Math.random() * 5);  
//   return jQuery(this[randomIndex]);
// };
// var prev;
// var timer = window.setInterval(function () {
//   if(prev){
//       prev.mouseleave();
//   }
//   prev = $('.card-img-overlay').random().mouseenter();
// }, 1000);

// $('.card-img-overlay').hover(function(){
//   $(this).addClass('card-img-overlay-hover');
  
// ;}, function(){
//   $(this).removeClass('card-img-overlay-hover');
  
// })


