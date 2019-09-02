<?php $this->load->view('header');?>
<div class="view" style="background-image: url('<?php echo base_url();?>tamplete_assets/image/coverbook.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center; height:60px">

<!-- navbar area start -->

   
   
    </div>
 <?php foreach ($query->result() as $row): ?>
 
		<nav>

  <div class="nav nav-tabs" id="nav-tab" role="tablist">
  <a class="nav-item nav-link "  href="javascript:window.history.go(-1);">About Book</a>
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Profile Details</a>
   
  </div>

</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">  <span class="reducedfrom "> 
  <div class="row">
  <div class="col-md-6">
  <h2 class="text-center"><img src="<?php echo base_url();?>assets/images/profilephoto/<?php echo $row->imagename; ?>" class="rounded mx-auto d-block" width="300px" height="300px" alt=""></h2>
  </div>

  <div class="col-md-6">
  <table class="table table-hover">
<tr>
<td> Name:</td>
	<td class=""><?php echo $row->username; ?></td>
  </tr>
  <td>Phone:</td>
	<td class=""><a href="tel:<?php echo $row->mobile; ?>"><?php echo $row->mobile ; ?></td>
  <tr>
  <td> Email :</td>
	<td class=""><?php echo $row->email; ?></td>
  </tr>
  <tr>
  <td> Upazila :</td>
	<td class=""><?php echo $row->upazilas; ?></td>
  </tr>
  <tr>
  <td> District :</td>
	<td class=""><?php echo $row->districs; ?></td>
  </tr>
  <tr>
  <td> Devision :</td>
	<td class=""><?php echo $row->divisions; ?></td>
  </tr>
  <tr>
  <td> Country :</td>
	<td class=""><?php echo $row->country; ?></td>
  </tr>
  <!-- <td>Details</td>
  <td><a  href='<?php echo site_url('Mainindex/showuserdetails/'.$row->username)?>'><i class="fa fa-user"></i>User Dtrails</a></td> -->
 


  
	</table>

  </div>
  </div>
	
  
	

</div>
    
   
     <?php endforeach; ?>
     
<br>
<br>
<br>
<br>
<br>
<br>

     <?php $this->load->view('footer');?>




 
	