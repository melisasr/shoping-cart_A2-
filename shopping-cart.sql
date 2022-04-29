CREATE TABLE `tb_detail_order`(
`id_detail` int (11) NOT NULL PRIMARY KEY AUTO _INCREMENT,
`id_order` int(11) NOT NULL,
`d_produk` int(11) NOT NULL,
`Pembelian` int(11) NOT NULL
);
CREATE TABLE `tb_order` (
`id_order` int (10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
`total_item` int(11) NOT NULL,
`total_bayar` float NOT NULL,
`tgl_transaksi` date NOT NULL
) ;
CREATE TABLE `tb_produk` (
    `id` int (10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nama_produk` varchar (50) NOT NULL,
    `harga` float NOT NULL,
    `stok` int (11) NOT NULL
);
INSERT INTO `tb_produk` (`id`, `nama_produk`,`harga`,`stok`) VALUES
(1, `Sony1`, 100000, 2),
(2, `Apple`, 200000, 3),
(3,`Samsung1`, 300000,4),
(4, `Apple2`0, 40000, 5);


