<?php
//3006Batt April 2018 

include 'players_table_load.php';
$temp = $_POST['action_1'];
if ($temp == 'Clear MySql Database') {
	MySql_mysqli_operation("DROP TABLE players");
	MySql_mysqli_operation("DROP TABLE board_games");
	MySql_mysqli_operation("DROP TABLE board_games_available");
	MySql_mysqli_operation("DROP TABLE players_games_assignment");
	MySql_mysqli_operation("DROP TABLE players_score");
	MySql_mysqli_operation("CREATE TABLE players (membersID VARCHAR(20), firstName VARCHAR(20), familyName VARCHAR(20), email VARCHAR(30), phone VARCHAR(20))");
	MySql_mysqli_operation("CREATE TABLE board_games (MemberID VARCHAR(20), Boardgame VARCHAR(20), Position VARCHAR(20), Notes VARCHAR(30), time VARCHAR(10), date VARCHAR(10), Venue VARCHAR(30))");
	MySql_mysqli_operation("CREATE TABLE board_games_available (ID int NOT NULL AUTO_INCREMENT, MemberID VARCHAR(20), Boardgame VARCHAR(20),PRIMARY KEY (ID))");
	MySql_mysqli_operation("CREATE TABLE players_games_assignment (ID int NOT NULL AUTO_INCREMENT, MemberID VARCHAR(20), Boardgame VARCHAR(20),PRIMARY KEY (ID))");
	MySql_mysqli_operation("CREATE TABLE players_score (ID int NOT NULL AUTO_INCREMENT, MemberID VARCHAR(20), Score VARCHAR(20),PRIMARY KEY (ID))");
} else if ($temp == 'Add Defaults to MySql Database'){ 
	MySql_mysqli_operation("INSERT INTO players(membersID, firstName, familyName, email, phone) VALUES ('3007', 'Brendan', 'Batt', '3007batt@Gmail.com', '0278245555')");
	MySql_mysqli_operation("INSERT INTO players(membersID, firstName, familyName, email, phone) VALUES ('3008', 'Bob', 'Batt', '3008batt@Gmail.com', '0278245556')");
	MySql_mysqli_operation("INSERT INTO players(membersID, firstName, familyName, email, phone) VALUES ('3009', 'Bill', 'Batt', '3009batt@gmail.com', '0278245557')");
	
	MySql_mysqli_operation("INSERT INTO board_games(MemberID, Boardgame, Position, Notes, time, date, Venue) VALUES ('3007', 'Go', 'present', 'null', '1900hrs', '21/02/2018', 'public hall')");
	MySql_mysqli_operation("INSERT INTO board_games(MemberID, Boardgame, Position, Notes, time, date, Venue) VALUES ('3008', 'Catan', 'present', 'null', '1900hrs', '21/02/2018', 'public hall')");
	MySql_mysqli_operation("INSERT INTO board_games(MemberID, Boardgame, Position, Notes, time, date, Venue) VALUES ('3009', 'Chess', 'present', 'null', '1900hrs', '21/02/2018', 'public hall')");
	
	MySql_mysqli_operation("INSERT INTO board_games_available(MemberID, Boardgame) VALUES ('3009', 'Go')");
	MySql_mysqli_operation("INSERT INTO board_games_available(MemberID, Boardgame) VALUES ('3009', 'Catan')");
	MySql_mysqli_operation("INSERT INTO board_games_available(MemberID, Boardgame) VALUES ('3007', 'Catan')");
	MySql_mysqli_operation("INSERT INTO board_games_available(MemberID, Boardgame) VALUES ('3008', 'Chess')");
	
	MySql_mysqli_operation("INSERT INTO players_games_assignment(MemberID, Boardgame) VALUES ('3009', 'Go')");
	MySql_mysqli_operation("INSERT INTO players_games_assignment(MemberID, Boardgame) VALUES ('3009', 'Catan')");
	MySql_mysqli_operation("INSERT INTO players_games_assignment(MemberID, Boardgame) VALUES ('3007', 'Catan')");
	MySql_mysqli_operation("INSERT INTO players_games_assignment(MemberID, Boardgame) VALUES ('3008', 'Chess')");
	
	MySql_mysqli_operation("INSERT INTO players_score(MemberID, Score) VALUES ('3009', '60')");
	MySql_mysqli_operation("INSERT INTO players_score(MemberID, Score) VALUES ('3007', '80')");
	MySql_mysqli_operation("INSERT INTO players_score(MemberID, Score) VALUES ('3008', '90')");
} else {
	echo '<!DOCTYPE html><html><head><script>alert("invalid action triggered");</script></head><body></body></html>';
}
header("Refresh:0; url=index.php");
?>