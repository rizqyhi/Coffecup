<?php include 'header.php'; ?>

	<div id="header">
	<header class="container">
		<h1 id="site-title" class="columns four"><a href="#">Coffecup</a></h1>
		<nav id="main-nav" class="columns six">
			<ul>
				<li><a href="<?php echo $this->location('admin'); ?>">Dashboard</a></li>
				<li><a href="<?php echo $this->location('admin/posts'); ?>">Posts</a></li>
				<li class="current"><a href="<?php echo $this->location('admin/settings'); ?>">Settings</a></li>
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
			<h2>Settings</h2>
		</section>
		
		<section id="content" class="columns eleven">
		<ul class="nav nav-tabs" id="settings-tab">
<li class="active"><a href="#site" data-toggle="tab">Site</a></li>
<li><a href="#profile" data-toggle="tab">Profile</a></li>
<li><a href="#seo" data-toggle="tab">SEO</a></li>
</ul>
			<form action="" method="post" id="settings" class="form-horizontal">
			<div class="tab-content">
			<div class="tab-pane fade in active" id="site">
				<div class="control-group">
					<label class="control-label" for="site-name">Site name:</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="settings-site-name" name="site-name" value="<?php echo $setting->sitename; ?>">
						<p class="help-block">Your site's name</p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="site-description">Site description:</label>
					<div class="controls">
						<textarea class="input-xlarge" id="settings-site-description" name="site-description" rows="4"><?php echo $setting->description; ?></textarea>
						<p class="help-block">Your site's description</p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="site-disqus">Disqus username:</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="settings-disqus-username" name="site-disqus">
						<p class="help-block">We use <a href="#">Disqus</a> for comment system</p>
					</div>
				</div>
			</div>
			
			<div class="tab-pane fade" id="profile">
				<div class="control-group">
					<label class="control-label" for="profile-name">Real name:</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="settings-real-name" name="profile-name" value="<?php echo $user->real_name; ?>">
						<p class="help-block">Your real name</p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="profile-biography">Biography:</label>
					<div class="controls">
						<textarea class="input-xlarge" id="settings-biography" name="profile-biography" rows="4"><?php echo $user->bio; ?></textarea>
						<p class="help-block">Tell about yourself</p>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="profile-username">Username:</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="settings-username" name="profile-username" value="<?php echo $user->username; ?>">
						<p class="help-block">Your username</p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="profile-pass">Password:</label>
					<div class="controls">
						<input type="password" class="input-xlarge" id="settings-pass" name="profile-pass" value="">
						<p class="help-block">Left blank for no changing</p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="profile-email">Email:</label>
					<div class="controls">
						<input type="email" class="input-xlarge" id="settings-email" name="profile-email" value="<?php echo $user->email; ?>">
						<p class="help-block">Your email</p>
					</div>
				</div>
			</div>
			
			<div class="tab-pane fade" id="seo">
				<div class="control-group">
					<label class="control-label" for="seo-google">Google webmasters verification:</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="settings-seo-google" name="seo-google">
						<p class="help-block">Your Google Webmasters' verification ID</p>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="seo-bing">Bing verification:</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="settings-seo-bing" name="seo-bing">
						<p class="help-block">Your Bing's verification ID</p>
					</div>
				</div>
			</div>
				
				</div><!-- end .tab-content -->
			</form>
		</section>
	</div><!-- end #main -->

	<script type="text/javascript">
	$(document).ready(function() {
	    $('#settings-tab a').click(function (e) {
    	e.preventDefault();
    	$(this).tab('show');
    });
	});
	</script>
<?php include 'footer.php'; ?>
