
<h1 class="h1 text-center"><?php echo $title; ?></h1>

<?php if (validation_errors()) : ?>
<fieldset class="bg-danger">
<legend align="right"><h3>Whoops! There was an error:</h3></legend>
<p><?php echo validation_errors(); ?></p>
</fieldset>
<?php endif; ?>
<?php echo form_open_multipart('Author/add_author'); ?>
<div class="form-row">
<label for= "name">Author Name</label>
<?php echo form_input(array('name' => 'name', 'id' => 'name',
'value' => set_value('name', ''), 'maxlength' => '100', 'size' => '50',
'style' => 'width:100%', 'class' => 'form-control', )); ?>

<label for= "description">Description</label>
<?php echo form_textarea(array('name' => 'description', 'id' => 'description', 'value' => set_value('description', ''),
'maxlength' => '100', 'size' => '50',
'style' => 'width:100%', 'class' => 'form-control','row'=>'5','cols'=>'50' )); ?>


<label for= "books">Author Book</label>

<?php echo form_input(array('name' => 'books', 'id' => 'books', 'value' => set_value('books', ''), 'maxlength' => '100', 'size' => '50',
'style' => 'width:100%', 'class' => 'form-control', )); ?>

<br>
<?php echo form_submit(array('name' => 'submit', 'value' => 'ADD', 'class' => 'btn btn-primary mt-3')); ?>
or <?php echo anchor('form', 'cancel'); ?>

</div>
<?php echo form_close(); ?>


