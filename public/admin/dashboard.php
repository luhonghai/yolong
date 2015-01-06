<?php include('header.php');

$ip  = !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
$url = "http://freegeoip.net/json/$ip";
$ch  = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
$data = curl_exec($ch);
curl_close($ch);

$city = "";

if ($data) {
    $location = json_decode($data);

    $city = $location->city;
}

$average_money = ( all_users_balance() / count_rows('users') );

$am = explode('.' , $average_money);

$average_money = $am[0] . '.' . substr($am[1] , 0 , 2);
 ?>

<section class="row m-b-md">
    <div class="col-sm-6">
		<h3 class="m-b-xs text-black">Dashboard</h3>
        <small>Welcome back, <?php echo $user_info['username']; ?>, <i class="fa fa-map-marker fa-lg text-primary"></i> <?php echo $city; ?></small> 
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
<div class="row">
    <div class="col-sm-12">
        <div class="panel b-a">
			<div class="row m-n">
				<div class="col-md-6 b-b b-r"> <a href="#" class="block padder-v hover"> <span class="i-s i-s-2x pull-left m-r-sm"> <i class="i i-hexagon2 i-s-base text-danger hover-rotate"></i> <i class="i i-plus2 i-1x text-white"></i> </span> <span class="clear"> <span class="h3 block m-t-xs text-danger"><?php echo count_unique_visitors(1); ?></span> <small class="text-muted text-u-c">Unique Visitors Today</small> </span> </a> </div>
				<div class="col-md-6 b-b"> <a href="#" class="block padder-v hover"> <span class="i-s i-s-2x pull-left m-r-sm"> <i class="i i-hexagon2 i-s-base text-danger hover-rotate"></i> <i class="i i-plus2 i-1x text-white"></i> </span> <span class="clear"> <span class="h3 block m-t-xs text-danger"><?php echo count_unique_visitors(7); ?></span> <small class="text-muted text-u-c">Unique Visitors This Week</small> </span> </a> </div>
				<div class="col-md-6 b-b b-r"> <a href="#" class="block padder-v hover"> <span class="i-s i-s-2x pull-left m-r-sm"> <i class="i i-hexagon2 i-s-base text-danger hover-rotate"></i> <i class="i i-plus2 i-1x text-white"></i> </span> <span class="clear"> <span class="h3 block m-t-xs text-danger"><?php echo count_hits(1); ?></span> <small class="text-muted text-u-c">Hits Today</small> </span> </a> </div>
				<div class="col-md-6 b-b"> <a href="#" class="block padder-v hover"> <span class="i-s i-s-2x pull-left m-r-sm"> <i class="i i-hexagon2 i-s-base text-danger hover-rotate"></i> <i class="i i-plus2 i-1x text-white"></i> </span> <span class="clear"> <span class="h3 block m-t-xs text-danger"><?php echo count_hits(7); ?></span> <small class="text-muted text-u-c">Hits This Week</small> </span> </a> </div>
				<div class="col-md-6 b-b b-r"> <a href="#" class="block padder-v hover"> <span class="i-s i-s-2x pull-left m-r-sm"> <i class="i i-hexagon2 i-s-base text-danger hover-rotate"></i> <i class="i i-plus2 i-1x text-white"></i> </span> <span class="clear"> <span class="h3 block m-t-xs text-danger">₦<?php echo all_users_balance(); ?></span> <small class="text-muted text-u-c">All users money</small> </span> </a> </div>
				<div class="col-md-6 b-b"> <a href="#" class="block padder-v hover"> <span class="i-s i-s-2x pull-left m-r-sm"> <i class="i i-hexagon2 i-s-base text-danger hover-rotate"></i> <i class="i i-plus2 i-1x text-white"></i> </span> <span class="clear"> <span class="h3 block m-t-xs text-danger">₦<?php echo $average_money; ?></span> <small class="text-muted text-u-c">Average user balance</small> </span> </a> </div>
				<div class="col-md-12 b-b"> <a href="#" class="block padder-v hover"> <span class="i-s i-s-2x pull-left m-r-sm"> <i class="i i-hexagon2 i-s-base text-danger hover-rotate"></i> <i class="i i-plus2 i-1x text-white"></i> </span> <span class="clear"> <span class="h3 block m-t-xs text-danger"><?php echo most_visited_page(); ?></span> <small class="text-muted text-u-c">Most Visited Page</small> </span> </a> </div>
			</div>
		</div>
	</div>
</div>
<div class="row bg-light dk m-b">

    <div class="col-md-6">
		<?php echo top_comment_authors(5 , 'statistics', 'tca', 'Top Commenters', 'Comments' ); ?>
    </div>
	<div class="col-md-6">
		<?php echo top_authors(5 , 'statistics', 'ta', 'Top Authors', 'Posts' ); ?>
    </div>
	<div class="col-md-6">
        <?php echo top_school_user(5 , 'statistics', 'tsu', 'Top Schools ( Users )', 'Users' ); ?>
    </div>
	<div class="col-md-6">
    </div>
	<div class="col-md-6">
        <?php echo top_dares_takers(5 , 'statistics', 'tdt', 'Top Dare Takers', 'Dares' ); ?>
    </div>
	<div class="col-md-6">
        <?php echo top_challenges_takers(5 , 'statistics', 'tct', 'Top Challenge Takers', 'Challenges' ); ?>
    </div>
</div>
<?php include('footer.php'); ?>