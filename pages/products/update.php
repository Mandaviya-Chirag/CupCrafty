<?php
require ('../../includes/init.php');

$UserId = $_SESSION['UserId'];
$permissions = authenticate('Products', $UserId);
if ($permissions['EditPermission'] != 1)
  header('Location: ./index');

$categories = select("SELECT * FROM Categories");
$Id = $_POST["Id"];
$products = selectOne("SELECT * FROM Products WHERE Id = $Id");
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Products</h4>
            <p class="card-description">Update Products</p>
            <form class="forms-sample">
              <div class="form-group">
                <input type="hidden" class="form-control" id="Id" value="<?= $products['Id'] ?>" />
                <div>
                  <label for="">Category</label>
                  <select class="form-select mb-3" id="categoryId" autofocus>
                    <?php foreach ($categories as $category): ?>
                      <option value="<?= $category['Id'] ?>"><?= $category['Name'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <label>Name</label>
                <input type="text" class="form-control" id="Name" placeholder="Enter Name"
                  value="<?= $products['Name'] ?>" />
              </div>
              <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" id="Description" placeholder="Enter Description"
                  value="<?= $products['Description'] ?>" />
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" id="Price" placeholder="Enter Price"
                  value="<?= $products['Price'] ?>" />
              </div>
              <div class="form-group">
                <label>ImageFile</label>
                <input type="file" class="form-control" id="Image" value="<?= $products['Image'] ?>" />
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
  include pathOf('/includes/footer.php');
  include pathOf('/includes/script.php');
  ?>

  <script>
    function updateData() {
      var form = new FormData();
      form.append('Id', $('#Id').val());
      form.append('categoryId', $('#categoryId').val());
      form.append('Name', $('#Name').val());
      form.append('Description', $('#Description').val());
      form.append('Price', $('#Price').val());
      form.append('Image', $('#Image')[0].files[0]);


      $.ajax({
        url: '../../api/products/update',
        method: 'POST',
        data: form,
        processData: false,
        contentType: false,
        success: function (response) {
          alert('Products Updated!');
          console.log(response.success);
          if (response.success !== true) {
            return;
            window.location.href = './index';
          }
        }

      })
    }
  </script>
  <?php
  include pathOf('/includes/pageEnd.php');
  ?>