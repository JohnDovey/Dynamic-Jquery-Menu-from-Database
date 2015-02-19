<?php
// Copyright John Dovey, 2010
// john@justdone.co.za
// Ver 1.1
//
include_once ("dbconnect.php");
//Use some sort of user record to store and/or pass the security level.
if (isset($_REQUEST["seclevel"])) {
    $seclevel = $_REQUEST["seclevel"];
} else {
    $seclevel = 10;
}
if ($_REQUEST["additem"]=="YES"){
	// Add Item
	$parentid=$_REQUEST["parentid"];
	$url=$_REQUEST["url"];
	$desc=$_REQUEST["desc"];
	$name=$_REQUEST["name"];
	$seclevel=$_REQUEST["seclevel"];
	$sortid=$_REQUEST["sortid"];
	$InsertQuery = "INSERT INTO menu (menu.parentid, menu.url, menu.desc, menu.name, menu.seclevel, menu.sortid)
					VALUES ($parentid, '$url', '$desc', '$name', $seclevel, $sortid)";
    $Insert_Result = mysql_query($InsertQuery) or die (mysql_error());
}
?>
<html>
    <head>
        <title>Edit Menu</title>
        <link rel="stylesheet" type="text/css" href="jquery/jqueryslidemenu.css" />
        <script type="text/javascript" src="jquery/jquery-1.3.2.min.js">
        </script>
        <script type="text/javascript" src="jquery/jqueryslidemenu.js">
        </script>
        <link rel="stylesheet" type="text/css" href="default.css">
    </head>
    <body>
        <div id="main" align="center">
        <div align="center">
            <?php include_once ("menu.php"); ?>
        </div>
		<hr style="clear: left"/>
		<table>
			<tr>
				<th>MenuID</th>
				<th>Parent ID</th>
				<th>URL</th>
				<th>Description</th>
				<th>Name</th>
				<th>Sec Level</th>
				<th>Sort ID</th>
			</tr>
        <?php
        editmenu(0);
        ?>
		</table>
		<h2>Add Menu Item</h2>
        <form action="<?=$_SERVER["SCRIPT_NAME"]?>" method="POST" accept-charset="utf-8">
            <table border="1" summary="Add a Menu item to the menu">
                <caption align="top">
                    Add a Menu Item
                </caption>
                <tr>
                    <th>
                        Parent Item
                    </th>
                    <th>
                        Url
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Sec Level
                    </th>
                    <th>
                        Sort ID
                    </th>
                </tr>
                <tr>
                    <td>
                        <select name="parentid">
                            <option value="0">(0) Top Level</option>
                            <?php
                            $query = 'Select * from menu order by menuid ASC ';
                            $result = mysql_query($query) or die('<h3>Query failed: '.mysql_error().'</h3>');
                            while ($row = mysql_fetch_array($result)) {
                                echo '<option value="'.$row["menuid"].'">('.$row["menuid"].') '.$row["name"].'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="url">
                    </td>
                    <td>
                        <input type="text" name="desc">
                    </td>
                    <td>
                        <input type="text" name="name">
                    </td>
                    <td>
                        <input type="text" name="seclevel">
                    </td>
                    <td>
                        <input type="text" name="sortid">
                    </td>
                </tr>
            </table>
            <p>
            	<input type="hidden" name="additem" value="YES">
                <input type="submit" value="Add" />
            </p>
        </form>
    </body>
</html>
<?php
// @Param $mylevel = Menu level
// @Param $myseclevel = Security Level 0=lowest (guest), 10=Highest (admin)
function editmenu($parentid) {
    $query = 'Select * from menu where parentid='.$parentid.' order by sortid ASC ';
    $result = mysql_query($query) or die('<h3>Query failed: '.mysql_error().'</h3>');
    $rowcount = mysql_num_rows($result);
    if ($rowcount < 1) {
        return;
    } else {
		while ($row = mysql_fetch_array($result)) { 
		
		?>
			<tr>
			<td><?=$row["menuid"]?></td>
			<td><?=$row["parentid"]?></td>
            <td><?=$row["url"]?></td>
			<td><?=$row["desc"]?></td>
			<td><?=$row["name"]?></td>
			<td><?=$row["seclevel"]?></td>
			<td><?=$row["sortid"]?></td>
			</tr>
            <?php $tmpparentid = $row["menuid"];
            editmenu($tmpparentid);?>
            
        <?php }
    }
}
?>
