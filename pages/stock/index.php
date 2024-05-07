<?php
require '../../includes/init.php';
$UserId = $_SESSION['UserId'];
$permissions = authenticate('Stocks', $UserId);
$stocks = select("SELECT Stock.Id, Stock.CurrentQuantity, BranchDetails.OwnerName AS 'BranchDetailsOwnerName', Products.Name AS 'ProductName' FROM Stock INNER JOIN BranchDetails ON Stock.BranchId = BranchDetails.Id INNER JOIN Products ON Stock.ProductId = Products.Id");
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
              <h4 class="card-title col-10">Stock</h4>
              <?php if ($permissions['AddPermission'] == 1) { ?>
                <a class="btn btn-primary col-1 mb-5" href="./add">
                  <i class="mdi mdi-plus"></i>
                </a>
              <?php } ?>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Sr.no.</th>
                    <th>Branch</th>
                    <th>Product</th>
                    <th>CurrentQuantity</th>
                    <?php if ($permissions['EditPermission'] == 1) { ?>
                      <th>Modify</th>
                    <?php } ?>
                    <?php if ($permissions['DeletePermission'] == 1) { ?>
                      <th>Delete</th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($stocks  as $stock): ?>
                    <tr>
                      <td><?= $index += 1 ?></td>
                      <td><?= $stock['BranchDetailsOwnerName'] ?></td>
                      <td><?= $stock['ProductName'] ?></td>
                      <td><?= $stock['CurrentQuantity'] ?></td>
                      <form action="./update" method="post">
                        <td>
                          <input type="hidden" name="Id" id="Id" value="<?= $stock['Id'] ?>">
                          <button type="submit" class="btn btn-primary btn-circle mb-2">
                            <i class="mdi mdi-table-edit"></i>
                          </button>
                        </td>
                      </form>
                      <td>
                        <button type="button" class="btn btn-primary btn-circle mb-2"
                          onclick="deleteStock(<?= $stock['Id'] ?>)">
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
  include pathOf('includes/footer.php');
  include pathOf('includes/script.php');
  ?>
  <script>

    function deleteStock(Id) {
      if (confirm("Are you sure you want to delete this Stock?")) {
        $.ajax({
          url: "../../api/stock/delete",
          method: "POST",
          data: {
            Id: Id
          },
          success: function (response) {
            alert('Stock  deleted!');
            window.location.href = './index';
          }
        });
      }
    }

  </script>
  <?php
  include pathOf('includes/pageEnd.php');
  ?>