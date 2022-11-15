
<?php

require_once 'functions.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$image = $_FILES['image'];

if(!empty(isAlphabetStr($first_name))){

    $errors[] = isAlphabetStr($first_name);
}
if(!empty(isAlphabetStr($last_name)))
{
    if(!in_array(isAlphabetStr($last_name), $errors))
    {
        $errors[] = isAlphabetStr($last_name);
    }
   
}
if($image && $image['tmp_name']!==''){
    if(!is_dir('uploads'))
    {
        mkdir('uploads');
    }

    $image_path = 'uploads/'.randStr(8) .'/'. $image['name'];
    mkdir(dirname($image_path));
    move_uploaded_file($image['tmp_name'], $image_path);
}
else
{
    $errors[] = 'please, upload an image';

}

?>






