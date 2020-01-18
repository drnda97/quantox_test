<?php $succ = isset($_GET['succ']) ? $_GET['succ'] : ''; ?>
<main>
	<?php if(isset($succ)): ?>
	<div class="succ">	
		<h2><?php echo $succ; ?></h2>
	</div>
	<?php endif; ?>   
    <h1>Welcome to our website</h1>
</main>