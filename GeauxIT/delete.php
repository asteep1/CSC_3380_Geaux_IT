<!-- Delete entry from the database by id --> 
<?php

$id = $_GET['id'];
$dbname = "GeauxIT";
$conn = mysqli_connect("localhost", "root", "", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM Tickets WHERE id = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: homepage.php'); 
    exit;
} else {
    echo "Error deleting record";
}

?>