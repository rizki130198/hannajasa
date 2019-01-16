<style type="text/css">
.note{
    /*margin-top: 10px;*/
    font-size: 18px;
}
.title h2{
    margin-bottom: 0 !important;
}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
            <div class="col-md-12">
                <?php if (date('H')<4) { ?>
                    <div class="title"><h2>Selamat Malam, <?php echo $this->session->userdata('nama'); ?>!</h2></div>
                <?php }elseif (date('H')<10) { ?>
                    <div class="title"><h2>Selamat Pagi, <?php echo $this->session->userdata('nama'); ?>!</h2></div>
                <?php }elseif (date('H')<14) { ?>
                    <div class="title"><h2>Selamat Siang, <?php echo $this->session->userdata('nama'); ?>!</h2></div>
                <?php }elseif (date('H')<18) { ?>
                    <div class="title"><h2>Selamat Sore, <?php echo $this->session->userdata('nama'); ?>!</h2></div>
                <?php }elseif (date('H')<24) { ?>
                    <div class="title"><h2>Selamat Malam, <?php echo $this->session->userdata('nama'); ?>!</h2></div>
                <?php } ?>
                <div class="note"><span class="focus label label-primary"><?php echo $this->session->userdata('nama'); ?></span></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    setTimeout(function() {
        $('.title').fadeOut("slow", function(){
            var div = $("<div class='title'><h2>Selamat datang di halaman Dashboard.</h2></div>").hide();
            $(this).replaceWith(div);
            $('.title').fadeIn("slow");
        });
    }, 2000);
</script>