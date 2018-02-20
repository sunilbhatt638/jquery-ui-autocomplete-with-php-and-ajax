<?php
/*
Author : Sunil Bhatt
*/
require_once("dbclass.php");
if (isset($_REQUEST['countryname']))
{
	$dbConnection = new Connection();
	$sqlquery     = "SELECT id AS id, country AS value from countries WHERE country LIKE '".$_REQUEST['countryname']."%'";
	$getData      = $dbConnection->runQuery($sqlquery);
    /* Toss back results as json encoded array. */
    echo json_encode($getData);
}
?>