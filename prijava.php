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
      </div>
    </div>
    <div class="mainWrapper">
      <hr />
      <div class="articleWrapper">
        <section role="main">
          <form enctype="multipart/form-data" action="administracija.php" method="POST">
            <div class="formItem">
              <label for=" title">Username: </label>
              <div class="formField">
                <input type="text" name="username" id="username" class="form-field-textual">
              </div>
            </div>
            <div class="formItem">
              <label for="title">Password: </label>
              <div class="formField">
                <input type="text" name="password" id="password" class="form-field-textual">
              </div>
            </div>
            <div class="formItem">
              <button type="submit" name="prijava" value="prijava" id="slanje">Prijava</button>
            </div>
          </form>
        </section>
      </div>

</body>

</html>