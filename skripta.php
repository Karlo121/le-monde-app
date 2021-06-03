<?php

if (isset($_POST['title']))
 {
    $title=$_POST['title']; 
  }

  if (isset($_POST['about']))
 {
    $about=$_POST['about']; 
  }

  if (isset($_POST['content']))
 {
    $content=$_POST['content']; 
  }
  if (isset($_POST['pphoto']))
 {
    $photo=$_POST['pphoto']; 
  }
  if (isset($_POST['pphoto']))
 {
    $photo=$_POST['pphoto']; 
  }
  if (isset($_POST['category']))
  {
     $category=$_POST['category']; 
   }
?>

<body>
  <link rel="stylesheet" href="style.css" />
  <div class="outerWrapper">
    <div class="headerWrapper">
      <h1 class="headerText">Le Monde</h1>
      <hr />
      <div class="headerLinks">
        <a href="index.html">Home</a>
        <a href="https://www.w3schools.com/">Politique</a>
        <a href="https://www.w3schools.com/">Sport</a>
        <a href="https://www.w3schools.com/">Administracija</a>
      </div>
    </div>

    <div class="postWrapper">
      <div class="outerPostWrapper">
        <h3 class="postCategory"><?php
        echo strtoupper($category);  ?></h3>
        <h2 class="postHeader">
          <?php
        echo strtoupper($title);  ?>
        </h2>
        <h4 class="postCategory">
          Autor:
          </h3>
          <h4 class="postCategory">
            Objavljeno:
            </h3>
            <hr />
            <?php
            echo'<img height="600px" src="images/'.$photo.'">';
            ?>

            <p class="imageCaption">
              <?php
        echo $about;  ?>
            </p>
            <p>
              <?php
              echo $content;
              ?>
            </p>
      </div>
    </div>
  </div>
  <div class="footer">
    <hr />
    <p>Suevez le Mond</p>
  </div>
</body>