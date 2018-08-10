<?php

use Hcode\PageAdmin;
use Hcode\Model\Product;
use Hcode\Model\User;

$app->get("/admin/products", function(){

	User::verifyLogin();

	$products = Product::listAll();

	$page = new PageAdmin();

	$page->setTpl("products",[
		"products"=>$products
	]);
});

$app->get("/admin/products/create", function(){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("products-create");
});

$app->post("/admin/products/create", function(){

	User::verifyLogin();

	$product = new Product();

	$product->save();

	header("Location: /admin/products");
	exit;
});
?>