<?php
header("Content-Type: application/javascript");
?>

if ( "<?php echo $size; ?>" == "234x60") {
document.write('<iframe src="<?php echo base_url() ?>bannerexchange/show/<?php echo $userid; ?>" frameborder="0" width="234" height="60" scrolling="no" marginheight=0 marginwidth=0></iframe>');
} else {
document.write('<iframe src="<?php echo base_url() ?>bannerexchange/show/<?php echo $userid; ?>" frameborder="0" width="468" height="60" scrolling="no" marginheight=0 marginwidth=0></iframe>');
}



