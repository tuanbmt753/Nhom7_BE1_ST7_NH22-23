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
            <h1>Manufactures</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manufactures</li>
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
          <h3 class="card-title">Manufactures</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button> -->
          </div>
        </div>
        <a class="btn btn-info btn-sm" href="manufactures-add.php">
             <i class="fas fa-pencil-alt">
            </i>
              Add
          </a>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 15%">
                          Manu Id
                      </th>
                      <th style="width: 15%">
                         Manu Name
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php
                   
                   $getAll = $manufactures->getAllManufactures();
                         
                    foreach ($getAll as $key => $value) {
                      # code...
                    
                ?>
                
                    <tr>
                        <td>
                            #<?php echo $value['manu_id']; ?>
                        </td>
                        <td>
                            <a>
                                <?php echo $value['manu_name']; ?>
                            </a>
                        </td>
                        <td class="project-actions text-right">
                            <!-- <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a> -->
                            <a class="btn btn-info btn-sm" href="manufactures-edit.php?id=<?php echo $value['manu_id']; ?>">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="manufactures-delete.php?manu_id=<?php echo $value['manu_id']; ?>">
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
