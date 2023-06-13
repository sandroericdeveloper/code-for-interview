<?php
require 'vendor/autoload.php';

$dataRepo = new \App\DataRepository();
$customer = new \App\Models\Customer('Customer A');
$orderItems = [
    new \App\Models\OrderItem($dataRepo->findProductTypes()[0], 5),
    new \App\Models\OrderItem($dataRepo->findProductTypes()[1], 12),
];
$order = new \App\Models\Order($customer, $orderItems);

$quoteGenerator = new \App\QuoteGenerator($dataRepo, $order);
$quoteGenerator->generateQuotes();
var_dump($quoteGenerator->getCheapestQuote()->getTotalPrice());

$orderItems = [
    new \App\Models\OrderItem($dataRepo->findProductTypes()[1], 105),
];
$order = new \App\Models\Order($customer, $orderItems);

$quoteGenerator = new \App\QuoteGenerator($dataRepo, $order);
$quoteGenerator->generateQuotes();
var_dump($quoteGenerator->getCheapestQuote()->getTotalPrice());