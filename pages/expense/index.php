<?php
require '../../includes/init.php';
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
              <h4 class="card-title col-10">Expense</h4>
              <a class="btn btn-primary col-1 mb-5" href="./add.php">
                <i class="mdi mdi-plus"></i>
              </a>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Name</th>
                    <th>BranchName</th>
                    <th>Amount</th>
                    <th>Modify</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>xyz</td>
                    <td>abc</td>
                    <td>10000</td>
                    <td>
                      <a href="./update.php">
                        <div class="btn btn-primary me-2">
                          <i class="mdi mdi-table-edit"></i>
                        </div>
                      </a>
                    </td>
                    <td>
                      <a href="#">
                        <div class="btn btn-primary me-2">
                          <i class="mdi mdi-delete-variant"></i>
                        </div>
                      </a>
                    </td>
                  </tr>
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