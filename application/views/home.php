<div class="portlet light bordered">
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <?php
                if ($this->session->userdata('user_id') == NULL) {  echo lang("home_home_be");  }
                ?>
                <?php echo lang("home_what_be"); ?>
                <?php echo lang("home_how_be"); ?>
                <?php echo lang("home_diff_be"); ?>
                <hr/>
                <?php echo lang("home_extra"); ?>
            </div>
        </div>
    </div>
</div>
