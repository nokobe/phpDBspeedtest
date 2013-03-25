<?php

$dbfile = 'db/test.db';
$users = array( 'Mark' => '123 Wavey Lane', 'John' => '000 Donutland Drive' );

if (!$db = new SQLiteDatabase($dbfile, 0666, $error))
	die ($error);
}
sqlite_query($db, 'CREATE TABLE test ( name varchar(10, address varchar(100) )');
foreach ($users as $key => $data ) {
	sqlite_query($db, "INSERT INTO test ( name, address ) VALUES ( $key, $data )");
}
sqlite_close($db);

?>
