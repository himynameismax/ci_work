<!DOCTYPE html>
<html lang="en">
<head>
  <title>Заканчивающиеся картриджи</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/superhero/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div class="container">
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
                         <?php
                         for ($i = 0; $i < count($def); ++$i) { 
                            
                            
                            if ($def[$i]->current < $def[$i]->required) {
                              $col = "color: #ff704d";
                            }
                            elseif ($def[$i]->current == $def[$i]->required) {
                              $col = "color: #ffff66";
                            }
                            else{
                              $col = "color: #80ff80";
                            }?>
                              <tr>
                                  <td><?php echo ($i+1); ?></td>
                                  <td><?php echo $def[$i]->name; ?></td>
                                  <td style="<?php echo $col; ?>"><?php echo $def[$i]->current; ?></td>
                                  <td><?php echo $def[$i]->required; ?></td>
                                <?php } ?>
                              </tr>
                    </tbody>
               </table>
               <a href="http://service/carts">Подробнее</a>
    </div>