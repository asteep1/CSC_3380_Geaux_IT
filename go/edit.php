<!DOCTYPE html>
<html>
<body>
<?php
$id = $_GET['id'];

//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method
$dbname = "youtube";
$conn = mysqli_connect("localhost", "root", "", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "SELECT id, user_name, user_mail, title, assigned_tech , user_message, user_phone FROM register WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {

$user_name=$row["user_name"];




$user_mail= $row["user_mail"];

$user_phone= $row["user_phone"];

$title= $row["title"];

$assigned_tech= $row["assigned_tech"];
 
$user_message= $row["user_message"];


}
$conn->close();
}
?>

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="auststyles.css">
<html lang="en">
<head>
    <script type="text/javascript" src="test.js"></script>
</head>
<body>
<form action="update.php"   method="POST">
    <!--action = "Web_1920___1.html"-->
     <div>
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" value="<?php echo $id; ?>" readonly>
        
    </div>
    <div>
        <label for="name">Name:</label>
        <input type="text" id="user_name" name="user_name" value="<?php echo $user_name; ?>">
    </div>
    <div>
        <label for="mail">E-mail:</label>
        <input type="email" id="user_mail" name="user_mail" value="<?php echo $user_mail; ?>" >
    </div>
    <div>
        <label for="hone">Phone:</label>
        <input type="phone" id="user_phone" name="user_phone" value="<?php echo $user_phone; ?>" >
    </div>
    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $title; ?>" >
    </div>
    <div>
        <label for="msg">Description:</label>
        <textarea id="user_message" name="user_message" > <?php echo $user_message; ?> </textarea>
    </div>
    <div>
        <label for="tech">Technician:</label>
    <select name="assigned_tech" id="assigned_tech">
    	<option value = "<?php echo $assigned_tech; ?>" > <?php echo $assigned_tech; ?></option>
        <option value="Austin Steepleton">Austin Steepleton</option>
        <option value="Sebastian Heilemann">Sebastian Heilemann</option>
        <option value="James Ensminger">James Ensminger</option>
    </select>
    <br><br>
    </div>
 <tr>
 	<center>
    <td><input type="submit" value="Update"></td>
</center>
   </tr>
</form>

</body>
</html>

