<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="mydb"; // Database name 
$tbl_name="expensefile"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$sql = "SELECT * FROM $tbl_name";

$res = mysql_query($sql);

?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />

<link rel="stylesheet" href="bootstrap.min.css"/>

</head>
<body>



<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<td>
<table width="400" border="1" cellspacing="0" cellpadding="3">
<tr>
<td colspan="4"><strong>List data from mysql </strong> </td>
</tr>

<tr>
<td align="center"><strong>Exid</strong></td>
<td align="center"><strong>filename</strong></td>
<td align="center"><strong>details</strong></td>
<td align="center"><strong>date</strong></td>
<td align="center"><strong>name</strong></td>
<td align="center"><strong>amount</strong></td>
<td align="center"><strong>created</strong></td>
<td align="center"><strong>modified</strong></td>
</tr>

<?php while( $rows = mysql_fetch_array($res)) :
       print_r($rows);
exit();
        ?>

<tr>
<td><? echo $rows['id']; ?></td>
<td><? echo $rows['file']; ?></td>
<td><? echo $rows['text']; ?></td>
<td><? echo $rows['date']; ?></td>
<td><? echo $rows['name']; ?></td>
<td><? echo $rows['amount']; ?></td>
<td><? echo $rows['createdby']; ?></td>
<td><? echo $rows['modifiedby']; ?></td>

<td align="center"><a href="update.php?id=<? echo $rows['id']; ?>">update</a></td>
</tr>


</table>
</td>
</tr>
</table>
 <?php endwhile ?>

<?php
mysql_close();
?>
 </body>