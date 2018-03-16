<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('cms/shared/header'); ?>
    </head>
    <body class="sidebar-mini skin-blue-light" style="height: auto; min-height: 100%;">
        <div class="wrapper">
            <header class="main-header">
                <?php $this->load->view('cms/shared/menu_header'); ?>
            </header>

            <aside class="main-sidebar">
                <?php $this->load->view('cms/shared/menu_sidebar'); ?>
            </aside>

            <div class="content-wrapper">
                <?php $this->load->view($_content); ?>
            </div>
        </div>

        <?php $this->load->view('cms/shared/footer'); ?>
    </body>
</html>
