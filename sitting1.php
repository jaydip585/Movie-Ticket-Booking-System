<?php
  session_start();
  if(empty($_SESSION['username'])){
    if(session_destroy()) {
      header("Location: index.html");
   }
  }
?>
<?php
	$imagename=$_GET['imagename'];
	$servername = "localhost";
  	$username = "root";
  	$password = "";
  	$dbname = "movie";
  	$theater=$_GET['theater'];
  	$time=$_GET['time'];
  	$k=$_GET['k'];
  	$sit='sit';
  	// Create connection
  	$conn = new mysqli($servername, $username, $password, $dbname);
  	// Check connection
  	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
  	} 
  	$detailsit="SELECT * FROM sitting where movieName='$imagename' AND theater='$theater' AND showtime='$time'";
  	$result=$conn->query($detailsit);
  	if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
        	if($row[$sit.$k]==0){
        		$sql="UPDATE sitting SET $sit$k=2  WHERE movieName='$imagename' AND theater='$theater' AND showtime='$time'";
        		if($conn->query($sql)===TRUE){
        			
        		}
        		else{
        			echo "error";
        		}
        	}
        	else{
        		$sql="UPDATE sitting SET $sit$k=0  WHERE movieName='$imagename' AND theater='$theater' AND showtime='$time'";
        		$r=$conn->query($sql);
        	}
        }
    }
  	$conn->close();
  	include 'sitting.php';
?>