<?php
	
	$page_id = $_GET['pageid'];
	
	$page_info = $db->fetchRow("SELECT * FROM pages WHERE id=" . $page_id);
	
	if( $_POST['save_page'] ){
		$data = array("title" => $_POST['title'] , "slug" => $_POST['slug'] , "content" => $_POST['content'] , "sidebar" => $_POST['sidebar'] , "sidebar_id" => $_POST['sidebar_id']);
		$update = $db->update("pages", $data, "id=".$page_id);
		
		header("Location: /admin/index.php?view=edit-page&pageid=".$page_id);
	}
	
	include ('header.php');
?>
	
	<!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
            <div class="page-heading">
              <h1>Update Page</h1>
            </div>
          </div><!--col-md-12 end-->
        </div><!--row end-->
		<!--row start-->
        <div class="row">
			<!--col-md-12 start-->
			<div class="col-md-9">
			<div class="box-info">
              <h3>Update Page</h3>
              <hr>
			  <!--form-horizontal row-border start-->
              <form method="POST" action="#" class="form-horizontal row-border">
				<input type="hidden" name="save_page" value="yes">
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Page Title</span>
							<input type="text" class="form-control" name="title" value="<?php echo $page_info['title']; ?>" placeholder="Title">
						</div>
					</div>
				</div>
			  
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Page Slug</span>
							<input type="text" class="form-control" name="slug" value="<?php echo $page_info['slug']; ?>" placeholder="Slug">
						</div>
					</div>
				</div>
				
				<div class="form-group col-md-12">
					<label class="col-sm-3 control-label">Content</label>
					<div class="col-sm-12">
						<textarea class="form-control ceditor" name="content"><?php echo $page_info['content']; ?></textarea>
					</div>
				</div>
				
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Sidebar</span>
							<select class="form-control" name="sidebar">
								<option value="0" <?php echo ( $page_info['sidebar'] == 0 ) ? "selected='selected'" : "" ;?>>No Sidebar</option>
								<option value="1" <?php echo ( $page_info['sidebar'] == 1 ) ? "selected='selected'" : "" ;?>>Left Sidebar</option>
								<option value="2" <?php echo ( $page_info['sidebar'] == 2 ) ? "selected='selected'" : "" ;?>>Right Sidebar</option>
							</select>
						</div>
					</div>
				</div>
				
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Sidebar</span>
							<select class="form-control" name="sidebar_id">			
							<?php
							$q = $db->query("SELECT * FROM sidebars");
							$count_slidebars = $db->fetchOne("SELECT COUNT(*) AS NUM FROM sidebars ORDER BY id ASC");

							for ($x=0; $x < $count_slidebars; $x++) {
								if ($r = $db->fetch_array($q)) {
								?> 
									<option value='<?php echo $r['id'] ?>' <?php echo ($r['id'] == $page_info['sidebar_id']) ? "selected='selected'" : ''; ?>><?php echo $r['name']; ?></option>
								<?php
								}
							}
							?>
							</select>
						</div>
					</div>
				</div>
				<br>
				<input type="submit" class="btn-primary btn" value="Update Page">
			  </form><!--form-horizontal row-border end-->
			 	<script type="text/javascript">
				$(document).ready(
					function()
					{
						$('.ceditor').redactor();
					}
				);
				</script>
			  <!--row start-->
            </div>
			</div>
			<div class="col-md-3">
			<div class="box-info">
              <h3>Update</h3>
              <hr>
			  <p>Status: Published</p>
			  <p>Visibility: Public</p>
			</div>
			</div>
		</div>
	<?php		
	
	include ('footer.php');
	
	?>