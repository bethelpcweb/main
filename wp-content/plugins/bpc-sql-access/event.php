<head>
	<script>
		function bpcjs_SubmitAddEvent(type,name,formal)
		{
			var privateData = "TODO";
			var publicData  = "TODO";
			var time        = "2014-04-01 12:00:00"; //TODO
			var response = bpc_SendSyncAJAXRequest("<?php echo "$bpc_plugin_url/requestHandler.php"?>","AddEvent|"+name+","+type+","+privateData+","+publicData+","+time+","+formal);
			if(response == 'added')
			{
				/* TODO
 				var firstCol = document.createElement("td");
				var lastCol  = document.createElement("td");
				var row      = document.createElement("tr");
				firstCol.appendChild(document.createTextNode(first));
				lastCol.appendChild(document.createTextNode(last));
				row.appendChild(firstCol);
				row.appendChild(lastCol);
				document.getElementById('membertable').appendChild(row);
				*/
			}
			else
			{
				alert(response);
			}
		}
	</script>
</head>

<?php

function bpc_GetEvents()
{
	include dirname(__FILE__)."/connection.php";
	$conn = sqlsrv_connect($serverName, $connectionInfo);
	$stmt = sqlsrv_query($conn,"SELECT * FROM dbo.event");
	if(!$stmt) { die( print_r( sqlsrv_errors(), true));	}
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){ $return[] = $row; }
	return $return;
}

function bpc_InsertEventTable()
{
	echo "<table id=\"eventtable\" border=\"1\"><b><tr><td>Type</td><td>Name</td><td>Formal</td><td>Info</td></tr></b>";
	foreach(bpc_GetEvents() as $event)
	{
		echo "<tr><td>".$event["Type"]."</td><td>".$event["Name"]."</td><td>".$event["Formal"]."</td><td>".$event["PrivateData"]."</td></tr>";
	}
	echo "</table>";
}

function bpc_AddEventForm()
{
	if(current_user_can('edit_posts')) //wordpress user level Contributor and above can add events
	{
		echo '<b>Add Event</b><br>';
		echo 'Type:        <input type="text" id="Type"><br>';
		echo 'Name:        <input type="text" id="EventName"><br>';
		echo 'Formal(0/1): <input type="text" id="Formal"><br>';
		echo '<button onclick="bpcjs_SubmitAddEvent(document.getElementById(\'Type\').value,
							    document.getElementById(\'EventName\').value
                                                            document.getElementById(\'Formal\').value)">Add Event</button>';
	}
}
?>