<head>
	<script>
		function bpcjs_SubmitAddMember(first,last)
		{
			var response = bpc_SendSyncAJAXRequest("<?php echo "$bpc_plugin_url/requestHandler.php"?>","AddMember|"+first+","+last);
			if(response == 'added')
			{
				var firstCol = document.createElement("td");
				var lastCol  = document.createElement("td");
				var row      = document.createElement("tr");
				firstCol.appendChild(document.createTextNode(first));
				lastCol.appendChild(document.createTextNode(last));
				row.appendChild(firstCol);
				row.appendChild(lastCol);
				document.getElementById('membertable').appendChild(row);
			}
			else
			{
				alert(response);
			}
		}
	</script>
</head>

<?php

function bpc_GetMembers()
{
	include dirname(__FILE__)."/connection.php";
	$conn = sqlsrv_connect($serverName, $connectionInfo);
	$stmt = sqlsrv_query($conn,"SELECT * FROM dbo.members");
	if(!$stmt) { die( print_r( sqlsrv_errors(), true));	}
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){ $return[] = $row; }
	return $return;
}

function bpc_InsertMemberTable()
{
	echo "<table id=\"membertable\" border=\"1\"><b><tr><td>First Name</td><td>Last Name</td></tr></b>";
	foreach(bpc_GetMembers() as $member)
	{
		echo "<tr><td>".$member["FirstName"]."</td><td>".$member["SurName"]."</td></tr>";
	}
	echo "</table>";
}

function bpc_AddMemberForm()
{
	if(current_user_can('publish_posts')) //wordpress user level Author and above can add users
	{
		echo '<b>Add Member</b><br>';
		echo 'First Name: <input type="text" id="FirstName"><br>';
		echo 'Last  Name: <input type="text" id="SurName"><br>';
		echo '<button onclick="bpcjs_SubmitAddMember(document.getElementById(\'FirstName\').value,
							      document.getElementById(\'SurName\').value)">Add Member</button>';
	}
}
?>