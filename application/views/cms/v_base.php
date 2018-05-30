<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- menampilkan html v_header -->
        <?php $this->load->view('cms/shared/v_header'); ?>
    </head>
    <body class="sidebar-mini skin-blue-light" style="height: auto; min-height: 100%;">
        <div class="wrapper">
            <header class="main-header">
                <!-- menampilkan html v_menu_header -->
                <?php $this->load->view('cms/shared/v_menu_header'); ?>
            </header>

            <aside class="main-sidebar">
                <!-- menampilkan html v_menu_sidebar -->
                <?php $this->load->view('cms/shared/v_menu_sidebar'); ?>
            </aside>

            <div class="content-wrapper">
                <!-- menampilkan html '_content' yang dikirim melalui controller PHP -->
                <?php $this->load->view($_content); ?>
            </div>
        </div>

        <!-- menampilkan html v_footer -->
        <?php $this->load->view('cms/shared/v_footer'); ?>
    </body>
</html>
