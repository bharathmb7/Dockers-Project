<?php

$server_name="dockers-db-1:3306";

$username="root";

$password="example";

$database_name="artx";
$conn=mysqli_connect($server_name,$username,$password,$database_name);
if(!$conn)
{
die("Connection Failed:" . mysqli_connect_error());}

if(isset($_POST['submit']))
{
    // print_r($_POST);

$usn = $_POST['usn'];
$name =$_POST['name'];
$email =$_POST['email'];
$mobno =$_POST['phone'];
$artname =$_POST['aname'];
$artdes =$_POST['description'];


$targetDir = "images/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir.$fileName;
$fileType = pathinfo($fileName, PATHINFO_EXTENSION);

print_r($targetFilePath);

// $image=basename( $_FILES["file"]["name"],".jpg");

if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
echo 'file uploaded successfully';
else
echo 'file not uploaded';
$stmt = "INSERT into art(USN,NAME,EMAIL,MOBILE,ARTNAME,ARTDESC, IMAGE, CREATED) VALUES ('$usn','$name','$email','$mobno','$artname','$artdes','$fileName',NOW())";





// $stmt = "INSERT INTO art(USN,NAME,EMAIL,MOBILE,ARTNAME,ARTDESC,IMAGE,CREATED) VALUES ('$usn','$name','$email','$mobno','$artname','$artdes','NULL',NOW())"; 
// $stmt->execute();
  if (mysqli_query($conn, $stmt)) 
	 {
		echo "New Details Entry inserted successfully !";
	 } 
	 else
     {
		echo "Error: " . mysqli_error($conn);
	 }
	 mysqli_close($conn);
} 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="upload.css" />
    <link rel="stylesheet" href="index.css" />
    <title>Document</title>
  </head>
  <body class="upload">
    <div className="upload-container">
      <div class="navbar-container">
        <div class="navbar-logo">
          <a href="index.php" class="link">ARTIX</a>
        </div>
        <div class="navbar-upload-container">
          <a href="ARTX.php" class="upload-button"> UPLOAD </a>
        </div>
      </div>
      <div class="container">
        <h2 class="brand logo">UPLOAD YOUR ART!</h2>
        <form action="ARTX.php" method="post" enctype="multipart/form-data">
          <div class="row100">
            <div class="col">
              <div class="inputBox">
                <input type="text" name="usn" required="required" />
                <span class="text">USN</span>
                <span class="line"></span>
              </div>
            </div>

            <div class="col">
              <div class="inputBox">
                <input type="text" name="name" required="required" />
                <span class="text">Name</span>
                <span class="line"></span>
              </div>
            </div>

            <div class="col">
              <div class="inputBox">
                <input type="email" name="email" required="required" />
                <span class="text">Email</span>
                <span class="line"></span>
              </div>
            </div>

            <div class="col">
              <div class="inputBox">
                <input
                  type="tel"
                  id="phone"
                  name="phone"
                  pattern="[0-9]{10}"
                  required
                />
                <span class="text">Mobile no.</span>
                <span class="line"></span>
              </div>
            </div>

            <div class="col">
              <div class="inputBox">
                <input type="text" name="aname" required="required" />
                <span class="text">Art Name</span>
                <span class="line"></span>
              </div>
            </div>

            <div class="col">
              <div class="inputBox">
                <input type="text" name="description" required="required" />
                <span class="text">Art Description</span>
                <span class="line"></span>
              </div>
            </div>

            <div class="col">
              <div class="inputBox">
                <input type="File" name="file" required="required" />
                <span class="line"></span>
              </div>
            </div>

          </div>

          

          <!-- <div class="col">
            <div class="inputBox">
              <input id="fileid" type="file" hidden />
              <i
                class="fa fa-upload"
                aria-hidden="true"
                style="font-size: 1.5cm; position: relative; left: 3cm"
              ></i>
              <input id="buttonid" type="button" value="click here to upload" />
            </div>
          </div> -->

          <div class="row100">
            <div class="col">
              <button class="btn" type="submit" name="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
