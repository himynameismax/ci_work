<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lightbox/css/lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/superhero/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <style type="text/css">
		.top-buffer { margin-top:20px; }
              #files {
              	position: relative;
              	margin-top: 20px;
                outline: 1px solid;
              }
              #info {
              	position: relative;
                outline: 1px solid;
              }
              #info img {
              	position: absolute;
    			top: 0px;
    			right: 0px;
    			width:100px; /* you can use % */
    			height: auto;
              }
              #files img {
              	position: absolute;
    			left: 0px;
    			bottom: 0px;
    			width:20px; /* you can use % */
    			height: auto;
              }
	</style>

    <div id="info" class="col-lg-4 col-lg-offset-4" style="background-color: #EEEEEE"">
    <img src="<?php echo base_url(); ?>assets/img/done.png">
    	<div class="col-xs-3 top-buffer" style="margin-left: 20px">
    		<p><b>Заявка №</b></p><br>
    		<p><b>Автор</b></p><br>
    		<p><b>Телефон</b></p><br>
    		<p><b>Комментарий</b></p><br>
    	</div>
    	<div class="col-xs-3 top-buffer" style="margin-left: 20px">
    		<p><b><?php print $no;?></b></p><br>
    		<p><b><?php print $fio;?></b></p><br>
    		<p><b><?php print $phone;?></b></p><br>
    	</div>
    </div><br>
    
    <div id="files" class="col-lg-4 col-lg-offset-4" style="background-color: #EEEEEE"">
    <div class="col-xs-3 top-buffer" style="margin-left: 20px">
    <p><b>файлы</b></p><br>
    </div>
    	<?php for ($i = 0; $i < count($file); ++$i) { ?>
    		<b><a href="/uploads/<?php echo $file[$i]->file_name; ?>" data-lightbox="roadtrip"><?php echo $file[$i]->file_name; ?></a>
    	<?php } ?>
    	<img src="<?php echo base_url(); ?>assets/img/add.ico">
    
    </div>


    <script type="text/javascript" src="<?php echo base_url(); ?>assets/lightbox/js/lightbox.js"></script>