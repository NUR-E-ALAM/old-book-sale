<?php $this->load->view('Admin/partials/header');?>
<?php $this->load->view("Admin/partials/topber");?>
<?php $this->load->view("Admin/partials/sidebar");?>

<?php $this->load->view("Admin/contain_head");?>
<?php if($this->session->userdata('role')==1){
    echo anchor('Admin','Show Profile',array("class"=>"btn btn-outline-success"));  
            }
            else{
              echo anchor('Admin','Show Profile',array("class"=>"btn btn-outline-success"));
            }
            ?> 
<h1 class="h1 text-center"><?php echo $page_title; ?></h1>

<?php if (validation_errors()) : ?>
<fieldset class="bg-danger">
<legend align="right"><h3>Whoops! There was an error:</h3></legend>
<p><?php echo validation_errors(); ?></p>
</fieldset>
<?php endif; ?>


<?php echo form_open_multipart('Register/edit_registerdata'); ?>
<label for= "publication"> Name</label>
<?php echo form_input($username); ?>



<label for= "customFile">Uplaod image</label>
<div class="custom-file">
<?php echo form_input($imagename); ?>
  <label class="custom-file-label"  for="customFile">Upload images</label>
</div>

<label for= "publication">Email</label>
<?php echo form_input($email); ?>


<label for= "publication">mobile
</label>
<?php echo form_input($mobile); ?>

<br>
<?php echo form_submit('submit', 'Update'); ?>

<?php echo form_close(); ?>
<?php $this->load->view("Admin/contain_foot");?>
       

<?php $this->load->view("Admin/partials/footer");?>
