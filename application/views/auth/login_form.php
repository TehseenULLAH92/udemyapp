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
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'class' => 'form-control',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Username';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'class' => 'form-control',
	'id'	=> 'password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'class' => 'form-control',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'class' => 'form-control',
	'maxlength'	=> 8,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<div class="container">
	<div class="card card-login mx-auto mt-5">
		<div class="card-header">Login</div>
		<div class="card-body">
<table>
	<tr>
		<td><?php echo form_label($login_label, $login['id']); ?></td>
		<td><?php echo form_input($login); ?></td>
		<?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
	</tr>
	<tr>
		<td><?php echo form_label('Password', $password['id']); ?></td>
		<td><?php echo form_password($password); ?></td>
		<td style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></td>
	</tr>

	<?php if ($show_captcha) {
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
		<td><input type="text" id="recaptcha_response_field" class="form-control" name="recaptcha_response_field" /></td>
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
	<br><br>
	<tr>
		<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
		<td><?php echo form_input($captcha); ?></td>
		<?php echo form_error($captcha['name']); ?>
	</tr>
	<?php }
	} ?>

	<tr>
		<td colspan="3">
			<br>
			<!-- <?php echo form_checkbox($remember); ?>
			<?php echo form_label('Remember me', $remember['id']); ?> -->
			<?php echo form_submit('submit', 'Login', 'class="btn btn-primary btn-block"'); ?>

			<?php echo anchor('/auth/forgot_password/', 'Forgot password' , 'class="btn btn-primary btn-block"'); ?>
			<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register', 'class="btn btn-primary btn-block"'); ?>
		</td>
	</tr>
</table>
<?php echo form_close(); ?>
</div>
</div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
