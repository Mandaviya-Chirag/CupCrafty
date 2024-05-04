<?php
require '../../includes/init.php';
$purchases = select("SELECT Purchase.Id, Purchase.Quantity, BranchDetails.Id AS 'BranchDetailsId', Products.Id AS 'ProductId' FROM Purchase INNER JOIN BranchDetails ON Purchase.BranchId = BranchDetails.Id INNER JOIN Products ON Purchase.ProductId = Products.Id");
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
              <h4 class="card-title col-10">Purchase</h4>
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
                  <?php foreach ($purchases as $purchase): ?>
                    <tr>
                      <td><?= $index += 1 ?></td>
                      <td><?= $purchase['BranchDetailsId'] ?></td>
                      <td><?= $purchase['ProductId'] ?></td>
                      <td><?= $purchase['Quantity'] ?></td>
                      <form action="./update.php" method="post">
                        <td>
                          <input type="hidden" name="Id" id="Id" value="<?= $purchase['Id'] ?>">
                          <button type="submit" class="btn btn-primary btn-circle mb-2">
                            <i class="mdi mdi-table-edit"></i>
                          </button>
                        </td>
                      </form>
                      <td>
                        <button type="button" class="btn btn-primary btn-circle mb-2"
                          onclick="deletePurchase(<?= $purchase['Id'] ?>)">
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
        function deletePurchase(Id) {
            if (confirm("sure you want to delete this purchase"));
            $.ajax({
                url: "../../api/purchase/delete.php",
                method: "POST",
                data: {
                    Id: Id
                },
                success: function (response) {
                    alert('Purchase Deleted!');
                    window.location.href = './index.php';
                }
            })
        }
    </script>
<?php
include pathOf('includes/pageEnd.php');
?>