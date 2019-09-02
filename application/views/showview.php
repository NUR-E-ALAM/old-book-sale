
 <?php foreach ($query->result() as $row) : ?>
  <div class="card">
  <img class="card-img-top" src="<?php echo base_url();?>assets/images/upload/<?php echo $row->image; ?>" width=600px; height=300px alt="">
     
    <div class="card-body">
      <h5 class="card-title"><?php echo $row->name; ?></h5>
      <h3 class="card-title"><?php echo $row->price; ?>TK</h3>
      <p class="card-text"><i class="fa fa-mobile" 
  ></i><?php echo $row->phone; ?></p>
  <a  href='<?php echo site_url('Mainindex/showall/'.$row->id)?>'><i class="fa  fa-ban"></i></a>
    </div>
    <div class="card-footer">
      <small class="text-muted">Post<?php echo $row->created; ?> </small>
    </div>
  </div>
  
  <?php endforeach; ?>
