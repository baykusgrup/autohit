<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">My Account - <?php echo lang("welcome"); ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <div id="account_alert" class="alert alert-success" style="display: none;"><strong>Başarılı
                        !</strong> Uploaded Successfully
                </div>
                <table class="table table-hover table-striped table-bordered">
                    <tbody>
                    <tr>
                        <th colspan="3" class="font-red-intense">
                            Account İnfo
                        </th>

                    </tr>
                    <tr>
                        <td>Member ID</td>
                        <td>

                            <?php
                            if (isset($userInfo[0]["user_id"])) {
                                echo $userInfo[0]["user_id"];
                            } ?>
                        </td>

                        <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                            data-original-title="tooltips">
                            <span class="badge badge-primary badge-roundless"> ? </span>
                        </td>
                    </tr>
                    <tr>
                        <td> Email</td>
                        <td>
                            <?php
                            if (isset($userInfo[0]["email"])) {
                                echo $userInfo[0]["email"];
                            } ?>
                        </td>
                        <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                            data-original-title="tooltips">
                            <span class="badge badge-primary badge-roundless"> ? </span>
                        </td>
                    </tr>
                    <tr>
                        <td> Password</td>
                        <td id="pass_td">
                            <?php
                            if (isset($userInfo[0]["password"])) {
                                echo "<a id='passLink' style='display: block' role=\"button\" onclick=\"changePassDiv();\">". $userInfo[0]["password"]."</a>";
                            }
                            ?>

                            <div class="form-group" id="password_changeDiv" style="display: none" >
                                <input class="form-action" type="password" id="new_password" >
                            </div>
                            <div class="form-group" id="password_changeDiv2" style="display: none" >
                                <input class="form-action" type="password" id="new_password2" >
                            </div>

                            <div class="form-group" id="password_Done" style="display: none" >
                                <a  type="button" onclick="changePassword();"   >Done</a>
                            </div>

                        </td>
                        <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                            data-original-title="tooltips">
                            <span class="badge badge-primary badge-roundless"> ? </span>
                        </td>
                    </tr>
                    <tr>
                        <td> Registered</td>
                        <td>
                            <?php
                            if (isset($userInfo[0]["registered_date"])) {
                                echo $userInfo[0]["registered_date"];
                            } ?>
                        </td>
                        <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                            data-original-title="tooltips">
                            <span class="badge badge-primary badge-roundless"> ? </span>
                        </td>
                    </tr>
                    <tr>
                        <td> Viewer Rate</td>
                        <td>
                            <?php
                            if (isset($userInfo[0]["view_rate"])) {
                                echo $userInfo[0]["view_rate"];
                            } ?>
                        </td>
                        <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                            data-original-title="tooltips">
                            <span class="badge badge-primary badge-roundless"> ? </span>
                        </td>
                    </tr>
                    <tr>
                        <td> Available Credits</td>
                        <td>sss
                        </td>
                        <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                            data-original-title="tooltips">
                            <span class="badge badge-primary badge-roundless"> ? </span>
                        </td>
                    </tr>
                    <tr>
                        <td> Total Credits</td>
                        <td>
                            <?php
                            if (isset($userInfo[0]["total_credits"])) {
                                echo $userInfo[0]["total_credits"];
                            } ?>
                        </td>
                        <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                            data-original-title="tooltips">
                            <span class="badge badge-primary badge-roundless"> ? </span>
                        </td>
                    </tr>
                    <tr>
                        <td> Websites viewed today</td>
                        <td>sss
                        </td>
                        <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                            data-original-title="tooltips">
                            <span class="badge badge-primary badge-roundless"> ? </span>
                        </td>
                    </tr>
                    <tr>
                        <td> Referance Code</td>
                        <td>
                            <?php
                            if (isset($userInfo[0]["referance_code"])) {
                                echo "<a href=\"".base_url()."index.php/Register/?ref=".$userInfo[0]["referance_code"]."\" >".$userInfo[0]["referance_code"]."</a>";
                            } ?>
                        </td>

                        <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                            data-original-title="tooltips">
                            <span class="badge badge-primary badge-roundless"> ? </span>
                        </td>
                    </tr>
                    <tr>
                        <td> Credits by promotion
                            (last 24 hours)
                        </td>
                        <td>sss
                        </td>
                        <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                            data-original-title="tooltips">
                            <span class="badge badge-primary badge-roundless"> ? </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-striped table-bordered">
                    <tbody>
                    <tr>
                        <th colspan="3" class="font-red-intense">
                            Account Settings
                        </th>
                    </tr>
                    <tr>
                        <td>Auto Distribution</td>

                        <td>
                            <label class="mt-checkbox mt-checkbox-outline">
                                No
                                <input type="checkbox" value="1" name="test"/>
                                <span></span>
                            </label>
                        </td>
                        <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                            data-original-title="
When enabled, this option allows you to automatically distribute the credits earned through the viewer to your active sites. To accumulate credits in your bank you should disable this option. This option do not have any impact on credits purchased or already in the bank. ">
                            <span class="badge badge-primary badge-roundless"> ? </span>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">

   function changePassDiv(){
       document.getElementById("password_changeDiv").style = "display: block";
       document.getElementById("password_changeDiv2").style = "display: block";
       document.getElementById("passLink").style = "display: none";
       document.getElementById("password_Done").style = "display: block";
   }

   function changePassword() {

       var pass = document.getElementById("new_password").value;
       var controll_pass = document.getElementById("new_password2").value;
       var dataString = "pass=" +pass;
       if(pass==controll_pass){
           $.ajax({
               type: "POST",
               url: base_url + "/index.php/Account/changePassword",
               data: dataString,
               cache: false,
               success: function (result) {
                   SuccessAlert("We updated your password successfully!","account_alert");

                   document.getElementById("password_changeDiv").style = "display: none";
                   document.getElementById("password_changeDiv2").style = "display: none";
                   document.getElementById("passLink").style = "display: block";
                   document.getElementById("password_Done").style = "display: none";
                   document.getElementById("pass_td").innerHTML = "<a id='passLink' style='display: block' role=\"button\" onclick=\"changePassDiv();\">"+pass+"</a>";
               }
           });
       }
       else{
           WarningAlert ("Plese give the same password for updating!", "account_alert");
       }






   }
</script>