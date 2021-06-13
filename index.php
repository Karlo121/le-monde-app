<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" />
  <title>Document</title>
  <?php include 'connect.php'; 
          define('UPLPATH', 'images/');  ?>
</head>

<body>
  <div class="outerWrapper">
    <div class="headerWrapper">
      <img src="images/logo.png" alt="logo">
      <hr />
      <div class="headerLinks">
        <a href="index.php">Home</a>
        <a href="kategorija.php?id=politika">Politique</a>
        <a href="kategorija.php?id=sport">Sport</a>
        <a href="kategorija.php?id=kultura">Kultutra</a>
        <a href="prijava.php">Administracija</a>
        <a href="unos.php">Novi Post</a>
        <a href="registracija.php">Registracija</a>
      </div>
    </div>
    <div class="mainWrapper">
      <hr />
      <div class="articleCategory">
        <h2>Politique</h2>
      </div>

      <div class="articleWrapper">
        <?php
            $query = "SELECT * FROM clanak WHERE arhiva=0 AND kategorija='politika' LIMIT 3";
            $result = mysqli_query($dbc, $query);
            $i=0;
            while($row = mysqli_fetch_array($result)) 
            { echo '<article>'; 
              echo '<div class="article">'; 
              echo '<div class="sport_img">'; 
              echo '<img src="' . UPLPATH . $row['slika'] . '"'; 
              echo '</div>'; 
              echo '<div class="media_body">'; 
              echo '<h4 class="title">';  
              echo '<a href="clanak.php?id='.$row['id'].'">'; 
              echo $row['naslov']; 
              echo '</a></h4>'; 
              echo '</div></div>'; 
              echo '</article>'; 
         }?>
      </div>

      <hr />
      <div class="articleCategory">
        <h2>Sport</h2>
      </div>
      <div class="articleWrapper">
        <?php

        $query = "SELECT * FROM clanak WHERE arhiva=0 AND kategorija='sport' LIMIT 3";
        $result = mysqli_query($dbc, $query);
        $i=0;
        while($row = mysqli_fetch_array($result)) 
        { echo '<article>'; 
          echo '<div class="article">'; 
          echo '<div class="sport_img">'; 
          echo '<img src="' . UPLPATH . $row['slika'] . '"'; 
          echo '</div>'; 
          echo '<div class="media_body">'; 
          echo '<h4 class="title">'; 
          echo '<a href="clanak.php?id='.$row['id'].'">'; 
          echo $row['naslov']; 
          echo '</a></h4>'; 
          echo '</div></div>'; 
          echo '</article>'; 
        }?>
      </div>
      <hr />
      <div class="articleCategory">
        <h2>Kultura</h2>
      </div>
      <div class="articleWrapper">
        <?php

        $query = "SELECT * FROM clanak WHERE arhiva=0 AND kategorija='kultura' LIMIT 3";
        $result = mysqli_query($dbc, $query);
        $i=0;
        while($row = mysqli_fetch_array($result)) 
        { echo '<article>'; 
          echo '<div class="article">'; 
          echo '<div class="sport_img">'; 
          echo '<img src="' . UPLPATH . $row['slika'] . '"'; 
          echo '</div>'; 
          echo '<div class="media_body">'; 
          echo '<h4 class="title">'; 
          echo '<a href="clanak.php?id='.$row['id'].'">'; 
          echo $row['naslov']; 
          echo '</a></h4>'; 
          echo '</div></div>'; 
          echo '</article>'; 
        }?>
      </div>
    </div>
    <div class="footer">
      <hr />
      <p>Suevez le Mond</p>
    </div>
  </div>
</body>

</html>