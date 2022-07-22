<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * View users
 */

?>

<div class="col-md-9">
    <h1>
        <i class="fa-solid fa-home-user"></i> Vue utilisateurs
    </h1>
        <table class="table table-striped table-hover table-bordered" id="data">
          <thead class="rosef thead-dark">
            <tr>
              <th class="rosef" scope="col">ID</th>
              <th class="rosef" scope="col">Titre</th>
              <th class="rosef" scope="col">Nom</th>
              <th class="rosef" scope="col">Prénom</th>
              <th class="rosef" scope="col">Email</th>
              <th class="rosef" scope="col">Est actif</th>
              <th class="rosef" scope="col">Est admin</th>
              <th class="rosef" scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            foreach ($users as $user) { 
            ?>
              <tr>
                <?php 
                echo '<td>'.$user['id'].'</td>
                  <td>'.$user['title'].'</td>
                  <td>'.$user['name'].'</td>
                  <td>'.$user['forename'].'</td>
                  <td>'.$user['email'].'</td>
                  <td>'.$user['is_actif'].'</td>
                    <td>'.$user['is_admin'].'</td>
                  <td>
                    <a class="btn btn-xs btn-warning" href="index.php?action=admin&todo=edit_user&id='.$user['id'].'">
                      <i class="fa fa-edit"></i></a> 
                    </td>';?>
              </tr> 
             <?php } ?>

          </tbody>
        </table>

