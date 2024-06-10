<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pruebas";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <br>";
/* 
$sql = "SELECT id, description, day FROM days_off";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo $row["id"]. "-" .$row["description"]. "-" . $row["day"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
 */
?>