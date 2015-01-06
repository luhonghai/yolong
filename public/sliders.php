<?php
	if( $_POST['slider_add'] ){
		$data = array("name" => $_POST['slider_name']);
		$insert = $db->insert("sliders", $data);
	}
	
	if( $_POST['delete_slider'] ){
		$db->delete("sliders", "id=" . $_POST['slider_id']);
	}

	$paginator = new Pagination("sliders", $cond);
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($input->gc['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=sliders&" . $adlink);
	$q = $paginator->getQuery();
	
	include ('header.php');
?>

<section class="row m-b-md">
    <div class="col-sm-6">
		<h3 class="m-b-xs text-black">Sliders</h3>
	</div>
    <div class="col-sm-6 text-right text-left-xs m-t-md">
        <div class="btn-group"> <a class="btn btn-rounded btn-default b-2x dropdown-toggle" data-toggle="dropdown">Widgets <span class="caret"></span></a>
            <ul class="dropdown-menu text-left pull-right">
                <li><a href="#">Notification</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Analysis</a></li>
                <li class="divider"></li>
                <li><a href="#">More settings</a></li>
            </ul>
        </div>
		<a href="#" class="btn btn-icon b-2x btn-default btn-rounded hover"><i class="i i-bars3 hover-rotate"></i></a> 
		<a href="#nav, #sidebar" class="btn btn-icon b-2x btn-info btn-rounded" data-toggle="class:nav-xs, show"><i class="fa fa-bars"></i></a> 
	</div>
</section>

<section class="panel panel-default" id="append-school">
    <header class="panel-heading font-bold"> Add New Slider </header>
	<div class="panel-body">
        <form class="form-inline" role="form" method="post" id="new_school">
			<input name="add_slider" type="hidden" value="true">
			<div class="form-group">
                <label class="col-sm-3 control-label">Site Domain</label>
                <div class="col-sm-9">
                    <div class="input-group m-b">
						<input type="text" class="form-control" name="slider_name">
						
						<span class="input-group-btn">
							<input class="btn btn-success update" type="submit">Add Slider</input>
						</span>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>	

<section class="panel panel-default">
    <header class="panel-heading font-bold"> General Settings </header>
	<div class="panel-body">
		<div class="form-group">
            <label class="col-sm-3 control-label">Site Domain</label>
            <div class="col-sm-9">
                <div class="input-group m-b">
                    <input type="text" class="form-control" id="web_site_domain" name="web_site_domain" value="yolo.ng">
                    <span class="input-group-btn">
						<button data-option="web_site_domain" class="btn btn-success update" type="button">Update</button>
                    </span>
				</div>
            </div>
        </div>
	</div>
</section>

<section class="panel panel-default">
    <header class="panel-heading"> Sliders <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> </header>
    <div class="table-responsive">
        <table class="table table-striped m-b-none" data-ride="datatables">
            <thead>
                <tr>
					<th>No.</th>
					<th>Slider Name</th>
					<th>Slides</th>
					<th>Actions</th>
                </tr>
            </thead>
            <tbody>
			<?php
			$n = 0;
			for ($x=0; $x < count_rows('sliders'); $x++) {
				if ($r = $db->fetch_array($q)) {
				$n++;
			?>
				<tr class="gradeX" id="su<?php echo $r['id']; ?>">
					<td width="10%" class="center"><?php echo $n; ?></td>
					<td><?php echo $r['name']; ?></td>
					<td><?php echo count_slides($r['id']); ?></td>
					<td width="20%">
						<a class="btn btn-danger" href="index.php?view=edit-slider&sliderid=<?php echo $r['id']; ?>">Edit</a>
						<button class="btn btn-danger delete-slider" data-slider="<?php echo $r['id']; ?>" type="button">Delete</button>
					</td>
				</tr>
			<?php	
				}
			}
			if ($paginator->totalResults() == 0) {
			?>
				<tr>
					<td colspan='7' align='center'>Records not found</td>
				</tr>
			<?php	
			}
			?>
            </tbody>
		</table>
		<script>
			(function($) {
				$( ".delete-slider" ).click(function() {
					var info = $( this ).data();
					$('#su' + info.slider).slideUp();
					$.post( "index.php?view=sliders", { delete_slider: "yes", slider_id: info.slider } );
				});
			})(jQuery);
		</script>
    </div>
</section>
			
<?php include('footer.php'); ?>