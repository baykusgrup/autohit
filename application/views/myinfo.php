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

                <ul>
                    <li><b>IP Adresiniz :</b> <?php echo "$ip"; ?></li>
                    <li><b>Server Adı:</b> <?php echo "$serveradi"; ?></li>
                    <li><b>Script Dili:</b> <?php echo "$scriptdili"; ?></li>
                    <li><b>Kodlama Türü:</b> <?php echo "$kodlamaturu"; ?></li>
                    <li><b>Server Portu:</b> <?php echo "$serverportu"; ?></li>
                    <li><b>Bağlantı Türü:</b> <?php echo "$baglantituru"; ?></li>
                    <li><b>Önceki Sayfa:</b> <?php echo "$oncekisayfa"; ?></li>
                    <li><b>Server Versiyonu:</b> <?php echo "$serverversiyonu"; ?></li>
                    <li><b>Tarayıcı Versiyonu:</b> <?php echo "$tarayiciversiyonu"; ?></li>

                </ul>
                <blockquote><b>İp Adresi Nedir?</b>
                    <p>IP adresi ya da numarası, İnternet de dahil olmak üzere, TCP/IP ağındaki uç noktalara tahsis
                        edilen benzersiz bir kimlik numarasıdır. IP adresi, her birisi 0-255 aralığında değişen dört
                        sekizli rakamdan oluşmaktadır.
                    </p>
                    <b>Statik İp</b>
                    <p>
                        Statik IP adresi, servis sağlayıcı tarafından verilen ve hiç değişmeyen bir IP adresidir.
                        İnternet'teki her bilgisayarın bir adresi vardır ve bu adres IP numarası ile belirlenir. Örneğin
                        İnternet sitelerinin önemli bir bölümünün adresi statiktir. Pratik açıdan İnternet
                        kullanıcılarının ip adreslerinin statik olmasına pek gerek yoktur.
                    </p>
                    <b>Dinamik İp</b>
                    <p>
                        Dinamik IP adresi, İnternet Servis Sağlayıcı (ISP) tarafından kullanıcıya her internete
                        bağlandığında geçici olarak tayin edilen bir IP adresidir. Büyük bir ihtimalle, sizin IP
                        adresiniz de dinamiktir. İnternet bağlantınızı kesip tekrar bağlanarak bu siteyi yeniden ziyaret
                        ederseniz, IP numaranızın değiştiğini görebilirsiniz. Çoğu bireysel kullanıcının IP adresi bu
                        şekilde dinamiktir. </p></blockquote>
            </div>
        </div>

    </div>
</div>
