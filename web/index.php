<?php

exec('mode com4: baud=9600 data=8 stop=1 parity=n xon=no');

$switch1 = "";

/* Serial script for pan/tilt Camera with servos */
/* Script by Aneal Khimani, 2-12-10 */

//check the GET action SuperGlobal var to see if an
//action is to be performed

if (isset($_GET['action'])) {

$switch1 = $_GET['action'];

//Action required

switch ($switch1) {
case "on":
$fp = fopen("com4", "w");
fwrite($fp, chr(97));
fclose($fp);
break;

case "off":
$fp = fopen("com4", "w");
fwrite($fp, chr(98));
fclose($fp);
break;


}
}

?>

<html>
<body>
<center>

<p>
<font size="4">Flick Switch</font><br />
<table width="30">
<tr><td><a href="<?=$_SERVER['PHP_SELF'] . "?action=on" ?>">On</a></td><td><?php if($switch1 == 'on'){echo "<b>ON</b>";} ?></td></tr>
<tr><td><a href="<?=$_SERVER['PHP_SELF'] . "?action=off" ?>">Off</a></td><td><?php if($switch1 == 'off'){echo "<b>OFF</b>";} ?></td></tr>
</table>
</p>

</center>
</body>
</html>