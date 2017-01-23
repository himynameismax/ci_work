  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lightbox/css/lightbox.css">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/superhero/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <table class="table table-striped table-hover">
   
              <thead>
                         <tr>
                              <th>#</th>
                              <th>FIO</th>
                              <th>Phone</th>
                              <th>Time</th>
                              <th>Status</th>
                              
                         </tr>
                    </thead>
                    <tbody>
                         <?php for ($i = 0; $i < count($reqs); ++$i) { ?>
                              <tr>
                                  <td><?php echo ($i+1); ?></td>
                                  <td><a href="show/<?php echo $reqs[$i]->id; ?>"><?php echo $reqs[$i]->fio; ?></a></td>
                                  <td><?php echo $reqs[$i]->phone; ?></td>
                                  <td><?php echo $reqs[$i]->time; ?></td>
                                  <td><?php echo $reqs[$i]->status; ?></td>
                                <?php } ?>
                              </tr>
                    </tbody>
               </table>
<!-- <?php for ($i = 0; $i < count($reqs); ++$i) { ?>
  <a href="<?php echo $reqs[$i]->id; ?>"><?php echo $reqs[$i]->id; ?></a>
<?php } ?> -->
<!-- <?php print $title; ?> -->



               <script type="text/javascript" src="<?php echo base_url(); ?>assets/lightbox/js/lightbox.js"></script>