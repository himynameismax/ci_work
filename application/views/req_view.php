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
              #info #status {
              	background-color: #ff0000;
              	position: absolute;
    			top: 20px;
    			right: 20px;
    			/*width:100px;*/
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
	<form id="box-out" action="<?php echo site_url("requests/show/$id"); ?>" method="post" enctype="multipart/form-data">
	<?php echo form_dropdown('stat', $st, 'name="new_stat"'); ?>
	<!-- <?php echo "$new_status"; ?> -->
	
	<input type="submit" name="submit" class="btn btn-primary" value="accept" id="accept"/>
	</form>
    <div id="info" class="col-lg-4 col-lg-offset-4" style="background-color: #EEEEEE"">
    <div id="status"><?php print $status ?></div>
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