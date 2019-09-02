<ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
<!--  -->



<!-- add and show books menu start -->

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
            <span>Author</span></a>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href='<?php echo site_url('Author')?>'>Show Atuher</a>
            <a class="dropdown-item" href='<?php echo site_url('Author/add_author')?>'>Add Author</a>
           
          </div>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i>
            <span>Users</span></a>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href='<?php echo site_url('Admin')?>'>Users</a>
            <a class="dropdown-item" href='<?php echo site_url('Author/add_author')?>'>Add Author</a>
           
          </div>
        </li>
<!--  -->

      
      </ul>