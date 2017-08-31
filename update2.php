<?php 
require_once'db.php';
require_once 'session.php';

	// the path to store the uploaded image
		$target ="assets/images/".basename($_FILES['file3']['name']);
$file3 = $_FILES['file3']['name'];
$category2 = $_POST['category2'];
$name2 =  $_POST['name2']; 
$amount2 =  $_POST['amount2']; 
//$createdby = $_POST['createdby']; 
$modifiedby =  $_POST['modifiedby']; 
$id = $_POST['id']; 
$text2 = $_POST['text2']; 
$date2 = $_POST['date2'];
$vname2 = $_POST['vname2'];

/*echo "UPDATE expensefile SET category='$category2' ,file='$file3',text='$text2',name='$name2',amount='$amount2',modifiedby='$modifiedby', date=STR_TO_DATE('$date2', '%m/%d/%Y') WHERE id='$id'    ";

exit($_POST['date2']);*/

$query1 = "UPDATE expensefile SET category='$category2' ,text='$text2',date=STR_TO_DATE('$date2', '%m/%d/%Y'),name='$name2',amount='$amount2',createdby='$login_session',modifiedby='$modifiedby' ,vname='$vname2' WHERE id='$id' ";

mysqli_query($con,$query1);
  header("Location: home.php");

if (move_uploaded_file($_FILES['file3']['tmp_name'],$target)) {
			
$query1 = "UPDATE expensefile SET category='$category2' ,file='$file3',text='$text2',date=STR_TO_DATE('$date2', '%m/%d/%Y'),name='$name2',amount='$amount2',createdby='$login_session',modifiedby='$modifiedby' ,vname='$vname2' WHERE id='$id'    ";



mysqli_query($con,$query1);
  header("Location: home.php");
}else
echo 'not updated';


?>

