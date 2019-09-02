<?php $this->load->view('Admin/partials/header');?>
<?php $this->load->view("Admin/partials/topber");?>
<?php $this->load->view("Admin/partials/sidebar");?>
<?php $this->load->view("Admin/contain_head");?>
  
		  <h3 class="text-center" >All Users Info</h3>
     

     <?php if($this->session->userdata('role')==1){
               
             if ($query->num_rows() > 0) : ?>
	<table class="table table-hover table-responsive" width="100%">

  <thead>


<th scope="col">No</th>
<th scope="col">Name</th>
<th scope="col">Image</th>
<th scope="col">Email </th>
<th scope="col">Mobile</th>
<th scope="col">Phone </th>
<th scope="col">Country</th>
<th scope="col">Devision</th>
<th scope="col">District</th>
<th scope="col">Upazila</th>
<th scope="col">Active</th>
</thead>
<tbody>

<?php $i=1;
 foreach ($query->result() as $row) : ?>
<tr>
<th scope="row"><?php echo $i++; ?></th>
<td><?php echo $row->username; ?></td>
<td><img src="<?php echo base_url();?>assets/images/profilephoto/<?php echo $row->imagename; ?>" width=90px; height=50px alt=""></td>
<td><?php echo $row->email; ?></td>
<td><?php echo $row->mobile; ?></td>
<td><?php echo $row->country; ?></td>
<td><?php echo $row->divisions; ?></td>
<td><?php echo $row->districs; ?></td>
<td><?php echo $row->upazilas; ?></td>
<td><a onclick="return confirm('Are you sure?')" href='<?php echo site_url('Admin/delete/'.$row->user_id)?>'><i class="fa fa-trash"></i></a>&nbsp;&nbsp;
<a  href='<?php echo site_url('Register/edit_register/'.$row->user_id)?>'><i class="fa fa-edit"></i></a>
</td>
<td>
<label class="switch">
 <input type="checkbox"  data-toggle="toggle" mid="<?php echo $row->user_id; ?>" class="managerAction" <?php if($row->role == "1") echo "checked";  ?>> <span class="slider round"></span>                              
 </label>
</td>
</tr>
<?php endforeach; ?>
<tbody>
</table>
<?php endif; 

            }
            else{
              
            
              if ($query->num_rows() > 0) : ?>
              <table class="table table-hover table-responsive" width="100%">
              <thead>
            <th scope="col">Imge</th>
            <th scope="col">Name</th>
              <th scope="col">Email </th>
            <th scope="col">Mobile</th>
              <th scope="col">Edit</th>
                        </thead>
            <tbody>
            <?php
             foreach ($query->result() as $row) : ?>
            <tr>
            <td><img src="<?php echo base_url();?>assets/images/profilephoto/<?php echo $row->imagename; ?>" width=90px; height=50px alt=""></td>
            <td><?php echo $row->username; ?></td>
          <td><?php echo $row->email; ?></td>
          <td><?php echo $row->mobile; ?></td>
            <td>  <a  href='<?php echo site_url('Register/edit_register/'.$row->user_id)?>'><i class="fa fa-edit"></i></a>
            </td>
            
            </tr>
            <?php endforeach; ?>
            <tbody>
            </table>
            <?php endif; 





            }?>



        
        <!-- /.container-fluid -->
        <?php $this->load->view("Admin/contain_foot");?>
<?php $this->load->view("Admin/partials/footer");?>
