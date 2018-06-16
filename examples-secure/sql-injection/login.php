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

	$sql = $db->prepare('SELECT * FROM Users WHERE email=:email AND password=:pass');
	$sql->bindValue(':email', $email, SQLITE3_TEXT);
	$sql->bindValue(':pass', $pass, SQLITE3_TEXT);

	$ret = $sql->execute();
	while($row = $ret->fetchArray(SQLITE3_ASSOC)) {
		echo 'Logged in as '.$row['email'].'<br>';
	}
	$db->close();
   }
?>
