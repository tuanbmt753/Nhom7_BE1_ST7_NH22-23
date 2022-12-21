<?php
  include("header.php");
  include("sidebar.php"); 
  if(isset($_GET['id'])){
    $_SESSION['product-edit'] = $_GET['id'];
    $id = $_GET['id'];
    $data = $products->getProductById($id);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Prduct Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="edit.php" method="post" enctype = "multipart/form-data">
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
              <div class="form-group">
                <label for="inputName">Product Name</label>
                <input value ="<?php echo $data[0]['name']; ?>" name="name" type="text" id="inputName" class="form-control">
              </div>
             
              <!-- Manu id -->
              <div class="form-group">
                <label for="inputStatus">Manu_id</label>
                <select  name="manu_id" id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <?php
                  $getAllManufactures = $manufactures->getAllManufactures();
                  foreach ($getAllManufactures as $key => $value) {
                    if($value['manu_id']==$data[0]['manu_id']){?>
                       <option selected value = "<?php echo $value['manu_id']; ?>"><?php echo $value['manu_name']; ?></option>
                    <?php
                    }
                    else{   
                    ?>
                    <option value = "<?php echo $value['manu_id']; ?>"><?php echo $value['manu_name']; ?></option>
                  <?php
                    }
                  }
                  ?>
                </select>
              </div>

              <!-- Type_id -->
              <div class="form-group">
                <label for="inputStatus">Type_id</label>
                <select name="type_id" id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <?php
                  $getAllProtypes = $protypes->getAllProtypes();
                  foreach ($getAllProtypes as $key => $value) {
                    if($value['type_id'] == $data[0]['type_id']){?>
                       <option selected value = "<?php echo $value['type_id']; ?>"><?php echo $value['type_name']; ?></option>
                    <?php
                    }
                    else{
                    ?>
                    <option value = "<?php echo $value['type_id']; ?>"><?php echo $value['type_name']; ?></option>
                  <?php
                    }
                  }
                  ?>
                </select>
              </div>

              <!-- Price -->
              <div class="form-group">
                <label for="inputClientCompany">Price</label>
                <input value="<?php echo $data[0]['price']; ?>" name="price" type="text" id="inputClientCompany" class="form-control">
              </div>


              <!-- Image  -->
              <Label for="Image">Image</Label>
              <input type="file" name="hinhanh" id="Image" class="form-control">
              <img alt="Avatar" class="table-avatar" src="../img/<?php echo $data[0]['image']; ?>">

              <!-- Description -->
              <div class="form-group">
                <label for="inputDescription">Description</label>
                <textarea name="description"  id="inputDescription" class="form-control" rows="4"><?php echo $data[0]['description'];?>
                </textarea>
              </div>

              <!-- Feature -->
              <div class="form-group">
                <?php if($data[0]['feature'] == 1){?>
                  <input  checked type="checkbox" id="feature" name="feature" value="feature" class="form-control" >
                  <label for="feature">Feature</label><br>
                <?php
                }
                else{?>
                  <input type="checkbox" id="feature" name="feature" value="feature" class="form-control" >
                  <label for="feature">Feature</label><br>
                <?php
                } ?>
 
              </div>

              <!-- Sold -->
              <div class="form-group">
                <label for="inputClientCompany">Sold</label>
                <input value="<?php echo $data[0]['sold']; ?>" name="sold" type="text" id="inputClientCompany" class="form-control">
              </div>

               <!-- Inventory -->
               <div class="form-group">
                <label for="inputClientCompany">Inventory</label>
                <input value="<?php echo $data[0]['inventory']; ?>" name="inventory" type="text" id="inputClientCompany" class="form-control">
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
          <input  type="submit" value="Porduct Edit" class="btn btn-success float-right">
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
  
