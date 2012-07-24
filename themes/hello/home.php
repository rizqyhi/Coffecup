<?php include 'header.php'; ?>
    <div class="navbar">
    <div class="navbar-inner">
    <div class="container">
        <a class="brand" href="#">
    Kopi Bean CMS
    </a>
    	    <ul class="nav">
    <li class="active">
    <a href="<?php echo $this->location('home'); ?>">Home</a>
    </li>

    </ul>
    <ul class="nav pull-right">
		<li><a href="<?php echo $this->location('admin'); ?>">Dashboard</a></li>
    </ul>
    </div>
    </div>
    </div>    
    
    <header class="hero-unit masthead">
<h1>Kopi Bean CMS</h1>
<p>Simple CMS for art-directed blog.</p>
</header>

<table class="table">
<tbody>
<?php foreach($posts as $post): ?>
<tr>
<td><a href="<?php echo $this->uri->baseUri . $post->slug; ?>"><?php echo $post->title; ?></a></td>
<td><?php echo $post->html; ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<?php include 'footer.php'; ?>
