<!DOCTYPE html>
<html>
<head>
   <title></title>
</head>
<body>
   <?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_name = 'long.file.name.jpg';
      $tmp = explode('.', $file_name);
      $file_ext = end($tmp);
      
      $extensions= array("jpg");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "movie";
      $theater=$_POST['theater'];
      $moviename=$_POST['moviename'];
      $showtime=$_POST['showtime'];
      $price=$_POST['price'];
      $genre=$_POST['genre'];
      $director=$_POST['director'];
      $releasedate=$_POST['releasedate'];
      $starcast=$_POST['starcast'];
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }
      
      if(empty($errors)==true){
         if (file_exists($file_name)) {
            echo "The file $filename exists";
            
            $sql="SELECT * FROM theater WHERE name='$theater' and MovieName='$moviename'";
            $result=$conn->query($sql);
            if($result->num_rows > 0){
               while ($row = $result->fetch_assoc()) {
                  if(is_null('$row[show2]')){
                     $sql1="UPDATE theater SET show2='$showtime' where name='$theater' and MovieName='$moviename'";
                     $res=$conn->query($sql1);
                  }
                  elseif(is_null('$row[show3]')){
                     $sql1="UPDATE theater SET show3='$showtime' where name='$theaterand MovieName='$moviename'";
                     $res=$conn->query($sql1);
                  }
               }
            }
            $sql1="INSERT INTO sitting VALUES ('$moviename','$theater,'$showtime',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'$price')";
            $res=$conn->query($sql1);
            echo "success";
         }
         else {
            move_uploaded_file($file_tmp,"image/".$file_name);
            $sql="INSERT INTO image VALUES('$moviename')";
            $result=$conn->query($sql);
            $sql="INSERT INTO moviedetail VALUES('$moviename','$releasedate,'$genre,'$director','$starcast)";
            $result=$conn->query($sql);
            $sql="INSERT INTO theater VALUES('$theater','$moviename','$showtime')";
            $sql1="INSERT INTO sitting VALUES ('$moviename','$theater','$showtime',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'$price')";
            $res=$conn->query($sql1);
         }
      }
      else{
         print_r($errors)s;
      }
   }
   $conn->close();
   ?>
</body>
</html>