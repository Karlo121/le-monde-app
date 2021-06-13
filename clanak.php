<body>
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" />
  <div class="outerWrapper">
    <div class="headerWrapper">
      <h1 class="headerText">Le Monde</h1>
      <hr />
      <div class="headerLinks">
        <a href="index.php">Home</a>
        <a href="kategorija.php?id=politika">Politique</a>
        <a href="kategorija.php?id=sport">Sport</a>
        <a href="kategorija.php?id=kultura">Kultutra</a>
        <a href="prijava.php">Administracija</a>
        <a href="unos.php">Novi Post</a>
      </div>
      <?php include 'connect.php'; 
          define('UPLPATH', 'images/');  ?>
    </div>
    <?php 
        $id=$_GET['id'];
        $query = "SELECT * FROM clanak WHERE id = '$id'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result)
      ?>
    <div class="postWrapper">
      <div class="outerPostWrapper">
        <h3 class="postCategory"><?php echo "<span>".$row['kategorija']."</span>"; ?></h3>
        <h2 class="postHeader">
        </h2>
        <h4 class="postCategory">
          Autor:
          </h3>
          <h4 class="postCategory">
            Objavljeno:<?php echo "<span>".$row['datum']."</span>"; ?>
            </h3>
            <hr />
            <?php echo '<img src="' . UPLPATH . $row['slika'] . '">'; ?>

            <p class="imageCaption">
              <?php echo "<i>".$row['sazetak']."</i>"; ?>
            </p>
            <p>
              <?php echo $row['tekst']; ?>
            </p>
      </div>
    </div>
  </div>
  <div class="footer">
    <hr />
    <p>Suevez le Mond</p>
  </div>
</body>