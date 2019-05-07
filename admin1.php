<html>
   <head>
      <style type="text/css">
         .admintable{
            width: 600px;
            border: 1px solid white;
            margin-left: 370px;
            margin-top:50px;
         }
         .row{
            height: 50px;
            font-size: 140%;
            font-family: Lucida Console;
         }
         .col{
            width: 200px;
         }
         .ip{
            height: 30px;
            width: 200px;
            border: 1px solid gray;
            background-color: rgb(111, 112, 114);
            color: white;
         }
         .body{
            background-color: black;
            color: white;
         }
         .submit{
            background-color: rgb(215, 217, 221);

         }
      </style>
      <script>
         function validateForm() {
            var x = document.forms["myform"]["moviename"].value;
            if (x == "") {
               alert("You forgot to enter movie name");
               return false;
            }
            x=document.forms["myform"]["releasedate"].value;
            if(x==""){
               alert("you forgot to enter release date");
               return false;
            }
            x=document.forms["myform"]["genre"].value;
            if(x==""){
               alert("you forgot to enter genre");
               return false;   
            }
            x=document.forms["myform"]["director"].value;
            if(x==""){
               alert("you forgot to enter director name");
               return false;   
            }
            x=document.forms["myform"]["starcast"].value;
            if(x==""){
               alert("you forgot to enter starcast");
               return false;   
            }
            x=document.forms["myform"]["showtime"].value;
            if(x.length<8){
               alert("invalid: require:  hh:mm AM/PM");
               return false;   
            }
            if(x==""){
               alert("you forgot to enter Show-time");
               return false;   
            }
            x=document.forms["myform"]["price"].value;
            if(x==""){
               alert("you forgot to enter price");
               return false;   
            }
            return true;
         }
      </script>
   </head>
   <body class="body">
      <p align="right"><a href="logout.php">Logout</a></p>
      <form name="myform" action="admin2.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
         <div class="admintable">
         <table align="center">
            <tr class="row">
               <td class="col">Image</td>
               <td class="col"><input type="file" name="image" /></td>
            </tr>
            <tr class="row">
               <td class="col">Name</td>
               <td class="col"><input type="text" name="moviename" class="ip"></td>
            </tr>
            <tr class="row">
               <td class="col">Release Date</td>
               <td class="col"><input type="date" name="releasedate" class="ip"></td>
            </tr>
            <tr class="row">
               <td class="col">genre</td>
               <td class="col"><input type="text" name="genre" class="ip"></td>
            </tr>
            <tr class="row">
               <td class="col">Director</td>
               <td class="col"><input type="text" name="director" class="ip"></td>
            </tr>
            <tr class="row">
               <td class="col">Star-cast</td>
               <td class="col"><input type="text" name="starcast" class="ip"></td>
            </tr>
            <tr class="row">
               <td class="col">Theater</td>
               <td class="col"><input type="text" name="theater" class="ip"></td>
            </tr>
            <tr class="row">
               <td class="col">Showtime</td>
               <td class="col"><input type="text" name="showtime" class="ip"></td>
            </tr>
            <tr class="row">
               <td class="col">Price</td>
               <td class="col"><input type="text" name="price" class="ip"></td>
            </tr>
            <tr class="row">
               <td class="col"></td>
               <td class="col"><input type="submit" class="submit" /></td>
            </tr>
         </table>
         </div>
      </form>
      
   </body>
</html>