<?php
require '../../includes/init.php';
$sales = select("SELECT Sales.Id, Sales.Quantity, BranchDetails.Id AS 'BranchDetailsId', Products.Id AS 'ProductId' FROM Sales INNER JOIN BranchDetails ON Sales.BranchId = BranchDetails.Id INNER JOIN Products ON Sales.ProductId = Products.Id");
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
              <a class="btn btn-primary col-1 mb-5" href="./add.php">
                <i class="mdi mdi-plus"></i>
              </a>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Sr.no.</th>
                    <th>Branch</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Modify</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($sales as $sale): ?>
                    <tr>
                      <td><?= $index += 1 ?></td>
                      <td><?= $sale['BranchDetailsId'] ?></td>
                      <td><?= $sale['ProductId'] ?></td>
                      <td><?= $sale['Quantity'] ?></td>
                      <form action="./update.php" method="post">
                        <td>
                          <input type="hidden" name="Id" id="Id" value="<?= $sale['Id'] ?>">
                          <button type="submit" class="btn btn-primary btn-circle mb-2">
                            <i class="mdi mdi-table-edit"></i>
                          </button>
                        </td>
                      </form>
                      <td>
                        <button type="button" class="btn btn-primary btn-circle mb-2"
                          onclick="deleteSales(<?= $sale['Id'] ?>)">
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
  function deleteSales(Id) {
    if (confirm("sure you want to delete this sale"));
    $.ajax({
      url: "../../api/sales/delete.php",
      method: "POST",
      data: {
        Id: Id
      },
      success: function (response) {
        alert('sale Deleted!');
        window.location.href = './index.php';
      }
    })
  }
</script>
<?php
include pathOf('includes/pageEnd.php');
?>