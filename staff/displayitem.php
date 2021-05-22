<?php
	include("../functions.php");
	
	if((!isset($_SESSION['uid']) && !isset($_SESSION['username']) && isset($_SESSION['user_level'])) ) 
		header("Location: login.php");

	if($_SESSION['user_level'] != "staff")
		header("Location: login.php");
	if (isset($_POST['btnMenuID'])) {

		$menuID = $sqlconnection->real_escape_string($_POST['btnMenuID']);

		$menuItemQuery = "SELECT itemID,menuItemName FROM tbl_menuitem WHERE menuID = " . $menuID;

		if ($menuItemResult = $sqlconnection->query($menuItemQuery)) {
			if ($menuItemResult->num_rows > 0) {
				$counter = 0;
				while($menuItemRow = $menuItemResult->fetch_array(MYSQLI_ASSOC)) {

					if ($counter >=4) {
						echo "</tr>";
						$counter = 0;
					}

					if($counter == 0) {
						echo "<tr>";
					}

					echo "<td class='p-3'><button class='btn btn-warning bg-dark text-white ' onclick = 'setQty({$menuItemRow['itemID']})'><i class='fas fa-hamburger'></i><br/> {$menuItemRow['menuItemName']}</button></td>";

					$counter++;
				}
			}

			else {
				echo "<tr><td>Tidak ada menu tersedia.</td></tr>";
			}
			
		}
	}

	if (isset($_POST['btnMenuItemID']) && isset($_POST['qty'])) {

		$menuItemID = $sqlconnection->real_escape_string($_POST['btnMenuItemID']);
		$quantity = $sqlconnection->real_escape_string($_POST['qty']);

		$menuItemQuery = "SELECT mi.itemID,mi.menuItemName,mi.price,m.menuName FROM tbl_menuitem mi LEFT JOIN tbl_menu m ON mi.menuID = m.menuID WHERE itemID = " . $menuItemID;

		if ($menuItemResult = $sqlconnection->query($menuItemQuery)) {
			if ($menuItemResult->num_rows > 0) {
				if ($menuItemRow = $menuItemResult->fetch_array(MYSQLI_ASSOC)) {
					echo "
					<tr>
						<input type = 'hidden' name = 'itemID[]' value ='".$menuItemRow['itemID']."'/>
						<td>".$menuItemRow['menuName']." : ".$menuItemRow['menuItemName']."</td>
						<td>".$menuItemRow['price']."</td>
						<td><input type = 'number' required='required' min='1' max='50' name = 'itemqty[]' width='10px' class='form-control' value ='".$quantity."'/></td>
						<td>" . number_format((float)$menuItemRow['price'] * $quantity, 2, '.', '') . "</td>
						<td><button class='btn btn-danger bg-danger deleteBtn' type='button' onclick='deleteRow()'>x</button></td>
						</tr>
					";
				}
			}

			else {
				//no data retrieve
				echo "null";
			}
			
		}

	}
	
?>