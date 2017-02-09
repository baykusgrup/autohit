<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase"><?php echo lang("autobacklink_autobacklink"); ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">

                <script src="http://baykusgrup.com/_/ekstra/otobacklink.js"></script>


                <div id="icerik-hizmet" class="icerik">
                    <?php echo lang("autobacklink_exp"); ?>

                    <table>
                        <tr>
                            <td>
                                <input type='hidden' id='currentk' value='0'>
                                <input type='hidden' id='cwindow' value='0'></td>
                            <td colspan='2'><input type='text' name='domain' id='domain' value='nearlyweb.com'></td>
                            <td><input type='button' value='<?php echo lang("autobacklink_start"); ?>' name='submit'
                                       onclick="beginu();"></td>
                        </tr>
                        <tr>
                            <td colspan='4'>
                                <p><br/>
                                    <b>  <?php echo lang("autobacklink_state"); ?></b> <span id='statusk'></span>
                                    <br/>
                                    <b>  <?php echo lang("autobacklink_total_earned"); ?></b><span id='totalbl'></span>
                                </p>
                            </td>
                        </tr>
                    </table>


                    <blockquote>
                        <p><?php echo lang("autobacklink_expp"); ?></p>
                    </blockquote>
                </div>

            </div>
        </div>

    </div>
</div>
