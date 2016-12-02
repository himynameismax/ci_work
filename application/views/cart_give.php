<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<body>
 <form id="box-register" action="<?php echo site_url("carts/giveCart"); ?>" method="post" enctype="multipart/form-data">
  <table class="zui-table zui-table-highlight-all"> 
  <tr>
  <td class="req"> Cartridge </td>
  <td>
  <p>
  <br/>
  <?php echo form_dropdown('name', $carts, 'name="name"'); ?>
  </p>
  </td>
  </tr>
  <tr>
  <td class="req"> Printer </td>
  <td>
  <p>
  <br/>
  <?php echo form_dropdown('prn_name', $printers, 'name="prn_name"'); ?>
  </p>
  </td>
  </tr>
  <tr>
  <td class="req"> Location </td>
  <td>
  <p>
  <br/>
  <?php echo form_dropdown('prn_location', $printers_loc, 'name="prn_location"'); ?>
  </p>
  </td>
  </tr>
  <tr>
 <td></td>
  <td>
  <p class="fr">
  <input type="submit" name="submit" class="btn btn-primary" value="GO" id="register"/>
  </p>
  </td>
  </tr>
   </table>
  <div class="clear"></div>
  </form>
  </body>
  </html>