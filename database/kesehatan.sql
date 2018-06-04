-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 11:23 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kesehatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cetak_riwayat`
--

CREATE TABLE `cetak_riwayat` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cetak_riwayat`
--

INSERT INTO `cetak_riwayat` (`id`, `id_pengguna`, `tanggal_dibuat`) VALUES
(2, 6, '2018-05-28 04:40:58'),
(3, 6, '2018-05-28 04:43:09'),
(4, 6, '2018-05-28 04:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `jk_dokter` varchar(250) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(250) NOT NULL,
  `tgl_join` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `email`, `jk_dokter`, `tgl_lahir`, `no_telp`, `tgl_join`) VALUES
(1, 'Nika Ghea', 'nika21@gmail.com', 'F', '1985-10-06', '089990811303', '2018-03-17 14:16:46'),
(2, 'Yuan Miko', 'mikoyuan@gmail.com', 'M', '1983-01-01', '081211160908', '2018-03-17 14:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_login`
--

CREATE TABLE `jadwal_login` (
  `id_history_login` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_login`
--

INSERT INTO `jadwal_login` (`id_history_login`, `id_user`, `tgl_login`) VALUES
(1, 16, '2018-05-09 05:29:00'),
(2, 16, '2018-05-27 01:21:00'),
(3, 16, '2018-05-28 04:25:00'),
(4, 16, '2018-05-28 17:43:00'),
(5, 16, '2018-05-29 21:19:00'),
(6, 16, '2018-06-01 01:29:00'),
(7, 16, '2018-06-04 15:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `konsul_dokter`
--

CREATE TABLE `konsul_dokter` (
  `id_konsul` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `pertanyaan_konsul` text NOT NULL,
  `status_pertanyaan` enum('true','false') NOT NULL,
  `jawaban_konsul` text NOT NULL,
  `status_kirim` enum('true','false') NOT NULL,
  `status_baca` enum('true','false') NOT NULL,
  `tgl_konsul` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_kirim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsul_dokter`
--

INSERT INTO `konsul_dokter` (`id_konsul`, `id_user`, `id_dokter`, `pertanyaan_konsul`, `status_pertanyaan`, `jawaban_konsul`, `status_kirim`, `status_baca`, `tgl_konsul`, `tgl_kirim`) VALUES
(1, 6, 2, 'saya suka sakit perut pagi hari setelah sarapan kenapa ya?', 'true', 'itu karena kamu lelah, makanya banyak istirahat ya.', 'true', 'true', '2018-04-10 03:16:37', '2018-04-11 06:33:56'),
(2, 6, 1, 'yaa', 'true', 'iya', 'true', 'true', '2018-04-05 00:11:15', '2018-04-06 08:13:35'),
(3, 6, 1, 'aku pusing dok', 'true', 'haduh haduh sabar ya', 'true', 'true', '2018-04-08 12:06:21', '2018-04-09 11:38:14'),
(4, 6, 2, 'siap\r\n', 'true', 'sepuluh empat satu', 'true', 'true', '2018-04-10 23:07:53', '2018-04-11 10:38:14'),
(5, 6, 2, 'dok, saya mau bertanya. saya sering merasa kelelahan saat melakukan aktivitas ringan seperti naik tangga ataupun berlari. rasa lelah sering diikuti oleh pusing di kepala, pucat di tangan dan wajah, pandangan terasa putih dan sempoyongan dan muncul ke', 'true', 'Selamat pagi Sandra, terima kasih telah bertanya di Alodokter. Pusing hingga pingsan, bisa disebabkan oleh berbagai macam hal, diantaranya adalah tekanan darah terlalu rendah, tekanan darah terlalu tinggi, kadar kolesterol tinggi, kondisi kekurangan darah dan kelainan jantung.\r\n\r\nSaran kami, karena Anda juga mengeluhkan adanya gangguan berupa mual dan sesak pada dada, sebaiknya Anda periksakan kembali kondisi Anda ke dokter spesialis penyakit dalam dan minta untuk dilakukan rekam jantung atau pemeriksaan EKG untuk menyingkirkan kelainan pada jantung Anda. Selain itu perlu diperhatikan mengenai pola makan, berat badan dan riwayat keluarga Anda, karena tidak umum pada seseorang berusia 23 tahun untuk memiliki tekanan darah lebih dari 130.\r\n\r\nSementara itu saran kami hindari asap rokok dan stress, jaga berat badan ideal, rutin berolahraga dan istirahat yang cukup, dan tidak memaksakan diri untuk beraktifitas berat. Semoga Anda dan keluarga sehat selalu.\r\n\r\nSekian, semoga membantu.\r\n\r\ndr. Amadeo D. Basfiansa', 'true', 'true', '2018-04-11 04:42:39', '2018-04-11 12:44:05'),
(6, 6, 2, 'Hallo dokter. Saya sandra 23 tahun. Saya mau cerita sedikit dok. Saya sering pusing dok, kadang kadang sampe pingsan. Trus disertai mual, sesek dibagian dada, itu kepala saya terasa berat dok trus badan saya gemeteran. Saya cek keklinik tensi saya 130 lebih . Saya bingung kenapa saya sering merasakan itu ya dok? Seminggu sampe sekitar 3 kali dok.', 'true', 'Selamat pagi Sandra, terima kasih telah bertanya di Alodokter. Pusing hingga pingsan, bisa disebabkan oleh berbagai macam hal, diantaranya adalah tekanan darah terlalu rendah, tekanan darah terlalu tinggi, kadar kolesterol tinggi, kondisi kekurangan darah dan kelainan jantung.\r\n\r\nSaran kami, karena Anda juga mengeluhkan adanya gangguan berupa mual dan sesak pada dada, sebaiknya Anda periksakan kembali kondisi Anda ke dokter spesialis penyakit dalam dan minta untuk dilakukan rekam jantung atau pemeriksaan EKG untuk menyingkirkan kelainan pada jantung Anda. Selain itu perlu diperhatikan mengenai pola makan, berat badan dan riwayat keluarga Anda, karena tidak umum pada seseorang berusia 23 tahun untuk memiliki tekanan darah lebih dari 130.\r\n\r\nSementara itu saran kami hindari asap rokok dan stress, jaga berat badan ideal, rutin berolahraga dan istirahat yang cukup, dan tidak memaksakan diri untuk beraktifitas berat. Semoga Anda dan keluarga sehat selalu.\r\n\r\nSekian, semoga membantu.\r\n\r\ndr. Yuan', 'true', 'true', '2018-04-11 05:49:44', '2018-04-11 07:50:33'),
(7, 6, 1, 'Dok aku sakit perut obatnya apa ya?', 'true', 'kurang minum', 'true', 'true', '2018-04-26 07:21:36', '2018-04-26 09:44:54'),
(8, 6, 2, 'Hallo dokter. Saya sandra 23 tahun. Saya mau cerita sedikit dok. Saya sering pusing dok, kadang kadang sampe pingsan. Trus disertai mual, sesek dibagian dada, itu kepala saya terasa berat dok trus badan saya gemeteran. Saya cek keklinik', 'true', 'Selamat pagi Sandra, terima kasih telah bertanya di Alodokter. Pusing hingga pingsan, bisa disebabkan oleh berbagai macam hal, diantaranya adalah tekanan darah terlalu rendah, tekanan darah terlalu tinggi, kadar kolesterol tinggi, kondisi kekurangan darah dan kelainan jantung.\r\n\r\nSaran kami, karena Anda juga mengeluhkan adanya gangguan berupa mual dan sesak pada dada, sebaiknya Anda periksakan kembali kondisi Anda ke dokter spesialis penyakit dalam dan minta untuk dilakukan rekam jantung atau pemeriksaan EKG untuk menyingkirkan kelainan pada jantung Anda. Selain itu perlu diperhatikan mengenai pola makan, berat badan dan riwayat keluarga Anda, karena tidak umum pada seseorang berusia 23 tahun untuk memiliki tekanan darah lebih dari 130.\r\n\r\nSementara itu saran kami hindari asap rokok dan stress, jaga berat badan ideal, rutin berolahraga dan istirahat yang cukup, dan tidak memaksakan diri untuk beraktifitas berat. Semoga Anda dan keluarga sehat selalu.\r\n\r\nSekian, semoga membantu.\r\n\r\ndr. Yuan', 'true', 'true', '2018-04-26 07:32:14', '2018-04-26 09:44:59'),
(11, 6, 2, 'dok saya suka mual dan pusing ketika puasa itu kenapa ya?', 'true', 'mungkin itu dikarenakan anda memiliki penyakit magh, bisa jadi ketika anda puasa asam lambung menjadi naik.', 'true', 'true', '2018-05-28 01:47:38', '2018-05-28 03:49:13'),
(12, 6, 1, 'gea', 'true', 'iya apa?', 'true', 'true', '2018-05-28 09:12:50', '2018-05-28 13:29:11'),
(15, 6, 1, 'hallo dokter ghea?', 'false', '', 'true', 'true', '2018-06-01 06:25:17', '0000-00-00 00:00:00'),
(16, 6, 2, 'miko?', 'false', '', 'true', 'true', '2018-06-01 06:25:35', '0000-00-00 00:00:00'),
(17, 6, 2, 'hallo dokter miko?', 'true', '', 'true', 'true', '2018-06-01 06:26:50', '0000-00-00 00:00:00'),
(18, 6, 2, 'hallo dokter miko?', 'false', '', 'true', 'true', '2018-06-01 06:27:18', '0000-00-00 00:00:00'),
(19, 6, 2, 'hallo miko?', 'true', 'iya?', 'true', 'true', '2018-06-01 06:27:25', '0000-00-00 00:00:00'),
(20, 6, 2, 'miko 123?', 'true', 'oioi ap?', 'false', 'false', '2018-06-01 07:02:30', '0000-00-00 00:00:00'),
(21, 6, 1, 'dok mau tanya dong? saya sakit kaki udh 3 hari ni kenapa ya?\r\n', 'true', 'coba istirahatin jangan lari lari ya', 'true', 'true', '2018-06-01 07:03:50', '2018-06-01 09:17:40'),
(22, 17, 1, 'dr ghea nami mau tanya nih?', 'true', 'iya silahkan nami', 'true', 'true', '2018-06-04 20:24:35', '2018-06-04 22:28:52'),
(23, 17, 1, 'nik', 'false', '', 'false', 'false', '2018-06-04 20:25:52', '0000-00-00 00:00:00'),
(24, 17, 1, 'nik', 'false', '', 'false', 'false', '2018-06-04 20:27:50', '0000-00-00 00:00:00'),
(25, 17, 2, 'hai miko?', 'false', '', 'false', 'false', '2018-06-04 21:06:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id`, `id_pengguna`, `id_penyakit`, `tanggal_dibuat`) VALUES
(1, 6, 1, '2018-05-22 03:50:36'),
(2, 6, 2, '2018-05-22 04:10:37'),
(3, 6, 2, '2018-05-22 04:44:10'),
(4, 6, 2, '2018-05-22 04:46:15'),
(5, 6, 2, '2018-05-22 04:50:37'),
(6, 6, 1, '2018-05-27 05:37:15'),
(7, 6, 2, '2018-05-27 05:38:47'),
(8, 6, 1, '2018-05-27 05:39:20'),
(9, 6, 1, '2018-05-27 06:53:51'),
(10, 6, 4, '2018-05-28 01:51:23'),
(12, 6, 1, '2018-05-28 02:59:21'),
(13, 6, 3, '2018-05-28 03:01:18'),
(14, 6, 1, '2018-05-28 03:01:36'),
(15, 6, 3, '2018-05-28 03:02:39'),
(16, 6, 1, '2018-05-28 03:04:23'),
(17, 6, 3, '2018-05-28 03:05:41'),
(18, 6, 1, '2018-05-28 03:12:42'),
(19, 6, 1, '2018-05-28 03:13:32'),
(20, 6, 1, '2018-05-28 03:16:30'),
(21, 6, 3, '2018-05-28 03:18:48'),
(22, 6, 1, '2018-05-28 03:29:59'),
(23, 6, 1, '2018-05-28 04:20:56'),
(24, 6, 1, '2018-05-28 04:23:33'),
(25, 6, 3, '2018-05-28 04:25:01'),
(26, 6, 1, '2018-05-28 04:29:18'),
(27, 6, 3, '2018-05-28 04:31:08'),
(28, 6, 1, '2018-05-28 04:38:41'),
(29, 6, 1, '2018-05-28 04:40:07'),
(30, 6, 1, '2018-05-28 04:40:47'),
(31, 6, 1, '2018-05-28 04:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `sickness`
--

CREATE TABLE `sickness` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `diagnosis` text NOT NULL,
  `solutions` text NOT NULL,
  `food_recommendations` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sickness`
--

INSERT INTO `sickness` (`id`, `name`, `diagnosis`, `solutions`, `food_recommendations`) VALUES
(1, 'Muntaber', 'Ini adalah diagnosis muntaber', '1.	Sebaiknya konsumsi air kelapa karena sangat baik dan bermanfaat bagi penderita kekurangan cairan, air kelapa mengandung banyak mineral dan kalium. Air kelapa diminum sebanyak mungkin jika tidak ada oralit. Kalium dan natrium dibutuhkan unutuk penderita kekurangan cairan dan mineral\r\n2.	Makan-makanan yang bergizi dan tidak makan sembarangan\r\n3.	Mengurangi makan makanan yang beraroma tajam serta menyengat untuk mencegah terjadinya muntah \r\n4.	Minum air cukup sehingga mencegah dehidrasi\r\n5.	Apabila makin parah dengan menunjukkan dua tanda-tanda atau lebih tanda-tanda muntaber atau berak lembek disertai darah atau diare yang terjadi lebih dari satu minggu, bawalah ke rumah sakit terdekat\r\n', '1.	Berikan makanan-makanan lunak seperti bubur, nasi tim dan pisang \r\n2.	Berikan minuman seperti air kelapa, air tajin, air buah atau LGG yang memberikan banyak cairan\r\n3.	Dianjurkan konsumsi yoghurt, apel, sereal dan kentang rebus\r\n4.	Berikan oralit 200 cc, caranya adalah dengan 3 jam pertama 12 gelas, selanjutnya 2 gelas setiap kali mencret \r\n5.	Jangan lupa untuk selalu banyak minum air putih \r\n'),
(2, 'Mual dan muntah', 'Mual dan muntah biasanya merupakan gejala yang bisa disebabkan oleh banyak hal. Mual jarang sekali menjadi pertanda penyakit yang serius atau bahkan mengancam nyawa seseorang. Kondisi ini adalah cara tubuh untuk membuang materi yang mungkin berbahaya dari dalam tubuh.\r\nMual juga merupakan efek samping dari berbagai macam obat-obatan, termasuk kemoterapi. Selain itu, terjadinya iritasi atau peradangan di dalam perut juga bisa menyebabkan mual dan muntah.\r\nBerikut ini adalah beberapa kondisi lain yang umumnya menyebabkan rasa mual:\r\n-Radang usus buntu atau apendisitis.\r\n-Mual pada awal kehamilan atau morning sickness.\r\n-Mabuk laut atau mabuk perjalanan.\r\n-Vertigo.\r\n-Penyakit asam lambung.\r\n', '-Usahakan tetap mengonsumsi cairan meskipun sedikit, agar terhindar dari dehidrasi.\r\n-Hindari mencium bau yang menyengat atau tidak sedap.\r\n-Bagi wanita hamil yang mengalami mual awal kehamilan bisa menjauhi bau makanan atau pemicu-pemicu lain yang menyebabkannya rasa mual makin menjadi-jadi.\r\n-Menghentikan obat yang dikonsumsi melalui mulut. Tapi, tanyakan kepada dokter sebelum menghentikan konsumsi obat-obatan Anda.\r\n-Makan secara perlahan-lahan dan jangan langsung berbaring setelah makan.', '-Disarankan untuk mengonsumsi minuman manis untuk menggantikan kandungan gula yang hilang.\r\n-Makanan yang mengandung garam juga dianjurkan untuk dikonsumsi, supaya dapat mengganti kandungan garam tubuh.\r\n-Konsumsilah makanan lunak dan mudah dicerna.\r\n-Minum larutan penambah cairan tubuh atau oralit untuk menghindari dehidrasi.\r\n-Minum atau makanlah jahe yang bisa secara efektif menangani mual.'),
(3, 'Diare', 'ini adalah diagnosis diare', '1.	Jika diare berlangsung lebih dari beberapa minggu bahkan melebihi dari 4 minggu dikatakan diare kronis segeralah periksa kan ke dokter\r\n2.	Hindari produk susu dan makanan yang kaya magnesium, kafein, the\r\n3.	Batasi makanan manis\r\n4.	Sebaiknya wadah air minum tidak tercemar air mentah dari dapur atau pencemar lainnya\r\n5.	Rajin-rajinlah mencuci tangan pake sabun setelah ke toilet\r\n6.	Basuhlah tangan sebelum makan atau memegang makanan\r\n7.	Tidak jajan minuman sembarangan\r\n8.	Selalu konsumsi makanan dan minuman sodium, potassium dan serat', '1.	Minum jus buah tanpa gula tambahan\r\n2.	Konsumsi makanan kaya akan potassium, seperti pisang dan kentang\r\n3.	Konsumsi makanan dan minuman kaya akan sodium, seperti air kaldu, sup, minuman energy dan biscuit asin\r\n4.	Konsumsi makanan akan serat seperti pisang, oatmeal, nasi\r\n5.	Konsumsi yoghurt, daging ayan tanpa kulit dan lemak\r\n6.	Selalu banyak untuk minum air putih'),
(4, 'Ketegangan otot', 'Ketegangan otot perut (spasme abdomen) kerap menjadi penyebab umum terjadinya kram perut. Seseorang yang gemar berolahraga dalam intensitas tinggi, terutama bodybuilding, biasanya lebih sering mengalami kondisi seperti ini.', '', ''),
(5, 'Demam Berdarah Dengue ', 'Ini adalah diagnosis DBD', '1.	Dihindari untuk mengkonsumsi teh, kopi, coklat atau yang berwarna coklat/merah\r\n2.	Dicatat untuk kapan saja ketika kencing dan minum \r\n3.	Dianjurkan untuk banyak makan dan banyak minum air putih\r\n4.	Kalau demam diatas 38derajat berikan parasetamol\r\n5.	Jagalah kebersihan sanitasi lingkungan disekitar rumah, jangan biarkan genangan air yang mungkin menjadi tempat berkembangbiak nyamuk\r\n6.	Sebaiknya bawa ke dokter dan pemeriksaan darah terutama hemaktorit dan trombosit', '1.	Minum air putih yang banyak dan banyak makan\r\n2.	Sebaiknya minum jus jambu yang sangat kaya vitamin C, vitamin B\r\n3.	Kalau bisa harus perlu diinfus agar darah tetap encer\r\n4.	Konsumsi makanan seperti daun papaya, air jahe, air kelapa, bubur, jeruk\r\n5.	Kosumsi buah-buahan seperti semangka, jambu biji, kiwi papaya');

-- --------------------------------------------------------

--
-- Table structure for table `step_checkup`
--

CREATE TABLE `step_checkup` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `symptom_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` enum('true','false') DEFAULT NULL,
  `sickness_true` int(11) DEFAULT NULL,
  `sickness_false` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `step_checkup`
--

INSERT INTO `step_checkup` (`id`, `question`, `symptom_id`, `parent_id`, `status`, `sickness_true`, `sickness_false`) VALUES
(1, 'Apakah anda mengalami diare?', 1, NULL, NULL, 1, NULL),
(2, 'Apakah anda merasakan demam dan selalu mengalami perdarahan spontan?', NULL, 1, 'false', 5, 2),
(3, 'Apakah berak terlihat encer dan berulang secara terus menerus?', 2, NULL, NULL, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `id` int(11) NOT NULL,
  `symptom` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`id`, `symptom`) VALUES
(1, 'Mual dan muntah'),
(2, 'Sakit perut atau keram perut');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_user` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `jk_user` varchar(250) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `password` varchar(250) NOT NULL,
  `level_user` varchar(150) NOT NULL,
  `remember` varchar(100) NOT NULL,
  `cookie` varchar(100) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `tgl_registrasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_user`, `email`, `jk_user`, `tgl_lahir`, `password`, `level_user`, `remember`, `cookie`, `foto`, `tgl_registrasi`) VALUES
(6, 'hana', 'Hana Ervani F', 'hanaervani@gmail.com', 'female', '1997-10-26', '5e477ff86c321e4cdcf98b0f139dae5f', 'user', '0', '', '/uploads/profile_picture/Hana_Ervani_Fprofile_picture_20180311071255.jpg', '2018-05-28 02:59:14'),
(16, 'admin', 'Admin Gaul', 'admin@gmail.com', 'female', '1970-01-01', '71637b92d28d25a5774135d8740f9bc6', 'admin', '0', '', '/uploads/profile_picture/Admin_Gaulprofile_picture_20180307053510.jpg', '2018-05-28 04:21:29'),
(17, 'namican', 'nami can', 'nami@gmail.com', 'female', '1997-12-01', '5b9f2c8a67d36c9b5178e66ba0777804', 'user', '0', '', '', '2018-06-04 20:53:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cetak_riwayat`
--
ALTER TABLE `cetak_riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `jadwal_login`
--
ALTER TABLE `jadwal_login`
  ADD PRIMARY KEY (`id_history_login`),
  ADD KEY `user_id` (`id_user`);

--
-- Indexes for table `konsul_dokter`
--
ALTER TABLE `konsul_dokter`
  ADD PRIMARY KEY (`id_konsul`),
  ADD KEY `doctor_id` (`id_dokter`),
  ADD KEY `user_id` (`id_user`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `sickness`
--
ALTER TABLE `sickness`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `step_checkup`
--
ALTER TABLE `step_checkup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `symptoms_id` (`symptom_id`),
  ADD KEY `sickness_true` (`sickness_true`),
  ADD KEY `sickness_false` (`sickness_false`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cetak_riwayat`
--
ALTER TABLE `cetak_riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_login`
--
ALTER TABLE `jadwal_login`
  MODIFY `id_history_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konsul_dokter`
--
ALTER TABLE `konsul_dokter`
  MODIFY `id_konsul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sickness`
--
ALTER TABLE `sickness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `step_checkup`
--
ALTER TABLE `step_checkup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_login`
--
ALTER TABLE `jadwal_login`
  ADD CONSTRAINT `jadwal_login_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `konsul_dokter`
--
ALTER TABLE `konsul_dokter`
  ADD CONSTRAINT `konsul_dokter_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `konsul_dokter_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `periksa_ibfk_2` FOREIGN KEY (`id_penyakit`) REFERENCES `sickness` (`id`);

--
-- Constraints for table `step_checkup`
--
ALTER TABLE `step_checkup`
  ADD CONSTRAINT `step_checkup_ibfk_2` FOREIGN KEY (`symptom_id`) REFERENCES `symptoms` (`id`),
  ADD CONSTRAINT `step_checkup_ibfk_3` FOREIGN KEY (`sickness_true`) REFERENCES `sickness` (`id`),
  ADD CONSTRAINT `step_checkup_ibfk_4` FOREIGN KEY (`sickness_false`) REFERENCES `sickness` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
