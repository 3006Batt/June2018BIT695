<?php
//3006Batt April 2018 

include 'players_table_load.php';
$temp = $_POST['action_3'];
if ($temp == 'Clear Schedule Data') {
	MySql_mysqli_operation("DROP TABLE board_games");
	MySql_mysqli_operation("CREATE TABLE board_games (MemberID VARCHAR(20), Boardgame VARCHAR(20), Position VARCHAR(20), Notes VARCHAR(30), time VARCHAR(10), date VARCHAR(10), Venue VARCHAR(30))");
} else if ($temp == 'Add Player to Schedule'){ 
	mySQL_schedule_table_query("INSERT INTO board_games");
} else if ($temp == 'Edit Player on Schedule'){	
	mySQL_schedule_table_update("UPDATE board_games SET");
} else if ($temp == 'Remove Player from Schedule'){
	$one = $_POST['membersID'];
    MySql_mysqli_operation("DELETE FROM board_games WHERE MemberID='$one'");	
} else {
	echo '<!DOCTYPE html><html><head><script>alert("invalid action triggered");</script></head><body></body></html>';
}
header("Refresh:0; url=index.php");
?>