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
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email';
} else {
	$login_label = 'Email';
}
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
</table>
<br>
<?php echo form_submit('reset', 'Get a new password', 'class="btn btn-primary btn-block"'); ?>
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
