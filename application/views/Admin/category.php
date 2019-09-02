<?php $this->load->view('Admin/partials/header');?>
<?php $this->load->view("Admin/partials/topber");?>
<?php $this->load->view("Admin/partials/sidebar");?>

<?php $this->load->view("Admin/contain_head");?>
<?php if($this->session->userdata('role')==1){
    echo anchor('Category','Show Category',array("class"=>"btn btn-outline-success"));  
            }
            else{
              
            }
            ?> 
<h1 class="h1 text-center"><?php echo $page_title; ?></h1>

<?php if (validation_errors()) : ?>
<fieldset class="bg-danger">
<legend align="right"><h3>Whoops! There was an error:</h3></legend>
<p><?php echo validation_errors(); ?></p>
</fieldset>
<?php endif; ?>
<?php echo form_open_multipart('Category/addcategory'); ?>

<label for= "name">Add Category Name</label>
<?php echo form_input(array('name' => 'name', 'id' => 'name',
'value' => set_value('name', ''), 'class' => 'form-control', )); ?>



<?php echo form_submit(array('name' => 'submit', 'value' => 'Add Books', 'class' => 'form-control btn btn-primary mt-3')); ?>
or <?php echo anchor('Books','Cancel',array("class"=>"form-control btn btn-outline-danger")); ?>

<?php echo form_close(); ?>
<?php $this->load->view("Admin/contain_foot");?>
        <!-- /.container-fluid -->

<?php $this->load->view("Admin/partials/footer");?>

