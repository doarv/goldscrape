<?php
    echo "get script running";
    // defining main variables
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "root";
    $dbName = "metalDB";
    $dbTable = "gold";
    // connecting and selecting database
    @mysql_connect($dbHost, $dbUser, $dbPass) or die(mysql_error());
    @mysql_select_db($dbName) or die(mysql_error());

    // getting data
    $data = "";
    $res = mysql_query("SELECT ask, bid, date FROM ".$dbTable." ORDER BY date DESC") or die(mysql_error());
    while($row = mysql_fetch_object($res)) {
        $data .= "\nask=".$row->ask.", ";
        $data .= "bid=".$row->bid;
        $data .= "date=".$row->date;
    }
    die($data);
?>