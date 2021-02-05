<?php
// $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];

// if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
//     echo "false";
//     return;
// }

move_uploaded_file($_FILES['file']['tmp_name'], '../Rakib vai\'s assignment/'.$_COOKIE['usr'].'/'.$_FILES['file']['name']);

echo "File uploaded successfully.";
?>