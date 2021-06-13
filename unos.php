<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" />
  <title>Document</title>

</head>

<body>
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
    </div>
  </div>
  <div class="postWrapper">
    <div class="formWrapper">
      <form enctype="multipart/form-data" action="query.php" method="POST" onSubmit="validacija()">
        <div class="formItem">
          <span id="porukaTitle" class="errorText"></span>
          <label for="title">Naslov vijesti</label>
          <div class="formField">
            <input type="text" name="title" id="title" class="formField-textual" />
          </div>
        </div>
        <div class="formItem">
          <span id="porukaAbout" class="errorText"></span>
          <label for="about">Kratki sadržaj vijesti (do 50 znakova)</label>
          <div class="formField">
            <textarea name="about" id="about"></textarea>
          </div>
        </div>
        <div class="formItem">
          <span id="porukaContent" class="errorText"></span>
          <label for="content">Sadržaj vijesti</label>
          <div class="formField">
            <textarea name="content" id="content"></textarea>
          </div>
        </div>
        <div class="formItem">
          <span id="porukaSlika" class="errorText"></span>
          <label for="pphoto">Slika: </label>
          <div class="formField">
            <input type="file" accept="image/jpg,image/gif" class="input-text" name="pphoto" id="pphoto" />
          </div>
        </div>
        <div class="formItem">
          <span id="porukaKategorija" class="errorText"></span>
          <label for="category">Kategorija vijesti</label>
          <div class="formField">
            <select name="category" id="category" class="formFieldTextual">
              <option value=""></option>
              <option value="politika">Politika</option>
              <option value="sport">Sport</option>
              <option value="kultura">Kultura</option>
            </select>
          </div>
        </div>
        <div class="formItem">
          <label>Spremiti u arhivu:
            <div class="formField">
              <input type="checkbox" name="archive" />
            </div>
          </label>
        </div>
        <div class="formItem">
          <button type="reset" value="Poništi">Poništi</button>
          <button type="submit" value="Prihvati" id="slanje">Prihvati</button>
        </div>
      </form>
    </div>
  </div>

  <div class="footer">
    <hr />
    <p>Suevez le Mond</p>
  </div>
</body>
<script>
document.getElementById("slanje").onclick = function(event) {
  let slanjeForme = true;

  let poljeTitle = document.getElementById("title");
  let title = document.getElementById("title").value;

  if (title.length < 5 || title.length > 40) {
    slanjeForme = false;
    poljeTitle.style.border = "1px dashed red";
    document.getElementById("porukaTitle").innerHTML = "Naslov vjesti mora imati između 5 i 30 znakova!<br>";
  } else {
    poljeTitle.style.border = "1px solid green";
    document.getElementById("porukaTitle").innerHTML = "";
  }


  let poljeAbout = document.getElementById("about");
  let about = document.getElementById("about").value;
  if (about.length < 10 || about.length > 100) {
    slanjeForme = false;
    poljeAbout.style.border = "1px dashed red";
    document.getElementById("porukaAbout").innerHTML = "Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
  } else {
    poljeAbout.style.border = "1px solid green";
    document.getElementById("porukaAbout").innerHTML = "";
  }

  let poljeContent = document.getElementById("content");
  let content = document.getElementById("content").value;
  if (content.length == 0) {
    slanjeForme = false;
    poljeContent.style.border = "1px dashed red";
    document.getElementById("porukaContent").innerHTML = "Sadržaj mora biti unesen!<br>";
  } else {
    poljeContent.style.border = "1px solid green";
    document.getElementById("porukaContent").innerHTML = "";
  }

  let poljeSlika = document.getElementById("pphoto");
  let pphoto = document.getElementById("pphoto").value;
  if (pphoto.length == 0) {
    slanjeForme = false;
    poljeSlika.style.border = "1px dashed red";
    document.getElementById("porukaSlika").innerHTML = "Slika mora biti unesena!<br>";
  } else {
    poljeSlika.style.border = "1px solid green";
    document.getElementById("porukaSlika").innerHTML = "";
  }

  let poljeCategory = document.getElementById("category");
  if (document.getElementById("category").selectedIndex == 0) {
    slanjeForme = false;
    poljeCategory.style.border = "1px dashed red";
    document.getElementById("porukaKategorija").innerHTML = "Kategorija mora biti odabrana!<br>";
  } else {
    poljeCategory.style.border = "1px solid green";
    document.getElementById("porukaKategorija").innerHTML = "";
  }

  if (slanjeForme != true) {
    event.preventDefault();
  }
}
</script>

</html>