<?php

$server_name="dockers-db-1:3306";

$username="root";

$password="example";

$database_name="artx";
$conn=mysqli_connect($server_name,$username,$password,$database_name);
if(!$conn)
{
die("Connection Failed:" . mysqli_connect_error());}

$query = $conn->query("SELECT * FROM art");

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="upload.css" />
    <title>Aritx</title>
  </head>
  <body >
    <div class="index-container">
    <div class="navbar-container">
      <div class="navbar-logo">
        <a href="index.php" class="link">ARTIX</a>
      </div>
      <div class="navbar-upload-container">
        <a href="ARTX.php" class="upload-button"> UPLOAD </a>
      </div>
    </div>
    <div class="image-container">
      
<?php
if($query->num_rows > 0){
  while($row = $query->fetch_assoc()){
      $imageURL = 'images/'.$row["image"];
?>
<div class="box" id="click">
<img src="<?php echo $imageURL; ?>" alt="" class="image"/>

  </div>
<?php }
}else{ ?>
  <p>No image(s) found...</p>
<?php } ?>
    </div>
</div>
  </body>
</html>

<!-- <script>
  const imageDisplay = document.querySelector(".image-container");
  var path = "images/";
  for (var i = 1; i < 20; i++) {
    const imageDiv = document.createElement("div");
    imageDiv.className = "box";
    imageDiv.setAttribute("id", "click");
    const imageElement = document.createElement("img");
    imageElement.src = path + i + ".jpg";
    imageElement.className = "image";
    imageDiv.append(imageElement);
    imageDisplay.append(imageDiv);
    console.log(i);
  }
</script> -->
