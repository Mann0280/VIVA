<?php
require 'admin/includes/db.php'; 
$cats = $pdo->query('SELECT id, name, parent_id FROM categories WHERE status="active"')->fetchAll();
$prods = $pdo->query('SELECT id, name, category_id, featured_image FROM products WHERE status="active"')->fetchAll();
file_put_contents('temp.txt', print_r(['cats' => $cats, 'prods' => $prods], true));
