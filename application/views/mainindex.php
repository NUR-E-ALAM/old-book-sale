<?php $this->load->view('header');?>
<!--backgroud image -->
<div class="view" style="background-image: url('<?php echo base_url();?>tamplete_assets/images/coverbook.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center; height:200px">

<!-- navbar area start -->
<div class="form_style">
    <form class="form-inline" action="<?php echo site_url('Search');?>" method = "post">
<?php echo form_dropdown('category', $cat_options, '','class="p-2 bg-warning"'); ?>
      <input class="form-control mr-sm-2" type="text"  name = "searchvalue" placeholder="Select Option For Special Search" >
      <button class="btn btn-success my-2 p-2 my-sm-0" type="submit">Seacrh Book</button>
     
   

    </div>
   
   
    </div>
    
        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:250px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        
      
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:250px;overflow:hidden;">
       
        <?php foreach ($queryall->result() as $row) : ?>
            <div>
            <a href="<?php echo site_url('Mainindex/showall/'.$row->id)?>">
                <img data-u="image" src="<?php echo base_url();?>assets/images/upload/<?php echo $row->image; ?>" height:250px; />
                </a>
                <!-- <p class="text-danger font-weight-bold"><?php echo $row->bookname; ?> </p> -->
            </div>
            <?php endforeach;?>
        </div>
      
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb057" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5000"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora073" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z"></path>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora073" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z"></path>
            </svg>
        </div>
    </div>
        <!-- carousel carosol area end -->
 

 <div class="card-deck card_style123">
 
 <?php foreach ($query->result() as $row) : ?>
 
 <div class="card" >
  <a  href='<?php echo site_url('Mainindex/showall/'.$row->id)?>'><img class="card-img-top" src="<?php echo base_url();?>assets/images/upload/<?php echo $row->image; ?>" width=150px; height=300px alt=""></a>
     
    <div class="card-body">
      <h6 class="card-title"><?php echo $row->bookname; ?></h6>
      <h5 class="card-title"><?php echo $row->price; ?> টাকা</h5>
      
   <a  href='<?php echo site_url('Mainindex/showall/'.$row->id)?>'>Show More</a>
    </div>
    <div class="card-footer">
      <small class="text-muted">Posted &nbsp; <?php echo $row->created; ?> </small>
    </div>
    </div>
      <?php endforeach; ?>


</div>


<div class="row">
<h2 class="h_header mt-3 ">অপ্রয়োজনীয় বই বিক্রয় এবং প্রয়োজনীয় বই কিনার সহজ মাধ্যম </h2> <!--heading -->
     
      <!-- for edit start -->
      <div class="row my-4">

 
 <?php foreach ($queryall->result() as $row) : ?>
 
 <div class="card col-6 col-md-3" style="width: 18rem;">
  <a  href='<?php echo site_url('Mainindex/showall/'.$row->id)?>'><img class="card-img-top" src="<?php echo base_url();?>assets/images/upload/<?php echo $row->image; ?>" width=150px; height=350px alt=""></a>
     
    <div class="card-body">
      <h6 class="card-title"><?php echo $row->bookname; ?></h6>
      <h5 class="card-title"><?php echo $row->price; ?> টাকা</h5>
      
   <a  href='<?php echo site_url('Mainindex/showall/'.$row->id)?>'>Show More</a>
    </div>
    <div class="card-footer">
      <small class="text-muted">Posted &nbsp; <?php echo $row->created; ?> </small>
    </div>
    </div>
    
      <?php endforeach; ?>
      </div>


      </div>
      <!-- for edit end -->
      <div  class="mx-auto m-4 col-sm-1 col-md-9"><?php echo $links ; ?></div>
     
      
 <?php $this->load->view('footer');?>

 