<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase"><?php echo lang("refferal_Refferal"); ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <p class="font-red-intense"><?php echo lang("refferal_Sponsorship"); ?> </p>
                <p><?php echo lang("refferal_HeresYourReferral"); ?></p>

                <p><strong> <?php
                        if (isset($userInfo[0]["referance_code"])) {
                            echo "<a href=\"" . base_url() . "Register/?ref=" . $userInfo[0]["referance_code"] . "\" >" . base_url() . "Register/?ref=" . $userInfo[0]["referance_code"] . "</a>";
                        } ?></strong></p>

                <p><?php echo lang("refferal_ifYouPrefer"); ?></p>
                <textarea style="margin-bottom: 10px" class="col-md-12" rows="5"> <!--Autosurf NearlyWeb Banner--><a href='<?php if (isset($userInfo[0]['referance_code'])) { echo base_url() . "Register/?ref=" . $userInfo[0]["referance_code"]; } ?>' title='autosurf' alt='autosurf'><img src='<?php echo base_url(); ?>/banners/ban2.gif' width='468' height='60' border='0' title='autosurf' alt='autosurf'></a><!--Autosurf NearlyWeb Banner--> </textarea>


                <p><?php echo lang("refferal_YouEarnOf"); ?></p>
                <p><?php echo lang("refferal_BelowIsTheList"); ?></p>


                <table class="table table-hover table-striped table-bordered">
                    <tbody>
                    <tr>
                        <th colspan="4" class="font-red-intense">
                            <?php echo lang("refferal_YourReferrals"); ?>
                        </th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>
                            <?php echo lang("refferal_Username"); ?>
                        </th>
                        <th>
                            <?php echo lang("refferal_Registered"); ?>
                        </th>
                    </tr>
                        <?php
                            foreach ($refferrals as $ref){

                                echo " <tr>
                                                <td>".$ref["refID"]. " </td>
                                                <td> ".$ref["username"]. " </td>
                                                <td> ".$ref["registered_date"]. " </td>
                                       </tr>";
                            }




                        ?>



                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
