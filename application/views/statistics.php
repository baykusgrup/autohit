<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase"><?php echo lang("statistics_Statistics"); ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-striped table-bordered">
                    <tbody>
                    <tr>
                        <td><?php echo lang("statistics_MembersOnline"); ?></td>
                        <td>
                            <?php if (isset($getOnlineViewer[0]["countOnline"])) {
                                echo $getOnlineViewer[0]["countOnline"];
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td> <?php echo lang("statistics_statistics_MembersOnlineLast"); ?></td>
                        <td>
                            <?php if (isset($getOnlineViewerLast24Hour[0]["countOnline24Hour"])) {
                                echo $getOnlineViewerLast24Hour[0]["countOnline24Hour"];
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td> <?php echo lang("statistics_RegisteredMembers"); ?></td>
                        <td>
                            <?php if (isset($getUserCount[0]["usersCount"])) {
                                echo $getUserCount[0]["usersCount"];
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td> <?php echo lang("statistics_NewMembers"); ?></td>
                        <td><?php if (isset($getUserCountLast24Hour[0]["usersCount24Hour"])) {
                                echo $getUserCountLast24Hour[0]["usersCount24Hour"];
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td> <?php echo lang("statistics_Websites"); ?></td>
                        <td><?php if (isset($websitesCount[0]["countWebsite"])) {
                                echo $websitesCount[0]["countWebsite"];
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td> <?php echo lang("statistics_Visitstoday"); ?></td>
                        <td> <?php if (isset($todayCount[0]["today"])) {
                                echo $todayCount[0]["today"];
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td> <?php echo lang("statistics_VisitsDistributedToday"); ?></td>
                        <td>sss
                        </td>
                    </tr>
                    <tr>
                        <td> <?php echo lang("statistics_YouveVisitedToday"); ?></td>
                        <td><?php if (isset($todayVisitedByUser[0]["todayUserVisited"])) {
                                echo $todayVisitedByUser[0]["todayUserVisited"];
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td> <?php echo lang("statistics_YouveVisitedWeek"); ?></td>
                        <td><?php if (isset($weeklyVisitedByUser[0]["weeklyUserVisited"])) {
                                echo $weeklyVisitedByUser[0]["weeklyUserVisited"];
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td> <?php echo lang("statistics_YouveVisitedMonth"); ?></td>
                        <td><?php if (isset($monthlyVisitedByUser[0]["montlyUserVisited"])) {
                                echo $monthlyVisitedByUser[0]["montlyUserVisited"];
                            } ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
