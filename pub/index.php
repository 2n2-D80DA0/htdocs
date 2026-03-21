<?php
$conn = new mysqli("localhost","root","","movie_hunter");
$sql = "
INSERT INTO countries (ru_name,en_name) 
VALUES ;";

if($conn->connect_error){
  die("conect failed");
}
echo("conect ok");

// $conn->query($sql);
$conn->close();

?>