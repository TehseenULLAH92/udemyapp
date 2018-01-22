<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <base href="<?=base_url();?>">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin | Login</title>
  <!-- Bootstrap core CSS-->
  <link href="assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="assets/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="assets/admin/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'class'	=> 'form-control',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'class'	=> 'form-control',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'class'	=> 'form-control',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'class'	=> 'form-control',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'class'	=> 'form-control',
	'maxlength'	=> 8,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<div class="container">
	<div class="card card-register mx-auto mt-5">
		<div class="card-header">Register an Account</div>
		<div class="card-body">
	<?php if ($use_username) { ?>
	<tr>
		<td><?php echo form_label('Username', $username['id']); ?></td>
		<td><?php echo form_input($username); ?></td>
		<?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
	</tr>
	<?php } ?>
	<tr>
		<td><?php echo form_label('Email Address', $email['id']); ?></td>
		<td><?php echo form_input($email); ?></td>
<?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
	</tr>
	<tr>
		<td><?php echo form_label('Password', $password['id']); ?></td>
		<td><?php echo form_password($password); ?></td>
		<?php echo form_error($password['name']); ?>
	</tr>
	<tr>
		<td><?php echo form_label('Confirm Password', $confirm_password['id']); ?></td>
		<td><?php echo form_password($confirm_password); ?></td>
		<?php echo form_error($confirm_password['name']); ?>
	</tr>

	<?php if ($captcha_registration) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" class="forn-control" name="recaptcha_response_field" /></td>
		<?php echo form_error('recaptcha_response_field'); ?>
		<?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	<tr>
		<td colspan="3">
			<p>Enter the code exactly as it appears:</p>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
	<br>
	<br>
	<tr>
		<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
		<td><?php echo form_input($captcha); ?></td>
		<?php echo form_error($captcha['name']); ?>
	</tr>
	<?php }
	} ?>
</div>
<?php echo form_submit('register', 'Register', 'class="btn btn-primary btn-block"'); ?>
<a href="auth/login" class="btn btn-primary btn-block">Login</a>
<?php echo form_close(); ?>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
