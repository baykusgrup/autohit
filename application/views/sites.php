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

                <table class="table table-hover table-striped table-bordered">
                    <tbody>
                    <tr>
                        <th colspan="3" class="font-red-intense">
                            Easy Distribution
                        </th>
                    </tr>
                    <tr>
                        <td colspan="3" class="font-red"> Available Credits: 2222</td>
                    </tr>
                    <tr>
                        <td> Total Amount Credit</td>
                        <td class="col-md-5">
                            <div class="input-group input-medium">
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
                                                            <button class="btn btn-outline blue "
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
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
                                                            <button class="btn btn-outline blue "
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
                            <tbody>
                            <tr>
                                <th colspan="2" class="font-red-intense">
                                    Active website

                                </th>
                                <th colspan="3">

                                    <a type="button"
                                       href="#modal_addSite" class="btn blue btn-block"
                                       data-toggle="modal" role="button"> <i class="fa fa-plus-square-o"></i>
                                        Add Site </a>
                                </th>

                            </tr>
                            <tr>
                                <th>Site name</th>
                                <th>Url</th>
                                <th>Crdt</th>
                                <th>Received<br> today</th>
                                <th>Edit</th>
                            </tr>
                            <divid
                            ="mySites_table">

                            <?php


                            foreach ($sites as $site) {
                                echo "<tr>
                            <td>" . substr($site["page_title"], 0, 15) . "</td>
                            <td>" . substr($site["url"], 0, 25) . "</td>
                            <td>" . $site["credits"] . "</td>
                            <td>sss</td>
                            <td><a href=\"javascript:;\" class=\"btn btn-outline green btn-sm purple\">
                                                                <i class=\"fa fa-edit\"></i> Edit </a></td>
                        </tr>";
                            }

                            ?>
                    </div>

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
                        <form class="form-horizontal" role="form">

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

        var title = document.getElementById("site_title").value;
        var url = document.getElementById("site_url").value;
        var credits = document.getElementById("credits").value;
        var visits_cost = document.getElementById("visits_cost").value;
        var duration_id = $("#visits_durations").val();

        var dataString = "title=" + title + "&url=" + url + "&credits=" + credits + "&duration_id=" + duration_id + "&visits_cost=" + visits_cost;

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
    function controllSites() {

        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Sites/controllMySites",
            cache: false,
            success: function (result) {
                //alert(dataString);
                document.getElementById("mySites_table").innerHTML = result;
            }
        });

    }


</script>
