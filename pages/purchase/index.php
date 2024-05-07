<?php
require ('../../includes/init.php');
$UserId = $_SESSION['UserId'];
$permissions = authenticate('Purchase', $UserId);
$purchases = select("SELECT Purchase.Id, Purchase.Quantity, BranchDetails.OwnerName AS 'BranchDetailsOwnerName', Products.Name AS 'ProductName' FROM Purchase INNER JOIN BranchDetails ON Purchase.BranchId = BranchDetails.Id INNER JOIN Products ON Purchase.ProductId = Products.Id");
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

                    foreach ($purchases as $purchase): ?>
                      <tr>
                        <td><?= $index += 1 ?></td>
                        <td><?= $purchase['BranchDetailsOwnerName'] ?></td>
                        <td><?= $purchase['ProductName'] ?></td>
                        <td><?= $purchase['Quantity'] ?></td>
                        <?php if ($permissions['EditPermission'] == 1) { ?>

                          <form action="./update" method="post">
                            <td>
                              <input type="hidden" name="Id" id="Id" value="<?= $purchase['Id'] ?>">
                              <button type="submit" class="btn btn-primary btn-circle mb-2">
                                <i class="mdi mdi-table-edit"></i>
                              </button>
                            </td>
                          </form>
                        <?php } ?>
                        <?php if ($permissions['DeletePermission'] == 1) { ?>

                          <td>
                            <button type="button" class="btn btn-primary btn-circle mb-2"
                              onclick="deletePurchase(<?= $purchase['Id'] ?>)">
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

    function deletePurchase(Id) {
      if (confirm("Are you sure you want to delete this Purchase?")) {
        $.ajax({
          url: "../../api/purchase/delete",
          method: "POST",
          data: {
            Id: Id
          },
          success: function (response) {
            alert('Purchase  deleted!');
            window.location.href = './index';
          }
        });
      }
    }

  </script>
  <?php
  include pathOf('includes/pageEnd.php');
  ?>