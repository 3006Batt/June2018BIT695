<?php
//3006Batt April 2018 
function get_connection_one_read(){
	 return mysqli_connect("127.0.0.1:3306","root","root","assignment2");
}
function get_connection_one_query(){
	 return new mysqli("127.0.0.1:3306","root","root","assignment2");
}
function print_players_table(){
	$con=get_connection_one_read();
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	$result = mysqli_query($con,"SELECT * FROM players");
	echo "<table border='1'><tr><th>Member ID           </th><th>First Name          </th><th>Family Name         </th>";
	echo "<th>Email               </th><th>Phone Number        </th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr><td>" . $row['membersID'] . "</td><td>" . $row['firstName'] . "</td><td>" . $row['familyName'] . "</td>";
		echo "<td>" . $row['email'] . "</td><td>" . $row['phone'] . "</td></tr>";
	}
	echo "</table>";
	mysqli_close($con);
}
function print_board_games_table(){
	$con=get_connection_one_read();
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	$result = mysqli_query($con,"SELECT * FROM board_games");
	echo "<table border='1'><tr><th>Member ID           </th><th>Boardgame           </th><th>Position            </th>";
	echo "<th>Notes               </th><th>Time         </th><th>Date         </th><th>Venue         </th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr><td>" . $row['MemberID'] . "</td><td>" . $row['Boardgame'] . "</td><td>" . $row['Position'] . "</td>";
		echo "<td>" . $row['Notes'] . "</td><td>" . $row['time'] . "</td><td>" . $row['date'] . "</td><td>" . $row['Venue'] . "</td></tr>";
	}
	echo "</table>";
	mysqli_close($con);
}
function print_board_games_available_table(){
	$con=get_connection_one_read();
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	$result = mysqli_query($con,"SELECT * FROM board_games_available");
	echo "<table border='1'><tr><th>Entry ID</th><th>Member ID           </th><th>Name           </th><th>Boardgame           </th></tr>";

	while($row = mysqli_fetch_array($result)){
		$temp0 = $row['MemberID'];
		$result2 = mysqli_query($con,"SELECT firstName FROM players WHERE membersID=$temp0");
		$row2 = mysqli_fetch_array($result2);
		echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['MemberID'] . "</td><td>" . $row2['firstName'] . "</td><td>" . $row['Boardgame'] . "</td></tr>";
	}
	echo "</table>";
	mysqli_close($con);
}
function print_players_games_assignment_table(){
	$con=get_connection_one_read();
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	$result = mysqli_query($con,"SELECT * FROM players_games_assignment");
	echo "<table border='1'><tr><th>Entry ID           </th><th>Name           </th><th>Boardgame           </th></tr>";

	while($row = mysqli_fetch_array($result)){
		$temp0 = $row['MemberID'];
		$result2 = mysqli_query($con,"SELECT firstName FROM players WHERE membersID=$temp0");
		$row2 = mysqli_fetch_array($result2);
		echo "<tr><td>" . $row['ID'] . "</td><td>" . $row2['firstName'] . "</td><td>" . $row['Boardgame'] . "</td></tr>";
	}
	echo "</table>";
	mysqli_close($con);
}
function print_players_score_table(){
	$con=get_connection_one_read();
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	$result = mysqli_query($con,"SELECT * FROM players_score ORDER BY Score DESC");
	echo "<table border='1'><tr><th>Entry ID           </th><th>Name           </th><th>Points           </th></tr>";

	while($row = mysqli_fetch_array($result)){
		$temp0 = $row['MemberID'];
		$result2 = mysqli_query($con,"SELECT firstName FROM players WHERE membersID=$temp0");
		$row2 = mysqli_fetch_array($result2);
		echo "<tr><td>" . $row['ID'] . "</td><td>" . $row2['firstName'] . "</td><td>" . $row['Score'] . "</td></tr>";
	}
	echo "</table>";
	mysqli_close($con);
}
function MySql_mysqli_operation($operation){
	$conn = get_connection_one_query();
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$sql = $conn->query($operation);
	$conn->close();
}
function mySQL_players_table_update($operation){
	$conn = get_connection_one_query();
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$one = $_POST['memberID'];
	$two = $_POST['firstName'];
	$three = $_POST['familyName'];
	$four = $_POST['email'];
	$five = $_POST['phone'];
	$result1 = validateMemberID($one);
	$result2 = validateName($two);
	$result3 = validateName($three);
	$result4 = validateEmail($four);
	$result5 = validatePhNumber($five);
	
	if($result1&& $result2&& $result3&& $result4&& $result5){
		$sql = $conn->query("$operation firstName = '{$two}', familyName = '{$three}', email = '{$four}', phone = '{$five}'
			WHERE membersID = '{$one}'");
	}
	else
		echo '<!DOCTYPE html><html><head><script>alert("There has been a mysterious fault entering the data.");</script></head><body></body></html>';
	$conn->close();
}
function mySQL_players_table_query($operation){
	$conn = get_connection_one_query();
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	/*$one = "123456"; // ***********Code for testing Sever Side validation *********
	$two = "brendan";
	$three = "batt";
	$four = "3006battGmail.com";//Email address here is the fault
	$five = "4157352";*/
	$one = $_POST['memberID'];
	$two = $_POST['firstName'];
	$three = $_POST['familyName'];
	$four = $_POST['email'];
	$five = $_POST['phone'];
	$result1 = validateMemberID($one);
	$result2 = validateName($two);
	$result3 = validateName($three);
	$result4 = validateEmail($four);
	$result5 = validatePhNumber($five);
	
	if($result1&& $result2&& $result3&& $result4&& $result5){
		$sql = $conn->query("$operation (membersID, firstName, familyName, email, phone)
			VALUES ('{$one}','{$two}','{$three}','{$four}','{$five}')");
	}
	else
		echo '<!DOCTYPE html><html><head><script>alert("There has been a mysterious fault entering the data.");</script></head><body></body></html>';
	$conn->close();
}
function mySQL_schedule_table_query($operation){
	$conn = get_connection_one_query();
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$one = $_POST['membersID'];
	$two = $_POST['boardgame'];
	$three = $_POST['position'];
	$four = $_POST['notes'];
	$five = $_POST['time'];
	$six = $_POST['date'];
	$seven = $_POST['venue'];
	$result1 = validateMemberID($one);

	
	if($result1){
		$sql = $conn->query("$operation (MemberID, Boardgame, Position, Notes, time, date, Venue)
			VALUES ('{$one}','{$two}','{$three}','{$four}','{$five}','{$six}','{$seven}')");
	}
	else
		echo '<!DOCTYPE html><html><head><script>alert("There has been a mysterious fault entering the data.");</script></head><body></body></html>';
	$conn->close();
}
function mySQL_games_avaliable_table_query($operation){
	$conn = get_connection_one_query();
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$one = $_POST['membersID'];
	$two = $_POST['boardgame'];
	$result1 = validateMemberID($one);

	
	if($result1){
		$sql = $conn->query("$operation (MemberID, Boardgame)
			VALUES ('{$one}','{$two}')");
	}
	else
		echo '<!DOCTYPE html><html><head><script>alert("There has been a mysterious fault entering the data.");</script></head><body></body></html>';
	$conn->close();
}
function mySQL_schedule_table_update($operation){
	$conn = get_connection_one_query();
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$one = $_POST['membersID'];
	$two = $_POST['boardgame'];
	$three = $_POST['position'];
	$four = $_POST['notes'];
	$five = $_POST['time'];
	$six = $_POST['date'];
	$seven = $_POST['venue'];
	$result1 = validateMemberID($one);;

	
	if($result1){
		$sql = $conn->query("$operation Boardgame = '{$two}', Position = '{$three}', Notes = '{$four}', time = '{$five}', date = '{$six}', Venue = '{$seven}'
			WHERE MemberID = '{$one}'");
	}
	else
		echo '<!DOCTYPE html><html><head><script>alert("There has been a mysterious fault entering the data.");</script></head><body></body></html>';
	$conn->close();
}
function mySQL_games_avaliable_table_update($operation){
	$conn = get_connection_one_query();
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$one = $_POST['id'];
	$two = $_POST['membersID'];
	$three = $_POST['boardgame'];
	$result1 = validateMemberID($one);;

	
	if($result1){
		$sql = $conn->query("$operation MemberID = '{$two}', Boardgame = '{$three}'
			WHERE ID = '{$one}'");
	}
	else
		echo '<!DOCTYPE html><html><head><script>alert("There has been a mysterious fault entering the data.");</script></head><body></body></html>';
	$conn->close();
}
function mySQL_Scoreboard_table_update($operation){
	$conn = get_connection_one_query();
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$one = $_POST['id'];
	$two = $_POST['membersID'];
	$three = $_POST['score'];
	$result1 = validateMemberID($two);;

	
	if($result1){
		$sql = $conn->query("$operation MemberID = '{$two}', Score = '{$three}'
			WHERE ID = '{$one}'");
	}
	else
		echo '<!DOCTYPE html><html><head><script>alert("There has been a mysterious fault entering the data.");</script></head><body></body></html>';
	$conn->close();
}
function mySQL_Scoreboard__table_query($operation){
	$conn = get_connection_one_query();
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$one = $_POST['membersID'];
	$two = $_POST['score'];
	$result1 = validateMemberID($one);

	
	if($result1){
		$sql = $conn->query("$operation (MemberID, Score)
			VALUES ('{$one}','{$two}')");
	}
	else
		echo '<!DOCTYPE html><html><head><script>alert("There has been a mysterious fault entering the data.");</script></head><body></body></html>';
	$conn->close();
}
function validateMemberID($inputID){
    $regex = "/^[a-zA-Z0-9 ]{1,30}$/";
	preg_match($regex, $inputID, $output);
    return $output;
}
function validateName($inputName){
    $regex = "/^[a-zA-Z ]{1,30}$/";
	preg_match($regex, $inputName, $output);
    return $output;
}
function validateEmail($inputEmail){
    $regex = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
	preg_match($regex, $inputEmail, $output);
    return $output;
}
function validatePhNumber($inputPhNumber){
    $regex = "/([0-9\s\-]{7,})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/";
	preg_match($regex, $inputPhNumber, $output);
    return $output;
}
?>

