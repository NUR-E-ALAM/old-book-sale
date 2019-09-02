<?php $this->load->view('header');?>
<div class="view" style="background-image: url('<?php echo base_url();?>tamplete_assets/images/coverbook.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center; height:150px">

<!-- navbar area start -->
<div class="form_style">
    <form class="form-inline" action="<?php echo site_url('Search');?>" method = "post">

      <input class="form-control mr-sm-2" type="text"  name = "searchvalue" placeholder="Select Option For Special Search" >
      <button class="btn btn-success my-2 p-2 my-sm-0" type="submit">Seacrh Book</button>
     
   

    </div>
   
   
    </div>
 <?php foreach ($query->result() as $row): ?>
 
		<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">About Book</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Contact Now </a>    
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">  <span class="reducedfrom ">
  <div class="row">
  <div class="col-md-6">
  <h2 class="text-center"><img src="<?php echo base_url();?>assets/images/upload/<?php echo $row->image; ?>" class="rounded mx-auto d-block" width="350px" height="500px" alt=""></h2>
  </div>
  <div class="col-md-6">
  
<table class="table table-hover">
<tr>
<td>BooK Name:</td>
	<td class=""><?php echo $row->bookname; ?></td>
  </tr>
  <tr>
  <td>Writer Name:</td>
	<td class=""><?php echo $row->author_name; ?></td>
  </tr>
  <tr>
  <td>Price:</td>
	<td class=""><?php echo $row->price; ?>&nbsp;TK</td>
  </tr>
  <tr>
  <td>Description:</td>
	<td class=""><?php echo $row->description; ?></td>
  </tr>
  <tr>
  <td>Publication:</td>
	<td class=""><?php echo $row->publication; ?></td>
  </tr>
  <tr>
  <td></td>
	<td class=""></td>
  </tr>
  
	</table>
  </div>
  </div>
 
  




  <?php if($havecomments != 0): ?> 
  <h5 class="text-center">View Comment</h5>
  <?php
foreach($comments->result() as $row1): ?>
<table clas="table table-responsive" width=100%  >
<tr>
<h5><?php echo $row1->com_name; ?></h5>
  <hr>
</tr>
<tr>
  <td>Comment </td>
  <td><?php echo $row1->comment_details; ?> </td>
</tr>
<?php endforeach ?>
<?php else: ?>
          <p>There is no comments .</p>
        <?php endif; ?>  
</table>
 
<form action="<?php echo base_url(); ?>Mainindex/add_comment/<?php echo $row->id; ?>" method="post">
<h3 class="text-center">Add Your Comment</h3>
  <div class="form-group">
    <label for="exampleFormControlInput1">Name:</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Your Full name">
    <?php if(form_error('name')):?><span class="error text-danger"><?php echo form_error('name');?></span><?php endif;?>
  </div>
    <div class="form-group">
    <label for="phone">Phone :</label>
    <input type="tel" class="form-control" id="phone"  name="phone" placeholder="Your Contact Number">
    <?php if(form_error('phone')):?><span class="error text-danger"><?php echo form_error('phone');?></span><?php endif;?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Your Message</label>
    <textarea class="form-control" name="commentdetails" id="exampleFormControlTextarea1" rows="3"></textarea>
    <?php if(form_error('commentdetails')):?><span class="error text-danger"><?php echo form_error('commentdetails');?></span><?php endif;?>
  </div>
  <input type="hidden" name="booksid" value="<?php echo $row->id; ?> "/>
   <button type="submit" class="btn btn-primary mb-2">Submit</button>
</form>

<?php endforeach ?>
	  </span></div>
    <?php foreach ($query->result() as $row): ?>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">  
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
  <tr>
  <td> Email :</td>
	<td class=""><?php echo $row->email; ?></td>
  </tr>
  <tr>
  <td>Phone:</td>
	<td class=""><a href="tel:<?php echo $row->mobile; ?>"><?php echo $row->mobile ; ?></td>
  </tr>
  
  
	</table>
  </div>
  </div>
	
  
	

</div>
    
   
     <?php endforeach; ?>


     <?php $this->load->view('footer');?>




 
	