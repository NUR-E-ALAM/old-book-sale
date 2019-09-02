<?php $this->load->view('Admin/partials/header');?>
<?php $this->load->view("Admin/partials/topber");?>
<?php $this->load->view("Admin/partials/sidebar");?>
<?php $this->load->view("Admin/contain_head");?>

          <?php echo anchor('Category/addcategory','Add Categoy',array("class"=>"btn btn-outline-success"));?> 
		  <h2  class="h1 text-center">All Books info</h3>
        <?php if ($query->num_rows() > 0) : ?>
        <table class="table table-hover table-responsive" width="100%">
  <thead>
<th scope="col">No</th>
<th scope="col">Category Name</th>
<th scope="col">Creating user</th>
<th scope="col">Status</th>
<th scope="col">Actions</th>
</thead>
<tbody>
	<?php $i=1;
 foreach ($query->result() as $row) : ?>
<tr>
<th scope="row"><?php echo $i++; ?></th>
<td><?php echo $row->name; ?></td>

<td><?php echo $row->user_id; ?></td>

<td><?php echo $row->created; ?></td>
<td><a onclick="return confirm('Are you sure?')" href='<?php echo site_url('Books/delete/'.$row->id)?>'><i class="fa fa-trash"></i></a>&nbsp;&nbsp;
<a  href='<?php echo site_url('Books/edit_books/'.$row->id)?>'><i class="fa fa-edit"></i></a>
</td>
<td><a onclick="return confirm('Are you sure?')" href='<?php echo site_url('Admin/delete_user/'.$row->id)?>'><i class="fa fa-check-circle"></i></a>&nbsp;&nbsp;
<a  href='<?php echo site_url('Admin/delete_user/'.$row->id)?>'><i class="fa  fa-ban"></i></a>
</td>
</tr>
<?php endforeach; ?>
<tbody>
</table>
<?php endif; ?>

          
        <!-- /.container-fluid -->
        <?php $this->load->view("Admin/contain_foot");?>
<?php $this->load->view("Admin/partials/footer");?>