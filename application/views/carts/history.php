<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/spoiler.js"></script>
<div class="container">
          <div class="row">
          <div class="col-lg-12 col-sm-11">
               <table class="table table-striped table-hover">
                    <thead>
                         <tr>
                              <th>#</th>
                              <th>Картридж</th>
                              <th>Принтер</th>
                              <th>Расположение принтера</th>
                              <th>Дата</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php for ($i = 0; $i < count($op_list); ++$i) { ?>
                              <tr>
                                   <td><?php echo ($i+1); ?></td>
                                   <td><?php echo $op_list[$i]->cart_name; ?></td>
                                   <td><?php echo $op_list[$i]->prn_name; ?></td>
                                   <td><?php echo $op_list[$i]->prn_location; ?></td>
                                   <td><?php echo $op_list[$i]->op_date; ?></td>

                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
          </div>
          </div>
          </div>