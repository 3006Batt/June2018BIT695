<?php
//3006Batt April 2018 

include 'players_table_load.php';
$temp = $_POST['action_6'];
if ($temp == 'Clear Scoreboard Data') {
	MySql_mysqli_operation("DROP TABLE players_score");
	MySql_mysqli_operation("CREATE TABLE players_score (ID int NOT NULL AUTO_INCREMENT, MemberID VARCHAR(20), Score VARCHAR(20),PRIMARY KEY (ID))");
} else if ($temp == 'Add Scoreboard Data'){ 
	mySQL_Scoreboard__table_query("INSERT INTO players_score");
} else if ($temp == 'Edit Scoreboard Data'){	
	mySQL_Scoreboard_table_update("UPDATE players_score SET");
} else if ($temp == 'Remove Entry from Scoreboard Data'){
	$one = $_POST['id'];
    MySql_mysqli_operation("DELETE FROM players_score WHERE ID='$one'");
} else {
	echo '<!DOCTYPE html><html><head><script>alert("invalid action triggered");</script></head><body></body></html>';
}
header("Refresh:0; url=index.php");
?>