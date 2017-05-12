<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase"><?php echo lang("earn_SurfTime"); ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <ul>
                <li> <?php echo lang("earn_State"); ?>: <span id='statusk'></span></li>
                <li> <?php echo lang("earn_TotalEarnedLinkCount"); ?>:<span id='totalbl'></span></li>
                <li><?php echo lang("earn_CurrentSite"); ?> : <span id="currentSite"></span></li>
                <li><?php echo lang("earn_NextSite"); ?> <span
                            id="duration_time"></span> <?php echo lang("earn_second"); ?>.
                </li>
            </ul>
            <hr/>
            <ul>
                <li> <?php echo lang("earn_youwillearn"); ?>.</li>
                <li> <?php echo lang("earn_listofsites"); ?></li>
            </ul>
            <ul id="LastSites_5">

            </ul>
            <table>
                <tr>
                    <td>
                        <input type='hidden' id='currentk' value='0'>
                    </td>
                </tr>
            </table>
            <br/>
            <a role="button" onclick="beginu()" class="btn blue btn-block"> <?php echo lang("earn_viewer"); ?></a>
            <br/>
            <table class="table table-hover table-striped table-bordered">
                <tbody>

                <tr>
                    <td><?php echo lang("earn_AutoDistribution"); ?></td>

                    <td>
                        <label class="mt-checkbox mt-checkbox-outline">

                            <input type="checkbox" value="1" id="dis_selector" name="dis_selector"/>
                            <span></span>
                        </label>
                    </td>
                    <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                        data-original-title="<?php echo lang("earn_tipAutoDistribution"); ?>">
                        <span class="badge badge-primary badge-roundless"> ? </span>

                    </td>
                </tr>
                <tr>
                    <td><?php echo lang("earn_lightViewer"); ?></td>
                    <td><?php
                        if (isset($earnShort)) {
                            echo "<a href=\"" . $earnShort . "\" >" . $earnShort . "</a>";
                        } ?>

                    </td>
                    <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                        data-original-title="<?php echo lang("earn_tiplightViewer"); ?>">
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
            <p class="font-red-intense"><?php echo lang("earn_MultipleViewer"); ?> </p>
            <p>
                <?php echo lang("earn_MultipleViewer_exp"); ?>
            </p>

            <p class="font-red-intense"> <?php echo lang("earn_ActiveViewer"); ?> </p>
            <table class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th>
                        <?php echo lang("earn_IPAdress"); ?>
                    </th>
                    <th>
                        <?php echo lang("earn_Browser"); ?>
                    </th>
                </tr>
                </thead>
                <tbody id="active_viewerTable">

                <!--   <tr>
                       <td>88.241.39.87 <br> TURKEY</td>
                       <td>
                           9 sec
                       </td>
                       <td>
                           http://www.hamilton-radio.com <br>
                           Type: Classic Windows Chrome 55.0.2883.87
                       </td>
                   </tr> -->


                </tbody>
            </table>
            <table style="display: none" class="table table-hover table-striped table-bordered">
                <tbody id="sites_urls">


                </tbody>
            </table>
        </div>
    </div>

</div>

