<?php
	require_once 'DBConfig.php';
	$startTime = microtime(true);
	try
	{
		$conn = new PDO($dsn, $user_name, $pwd_connect);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $count = 1;
		$query_select = $conn->query("Select *From PDOvsADO.testSpeedDataset");
		$query_select->setFetchMode(PDO::FETCH_ASSOC);
		while($row = $query_select->fetch())
		{
			echo "Record : " . $count . "\n";
			echo "ID : " . $row['id'] . "\n";
			echo "Field 1 : " . $row['field_1'] . "\n";
			echo "Field 2 : " . $row['field_2'] . "\n";
			echo "\n";
			$count = $count + 1;
		}
	}
	catch(PDOException $ex)
	{
		echo "Connection failed..." . $ex->getMessage();
	}
	$endTime = microtime(true);
        $totalTime = $endTime - $startTime;
	echo "File Name : " . basename(__FILE__, '.php') . "\n";
        echo "Total Execution Time : " . $totalTime . "\n";
?>
