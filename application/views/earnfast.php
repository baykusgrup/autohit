<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">Light Viewer | member 881606</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <ul class="col-md-12">
                <p>State: <span id='statusk'></span></p>
                <p>Total Earned Link Count:<span id='totalbl'></span></p>
                <p>Current Site : <span id="currentSite"></span></p>
                <p>Next site in <span id="duration_time"></span> seconds.</p>
                <hr/>
                <p>You will earn 0.8 credits by visiting this site.</p>

                <br/>
                <a role="button" onclick="beginu()" class="btn blue btn-block">Start Viewer</a>
                <br/>
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
                geturl();
            }
        });
    }

    function geturl() {

        var theurls = new Array();

        var sites_selector = document.getElementsByName("sites_selector");
        for (var i = 0; i < sites_selector.length; i++) {
            theurls.push();
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

                $.ajax({
                    type: "POST",
                    url: base_url + "/index.php/Distrubition/Surf/"+siteID,
                    cache: false,
                    success: function (result) {
                        if(result=="1")
                        {

                            controllActiveViewer();
                            timerId = setTimeout(geturl, 1000);

                        }else{
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




                            timerId = setTimeout(geturl, theurls[current1].durations * 1000);
                        }
                    }
                });

                //document.getElementById("duration_time").innerHTML = theurls[current1].durations;

            }
        }

    }

    function beginu() {

        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Earn/saveIP",
            cache: false,
            success: function (result) {
                if (result == 1) {

                    alert("hata");
                }
                else {
                    myWindow = window.open("", "myWindow");
                    getUrlsFromDatabase();
                }
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
