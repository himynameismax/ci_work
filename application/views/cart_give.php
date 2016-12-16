<br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Учет картриджей</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/superhero/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Картриджи</a></li>
    <li><a data-toggle="tab" href="#menu1">-</a></li>
    <li><a data-toggle="tab" href="#menu2">+</a></li>
    <li><a data-toggle="tab" href="#menu3">История</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <table class="table table-striped table-hover">
                    <thead>
                         <tr>
                              <th>#</th>
                              <th>Картридж</th>
                              <th>Текущее кол-во</th>
                              <th>Необходимое кол-во</th>
                              
                         </tr>
                    </thead>
                    <tbody>
                         <?php for ($i = 0; $i < count($cts); ++$i) { 
                            
                            
                            if ($cts[$i]->current < $cts[$i]->required) {
                              $col = "color: #ff704d";
                            }
                            elseif ($cts[$i]->current == $cts[$i]->required) {
                              $col = "color: #ffff66";
                            }
                            else{
                              $col = "color: #80ff80";
                            }?>
                              <tr>
                                  <td><?php echo ($i+1); ?></td>
                                  <td><?php echo $cts[$i]->name; ?></td>
                                  <td style="<?php echo $col; ?>"><?php echo $cts[$i]->current; ?></td>
                                  <td><?php echo $cts[$i]->required; ?></td>
                                <?php } ?>
                              </tr>
                    </tbody>
               </table>
    </div>
    <div id="menu1" class="tab-pane fade">
    <form id="box-out" action="<?php echo site_url("carts/cartOut"); ?>" method="post" enctype="multipart/form-data">
                <div class="col-xs-3">
                <?php
                  $attributes = 'class = "form-control"';
                  echo form_dropdown('name', $carts, 'Kyosera TK-450', $attributes); ?><br>
                <?php 
                  $attributes = 'class = "form-control"';
                  echo form_dropdown('prn_name', $printers, 'name="prn_name"', $attributes); ?><br>
                <?php
                  $attributes = 'class = "form-control"';
                  echo form_dropdown('prn_location', $printers_loc, 'name="prn_location"', $attributes); ?>
                </div>
      <input type="submit" name="submit" class="btn btn-primary" value="GO" id="out"/>
    </div>
    <div id="menu2" class="tab-pane fade">
    <form id="box-in" action="<?php echo site_url("carts/cartIn"); ?>" method="post" enctype="multipart/form-data">
      <div class="col-xs-3">
      <?php
        $attributes = 'class = "form-control"';
        echo form_dropdown('name', $carts, 'Kyosera TK-450', $attributes); ?><br>
        <input class="form-control" id="inputdefault" type="text">
      </div>
      <input type="submit" name="submit" class="btn btn-primary" value="GO" id="in"/>
    </div>
    <div id="menu3" class="tab-pane fade">
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

</body>
</html>
<li class="active"><a href="#" data-toggle="modal" data-target="#myModal">Contact</a></li>
<div id="myModal" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
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
            <div class="modal-footer">
                <input class="btn btn-default" id="submit" name="submit" type="button" value="Send Mail" />
                <input class="btn btn-default" type="button" data-dismiss="modal" value="Close" />
            </div>
            <?php echo form_close(); ?>            
        </div>
    </div>
</div>