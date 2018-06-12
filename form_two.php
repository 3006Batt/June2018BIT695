<!DOCTYPE html> 
<html><!-- 3006Batt April 2018 -->
<head>
<link rel="stylesheet" href="990.CSS">
<?php 	include 'players_table_load.php';?>
<title>Board Games Aficionados Search Results</title>
<script language="JavaScript" src="formDataValidation.js"></script>
</head>
<body>
<h2>Search Results</h2>
<h2>Member Data</h2>
<?php
$search_term = $_POST['member_data_search'];
$con=get_connection_one_read();
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();}
$result = mysqli_query($con,"SELECT * FROM players WHERE LOWER(CONCAT(membersID, firstName, familyName, email, phone)) LIKE LOWER('%$search_term%')");
echo "<table border='1'><tr><th>Member ID           </th><th>First Name          </th><th>Family Name         </th>";
echo "<th>Email               </th><th>Phone Number        </th></tr>";
$i = 0;
while($row = mysqli_fetch_array($result)){
	echo "<tr><td>" . $row['membersID'] . "</td><td>" . $row['firstName'] . "</td><td>" . $row['familyName'] . "</td>";
	echo "<td>" . $row['email'] . "</td><td>" . $row['phone'] . "</td></tr>";
	$membersID[$i] = $row['membersID']; // Array for the creation of the table for board_games data
	++$i;
}
echo "</table>";
echo "<h2>Board Game Data</h2>";
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();}
echo "<table border='1'><tr><th>Member ID           </th><th>Boardgame           </th><th>Position            </th>";
echo "<th>Notes               </th><th>Date         </th><th>Venue         </th></tr>";
for($ii=0; $ii<$i; $ii++){
	$result = mysqli_query($con,"SELECT * FROM board_games WHERE MemberID = '$membersID[$ii]'");
	while($row = mysqli_fetch_array($result)){
		echo "<tr><td>" . $row['MemberID'] . "</td><td>" . $row['Boardgame'] . "</td><td>" . $row['Position'] . "</td>";
		echo "<td>" . $row['Notes'] . "</td><td>" . $row['date'] . "</td><td>" . $row['Venue'] . "</td></tr>";
	}
}
echo "</table>";

mysqli_close($con);
?>
<form name="form_three" action="index.php" method="post">
<input type="submit" name="action_3" 		value="Return Home">
</form>
</body>
</html>