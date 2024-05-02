<?php
require '../../includes/init.php';
$expense = select("SELECT Expense.Id, Expense.Name, Expense.Amount, BranchDetails.Id AS BranchDetailsId FROM Expense INNER JOIN BranchDetails ON Expense.BranchId = BranchDetails.Id");
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
                    <th>Branch</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Modify</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($expense as $expenses): ?>
                    <tr>
                      <td><?= $index += 1 ?></td>
                      <td><?= $expenses['BranchDetailsId'] ?></td>
                      <td><?= $expenses['Name'] ?></td>
                      <td><?= $expenses['Amount'] ?></td>
                      <form action="./update.php" method="post">
                        <td>
                          <input type="hidden" name="Id" id="Id" value="<?= $expenses['Id'] ?>">
                          <button type="submit" class="btn btn-primary me-2">
                            <i class="mdi mdi-table-edit"></i>
                          </button>
                        </td>
                      </form>
                      <td>
                        <button type="submit" class="btn btn-primary me-2"
                          onclick="deleteExpense(<?= $expenses['Id'] ?>)">
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

    function deleteExpense(Id) {
      if (confirm("are you sure you want to delete this expense"));
      $.ajax({
        url: "../../api/expense/delete.php",
        method: "POST",
        data: {
          Id: Id
        },
        success: function (response) {
          alert('Expense Deleted!');
          window.location.href = './index.php';
        }
      })
    }

  </script>

  <?php
  include pathOf('/includes/pageEnd.php');
  ?>