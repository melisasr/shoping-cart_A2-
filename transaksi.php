<?php
session_start();
require_once 'koneksi.php';
if(!isset($_SESSION['cart'])){
    header('Location :index.php');
}
$cart=unserialize(serialize($_SESSION['cart']));
$total_item=0;
$total_bayar=0;
 for ($i=0; $i<count($cart); $i++){
     $total_item += $cart[$i]['pembelian'];
     $total_bayar += $cart[$i]['pembelian']*$cart[$i]['harga'];
 }
 $query = mysqli_query($conn,"INSERT INTO tb_order (total_item, total_bayar, tgl_traksaksi) VALUES('$total_item','$total_bayar','".date('Y-m-d')."')");
 $id_order=mysqli_insert_id($conn);
 for($i=0; $i<count($cart); $i++){
     $id_produk=$scart[$i]['id_produk'];
     $pembelian=$cart[$i]['pemebelian'];
     $query=mysqli_query($conn,"INSERT INTO tb_detail_order(id_order_id_produk,pembeilan) VALUES('$id_order','$id_produk','$pembelian')");
 }
 unset($_SESSION['cart']);
 $_SESSION['pesan']="Pembelian sedang diproses, terimakasih.";
 header('Location: index.php');