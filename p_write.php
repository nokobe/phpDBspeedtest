<?php

$dbfile = 'test_p.db';

$users = array(
	'Mark' => '123 Wavey Lane',
	'John' => '000 Donutland Drive',
	'Jesse' => 'also 123 Wavey Lane',
	'Jack' => 'Somewhere far, far away');

$dbh = sqlite_open($dbfile, 0666, $error);
if (!$dbh) die ($error);
echo "opened\n";
$ok = sqlite_exec($dbh, 'DROP TABLE test');
if (!$ok) die ($error);
$ok = sqlite_exec($dbh, 'CREATE TABLE test ( name varchar(10), address varchar(100) )');
if (!$ok) die ($error);
echo "created\n";
$i = 0;
$limit = 1000;
while ($i++ < $limit) {
	foreach ($users as $key => $data ) {
		$ok = sqlite_exec($dbh, "INSERT INTO test ( name, address ) VALUES ( '$key', '$data' )", $error);
		if (!$ok) die ($error);
		echo "inserted\n";
	}
}
sqlite_close($dbh);

?>
