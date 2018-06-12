<?php
//3006Batt April 2018 

include 'players_table_load.php';
$temp = $_POST['action'];
if ($temp == 'Add Player to Member Data') {
	mySQL_players_table_query("INSERT INTO players");
} else if ($temp == 'Remove Player From Member Data'){
	$one = $_POST['memberID'];
    MySql_mysqli_operation("DELETE FROM players  WHERE membersID='$one'");
	MySql_mysqli_operation("DELETE FROM board_games  WHERE memberID='$one'");
} else if ($temp == 'Update Player Member Data'){
	mySQL_players_table_update("UPDATE players SET");
} else {
	echo '<!DOCTYPE html><html><head><script>alert("invalid action triggered");</script></head><body></body></html>';
}
header("Refresh:0; url=index.php");
?>