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

<?php
include 'connect.php';

$ime = isset($_POST['ime']) ? $_POST['ime'] : '';
$prezime = isset($_POST['prezime']) ? $_POST['prezime'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$lozinka = isset($_POST['pass']) ? $_POST['pass'] : '';
$hashed_password = password_hash($lozinka, CRYPT_BLOWFISH); 
$razina = 1; 
$registriranKorisnik = '';

$sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";

$stmt = mysqli_stmt_init($dbc); 
if (mysqli_stmt_prepare($stmt, $sql)) 
    { mysqli_stmt_bind_param($stmt, 's', $username); 
    mysqli_stmt_execute($stmt); 
    mysqli_stmt_store_result($stmt); 
    } 
if(mysqli_stmt_num_rows($stmt) > 0){ 
  $msg='Korisničko ime već postoji!'; 
  }
else
  {  
    $sql = "INSERT INTO korisnik (ime, prezime,korisnicko_ime, lozinka, razina)VALUES (?, ?, ?, ?, ?)"; 
    $stmt = mysqli_stmt_init($dbc); 
      if (mysqli_stmt_prepare($stmt, $sql)) { 
        mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina); 
        mysqli_stmt_execute($stmt); 
        $registriranKorisnik = true; } } 
        mysqli_close($dbc); 
?>

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
      <div class="articleWrapper" style="height: 700px;">
        <?php  if($registriranKorisnik == true) { echo '<p>Korisnik je uspješno registriran!</p>'; } else {  ?>
        <section role="main">
          <form enctype="multipart/form-data" action="" method="POST">
            <div class="formItem"> <span id="porukaIme" class="bojaPoruke"></span> <label for="title">Ime: </label>
              <div class="formField"> <input type="text" name="ime" id="ime" class="formField-textual"> </div>
            </div>
            <div class="formItem"> <span id="porukaPrezime" class="bojaPoruke"></span> <label for="about">Prezime:
              </label>
              <div class="formField"> <input type="text" name="prezime" id="prezime" class="formField-textual"> </div>
            </div>
            <div class="formItem"> <span id="porukaUsername" class="bojaPoruke"></span> <label for="content">Korisničko
                ime:</label>
              <?php echo '<br><span class="bojaPoruke">'.$msg.'</span>'; ?> <div class="formField"> <input type="text"
                  name="username" id="username" class="formField-textual"> </div>
            </div>
            <div class="formItem"> <span id="porukaPass" class="bojaPoruke"></span> <label for="pphoto">Lozinka:
              </label>
              <div class="formField"><input type="password" name="pass" id="pass" class="formField-textual"> </div>
            </div>
            <div class="formItem"> <span id="porukaPassRep" class="bojaPoruke"></span> <label for="pphoto">Ponovite
                lozinku:
              </label>
              <div class="formField"> <input type="password" name="passRep" id="passRep" class="formField-textual">
              </div>
            </div>
            <div class="formItem"> <button type="submit" value="Prijava" id="slanje">Prijava</button> </div>
          </form>
        </section>
        <script type="text/javascript">
        document.getElementById("slanje").onclick = function(event) {
          let slanjeForme = true;
          let poljeIme = document.getElementById("ime");
          let ime = document.getElementById("ime").value;
          if (ime.length == 0) {
            slanjeForme = false;
            poljeIme.style.border = "1px dashed red";
            document.getElementById("porukaIme").innerHTML = "<br>Unesite ime!<br>";
          } else {
            poljeIme.style.border = "1px solid green";
            document.getElementById("porukaIme").innerHTML = "";
          }
          let poljePrezime = document.getElementById("prezime");
          let prezime = document.getElementById("prezime").value;
          if (prezime.length == 0) {
            slanjeForme = false;
            poljePrezime.style.border = "1px dashed red";
            document.getElementById("porukaPrezime").innerHTML = "<br>Unesite Prezime!<br>";
          } else {
            poljePrezime.style.border = "1px solid green";
            document.getElementById("porukaPrezime").innerHTML = "";
          }
          let poljeUsername = document.getElementById("username");
          let username = document.getElementById("username").value;
          if (username.length == 0) {
            slanjeForme = false;
            poljeUsername.style.border = "1px dashed red";
            document.getElementById("porukaUsername").innerHTML = "<br>Unesite korisničko ime!<br>";
          } else {
            poljeUsername.style.border = "1px solid green";
            document.getElementById("porukaUsername").innerHTML = "";
          }
          let poljePass = document.getElementById("pass");
          let pass = document.getElementById("pass").value;
          let poljePassRep = document.getElementById("passRep");
          let passRep = document.getElementById("passRep").value;
          if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
            slanjeForme = false;
            poljePass.style.border = "1px dashed red";
            poljePassRep.style.border = "1px dashed red";
            document.getElementById("porukaPass").innerHTML = "<br>Lozinke nisu iste!<br>";
            document.getElementById("porukaPassRep").innerHTML = "<br>Lozinke nisu iste!<br>";
          } else {
            poljePass.style.border = "1px solid green";
            poljePassRep.style.border = "1px solid green";
            document.getElementById("porukaPass").innerHTML = "";
            document.getElementById("porukaPassRep").innerHTML = "";
          }
          if (slanjeForme != true) {
            event.preventDefault();
          }
        };
        </script>
        <?php  }?>

      </div>
      <div class="footer">
        <hr />
        <p>Suevez le Mond</p>
      </div>
    </div>
</body>

</html>