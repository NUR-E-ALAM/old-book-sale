<?php $this->load->view('Admin/partials/header');?>
<?php $this->load->view("Admin/partials/topber");?>
<?php $this->load->view("Admin/partials/sidebar");?>
<?php $this->load->view("Admin/contain_head");?>

    
<h1 class=" text-center shadow  text-bold custom-class">WellCome Registaons Form</h1>
 <div class=" shadow p-5 mb-5 rounded" style="background:rgba(156, 39, 176, 0.3);"> 
 <div class="row"> <!-- form inline-->
 <div class="col-md-6"><?php echo form_open('Register/register_user');?>
    <label for="fastname"> Fast Name</label>
    <i class="fa fa-user"></i>
      <?php echo form_input(array('name'=>'fname','class'=>'form-control','placeholder'=>'Your Frist Name','value'=>set_value('fname', '')));?>
  <?php if(form_error('fname')):?><span class="error text-danger"><?php echo form_error('fname');?></span><?php endif;?>
    <label for="lastname">Last Name</label>
    <i class="fa fa-user"></i>
    <?php echo form_input(array('name'=>'lname','class'=>'form-control','placeholder'=>'Your Last Name','value'=>set_value('lname', '')));?>
  <?php if(form_error('lname')):?><span class="error text-danger"><?php echo form_error('lname');?></span><?php endif;?>
  <label for="phone"> Mobile</label>
    <i class="fa fa-mobile"></i>
    <?php echo form_input(array('name'=>'phone','class'=>'form-control','placeholder'=>'Type Your Phone','type'=>'number','value'=>set_value('pass1', '')));?>
  <?php if(form_error('phone')):?><span class="error text-danger"><?php echo form_error('phone');?></span><?php endif;?>
    <label for="check"> User ID</label>
    <i class="fa fa-user"></i>
    <?php echo form_input(array('name'=>'userid','class'=>'form-control','placeholder'=>'Your User Name','value'=>set_value('userid', '')));?>
  <?php if(form_error('userid')):?><span class="error text-danger"><?php echo form_error('userid');?></span><?php endif;?>

    <label for="email"> Email </label>
    <i class="fa fa-paper-plane"></i>
    <?php echo form_input(array('name'=>'email_address','type'=>'email','class'=>'form-control','placeholder'=>'Your Email Address','value'=>set_value('email_address', '')));?>
  <?php if(form_error('email_address')):?><span class="error text-danger"><?php echo form_error('email_address');?></span><?php endif;?></div>
 <div class="col-md-6"> <label for="psaaword">Password</label>
    <i class="fa fa-lock"></i>
    <?php echo form_input(array('name'=>'pass','class'=>'form-control','placeholder'=>'Type Your Password','value'=>set_value('pass', ''),'type'=>'password'));?>
  <?php if(form_error('pass')):?><span class="error text-danger"><?php echo form_error('pass');?></span><?php endif;?>
 
  <label for="psaaword1">Re Password</label>
    <i class="fa fa-lock"></i>
    <?php echo form_input(array('name'=>'pass1','class'=>'form-control','placeholder'=>'Type Your Password','type'=>'password','value'=>set_value('pass1', '')));?>
  <?php if(form_error('pass1')):?><span class="error text-danger"><?php echo form_error('pass1');?></span><?php endif;?>
     <label for="date">BirthDate</label>
    <i class="fa fa-birthday-cake"></i>
    <input type="date"  class="form-control" id="date" name="bod" placeholder="Passowrd">
    <?php if(form_error('bod')):?><span class="error text-danger"><?php echo form_error('bod');?></span><?php endif;?>
 
  <i class="fa fa-male"></i>
  <label for="gender">Gender</label>
  <i class="fa fa-female"></i>
    <select class="form-control" name="gender" id="gender">
  <option value="">Select Your Gender</option>
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="other">Other</option>
</select>
<?php if(form_error('gender')):?><span class="error text-danger"><?php echo form_error('gender');?></span><?php endif;?>

    <label for="country">Country </label>
  <i class="fa fa-female"></i>
  <select name="country" id="country" class="form-control">
   <option value="">Select</option>
   <?php
require "tamplete_assets/partial/Country.php";
foreach($countries as $k=>$v){
    echo "<option value='$k'>$v</option>";
}
   ?>
   </select>
   <?php if(form_error('country')):?><span class="error text-danger"><?php echo form_error('country');?></span><?php endif;?>
   <br>
   <input type="submit" name="sub" value="Register Now" class="btn btn-success">
    
    <?php echo form_close();?>
 </div>

    <br>
    <div class="text-center bg-secendary">Already have an account? <?php echo anchor('Admin','Login here');?></div>
    <div class="text-center bg-secendary">No Need ? <?php echo anchor('Mainindex','Back Home');?>
    </div>
    
    
<?php $this->load->view("Admin/contain_foot");?>
        <!-- /.container-fluid -->

<?php $this->load->view("Admin/partials/footer");?>

<?php echo $error;?>

    <?php echo form_open_multipart('Admin/do_upload');?>
    
    <input type="file" name="userfile" size="20" />
    
    <br /><br />
    
    <input type="submit" value="upload" />
    
    </form>