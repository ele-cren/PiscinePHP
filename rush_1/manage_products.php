<?php

Include "data_connect.php";


function check_cat($cat){
  Include "data_connect.php";
  $query = "SELECT name FROM categories WHERE name = ?";
  $res_prep = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($res_prep, "s", $cat);
  mysqli_stmt_execute($res_prep);
  mysqli_stmt_store_result($res_prep);
  if (mysqli_stmt_num_rows($res_prep) >= 1){
    return TRUE;
  }
  else {
    return FALSE;
  }
}

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

function get_id_prod($prod){
  Include "data_connect.php";
  $query = "SELECT product_id FROM products WHERE name = ?";
  $res_prep = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($res_prep, "s", $prod);
  mysqli_stmt_execute($res_prep);
  mysqli_stmt_bind_result($res_prep, $data['product_id']);
  mysqli_stmt_fetch($res_prep);
  return ($data['product_id']);
}

if ($_POST['add'] == "Ajouter" && $_POST['name_prod'] &&
  $_POST['name_cate'] && $_POST['prod_price'] && $_POST['path'] && preg_match('/(.png)|(.jpg)|(.gif)$/', $_POST['path'])){
        if (check_cat($_POST['name_cate']) == TRUE){

          $query = "INSERT INTO products(name, img, main_cat, price) VALUES(?, ?, ?, ?)";
          $res_prep = mysqli_prepare($db, $query);
          mysqli_stmt_bind_param($res_prep, "sssd", $_POST['name_prod'], $_POST['path'], $_POST['name_cate'], $_POST['prod_price']);
          mysqli_stmt_execute($res_prep);

          $id_cat = get_id_cat($_POST['name_cate']);
          $id_prod = get_id_prod($_POST['name_prod']);
          $query = "INSERT INTO product_categories(product_id, category_id) VALUES(?, ?)";
          $res_prep = mysqli_prepare($db, $query);
          mysqli_stmt_bind_param($res_prep, "ii", $id_prod, $id_cat);
          mysqli_stmt_execute($res_prep);
    }
}

if ($_POST['del'] == "Suppression"){
  $prod_id = get_id_prod($_POST['name_prod']);

  $query = "DELETE FROM products WHERE name = ?";
  $res_prep = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($res_prep, "s", $_POST['name_prod']);
  mysqli_stmt_execute($res_prep);

  $query = "DELETE FROM product_categories WHERE product_id = ?";
  $res_prep = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($res_prep, "i", $prod_id);
  mysqli_stmt_execute($res_prep);
}

header("Location: admin.php");
?>
