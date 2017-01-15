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
                        <th colspan="2" class="font-red-intense">
                            Easy Distribution
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2"> Easy Distribution - <a class="font-red-mint"> Available Credits: 2222</a></td>
                    </tr>
                    <tr>
                        <td> Total Amount Credit</td>
                        <td>
                            sss
                        </td>
                    </tr>
                    <tr>
                        <td> Per Site Amount Credit</td>
                        <td>sss
                        </td>
                    </tr>
                    </tbody>
                </table>
                <hr/>

                <table class="table table-hover table-striped table-bordered">
                    <tbody>
                    <tr>
                        <th colspan="4" class="font-red-intense">
                            Active website
                            <a type="button"
                               href="#modal_addSite" class="btn btn-primary"
                               data-toggle="modal" role="button"> <i class="fa fa-plus-square-o"></i>
                                Add Site </a>
                        </th>

                    </tr>
                    <tr>
                        <th>Site name</th>
                        <th>Url</th>
                        <th>Credits</th>
                        <th>Received today</th>
                    </tr>
                    <tr>
                        <td>(Aucun)</td>
                        <td>http://baykusgrup.com/?rastgele</td>
                        <td>11.299</td>
                        <td>Total Amount Credit</td>


                    </tr>
                    </tbody>
                </table>

                <hr/>

                <p class="font-red-intense">Site Management</p>

            </div>
            <!--Modal Payment Type-->
            <div id="modal_addSite" class="modal fade" tabindex="-1" role="dialog"
                 aria-labelledby="modal_addSite" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true"></button>
                            <h4 class="modal-title">Payment Detail</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Site Title :</label>
                                <input type="text" class="form-control" placeholder="Site Title.."
                                       name="site_title" id="site_title"/>
                            </div>
                            <div class="form-group">
                                <label>URL :</label>
                                <input type="text" class="form-control" placeholder="Site URL.."
                                       name="site_url" id="site_url"/>
                            </div>
                            <div class="form-group">
                                <label>Remaining Credits :</label>
                                <input type="number" class="form-control" placeholder="Enter Credits.."
                                       name="credits" id="credits"/>
                            </div>
                            <div class="form-group">
                                <label>Visits Cost :</label>
                                <input readonly type="number" class="form-control" placeholder="Enter Amount.."
                                       value="0.00"
                                       name="visits_cost" id="visits_cost"/>
                            </div>
                            <div class="form-group">
                                <label>Visits Durations :</label>
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
                alert(dataString);
                SuccessAlert("We added your url! ", "addSite_alert");
            }
        });

    }


</script>