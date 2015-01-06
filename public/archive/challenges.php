<?php
require_once('templates/headers/opening.tpl.php'); 

// Data to be passed to templates/headers/header-x.tpl.php -->
$title = 'One Page Parallax Home - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; 
$keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; 
$description = 'Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; 
$page = 'home-menu';   // To set active on the same id of primary menu 

require_once('templates/headers/'.$header.'.tpl.php'); 

	$paginator = new Pagination("challenges", 'status!=0');
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($_GET['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=challenge&" . $adlink);
	$q = $paginator->getQuery();

?>

<div class="vc_banner-title background-14 block">
    <div class="wrapper">
      <div class="container">
        <h1>Challenge</h1>
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a> </li>
          <li><a href="index.php?view=dares">Challenge</a> </li>
        </ul>
      </div>
    </div>
    <!-- wrapper --> 
  </div>

<div class="vc_single-blog block">
    <div class="wrapper">
		<div class="container">
			<div class="row">
				<h3>Challenge</h3>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="5%"> # </th>
							<th> Challenge By </th>
							<th width="50%"> Content </th>
							<th> Money In </th>
							<th width="20%"> Action </th>
						</tr>
					</thead>
					<tbody>
					<?php
					$count_dares = $db->fetchOne("SELECT COUNT(*) AS NUM FROM challenges ORDER BY id ASC");
									
					$n = 0;
					for ($x=0; $x < $count_dares; $x++) {
						if ($r = $db->fetch_array($q)) {
						$n++;
					?>
						<tr id="su<?php echo $n; ?>">
							<td> <?php echo $n; ?> </td>
							<td> <?php echo get_username($r['user_a']); ?> </td>
							<td> <?php echo substr($r['content'],0,160); ?> </td>
							<td> <?php echo $r['money']; ?>$</td>
							<td> 
							<?php 
							if( $r['status'] == 1 ){
								echo "<button  class='btn btn-block take-dare'>Try To Complete Challenge</button>";
							} else {
								echo "<button  class='btn btn-danger btn-block'>Challenge Completed</button>";
							}
							?> 
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
			</div>
		</div>
    </div>
</div>

<?php
require_once('templates/footers/'.$footer.'.tpl.php'); ?>



<!-- Specific Page Scripts Put Here -->
<script type="text/javascript" src="js/jquery.stellar.js"></script>
<script type="text/javascript" src="js/waypoints.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.gmap.min.js"></script>


<!-- Specific Page Scripts END -->



<?php require_once('templates/footers/closing.tpl.php'); ?>