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
<?php echo form_open_multipart('Books/update_book_data'); ?>

<label for= "name">Books Name</label>
<?php echo form_input($bookname); ?>

<label for= "price">Price</label>
<?php echo form_input($price); ?>

<label for= "author_name">Books Writername</label>
<?php echo form_input($author_name); ?>


<label for= "category">Category Name</label>
<?php

echo form_multiselect( 'category',array
(
    '0' => 'All Catrgory',
    '3' => 'Primary',
    '4' => 'Highschool',
    '5' => 'University',
    '6' => 'National',
    '7' => 'madrasah',
    '8' => 'উপন্যাস',
    '9' => 'কবিতার বই',
    '10' => 'ছোট গল্প',
    '11' => 'ইসলামিক বই',
),[0,11],['id' => 'category_name','class' => 'form-control']); 
?>

<label for= "publication">Publication Name</label>
<?php echo form_input($publication); ?>

<label for= "customFile">Uplaod image</label>
<div class="custom-file">

<?php 

echo form_input($img_name); ?>
  <label class="custom-file-label"  for="customFile">Upload images</label>
</div>
<?php echo form_input($id); ?>
<label for= "description">Description</label>
<?php echo form_textarea($description);?>


<?php echo form_submit(array('name' => 'submit', 'value' => 'Update', 'class' => 'form-control btn btn-primary mt-3')); ?>
or <?php echo anchor('Books','Cancel',array("class"=>"form-control btn btn-outline-danger")); ?>

<?php echo form_close(); ?>
<?php $this->load->view("Admin/contain_foot");?>
        <!-- /.container-fluid -->

<?php $this->load->view("Admin/partials/footer");?>

