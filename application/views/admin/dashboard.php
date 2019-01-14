<style type="text/css">
.title{
    font-size: 32px;
}
.note{
    margin-top: 10px;
}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
            <div class="col-md-12">
                <?php if (date('H')<4) { ?>
                    <div class="title">Selamat Malam, <?php echo $this->session->userdata('nama'); ?>!</div>
                <?php }elseif (date('H')<10) { ?>
                    <div class="title">Selamat Pagi, <?php echo $this->session->userdata('nama'); ?>!</div>
                <?php }elseif (date('H')<14) { ?>
                    <div class="title">Selamat Siang, <?php echo $this->session->userdata('nama'); ?>!</div>
                <?php }elseif (date('H')<18) { ?>
                    <div class="title">Selamat Sore, <?php echo $this->session->userdata('nama'); ?>!</div>
                <?php }elseif (date('H')<24) { ?>
                    <div class="title">Selamat Malam, <?php echo $this->session->userdata('nama'); ?>!</div>
                <?php } ?>
                <div class="note"><span class="focus"><?php echo $this->session->userdata('nama'); ?></span></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    setTimeout(function() {
        $('.title').fadeOut("slow", function(){
            var div = $("<div class='title'>Selamat datang di halaman Dashboard.</div>").hide();
            $(this).replaceWith(div);
            $('.title').fadeIn("slow");
        });
    }, 2000);
</script>