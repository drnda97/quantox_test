<!-- if user is loged in we show just logut button -->
<?php 
	if(!isset($_SESSION['user'])):
	$error = isset($_GET['err']) ? $_GET['err'] : ''; 
?>
<main>
	<?php if(isset($error)): ?>
	<div class="err">	
		<h2><?php echo $error; ?></h2>
	</div>
	<?php endif; ?>
		<div class="loginbox">
			<h1>Log in</h1>
			<form name="login_form" action="/user/loginuser" method="post">

				<input type="email" name="email" placeholder="email">
			
				<input type="password" name="password" placeholder="password">

				<input type="submit" name="login" value="LOG IN">

			</form>
		</div>
	</main>
<?php else: ?>
	<main>
		<a href="/user/logout" class="btn">Logout</a>
	</main>
<?php endif; ?>