<?php
	/**
	 * default controller & method
	 */
	$controller = 'menu';
	$method = 'index';

	/**
	 * url structure: index.php?act=controller.method
	 */
	if (isset($_GET['act'])) {
		$act = explode('.', $_GET['act']);
		$controller = $act[0];
		if (isset($act[1])) {
			$method = $act[1];
		}
	}

	$Class_name = ucfirst($controller);
	$instance = new $Class_name;
	$instance->$method();

	include ('header.php');
?>
<section class="row m-b-md">
    <div class="col-sm-6">
		<h3 class="m-b-xs text-black">Menu Settings</h3>
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

<section class="panel panel-default">
    <header class="panel-heading font-bold">  </header>
	<div class="panel-body">
	
			<div id="main">
				<ul id="menu-group">
					<?php foreach ((array)$menu_groups as $id => $title) : ?>
					<li id="group-<?php echo $id; ?>">
						<a href="<?php echo site_url('menu&amp;group_id=' . $id); ?>">
							<?php echo $title; ?>
						</a>
					</li>
					<?php endforeach; ?>
					<li id="add-group"><a href="<?php echo site_url('menu_group.add'); ?>" title="Add New Menu">+</a></li>
				</ul>
				<div class="clear"></div>

				<form method="post" id="form-menu" action="<?php echo site_url('menu.save_position'); ?>">
					<div class="ns-row" id="ns-header">
						<div class="ns-actions">Actions</div>
						<div class="ns-class">Class</div>
						<div class="ns-url">URL</div>
						<div class="ns-title">Title</div>
					</div>
					<?php echo $menu_ul; ?>
					<div id="ns-footer">
						<button type="submit" class="button green small" id="btn-save-menu">Save Menu</button>
					</div>
				</form>
			</div>
			<aside>
				<section class="box">
					<h2>Info</h2>
					<div>
						<p>Drag the menu list to re-order, and click <b>Update Menu</b> to save the position.</p>
						<p>To add a menu item, use the form below.</p>
					</div>
				</section>
				<section class="box">
					<h2>Current Menu</h2>
					<div>
						<span id="edit-group-input"><?php echo $group_title; ?></span>
						(ID: <b><?php echo $group_id; ?></b>)
						<div>
							<a id="edit-group" href="#">Edit</a>
							<?php if ($group_id > 1) : ?>
							&middot; <a id="delete-group" href="#">Delete</a>
							<?php endif; ?>
						</div>
					</div>
				</section>
				<section class="box">
					<h2>Add To Menu</h2>
					<div>
						<form id="form-add-menu" method="post" action="<?php echo site_url('menu.add'); ?>">
							<p>
								<label for="menu-title">Title</label>
								<input type="text" name="title" id="menu-title">
							</p>
							<p>
								<label for="menu-url">URL</label>
								<input type="text" name="url" id="menu-url">
							</p>
							<p>
								<label for="menu-class">Class</label>
								<input type="text" name="class" id="menu-class">
							</p>
							<p class="buttons">
								<input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
								<button id="add-menu" type="submit" class="button green small">Add Menu Item</button>
							</p>
						</form>
					</div>
				</section>
			</aside>
			<div class="clear"></div>
	
	</div>
</section>	

<div class="modal" id="ajaxModal" aria-hidden="false" style="display:none;"><div class="modal-body"><img src="http://asset-7.soup.io/asset/7136/7386_7485.gif" style="opacity: 0.5;"></div></div>

<div class="modal" id="bt-delete" aria-hidden="false" style="display: none;">
	<div class="modal-body">
		<div class="col-sm-3"></div>
		<div class="col-sm-6" style="margin-top: 10%;">
			<section class="panel panel-default">
				<header class="panel-heading font-bold">Delete ?</header>
				<div class="panel-body">
					<a class="btn btn-s-md btn-danger" id="bt-delete-mi">Delete</a>
					<a class="btn btn-s-md btn-default" id="bt-cancel-delete-mi">Cancel</a>
				</div>
			</section>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>