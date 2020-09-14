<div id="inner-content-wrapper primary-section" class="wrapper">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        <?php  
			// featured post section
			require get_template_directory() . '/inc/sections/featured-post.php';

			// latest post section
			require get_template_directory() . '/inc/sections/latest-post.php';

			// popular section
			require get_template_directory() . '/inc/sections/popular.php';

			// most-viewed section
			require get_template_directory() . '/inc/sections/most-viewed.php';

			// slider section
			require get_template_directory() . '/inc/sections/slider.php';

			// media-posts section
			require get_template_directory() . '/inc/sections/media-posts.php';
			?>
		</main>
	</div>
</div>
<?php 