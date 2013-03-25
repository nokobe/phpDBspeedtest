<?php

$dbfile = 'test_oo.db';

# start speed test
$i = 0;
$limit = 2000;
$start = microtime(true);
while ($i++ < $limit) {
	$dbh = new SQLiteDatabase($dbfile, 0666, $error);
	if (!$dbh) die ($error);
	$query = $dbh->query('SELECT name, address from  test');
	$result = $query->fetchAll(SQLITE_ASSOC);
#	foreach ($result as $entry) {
#		echo 'Name: ' . $entry['name'] . '  Address: ' . $entry['address']. "\n";
#	}
	$dbh = null;
}

$duration = microtime(true) - $start;

#end speed test

print "OO Duration = $duration\n";
$persec = $i / $duration;
print "OO Iterations per second = $persec\n";

?>
