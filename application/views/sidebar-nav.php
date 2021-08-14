<!DOCTYPE html>
<html>

  <head>
  </head>

  <body>
    <aside class="left-side sidebar-offcanvas main-sidebar">

      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="img/profile01.png" class="img-circle" alt="avatar user" />
            </div>
            <div class="pull-left info">
                <p>User: <small><?php echo $this->session->userdata('username'); ?></small></p>

                <small><i class="fa fa-circle text-success"></i> Online</small>
            </div>
        </div>

        <ul class="sidebar-menu tree" data-widget="tree">

            <?php
                foreach($menu->result() as $row)
                { ?>
                    <li>
                        <a href="<?php echo $row->menu_uri; ?>">
                            <i class="<?php echo $row->menu_icon; ?>"></i> <span><?php echo $row->menu_nama; ?></span>
                        </a>
                    </li>
            <?php    
                }
            ?>

        </ul>
      </section>
      <!-- /.sidebar -->

    </aside>

  </body>
</html>
