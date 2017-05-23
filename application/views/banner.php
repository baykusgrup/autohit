<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<div aling="right" style="position: absolute; width: 32px; height: 13px; z-index: 1; left: 327px; top: 45px; float:right" id="katman1">
    <table border="0" width="141" id="table1" cellspacing="0" cellpadding="0" height="15">
        <tr>
            <td align="right" valign="bottom">
                <script type="text/javascript">
                    <!----
                    var rollOverArr=new Array();
                    function setrollover(OverImgSrc,pageImageName)
                    {
                        if (! document.images)return;
                        if (pageImageName == null)
                            pageImageName = document.images[document.images.length-1].name;
                        rollOverArr[pageImageName]=new Object;
                        rollOverArr[pageImageName].overImg = new Image;
                        rollOverArr[pageImageName].overImg.src=OverImgSrc;
                    }

                    function rollover(pageImageName)
                    {
                        if (! document.images)return;
                        if (! rollOverArr[pageImageName])return;
                        if (! rollOverArr[pageImageName].outImg)
                        {
                            rollOverArr[pageImageName].outImg = new Image;
                            rollOverArr[pageImageName].outImg.src = document.images[pageImageName].src;
                        }
                        document.images[pageImageName].src=rollOverArr[pageImageName].overImg.src;
                    }

                    function rollout(pageImageName)
                    {
                        if (! document.images)return;
                        if (! rollOverArr[pageImageName])return;
                        document.images[pageImageName].src=rollOverArr[pageImageName].outImg.src;
                    }
                    //-->
                </script>
                <a href="<?php echo base_url() ?>BannerExchange" target="_blank" onMouseOver="rollover('home')" onMouseOut="rollout('home')"><img src="<?php echo base_url() ?>assets/adexchange/i1.png" name="home" alt="bannerdegisim" border="0"></a>
                <script type="text/javascript">
                    <!--
                    setrollover("<?php echo base_url() ?>assets/adexchange/i2.png");
                    //-->
                </script>
            </td>
        </tr>
    </table>
</div>
</div>
</body>

<script>
    function image() {
    };
    image = new image();
    media = 0;

    image[media++] = '<a target="_blank" href="<?php if (isset($visitsite[0]["url"])) {echo $visitsite[0]["url"];} ?>"><img border="0" src="<?php if (isset($visitsite[0]["url_img"])) {echo $visitsite[0]["url_img"];} ?>" alt="<?php if (isset($visitsite[0]["url_title"])) {echo $visitsite[0]["url_title"];} ?>" title="<?php if (isset($visitsite[0]["url_title"])) {echo $visitsite[0]["url_title"];} ?>" style="width: 468px; height: 60px;" /></a>'

    media = Math.floor(Math.random() * media);
    document.write(image[media]);
</script>
