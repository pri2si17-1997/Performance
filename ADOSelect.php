<?php
	include('adodb5/adodb.inc.php');
        $startTime = microtime(true);
        $conn = & NewADOConnection("pdo_mysql://<db_user>:<db_pwd>@localhost/PDOvsADO");
        $count = 1;
	$query = "select *from PDOvsADO.testSpeedDatasetADO";
	$resultSet = & $conn->Execute($query);
	if(!$resultSet)
	{
		echo "Error : " . $conn->ErrorMsg() . "\n";
	}
	else
	{
		while(!$resultSet->EOF)
		{
			echo "Record : " . $count . "\n";
			echo "ID : " . $resultSet->fields[0] . "\n";
			echo "Field 1 : " . $resultSet->fields[1] . "\n";
			echo "Field 2 : " . $resultSet->fields[2] . "\n";
			$resultSet->MoveNext();
			$count = $count + 1;
		}
	}
	$endTime = microtime(true);
        $totalTime = $endTime - $startTime;
	echo "File Name : " . basename(__FILE__, '.php') . "\n";
        echo "Total Execution Time : " . $totalTime . "\n";
?>
