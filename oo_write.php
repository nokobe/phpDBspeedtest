<?php

$dbfile = 'test_oo.db';

$users = array(
	'Mark' => '123 Wavey Lane',
	'John' => '000 Donutland Drive',
	'Jesse' => 'also 123 Wavey Lane',
	'Jack' => 'Somewhere far, far away');

$dbh = new SQLiteDatabase($dbfile, 0666, $error);
if (!$dbh) die ($error);
echo "opened\n";
$ok = $dbh->queryExec('DROP TABLE test');
if (!$ok) die ($error);
$ok = $dbh->queryExec('CREATE TABLE test ( name varchar(10), address varchar(100) )');
if (!$ok) die ($error);
echo "created\n";
$i = 0;
$limit = 1000;
while ($i++ < $limit) {
	foreach ($users as $key => $data ) {
		$ok = $dbh->queryExec("INSERT INTO test ( name, address ) VALUES ( '$key', '$data' )", $error);
		if (!$ok) die ($error);
		echo "inserted\n";
	}
}
$dbh = null;
#$dbh->close();
#sqlite_close($dbh);

?>
