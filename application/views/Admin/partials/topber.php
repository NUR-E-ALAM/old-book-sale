<!-- clock -->
<!-- the clock is source ->sb-admin.css -->


<!-- clock -->
   <!-- Navbar Search -->
   <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action="<?php echo site_url('Search');?>" method = "post">
        <div class="input-group">
          <input type="text" class="form-control" name = "searchvalue" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
          
          <a class="nav-link"><img class="rounded border border-danger" src="<?php echo base_url();?>assets/images/profilephoto/<?php echo  $this->session->userdata('image');?>" width=50px;></a>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          
          <a class="nav-link" href='<?php echo site_url('Admin/logout')?>'>Logout</a>
        </li>
      
        <li class="nav-item dropdown no-arrow mx-1">
          
          <a class="nav-link"></a>
        </li>
        
        </ul>

    </nav> 

    <div id="wrapper">

      <!-- Logout Modal start -->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
      <!-- Logout Modal end-* -->
