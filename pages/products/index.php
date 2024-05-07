<?php
require '../../includes/init.php';
$UserId = $_SESSION['UserId'];
$permissions = authenticate('Products', $UserId);
$products = select("SELECT Products.Id, Products.Name, Products.Description, Products.Price, Products.ImageFileName, Categories.Name AS 'CategoryName' FROM Products INNER JOIN Categories ON Products.CategoryId = Categories.Id");
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
              <h4 class="card-title col-10">Products</h4>
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
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>ImageFile</th>
                    <?php if ($permissions['EditPermission'] == 1) { ?>
                      <th>Modify</th>
                    <?php } ?>
                    <?php if ($permissions['DeletePermission'] == 1) { ?>
                      <th>Delete</th>
                    <?php } ?>
                  </tr>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($permissions['ViewPermission'] == 1) {
                    foreach ($products as $product): ?>
                      <tr>
                        <td><?= ++$index ?></td>
                        <td><?= $product['CategoryName'] ?></td>
                        <td><?= $product['Name'] ?></td>
                        <td><?= $product['Description'] ?></td>
                        <td><?= $product['Price'] ?></td>
                        <td>
                          <img src="<?= urlOf('assets/img/uploads/') . $product['ImageFileName'] ?>" height="20%"
                            width="20%">
                        </td>
                        <?php if ($permissions['EditPermission'] == 1) { ?>
                          <td>
                            <form action="./update" method="post">
                              <input type="hidden" name="Id" value="<?= $product['Id'] ?>">
                              <button type="submit" class="btn btn-primary me-2">
                                <i class="mdi mdi-table-edit"></i>
                              </button>
                            </form>
                          </td>
                        <?php } ?>
                        <?php if ($permissions['DeletePermission'] == 1) { ?>
                          <td>
                            <button type="button" class="btn btn-primary me-2" onclick="deleteProduct(<?= $product['Id'] ?>)">
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

    function deleteProduct(Id) {
      if (confirm("Are you sure you want to delete this Prouduct?")) {
        $.ajax({
          url: "../../api/products/delete",
          method: "POST",
          data: {
            Id: Id
          },
          success: function (response) {
            alert('Product deleted!');
            window.location.href = './index';
          }
        });
      }
    }

  </script>

  <?php
  include pathOf('includes/pageEnd.php');
  ?>