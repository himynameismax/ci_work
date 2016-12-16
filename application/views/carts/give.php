<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/spoiler.js"></script>
<form id="box-register" action="<?php echo site_url("carts/giveCart"); ?>" method="post" enctype="multipart/form-data">    
  <div style="padding:20px;">
    <div class="btn-group">
        <button class="btn btn-group">
                <?php echo form_dropdown('name', $carts, 'name="name"'); ?> 
        </button>
        <button class="btn btn-group">
                <?php echo form_dropdown('prn_name', $printers, 'name="prn_name"'); ?>
        </button>
        <button class="btn btn-group">
                <?php echo form_dropdown('prn_location', $printers_loc, 'name="prn_location"'); ?>
        </button>
    </div>
      <input type="submit" name="submit" class="btn btn-primary" value="GO" id="register"/>
</div>