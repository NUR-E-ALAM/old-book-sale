<ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href='<?php echo site_url('Mainindex')?>'>
            <i class="fa  fa-tachometer"></i>
            <span>Go Home</span>
          </a>
        </li>
<!--  -->



<!-- add and show books menu start -->

        
  
      <?php if ( $this->session->userdata('role')==1){?>
  <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa fa-info"></i>
    <span>Books</span></a>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href='<?php echo site_url('Books')?>'>Show Book</a>
    <a class="dropdown-item" href='<?php echo site_url('Books/addbooks')?>'>Add Book</a>
   
  </div>
</li>
<!-- add and show books end -->
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa fa-user"></i>
    <span>Category</span></a>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
  <a class="dropdown-item" href='<?php echo site_url('Category')?>'>Show Category</a>
    <a class="dropdown-item" href='<?php echo site_url('Category/addcategory')?>'>Add Category</a>
   
  </div>
</li>

<!-- add and show Group end -->
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa fa-info"></i>
    <span>Group</span></a>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href='<?php echo site_url('Group')?>'>Show Group</a>
    <a class="dropdown-item" href='<?php echo site_url('Group/add_group')?>'>Add Group</a>
   
  </div>
</li>

<!-- add and show author menu start -->



<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa fa-user"></i>
    <span>Profile</span></a>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
  <a class="dropdown-item" href='<?php echo site_url('Profile/addprofile')?>'>Complete Your Profile</a>
     <a class="dropdown-item" href='<?php echo site_url('Profile/updateprofile/'.$this->session->userdata('user_id'))?>'>Update Profile</a>
   
  </div>
</li>
<!--  -->
<?php }
  else{ ?>
    
    <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa fa-info"></i>
    <span>Books</span></a>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href='<?php echo site_url('Books/index_creart_user')?>'>Show Book</a>
    <a class="dropdown-item" href='<?php echo site_url('Books/addbooks')?>'>Add Book</a>
   
  </div>
</li>
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa fa-user"></i>
    <span> Profile</span></a>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href='<?php echo site_url('Profile/addprofile')?>'>Complete Your Profile</a>
     <a class="dropdown-item" href='<?php echo site_url('Profile/updateprofile/'.$this->session->userdata('user_id'))?>'>Update Profile</a>
   
   
  </div>
</li>>

 <?php }


?>
    
    </ul>