<?php
  include("header.php");
  include("sidebar.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Users</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button> -->
          </div>
        </div>
        <a class="btn btn-info btn-sm" href="user-add.php">
             <i class="fas fa-pencil-alt">
            </i>
              Add
          </a>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 15%">
                          Users Id
                      </th>
                      <th style="width: 15%">
                         Users Name
                      </th>
                      <th style="width: 15%">
                          Password
                      </th>
                      <th style="width: 15%">
                         Role id
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php
                   
                   $user = $user->getAllLogin();
                         
                    foreach ($user as $key => $value) {
                      # code...
                    
                ?>
                
                    <tr>
                        <td>
                            #<?php echo $value['user_id']; ?>
                        </td>
                        <td>
                            <a>
                                <?php echo $value['username']; ?>
                            </a>
                        </td>
                        <td>
                            <?php echo $value['password']; ?>
                        </td>
                        <td>
                            <a>
                                <?php echo $value['role_id']; ?>
                            </a>
                        </td>
                        <td class="project-actions text-right">
                            <!-- <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a> -->
                            <a class="btn btn-info btn-sm" href="user-edit.php?id=<?php echo $value['user_id']; ?>">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="user-delete.php?id=<?php echo $value['user_id']; ?>">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                    </tr>

                <?php }?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
    include("footer.php");
  ?>
