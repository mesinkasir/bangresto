
<?php
	include("../functions.php");

	if((!isset($_SESSION['uid']) && !isset($_SESSION['username']) && isset($_SESSION['user_level'])) ) 
		header("Location: login.php");

	if($_SESSION['user_level'] != "staff")
		header("Location: login.php");

	//display none when open /displayorder.php
	if(empty($_GET['cmd'])) 
		die(); 

	//display current order list for kitchen management
	if ($_GET['cmd'] == 'currentorder')	{
		
		$displayOrderQuery =  "
					SELECT o.orderID, m.menuName, OD.itemID,MI.menuItemName,OD.quantity,O.status
					FROM tbl_order O
					LEFT JOIN tbl_orderdetail OD
					ON O.orderID = OD.orderID
					LEFT JOIN tbl_menuitem MI
					ON OD.itemID = MI.itemID
					LEFT JOIN tbl_menu M
					ON MI.menuID = M.menuID
					WHERE O.status 
					IN ( 'waiting','preparing','ready')
				";

			if ($orderResult = $sqlconnection->query($displayOrderQuery)) {
					
				$currentspan = 0;

				//if no order
				if ($orderResult->num_rows == 0) {

					echo "<tr><td class='text-center' colspan='7' >Tidak ada order untuk saat ini </td></tr>";
				}

				else {
					while($orderRow = $orderResult->fetch_array(MYSQLI_ASSOC)) {

						$rowspan = getCountID($orderRow["orderID"],"orderID","tbl_orderdetail"); 

						if ($currentspan == 0)
							$currentspan = $rowspan;

						echo "<tr>";

						if ($currentspan == $rowspan) {
							echo "<td rowspan=".$rowspan."># ".$orderRow['orderID']."</td>";
						}

						echo "
							<td>".$orderRow['menuName']."</td>
							<td>".$orderRow['menuItemName']."</td>
							<td class='text-center'>".$orderRow['quantity']."</td>
						";

						if ($currentspan == $rowspan) {

							$color = "badge badge-warning";
							switch ($orderRow['status']) {
								case 'waiting':
									$color = "badge badge-warning";
									break;
								
								case 'preparing':
									$color = "badge badge-primary";
									break;

								case 'ready':
									$color = "badge badge-success";
									break;
							}

							echo "<td class='text-center' rowspan=".$rowspan."><span class='{$color}'>".$orderRow['status']."</span></td>";
							
							echo "<td class='text-center' rowspan=".$rowspan.">";

							//options based on status of the order
							switch ($orderRow['status']) {
								case 'waiting':
									
									echo "<button onclick='editStatus(this,".$orderRow['orderID'].")' class='btn btn-outline-primary' value = 'preparing'>Prepare</button>";
									echo "<button onclick='editStatus(this,".$orderRow['orderID'].")' class='btn btn-outline-success' value = 'ready'>Ready</button>";

									break;
								
								case 'preparing':
									
									echo "<button onclick='editStatus(this,".$orderRow['orderID'].")' class='btn btn-outline-success' value = 'ready'>Ready</button>";

									break;

								case 'ready':
									
									echo "<button onclick='editStatus(this,".$orderRow['orderID'].")' class='btn btn-outline-warning' value = 'finish'>Clear</button>";

									break;
							}

							echo "<button onclick='editStatus(this,".$orderRow['orderID'].")' class='btn btn-outline-danger' value = 'cancelled'>Cancel</button></td>";

							echo "</td>";

							
						}

						echo "</tr>";

						$currentspan--;
					}
				}	
			}
	}

	//display current ready order list in staff index
	if ($_GET['cmd'] == 'currentready') {

		$latestReadyQuery = "SELECT orderID FROM tbl_order WHERE status IN ( 'finish','ready') ";

		if ($result = $sqlconnection->query($latestReadyQuery)) {

			if ($result->num_rows == 0) {
				echo "<tr><td class='text-center'>Tidak ada order yang status ready. </td></tr>";
			}

            while($latestOrder = $result->fetch_array(MYSQLI_ASSOC)) {
            	echo "<tr><td><i class='fas fa-bell text-danger'></i><b> Order #".$latestOrder['orderID']."</b> is ready.<a href='editstatus.php?orderID=".$latestOrder['orderID']."'><i class='fas fa-check float-right'></i></a></td></tr>";
            }
        }
	}

?>