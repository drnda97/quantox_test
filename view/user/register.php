<?php $error = isset($_GET['err']) ? $_GET['err'] : ''; ?>
<main>
	<?php if(isset($error)): ?>
	<div class="err">	
		<h2><?php echo $error; ?></h2>
	</div>
	<?php endif; ?>
	<div class="registerBox">
		<h1>Sign Up</h1>
		<form name="register_form" action="/user/insertinbase" method="post">

			<input type="text" name="name" placeholder="name" value="">

			<input type="email" name="email" placeholder="email" value="">

			<input type="password" name="password" placeholder="password">

			<input type="password" name="re_password" placeholder="retype password">

			<input type="submit" name="register" value="Register">
		</form>
	</div>
</main>
