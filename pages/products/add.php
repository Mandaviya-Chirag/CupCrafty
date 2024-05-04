<?php
require '../../includes/init.php';
$categories = select("SELECT * FROM Categories");
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Products Add</h4>
            <p class="card-description">Add new Products</p>
            <form class="forms-sample">
              <div class="form-group">
                <div>
                <select class="form-select" id="categoryId">
                  <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['Id'] ?>"><?= $category['Id'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                </div>
                <label>Name</label>
                <input type="text" class="form-control" id="Name" placeholder="Enter Name" autofocus />
              </div>
              <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" id="Description" placeholder="Enter Description" />
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" id="Price" placeholder="Enter Price" />
              </div>
              <div class="form-group">
                <label>ImageFile</label>
                <input type="file" class="form-control" id="Image" />
              </div>
              <button type="submit" class="btn btn-primary me-2"  onclick="sendData()" >
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
    var form = new FormData();
       form.append('categoryId',$('#categoryId').val());
       form.append('Name',$('#Name').val());
       form.append('Description',$('#Description').val());
       form.append('Price',$('#Price').val());
       form.append('Image',$('#Image')[0].files[0]);
      
    
    $.ajax({
      url: '../../api/products/insert.php',
      method: 'POST',
      data: form,
      processData:false,
      contentType:false,
      success: function (response) {
        console.log(response.success);
        if (response.success !== true) {
          return;
          window.location.href='./index.php';
        }
      }

    })
  }
</script>

<?php
include pathOf('includes/pageEnd.php');
?>