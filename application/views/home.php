<div class="portlet light bordered">
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <?php
                if ($this->session->userdata('user_id') == NULL) {  echo lang("home_home");  }
                ?>
                <?php echo lang("home_extra"); ?>
                <hr/>
                <?php echo lang("home_what"); ?>
                <?php echo lang("home_how"); ?>
                <?php echo lang("home_diff"); ?>
            </div>
        </div>
    </div>
</div>
