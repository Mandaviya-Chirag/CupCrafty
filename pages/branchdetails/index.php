<?php
require '../../includes/init.php';
$branchDetails = select("SELECT BranchDetails.Id, BranchDetails.Address, BranchDetails.SquareFeet, BranchDetails.OwnerName, City.Name FROM BranchDetails INNER JOIN City ON BranchDetails.CityId = City.Id");
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
                    <th>SquareFeet</th>
                    <th>Address</th>
                    <th>Modify</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($branchDetails as $branchDetail): ?>
                    <tr>
                      <td><?= $index += 1 ?></td>
                      <td><?= $branchDetail['OwnerName'] ?></td>
                      <td><?= $branchDetail['Name'] ?></td>
                      <td><?= $branchDetail['SquareFeet'] ?></td>
                      <td><?= $branchDetail['Address'] ?></td>
                      <form action="./update.php" method="post">
                        <td>
                          <input type="hidden" name="Id" id="Id" value="<?= $branchDetail['Id'] ?>">
                          <button type="submit" class="btn btn-primary me-2">
                            <i class="mdi mdi-table-edit"></i>
                          </button>
                        </td>
                      </form>
                      <td>
                        <button type="submit" class="btn btn-primary me-2"
                          onclick="deleteBranch(<?= $branchDetail['Id'] ?>)">
                          <i class="mdi mdi-delete-variant"></i>
                        </button>
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
  <?php
  include pathOf('/includes/footer.php');
  include pathOf('/includes/script.php');
  ?>

<script>

  function deleteBranch(Id){
    if (confirm("are you sure you want to delete this branch"));
    $.ajax({
        url : "../../api/branchdetails/delete.php",
        method : "POST",
        data : {
          Id : Id
        },
        success : function(response){
          alert('Branchdetails Deleted!');
          window.location.href = './index.php';
        }
    }) 
  }

</script>

  <?php
  include pathOf('/includes/pageEnd.php');
  ?>