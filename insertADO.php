<?php
	include('adodb5/adodb.inc.php');
        $startTime = microtime(true);
	$conn = & NewADOConnection("pdo_mysql://<db_user>:<db_pwd>@localhost/PDOvsADO");
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
		$idIns = $conn->qstr($id);
		$field_1Ins = $conn->qstr($field_1);
		$field_2Ins = $conn->qstr($field_2);
		$query_statement = "Insert INTO PDOvsADO.testSpeedDatasetADO(id, field_1, field_2) values($idIns, $field_1Ins, $field_2Ins)";
             	if($conn->Execute($query_statement) == false)
		{
			echo "Error while inserting record." . $conn->ErrorMsg() . "\n";
		}
		else
		{
			echo "Record Inserted : " . $count . "\n";
		}
		$count = $count + 1;
	}
	$endTime = microtime(true);
	$totalTime = $endTime - $startTime;
	echo "File Name : " . basename(__FILE__, '.php') . "\n";
	echo "Total Execution Time : " . $totalTime . "\n";
?>
