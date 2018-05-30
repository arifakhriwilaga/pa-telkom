<!--library yang diinstall -->
<script src="<?php echo base_url('assets/includes/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/admin-lte/dist/js/adminlte.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/pg-calendar/dist/js/pignose.calendar.full.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/form.validation/dist/js/formValidation.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/form.validation/dist/js/framework/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/toastr/toastr.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/moment/min/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); ?>"></script>

<!--JS CUSTOM-->
<script>
    // variable untuk config toastr info pada pojok kanan atas
    var config = {
        toastr : {
            closeButton:true,
            tapToDismiss: true,
            toastClass: 'toast',
            containerId: 'toast-container',
            debug: false,

            showMethod: 'fadeIn', //fadeIn, slideDown, and show are built into jQuery
            showDuration: 300,
            showEasing: 'swing', //swing and linear are built into jQuery
            onShown: undefined,
            hideMethod: 'fadeOut',
            hideDuration: 1000,
            hideEasing: 'swing',
            onHidden: undefined,
            closeMethod: false,
            closeDuration: false,
            closeEasing: false,
            closeOnHover: true,

            extendedTimeOut: 1000,
            iconClasses: {
                error: 'toast-error',
                info: 'toast-info',
                success: 'toast-success',
                warning: 'toast-warning'
            },
            
            positionClass: 'toast-top-right',
            timeOut: 5000, // Set timeOut and extendedTimeOut to 0 to make it sticky
            titleClass: 'toast-title',
            messageClass: 'toast-message',
            escapeHtml: false,
            target: 'body',
            closeHtml: '<button type="button">&times;</button>',
            closeClass: 'toast-close-button',
            newestOnTop: true,
            preventDuplicates: false,
            progressBar: true,
            progressClass: 'toast-progress',
            rtl: false
        }
    }
    
    function base_url(path) {
        return <?php echo json_encode(base_url()); ?> + path.replace(/^\//g, '');
    }
    function site_url(path) {
        return <?php echo json_encode(site_url()); ?> + path.replace(/^\//g, '');
    }
    
    // kondisi ketika toastr info pada pojok kanan atas mana yang akan muncul
    <?php if($this->session->flashdata('success')){ ?>
        toastr.success("<?php echo $this->session->flashdata('success'); ?>", '', config.toastr);
    <?php }else if($this->session->flashdata('error')){  ?>
        toastr.error("<?php echo $this->session->flashdata('error'); ?>", '', config.toastr);
    <?php }else if($this->session->flashdata('warning')){  ?>
        toastr.warning("<?php echo $this->session->flashdata('warning'); ?>", '', config.toastr);
    <?php }else if($this->session->flashdata('info')){  ?>
        toastr.info("<?php echo $this->session->flashdata('info'); ?>", '', config.toastr;
    <?php } ?>
</script>
<script src="<?php echo base_url('assets/js/functions.js'); ?>"></script>

<?php
// kondisi ini untuk menampilkan '_js' yang dikirim melalui controller PHP
if (isset($_js) && $_js) {
    if (!is_array($_js)) {
        $_js = array((string) $_js);
    }
    foreach ($_js as $value) {
        $_url = $value;
        if (!preg_match('/^http/', $_url)) {
            $_url = base_url($_url . "?_ver=" . md5_file($_url));
        }
        ?>
        <script src="<?php echo htmlspecialchars($_url); ?>" type="text/javascript"></script>
        <?php
    }
}
?>