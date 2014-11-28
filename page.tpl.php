<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_menu">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Your Site</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="main_menu">
			<?php
			$main_menu = variable_get('menu_main_links_source', 'main-menu');
			
			$tree = menu_tree($main_menu);
			
			print drupal_render($tree);

			?>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
