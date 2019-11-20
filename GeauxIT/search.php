<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>GeauxIT</title>
<link href="mainstyles.css" rel="stylesheet">
</head>
<body>
<div id="Web_1920___1" class="">
    <svg class="Path_1" viewBox="0 0 76 1013">
        <path fill="rgba(123,123,123,1)" stroke="rgba(112,112,112,1)" stroke-width="1px" stroke-linejoin="miter" stroke-linecap="butt" stroke-miterlimit="4" shape-rendering="auto" id="Path_1" d="M 0 0 L 76 0 L 76 1013.000061035156 L 0 1013.000061035156 L 0 0 Z">
        </path>
    </svg>
    <svg class="Rectangle_2">
        <rect fill="rgba(70,27,125,1)" stroke="rgba(112,112,112,1)" stroke-width="1px" stroke-linejoin="miter" stroke-linecap="butt" stroke-miterlimit="4" shape-rendering="auto" id="Rectangle_2" rx="0" ry="0" x="0" y="0" width="1920" height="67">
        </rect>
    </svg>
        <svg class="GEAUXIT">
            <pattern elementId="GEAUXIT_A0_Rectangle_3" id="GEAUXIT_A0_Rectangle_3_pattern" x="0" y="0" width="100%" height="100%">
                <image x="0" y="0" width="100%" height="100%" href="geaux_it.png" xlink:href="geaux_it.png"></image>
            </pattern>
            <rect fill="url(#GEAUXIT_A0_Rectangle_3_pattern)" id="GEAUXIT" rx="0" ry="0" x="0" y="0" width="197" height="57">
            </rect>
        </svg>

    <svg class="Rectangle_4">
        <rect fill="rgba(255,255,255,1)" stroke="rgba(112,112,112,1)" stroke-width="1px" stroke-linejoin="miter" stroke-linecap="butt" stroke-miterlimit="4" shape-rendering="auto" id="Rectangle_4" rx="23" ry="23" x="-50" y="0" width="495" height="46">
        </rect>
    </svg>
    <div class="search_bar">
        <form action="search.php" method="POST">
            <input type="text" placeholder="Search" name="search_text" id="search_bar">
            <div class="Search_Button">
                <input type="image" src="search_button.png"/>
            </div>
        </form>
    </div>

<div class = "table">
<table id="table" cellpadding="0" cellspacing="0" width = "100%">
<tr>
<th>Id</th>
<th>Title</th>
<th>Assigned</th>
<th>Summary</th>
<th>Actions</th>
</tr>
<?php
$search_text=$_POST['search_text'];
$search_text=htmlspecialchars($search_text);
$conn = mysqli_connect("localhost", "root", "", "GeauxIT");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM Tickets WHERE (title LIKE '%" .$search_text. "%') OR (user_message LIKE '%" .$search_text. "%')";
$query = mysqli_query($conn,$sql);
if ($query->num_rows > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($query)) {
echo "<tr><td>";
echo $row["id"];
echo "<td>"; 
echo $row["title"];
echo "<td>"; 
echo $row["assigned_tech"];
echo "<td>"; 
echo $row["user_message"];
echo "<td>"; 
echo "<a href='edit.php?id=".$row['id']."'>Update</a><body> &nbsp </body>";
echo "<a href='delete.php?id=".$row['id']."'>Delete</a>";
echo "</td></tr>";
}
echo "</table>";
}
$conn->close();
?>
</table>
</div>


 <div class="Untitled_2">
        <form method="get" action = homepage.php>
            <input type="image" src="home_button.png"/>
        </form>
    </div>
    
    
    <div class="New_Ticket_Button">
        <form method="get" action = newticket.html>
        <input type="image" src="new_ticket_button.png"/>
        </form>
    </div>

    <svg class="settings_icon">
        <pattern elementId="settings_icon_A0_Rectangle_11" id="settings_icon_A0_Rectangle_11_pattern" x="0" y="0" width="100%" height="100%">
            <image x="0" y="0" width="100%" height="100%" href="settings_button.png" xlink:href="settings_button.png"></image>
        </pattern>
        <rect fill="url(#settings_icon_A0_Rectangle_11_pattern)" id="settings_icon" rx="26" ry="26" x="0" y="0" width="53" height="53">
        </rect>
    </svg>
</div>
</body>
</html>