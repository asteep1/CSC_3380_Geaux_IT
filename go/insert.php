<?php
$user_name = $_POST['user_name'];
$user_mail = $_POST['user_mail'];
$user_phone = $_POST['user_phone'];
$title = $_POST['title'];
$user_message = $_POST['user_message'];
$assigned_tech = $_POST['assigned_tech'];
if (!empty($user_name) || !empty($user_mail) || !empty($user_phone) || !empty($title) || !empty($user_message) || !empty($assigned_tech)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "youtube";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $query = "INSERT INTO register (user_name, user_mail, user_phone, title, user_message, assigned_tech) VALUES('$user_name', '$user_mail', '$user_phone', '$title', '$user_message', '$assigned_tech')";
     //Prepare statement
     /*$stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $user_mail);
     $stmt->execute();
     $stmt->bind_result($user_mail);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssisss", $user_name, $user_mail, $user_phone, $title, $user_message, $assigned_tech);
      $stmt->execute();
      */
      $result=mysqli_query($conn , $query);

      if($result)
      {
        header("Location: Web_1920___1.php");
        exit();
      }
      else{
        echo 'Data not updated';
        echo $user_message;
      }


     

     }
     //$stmt->close();
     $conn->close();
    
} else {
 echo "All field are required";
 die();
}
?>