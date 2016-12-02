
<html>
     <head>
          <title>Телефонный справочник</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <!--link the bootstrap css file-->
          <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
     </head>
     <body>
          <div class="container">
          <div class="row">
          <div class="col-lg-12 col-sm-12">
          <select class="form-group">
            <?php 

            foreach($orgs as $row)
            { 
              echo '<option value="'.$row->org_name.'">'.$row->org_name.'</option>';
            }
            ?>
            </select>
            <button class="btn btn-default"> Применить</button>
               <table class="table table-striped table-hover">
                    <thead>
                         <tr>
                              <th>#</th>
                              <th>Должность</th>
                              <th>Имя</th>
                              <th>Внешний номер</th>
                              <th>Внутренний номер</th>
                              <th>Номер кабинета</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php for ($i = 0; $i < count($phones_all); ++$i) { ?>
                              <tr>
                                   <td><?php echo ($i+1); ?></td>
                                   <td><?php echo $phones_all[$i]->post; ?></td>
                                   <td><?php echo $phones_all[$i]->name; ?></td>
                                   <td><?php echo $phones_all[$i]->external; ?></td>
                                   <td><?php echo $phones_all[$i]->internal; ?></td>
                                   <td><?php echo $phones_all[$i]->location; ?></td>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
          </div>
          </div>
          </div>
     </body>
</html>