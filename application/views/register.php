<?php $this->load->view('header');?>

<h1 class=" text-center shadow  text-bold custom-class">WellCome Registaons Form</h1>
 <div class=" shadow p-5 mb-5 rounded" style="background:rgba(156, 39, 176, 0.3);"> 
 <div class="row"> <!-- form inline-->
 
 <div class="col-md-6">
 <?php echo form_open_multipart('Register/register_user');?>
    <label for="name">Your Name</label>
    <i class="fa fa-user"></i>
    <?php echo form_input(array('name'=>'name','class'=>'form-control','placeholder'=>'Your  Name','value'=>set_value('name', '')));?>
  <?php if(form_error('name')):?><span class="error text-danger"><?php echo form_error('name');?></span><?php endif;?>
  <label for="customFile">Your Photo</label>
    <i class="fa fa-image"></i>
  <div class="custom-file">
  <input type="file" class="custom-file-input form-control"required  name="img_name" id="customFile">
  <label class="custom-file-label"  for="customFile"> Your profile image</label>
  <span class="text-danger">[Image size 150px X 150px  and jpg format] </span>
</div>

  <label for="phone"> Mobile</label>
    <i class="fa fa-mobile"></i>
    <?php echo form_input(array('name'=>'phone','class'=>'form-control','placeholder'=>'Type Your Phone','type'=>'tel','value'=>set_value('phone', '')));?>
  <?php if(form_error('phone')):?><span class="error text-danger"><?php echo form_error('phone');?></span><?php endif;?>

    </div>
 <div class="col-md-6">
    <label for="email"> Email </label>
    <i class="fa fa-paper-plane"></i>
    <?php echo form_input(array('name'=>'email_address','type'=>'email','class'=>'form-control','placeholder'=>'Your Email Address','value'=>set_value('email_address', '')));?>
  <?php if(form_error('email_address')):?><span class="error text-danger"><?php echo form_error('email_address');?></span><?php endif;?>
 
  <label for="psaaword">Password</label>
    <i class="fa fa-lock"></i>
    <?php echo form_input(array('name'=>'pass','class'=>'form-control','placeholder'=>'Type Your Password','value'=>set_value('pass', ''),'type'=>'password'));?>
  <?php if(form_error('pass')):?><span class="error text-danger"><?php echo form_error('pass');?></span><?php endif;?>
 
  <label for="psaaword1">Re Password</label>
    <i class="fa fa-lock"></i>
    <?php echo form_input(array('name'=>'pass1','class'=>'form-control','placeholder'=>'Type Your Password','type'=>'password','value'=>set_value('pass1', '')));?>
  <?php if(form_error('pass1')):?><span class="error text-danger"><?php echo form_error('pass1');?></span><?php endif;?>
  <br>
   <input type="submit" name="sub" value="Register Now" class="btn btn-success">
    
    <?php echo form_close();?>
 </div>

    <br>
    <div class="text-center bg-secendary">Already have an account? <?php echo anchor('Admin','Login here');?></div><hr>
    <div class="text-center bg-secendary">No Need ? <?php echo anchor('Mainindex','Back Home');?>
    </div>
    

      
    <?php $this->load->view('footer');?>