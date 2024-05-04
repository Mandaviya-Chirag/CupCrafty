<?php
require '../../includes/init.php';
$products = select("SELECT Products.Id, Products.Name, Products.Description, Products.Price, Products.ImageFileName, Categories.Id AS 'CategoryId' FROM Products INNER JOIN Categories ON Products.CategoryId = Categories.Id");
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
              <a class="btn btn-primary col-1 mb-5" href="./add.php">
                <i class="mdi mdi-plus"></i>
              </a>
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
                    <th>Modify</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($products as $product): ?>
                    <tr>
                      <td><?= $index += 1 ?></td>
                      <td><?= $product['CategoryId'] ?></td>
                      <td><?= $product['Name'] ?></td>
                      <td><?= $product['Description'] ?></td>
                      <td><?= $product['Price'] ?></td>
                      <td><?= $product['ImageFileName'] ?></td>
                      <form action="./update" method="post">
                        <td>
                          <input type="hidden" name="Id" id="Id" value="<?= $product['Id'] ?>">
                          <button type="submit" class="btn btn-primary me-2">
                            <i class="mdi mdi-table-edit"></i>
                          </button>
                        </td>
                      </form>
                      <td>
                        <button type="submit" class="btn btn-primary me-2" onclick="deleteBranch(<?= $product['Id'] ?>)">
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



  <?php
  include pathOf('includes/pageEnd.php');
  ?>