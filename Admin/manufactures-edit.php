<?php
  include("header.php");
  include("sidebar.php");
  if( isset($_GET['id'])){
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manufactures Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manufactures Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="manufactures-edit2.php" method="post">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">

              <!-- Protyes id -->
              <!-- Protypes name -->
              <div class="form-group">
                <label for="inputClientCompany">Manu id</label>
                <br>
                <span><?php echo $_GET['id']; ?></span>
                <input value="<?php echo $_GET['id']; ?>" name="manu_id" type="hidden" id="inputClientCompany" class="form-control">
              </div>
              <?php 
              $data = $manufactures->getAllManufacturesByID($_GET['id']); 
              ?>
              <div class="form-group">
                <label for="inputClientCompany">Manu Name</label>
                <input value="<?php echo $data[0]['manu_name']; ?>" name="manu_name" type="text" id="inputClientCompany" class="form-control">
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input  type="submit" value="Update Manufactures" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
  }
    include("footer.php");
?>