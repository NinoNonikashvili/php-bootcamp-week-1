<?php
require_once 'functions.php';
require_once 'data_declarations.php';

if($_SERVER['REQUEST_METHOD']==='POST')
{
  require_once 'validations.php';
}
?>

<?php require_once 'partials/head.php'?>
<body>
  <div class="form-wrapper">
  <h1>Github Profiles</h1>
    <form action="index.php" method="POST">
      <div class="mb-3">
        <label for="user_name" class="form-label">Username</label>
        <input type="text" name="user_name" class="form-control" id="user_name" value="<?php echo $user_name?>">
      </div>
      <?php if(!empty($errors[0])) : ?>
        <div class="alert alert-danger">
            <?php echo $errors[0]?>
        </div>
      <?php endif ?>
      <div class="mb-3 inline_block">
        <p>Show me: </p>
      </div>
      <div class="mb-3 form-check inline_block">
        <input name="repos"type="checkbox" class="form-check-input" id="repos" <?php if($repos==='on') echo 'checked'?>>
        <label class="form-check-label" for="repos" >Repositories</label>
      </div>
      <div class="mb-3 form-check inline_block">
        <input name="followers" type="checkbox" class="form-check-input" id="followers" <?php if($followers==='on') echo 'checked'?>>
        <label class="form-check-label" for="followers">Followers</label>
      </div>
      <?php if(!empty($errors[1])) : ?>
        <div class="alert alert-danger">
            <?php echo $errors[1] ?>
        </div>
      <?php endif; ?>
      <button type="submit" class="btn btn-primary block">Submit</button>
      <?php if(!empty($errors[2])) : ?>
        <div class="alert alert-danger">
        <?php echo $errors[2] ?>
      <?php elseif(!empty($errors[3])): ?>  
        <?php echo $errors[3] ?>
        </div>   
        <?php endif ?>
    </form>
  </div>

<div class="output"> 
  <?php if(($_SERVER['REQUEST_METHOD'] === 'POST') && empty($errors) && $repos==='on') : ?>
<table class="table">
  <thead class="table-head">
    <tr>
      <th scope="col">Repositories</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($response_repos as $repo) : ?>
    <tr>
      <td><a href="<?php echo $repo->html_url ?>"><?php echo $repo->name?></a></td>
    </tr>
    <?php endforeach ?>

  </tbody>
</table>
<?php endif ?>

<?php if(($_SERVER['REQUEST_METHOD'] === 'POST') && empty($errors) && $followers==='on') : ?>
<table class="table">
  <thead class="table-head">
    <tr>
      <th scope="2-col">Followers</th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">image</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($response_followers as $follower): ?>
    <tr>
      <td><a href="<?php echo $follower->html_url?>"><?php echo $follower->login?></a></td>
      <td>
        <img class="follower-img"src="<?php echo $follower->avatar_url ?>" alt="">
      </td>
    </tr>
    <?php endforeach ?>

  </tbody>
</table>
<?php endif ?>

</div>

  
</body>
</html>