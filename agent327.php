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
  					echo "<li>Release-Date : $row[rd]</li>";
					echo"<li>Genre : $row[genre]</li>";
					echo"<li>Director : $row[director]</li>";
					echo"<li>Starcast : $row[starcast]</li>";
  				}
  			}
			$conn->close();
  			?>
		</ul>
	</div>
	<div class="theater">
		<?php
      $imagename=$_GET['imagename'];
  		$servername = "localhost";
  		$username = "root";
  		$password = "";
  		$dbname = "movie";

  		// Create connection
  		$conn = new mysqli($servername, $username, $password, $dbname);
  		// Check connection
  		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
  		} 
  		$php=".php";
  		$sql = "SELECT name,show1,show2,show3 FROM theater where movieName='$imagename'";
  		$result = $conn->query($sql);

  		if ($result->num_rows > 0) {
    	// output data of each row
      echo "<table class='intable'>";
    	while($row = $result->fetch_assoc()) {
        echo "<tr height='50'>";
        if(!is_null('$row[name]')){
          echo "<td width='200'>$row[name]</td>";
        }
        if(!is_null('$row[show1]')){
          echo "<td width='100'><a href='sitting.php?imagename=$imagename&theater=$row[name]&time=$row[show1]'>$row[show1]</a></td>";  
        }
        if(!is_null('$row[show2]')){
          echo "<td width='100'><a href='sitting.php?imagename=$imagename&theater=$row[name]&time=$row[show2]'>$row[show2]</a></td>";  
        }
        if(!is_null('$row[show3]')){
          echo "<td width='100'><a href='sitting.php?imagename=$imagename&theater=$row[name]&time=$row[show1]'>$row[show3]</a></td>";  
        }
        echo "<tr>";
        }
  		}
      echo "</table>";
  		$conn->close();
  		?>
  		</tr>
  		</table>
	</div>
</body>
</html>