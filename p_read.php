<?php

$dbfile = 'test_p.db';

$dbfile = 'test_oo.db';

# start speed test
$i = 0;
$limit = 2000;
$start = microtime(true);
while ($i++ < $limit) {
	$dbh = sqlite_open($dbfile, 0666, $error);
	if (!$dbh) die ($error);
	$query = sqlite_query($dbh, 'SELECT name, address from  test');
	$result = sqlite_fetch_all($query, SQLITE_ASSOC);
#	foreach ($result as $entry) {
#		echo 'Name: ' . $entry['name'] . '  Address: ' . $entry['address']. "\n";
#	}
	sqlite_close($dbh);
}
$duration = microtime(true) - $start;

#end speed test

print "Procedural Duration = $duration\n";
$persec = $i / $duration;
print "Procedural Iterations per second = $persec\n";

?>
