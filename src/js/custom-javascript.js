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


var $container = jQuery('.workshop-container');

$container.masonry({
  
  columnWidth: '.workshop-card',
  fitWidth: true,
  itemSelector: '.workshop-card',
  horizontalOrder: true,
  gutter: 25

});
$(document).ready(function() {
var deferreds = [];
$('img').each(function() {
    if (!this.complete) {
        var deferred = $.Deferred();
        $(this).one('load', deferred.resolve);
        deferreds.push(deferred);
    }
});
$.when.apply($, deferreds).done(function() {
    /* things to do when all images loaded */
  setTimeout(function() {
		$container.masonry('layout');
	}, 0);
});
});

if ($container.length > 0){
 $(".collapse").on('shown.bs.collapse hidden.bs.collapse', function(){
   setTimeout(function() {
		$container.masonry('layout');
	}, 0);
 });
}
//Scroll top when search icon clicked in header
$('#search-trigger').on("click",function(){
  $('html, body').animate({scrollTop:0}, 'slow');
});

// $('.icon-after-collapse').each(function(){
//   icon = $(this);
//   });

  $('.icon-after-collapse').on("click",function(){
    $(this).toggleClass('icon-after-collapse-clicked');
  });

// For Gravity Form
function _(id){ return document.getElementById(id); }

$("#registrationFormBtn").on('click',function(e){
  e.preventDefault();
  var usrselectedDate = $('#usrSelectDate option:selected').val();
  var usrselectedFees = $("input[name='feesSelector']:checked").val();


  setTimeout(function() {
    $('#popmake-2129, #popmake-2049').popmake('open');
   }, 100);

   $("#input_2_21, #input_9_21").val(usrselectedDate);
   $('#input_2_20, #input_9_20').val(usrselectedFees);       
});

// grab an element
var headElem = document.querySelector(".header");
// construct an instance of Headroom, passing the element
var headroom = new Headroom(headElem, {
    // vertical offset in px before element is first unpinned
    "offset": 55,
    "tolerance": 15,
  "classes" : {
    // when element is initialised
    initial : "headroom",
    // when scrolling up
    pinned : "headroom--pinned",
    // when scrolling down
    unpinned : "headroom--unpinned",
    // when above offset
    top : "headroom--top",
    // when below offset
    notTop : "headroom--not-top",
    // when at bottom of scoll area
    bottom : "headroom--bottom",
    // when not at bottom of scroll area
    notBottom : "headroom--not-bottom"
}
});

headroom.init();

jQuery( document ).on( 'click', '.allClick', function() {
	var post_id = jQuery(this).data('id');
	jQuery.ajax({
		url : gfcustom_Ajax_function.ajax_url,
		type : 'post',
		data : {
			category : 'All'
		},
		success : function( response ) {
		 alert(data.category);
		}
	});
})
