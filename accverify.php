<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.alert {
		  padding: 20px;
  		  background-color: lightgreen;
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
    $an=$_POST['accno'];
    $imagename=$_POST['imagename'];
    $theater=$_POST['theater'];
    $time=$_POST['time'];
    $sit='sit';
    $b='balance';
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } 
        $detail="SELECT * FROM account where accno='$an'";
        $res=$conn->query($detail);
        if($res->num_rows > 0){
          while ($row = $res->fetch_assoc()) {
          	$detailsit="SELECT * FROM sitting where movieName='$imagename' AND theater='$theater' AND showtime='$time'";
  			$result=$conn->query($detailsit);
  			if($result->num_rows>0){
        		while($row = $result->fetch_assoc()){
        			$k=1;
        			$n=0;
        			while($k<=40){
        			if($row[$sit.$k]==2){
        				$sql="UPDATE sitting SET $sit$k=1  WHERE movieName='$imagename' AND theater='$theater' AND showtime='$time'";
        				if($conn->query($sql)===TRUE){
        					$n++;
        				}
        				else{
        					echo "error";
        				}
        			}
        			$k++;
        			$price=$row['price'];
        			}
        		}
        		echo "<div class='alert'>";
  				echo "<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> ";
  				echo "<strong>Confirm !</strong> Successfully Booked.";
				echo "</div>";
    		}
            $sql="UPDATE account SET $b=$b-($n*$price)  WHERE accno='$an'";
        	$r=$conn->query($sql);
        	include 'try.php';
          }
        }
?>

</body>
</html>