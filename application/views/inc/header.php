<!DOCTYPE html>
<html>
  <head>
  </head>

  <body>

    <!-- header logo: style can be found in header.less -->
    <header class="header">

      <a href="<?php echo base_url(); ?>" class="logo">
          <!-- Add the class icon to your logo image or logo icon to add the margining -->
          Kepegawaian
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">

        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <!-- <span class="sr-only">Toggle navigation</span> -->
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <!-- User toggle button -->
        <div class="navbar-right">
          <ul class="nav navbar-nav sidebar-menu" data-widget="tree">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i>
                <span><?php echo $this->session->userdata('nama'); ?> <i class="caret"></i></span>
              </a>
              <ul class="dropdown-menu">

                <!--  User image -->
                <li class="user-header bg-blue">
                    <img src="img/profile01.png" class="img-circle" alt="User Image" />
                    <p>
                        <?php echo $this->session->userdata('nama'); ?>
                        <small><?php echo $this->session->userdata('role'); ?></small>
                    </p>
                </li>
                
                <!--  Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat" disabled>Profile Setting</a>
                    </div>
                    <div class="pull-right">
                        <a href="<?php echo base_url('home/logout'); ?>" class="btn btn-default btn-flat">Log out</a>
                    </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
  </body>
</html>
