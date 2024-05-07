<?php
require '../../includes/init.php';
$categories = select("SELECT * FROM Categories");
$UserId = $_SESSION['UserId'];
$permissions = authenticate('Categories', $UserId);
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
              <h4 class="card-title col-10">Categories</h4>
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
                    <th>Name</th>
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
                    foreach ($categories as $category): ?>
                      <tr>
                        <td><?= $index += 1 ?></td>
                        <td><?= $category['Name'] ?></td>
                        <?php if ($permissions['EditPermission'] == 1) { ?>
                          <form action="./update" method="post">
                            <td>
                              <input type="hidden" name="Id" id="Id" value="<?= $category['Id'] ?>">
                              <button type="submit" class="btn btn-primary btn-circle mb-2">
                                <i class="mdi mdi-table-edit"></i>
                              </button>
                            </td>
                          </form>
                        <?php } ?>
                        <?php if ($permissions['DeletePermission'] == 1) { ?>
                          <td>
                            <button type="submit" class="btn btn-primary btn-circle mb-2"
                              onclick="deleteCategory(<?= $category['Id'] ?>)">
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
  include pathOf('/includes/footer.php');
  include pathOf('/includes/script.php');
  ?>

  <script>

    function deleteCategory(Id) {
      if (confirm("Are you sure you want to delete this Category?")) {
        $.ajax({
          url: "../../api/categories/delete",
          method: "POST",
          data: {
            Id: Id
          },
          success: function (response) {
            alert('Category  deleted!');
            window.location.href = './index';
          }
        });
      }
    }

  </script>
  <?php
  include pathOf('/includes/pageEnd.php');
  ?>