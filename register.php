<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.alert {
		  padding: 20px;
  		  background-color: red;
  		  color: white;
		}
		.closebtn {
	 	margin-left: 15px;
	 	color: white;
	 	font-weight: bold;
	 	float: right;
	 	font-size: 22px;
  	   	line-height: 20px;
  		cursor: pointer;
  		transition: 0.3s;
		}

		.closebtn:hover {
		  color: black;
		}
	</style>
</head>
<body>
	<?php
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movie";
    $un=$_POST['username'];
    $em=$_POST['email'];
    $ty=$_POST['type'];
    $pwd=$_POST['password'];
    $mo=$_POST['mono'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql="INSERT INTO user VALUES('$un','$em','$pwd','$ty','$mo')";
    $sql1="SELECT * FROM user WHERE username='$un'";
    $res1=$conn->query($sql1);
    if($res1->num_rows<=0){
        $res=$conn->query($sql);   
        include 'index.html'; 
    }
    else{
        echo "<div class='alert'>";
        echo "<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> ";
        echo "<strong>User ALready exist !</strong> .";
        echo "</div>";
        include 'index.html';   
    }
    
   

?>
</body>
</html>