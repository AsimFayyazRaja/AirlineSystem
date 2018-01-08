<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.badge {
  padding: 1px 9px 2px;
  font-size: 15px;
  font-weight: bold;
  white-space: nowrap;
  color:antiquewhite;
  background-color: darkred; 
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}
.badge:hover {
  color:indianred;
  text-decoration: bold;
  cursor: pointer;
}
.badge-error {
  background-color: #b94a48;
}


</style>
</head>
<body bgcolor="black">

<div style="color:white">

<h1><span class="badge">About Us </span></h1>
<p>Get ready for a smooth flight:</p>

<div class="slideshow-container">

<div class="mySlides fade">
  <p>The interior of our planes is well designed and looks somewhat like this.</p>
  <img src="../../images/1.jpeg" style="width:50%">
  <div class="text">It’s always good to have enough cash to treat yourself on holiday – and if you end up with a little bit of extra currency left over at the end of your trip, don’t worry! We’ll buy back your travel money when you get home. Simply take out the Travelex Buy Back Plus for only £3.99 before you travel and you can sell us back any leftover notes you have, without any commission and for the same exchange rate that you bought them for.</div>
</div>

<div class="mySlides fade">
  <p>The airport is fully furnished and is totally blooming at night.</p>
  <img src="../../images/2.jpg" style="width:50%">
  <div class="text">If you find yourself in a rush, you’ll be pleased to know that we also have cash points (ATMs) located around Heathrow Airport. These ATMs accept most credit, debit, Maestro and American Express cards, meaning you’ll be able to withdraw both Euros and British Pounds in a flash.</div>
</div>

<div class="mySlides fade">
  <p>The flight is smooth and is carried by best planes and crew.</p>
  <img src="../../images/3.jpg" style="width:50%">
  <div class="text">At Travelex Heathrow, we like to make sure that you get the best deal on your currency. If you do shop around and find a better deal elsewhere, we’re happy to refund you the difference as part of our Price Promise.</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 4 seconds
}
</script>

</body>
</html> 
