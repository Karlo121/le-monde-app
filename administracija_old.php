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
      <h1 class="headerText">Le Monde</h1>
      <hr />
      <div class="headerLinks">
        <a href="index.php">Home</a>
        <a href="kategorija.php?id=politika">Politique</a>
        <a href="kategorija.php?id=sport">Sport</a>
        <a href="kategorija.php?id=kultura">Kultutra</a>
        <a href="administracija.php">Administracija</a>
        <a href="unos.php">Novi Post</a>
      </div>
    </div>
    <div class="adminWrap">
      <?php 
      $query = "SELECT * FROM clanak";
      $result = mysqli_query($dbc, $query);
      while($row = mysqli_fetch_array($result)) {
        echo '
        <form enctype="multipart/form-data" action="" method="POST">
        <div class="formItem">
           <label for="title">Naslov vjesti:</label> 
           <div class="formField"> 
              <input type="text" name="title" class="formField-textual" value="'.$row['naslov'].'"> 
           </div>
        </div>
        <div class="formItem">
           <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label> 
           <div class="formField"> <textarea name="about" id="" cols="30" rows="10" class="formField-textual">'.$row['sazetak'].'</textarea> </div>
        </div>
        <div class="formItem">
           <label for="content">Sadržaj vijesti:</label> 
           <div class="formField"> <textarea name="content" id="" cols="30" rows="10" class="formField-textual">'.$row['tekst'].'</textarea> </div>
        </div>
        <div class="formItem">
           <label for="pphoto">Slika:</label> 
           <div class="formField"><input type="file" class="input-text" id="pphoto" value="'.$row['slika'].'" name="pphoto"/> <br><img src="' . UPLPATH . $row['slika'] . '" width=100px> </div>
        </div>
        <div class="formItem">
           <label for="category">Kategorija vijesti:</label> 
           <div class="formField">
              <select name="category" id="" class="formField-textual" value="'.$row['kategorija'].'">
                 <option value="sport">Sport</option>
                 <option value="kultura">Kultura</option>
                 <option value="politika">Politika</option>
              </select>
           </div>
        </div>
        <div class="formItem">
        <label>Spremiti u arhivu: 
        <div class="formField">';
        if($row['arhiva'] == 0) 
        { 
          echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?'; 
        } else 
        { 
          echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';
        } 
        echo ' </label> </div> </div> 
        <div class="formItem"> 
        <input type="hidden" name="id" class="formField-textual" value="'.$row['id'].'"> <button type="reset" value="Poništi">Poništi</button> 
        <button type="submit" name="update" value="Prihvati"> Izmjeni</button> 
        <button type="submit" name="delete" value="Izbriši"> Izbriši</button> 
        </div> 
        </form>'; }
      ?>
    </div>
    <div class="footer">
      <hr />
      <p>Suevez le Mond</p>
    </div>
  </div>
</body>
<?php 
     if(isset($_POST['delete']))
     { 
       $id=$_POST['id']; 
       $query = "DELETE FROM clanak WHERE id=$id "; 
       $result = mysqli_query($dbc, $query); 
      }

      if(isset($_POST['update']))
      { 
        $picture = $_FILES['pphoto']['name']; 
        $title=$_POST['title']; 
        $about=$_POST['about']; 
        $content=$_POST['content']; 
        $category=$_POST['category']; 

        if(isset($_POST['archive'])){ $archive=1; }else{ $archive=0; } 

        $target_dir = 'images/'.$picture; 
        move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir); 

        $id=$_POST['id']; 
        $query = "UPDATE clanak SET naslov='$title', sazetak='$about', tekst='$content', slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id "; 
        $result = mysqli_query($dbc, $query); 
      }
?>

</html>