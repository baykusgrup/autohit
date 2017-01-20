<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">My Sites</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <div id="dis_alert" class="alert alert-success"
                     style="display: none;"><strong>Başarılı
                        !</strong> Uploaded Successfully
                </div>
                <table class="table table-hover table-striped table-bordered">
                    <tbody>
                    <tr>
                        <th colspan="3" class="font-red-intense">
                            Easy Distribution
                        </th>
                    </tr>
                    <tr>
                        <td colspan="3" class="font-red"> Available Credits: <a
                                    id="i_credit"><?php if (isset($userWallet[0]["total_credits"])) {
                                    echo $userWallet[0]["total_credits"];
                                } ?></a></td>
                    </tr>
                    <tr>
                        <td> Total Amount Credit</td>
                        <td class="col-md-5">
                            <div class="input-group input-medium">
                                <input type="text" id="total_amount_credit" class="form-control">
                                <span class="input-group-btn">
                                                            <button onclick="totalAmountDisCredit()"
                                                                    class="btn btn-outline blue "
                                                                    type="button">Add!</button>
                                                        </span>
                            </div>


                        </td>
                        <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                            data-original-title="tooltips">
                            <span class="badge badge-primary badge-roundless"> ? </span>
                        </td>
                    </tr>
                    <tr>
                        <td> Per Site Amount Credit</td>

                        <td class="col-md-5">
                            <div class="input-group input-medium">
                                <input id="total_per_credit" type="text" class="form-control">
                                <span class="input-group-btn">
                                                            <button onclick="perDisCredit()"
                                                                    class="btn btn-outline blue "
                                                                    type="button">Add!</button>
                                                        </span>
                            </div>


                        </td>
                        <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                            data-original-title="tooltips">
                            <span class="badge badge-primary badge-roundless"> ? </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <hr/>

                <div class="portlet-fit ">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th colspan="2" class="font-red-intense">
                                    Active website

                                </th>
                                <th colspan="3">

                                    <a type="button" onclick="clearAddsiteForm();"
                                       href="#modal_addSite" class="btn blue btn-block"
                                       data-toggle="modal" role="button"> <i class="fa fa-plus-square-o"></i>
                                        Add Site </a>
                                </th>

                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Site name</th>
                                <th>Url</th>
                                <th>Crdt</th>
                                <th>Received<br> today</th>
                                <th>Edit</th>
                            </tr>
                            <tbody id="mySites_table">
                            <?php
                            foreach ($sites as $site) {
                                echo "<tr>
                                                <td id='updateSite_siteID_" . $site["websites_id"] . "' >" . $site["websites_id"] . "</td>
                                                <td id='updateSite_title_" . $site["websites_id"] . "'>" . substr($site["page_title"], 0, 15) . "</td>
                                                <td id='updateSite_url_" . $site["websites_id"] . "'>" . substr($site["url"], 0, 25) . "</td>
                                                <td id='updateSite_credits_" . $site["websites_id"] . "'>" . $site["credits"] . "</td>
                                                <td style='display:none' id='updateSite_duration_" . $site["websites_id"] . "'>" . $site["duration_sec_id"] . "</td>
                                                <td>sss</td>
                                                <td><a name='sites_selector' site_id='" . $site["websites_id"] . "' onclick=\"setUpdateSite(" . $site["websites_id"] . ");\"  href=\"#modal_addSite\"  data-toggle=\"modal\" class=\"btn btn-outline green btn-sm purple\">
                                                       <i class=\"fa fa-edit\"></i> Edit </a></td>
                                            </tr>";
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Modal Payment Type-->
            <div id="modal_addSite" class="modal fade" tabindex="-1" role="dialog"
                 aria-labelledby="modal_addSite" aria-hidden="true" style="display: none;">
                <div class="modal-dialog  modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true"></button>
                            <h4 class="modal-title">Add Site Detail</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" id="addSite_form">

                                <div style="display: none;" class="form-group">
                                    <label class="col-md-3">Site ID :</label>
                                    <div class="col-md-9">
                                        <input readonly type="text" class="form-control" placeholder="Site Title.."
                                               name="site_id" id="site_id" value="-2"/>
                                        <div class="help-block">
                                            enter a brief description of the site.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3">Site Title :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="Site Title.."
                                               name="site_title" id="site_title"/>
                                        <div class="help-block">
                                            enter a brief description of the site.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">URL :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="Site URL.."
                                               name="site_url" id="site_url"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Remaining Credits :</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" placeholder="Enter Credits.."
                                               name="credits" id="credits"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Visits Cost :</label>
                                    <div class="col-md-9">
                                        <input readonly type="number" class="form-control" placeholder="Enter Amount.."
                                               value="0.00"
                                               name="visits_cost" id="visits_cost"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Visits Durations :</label>
                                    <div class="col-md-9">
                                        <select id="visits_durations" class="form-control" name="package_selector">
                                            <option value="-1"> Select Durations</option>

                                            <?php

                                            foreach ($durations as $duration) {
                                                echo "<option value=\"" . $duration["prt_durations_id"] . "\"> " . $duration["durations_sec"] . " seconds" . "</option>";
                                            }


                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="addSite_alert" class="alert alert-success"
                             style="display: none;"><strong>Başarılı
                                !</strong> Uploaded Successfully
                        </div>
                        <div class="modal-footer">
                            <a onclick="deleteSite();" type="button" class="btn btn-icon-only blue">
                                <i class="fa fa-trash"></i> </a>
                            <button id="search_UserClose" class="btn default" data-dismiss="modal"
                                    aria-hidden="true">Close
                            </button>
                            <a onclick="addSite();" type="button" class="btn btn-icon-only red">
                                <i class="fa fa-plus"></i> </a></div>
                    </div>
                </div>
            </div>
            <!--/Modal Add Installment -->
        </div>

    </div>
</div>

<script type="text/javascript">

    function addSite() {
        var site_id = document.getElementById("site_id").value;
        var title = document.getElementById("site_title").value;
        var url = document.getElementById("site_url").value;
        var credits = document.getElementById("credits").value;
        var visits_cost = document.getElementById("visits_cost").value;
        var duration_id = $("#visits_durations").val();

        var dataString = "title=" + title + "&url=" + url + "&credits=" + credits + "&duration_id=" + duration_id + "&visits_cost=" + visits_cost;

        if (site_id == "-2") {
            $.ajax({
                type: "POST",
                url: base_url + "/index.php/Sites/addSite",
                data: dataString,
                cache: false,
                success: function (result) {
                    //alert(dataString);
                    SuccessAlert("We added your url! ", "addSite_alert");
                    controllSites();
                }
            });
        }
        else {
            updateSite();
        }


    }
    function updateSite() {
        var site_id = document.getElementById("site_id").value;
        var title = document.getElementById("site_title").value;
        var url = document.getElementById("site_url").value;
        var credits = document.getElementById("credits").value;
        var visits_cost = document.getElementById("visits_cost").value;
        var duration_id = $("#visits_durations").val();

        var dataString = "siteID=" + site_id + "&title=" + title + "&url=" + url + "&credits=" + credits + "&duration_id=" + duration_id + "&visits_cost=" + visits_cost;

        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Sites/updateSite",
            data: dataString,
            cache: false,
            success: function (result) {
                //alert(dataString);
                SuccessAlert("We updated your url! ", "addSite_alert");
                controllSites();
            }
        });

    }
