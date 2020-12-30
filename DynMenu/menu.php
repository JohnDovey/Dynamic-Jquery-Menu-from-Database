<?php
// Copyright John Dovey, 2010, 2020
// dovey.john@gmail.com
// Ver 1.2
//
//Use some sort of user record to store and/or pass the security level.
if (isset($_REQUEST["seclevel"])) {
    $seclevel = $_REQUEST["seclevel"];
} else {
    $seclevel = 10;
}
?>
<div id="myslidemenu" class="jqueryslidemenu">
<!-- Menu generated from John Dovey's "Dynamic Jquery Menu From Database" (ver1.2). Contact John at dovet.john@gmail.com for more info or see https://sourceforge.net/projects/dynamicjqueryme/  -->
    <!-- Note: Rather use github for source. Sourceforge will not be uodated -->
    <br style="clear: left"/>
    <?php
    getmenu(0, $seclevel);
    ?>
    <br style="clear: left"/>
</div>
<?php
// @Param $mylevel = Menu level
// @Param $myseclevel = Security Level 0=lowest (guest), 10=Highest (admin)
function getmenu($parentid, $myseclevel) {
    $tmpmyseclevel = $myseclevel + 1;
    $query = 'Select * from menu where parentid='.$parentid.' and seclevel < '.$tmpmyseclevel.' order by sortid ASC ';
    $result = mysql_query($query) or die('<h3>Query failed: '.mysql_error().'</h3>');
    $rowcount = mysql_num_rows($result);
    if ($rowcount < 1) {
        return;
    } else {
        echo "<ul>";
        while ($row = mysql_fetch_array($result)) {
            echo '<li>'.'<a href="'.$row["url"].'" title="'.$row["desc"].'">'.$row["name"]."</a>";
            $tmpparentid = $row["menuid"];
            getmenu($tmpparentid, $myseclevel);
            echo "</li>";
        }
        echo "</ul>";
    }
}
?>
<!-- REST OF BODY CONTENT BELOW HERE -->
