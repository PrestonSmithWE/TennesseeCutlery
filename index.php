<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width-device-width, intital-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="style.scss">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    


</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
   </body>
</html>

<!-- navbar -->  
<nav class="navbar navbar-expand-lg fixed-top ">  
 <a class="navbar-brand" href="#">Home</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">  
 <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse " id="navbarSupportedContent">     <ul class="navbar-nav mr-4">
 <li class="nav-item">
     <a class="nav-link" data-value="about" href="Home">About</a>        
   </li>  
<li class="nav-item">
    <a class="nav-link " data-value="portfolio"href="#">Portfolio</a>    
 </li>
 <li class="nav-item"> 
    <a class="nav-link " data-value="blog" href="#">Blog</a>         </li>   
<li class="nav-item">  
   <a class="nav-link " data-value="team" href="#">         Team</a>       </li>  
<li class="nav-item"> 
 <a class="nav-link " data-value="contact" href="ContactUs.php">ContactUs</a>       </li> 
</ul> 
</div>

</nav>



<p style="text-align:center;"><img src="./image0 (1).jpeg" alt="TNCulterylogo" width="500" height="300">
</p>
<?php
require "./head.php"
?>
<link rel="stylesheet" href="style.css">

<?php function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "Vegito44!";
 $db = "aurora";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }

function CloseCon($conn)
 {
 $conn -> close();
 }
 $conn = OpenCon();
 $sql = "select a.knivename as name,b.KnifeImageUrl as url
 ,c.description as descr
 from knives a
 join  knifeimage b on
    a.idKnives = b.knifeID
join  knifedescription c on
    a.idKnives = c.KnifeID
 ";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
    echo "<table class='table table-striped table-responsive'>
    <thead>
    <tr>
    <th>name</th>
    <th>image</th>
    <th>description</th>
    </thead>
    <tbody>";
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>". $row["name"]. "</td><td><a href='" . $row["url"]. "'>". $row["url"]."</a></td><td>" . $row["descr"]. "</td>";
    echo "</tr>";
    }
    echo "
    </tbody>
    </table >";
 } else {
   echo "0 results";
 }
 $conn->close();


?>

