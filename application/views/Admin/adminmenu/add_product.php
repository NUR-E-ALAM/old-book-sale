<h1 class="h1 text-center"><?php echo $page_title; ?></h1>

<?php if (validation_errors()) : ?>
<fieldset class="bg-danger">
<legend align="right"><h3>Whoops! There was an error:</h3></legend>
<p><?php echo validation_errors(); ?></p>
</fieldset>
<?php endif; ?>
<?php echo form_open('Product/new'); ?>
<div class="form-row">
<label for= "product_name">Product Name</label>
<?php echo form_input(array('name' => 'product_name', 'id' => 'product_name',
'value' => set_value('product_name', ''), 'maxlength' => '100', 'size' => '50',
'style' => 'width:100%', 'class' => 'form-control', )); ?>


<label for= "description">Description</label>
<?php echo form_textarea(array('name' => 'description', 'id' => 'description', 'value' => set_value('description', ''),
'maxlength' => '100', 'size' => '50',
'style' => 'width:100%', 'class' => 'form-control','row'=>'5','cols'=>'50' )); ?>

<label for= "price">Price</label>

<?php echo form_input(array('name' => 'price', 'id' => 'price',
'value' => set_value('price', ''), 'maxlength' => '100', 'size' => '50',
'style' => 'width:100%', 'class' => 'form-control', )); ?>

<label for= "product_cod">Product Code</label>

<?php echo form_input(array('name' => 'product_cod', 'id' => 'product_cod', 'value' => set_value('product_cod', ''), 'maxlength' => '100', 'size' => '50',
'style' => 'width:100%', 'class' => 'form-control', )); ?>

<label for= "categary">Categary</label>
<?php 
$options = array(
    '1' => 'Shirt',
    '2' => 'Footware',
    '3'=>'t-shirt',
);
?>

<?php echo form_dropdown('category', $cat_options, '', 'class="form-control"'); ?>

<br>
<?php echo form_submit(array('name' => 'submit', 'value' => 'ADD', 'class' => 'btn btn-primary mt-3')); ?>
or <?php echo anchor('form', 'cancel'); ?>

</div>
<?php echo form_close(); ?>
