<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
 
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail

	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
require_once 'db.php';
$sql = "SELECT * FROM expensefile";

$records = mysqli_query($con,$sql);



 ?>


?><!DOCTYPE html>
<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"> 
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css ">

</head>
<body>


	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Expense Management</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"></li>
            <li></li>
            <li></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['userEmail']; ?>&nbsp;<span class="caret"></span></a>
              
                <a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 
<br><hr>
	<div id="wrapper">

	<div class="container">
    
    	<div class="page-header">
    	<h3>Expense Management System</h3>
    	</div>
        
        
        <div class="form-group">
              <a href="upload1.php" ><button class="btn btn-primary" >Create Expense</button></a>
            </div>
  
    </div>
    
    </div>
    <hr>
  
   


<div class="container">
<div class="table-responsive">
<table id="mytable" class="table table-bordred table-striped" width="100%" id="table" border="0" cellpadding="0" cellspacing="5" align="center">
                   
                   <thead>
                   
                     <th>ExpenseId1.</th>
                     <th>Category.</th>
                     <th>Vendor Name.</th>
                     <th>Details.</th>
                     <th>ExpenseDate.</th>
                     <th>Name.</th>
                      <th>Amount.</th>
                      <th>CreatedBy.</th>
                      <th>EditedBy.</th>
                      <th>Edit.</th>
                       <th>View.</th>
                   </thead>
    <tbody>
  <!--Use a while loop to make a table row for every DB row-->
        <?php while( $result = mysqli_fetch_array($records)) :
       
        ?>
    
    <tr>


        
        <td><?php echo $result["id"] ?></td>
        <td><?php echo $result["category"] ?></td>
        <td><?php echo $result['vname']; ?></td>
        <td><?php echo $result["text"] ?></td>
        <td><?php echo $result["date"] ?></td>
        <td><?php echo $result["name"] ?></td>
        <td><?php echo $result["amount"] ?></td>
        <td><?php echo $result["createdby"] ?></td>
        <td><?php echo $result["modifiedby"] ?></td>

        <td><a href="update.php?id=<?php echo $result['id']; ?>">update</a></td>
        <td><a href="download.php?id=<?php echo $result['id']; ?>">view</a></td>
    </tr>
          <?php endwhile ?>

    </tbody>
        
</table>
</div>
</div>

  
</body>

<br><hr>
</html>
<?php include_once 'footer.php' ?>





     
           
           <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script> 
           <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
           <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
           <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
           <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
           <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
           <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
           <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>




<script type="text/javascript">
  
$(document).ready(function() {
    $('#mytable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
           'print' ,
            'excelHtml5',
            
            'pdfHtml5'
        ]
    } );
} );
</script>

