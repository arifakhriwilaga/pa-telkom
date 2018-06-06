<!--Dependencies Package-->
<script src="<?php echo base_url('assets/includes/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/pg-calendar/dist/js/pignose.calendar.full.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/form.validation/dist/js/formValidation.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/form.validation/dist/js/framework/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/toastr/toastr.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/moment/min/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/includes/select2/dist/js/select2.min.js') ?>"></script>

<!--This is link only for gmaps-->
<!-- <script src="<?php echo base_url('assets/includes/google-maps/lib/Google.min.js'); ?>"></script> -->
<!-- <script src="<?php echo base_url('assets/js/gmaps.min.js'); ?>"></script> -->

<!--Custom JS-->
<script>
    function base_url(path) {
        return <?php echo json_encode(base_url()); ?> + path.replace(/^\//g, '');
    }
    function site_url(path) {
        return <?php echo json_encode(site_url()); ?> + path.replace(/^\//g, '');
    }
</script>
<script src="<?php echo base_url('assets/js/functions.js'); ?>"></script>
<script>
    <?php if($this->session->flashdata('success')){ ?>
        toastr.success("<?php echo $this->session->flashdata('success'); ?>",'',Object.assign(config.toastr,{ iconClass: 'toast-success' }));
    <?php }else if($this->session->flashdata('error')){  ?>
        toastr.error("<?php echo $this->session->flashdata('error'); ?>", '', Object.assign(config.toastr,{ iconClass: 'toast-error' }));
    <?php }else if($this->session->flashdata('warning')){  ?>
        toastr.warning("<?php echo $this->session->flashdata('warning'); ?>", '', Object.assign(config.toastr,{ iconClass: 'toast-warning' }));
    <?php }else if($this->session->flashdata('info')){  ?>
        toastr.info("<?php echo $this->session->flashdata('info'); ?>", '', Object.assign(config.toastr,{ iconClass: 'toast-info' }));
    <?php } ?>
        
    var user_id = "<?php echo $user['id_user']; ?>";
    count_notification(user_id);

    $(window).on('unload', function(e) {
        document.cookie = '';
    });
</script>
<?php
/* ----- JS HANDLE ----- */
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