<?php include 'header.php'; ?>

	<div id="header">
	<header class="container">
		<h1 id="site-title" class="columns four"><a href="#">Coffecup</a></h1>
		<nav id="main-nav" class="columns six">
			<ul>
				<li class="current"><a href="<?php echo $this->location('admin'); ?>">Dashboard</a></li>
				<li><a href="<?php echo $this->location('admin/posts'); ?>">Posts</a></li>
				<li><a href="<?php echo $this->location('admin/settings'); ?>">Settings</a></li>
			</ul>
		</nav>
		<div id="right-nav" class="columns four offset-by-two">
			<span class="view-site"><a href="<?php echo $this->uri->baseUri; ?>">View site</a></span>
			<span><a href="<?php echo $this->location('admin/logout'); ?>">Logout</a></span>
		</div>
	</header>
	</div>
	
	<div id="main" class="container">
		<section id="page-header" class="columns sixteen">
			<h2>Welcome back, Rizqy.</h2>
			<p>This is your dashboard. You can control the whole things of your site right from here. Try to <a href="#">create a new post</a> or browse your <a href="#">already-made posts</a>. Also some <a href="#">bits of options</a> to configure your site, from basic, profile, and even SEO. Enjoy.</p>
		</section>
	</div><!-- end #main -->

<?php include 'footer.php'; ?>
