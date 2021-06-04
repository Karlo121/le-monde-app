<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Document</title>

</head>

<body>
  <div class="outerWrapper">
    <div class="headerWrapper">
      <h1 class="headerText">Le Monde</h1>
      <hr />
      <div class="headerLinks">
        <a href="index.php">Home</a>
        <a href="https://www.w3schools.com/">Politique</a>
        <a href="https://www.w3schools.com/">Sport</a>
        <a href="https://www.w3schools.com/">Administracija</a>
      </div>
    </div>
  </div>
  <div class="postWrapper">
    <div class="formWrapper">
      <form enctype="multipart/form-data" action="query.php" method="POST">
        <div class="formItem">
          <label for="title">Naslov vijesti</label>
          <div class="formField">
            <input type="text" name="title" class="formField-textual" />
          </div>
        </div>
        <div class="formItem">
          <label for="about">Kratki sadržaj vijesti (do 50 znakova)</label>
          <div class="formField">
            <textarea name="about"></textarea>
          </div>
        </div>
        <div class="formItem">
          <label for="content">Sadržaj vijesti</label>
          <div class="formField">
            <textarea name="content"></textarea>
          </div>
        </div>
        <div class="formItem">
          <label for="pphoto">Slika: </label>
          <div class="formField">
            <input type="file" accept="image/jpg,image/gif" class="input-text" name="pphoto" />
          </div>
        </div>
        <div class="formItem">
          <label for="category">Kategorija vijesti</label>
          <div class="formField">
            <select name="category" id="" class="formFieldTextual">
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
          <button type="submit" value="Prihvati">Prihvati</button>
        </div>
      </form>
    </div>
  </div>

  <div class="footer">
    <hr />
    <p>Suevez le Mond</p>
  </div>
</body>


</html>