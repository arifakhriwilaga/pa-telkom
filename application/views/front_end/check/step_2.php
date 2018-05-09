<div class="container">
    <div class="row">
        <div class="col-md-10 col-center form-account">
            <div class="panel-form basic-form form">
             <h2 style="text-align: left;color:#e67e22"><?php echo $symptom->symptom; ?></h2><hr>
                <form id="form-check-2" action="<?php echo site_url('front_end/check/validation_checker'); ?>" method="post" style="padding-left:50px;padding-right:50px;">
                    <input type="hidden" name="symptom_id" value="<?php echo $symptom->id; ?>">
                    <input type="hidden" name="step_checkup_id" value="<?php echo $step_checkup->id; ?>">
                    <input type="hidden" name="sickness_true" value="<?php echo $step_checkup->sickness_true; ?>">
                    <input type="hidden" name="sickness_false" value="<?php echo $step_checkup->sickness_false; ?>">
                    <div class="form-group row">
                        <label class="col-md-9"><?php echo $step_checkup->question; ?></label>
                        <label class="col-md-3">
                            <label class="col-md-6">
                                <input type="radio" name="answer" value="true" class="col-md-2"> Ya
                            </label>
                            <label class="col-md-6">
                                <input type="radio" name="answer" value="false" class="col-md-2"> Tidak
                            </label>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>