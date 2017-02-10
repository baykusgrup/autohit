
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase"><?php echo lang("myinfo_MyInfo"); ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">

            <div class="col-md-12">

                <blockquote><?php echo lang("myinfo_MyInfoDec"); ?></blockquote>
                <ul>
                    <li><b>IP Adresiniz :</b> <?php if ($myinfoip) { echo $myinfoip["ip"]; }?></li>
                    <li><b>Server Adı:</b> <?php if ($myinfoip) { echo $myinfoip["serveradi"]; }?></li>
                    <li><b>Script Dili:</b> <?php if ($myinfoip) { echo $myinfoip["scriptdili"]; }?></li>
                    <li><b>Kodlama Türü:</b> <?php if ($myinfoip) { echo $myinfoip["kodlamaturu"]; }?></li>
                    <li><b>Server Portu:</b> <?php if ($myinfoip) { echo $myinfoip["serverportu"]; }?></li>
                    <li><b>Bağlantı Türü:</b> <?php if ($myinfoip) { echo $myinfoip["baglantituru"]; }?></li>
                    <li><b>Önceki Sayfa:</b> <?php if ($myinfoip["oncekisayfa"]) { echo $myinfoip["oncekisayfa"]; }?></li>
                    <li><b>Server Versiyonu:</b> <?php if ($myinfoip) { echo $myinfoip["serverversiyonu"]; }?></li>
                    <li><b>Tarayıcı Versiyonu:</b> <?php if ($myinfoip) { echo $myinfoip["tarayiciversiyonu"]; }?></li>

                </ul>
            </div>
        </div>

    </div>
</div>
