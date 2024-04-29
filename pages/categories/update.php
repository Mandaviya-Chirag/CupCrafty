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
            <h4 class="card-title">Category</h4>
            <p class="card-description">Update category</p>
            <form class="forms-sample">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" autofocus />
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" id="description" placeholder="Enter Description" />
              </div>
              <button type="submit" class="btn btn-primary me-2">
                Update
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