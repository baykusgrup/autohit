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
                        <td> Username</td>
                        <td id="username_td">
                            <?php
                            if (isset($userInfo[0]["username"])) {
                                echo "<div id='usernameLink' type=\"email\"  style='display: block' role=\"button\" onclick=\"changeUsernameDiv();\">" . $userInfo[0]["username"] . "</div>";
                            }
                            ?>
                            <div class="form-group" id="username_changeDiv" style="display: none">
                                <input id="new_username" type="text" class="form-control" placeholder="New Username..">
                            </div>

                        </td>
                        <td id="email_td2">
                            <span id='usernameLink2' type="username" style='display: block' role="button"
                                  onclick="changeUsernameDiv();" class="badge badge-primary badge-roundless"> edit </span>

                            <span id='username_Done' type="username" style='display: none' role="button"
                                  class="badge badge-primary badge-roundless" onclick="changeUsername();"> Save </span>

                        </td>
                    </tr>
                    <tr>
                        <td> Email</td>
                        <td id="email_td">
                            <?php
                            if (isset($userInfo[0]["email"])) {
                                echo "<div id='emailLink' type=\"email\"  style='display: block' role=\"button\" onclick=\"changeEmailDiv();\">" . $userInfo[0]["email"] . "</div>";
                            }
                            ?>
                            <div class="form-group" id="email_changeDiv" style="display: none">
                                <input id="new_email" type="email" class="form-control" placeholder="new email">
                            </div>

                        </td>
                        <td id="email_td2">
                            <span id='emailLink2' type="email" style='display: block' role="button"
                                  onclick="changeEmailDiv();" class="badge badge-primary badge-roundless"> edit </span>

                            <span id='email_Done' type="email" style='display: none' role="button"
                                  class="badge badge-primary badge-roundless" onclick="changeEmail();"> Save </span>

                        </td>
                    </tr>
                    <tr>
                        <td> Password</td>
                        <td id="pass_td">
                            <?php
                            if (isset($userInfo[0]["password"])) {
                                echo "<div id='passLink' type=\"password\"  style='display: block' role=\"button\" onclick=\"changePassDiv();\">******</div>";
                            }
                            ?>
                            <div class="form-group" id="password_changeDiv" style="display: none">
                                <input id="new_password" type="password" class="form-control" placeholder="password">
                            </div>

                            <div class="form-group" id="password_changeDiv2" style="display: none">
                                <input id="new_password2" type="password" class="form-control" placeholder="password">
                            </div>
                        </td>
                        <td id="pass_td2">
                            <span id='passLink2' type="password" style='display: block' role="button"
                                  onclick="changePassDiv();" class="badge badge-primary badge-roundless"> edit </span>

                            <span id='password_Done' type="password" style='display: none' role="button"
                                  class="badge badge-primary badge-roundless" onclick="changePassword();"> Save </span>

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
                        <td><?php if (isset($userInfo[0]["total_credits"])) {
                                    echo $userInfo[0]["total_credits"];
                                } ?>
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
                        <td><?php
                            if (isset($todayCount[0]["today"])) {
                                echo $todayCount[0]["today"];
                            } ?>
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
                                echo "<a href=\"" . base_url() . "index.php/Register/?ref=" . $userInfo[0]["referance_code"] . "\" >" . $userInfo[0]["referance_code"] . "</a>";
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

    function changePassDiv() {
        document.getElementById("password_changeDiv").style = "display: block";
        document.getElementById("password_changeDiv2").style = "display: block";
        document.getElementById("passLink").style = "display: none";
        document.getElementById("passLink2").style = "display: none";
        document.getElementById("password_Done").style = "display: block";
    }

    function changePassword() {

        var pass = document.getElementById("new_password").value;
        var controll_pass = document.getElementById("new_password2").value;
        var dataString = "pass=" + pass;
        if (pass == controll_pass && pass != "") {
            $.ajax({
                type: "POST",
                url: base_url + "/index.php/Account/changePassword",
                data: dataString,
                cache: false,
                success: function (result) {
                    SuccessAlert("We updated your password successfully!", "account_alert");

                    document.getElementById("password_changeDiv").style = "display: none";
                    document.getElementById("password_changeDiv2").style = "display: none";
                    document.getElementById("passLink").style = "display: block";
                    document.getElementById("password_Done").style = "display: none";
                    document.getElementById("pass_td").innerHTML = "<div id='passLink' style='display: block' role=\"button\" onclick=\"changePassDiv();\">" + pass + "</div>";
                    document.getElementById("pass_td2").innerHTML = "<span style='display: block' role='button' onclick='changePassDiv();' class='badge badge-primary badge-roundless'> saved </span>";
                }
            });
        }
        else {
            WarningAlert("Plese give the same password for updating!", "account_alert");
        }
    }


    function changeEmailDiv() {
        document.getElementById("email_changeDiv").style = "display: block";
        document.getElementById("emailLink").style = "display: none";
        document.getElementById("emailLink2").style = "display: none";
        document.getElementById("email_Done").style = "display: block";
    }

    function changeUsernameDiv() {
        document.getElementById("usernameLink").style = "display: none";
        document.getElementById("username_changeDiv").style = "display: block";
        document.getElementById("usernameLink2").style = "display: none";
        document.getElementById("username_Done").style = "display: block";
    }

    function changeUsername() {
        var username = document.getElementById("new_username").value;
        var dataString = "username=" + username;
        if (username != "") {
            $.ajax({
                type: "POST",
                url: base_url + "/index.php/Account/changeUsername",
                data: dataString,
                cache: false,
                success: function (result) {
                    SuccessAlert("We updated your username successfully!", "account_alert");

                    document.getElementById("email_changeDiv").style = "display: none";
                    document.getElementById("emailLink").style = "display: block";
                    document.getElementById("emailLink2").style = "display: none";
                    document.getElementById("email_Done").style = "display: none";
                    document.getElementById("email_td").innerHTML = "<div id='emailLink' style='display: block' role=\"button\" onclick=\"changeEmailDiv();\">" + email + "</div>";
                    document.getElementById("email_td2").innerHTML = "<span style='display: block' role='button' onclick='changeEmailDiv();' class='badge badge-primary badge-roundless'> saved </span>";

                }
            });
        }
        else {
            WarningAlert("Plese give the username for updating!", "account_alert");
        }

    }

    function changeEmail() {

        var email = document.getElementById("new_email").value;
        var dataString = "email=" + email;
        if (email != "") {
            $.ajax({
                type: "POST",
                url: base_url + "/index.php/Account/changeEmail",
                data: dataString,
                cache: false,
                success: function (result) {
                    SuccessAlert("We updated your email successfully!", "account_alert");

                    document.getElementById("email_changeDiv").style = "display: none";
                    document.getElementById("emailLink").style = "display: block";
                    document.getElementById("emailLink2").style = "display: none";
                    document.getElementById("email_Done").style = "display: none";
                    document.getElementById("email_td").innerHTML = "<div id='emailLink' style='display: block' role=\"button\" onclick=\"changeEmailDiv();\">" + email + "</div>";
                    document.getElementById("email_td2").innerHTML = "<span style='display: block' role='button' onclick='changeEmailDiv();' class='badge badge-primary badge-roundless'> saved </span>";

                }
            });
        }
        else {
            WarningAlert("Plese give the same email for updating!", "account_alert");
        }
    }
</script>
