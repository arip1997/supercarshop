-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 07:43 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8329667_supercarshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'jimmy', 'jimmy', 'jimmy audrio');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'lamongan', 1400000),
(2, 'Gresik', 1300000),
(3, 'Blitar', 2000000),
(4, 'kediri', 1500000),
(5, 'Bandung', 1000000),
(6, 'Tangerang', 1000000),
(7, 'Flores', 4000000),
(8, 'NTT', 5000000),
(9, 'Papua', 7000000),
(10, 'Irian Jaya', 6000000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'jimmyaudrio@gmail.com', 'jimmy', 'Jimmy', '0856564646', ''),
(2, 'Audrey@gmail.com', 'audrey', 'Audery', '085787868', ''),
(3, 'tono@gmail.com', 'tono', 'tonon', '087979799899', 'malang'),
(4, 'steven@gmail.com', 'steven', 'steven', '085607303622', 'jakarta'),
(5, 'agung@yahoo.com', '1999', 'agung', '0856789777', 'Kediri');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(7, 1, 'jimmy Audrio', 'mandiri', 901400000, '2018-12-20', '20181220182834bukti-pembayaran-11.jpg'),
(8, 40, 'jimmy', 'mandiri', 980000000, '2018-12-20', '20181220183135KAI Mandiri 10.jpg'),
(9, 41, 'jimmya', 'mandiri', 801300000, '2018-12-20', '20181220183352pembayaran-shopee-diatm.jpg'),
(10, 43, 'jimmyas', 'mandiri', 1452000000, '2018-12-21', '20181221024654bukti-pembayaran-11.jpg'),
(11, 44, 'satria', 'mandiri', 2147483647, '2018-12-21', '20181221034433KAI Mandiri 10.jpg'),
(12, 46, 'jimmy', 'mandiri', 2147483647, '2018-12-21', '20181221044841KAI Mandiri 10.jpg'),
(13, 42, 'bila', 'bca', 2147483647, '2019-09-23', '20190923042226bandeng.jpg'),
(14, 48, 'tono', 'bca', 92000000, '2019-10-21', '201910210552071.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` varchar(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(1, '1', 1, '2018-12-20', 901400000, 'lamongan', 1400000, 'JL.Sugio - Lamongan', 'sudah kirim pembayaran', ''),
(40, '1', 0, '2018-12-20', 980000000, '', 0, 'dsfsd', 'sudah kirim pembayaran', ''),
(41, '1', 2, '2018-12-20', 801300000, 'Gresik', 1300000, 'sfsdfsdfds', 'sudah kirim pembayaran', ''),
(42, '3', 2, '2018-12-20', 2147483647, 'Gresik', 1300000, 'bandeng lele', 'lunas', '90090909045'),
(43, '1', 3, '2018-12-21', 1452000000, 'Blitar', 2000000, 'sukarno hatta', 'barang dikirim', '1234567ACS'),
(44, '1', 4, '2018-12-21', 1821500000, 'kediri', 1500000, 'pare', 'barang dikirim', 'AJAJASJ0000'),
(45, '1', 5, '2018-12-21', 801000000, 'Bandung', 1000000, 'sundaaa', 'pending', ''),
(46, '1', 3, '2018-12-21', 2147483647, 'Blitar', 2000000, 'malang', 'barang dikirim', '9009089889'),
(47, '1', 1, '2018-12-21', 801400000, 'lamongan', 1400000, 'lele', 'pending', ''),
(48, '3', 0, '2019-09-23', 92000000, '', 0, 'asdf', 'sudah kirim pembayaran', ''),
(49, '3', 5, '2019-10-21', 36000000, 'Bandung', 1000000, 'Sunda Bandung', 'pending', ''),
(50, '3', 1, '2019-10-21', 1400000, 'lamongan', 1400000, 'ghg', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 1, 1, '', 0, 0, 0, 0),
(2, 1, 2, 1, '', 0, 0, 0, 0),
(3, 6, 12, 1, '', 0, 0, 0, 0),
(4, 7, 12, 1, '', 0, 0, 0, 0),
(5, 8, 12, 1, '', 0, 0, 0, 0),
(6, 9, 15, 1, '', 0, 0, 0, 0),
(7, 10, 12, 2, '', 0, 0, 0, 0),
(8, 11, 12, 1, '', 0, 0, 0, 0),
(9, 12, 12, 1, 'Bugatti Chiron', 14000000, 1888, 1888, 14000000),
(10, 12, 12, 1, 'Bugatti Chiron', 14000000, 1888, 1888, 14000000),
(11, 13, 14, 1, 'Lamborghini Av', 10000000, 1800, 1800, 10000000),
(12, 13, 14, 1, 'Lamborghini Av', 10000000, 1800, 1800, 10000000),
(13, 13, 14, 1, 'Lamborghini Av', 10000000, 1800, 1800, 10000000),
(14, 14, 12, 1, 'Bugatti Chiron', 14000000, 1888, 1888, 14000000),
(15, 15, 12, 1, 'Bugatti Chiron', 14000000, 1888, 1888, 14000000),
(16, 16, 18, 1, 'ferrari 458', 9000000, 1700, 1700, 9000000),
(19, 18, 12, 1, 'Bugatti Chiron', 14000000, 1888, 1888, 14000000),
(20, 19, 13, 1, 'Bugatti Veyron', 13000000, 1888, 1888, 13000000),
(21, 20, 12, 2, 'Bugatti Chiron', 14000000, 1888, 3776, 28000000),
(22, 21, 12, 1, 'Bugatti Chiron', 14000000, 1888, 1888, 14000000),
(23, 22, 12, 1, 'Bugatti Chiron', 14000000, 1888, 1888, 14000000),
(24, 25, 12, 1, 'Bugatti Chiron', 14000000, 1888, 1888, 14000000),
(25, 26, 18, 1, 'ferrari 458', 9000000, 1700, 1700, 9000000),
(26, 27, 14, 1, 'Lamborghini Av', 10000000, 1800, 1800, 10000000),
(27, 28, 13, 1, 'Bugatti Veyron', 13000000, 1888, 1888, 13000000),
(28, 29, 15, 1, 'Lamborghini Huracan', 11000000, 1700, 1700, 11000000),
(29, 30, 12, 3, 'Bugatti Chiron', 14000000, 1888, 5664, 42000000),
(30, 31, 12, 1, 'Bugatti Chiron', 14000000, 1888, 1888, 14000000),
(31, 32, 14, 1, 'Lamborghini Av', 10000000, 1800, 1800, 10000000),
(32, 33, 1, 1, 'Bugatti Chiron', 900000000, 1888, 1888, 900000000),
(33, 34, 1, 2, 'Bugatti Chiron', 900000000, 1888, 3776, 1800000000),
(34, 35, 1, 1, 'Bugatti Chiron', 900000000, 1888, 1888, 900000000),
(35, 36, 1, 2, 'Bugatti Chiron', 900000000, 1888, 3776, 1800000000),
(36, 37, 8, 2, 'Ferrari Pininfarin', 300000000, 1670, 3340, 600000000),
(37, 37, 8, 2, 'Ferrari Pininfarin', 300000000, 1670, 3340, 600000000),
(38, 38, 1, 1, 'Bugatti Chiron', 900000000, 1888, 1888, 900000000),
(39, 38, 1, 1, 'Bugatti Chiron', 900000000, 1888, 1888, 900000000),
(40, 39, 1, 1, 'Bugatti Chiron', 900000000, 1888, 1888, 900000000),
(41, 40, 2, 1, 'Bugatti Veyron', 980000000, 1888, 1888, 980000000),
(42, 41, 4, 1, 'Lamborghini Huracan', 800000000, 1700, 1700, 800000000),
(43, 42, 3, 4, 'Lamborghini Av', 950000000, 1800, 7200, 2147483647),
(44, 43, 3, 1, 'Lamborghini Av', 950000000, 1800, 1800, 950000000),
(45, 43, 3, 1, 'Lamborghini Av', 950000000, 1800, 1800, 950000000),
(46, 44, 1, 2, 'Bugatti Chiron', 910000000, 1888, 3776, 1820000000),
(47, 45, 4, 1, 'Lamborghini Huracan', 800000000, 1700, 1700, 800000000),
(48, 46, 2, 2, 'Bugatti Veyron', 980000000, 1888, 3776, 1960000000),
(49, 46, 2, 1, 'Bugatti Veyron', 980000000, 1888, 1888, 980000000),
(50, 47, 4, 1, 'Lamborghini Huracan', 800000000, 1700, 1700, 800000000),
(51, 48, 1, 2, 'Cbr250 rr 2017', 46000000, 300, 600, 92000000),
(52, 49, 14, 1, 'Vespa primio 150', 35000000, 180, 180, 35000000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(50) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` text NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`, `flag`) VALUES
(1, 'Cbr250 rr 2017', 46000000, 300, 'cbr.jpg', '                                                                                                            CBR250RR Merupakan Produk sepeda motor terbaru yang rilis pada tahun 2017 kemarin, motor ini di produksi oleh pabrikan honda. Dengan di bekali Shock Up side down membuat sepeda ini nampak begitu elegan beserta bentuk lekuk body yang dimilikinya.  \r\n<br>\r\n<br>\r\n- kondisi  : Like New          \r\n<br>\r\n- Kelengkapan : STNK dan BPKP                                                                                                                    ', 3, 0),
(2, 'ninja250 fi 2018', 54000000, 250, 'ninja.jpg', '                                    Bugatti Veyron EB 16.4 adalah mobil sport bermesin menengah yang dirancang dan dikembangkan di Jerman oleh Volkswagen Group dan diproduksi di Molsheim, Prancis, oleh Bugatti. Itu dinamai pembalap Pierre Veyron\r\n       \r\n<br>\r\n<br>\r\n- Kondisi : Like New \r\n<br>\r\n-  Kelengkapan : STNK & BPKP   ', 2, 0),
(3, 'Husqvarna Te 2017', 90000000, 100, 'husqvarna.jpg', '            Husqvarna Te 250 merupakan sepeda motor pabrikan dari husqvarna yaitu spesialis sepeda trail atau offroad yang  sudah menyebar di seluruh dunia, dengan di bekali usd yang mampu membuat tekanan lebih empuk \r\n<br>\r\n<br>\r\n- Kondisi : 24 Jam\r\n<br>\r\n- Kelengkapan : STNK Faktur        ', 5, 0),
(4, 'Yamaha R25', 38000000, 160, 'r25.jpg', '                       ', 3, 0),
(5, 'Mt 250', 40000000, 170, 'mt25.jpg', '            Ferrari 458 Italia adalah mobil sport bermesin menengah yang diproduksi oleh pabrikan mobil sport Italia Ferrari. The 458 menggantikan Ferrari F430, dan pertama kali secara resmi diperkenalkan pada 2009 Frankfurt Motor Show. Ini digantikan oleh Ferrari 488, yang diresmikan di Geneva Motor Show 2015.\r\n        ', 5, 0),
(7, 'ninja 250fi 2014', 42000000, 170, 'ninfi.jpg', '                        ', 5, 0),
(8, 'Z 250 2017', 36000000, 167, '3984093598.jpg', '                                       \r\n                                ', 5, 0),
(10, 'Klx bf se 2018', 35000000, 100, 'klx.jpg', '                    ', 0, 0),
(12, 'Gumpert Apollo64', 700000000, 180, '151547060030108613347.jpg', '                        The Gumpert Apollo adalah mobil sport yang diproduksi oleh pabrikan otomotif Jerman, Gumpert Sportwagenmanufaktur GmbH di Altenburg. Gumpert mengajukan kebangkrutan pada bulan Agustus 2013, sehingga memuncak produksi Apollo dan calon penerusnya\r\n                ', 0, 0),
(13, 'Dtracker 150', 30000000, 175, 'dt.jpg', '                                                          Dtracker 150 merupakan sepeda motor keluaran kawasaki yang rilis pada tahun 2017 lalau, sepeda dengan nasic trail onroad ini sangat nyaman saat di gunakan dalam perjalanan dan menempuh jarak jauh karena memiliki bentuk stanng fatbar yang memudahkan para penggunanya agar tidak terlalu kecapekan\r\n\r\n<br>\r\n<br>\r\n- Kondisi : Like New\r\n<br>\r\n- Kelengkapan : STNK & BPKP\r\n                       ', 5, 0),
(14, 'Vespa primio 150', 35000000, 180, 'vespa.jpg', 'Sepeda ini merupakan pabrikan vespa dimana perusahaan ini sudah terkenal lama dalam dunia otomotif, baru-baru ini vespa mengeluarkan produk terbaru  dengan desain sangat menawan\r\n<br>\r\n<br>\r\n- kondisi : Like New\r\n- Kelengkapan : STNK & BPKP', -1, 0),
(15, 'Klx 250 2018', 45000000, 170, 'klx250.jpg', 'Klx 250 Merupakan sepeda motor pabrikan jepang yang sekarang mulai di minati para offroader di indonesia, karena sepeda ini sudah menggunaka mesin 250cc yang sangat mendukung kecepeatan dan akselerasi di medan lumpur yang akan di hadapi.\r\n<br>\r\n<br>\r\n- Kondisi : Like new\r\n<br>\r\n- Kelengkapan : STNK & BPKP', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
