<!--<!DOCTYPE html>
  <html lang="en">
    <head>
        <title>JavaScript PDF Viewer Demo</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        

         <script type="text/javascript">
            function PreviewImage() {
                pdffile=document.getElementById("uploadPDF").files[0];
                pdffile_url=URL.createObjectURL(pdffile);
                $('#viewer').attr('src',pdffile_url);
            }
        </script>
    </head>
    <body>
        <input id="uploadPDF" type="file" name="myPDF" onclick="PreviewImage();"/>&nbsp;
        <
        <div style="clear:both">
           <img id="viewer"  />
        </div>
    </body> 
</html>-->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#date" ).datepicker();
  } );
  </script>
</head>
<body>
 
<p>Date: <input type="date" id="date"></p>
 
 
</body>
</html>