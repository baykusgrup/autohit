<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase"><?php echo lang("blocked_ListOfBlockedWebsites"); ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <div id="active_alert" class="alert alert-success" style="display: none;"><strong><?php echo lang("WellDone"); ?>
                        !</strong> <?php echo lang("UploadedSuccessfully"); ?>
                </div>
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>
                            <?php echo lang("blocked_URL"); ?>
                        </th>
                        <th>
                            <?php echo lang("blocked_Active"); ?>
                        </th>
                    </tr>
                    </thead>
                    <tbody id="table_blockedSites">


                    <?php

                        foreach ($blocked as $site){

                            echo "<tr>
                                    <td> ".$site["blocked_webSite_id"]."</td>
                                    <td>".$site["url"]."
                                    </td>
                                    <td width=\"82px\"><a  onclick=\"getActiveSite(".$site["blocked_webSite_id"].")\" class=\"btn btn-outline green btn-sm purple\">
                                            <i class=\"fa fa-edit\"></i> " . lang("Active"). " </a></td>
                                </tr>";

                        }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">

    function getActiveSite(id) {

        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Blocked/getActiveSite/"+id,
            cache: false,
            success: function (result) {
                SuccessAlert("We activated link again", "active_alert");
                controllBlockedSites();
            }
        });

    }

    function controllBlockedSites() {

        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Blocked/controllBlockedSites/",
            cache: false,
            success: function (result) {
                document.getElementById("table_blockedSites").innerHTML=result;
            }
        });

    }

</script>
