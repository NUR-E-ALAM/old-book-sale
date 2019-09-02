<?php $this->load->view('Admin/partials/header');?>
<?php $this->load->view("Admin/partials/topber");?>
<?php $this->load->view("Admin/partials/sidebar");?>

<?php $this->load->view("Admin/contain_head");?>
  <?php echo anchor('Admin','View Your Profile',array("class"=>"btn btn-outline-success")); ?> 
<h1 class="h1 text-center"><?php echo $page_title; ?></h1>


<?php if (validation_errors()) : ?>
<fieldset class="bg-danger">
<legend align="right"><h3>Whoops! There was an error:</h3></legend>
<p><?php echo validation_errors(); ?></p>
</fieldset>
<?php endif; ?>
<?php echo form_open('Profile/addprofile'); ?>
<label for= "country">Country</label>
<?php echo form_input($country); ?>

<label for= "divisions">Division</label>
<?php echo form_input($division); ?>

<label for= "districs">district</label>
<?php echo form_input($district); ?>

<label for= "upazilas">Upazilas </label>
<?php echo form_input($upazila); ?>

<label for= "gender">Gender</label>
<?php echo form_input($gender); ?>

<label for= "description">Birthday</label>
<?php echo form_input($bod);?>

<?php echo form_submit(array('name' => 'submit', 'value' => 'Update Profile', 'class' => 'form-control btn btn-primary mt-3')); ?>


<?php echo form_close(); ?>
<?php $this->load->view("Admin/contain_foot");?>
        <!-- /.container-fluid -->

<?php $this->load->view("Admin/partials/footer");?>

