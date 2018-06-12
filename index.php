<!DOCTYPE html> 
<html><!-- 3006Batt April 2018
 <h2>Games Available</h2>



 -->
<head>
<link rel="stylesheet" href="990.CSS">
<?php 	include 'players_table_load.php';?>
<title>Board Games Aficionados</title>
<script language="JavaScript" src="formDataValidation.js"></script>
<script language="JavaScript" src="form3DataValidation.js"></script>
<script language="JavaScript" src="form4DataValidation.js"></script>
<script language="JavaScript" src="form5DataValidation.js"></script>
<script language="JavaScript" src="form6DataValidation.js"></script>
</head>
<body>

<h1>Board Games Aficionados</h1>

<h2>Member Data</h2>
<?php 
	print_players_table();
 ?>
<h2>Member Data Handler</h2>
<form name="form_one" action="/form_one.php"  onsubmit="return form1DataValidation();"    method="post">
<table>
<tr><td>Member ID:</td><td> 	<input type="text" name="memberID" 		size="20" maxlength="80"/> </td></tr>
<tr><td>First name:</td><td>	<input type="text" name="firstName" 	size="20" maxlength="80"/> </td></tr>
<tr><td>Family name:</td><td>	<input type="text" name="familyName" 	size="20" maxlength="80"/> </td></tr>
<tr><td>Email:</td><td>			<input type="text" name="email" 		size="20" maxlength="80"/> </td></tr>
<tr><td>Phone:</td><td>			<input type="text" name="phone" 		size="20" maxlength="80"/> </td></tr>
</table>
<input type="submit" name="action" 		value="Add Player to Member Data">
<input type="submit" name="action" 		value="Remove Player From Member Data">
<input type="submit" name="action" 		value="Update Player Member Data">
</form>
<h2>Games Data / Schedule</h2>
<?php 
	print_board_games_table();
 ?>
<h2>Games Data / Schedule Data Handler</h2> 
<form name="form_three" action="/form_three.php"  onsubmit="return form3DataValidation();"  method="post">
<table>
<tr><td>Member ID:</td><td> 	<input type="text" name="membersID" 		size="20" maxlength="80"/> </td></tr>
<tr><td>Boardgame:</td><td>	<input type="text" name="boardgame" 	size="20" maxlength="80"/> </td></tr>
<tr><td>Position:</td><td>	<input type="text" name="position" 	size="20" maxlength="80"/> </td></tr>
<tr><td>Notes:</td><td>			<input type="text" name="notes" 		size="20" maxlength="80"/> </td></tr>
<tr><td>Time:</td><td>			<input type="text" name="time" 		size="20" maxlength="80"/> </td></tr>
<tr><td>Date:</td><td>			<input type="text" name="date" 		size="20" maxlength="80"/> </td></tr>
<tr><td>Venue:</td><td>			<input type="text" name="venue" 		size="20" maxlength="80"/> </td></tr>
</table>
<input type="submit" name="action_3" 		value="Clear Schedule Data">
<input type="submit" name="action_3" 		value="Add Player to Schedule">
<input type="submit" name="action_3" 		value="Edit Player on Schedule">
<input type="submit" name="action_3" 		value="Remove Player from Schedule">
</form>
<h2>Games Available</h2>
 <?php 
	print_board_games_available_table();
 ?>
<h2>Games Available Data Handler</h2> 
<form name="form_four" action="/form_four.php"  onsubmit="return form4DataValidation();"  method="post">
<table>
<tr><td>ID:</td><td> 	<input type="text" name="id" 		size="20" maxlength="80"/> </td></tr>
<tr><td>Member ID:</td><td>	<input type="text" name="membersID" 	size="20" maxlength="80"/> </td></tr>
<tr><td>Boardgame:</td><td>	<input type="text" name="boardgame" 	size="20" maxlength="80"/> </td></tr>
</table>
<input type="submit" name="action_4" 		value="Clear Games Available Data">
<input type="submit" name="action_4" 		value="Add Player Game Data">
<input type="submit" name="action_4" 		value="Edit Player Game Data">
<input type="submit" name="action_4" 		value="Remove Entry from Game Data">
</form>
 <h2>Players Preferred Games Data</h2>
<?php 
	print_players_games_assignment_table();
 ?>
<h2>Preferred Data Handler</h2> 
<form name="form_five" action="/form_five.php"  onsubmit="return form5DataValidation();"  method="post">
<table>
<tr><td>ID:</td><td> 	<input type="text" name="id" 		size="20" maxlength="80"/> </td></tr>
<tr><td>Member ID:</td><td>	<input type="text" name="membersID" 	size="20" maxlength="80"/> </td></tr>
<tr><td>Boardgame:</td><td>	<input type="text" name="boardgame" 	size="20" maxlength="80"/> </td></tr>
</table>
<input type="submit" name="action_5" 		value="Clear Preferred Games Data">
<input type="submit" name="action_5" 		value="Add Player Preferred Game Data">
<input type="submit" name="action_5" 		value="Edit Player Preferred Game Data">
<input type="submit" name="action_5" 		value="Remove Entry from Preferred Game Data">
</form>
  <h2>Players Scoreboard</h2>
<?php 
	print_players_score_table();
 ?>
<h2>Scoreboard Data Handler</h2> 
<form name="form_six" action="/form_six.php"  onsubmit="return form6DataValidation();"  method="post">
<table>
<tr><td>ID:</td><td> 	<input type="text" name="id" 		size="20" maxlength="80"/> </td></tr>
<tr><td>Member ID:</td><td>	<input type="text" name="membersID" 	size="20" maxlength="80"/> </td></tr>
<tr><td>Score:</td><td>	<input type="text" name="score" 	size="20" maxlength="80"/> </td></tr>
</table>
<input type="submit" name="action_6" 		value="Clear Scoreboard Data">
<input type="submit" name="action_6" 		value="Add Scoreboard Data">
<input type="submit" name="action_6" 		value="Edit Scoreboard Data">
<input type="submit" name="action_6" 		value="Remove Entry from Scoreboard Data">
</form>
<h2>Main Sql Data Handler</h2> 
 <form name="shadow_form" action="/shadow_form.php"  method="post">
<input type="submit" name="action_1" 		value="Clear MySql Database">
<input type="submit" name="action_1" 		value="Add Defaults to MySql Database">
</form>
<h2>Member Data Search</h2>
<form name="form_two" action="/form_two.php"  method="post">
<table>
<tr><td>Search Term:</td><td> 	<input type="text" name="member_data_search" 		size="20" maxlength="80"/> </td></tr>
</table>
<input type="submit" name="action_2" 		value="Search Member Data">
</form>

</body>
</html>
