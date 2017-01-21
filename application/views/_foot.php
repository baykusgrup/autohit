
<?php
if (!class_exists('Login')) {
?>

</div>
<div class="col-md-3">


    <!-- BEGIN ORDERED LISTS PORTLET-->
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>Daily Top 250
            </div>
        </div>
        <div class="portlet-body">
            <ul class="list-unstyled">
                <?php
                if($todayTop250) {
                    foreach ($todayTop250 as $listToday) {
                        echo "<li>" . $listToday["username"] . "(" . $listToday["visitCount"] . ") </li>";
                    }
                }
                ?>
                <li class="text-center"> <a href="<?php echo base_url() ?>index.php/Top" class="font-red-mint"> See more</a></li>
            </ul>
        </div>
    </div>
    <!-- END ORDERED LISTS PORTLET-->
    <!-- BEGIN UNSTYLED LISTS PORTLET-->
    <div class="portlet box yellow">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>Weekly Top 250
            </div>
        </div>
        <div class="portlet-body">
            <ul class="list-unstyled">
                <?php
                    if($weeklyTop250){
                        foreach ($weeklyTop250 as $listWeekly){
                            echo "<li>".$listWeekly["username"]."(".$listWeekly["visitCount"].") </li>" ;
                        }
                    }


                ?>
                <li class="text-center"> <a href="<?php echo base_url() ?>index.php/Top/Weekly" class="font-red-mint"> See more</a></li>
            </ul>
        </div>
    </div>
    <!-- END UNSTYLED LISTS PORTLET-->

    <!-- BEGIN UNSTYLED LISTS PORTLET-->
    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>Monthly Top 250
            </div>
        </div>
        <div class="portlet-body">
            <ul class="list-unstyled">
                <?php
                if($weeklyTop250){
                    foreach ($monthlyTop250 as $listMonthly){
                        echo "<li>".$listMonthly["username"]."(".$listMonthly["visitCount"].") </li>" ;
                    }
                }

                ?>
                <li class="text-center"> <a href="<?php echo base_url() ?>index.php/Top/Monthly" class="font-red-mint"> See more</a></li>
            </ul>
        </div>
    </div>
    <!-- END UNSTYLED LISTS PORTLET-->
</div>
</div>
</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
</div>
<div class="container">
    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner">2017 &copy; Autohit By
            <a target="_blank" href="http://baykusgrup.com">BaykusGrup</a> | Page rendered in
            <strong>{elapsed_time}</strong> seconds
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->
</div>
</div>

    <?php
}
?>

<!--[if lt IE 9]>
<script src="<?php echo base_url() ?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/excanvas.min.js"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo base_url() ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"
        type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
        type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->


<?php
if (class_exists('Login')) {
    ?>

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js?vLogin"
            type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js?vLogin"
            type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js?vLogin"
            type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/backstretch/jquery.backstretch.min.js?vLogin"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js?vLogin" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/pages/scripts/login-5.js?vLogin" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <?php
} else {
?>


    <?php
}
?>
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url() ?>assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/layouts/global/scripts/quick-sidebar.min.js"
        type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>

<script src="<?php echo base_url() ?>assets/global/plugins/alert.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->

</body>

</html>
