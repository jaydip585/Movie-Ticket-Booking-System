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
    $ty=$_POST['type'];
    $pwd=$_POST['password'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql="SELECT password,type FROM user WHERE username='$un'";
    $res=$conn->query($sql);
    $ss=0;
    if($res->num_rows > 0){
    	echo"$ss";
        while ($row = $res->fetch_assoc()) {
        	echo "$ss";
        	if($row['password']==$pwd And $row['type']=='normal' And $row['type']==$ty){
        		$ss=1;
        	}
        	elseif($row['password']==$pwd And $row['type']=='admin' And $row['type']==$ty){
        		$ss=2;
        	}

        }
    }
    else{
    	
    }
    echo "$ss";
    if($ss==1){
    	session_start();
    	$_SESSION["username"]='$un';
    	header("Location: try.php");
    }
    if($ss==2){
    	session_start();
    	$_SESSION["username"]='$un';
    	header("Location: admin1.php");
    }
    else{
    	echo "<div class='alert'>";
  		echo "<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> ";
  		echo "<strong>Username or Password wrong !</strong> .";
		echo "</div>";
		include 'index.html';
    }

?>
</body>
</html>