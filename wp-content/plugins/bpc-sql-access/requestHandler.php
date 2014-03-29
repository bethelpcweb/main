<?php 
require "connection.php";
$input  = file_get_contents("php://input");
$params = explode('|',$input);
$action = $params[0];
switch($action)
{
	case "AddMember":
	{
		$params    = explode(',',$params[1]);
		// TODO: Verification and sanity check of $params
		$conn = sqlsrv_connect($serverName, $connectionInfo);
		if(!$conn)
		{
			print "Could not connect to DB server";
			return;
		}
		$query = "INSERT INTO dbo.members (FirstName,SurName) VALUES (?, ?)";
		$stmt = sqlsrv_query($conn , $query, $params);
		if(!$stmt){
			print "Failed to insert";
			return;
		}
		print "added";
	}
	case "AddEvent":
	{
		$conn = sqlsrv_connect($serverName, $connectionInfo);
		if(!$conn) 
		{
			print "Could not connect";
			return;
		}
		$params    = explode(',',$params[1]);
		// TODO: Verification and sanity check of $params
		$query = "INSERT INTO dbo.event (Name,Type,PrivateData,PublicData,Time,Formal) VALUES (?,?,?,?,?,?)";
		$stmt = sqlsrv_query($conn , $query, $params);
		if(!$stmt){
			print "Failed to insert";
			return;
		}
		print "added";
	}
}
?>