<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">Refferal</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <p class="font-red-intense">Sponsorship </p>
                <p>Here's your referral link to share:</p>

                <p><strong> <?php
                        if (isset($userInfo[0]["referance_code"])) {
                            echo "<a href=\"" . base_url() . "index.php/Register/?ref=" . $userInfo[0]["referance_code"] . "\" >" . base_url() . "index.php/Register/?ref=" . $userInfo[0]["referance_code"] . "</a>";
                        } ?></strong></p>

                <p>Or, if you prefer, you can add this banner on your site:</p>
                <textarea style="margin-bottom: 10px" class="col-md-12" rows="5"> <!--Autosurf NearlyWeb Banner--><a
                            href='<?php if (isset($userInfo[0]['referance_code'])) {
                                echo base_url() . "index.php/Register/?ref=" . $userInfo[0]["referance_code"];
                            } ?>' title='autosurf' alt='autosurf'><img
                                src='<?php echo base_url(); ?>/banners/ban2.gif' width='468' height='60' border='0'
                                title='autosurf' alt='autosurf'></a><!--Autosurf NearlyWeb Banner--> </textarea>


                <p>You earn 10% of all credits that members registered through your referral link will earn using the
                    viewer.</p>
                <p>Below is the list of members and the number of credits you have earned.</p>


                <table class="table table-hover table-striped table-bordered">
                    <tbody>
                    <tr>
                        <th colspan="4" class="font-red-intense">
                            Your referrals
                        </th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>
                            Username
                        </th>
                        <th>
                            credits earned
                        </th>
                        <th>
                            Registered
                        </th>
                    </tr>
                       <tr>
                            <td> ss
                            </td>
                            <td>sss
                            </td>
                            <td>sss
                            </td>
                            <td> sss
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
