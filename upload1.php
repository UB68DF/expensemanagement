<?php

require_once 'dbconnect.php';
$result = mysql_query("SELECT * FROM `vendor`  ");
$result1 = mysql_query("SELECT c_name FROM category");
$result2 = mysql_query("SELECT userName FROM users");
$msg="";

//if uploadbutton is striked..
if (isset($_POST['upload']))
{
	# code...

	// the path to store the uploaded image
		$target ="assets/images/".basename($_FILES['file']['name']);
     require_once 'session.php';
		// connection to db
		require_once 'db.php';

		//getting all thesubmited data from the form
		$file1 = $_FILES['file']['name'];
		$name = $_POST['name'];
		//exit($file1);
		$text = $_POST['text'];
		$date1 = $_POST['date'];
	    $amount = $_POST['amount'];
     $vname = $_POST['vname'];
     $category = $_POST['category'];
	    //$createdby = $_POST['create'];
	    //$editedby = $_POST['edit'];

	    //$sql2= "INSERT INTO expensefile(file, text, date, name, amount, create, edit) VALUES ('123', '123','2017-07-12','123','11', '12','12')";
		$sql2 = "INSERT INTO expensefile (file, text, date, name, amount, createdby, modifiedby, vname, category) VALUES ('$file1', '$text',STR_TO_DATE('$date1', '%m/%d/%Y'),'$name','$amount','$login_session' ,'$login_session' ,'$vname' ,'$category')";
		mysqli_query($con,$sql2);//stores the data into the table.

		//now movie uploaded file into a folder.
		if (move_uploaded_file($_FILES['file']['tmp_name'],$target)) {
			$msg = "image uploaded succesfully";
			header("Location: home.php");

		}else{
			 $msg="there was a problem uploading";
		}	
	}


?>




<!DOCTYPE html>
<html lang="en">
    <head> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />


<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
 <br><br>
<br>

<body>
<?php include_once 'header.php' ?>
<div class="wrapper">
	<?php echo $msg ?>

</div><!--
<div id="content">
<form action="upload1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="size" value="10000000">
                     <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                    </div>   
            <div class="form-group">
             <label for="file">Choose a file.</label>
            <input type="file" name="file">
             </div>
             <br>
             <div class="form-group">
             <label for="text">Amount.</label>
			<input type="text" name="amount" id="amount" placeholder="enter amount">
			</div>
<br>
             <div>
 				<textarea name="text" cols="40" rows="4" placeholder="say something.."></textarea>
 			</div>
 			<div>
 				<input type="submit" name="upload" value="upload file">
 			</div>
 			<br>
</form>-->
<div class="container">
<div clas="row">
<div class="col-sm-4">
<form method="POST" action="upload1.php" enctype="multipart/form-data">
 <div class="form-group">
    <label for="name">Name*</label>
    <select class="form-control" id="name" name="name" placeholder="Enter Name" required >
      <option hidden>Select Name</option>
         <?php  while($row = mysql_fetch_array($result2)):?>
           <option><?php echo $row["userName"] ?></option>
           <?php endwhile ?>
          </select>
  </div>
  
  <div class="form-group">
    <label for="text">Details of expense file*</label>
    <textarea class="form-control" id="text" name="text" rows="4" cols="50" placeholder="Enter the Details"></textarea>
  </div>
  
            
     <div class="form-group">
          <label for="date">Date*</label>
        <input type="text" class="form-control" id="date" name="date" placeholder="mm/dd/yyyy" required >
    </div><script>
  $( function() {
    $( "#date" ).datepicker();
  } );
  </script>
       
  
  <div class="form-group">
    <label for="amount">Amount Spent*</label>
    <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter the Amount" required >
  </div>
  <!--<div class="form-group">
    <label for="createdby">createdby</label>
    <input type="text" class="form-control" id="createdby" name="createdby" value="<?php echo $result["createdby"]?>">
  </div>-->
 
  <div class="form-group">
    <label for="vname">vendorName*</label>
    <select class="form-control" id="vname" name="vname"  required >
     <option hidden>Select Vendor</option>
     <?php  while($row = mysql_fetch_array($result)):?>
      <option><?php echo $row["v_name"] ?></option>
      <?php endwhile ?>
          </select>
    </div> 

    <div class="form-group">
         <label for="category">Category*</label>
         <select type="text" class="form-control" id="category" name="category"  required >
        <option hidden>Select Category</option>
         <?php  while($row = mysql_fetch_array($result1)):?>
           <option><?php echo $row["c_name"] ?></option>
           <?php endwhile ?>
         </select>
  </div>


      <div class="form-group">
             <label for="file">Choose a file*.</label>
            <input id="file1" type="file" name="file" required >
            
      </div>

             	<div>
 				<input type="submit" name="upload" value="upload file">
        <div class="col-sm-4 col-md-8">
        <button type="reset" class="btn btn-primary" value="Reset">Reset</button>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <button type="button" class="btn btn-primary" onclick="goBack()" >Back</button>
        </div>
 			</div>
 			<br>
      </form>
 </div>
      <div class="col-6 col-md-4">
         <input type="button" value="Preview" onclick="PreviewImage();" />
        <div style="clear:both">
           <iframe id="viewer" frameborder="0" scrolling="no" width="400" height="600"></iframe>
        </div>
       </div>

        <div class="col-sm-6 col-md-4">
         
        </div>
   </div>
</div>
 </body>
</html>
<br><br>
<?php include_once 'footer.php' ?>
<script type="text/javascript">
            function PreviewImage() {
                pdffile=document.getElementById("file1").files[0];
                pdffile_url=URL.createObjectURL(pdffile);
                $('#viewer').attr('src',pdffile_url);
            }


            function goBack() {
              window.history.back();
                             }
        </script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
