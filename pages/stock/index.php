<?php
require '../../includes/init.php';
$stock = select("SELECT Stock.Id, Stock.CurrentQuantity, BranchDetails.Id AS 'BranchDetailsId', Products.Id AS 'ProductId' FROM Stock INNER JOIN BranchDetails ON Stock.BranchId = BranchDetails.Id INNER JOIN Products ON Stock.ProductId = Products.Id");
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
                    <th>CurrentQuantity</th>
                    <th>Modify</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($stock as $stocks): ?>
                      <tr>
                        <td><?= $index += 1 ?></td>
                         <td><?= $stocks['BranchDetailsId'] ?></td>
                        <td><?= $stocks['ProductId'] ?></td>
                        <td><?= $stocks['CurrentQuantity'] ?></td>
                        <form action="./update.php" method="post">
                          <td>
                            <input type="hidden" name="Id" id="Id" value="<?= $stocks['Id'] ?>">
                            <button type="submit" class="btn btn-primary btn-circle mb-2">
                              <i class="mdi mdi-table-edit"></i>
                            </button>
                          </td>
                        </form>
                        <td>
                          <button type="button" class="btn btn-primary btn-circle mb-2"
                            onclick="deleteStock(<?= $stocks['Id'] ?>)">
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
    if (confirm("sure you want to delete this stock"));
    $.ajax({
      url: "../../api/stock/delete.php",
      method: "POST",
      data: {
        Id: Id
      },
      success: function (response) {
        alert('Stock Deleted!');
        window.location.href = './index.php';
      }
    })
  }
</script>
<?php
include pathOf('includes/pageEnd.php');
?>