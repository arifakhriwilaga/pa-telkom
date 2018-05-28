<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('cms/shared/v_header'); ?>
    </head>
    <body class="sidebar-mini skin-blue-light" style="height: auto; min-height: 100%;">
        <div class="wrapper">
            <header class="main-header">
                <?php $this->load->view('cms/shared/v_menu_header'); ?>
            </header>

            <aside class="main-sidebar">
                <?php $this->load->view('cms/shared/v_menu_sidebar'); ?>
            </aside>

            <div class="content-wrapper">
                <?php $this->load->view($_content); ?>
            </div>
        </div>

        <?php $this->load->view('cms/shared/v_footer'); ?>
    </body>
</html>
