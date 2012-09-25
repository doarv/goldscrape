<?php
$username = "root";
$password = "root";
$hostname = "localhost";

$dbhandle = mysql_connect($hostname, $username, $password) 
    or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";
#$sql = "INSERT INTO `metalDB`.`US Mint American Eagle Silver Coin (1.000 oz.)` (`ask`, `bid`, `date`) VALUES (\'105\', \'102\', \'2012-09-24 12:39:13\');";

//select a database to work with
$selected = mysql_select_db("metalDB",$dbhandle) 
    or die("Could not select examples");

//execute the SQL query and return records
$result = mysql_query("SELECT ask, bid, date FROM gold");

//fetch tha data from each row in the gold database


$bid = 110.00;
$ask = 111.10;
$date = "2012-09-26 12:39:13";

mysql_query("INSERT INTO gold (bid, ask, date)
VALUES ('$bid', '$ask','$date')");
//close the connection

while ($row = mysql_fetch_array($result)) {
   echo "ask:".$row{'ask'}." bid:".$row{'bid'}."date: ".$row{'date'}."<br>";
}

mysql_close($dbhandle);
?>
