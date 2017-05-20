<?php
	require_once 'DBConfig.php';
	$startTime = microtime(true);
	try
	{
		$conn = new PDO($dsn, $user_name, $pwd_connect);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$count = 1;
		
		while($count <= 10000)
		{
			echo "Record : " . $count . "\n";
			$id = uniqid(rand(), true);
			echo "Id : " . $id . "\n";
			$field_1 = uniqid(rand(), true);
			echo "Field 1 : " . $field_1 . "\n";
			$field_2 = uniqid(rand(), true);
			echo "Field 2 : " . $field_2 . "\n";
			$query_statement = $conn->prepare("Insert INTO PDOvsADO.testSpeedDataset(id, field_1, field_2) values(?, ?, ?)");
			$query_statement->bindParam(1, $id, PDO::PARAM_STR, 32);
			$query_statement->bindParam(2, $field_1, PDO::PARAM_STR, 50);
			$query_statement->bindParam(3, $field_2, PDO::PARAM_STR, 50);
			if($query_statement->execute())
			{
				echo 'Inserted Record : ' . $count . "\n";
			}
			else
			{
				echo 'Error : ' . "\n";
			}
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
