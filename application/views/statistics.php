<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">Statistics</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-striped table-bordered">
                    <tbody>
                    <tr>
                        <td>Members Online</td>
                        <td>
                            <?php if(isset( $getOnlineViewer[0]["countOnline"])){
                                echo  $getOnlineViewer[0]["countOnline"];
                            }  ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Members Online
                            (last 24 hours)</td>
                        <td>
                            sss
                        </td>
                    </tr>
                    <tr>
                        <td> Registered Members</td>
                        <td>
                            <?php if(isset( $getUserCount[0]["usersCount"])){
                                echo  $getUserCount[0]["usersCount"];
                            }  ?>
                        </td>
                    </tr>
                    <tr>
                        <td> New Members</td>
                        <td>sss
                        </td>
                    </tr>
                    <tr>
                        <td> Websites</td>
                        <td><?php if(isset( $websitesCount[0]["countWebsite"])){
                                echo  $websitesCount[0]["countWebsite"];
                            }  ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Visits today</td>
                        <td> <?php if(isset( $todayCount[0]["today"])){
                                echo  $todayCount[0]["today"];
                            }  ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Visits distributed today</td>
                        <td>sss
                        </td>
                    </tr>
                    <tr>
                        <td> Sites you've visited today</td>
                        <td><?php if(isset( $todayVisitedByUser[0]["todayUserVisited"])){
                                echo  $todayVisitedByUser[0]["todayUserVisited"];
                            }  ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Sites you've visited this week</td>
                        <td>sss
                        </td>
                    </tr>
                    <tr>
                        <td> Sites you've visited this month.</td>
                        <td>sss
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
                        <th colspan="4" class="font-red-intense">
                            Your active sites
                        </th>
                    </tr>
                    <tr>
                        <th>Site Name</th>
                        <th>
                            Url
                        </th>
                        <th>
                            Visits today
                        </th>
                        <th>
                            Total Visits
                        </th>
                    </tr>
                    <tr>
                        <td>sss</td>
                        <td>
                            sss
                        </td>
                        <td>
                            sss
                        </td>
                        <td>
                            sss
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
