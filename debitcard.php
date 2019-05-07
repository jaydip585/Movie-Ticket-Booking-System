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
    .creditcard{
      margin-left: 550px;
      margin-right: 450px;
      padding: 20px;
      color: white;
      border: 1px solid white;
    }
    #accno{
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    select {
      width: 40%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    #cvv{
      width: 40%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box; 
    }
    #submit{
      width: 50%;
      padding: 12px 20px;
      margin: 8px 0;
      margin-left: 67px;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
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
  <div class="payment">
    Payment Option:<br/><br/>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="radio" name=""><a href="debitcard.php" class="card">Debit Card</a><br/>
  </div>
  <br/>
  <form action="accverify.php" method="POST">
  <div class="creditcard">
    Acc no<br/>
    <input type="text" name="accno" id="accno" placeholder="card no"><br/><br/>
    Expiry &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Cvv<br/>
    <select id="month" name="month">
      <option value="05/20">05/20</option>
      <option value="05/21">05/21</option>
      <option value="05/22">05/22</option>
    </select>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="text" name="cvv" id="cvv" placeholder="cvv"><br/>
    <input type="submit" id="submit" name="submit" value="Confirm">
  </div>
  <?php
    $imagename=$_GET['imagename'];
    $theater=$_GET['theater'];
    $time=$_GET['time'];
    echo "<input type='hidden' name='imagename' value='$imagename'>";
    echo "<input type='hidden' name='theater' value='$theater'>";
    echo "<input type='hidden' name='time' value='$time'>";
  ?>
  </form>
</body>
</html>