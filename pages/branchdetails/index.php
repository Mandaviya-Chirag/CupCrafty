<?php
require '../../includes/init.php';
$branchDetails = select("SELECT BranchDetails.Id, BranchDetails.Address, BranchDetails.Squarefeet, BranchDetails.OwnerName, City.Name FROM BranchDetails INNER JOIN City ON BranchDetails.CityId = City.Id");
$index = 0;
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>


<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
           <div class="row justiyfy-content-between">
              <h4 class="card-title col-10">BranchDetails</h4>
              <a class="btn btn-primary col-1 mb-5" href="./add.php">
                <i class="mdi mdi-plus"></i>
              </a>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Sr.no.</th>
                    <th>OwnerName</th>
                    <th>CityName</th>
                    <th>Squarefeet</th>
                    <th>Address</th>
                    <th>Details</th>
                    <th>Modify</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($branchDetails as $branchDetail) : ?>
                  <tr>
                         <td><?= $index += 1  ?></td>
                         <td><?= $branchDetail['Name'] ?></td>
                         <td><?= $branchDetail['Squarefeet'] ?></td>
                         <td><?= $branchDetail['Address'] ?></td>
                         <td><?= $branchDetail['OwnerName'] ?></td>
                    <form action="./update.php" method="post">
                    <td>
                       <input type="hidden" name="id" value="<?= $branchDetail['Id'] ?>">
                      <a href="./update.php?id=<?= $user['Id'] ?>">
                        <div class="btn btn-primary me-2">
                          <i class="mdi mdi-table-edit"></i>
                        </div>
                      </a>
                    </td>
                    </form>
                    <form action="../../api/branchdetails/delete.php" method="post">
                    <td>
                      <input type="hidden" name="id" value="<?= $branchDetail['Id'] ?>">
                      <a href="../../api/branchdetails/delete.php?id=<?= $user['Id'] ?>">
                        <div class="btn btn-primary me-2">
                          <i class="mdi mdi-delete-variant"></i>
                        </div>
                      </a>
                    </td>
                    </form>
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
  <?php
  include pathOf('/includes/footer.php');
  include pathOf('/includes/script.php');
  include pathOf('/includes/pageEnd.php');
  ?>