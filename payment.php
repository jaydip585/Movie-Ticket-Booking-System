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
    .payment{
      margin-left: 500px;
      color: white;
      font-size: 30px;
    }
    .card{
      font-size: 30px;
      background-color: black;
      color: white;
      text-decoration: none;
    }
    .card:hover{
      color: blue;
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
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "movie";
        $theater=$_GET['theater'];
        $time=$_GET['time'];
        // Create connection
          echo "<img  class='img' src='image/$imagename' width='400px' height='600px'>";
          echo "<ul>";
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
          }
        }
        echo "</ul>";
        echo "</div>";
        echo "<div class='payment'>";
        echo "Payment Option:<br/><br/>";
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type='radio' name=''><a href='creditcard.php?imagename=$imagename&theater=$theater&time=$time' class='card'>Credit Card</a><br/>";
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type='radio' name=''><a href='debitcard.php?imagename=$imagename&theater=$theater&time=$time' class='card'>Debitcard</a><br/>";
        $conn->close();
        ?>
  </div>
  
</body>
</html>