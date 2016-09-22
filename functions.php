<?php
   $dbserver="192.168.1.213";
   $dbusr="secanime";
   $dbpass="mmm111";
   $dbname="anime";
   $acon=mysqli_connect($dbserver,$dbusr,$dbpass,$dbname);

function createList(){
  #$acon=mysqli_connect("192.168.1.213","secanime","mmm111","anime");
  global $acon;
  $total=0;
  $result=mysqli_query($acon,"SELECT * FROM AnimeList ORDER BY DateWatched");
  echo "<table width=\"75%\" class=\"table\"><thread>";
  echo "<tr><th>Anime name</th><th>Number of Episodes</th><th>Rating</th></tr></thread><tbody>";
  while($row = mysqli_fetch_array($result))
  {
    echo "<tr><td>" . $row['Name'] . "</td><td>" . $row['Episodes'] . "</td><td>" . $row['Rating'] . "</td><tr>";
    $total=$total+$row['Episodes'];
  }
  echo "</thbody></table>";

  echo "<h2>Grand Total: " . $total . "</h2>";
  echo "<h2>Hours Spent: " . ($total*25)/60 . "</h2>";
}

function insertShow(){
  global $acon;
  #$acon=mysqli_connect("192.168.1.213","secanime","mmm111","anime");
  if(empty($_POST['anotes']))
  {
    $sql="INSERT INTO AnimeList (Name, Episodes, Rating, DateWatched) VALUES ('" . $_POST['atitle'] . "', '" . $_POST['episodenum'] . "', '" . $_POST['arating'] . "', DATE_FORMAT(NOW(),'%Y-%m-%d'))";
  }
  else
  {
    $sql="INSERT INTO AnimeList (Name, Episodes, Rating, Notes, DateWatched) VALUES ('" . $_POST['atitle'] . "', '" . $_POST['episodenum'] . "', '" . $_POST['arating'] . "', '" . $_POST['anotes'] . "', DATE_FORMAT(NOW(),'%Y-%m-%d'))";
  }
  echo $sql;
  mysqli_query($acon,$sql);
  

}

?>

