<?php
require '../../includes/init.php';
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
                <label>Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" autofocus/>
              </div>
              <div class="form-group">
                <label>Prize</label>
                <input type="text" class="form-control" id="prize" placeholder="Enter Prize" />
              </div>
              <div class="form-group">
                <label>ImageFile</label>
                <input type="text" class="form-control" id="imagefile" placeholder="imagefile" />
              </div>
              <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" id="description" placeholder="Enter Description" />
              </div>
              <button type="submit" class="btn btn-primary me-2">
                Add
              </button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php
include pathOf('/includes/footer.php');
include pathOf('/includes/script.php');
include pathOf('/includes/pageEnd.php');
?>