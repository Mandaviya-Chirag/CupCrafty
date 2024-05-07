<?php
require '../../includes/init.php';
$UserId = $_SESSION['UserId'];
$permissions = authenticate('Purchase', $UserId);
if ($permissions['AddPermission'] != 1)
  header('Location: ./index');
$branchDetails = select("SELECT * FROM branchDetails");
$products = select("SELECT * FROM products");
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Purchase Add</h4>
            <p class="card-description">Add new Purchase</p>
            <form class="forms-sample">
              <label class="col-md-2 col-form-label">Branch</label>
              <div>
                <select class="form-select" id="branchId" autofocus>
                  <?php foreach ($branchDetails as $branchDetail): ?>
                    <option value="<?= $branchDetail['Id'] ?>"><?= $branchDetail['OwnerName'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div>
                <label class="col-md-2 col-form-label">Product</label>
                <select class="form-select" id="productId">
                  <?php foreach ($products as $product): ?>
                    <option value="<?= $product['Id'] ?>"><?= $product['Name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div>
                <label class="col-md-2 col-form-label">Quantity</label>
                <div>
                  <input class="form-control mb-3" type="number" id="Quantity">
                </div>
              </div>
              <button type="submit" class="btn btn-primary me-2" onclick="sendData()">
                Add
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
    function sendData() {
      let data = {
        branchId: $("#branchId").val(),
        Quantity: $("#Quantity").val(),
        productId: $("#productId").val(),
      }

      $.ajax({
        url: "../../api/purchase/insert",
        method: "POST",
        data: data,
        success: function (response) {
          alert("Purchase Added");
          window.location.href = './index';
        }
      })
    }
  </script>
  <?php
  include pathOf('includes/pageEnd.php');
  ?>