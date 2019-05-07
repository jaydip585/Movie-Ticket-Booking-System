<?php
  session_start();
  if(empty($_SESSION['username'])){
    if(session_destroy()) {
      header("Location: index.html");
   }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		ul {
      list-style-type: none;
      margin-left: 59%;
      padding: 0;
      margin-top: -5%;
    }
    ul li{
      display: inline-block;
    }
    ul li a{
      color: white;
    }
    ul li a:hover{
      color: yellow;
    }
    li{
      margin: 8px;
    }
    .logotext{
      color: white;
      font-family: verdana;
      font-size: 30px;
      margin-left: 50px;
    }
    .all{
    	margin-left: 50px;
    }
    .img{
    	padding: 10px;
    }
    .all ul{
    	color: white;
    	margin-top: -45%;
    	margin-left: 35%;
    }
    .all ul li{
    	display: list-item;
    }
    .theater{
    	margin-left: 35%;
    	color: white;
    }
    .table{
    	margin-left: 30px;
    	margin-top: 50px;
    }
    .intable{
    	padding: 5px;
    }
    .tdtable{
    	padding: 5px;
    	border-right: 1px solid white;
    }
    .sitting{
      margin-left: 40%;
      margin-top: 3%;
      color: white;
    }
    .buttonwhite{
      background-color: white;
      border: none;
      color: black;
      padding: 20px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin-top: 5px;
      margin-left: 10px;
      cursor: pointer;
    }
    .buttongreen{
      background-color: green;
      border: none;
      color: black;
      padding: 20px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin-top: 5px;
      margin-left: 10px;
      cursor: pointer;
    }
    .buttonred{
      background-color: red;
      border: none;
      color: black;
      padding: 20px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin-top: 5px;
      margin-left: 10px;
      cursor: pointer;
    }
    .book{
      background-color: white;
      margin-left: 700px;
      margin-right: 490px;
      padding: 10px;
      margin-top: 20px;
      text-align: center;
    }
    .book1{
      text-decoration: none;
      color: black;
    }
</style>
</head>
<body bgcolor="black">
	<div class="header">
    <p class="logotext">Book The Show</p>
    <ul>
      <li><a href="try.php">HOME</a></li>
      <li><a href="#">COMING SOON</a></li>
      <li><a href="#">CONTACT US</a></li>
      <li><a href="#">ABOUT US</a></li>
      <li><a href="logout.php">LOGOUT</a></li>
    </ul>
  	</div>
  	<div class="all">
      <?php
          $imagename=$_GET['imagename'];
		      echo "<img  class='img' src='image/$imagename' width='400px' height='600px'>";
		      echo "<ul>";
  			$servername = "localhost";
  			$username = "root";
  			$password = "";
  			$dbname = "movie";
  			$theater=$_GET['theater'];
  			$time=$_GET['time'];

  			// Create connection
  			$conn = new mysqli($servername, $username, $password, $dbname);
  			// Check connection
  			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
  			} 
  			$detail="SELECT * FROM moviedetail where movieName='$imagename'";
  			$res=$conn->query($detail);
  			if($res->num_rows > 0){
  				while ($row = $res->fetch_assoc()) {
  					 echo"<li>Release-Date : $row[rd]</li>";
					   echo"<li>Genre    : $row[genre]</li>";
					   echo"<li>Director : $row[director]</li>";
					   echo"<li>Starcast : $row[starcast]</li>";
					   echo"<li>show     : $theater  $time</li>";
              $detailsit="SELECT * FROM sitting where movieName='$imagename' AND theater='$theater' AND showtime='$time'";
              $result=$conn->query($detailsit);
              if($result->num_rows>0){
                  //user exists
                  while($row = $result->fetch_assoc()){
                    echo "<li>Price  : $row[price]</li>";
                  }
  				    }
  			  }
        }
  			$conn->close();
			?>
			</ul>
			</div>
			<div class='sitting'>
			<?php 
			$imagename=$_GET['imagename'];
			$servername = "localhost";
  			$username = "root";
  			$password = "";
  			$dbname = "movie";
  			$theater=$_GET['theater'];
  			$time=$_GET['time'];
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
   				//user exists
          while($row = $result->fetch_assoc()){
          $i=1;
          $k=1;
          while($i<=5){
            $j=1;
            while($j<=8){
              if($j==1){
                $abc='A';
              }
              elseif($j==2){
                $abc='B';
              }
              elseif($j==3){
                $abc='C';
              }
              elseif($j==4){
                $abc='D';
              }
              elseif($j==5){
                $abc='E';
              }
              elseif($j==6){
                $abc='F';
              }
              elseif($j==7){
                $abc='G';
              }
              else{
                $abc='H';
              }
              if($row[$sit.$k]==1){
                echo "<a href='#' class='buttongreen'>$i$abc</a>";
              }
              elseif($row[$sit.$k]==2){
                echo "<a href='sitting1.php?imagename=$imagename&theater=$theater&time=$time&k=$k' class='buttonred'>$i$abc</a>";  
              }
              else{
                echo "<a href='sitting1.php?imagename=$imagename&theater=$theater&time=$time&k=$k' class='buttonwhite'>$i$abc</a>";  
              }
              $j++;
              $k++;
            }
            $i++;
            echo "<br/>";
          }
        }
			  }
  			else{

  				
  			}			
	     echo "</div>";
      echo "<div class='book'>";
      echo "<a href='payment.php?imagename=$imagename&theater=$theater&time=$time' class='book1'><b>BOOK TICKET</b></a>";
      echo "</div>";
      $conn->close();
      ?>
</body>
</html>