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
			<h2>Posts</h2>
		</section>
		
		<section id="content" class="columns eleven">
			<table class="table">
			<tbody>
				<?php foreach($posts as $post): ?>
				<tr>
				<td><a href="<?php echo $this->location('admin/posts/edit/'.$post->ID); ?>"><?php echo $post->title; ?></a></td>
				<td><?php echo date('d M Y, H:i', $post->created); ?></td>
				<td><?php echo $post->status; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		</section>
		
		<aside id="side" class="columns four offset-by-one">
			<a href="<?php echo $this->location('admin/posts/create'); ?>" class="new-post">Create a New Post</a>		
		</aside>
	</div><!-- end #main -->

<?php include 'footer.php'; ?>
