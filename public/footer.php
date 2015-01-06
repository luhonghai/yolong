  	<script>
	
	(function($) {
		$( "#add_post" ).click(function() {
			$('.new-post').slideDown(1500);
		});
		
		$( ".close-post" ).click(function() {

			$('.new-post').slideUp(1500);
		});
		
		$(document).mouseup(function (e)
		{
			var container = $(".user-options");

			if (!container.is(e.target) // if the target of the click isn't the container...
				&& container.has(e.target).length === 0) // ... nor a descendant of the container
			{
				container.slideUp(500);
			}
		});
		
		$('.user-area').click(function(event){
			$('.user-options').slideDown(500);
		});

	})(jQuery); 

	</script>			
			<footer>
				<div class="site-footer">
					<div class="site-title"><a href="home_v.3.html"><img src="images/logo.png" alt="*" /></a>
						<h1><a href="home_v.3.html"><?php echo get_option('site_name'); ?></a></h1>
					</div>
      <!-- .site-title -->
					<nav class="site-nav">
						<ul>
							<li><a href="http://bestwebsoft.com/about/">About</a></li>
							<li><a href="http://bestwebsoft.com/plugin/">Products</a></li>
							<li><a href="http://support.bestwebsoft.com/">Support Forum</a></li>
						</ul>
					</nav>
					<!-- .site-nav -->
					<div class="links">
						<a class="facebook" href="https://www.facebook.com/bestwebsoft"></a>
						<a class="twitter" href="https://twitter.com/bestwebsoft"></a>
						<a class="youtube" href="http://www.youtube.com/bestwebsoft"></a>
					</div>
				<!-- .links -->
				</div>
			<!-- .site-footer -->
			</footer>
		<!-- footer -->
		</div>
		<!-- .wrapper -->
	</body>
</html>