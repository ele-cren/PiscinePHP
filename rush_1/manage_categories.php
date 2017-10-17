<?php

Include "data_connect.php";

function get_id_cat($cat){
  Include "data_connect.php";
  $query = "SELECT category_id FROM categories WHERE name = ?";
  $res_prep = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($res_prep, "s", $cat);
  mysqli_stmt_execute($res_prep);
  mysqli_stmt_bind_result($res_prep, $data['category_id']);
  mysqli_stmt_fetch($res_prep);
  return ($data['category_id']);
}

if ($_POST['add'] == "Ajouter"){
  $query = "INSERT INTO categories(name) VALUES(?)";
  $res_prep = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($res_prep, "s", $_POST['name_cate']);
  mysqli_stmt_execute($res_prep);
}

elseif ($_POST["del"] == "Suppression"){
  $id_cat = get_id_cat($_POST['name_cate']);
  $query = "DELETE p FROM products p INNER JOIN product_categories pc
    ON p.product_id = pc.product_id WHERE pc.category_id = ?";
    $res_prep = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($res_prep, "i", $id_cat);
    mysqli_stmt_execute($res_prep);

  $query = "DELETE FROM product_categories WHERE category_id = ?";
  $res_prep = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($res_prep, "i", $id_cat);
  mysqli_stmt_execute($res_prep);

  $query = "DELETE FROM categories WHERE category_id = ?";
  $res_prep = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($res_prep, "i", $id_cat);
  mysqli_stmt_execute($res_prep);
}

header("Location: admin.php");
?>
