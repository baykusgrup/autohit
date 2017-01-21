<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">Weekly Top 250</span>
        </div>

    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <p class="muted"> For each site visited, you earn one point. The 250 members who earn the most points
                    each day will receive a prize. </p>
                <p class="text-warning"> The prizes for the daily contest are as follows: </p>

                <table class="table table-hover table-striped table-bordered">
                    <tbody>
                    <tr>
                        <td>1st</td>
                        <td>
                            2000 credits
                        </td>
                    </tr>
                    <tr>
                        <td> 2nd</td>
                        <td>
                            1500 credits
                        </td>
                    </tr>
                    <tr>
                        <td> 3rd</td>
                        <td>
                            1000 credits
                        </td>
                    </tr>
                    <tr>
                        <td> 4th-100th</td>
                        <td>200 credits
                        </td>
                    </tr>
                    <tr>
                        <td> 101 - 250</td>
                        <td>100 credits
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">

                <p class="text-info">Order </p>
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Position</th>
                        <th>
                            Username
                        </th>
                        <th>
                            Points
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                        if($weeklyTop250){
                            $i=0;
                            foreach ($weeklyTop250 as $listWeekly){
                                $i++;
                                echo " <tr>
                                                    <td> ". $i."</td>
                                                    <td>
                                                        ".$listWeekly["username"]."
                                                    </td>
                                                    <td>
                                                       ".$listWeekly["visitCount"]."
                                                    </td>
                                                </tr>";
                            }
                        }


                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
