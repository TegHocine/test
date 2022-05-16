<?php require './nav_bar_doc.php';?>
    <main class="content">
        <div class="sliders">
            <section>
                <!------------------------------- Slideshow container -------------------------------->
                <div class="slideshow-container">

<div class="mySlides fade" id="start_page">
  <img src="./img/home/pc.jpg" style="width:100%">
  <div class="text"><a href="./prodpc_page.php" class="slider_link">Voir plus  &#11166;</a></div>
</div>

<div class="mySlides fade">
  <img src="./img/home/imprimante.jpg" style="width:100%;background-color:black;">
  <div class="text"> <a href="./prodimprimante_page.php" class="slider_link">Voir plus  &#11166;</a> </div>
</div>

<div class="mySlides fade">
  <img src="./img/home/accessoire.jpg" style="width:100%">
  <div class="text"><a href="./prodaccessoire_page.php" class="slider_link">Voir plus &#11166;</a></div>
</div>

<div class="mySlides fade">
  <img src="./img/home/portable.jpg" style="width:100%">
  <div class="text"><a href="./prodportable_page.php" class="slider_link">Voir plus  &#11166;</a></div>
</div>
</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
</div>
                

            </section>
        </div>
    <!--.................................products .......................-->
    <section class="product-categories">
         <div class="card_categorie">
        <img src="./img/img_cat/cat1.jpg" alt="categorie" style="width:100%">
        <a href="./prodpc_page.php"> PC &#11166;</a>
          </div>

         <div class="card_categorie">
        <img src="./img/img_cat/cat2.jpg" alt="categorie" style="width:100%">
        <a href="./prodportable_page.php"> Portable &#11166;</a>
          </div>

          <div class="card_categorie">
        <img src="./img/img_cat/cat3.png" alt="categorie" style="width:100%">
        <a href="./prodaccessoire_page.php"> Accessoire &#11166;</a>
          </div>

          <div class="card_categorie">
        <img src="./img/img_cat/cat4.jpg" alt="categorie" style="width:100%">
        <a href="./prodimprimante_page.php"> Imprimante &#11166;</a>
          </div>
    </section>
    </main>
   <?php require './footer_bar_doc.php';?>