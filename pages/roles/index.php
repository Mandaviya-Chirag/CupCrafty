<?php
require '../../includes/init.php';
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>

<?php

$query = "SELECT * FROM roles";
$rows = select($query);

?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row justiyfy-content-between">
              <div class="row justiyfy-content-between">
                <h4 class="card-title col-10">Roles</h4>
                <a class="btn btn-primary col-1 mb-5" href="./add.php">
                  <i class="mdi mdi-plus"></i>
                </a>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Sr.no.</th>
                      <th>Name</th>
                      <th>Modify</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  </tbody>
                  <?php foreach ($rows as $user): ?>
                    <tr>
                      <td><?= $user['Id'] ?></td>
                      <td><?= $user['Name'] ?></td>
                      <td>
                        <a href="./update.php?id=<?= $user['Id'] ?>">
                          <div class="btn btn-primary me-2">
                            <i class="mdi mdi-table-edit"></i>
                          </div>
                        </a>
                      </td>
                      <td>
                        <a href="../../api/roles/delete.php?id=<?= $user['Id'] ?>">
                          <div class="btn btn-primary me-2">
                            <i class="mdi mdi-delete-variant"></i>
                          </div>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include pathOf('/includes/footer.php');
  include pathOf('/includes/script.php');
  include pathOf('/includes/pageEnd.php');
  ?>