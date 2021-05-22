<?php
	if (isset($_POST['deletemenu'])) {
		if (isset($_POST['menuID'])) {
			$menuID = $sqlconnection->real_escape_string($_POST['menuID']);
			$deleteMenuItemQuery = "DELETE FROM tbl_menuitem WHERE menuID = {$menuID}";
			if ($sqlconnection->query($deleteMenuItemQuery) === TRUE) {
				$deleteMenuQuery = "DELETE FROM tbl_menu WHERE menuID = {$menuID}";
				if ($sqlconnection->query($deleteMenuQuery) === TRUE) {
					header("Location: menu.php"); 
					exit();
					} 
				else {
						echo "someting wrong";
						echo $sqlconnection->error;
					}
				} 
			else {
					echo "someting wrong";
					echo $sqlconnection->error;
				}
		}
	}
	

?>