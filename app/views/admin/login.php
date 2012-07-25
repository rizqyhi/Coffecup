<?php include 'header.php'; ?>

	<div id="header">
	<header class="container">
		<h1 id="site-title" class="columns four"><a href="#">Coffecup</a></h1>
	</header>
	</div>
	
	<div id="main" class="container">
		<section id="page-header" class="columns sixteen row">
			<h2>Login</h2>
		</section>
		
		<section id="content" class="columns sixteen">
			<form action="" method="post" id="login-form">
				<div class="control-group">
					<label class="control-label" for="username">Username:</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="username" name="username">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="password">Password:</label>
					<div class="controls">
						<input type="password" class="input-xlarge" id="password" name="password">
					</div>
				</div>
				<input type="submit" name="submit" id="submit" value="Login">
			</form>
		</section>
	</div><!-- end #main -->

<?php include 'footer.php'; ?>
