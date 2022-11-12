<?php

$first_name = '';
$last_name = '';
$image = '';
$errors = [];

if($_SERVER['REQUEST_METHOD']==='POST')
{
    require_once '../validations.php';

}

?>

<?php require_once 'partials/head.php';
      require_once '../errorStyles.php'; ?>

 
<form action="index.php" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
  <div class="col-md-4">
    <label for="first_name" class="form-label">First name</label>
    <input type="text" class="form-control" name="first_name"id="first_name" value="<?php echo $first_name?>" required>
  </div>
  <div class="col-md-4">
    <label for="last_name" class="form-label">Last name</label>
    <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $last_name?>" required>
  </div>
  <div class="mb-3">
  <label for="image" class="form-label">Image</label>
  <input class="form-control" type="file" name="image" id="image" required>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
</div>
<button type="submit" class="btn btn-primary" style="width:10%">Submit</button>
</form>
<?php if(empty($errors)&&$_SERVER['REQUEST_METHOD']==='POST'): ?>
 <div class="user-data">
    <label class="form-label">First name</label>
    <p class="form-control border border-success" style="width:30%"><?php echo $first_name?></p>
    <label class="form-label">Last name</label>
    <p class="form-control border border-success" style="width:30%"><?php echo $last_name?></p>
    <img src="<?php echo $image_path ?>" class="img-fluid user-image" alt="user image">
</div> 
<?php endif; ?>   

</body>
</html>
