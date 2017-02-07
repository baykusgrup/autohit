
<?php
$ip = $_SERVER["REMOTE_ADDR"];
$tarayiciversiyonu = $_SERVER["HTTP_USER_AGENT"];
$serverversiyonu = $_SERVER["SERVER_SOFTWARE"];
$scriptdili = $_SERVER["GATEWAY_INTERFACE"];
$baglantituru = $_SERVER["HTTP_CONNECTION"];
$serveradi = $_SERVER["SERVER_NAME"];
$kodlamaturu = $_SERVER["HTTP_ACCEPT_ENCODING"];
$serverportu = $_SERVER["SERVER_PORT"];
$oncekisayfa = $_SERVER["HTTP_REFERER"];

?>

<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase"><?php echo lang("BuyCredits"); ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">

            <div class="col-md-12">



                <b>IP Adresiniz :</b> <?php echo "$ip"; ?><br/>
                <b>Server Adı:</b> <?php echo "$serveradi"; ?><br/>
                <b>Script Dili:</b> <?php echo "$scriptdili"; ?><br/>
                <b>Kodlama Türü:</b> <?php echo "$kodlamaturu"; ?><br/>
                <b>Server Portu:</b> <?php echo "$serverportu"; ?><br/>
                <b>Bağlantı Türü:</b> <?php echo "$baglantituru"; ?><br/>
                <b>Önceki Sayfa:</b> <?php echo "$oncekisayfa"; ?><br/>
                <b>Server Versiyonu:</b> <?php echo "$serverversiyonu"; ?><br/>
                <b>Tarayıcı Versiyonu:</b> <?php echo "$tarayiciversiyonu"; ?><br/>

            </div>
        </div>

    </div>
</div>
