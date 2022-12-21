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
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
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
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button> -->
          </div>
        </div>
        <a class="btn btn-info btn-sm" href="product-add.php">
             <i class="fas fa-pencil-alt">
            </i>
              Add
          </a>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          id#
                      </th>
                      <th style="width: 20%">
                          Product Name
                      </th>
                      <th style="width: 10%">
                         Image
                      </th>
                      <th  class="text-center">
                         Type Name
                      </th>
                      <th  class="text-center">
                         Manu name
                      </th >
                      <th  class="text-center">
                        Price
                      </th >
                      <th  class="text-center">
                         Inventory
                      </th>
                      <th  class="text-center">
                        description
                      </th>
                      <th style="width: 30%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php
                   
                   $getAllProducts = $products->getAllProducts3();
                   $sumSold = 0;
                   
                    foreach ($getAllProducts as $key => $value) {
                      # code...
                    
                ?>
                
                    <tr>
                        <td>
                            #<?php echo $value['id']; ?>
                        </td>
                        <td>
                            <a>
                                <?php echo $value['name']; ?>
                            </a>
                            <br/>
                            <small>
                                created at <?php echo $value['created_at']; ?>
                            </small>
                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="../img/<?php echo $value['image']; ?>">
                                </li>
                               
                            </ul>
                        </td>
                        <td>
                            <a>
                                <?php echo $value['type_name']; ?>
                            </a>
                        </td>
                        <td>
                            <a>
                                <?php echo $value['manu_name']; ?>
                            </a>
                        </td>
                        <td>
                            <a>
                                <?php echo number_format( $value['price']); ?>VND
                            </a>
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success"><?php echo $value['inventory']; ?></span>
                        </td>
                        <td>
                            <a>
                                <?php echo substr ($value['description'],0,50); ?>...
                            </a>
                        </td>
                        <td class="project-actions text-right">
                            <!-- <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a> -->
                            <a class="btn btn-info btn-sm" href="product-edit.php?id=<?php echo $value['id'];?>">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="product-delete.php?id=<?php echo $value['id']; ?>">
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
