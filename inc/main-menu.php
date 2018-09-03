<script>

var ham = document.querySelectorAll(".ham");
var menuBtn = document.querySelectorAll(".menu-btn");
var search = document.getElementById("search-box");
var header = document.querySelector('.mobile-menu-parent');
var windowWidth = $(window).width();

$("#mobilemenu").on('show.bs.collapse', function(){
  header.classList.toggle('active');
})

$("#mobilemenu").on('shown.bs.collapse', function(){
        ham[0].classList.toggle('active'); ham[1].classList.toggle('active'); 
 });
$("#mobilemenu").on('hidden.bs.collapse', function(){
        ham[0].classList.toggle('active'); ham[1].classList.toggle('active');header.classList.toggle('active');
});


$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (windowWidth < 768){
    if (scroll > 100) {
        $('.logo').addClass("resize");
    } 
      else {
        $('.logo').removeClass("resize");
    }
    } else {
      if (scroll > 100){
        $('.logo').addClass("desktop-resize");
        $('#nav-left li').addClass("resize");
        $('#nav-right li').addClass("resize");
    } 
      else {
      $('.logo').removeClass("desktop-resize");
      $('#nav-right li').removeClass("resize");
      $('#nav-left li').removeClass("resize");
    }
    }
});
</script>
<style>
.logo{
  // background-image: url("https://drive.google.com/uc?export=view&id=1nXxgg6qUEhGWNHosSmMmryok8hoBYj8_");
  background-image: url("https://drive.google.com/uc?export=view&id=1cHEwwTh1TnP1MjWsvfDL33YNcPBrke8N");
  background-size: contain;
  background-repeat:no-repeat;
  background-position:center center;
  min-height:50px;
  min-width:135px;
  width:50%;
  vertical-align:middle;
  transition: all 0.2s linear;
  // margin-right:.5rem;
}
.resize{
  min-height:35px !important;
  transition: all 0.5s ease-in-out;
}
.desktop-resize{
  min-height:45px !important;
  transition: all 0.5s ease-in-out;
}
.menu-btn{
  background-color:white;
  border:0;
  width:50%;
}
 .menu-btn::focus{
    outline:0 !important;
  }
  .mobile-menu-parent{
  overflow:hidden;
  z-index:99;
  border-radius:0 0 15% 15%;
  transition:all 0.3s linear;
}
.mobile-menu-parent.active{
  border-radius:0;
  transition:all 0s linear;
}
.ham {
  cursor: pointer;
  -webkit-tap-highlight-color: transparent;
  transition: transform 400ms;
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.hamRotate.active {
  transform: rotate(45deg);
}
.hamRotate180.active {
  transform: rotate(180deg);
}
.line {
  fill:none;
  transition: stroke-dasharray 400ms, stroke-dashoffset 400ms;
  stroke:#bfbfbf;
  stroke-width:5.5;
  stroke-linecap:round;
}


.ham4 .top {
  stroke-dasharray: 40 121;
}
.ham4 .bottom {
  stroke-dasharray: 40 121;
}
.ham4.active .top {
  stroke-dashoffset: -68px;
}
.ham4.active .bottom {
  stroke-dashoffset: -68px;
}

</style>



<!-- Mobile Menu   -->
  <nav class="mobile-menu-parent sticky-top shadow bg-white flex-row d-block d-md-none" id="header-menu">
    <div class="d-flex justify-content-around align-items-center p-2 w-100" >  
    <button class="menu-btn navbar-toggler d-inline-flex px-1 d-md-none" type="button" onclick="toggleMenu();" data-toggle="collapse" data-target="#mobilemenu" aria-controls="mobilemenu" aria-expanded="false" aria-label="Toggle navigation" >
        <svg class="ham hamRotate ham4" viewBox="0 0 100 100" width="30" >
  <path
        class="line top"
        d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
  <path
        class="line middle"
        d="m 70,50 h -40" />
  <path
        class="line bottom"
        d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
</svg>
 </button>
      
      <div class="logo"></a></div>
      
    <button class="menu-btn navbar-toggler d-inline-flex px-1 justify-content-end d-md-none" type="button"  onclick="toggleMenu();" data-toggle="collapse" data-target="#mobilemenu" aria-controls="mobilemenu" aria-expanded="false" aria-label="Toggle navigation" >
        <svg class="ham hamRotate ham4" viewBox="0 0 100 100" width="30">
  <path
        class="line top"
        d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
  <path
        class="line middle"
        d="m 70,50 h -40" />
  <path
        class="line bottom"
        d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
</svg>
      </button>   
    </div>
<!--     <span class="mobile-search container">
          
      <input type="text" name="search" placeholder="Search" id="search-box" class="">
           
    </span> -->
  <div class="container-fluid bg-white collapse navbar-collapse d-md-none" id="mobilemenu">

       <ul class="navbar-nav mx-auto text-capital text-center py-3">
         <li class="nav-item"><a href="" class="nav-link">about us</a></li>
         <li class="nav-item bg-light"><a href="" class="nav-link">blog</a></li>
         <li class="nav-item"><a href="" class="nav-link">faq</a></li>
         <li class="nav-item bg-light"><a href="" class="nav-link">Workshops</a></li>
         <li class="nav-item"><a href="" class="nav-link">contact us</a></li>
        </ul>
     </div>
  </nav>
<!-- Mobile menu ends -->
  <!-- Desktop Menu Starts -->
  <nav class="navbar d-none d-md-flex sticky-top shadow navbar-light bg-white py-0">
    <div class="container">
    <div class="" id="nav-left">
      <ul class="nav">
          <li class="nav-item px-lg-2">
              <a class="nav-link " href="#">About Us</a>
          </li>
          <li class="nav-item px-lg-2">
              <a class="nav-link" href="#">Blog</a>
          </li>
          <li class="nav-item px-lg-2">
              <a class="nav-link" href="#">FAQ</a>
          </li>
      </ul>
    </div>
    
    <a class="navbar-brand mx-auto" href="#"><div id="logo" class="logo"></div></a>
    
    <div class="" id="nav-right">
      <ul class="nav ml-auto">
          <li class="nav-item px-lg-2 dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Workshops
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Arts & Craft</a>
          <a class="dropdown-item" href="#">Building & Architecture</a>
          <a class="dropdown-item" href="#">Energy</a>
          <a class="dropdown-item" href="#">Sustainability</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Others</a>
        </div>
          </li>
        <li class="nav-item px-lg-2">
              <a class="nav-link" href="#">Contact Us</a>
        </li>
        <li class="nav-item px-lg-2">
            <a class="nav-link" href="#"><span class="fa fa-search"></span></a>
        </li>
      </ul>
    </div>
    </div>
    <!-- Mobile -->
</nav>
  <!-- Desktop Menu Ends -->

