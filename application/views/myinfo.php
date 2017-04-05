
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
                    <li><b><?php echo lang("myinfo_YourIPAddress"); ?></b> <?php if ($myinfoip) { echo $myinfoip["ip"]; }?></li>
                    <li><b><?php echo lang("myinfo_ServerName"); ?></b> <?php if ($myinfoip) { echo $myinfoip["serveradi"]; }?></li>
                    <li><b><?php echo lang("myinfo_ScriptLanguage"); ?></b> <?php if ($myinfoip) { echo $myinfoip["scriptdili"]; }?></li>
                    <li><b><?php echo lang("myinfo_CodingType"); ?></b> <?php if ($myinfoip) { echo $myinfoip["kodlamaturu"]; }?></li>
                    <li><b><?php echo lang("myinfo_ServerPort"); ?></b> <?php if ($myinfoip) { echo $myinfoip["serverportu"]; }?></li>
                    <li><b><?php echo lang("myinfo_ConnectionType"); ?></b> <?php if ($myinfoip) { echo $myinfoip["baglantituru"]; }?></li>
                    <li><b><?php echo lang("myinfo_PreviousPage"); ?></b> <?php if ($myinfoip["oncekisayfa"]) { echo $myinfoip["oncekisayfa"]; }?></li>
                    <li><b><?php echo lang("myinfo_ServerVersion"); ?></b> <?php if ($myinfoip) { echo $myinfoip["serverversiyonu"]; }?></li>
                    <li><b><?php echo lang("myinfo_BrowserVersion"); ?></b> <?php if ($myinfoip) { echo $myinfoip["tarayiciversiyonu"]; }?></li>

                </ul>
            </div>
        </div>

    </div>
</div>
