<?php
// add_to_cart.php
session_start();

$products = [
  1=>["name"=>"Monstera Deliciosa","price"=>45.00,"img"=>"images/plant1.avif"],
  2=>["name"=>"Snake Plant","price"=>38.00,"img"=>"images/plant2.webp"],
  3=>["name"=>"Aloe Vera","price"=>26.00,"img"=>"images/plant3.webp"],
  4=>["name"=>"Peace Lily","price"=>40.00,"img"=>"images/plant4.avif"],
  5=>["name"=>"Pothos","price"=>32.00,"img"=>"images/plant5.avif"],
  6=>["name"=>"Spider Plant","price"=>28.00,"img"=>"images/plant6.jpeg"],
  7=>["name"=>"ZZ Plant","price"=>50.00,"img"=>"images/plant7.avif"],
  8=>["name"=>"Fiddle Leaf Fig","price"=>60.00,"img"=>"images/plant8.avif"],
  9=>["name"=>"Calathea Orbifolia","price"=>42.00,"img"=>"images/plant9.webp"],
  10=>["name"=>"Rubber Plant","price"=>48.00,"img"=>"images/plant10.webp"],
  11=>["name"=>"Cactus Mini","price"=>17.00,"img"=>"images/plant11.jpg"],
  12=>["name"=>"Succulent Mix","price"=>21.00,"img"=>"images/plant12.jpg"]
];

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if(!$id || !isset($products[$id])){
    echo json_encode(['success'=>false]);
    exit;
}

if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

// check if product exists in cart (by id)
$found = false;
for($i=0;$i<count($_SESSION['cart']);$i++){
    if($_SESSION['cart'][$i]['id'] == $id){
        $_SESSION['cart'][$i]['quantity'] += 1;
        $found = true;
        break;
    }
}
if(!$found){
    $_SESSION['cart'][] = [
        'id' => $id,
        'name' => $products[$id]['name'],
        'price' => $products[$id]['price'],
        'quantity' => 1,
        'img' => $products[$id]['img']
    ];
}

echo json_encode([
    'success' => true,
    'cart_count' => count($_SESSION['cart']),
    'product_name' => $products[$id]['name']
]);
