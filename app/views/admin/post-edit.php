<?php include 'header.php'; ?>

	<div id="header">
	<header class="container">
		<h1 id="site-title" class="columns four"><a href="#">Coffecup</a></h1>
		<nav id="main-nav" class="columns six">
			<ul>
				<li><a href="<?php echo $this->location('admin'); ?>">Dashboard</a></li>
				<li class="current"><a href="<?php echo $this->location('admin/posts'); ?>">Posts</a></li>
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
		<section id="page-header" class="columns sixteen row">
			<h2>Create New Post</h2>
		</section>
		
		<section id="content">
			<section id="content">
			<form action="" method="post" id="new-post">
				<div class="columns eight">
					<label for="post-title">Title</label>
					<input type="text" name="post-title" id="post-title" value="<?php echo $post->title; ?>">

					<label for="post-created">Date</label>
					<input type="text" name="post-created" id="post-created" value="<?php echo date('d M Y, H:i', $post->created); ?>">
				</div>

				<div class="columns eight">
					<label for="post-description">Description</label>
					<textarea id="post-description" name="post-description" rows="5"><?php echo $post->description; ?></textarea>
				</div>
				<div class="clearfix"></div>

				<div class="columns eight">
					<label for="post-html">Content</label>
					<textarea id="post-html" name="post-html" rows="10"><?php echo $post->html; ?></textarea>
				</div>

				<div class="columns eight">
					<label for="post-css">Your custom CSS</label>
					<textarea id="post-css" name="post-css" rows="10"><?php echo $post->css; ?></textarea>
				</div>
				<div class="clearfix"></div>

				<div id="submit-options">
					<div class="container">
						<div class="columns eight">
							<input type="submit" value="Save">
							<a href="<?php echo $this->location('admin'); ?>" class="cancel">Cancel</a>
						</div>
						<div class="columns eight">
							<label for="post-status"><input type="checkbox" name="post-status" value="true" <?php if($post->status == 'draft') echo 'checked'; ?>> Draft</label>
						</div>
					</div>
				</div>
			</form>
		</section>
	</div><!-- end #main -->

<?php include 'footer.php'; ?>
