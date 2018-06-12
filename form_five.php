<?php
//3006Batt April 2018 

include 'players_table_load.php';
$temp = $_POST['action_5'];
if ($temp == 'Clear Preferred Games Data') {
	MySql_mysqli_operation("DROP TABLE players_games_assignment");
	MySql_mysqli_operation("CREATE TABLE players_games_assignment (ID int NOT NULL AUTO_INCREMENT, MemberID VARCHAR(20), Boardgame VARCHAR(20),PRIMARY KEY (ID))");
} else if ($temp == 'Add Player Preferred Game Data'){ 
	mySQL_games_avaliable_table_query("INSERT INTO players_games_assignment");
} else if ($temp == 'Edit Player Preferred Game Data'){	
	mySQL_games_avaliable_table_update("UPDATE players_games_assignment SET");
} else if ($temp == 'Remove Entry from Preferred Game Data'){
	$one = $_POST['id'];
    MySql_mysqli_operation("DELETE FROM players_games_assignment WHERE ID='$one'");
} else {
	echo '<!DOCTYPE html><html><head><script>alert("invalid action triggered");</script></head><body></body></html>';
}
header("Refresh:0; url=index.php");
?>