        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url('assets/images/home/header/logo-icon.png'); ?>" rel="shortcut icon"/>
        <title>KESDIKA | <?php echo $page_title; ?></title>

        <!--Dependencies Package-->
        <link rel="stylesheet" href="<?php echo base_url('assets/includes/bootstrap/dist/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/includes/font-awesome/css/font-awesome.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/includes/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/includes/form.validation/dist/css/formValidation.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/includes/pg-calendar/dist/css/pignose.calendar.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/includes/toastr/toastr.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/includes/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/includes/select2/dist/css/select2.min.css')?>" rel="stylesheet" />
        
        <!--External Dependencies-->
        <link rel="stylesheet" href="<?php echo base_url('assets/fonts/stylesheet.css'); ?>">
        
        <!--Theme custom css -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/navmenu/styles.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

        <?php
        /* ----- CSS HANDLE ----- */
        if (isset($_css) && $_css) {
            if (!is_array($_css)) {
                $_css = array((string) $_css);
            }
            foreach ($_css as $value) {
                $_url = $value;
                if (!preg_match('/^http/', $_url)) {
                    $_url = base_url($_url . "?_ver=" . md5_file($_url));
                }
                ?>
                <link href="<?php echo htmlspecialchars($_url); ?>" type="text/css" rel="stylesheet"/>
                <?php
            }
        }
        ?>
