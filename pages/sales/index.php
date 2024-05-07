<?php
require '../../includes/init.php';
$UserId = $_SESSION['UserId'];
$permissions = authenticate('Sales', $UserId);
$sales = select("SELECT Sales.Id, Sales.Quantity, BranchDetails.OwnerName AS 'BranchDetailsOwnerName', Products.Name AS 'ProductName' FROM Sales INNER JOIN BranchDetails ON Sales.BranchId = BranchDetails.Id INNER JOIN Products ON Sales.ProductId = Products.Id");
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
              <h4 class="card-title col-10">Sales</h4>
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
                    <th>Quantity</th>
                    <?php if ($permissions['EditPermission'] == 1) { ?>
                      <th>Modify</th>
                    <?php } ?>
                    <?php if ($permissions['DeletePermission'] == 1) { ?>
                      <th>Delete</th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($permissions['ViewPermission'] == 1) {

                    foreach ($sales as $sale): ?>
                      <tr>
                        <td><?= $index += 1 ?></td>
                        <td><?= $sale['BranchDetailsOwnerName'] ?></td>
                        <td><?= $sale['ProductName'] ?></td>
                        <td><?= $sale['Quantity'] ?></td>
                        <?php if ($permissions['EditPermission'] == 1) { ?>

                          <form action="./update" method="post">
                            <td>
                              <input type="hidden" name="Id" id="Id" value="<?= $sale['Id'] ?>">
                              <button type="submit" class="btn btn-primary btn-circle mb-2">
                                <i class="mdi mdi-table-edit"></i>
                              </button>
                            </td>
                          </form>
                        <?php } ?>
                        <?php if ($permissions['DeletePermission'] == 1) { ?>

                          <td>
                            <button type="button" class="btn btn-primary btn-circle mb-2"
                              onclick="deleteSale(<?= $sale['Id'] ?>)">
                              <i class="mdi mdi-delete-variant"></i>
                            </button>
                          </td>
                        <?php } ?>
                      </tr>
                    <?php endforeach;
                  } ?>
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

    function deleteSale(Id) {
      if (confirm("Are you sure you want to delete this Sale?")) {
        $.ajax({
          url: "../../api/sales/delete",
          method: "POST",
          data: {
            Id: Id
          },
          success: function (response) {
            alert('Sale  deleted!');
            window.location.href = './index';
          }
        });
      }
    }

  </script>
  <?php
  include pathOf('includes/pageEnd.php');
  ?>