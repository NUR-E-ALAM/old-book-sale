<?php $this->load->view('Admin/partials/header');?>
<?php $this->load->view("Admin/partials/topber");?>
<?php $this->load->view("Admin/partials/sidebar");?>
<?php $this->load->view("Admin/contain_head");?>
  
<h1 class=" text-center shadow  text-bold custom-class">Profile Complete Form</h1>
 <h3 class="text-danger"><?php echo validation_errors(); ?></h3>

 <!--form area start-->
 <?php echo form_open('profile/addprofile');?>
 
 <label for="country">Country </label>
  <i class="fa fa-female"></i>
  <select name="country" id="country" class="form-control">
   <option value="">Select</option>
   <?php
require "tamplete_assets/partial/Country.php";
foreach($countries as $v){
    echo "<option value='$v'>$v</option>";
}
   ?>
   </select>
   

<label for= "division">Division</label>
<?php echo form_dropdown('division', $div_options, '', 'class="form-control", id="division"'); ?>

 <label for= "district">district</label>
<?php echo form_dropdown('district', $dist_options, '', 'class="form-control", id="district"'); ?>
 
 <label for="upazila">Upazilas</label>
<?php echo form_dropdown('upazila', $upa_options, '', 'class="form-control", id="upazila"'); ?>
 
    <label for="date">BirthDate</label>
    <i class="fa fa-birthday-cake"></i>
    <input type="date"  class="form-control" id="date" name="bod" placeholder="Passowrd">
    
 
  <i class="fa fa-male"></i>
  <label for="gender">Gender</label>
  <i class="fa fa-female"></i>
    <select class="form-control" name="gender" id="gender">
  <option value="">Select Your Gender</option>
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="other">Other</option>
</select> <br>
        <div class="form-group">
        <input type="submit" name="sub" value="Submit info" class="btn btn-success">
        </div>


    <?php echo form_close()?>

      
        <!-- /.container-fluid -->
        <?php $this->load->view("Admin/contain_foot");?>
<?php $this->load->view("Admin/partials/footer");?>