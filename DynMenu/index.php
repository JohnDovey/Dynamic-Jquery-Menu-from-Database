<?php
// Copyright John Dovey, 2010
// john@justdone.co.za
// Ver 1.1
//
include_once ("dbconnect.php"); // Connect to the Database
?>
<html>
    <head>
        <title>Menu Demo</title>
        <link rel="stylesheet" type="text/css" href="jquery/jqueryslidemenu.css" />
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js">
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
            <hr>
			<p>We can have a whole lot of text here, then decide that we want to include just a piece of the menu into the page.</p>
			<p>You have to manually define the Div with the correct id to ensure that the menu is formatted properly, as we are calling the function without the startup pieces...</p>
            <div align="center">
                <div id="myslidemenu" class="jqueryslidemenu">
                    <br style="clear: left"/>
                    <?php getmenu(11, $seclevel); ?>
                </div>
            </div>
        </div>
    </body>
</html>
