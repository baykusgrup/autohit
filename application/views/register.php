<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">Register - <?php echo lang("welcome"); ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <form id="form_sample_4" class="form-horizontal">
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-md-2"> Email Address </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"
                                       placeholder="Enter Mail Adress.."
                                       name="e_mail_member" id="e_mail_member">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2"> Password </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Enter Password.."
                                       name="password_member" id="password_member">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2"> Referral </label>
                            <div class="col-md-9">
                                <input readonly type="text" class="form-control" placeholder="<?php
                                if (isset($ref)) {
                                    echo $ref;
                                }
                                ?>"
                                       name="referral" id="referral" value="<?php
                                if (isset($ref)) {
                                    echo $ref;
                                }
                                ?>">
                            </div>

                            <div  class="tooltips col-md-1 " data-container="body" data-placement="bottom"
                                data-original-title="tooltips">
                                <span class="badge badge-primary badge-roundless"> ? </span>
                            </div>

                        </div>
                    </div>
                    <div class="form-actions">
                        <div id="register_alert" class="alert alert-success" style="display: none;"><strong>Başarılı
                                !</strong> Uploaded Successfully
                        </div>
                        <div class="row">
                            <a role="button" onclick="insertMember();" class="btn blue btn-block">New Member</a>

                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    function insertMember() {

        var e_mail_member = document.getElementById("e_mail_member").value;
        var password_member = document.getElementById("password_member").value;
        var referral = document.getElementById("referral").value;

        var dataString = "e_mail=" + e_mail_member + "&password=" + password_member + "&referral=" + referral;

        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Register/insertMember",
            data: dataString,
            cache: false,
            success: function (result) {
                SuccessAlert("We added you successfull", "register_alert");
            }
        });


    }


</script>
