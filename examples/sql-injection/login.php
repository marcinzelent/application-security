<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('users.db');
      }
   }

   if(isset($_POST['email'], $_POST['pass']))
   {
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$db = new MyDB();

	$sql = 'SELECT * FROM Users WHERE email=\''.$email.'\' AND password=\''.$pass.'\'';

	$ret = $db->query($sql);
	while($row = $ret->fetchArray(SQLITE3_ASSOC)) {
		echo 'Logged in as '.$row['email'].'<br>';
	}
	$db->close();
   }
?>
