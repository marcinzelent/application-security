<?php
	class MyDB extends SQLite3 {
      function __construct() {
         $this->open('comments.db');
      }
   }

	if (isset($_POST['user'], $_POST['comment'])) {
		$user = $_POST['user'];
		$comment = $_POST['comment'];

		$db = new MyDB();

		$sql = 'INSERT INTO Comments VALUES(\'' . $user . '\',\'' . $comment . '\')';
		$ret = $db->exec($sql);
		$db->close();
	}

	echo '<!DOCTYPE HTML><html><head><title>Comments</title>' .
	   	 '<meta charset="utf-8"></head><body><h1>Comments</h1>';

	$db = new MyDB();

	$sql = 'SELECT * FROM Comments';
	$ret = $db->query($sql);
	while ($row = $ret->fetchArray(SQLITE3_ASSOC))
		echo '<p><b>' . $row['user'] . '</b> says:<br>' . $row['comment'] . '</p>';

	$db->close();

	echo '<h2>Add comment</h1><form action="index.php" method="post">' .
		 '<input type="text" name="user" placeholder="User name"><br>' .
		 '<input type="text" name="comment" placeholder="Comment"><br>' .
		 '<input type="submit" value="Add"><br>' .
		 '</form></body></html>';
?>
