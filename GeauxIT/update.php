<!-- Provides the user with prefilled in form that can be edited. Once edited, the
user can update it in the database. -->
<?php
$user_name = $_POST['user_name'];
$user_mail = $_POST['user_mail'];
$user_phone = $_POST['user_phone'];
$title = $_POST['title'];
$user_message = $_POST['user_message'];
$assigned_tech = $_POST['assigned_tech'];
$id = $_POST['id'];
if (!empty($user_name) || !empty($user_mail) || !empty($user_phone) || !empty($title) || !empty($user_message) || !empty($assigned_tech)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "GeauxIT";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    $user_message=mysqli_real_escape_string($conn,$user_message);
    $title=mysqli_real_escape_string($conn,$title);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     
    $query="UPDATE Tickets
            SET 
            user_name = '$user_name',
            user_mail = '$user_mail',
            user_phone = '$user_phone',
            title = '$title',
            user_message = '$user_message', 
            assigned_tech = '$assigned_tech'
            WHERE id = '$id'";
     //Prepare statement
    $result = mysqli_query($conn, $query);
    if($result)
    {
         header("Location: homepage.php");
      exit();

    }
    else{
        echo 'Data not updated';
        echo $user_message;
    }

     }
     $conn->close();
    
} else {
 echo "All field are required";
 die();
}
?>