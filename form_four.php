<?php
//3006Batt April 2018 

include 'players_table_load.php';
$temp = $_POST['action_4'];
if ($temp == 'Clear Games Available Data') {
	MySql_mysqli_operation("DROP TABLE board_games_available");
	MySql_mysqli_operation("CREATE TABLE board_games_available (ID int NOT NULL AUTO_INCREMENT, MemberID VARCHAR(20), Boardgame VARCHAR(20),PRIMARY KEY (ID))");
} else if ($temp == 'Add Player Game Data'){ 
	mySQL_games_avaliable_table_query("INSERT INTO board_games_available");
} else if ($temp == 'Edit Player Game Data'){	
	mySQL_games_avaliable_table_update("UPDATE board_games_available SET");
} else if ($temp == 'Remove Entry from Game Data'){
	$one = $_POST['id'];
    MySql_mysqli_operation("DELETE FROM board_games_available WHERE ID='$one'");
} else {
	echo '<!DOCTYPE html><html><head><script>alert("invalid action triggered");</script></head><body></body></html>';
}
header("Refresh:0; url=index.php");
?>