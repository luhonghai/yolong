<?php
	
	include ('header.php');
?> 
	<link href="plugins/dropzone/css/dropzone.css" rel="stylesheet">
	<div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
            <div class="page-heading">
              <h1>Multi Upload</h1>
            </div>
          </div><!--col-md-12 end-->
        </div><!--row end-->
       
        <!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
            <div id="dropzone">
              <form id="demo-upload" class="dropzone dz-clickable" action="upload.php">
                <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
              </form>
            </div>
          </div><!--col-md-12 end-->
        </div><!--row end-->
		<script src="plugins/dropzone/js/dropzone.js"></script>
	<?php		
	
	include ('footer.php');
	
	?>