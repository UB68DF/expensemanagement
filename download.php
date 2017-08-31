


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


      <div class="container-fluid">
          <?php 

    require_once 'db.php';
    
    $id=$_GET['id'];

    $que = "SELECT * FROM expensefile WHERE id='$id'";
    $que2 = mysqli_query($con,$que);
    while ($rows = mysqli_fetch_array($que2)) {
      echo "<div id='img_div'>";
  echo "<img src='assets/images/".$rows['file']."'>";
  echo "</div>";
}
          ?>

        </div>
        <div class="modal-footer">
          <a href="home.php"><button type="button" class="btn btn-default">Close</button></a>
        </div>
   
      
    
  
  


</body>
</html>




<!--
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Horizontal form</h2>
  <form class="form-horizontal" action="donload.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="id">id</label>
      <div class="col-sm-4">
        <input type="hidden" class="form-control" id="id" name="id" value="<?php  echo $rows['id']?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">nName</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $rows['name']?>">
      </div>
    </div>

     <div class="form-group">
     	

     </div>


</body>
</html>
</body></html>-->
