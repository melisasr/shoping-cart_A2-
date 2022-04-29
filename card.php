<?php
if (isset($_POST['id_produk'], $_POST['pembelian'])){
    $id =$_POST['id_produk'];
    $pembelian=$_POST['pembelian'];
    $produk=mysqli_query($conn, "SELECT * FORM tb_produk Where id= '$id ");
    $dt_produk=$produk->fetch_assoc();
    if(!isset($_SESSION['cart']))$_SESSION['cart']=[];
    $index=-1;
    $cart=userialize(serialize($_SESSION['cart']));
    for ($i=0<count($cart);$i++){
        if($cart[$i]['id_produk']==$id){
        $index=$i;
        $_SESSION['cart'][$i]['pembelian']=$pembelian;
        break;
        }
    }
   if($index==-1){
       $_SESSION['cart'][]=['id-produk' => $id, 'nama_produk'=> $dt_produk['nama_Produk'],'harga'=> $dt_produk['harga'],'pembelian'=>$pembelian];
   } 
}
if(!empty($_SESSION['cart'])){
    ?>
    <h4>Daftar Belanja Anda</h4>
    <br>
    <table class="table table-bordered">
        <tr align="center">
            <th>#</th>
            <th>Nama Produk</th>
            <th>Pembelian</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Aksi</th>
</tr>
<?php
if(isset($_SESSION['cart'])){
    $cart=unserialize(serialize($_SESSION['cart']));
    $index=0;
    $no=1;
    $total=0;
    $total_bayar;
    for($i=0; $i<count($cart); $i++){
        $total=$_SESSION['cart'][$i]['harga']*$_SESSION['cart'][$i]['pembelian'];
        $total_bayar+=$total;
        ?>
        <tr>
            <td align="center"><?= $no++; ?></td>
            <td><?=$cart[$i]['nama_produk']; ?></td>
            <td align="center"><?=$cart[$i]['pembelian'];?></td>
            <td><?=$cart[$i]['harga']; ?></td>
            <td><?=$total;?></td>
            <td align="center">
                <a herf="?index=<?=$index; ?>">
                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
    </a>
    </td>
    </tr>
    <?php
    $index++;
    }
    if(isset($_GET['index'])){
        $cart=unserialize(serialize($_SESSION['cart']));
        unset($cart[$_GET['index']]);
        $cart=array_values($cart);
        $_SESSION['cart']=$cart;
    }
}
?>
<tr>
    <td colspan="4" align="right"><strong>Total Bayar</strong></td>
    <td><trong><?=$total_bayar; ?></strong></td>
    <td align="center">
        <a href="transaksi.php">
            <button class="btn btn-succes btn-sm">Checkout</button>
</a>
</td>
<tr>
</table>
<hr>
<?php
}
if(isset($_GET['index'])){
    header('location:index.php');
}
?>