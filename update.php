<?php 
require_once 'dbconnect.php';
$result4 = mysql_query("SELECT * FROM vendor");
$result1 = mysql_query("SELECT c_name FROM category");
$result2 = mysql_query("SELECT userName FROM users");

require_once 'db.php';
$id=$_GET['id'];

$query = "SELECT * FROM expensefile WHERE id='$id'";

$rec = mysqli_query($con,$query);


 ?>
 
<!DOCTYPE html>
<html>
<head>


<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.uploadPreview.min.js"></script>
    <!-- Website CSS style -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>updte</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />

</head>

<body>
<?php include_once 'header.php' ?>
 <br><br>
<br>
<?php while($result = mysqli_fetch_array($rec)) :?>
  

<div class="container-fluid">
<div class="row">
<div class="col-sm-4">
  <!--update form.-->
	<form method="POST" action="update2.php" enctype="multipart/form-data">
  
  <div class="form-group">
    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $result["id"] ?>">
  </div>
   
   <div class="form-group">
             <label for="file">Choose a file*.</label>
            <input type="file" name="file3" id="file3" value="" onchange="readURL(this)" ><?php echo $result["file"] ?>
         </div>

<div class="form-group">
    <label for="text">Details of expense file*</label>
    <textarea class="form-control" id="text2" name="text2" rows="4" cols="50">
      <?php echo $result["text"] ?>
    </textarea>
  </div>
  
  
   <div class="form-group">
      <label for="vname2">vendorName*</label>
          <select type="text" class="form-control" id="vname2" name="vname2" value="" required >
             <option><?php echo $result["vname"] ?></option>
             <?php  while($row = mysql_fetch_array($result4)):?>
      <option><?php echo $row["v_name"] ?></option>
      <?php endwhile ?>
           </select>
           </div>

      <div class="form-group">
        <label for="category2">category*</label>
        <select type="text" class="form-control" id="category2" name="category2" value="" required >
          <option><?php echo $result["category"] ?></option>
           <?php  while($row = mysql_fetch_array($result1)):?>
           <option><?php echo $row["c_name"] ?></option>
           <?php endwhile ?>


        </select>
      </div>
           
     <div class="form-group">
          <label for="date2">Date*</label>
          <?php $date=date_create($result["date"]) ?>
        <input type="text"  class="form-control" id="date2" name="date2" value="<?php echo date_format($date,"m/d/Y") ?>"  >
    </div><script>
  $( function() {
    $( "#date2" ).datepicker();
  } );
  </script>
       
  
  <div class="form-group">
    <label for="name2">Name*</label>
    <select class="form-control" id="name2" name="name2"  required >
      <option><?php echo $result["name"] ?></option>
      <?php  while($row = mysql_fetch_array($result2)):?>
           <option><?php echo $row["userName"] ?></option>
           <?php endwhile ?>
   </select>
  </div>
  
   

  <div class="form-group">
    <label for="amount2">Amount*</label>
    <input type="text" class="form-control" id="amount2" name="amount2" value="<?php echo $result["amount"] ?>" required >
  </div>
  <!--<div class="form-group">
    <label for="createdby">createdby</label>
    <input type="text" class="form-control" id="createdby" name="createdby" value="<?php echo $result["createdby"]?>">
  </div>-->
  <div class="form-group">
    <label for="modifiedby">modifiedby*</label>
    <input type="text" class="form-control" id="modifiedby" name="modifiedby" value="<?php echo $result["modifiedby"] ?>" >
  </div>

  	<input class="btn btn-primary" type="submit" value="Submit">
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<button type="button" class="btn btn-primary" onclick="goBack()" >Back</button>
  <?php endwhile ?>
</form>
  </div>


  <div class="col-sm-4">
<img id="blah" src="#" alt="your image" />
  </div>
 
  </div>
</div>
</body>
</html>
<br><br><br>
<?php include_once 'footer.php' ?>
<?php
 
mysql_close();
?>
<script>
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
                     pdffile=document.getElementById("file3").files[0];
                pdffile_url=URL.createObjectURL(pdffile);
                $('#blah').attr('src',pdffile_url);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function goBack() {
    window.history.back();
  }


</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--
        <script type="text/javascript">
            function PreviewImage() {
                pdffile=document.getElementById("file3").files[0];
                pdffile_url=URL.createObjectURL(pdffile);
                $('#viewer').attr('src',pdffile_url);
            }
        </script>
