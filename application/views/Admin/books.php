<?php $this->load->view('Admin/partials/header');?>
<?php $this->load->view("Admin/partials/topber");?>
<?php $this->load->view("Admin/partials/sidebar");?>

<?php $this->load->view("Admin/contain_head");?>
<?php if($this->session->userdata('role')==1){
    echo anchor('Books','Show Books',array("class"=>"btn btn-outline-success"));  
            }
            else{
              echo anchor('Books/index_creart_user','Show Books',array("class"=>"btn btn-outline-success"));
            }
            ?> 
<h1 class="h1 text-center"><?php echo $page_title; ?></h1>

<?php if (validation_errors()) : ?>
<fieldset class="bg-danger">
<legend align="right"><h3>Whoops! There was an error:</h3></legend>
<p><?php echo validation_errors(); ?></p>
</fieldset>
<?php endif; ?>

<?php echo form_open_multipart('Books/addbooks'); ?>

<label for= "name">Books Name</label>
<?php echo form_input(array('name' => 'name', 'id' => 'name',
'value' => set_value('name', ''), 'class' => 'form-control', )); ?>

<label for= "price">Price</label>
<?php echo form_input(array('name' => 'price', 'type'=>'number', 'id' => 'price',
'value' => set_value('price', ''), 'class' => 'form-control' )); ?>


<label for= "author_name">Books Writername</label>

<?php echo form_input(array('name' => 'author_name',  'id' => 'author_name', 'value' => set_value('author_name', ''), 'class' => 'form-control')); ?>
<label for= "categary">Categary</label>
<?php echo form_multiselect('category[]', $cat_options, '0', 'class="form-control", id="categary"'); ?>


<label for= "publication">Publication Name</label>
<?php echo form_input(array('name' => 'publication', 'id' => 'publication', 'value' => set_value('publication', ''),  'class' => 'form-control')); ?>


<!-- <label for= "image">Publication Name</label>
<?php echo form_input(array('name' => 'file_name', 'id' => 'image', 'value' => set_value('file_name', ''), 'type'=>'file', 'class' => 'form-control')); ?> -->
<label for= "customFile">Uplaod Image</label>
<div class="custom-file">
  <input type="file" class="custom-file-input form-control"required  name="img_name" id="customFile">
  <label class="custom-file-label"  for="customFile">Upload images</label>
</div> 

<label for= "description">Description</label>
<?php echo form_textarea(array('name' => 'description', 'id' => 'description', 'value' => set_value('description', ''),
 'class' => 'form-control','rows' => 2)); ?>

<?php echo form_submit(array('name' => 'submit', 'value' => 'Add Books', 'class' => 'form-control btn btn-primary mt-3')); ?>
or <?php echo anchor('Books','Cancel',array("class"=>"form-control btn btn-outline-danger")); ?>

<?php echo form_close(); ?>
<?php $this->load->view("Admin/contain_foot");?>
        <!-- /.container-fluid -->

<?php $this->load->view("Admin/partials/footer");?>

