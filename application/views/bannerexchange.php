<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase"><?php echo lang("Banner_Exchange"); ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">

            <div class="col-md-12">
                <div id="dis_alert" class="alert alert-success"
                     style="display: none;"><strong>Başarılı
                        !</strong> Uploaded Successfully
                </div>


                <div class="portlet-fit ">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th colspan="4" class="font-red-intense">
                                    <?php echo lang("MyBanner"); ?> - <?php echo lang("BannerCredit"); ?>: <a
                                            id="i_credit"><?php if (isset($userWallet[0]["banner_credits"])) {
                                            echo $userWallet[0]["banner_credits"];
                                        } ?></a></th>

                                <th colspan="2">

                                    <a type="button" onclick="clearAddbannerForm();"
                                       href="#modal_addSite" class="btn blue btn-block"
                                       data-toggle="modal" role="button"> <i class="fa fa-plus-square-o"></i>
                                        <?php echo lang("AddBanner"); ?> </a>
                                </th>

                            </tr>
                            <tr>
                                <th>#</th>
                                <th><?php echo lang("banner_title"); ?></th>
                                <th><?php echo lang("sites_tableUrl"); ?></th>
                                <th><?php echo lang("sites_tableRTotal"); ?></th>
                                <th><?php echo lang("sites_tableRToday"); ?> </th>
                                <th><?php echo lang("sites_tableEdit"); ?> </th>
                            </tr>
                            <tbody id="mySites_table">

                            <?php
                            foreach ($sites as $site) {
                                echo "<tr>
                                                <td id='updateSite_siteID_" . $site["websites_id"] . "' >" . $site["websites_id"] . "</td>
                                                <td id='updateSite_title_" . $site["websites_id"] . "'>" . substr($site["url_title"], 0, 15) . "</td>
                                                <td id='updateSite_url_" . $site["websites_id"] . "'>" . substr(preg_replace('#^https?://#', '', rtrim($site["url"], '/')), 0, 20) . "</td>
                                                <td style='display:none' id='updateBanner_img_url_" . $site["websites_id"] . "'>" . $site["url_img"] . "</td>
                                                
                                                <td style='display: none' id='updateSite_status_" . $site["websites_id"] . "'>" . $site["record_status"] . "</td>
                                                
                                                <td>" . $site["TotalVisit"] . "</td>
                                                <td>" . $site["TodayVisit"] . "</td>
                                                <td><a name='sites_selector' site_id='" . $site["websites_id"] . "' onclick=\"setUpdateSite(" . $site["websites_id"] . ");\"  href=\"#modal_addSite\"  data-toggle=\"modal\" class=\"btn btn-outline green btn-sm purple\"><i class=\"fa fa-edit\"></i> " . lang("sites_edit") . " </a></td>
                                            </tr>";
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr/>

            </div>
            <div class="col-md-12">

                <p>
                    <b><?php echo lang("Banner_text"); ?></b>
                </p>
                <hr/>
                <p style="text-align: center">
                    468x60
                </p>
                <p style="text-align: center">
                    <script language="javascript"
                            src="<?php echo base_url() ?>BannerExchange/Call/468x60/<?php echo $userid ?>"></script>
                </p>

                <textarea style="margin-bottom: 10px" class="col-md-12" rows="3"> <!--NearlyWeb Banner--><script
                            language="javascript"
                            src="<?php echo base_url() ?>BannerExchange/Call/468x60/<?php echo $userid ?>"></script>
                    <!--NearlyWeb Banner--> </textarea>

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
                                    <label class="col-md-3">Banner URL (468x60) :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="Banner URL.."
                                               name="banner_img_url" id="banner_img_url"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3">Banner Status :</label>
                                    <div class="col-md-9">
                                        <select id="siteStatus_selector"
                                                class="form-control" name="siteStatus_selector">
                                            <option value="-1"> Select Status</option>
                                            <option value="0"> Passive</option>
                                            <option value="1"> Active</option>


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
        var banner_img_url = document.getElementById("banner_img_url").value;
        var status = $("#siteStatus_selector").val();

        var dataString = "title=" + title + "&url=" + url + "&banner_img_url=" + banner_img_url + "&status=" + status;

        if (site_id == "-2") {
            $.ajax({
                type: "POST",
                url: base_url + "/index.php/BannerExchange/addSite",
                data: dataString,
                cache: false,
                success: function (result) {
                    SuccessAlert("We added your url! ", "addSite_alert");
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
        var banner_img_url = document.getElementById("banner_img_url").value;
        var status = $("#siteStatus_selector").val();

        var dataString = "title=" + title + "&url=" + url + "&banner_img_url=" + banner_img_url + "&status=" + status + "&site_id=" + site_id;
        $.ajax({
            type: "POST",
            url: base_url + "/index.php/BannerExchange/updateSite" ,
            data: dataString,
            cache: false,
            success: function (result) {
                alert(dataString);
                SuccessAlert("We updated your url! ", "addSite_alert");
                controllSites();
            }
        });


    }
    function deleteSite() {
        var site_id = document.getElementById("site_id").value;

        $.ajax({
            type: "POST",
            url: base_url + "/index.php/BannerExchange/deleteSite/" + site_id,
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
            url: base_url + "/index.php/BannerExchange/controllMySites",
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
        document.getElementById("banner_img_url").value = document.getElementById("updateBanner_img_url_" + id).innerText;
        $('#siteStatus_selector').val(document.getElementById("updateSite_status_" + id).innerText);

    }

    function clearAddbannerForm() {
        document.getElementById("addSite_form").reset();
    }




</script>
