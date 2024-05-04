<?php
require ('../../includes/init.php');
$branchDetails = select("SELECT * FROM BranchDetails");
$products = select("SELECT * FROM Products");
$Id = $_POST["Id"];
$stocks = selectOne("SELECT * FROM stock WHERE Id = $Id");
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Stock</h4>
            <p class="card-description">Update stock</p>
            <form class="forms-sample">
              <input class="form-control" type="hidden" id="Id" name="Id" value="<?= $stocks['Id'] ?>">
              <label>Branch</label>
              <div>
                <select class="form-select" id="branchId">
                  <?php foreach ($branchDetails as $branchDetail): ?>
                    <option value="<?= $branchDetail['Id'] ?>"><?= $branchDetail['Id'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div>
                <label>Product</label>
                <select class="form-select" id="productId">
                  <?php foreach ($products as $product): ?>
                    <option value="<?= $product['Id'] ?>"><?= $product['Id'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div>
                <label>Quantity</label>
                <div>
                  <input class="form-control" type="number" id="CurrentQuantity" value="<?= $stocks['Quantity'] ?>">
                </div>
              </div>
              <button type="submit" class="btn btn-primary me-2" onclick="updateData()">
                Update
              </button>
              <button class="btn btn-light">Cancel</button>
            </form>
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
    function updateData() {
      let data = {
        Id: $("#Id").val(),
        branchId: $("#branchId").val(),
        CurrentQuantity: $("#CurrentQuantity").val(),
        productId: $("#productId").val()
      };

      $.ajax({
        url: "../../api/stock/update.php",
        method: "POST",
        data: data,
        success: function (response) {
          alert("Stock Updated!");
          window.location.href = './index.php';
        }
      })
    }
  </script>
  <?php
  include pathOf('includes/pageEnd.php');
  ?>