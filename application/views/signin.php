<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ;?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>tamplete_assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>tamplete_assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<style>body {
	background-image: url('<?php echo base_url();?>tamplete_assets/images/loginimage.jpg');
	background-repeat: no-repeat;
	background-size: cover cover;
	background-position: center center;
  background-color: rgb(51, 1, 51);
}
</style>
<body>

<div class="container">
<div class="row position_login">
<div class="col-md-8 col-sm-1 col-lg-5">

<?php if(isset($login_fail)): ?>
<h3 class="text-danger">Username or Password is wrong!!</h3>
<?php endif; ?>
<?php echo form_open('Admin/login');?> <!--form area start-->

  <div class="form-group"> <!--form block line -->
   <label for="email"> Email Address</label>
    <i class="fa fa-paper-plane"></i>
    <?php echo form_input(array('name'=>'email', 'type'=>'email','class'=>'form-control','value'=>set_value('email', ''),'placehoder'=>'Your email address'));?>
<?php if (form_error('email')):?> <span class="error text-danger"><?php echo form_error('email') ;?></span><?php endif;?>
  </div>
 
  <div class="form-group">
    <label for="psaaword">Password</label>
    <i class="fa fa-lock"></i>
    <?php echo form_input(array('name'=>'pass','class'=>'form-control','value'=>set_value('pass', ''),'placehoder'=>'Your email address','type'=>'password'));?>
<?php if (form_error('pass')):?> <span class="error text-danger"><?php echo form_error('pass') ;?></span><?php endif;?>
  </div>
  
  
   
        <div class="form-group">
        <input type="submit" value="Login Now" class="btn btn-success">
        </div>
<?php echo form_close();?>
<a href="#" class="forgot-pass">Forgot Password?</a>
<div class="text-center bg-secendary">No ! Account? <?php echo anchor('Register','Register Now');?></div>
<div class="text-center bg-secendary">No Need ? <?php echo anchor('Mainindex','Back Home');?></div>

	<script src="tamplete_assets/js/jquery-3.3.1.min.js"></script>
   <script src="tamplete_assets/js/bootstrap.bundle.min.js"></script>
  


</body>
</html>