function deleteSite() {
        var site_id = document.getElementById("site_id").value;

        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Sites/deleteSite/" +site_id,
            cache: false,
            success: function (result) {
                //alert(dataString);
                SuccessAlert("We inactivated your url! ", "addSite_alert");
                controllSites();
            }
        });

    }


    function controllSites() {

        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Sites/controllMySites",
            cache: false,
            success: function (html) {
                $('#mySites_table').html(html)
            }
        });

    }

    function setUpdateSite(id) {

        document.getElementById("site_id").value = document.getElementById("updateSite_siteID_" + id).innerText;
        document.getElementById("site_title").value = document.getElementById("updateSite_title_" + id).innerText;
        document.getElementById("site_url").value = document.getElementById("updateSite_url_" + id).innerText;
        document.getElementById("credits").value = document.getElementById("updateSite_credits_" + id).innerText;
        $("#visits_durations").val(document.getElementById("updateSite_duration_" + id).innerText);

    }

    function clearAddsiteForm() {
        document.getElementById("addSite_form").reset();
    }

    function controllCredits() {
        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Distrubition/getMyCreditsInfo",
            cache: false,
            success: function (result) {
                document.getElementById("i_credit").innerHTML = result;
            }
        });
    }

    function totalAmountDisCredit() {
        var i_credit = document.getElementById("i_credit").innerText;
        var credit = document.getElementById("total_amount_credit").value;
        var sites_selector = document.getElementsByName("sites_selector");
        var countSites = (sites_selector.length);
        var disturbation_value = parseFloat(credit) /parseFloat(countSites);

        var site_id = 0;
        var dataString = "per_cost=" + disturbation_value;
        if (parseFloat(credit) > parseFloat(i_credit)) {
            WarningAlert("Your credits aren't enough! ", "dis_alert");
        }
        else {
            for (var i = 0; i < sites_selector.length; i++) {

                site_id = sites_selector[i].getAttribute("site_id");

                $.ajax({
                    type: "POST",
                    url: base_url + "/index.php/Distrubition/DistrubitionTotalAmountDisCredit/" + site_id,
                    data: dataString,
                    cache: false,
                    success: function (result) {

                        SuccessAlert("We distrubuted your urls! ", "dis_alert");
                        controllSites();
                        controllCredits();
                    }
                });
            }
        }

    }

    function perDisCredit() {
        var i_credit = document.getElementById("i_credit").innerText;
        var credit = document.getElementById("total_per_credit").value;
        var sites_selector = document.getElementsByName("sites_selector");
        var countSites = (sites_selector.length);
        var total_credit_waste = countSites * credit;
        var disturbation_value = credit;
        var site_id = 0;
        var dataString = "per_cost=" + disturbation_value;

        if (total_credit_waste <= i_credit) {
            for (var i = 0; i < sites_selector.length; i++) {

                site_id = sites_selector[i].getAttribute("site_id");

                $.ajax({
                    type: "POST",
                    url: base_url + "/index.php/Distrubition/DistrubitionTotalAmountDisCredit/" + site_id,
                    data: dataString,
                    cache: false,
                    success: function (result) {

                        SuccessAlert("We distrubuted your urls! ", "dis_alert");
                        controllSites();
                        controllCredits();
                    }
                });
            }
        }
        else {
            WarningAlert("Your credits aren't enough! ", "dis_alert");
        }

    }
</script>
