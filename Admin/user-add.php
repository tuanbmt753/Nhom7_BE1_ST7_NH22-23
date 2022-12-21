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
            <h1>Users Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="user-add2.php" method="post">
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

              <!-- User name -->
              <div class="form-group">
                <label for="user_name">User Name</label>
                <input name="user_name" type="text" id="user_name" class="form-control">
              </div>

              <!-- Password -->
              <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="text" id="password" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputStatus">Rold Id</label>
                <select name="rold_id" id="inputStatus" class="form-control custom-select">
                  <option selected value ="2">2</option>
                  <option  value= "1">1</option>
                </select>
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
          <input  type="submit" value="Create new Protypes" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
    include("footer.php");
?>