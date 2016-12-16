<table class="table table-striped table-hover">
                    <thead>
                         <tr>
                              <th>#</th>
                              <th>Картридж</th>
                              <th>Текущее кол-во</th>
                              <th>Необходиоме кол-во</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php for ($i = 0; $i < count($cts); ++$i) { ?>
                              <tr>
                                   <td><?php echo ($i+1); ?></td>
                                   <td><?php echo $cts[$i]->name; ?></td>
                                   <td><?php echo $cts[$i]->current; ?></td>
                                   <td><?php echo $cts[$i]->required; ?></td>

                              </tr>
                         <?php } ?>
                    </tbody>
               </table>