<script type="text/javascript">


    var myWindow;
    var urlLast = new Array();

    function getUrlsFromDatabase() {
        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Earn/getUrlsFromDatabase",
            cache: false,
            success: function (result) {
                document.getElementById("sites_urls").innerHTML = result;
                // geturl();
            }
        });
    }

    function geturl() {

        var theurls = new Array();

        var sites_selector = document.getElementsByName("sites_selector");
        for (var i = 0; i < sites_selector.length; i++) {
            // theurls.push();
            theurls.push({
                urls_g: sites_selector[i].innerText,
                site_id: sites_selector[i].getAttribute("site_id"),
                visit_cost: sites_selector[i].getAttribute("visit_cost"),
                durations: sites_selector[i].getAttribute("durations")
            });
        }


        current1 = parseInt(document.getElementById("currentk").value);

        if (!myWindow) {
            document.getElementById("msg").innerHTML = "Window has never been opened!";
        } else {
            if (myWindow.closed) {
                document.getElementById("statusk").innerHTML = "Stopted...";
                document.getElementById("currentk").value = 0;
                $.ajax({
                    type: "POST",
                    url: base_url + "/index.php/Earn/closedIP",
                    cache: false,
                    success: function (result) {
                        controllActiveViewer();
                    }
                });


            } else {
                currentk2 = parseInt(document.getElementById("currentk").value) + 1;
                document.getElementById("totalbl").innerHTML = currentk2;
                document.getElementById("statusk").innerHTML = "Surfing...";
                document.getElementById("currentk").value = currentk2;
                var siteID = theurls[current1].site_id;
                var value_s = $("#dis_selector").is(':checked');
                var autoID = 0;
                if (value_s == true) {
                    autoID = 1;
                }

                $.ajax({
                    type: "POST",
                    url: base_url + "/index.php/Distrubition/Surf/" + siteID + "/" + autoID,
                    cache: false,
                    success: function (result) {
                        if (result == "1") {

                            controllActiveViewer();
                            timerId = setTimeout(geturl, 1000);

                        } else {
                            url = theurls[current1].urls_g;
                            window.open(url, "myWindow");
                            urlLast.push("<li>" + url + "<a id='blockedStatus_" + theurls[current1].site_id + "' onclick='getBlocked(" + theurls[current1].site_id + ");'>Block</a></li>");
                            document.getElementById("LastSites_5").innerHTML = urlLast.slice(Math.max(urlLast.length - 5, 0)).join(" ");

                            document.getElementById("currentSite").innerHTML = url;


                            var downloadButton = document.getElementById("duration_time");
                            var counter = theurls[current1].durations;
                            var newElement = document.getElementById("duration_time");
                            newElement.innerHTML = counter;
                            var id;

                            downloadButton.parentNode.replaceChild(newElement, downloadButton);

                            id = setInterval(function () {
                                counter--;
                                if (counter < 0) {
                                    newElement.parentNode.replaceChild(downloadButton, newElement);
                                    clearInterval(id);
                                } else {
                                    newElement.innerHTML = counter.toString();
                                }
                            }, 1000);


                            timerId = setTimeout(function (){
                                creditCalculation(theurls[current1].site_id);
                                beginu();
                              }, theurls[current1].durations * 1000);


                            //setTimeout(calculateCost(theurls[current1].site_id), theurls[current1].durations * 1000);


                        }
                    }

                });

                //document.getElementById("duration_time").innerHTML = theurls[current1].durations;

            }
        }

    }

    function calculateCost(id) {
        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Distrubition/SurfingCostCalculation/" + id,
            cache: false,
            success: function (result) {
                alert("kontrol et");
            }
        });
    }

    function beginu2() {

        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Earn/saveIP",
            cache: false,
            success: function (result) {
                /*if (result == 1) {

                 alert("hata2");
                 }
                 else */
                {
                    myWindow = window.open("", "myWindow");
                    getUrlsFromDatabase();
                }
            }
        });


    }

    function beginu() {

        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Earn/saveIP",
            cache: false,
            beforesend: function (result) {
                myWindow = window.open("", "myWindow");
                getUrlsFromDatabase();
            },
            success: function (result) {
                geturl();
            },
            complete: function (result) {

            }
        });
    }


    function deneme2() {
        //idye kredi yükle
        //denemeyi çağır
        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Earn/saveIP",
            cache: false,
            beforesend: function (result) {
                myWindow = window.open("", "myWindow");
                getUrlsFromDatabase();
            },
            success: function (result) {
                geturl();
            },
            complete: function (result) {

            }
        });
    }

    function getFlashMovieObject(movieName) {
        if (window.document[movieName]) {
            return window.document[movieName];
            alert(movieName);
        }
        if (navigator.appName.indexOf("Microsoft Internet") == -1) {
            if (document.embeds && document.embeds[movieName])
                return document.embeds[movieName];
        }
        else {
            return document.getElementById(movieName);
        }
    }

    function SendDataToFlashMovie(fgh, tr) {
        var flashMovie = getFlashMovieObject("predoll");
        flashMovie.changetop(fgh, tr);
        using(fgh, tr);
    }

    function GetXmlHttpObject() {
        var xmlHttp = null;
        try {
            // Firefox, Opera 8.0+, Safari
            xmlHttp = new XMLHttpRequest();
        }
        catch (e) {
            // Internet explorer
            try {
                xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e) {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
        return xmlHttp;
    }

    function stateChanged() {
        if (xmlHttp.readyState == 3) {
            tid = xmlHttp.responseText;
            alert(tid);
        }
    }

    function getBlocked(id) {

        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Blocked/getBlocked/" + id,
            cache: false,
            success: function (result) {
                document.getElementById("blockedStatus_" + id).innerHTML = "Blocked";
            }
        });
    }

    function controllActiveViewer() {

        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Earn/controllActiveViewer/",
            cache: false,
            success: function (result) {
                document.getElementById("active_viewerTable").innerHTML = result;
            }
        });
    }

</script>
