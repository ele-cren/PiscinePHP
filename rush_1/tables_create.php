<?php

$query = "CREATE TABLE IF NOT EXISTS members(
          id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
          login VARCHAR(12) NOT NULL,
          pass VARCHAR(255) NOT NULL,
          admin BOOLEAN NOT NULL)";
$result = mysqli_query($db, $query);

$query = "CREATE TABLE IF NOT EXISTS products(
          product_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
          name VARCHAR(255) NOT NULL,
          img VARCHAR(255) NOT NULL,
          main_cat VARCHAR(255) NOT NULL,
          price FLOAT NOT NULL)";
$result = mysqli_query($db, $query);

$query = "INSERT INTO products(name, img, main_cat, price) VALUES
                      ('Dragibus', 'img/haribo1.png', 'Bonbons', 1.5),
                      ('Schtroumpf', 'img/haribo2.png', 'Bonbons', 2.5),
                      ('Lutti', 'img/lutti1.png', 'Bonbons', 0.99),
                      ('Maltesers', 'img/malt1.png', 'Gateaux', 4.99),
                      ('Alien', 'img/mask1.png', 'Costumes', 35),
                      ('Joker', 'img/mask2.png', 'Costumes', 54.99),
                      ('Clown', 'img/mask3.png', 'Costumes', 24.99),
                      ('m&ms', 'img/mms1.png', 'Gateaux', 6),
                      ('Sucettes', 'img/sucettes1.png', 'Bonbons', 2.20),
                      ('Twix', 'img/twix1.png', 'Gateaux', 4.20),
                      ('Bounty', 'img/bounty1.png', 'Gateaux', 2.99)";
$result = mysqli_query($db, $query);

$query = "CREATE TABLE IF NOT EXISTS categories(
          category_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
          name VARCHAR(255) NOT NULL)";
$result = mysqli_query($db, $query);

$query = "INSERT INTO categories(name) VALUES('Bonbons'), ('Gateaux'), ('Costumes')";
$result = mysqli_query($db, $query);

$query = "CREATE TABLE IF NOT EXISTS product_categories(
          product_id INT NOT NULL,
          category_id INT NOT NULL)";
$result = mysqli_query($db, $query);

$query = "INSERT INTO product_categories(product_id, category_id) VALUES
                      (1,1),
                      (2, 1),
                      (3, 1),
                      (4, 1),
                      (4, 2),
                      (5, 3),
                      (6, 3),
                      (7, 3),
                      (8, 1),
                      (8, 2),
                      (9, 1),
                      (10, 2),
                      (11, 2)";
$result = mysqli_query($db, $query);

$query = "CREATE TABLE IF NOT EXISTS orders(
          order_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          user VARCHAR(255) NOT NULL,
          quant INT NOT NULL,
          price FLOAT NOT NULL)";

$result = mysqli_query($db, $query);

?>
