-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2018 at 11:42 AM
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
  `id_user` int(11) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `gejala` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `gejala`) VALUES
(1, 'Batuk'),
(2, 'Demam'),
(3, 'Nyeri dada\r\n'),
(4, 'Gangguan tenggorokan \r\n'),
(5, 'Mual atau muntah\r\n'),
(6, 'Pilek dan flu\r\n'),
(7, 'Sesak nafas\r\n'),
(8, 'Sakit kepala\r\n'),
(9, 'Berkeringat pada malam hari\r\n'),
(10, 'Sakit kepala saat bangun \r\n'),
(11, 'Nyeri otot\r\n'),
(12, 'Migran\r\n'),
(13, 'Sakit perut\r\n'),
(14, 'Pandangan kabur\r\n'),
(15, 'Kehilangan nafsu makan\r\n'),
(16, 'Kelemahan dan kelelahan\r\n'),
(17, 'Vertigo\r\n'),
(18, 'Menggigil\r\n'),
(19, 'Berkeringat dingin\r\n'),
(20, 'Dehidrasi\r\n'),
(21, 'Kulit terasa panas\r\n'),
(22, 'Diare\r\n'),
(23, 'Buang air besar encer dan sering\r\n'),
(24, 'Mulut kering\r\n'),
(25, 'Buang air kecil jarang \r\n'),
(26, 'Buang air besar meningkat\r\n'),
(27, 'Lemas\r\n'),
(28, 'Mata cekung\r\n'),
(29, 'Berat badan menurun\r\n'),
(30, 'Demam tinggi\r\n'),
(31, 'Muncul ruam pada kulit\r\n'),
(32, 'Linglung\r\n'),
(34, 'Nyeri otot dan sendi\r\n'),
(35, 'Lemas kesadaran menurun\r\n'),
(36, 'Bersin\r\n'),
(37, 'Gangguan tidur\r\n'),
(38, 'Hidung tersumbat\r\n'),
(40, 'Bibir dan jari-djari biru\r\n'),
(41, 'Sulit makan dan minum\r\n'),
(42, 'Kulit terlihat pucat\r\n'),
(43, 'Reaksi alergi makanan\r\n'),
(44, 'Gigitan serangga\r\n'),
(45, 'Tangan dan kaki terasa dingin\r\n'),
(47, 'Kembung\r\n'),
(48, 'Rasa panas pada bagian perut atas\r\n'),
(49, 'Sering bersendawa\r\n'),
(50, 'Nyeri uluh hati\r\n'),
(51, 'Lekas marah dan depresi\r\n'),
(52, 'Sulit mengingat\r\n'),
(53, 'Bangun terlalu dini\r\n'),
(54, 'Bengkak di sekitar gigi\r\n'),
(55, 'Rasa dan bau busuk pada gigi\r\n'),
(56, 'Nyeri berdenyut saat menekan gigi\r\n'),
(57, 'Mata dan kulit kekuningan\r\n'),
(58, 'Feses berwarna pucat\r\n'),
(59, 'Pingsan saat beraktivitas\r\n'),
(60, 'Pembekakan pada bagian telapak dan pergelangan kaki, urat leher\r\n'),
(62, 'Buang air besar berdarah berwarna merah terang \r\n'),
(63, 'Benjolan yang sensitif di sekitar anus\r\n'),
(64, 'Gatal dan iritasi pada area rektum\r\n'),
(65, 'Nyeri anus\r\n');

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
(1, 3, '2018-07-02 09:37:24');

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
  `status_notif` varchar(10) NOT NULL DEFAULT 'pertanyaan',
  `tgl_konsul` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_kirim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsul_dokter`
--

INSERT INTO `konsul_dokter` (`id_konsul`, `id_user`, `id_dokter`, `pertanyaan_konsul`, `status_pertanyaan`, `jawaban_konsul`, `status_notif`, `tgl_konsul`, `tgl_kirim`) VALUES
(1, 2, 3, 'hallo namican', 'true', 'hallo ushop lan', 'baca', '2018-07-02 09:24:14', '0000-00-00 00:00:00'),
(2, 2, 3, 'bu nami kenapa saya sakit perut terus', 'false', '', '', '2018-07-02 09:29:36', '0000-00-00 00:00:00'),
(3, 2, 3, 'dokter nami saya mules ni', 'true', 'ohh makan apa?', 'baca', '2018-07-02 09:36:30', '2018-07-02 11:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `penyakit` varchar(50) NOT NULL,
  `diagnosa` text NOT NULL,
  `solusi_solusi` text NOT NULL,
  `rekomendasi_makanan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `penyakit`, `diagnosa`, `solusi_solusi`, `rekomendasi_makanan`) VALUES
(1, 'Batuk', 'Berdasarkan hasil diagnosa anda mengalami penyakit batuk. Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh infeksi saluran pernapasan atas menyerang tenggorokan yang disebabkan oleh virus. Seseorang yang mengalami penyakit kesulitan ketika menelan makanan.', '1.	Beristirahatlah dengan cukup\r\n2.	Hindari atau berhenti untuk merokok\r\n3.	Hindari dari tempat yang lembab\r\n4.	Minumlah banyak air putih agar tehindar dari dehidrasi\r\n5.	Jika batuk terus berlangsung hubungi dokter\r\n', '1.	Konsumsi madu karena meringkan tenggorokan dan mencegah batuk\r\n2.	Konsumsi madu bercampur lemon karena ampuh untuk menangani batuk\r\n3.	Konsumsi kecap yang dicampurkan dengan jeruk nipis\r\n4.	Konsumsi teh hijau karena mengandung senyawa resveratrol dan katekin sebagai antioksidan\r\n'),
(2, 'Demam', 'Berdasarkan hasil diagnosa anda mengalami penyakit demam. Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh mekanisme pertahanan tubuh untuk melawan infeksi. Seseorang dapat mengalami ini disaat respon imun tubuh dipicu oleh pirogen (zat penghasil demam).', '1.	Minum air secara cukup untuk mengindari dehidrasi dan mengisi tubuh dengan cairan\r\n2.	Istirahat dengan cukup untuk memulihkan dan membantu kekebalan tubuh\r\n3.	Gunakanlah pakaian tipis dan berada di ruangan dengan udara yang sejuk\r\n4.	Beriksan asupan kalori yang cukup seperti protein, mineral, sodium dan potassium\r\n5.	Semua jenis makanan yang digoreng sebaiknya tidak dikonsumsi saat demam, karena banyak mengandung lemak jenuh\r\n6.	Lakukanlah periksa dengan dokter jika demam lebih dari 40 derajat dan berlangsung lebih dari 48 jam sampai 72 jam\r\n', '1.	Konsumsi bubur karena mudah dicerna dan bisa membantu tubuh untuk mendapatkan sumber energi \r\n2.	Mengonsumsi sayuran kukus antara lain yang sangat disarankan adalah seperti brokoli, kembang kol, kubis, sawi, dan lain sebagainya. Semua jenis sayuran ini mengandung sulforaphane yang akan membantu tubuh melawan penyebab demam termasuk bakteri atau virus dan mengandung antioksidan untuk membantu tubuh dalam melawan sumber peradangan atau infeksi\r\n3.	Konsumsi telur rebus karena mengandung protein dan energi yang luar biasa\r\n4.	Sup ayam menyumbang beberapa nutrisi sekaligus cairan yang melimpah seperti vitamin, mineral, protein dan lemak sehat. Gunakalah daging ayam tanpa lemak. Selain itu sumber protein yang didapat dari ayam dapat membuat tubuh untuk mendapatkan energi \r\n5.	Banyak mengonsumsi bayam, karena mengandung beberapa jenis nutrisi seperti float, niasin, vitamin A, C dan 6, beta karoten, klorofilin lutein dan mineral lain\r\n'),
(3, 'Tifus', 'Berdasarkan hasil diagnosa anda mengalami penyakit tifus (tifoid). Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh bakteri yang masuk ke usus melalui makanan atau minuman yang sudah terkontaminasi dan berkembang biak di dalam saluran pencernaan.', '1.	Tifus bisa diobati dengan antibiotika, sebaiknya bawalah selalu antibiotik yang telah diresepkan dokter dan ikutilah petunjuk yang telah diberikan\r\n2.	Istirahat dengan cukup\r\n3.	Makan dengan teratur dengan konsumsi makanan yang tinggi protein nabati dan hewani, rendah serat, makanan lunak dan makanan yang tidak bersifat pedas dan asam\r\n4.	Cucilah terlebih dahulu sayur atau buah yang ingin dikonsumsi, hindari konsumsi buah dan sayuran mentah, kecuali anda mengupas atau mencucinya sendiri dengan air bersih\r\n5.	Cuci tangan dengan teratur dengan sabun dan air hangat untuk mengurangi risiko penyebaran infeksi\r\n6.	Batasi konsumsi makanan boga bahari (seafood), terutama yang belum dimasak\r\n7.	Hindari konsumsi susu yang tidak terpasteurisasi \r\n', '1.	Konsumsi makanan tinggi protein nabati dan hewani seperti daging ayam rebus, kacang kedelai, hati ayam dan ikan rebus\r\n2.	Konsumsi makanan rendah serat seperti buah-buahan dan sayuran antara lain kacang panjang, buncis muda, pepaya, pisang, wortel, alpukat\r\n3.	Konsumsi makanan lunak seperti pudding, nasi tim, bubur, roti\r\n4.	Konsumsi makanan yang tidak mengandung pedas dan asam \r\n5.	Sering minum air putih secara teratur\r\n'),
(4, 'Pilek dan Flu', 'Berdasarkan hasil diagnosa anda mengalami penyakit Pilek dan flu. Kemungkinan hasil gejala yang Anda rasakan disebabkan virus yang menyebar lewat udara. Seseorang yang mengalami ini dapat menghirup virus secara langsung atau melalui benda-benda yang disentuh. ', '1.	Istirahat yang cukup, orang dewasa sehat membutuhkan waktu tidur ideal antara 7-8 jam sehari untuk memberikan waktu bagi otot dan pikiran beristirahat\r\n2.	Menghirup uap hangat untuk mengecerkan secret idung (ingus) menggunakan vaporizer \r\n3.	Minum 2 liter air putih setiap hari atau bisa gunakan air panas untuk mengganti cairan tubuh atau suplemen vitamin\r\n4.	Cuci tangan anda secara teratur sebelum makan atau sebelum menyentuh mata dan mulut anda\r\n5.	Bersihkan permukaan barang-barang yang rawan terkena kuman \r\n', '1.	Konsumsi kunyit dapat meningkatkan sistem kekebalan tubuh melancarkan peredaran darah dan juga antioksidan\r\n2.	Campurkan bawang putih dalam setiap masakan anda karena mengandung suatu senyawa yang bersifat antibiotik kuat\r\n3.	Konsumsi sup panas karena kaldu dari sup membuat tubuh menjadi terhidrasi dan juga membuatnya lewat uap\r\n'),
(5, 'Asma', 'Berdasarkan hasil diagnosa anda mengalami penyakit asma. Kemungkinan hasil gejala yang Anda rasakan disebabkan karena oksigen tidak dapat masuk ke dalam tubuh sehingga saluran pernapasan di paru-paru mengalami peradangan atau penyempitan. Dimana seseorang mengalami kesulitan bernafas karena berbagai alasan. ', '1.	Hindari makanan seperti kaki sapi, kuning telur, otak, udang, daging kambing atau sapi, lemak, jeroan dan santan kental \r\n2.	Menghindari timbulnya alergi seperti dingin, debu maupun makanan-makanan tertentu\r\n', '1.	Konsumsi alpukat karna membantu melindungi sel dari kerusakan radikal bebas dan mendetoksifikasi tubuh, polutan dan zat berbahaya lainnya. Alpukat juga merupakan sumber vitamin E yang baik\r\n2.	Konsumsi pisang karena mengandung serat tinggi. Pisang adalah salah satu sumber piridoksin terbaik, yang bisa dikenal dengan vitamin B6\r\n3.	Konsumsi kiwi karena mengandung vitamin C, K, E dan serat yang sangat banyak. Kandungan kiwi mampu menurukan sesak nafas dengan sangat signifikan\r\n4.	Konsumsi sawi hijau mengandung beberapa jenis vitamin yang baik termasuk salah satunya vitamin E. Nutrisi di sawi hijau dapat mengais radikal bebas yang menyebabkan kontraksi otot polos dan penyempitan saluran napas\r\n'),
(6, 'Sakit Kepala', 'Berdasarkan hasil diagnosa anda mengalami penyakit sakit kepala. Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh otak dan tulang-tulang tengkorak yang tidak memiliki kemampuan merasakan sakit karena mereka tidak memiliki ujung saraf. Ujung saraf inilah yang peka terhadap denyutan nyeri. ', '1.	Kurangi mengkonsumsi kafein\r\n2.	Makanlah dengan secara teratur\r\n3.	Hindari pikiran setres dan istirahat yang cukup\r\n4.	Rutin berolahraga. Mulailah berolahraga secara perlahan untuk menghindari terjadinya cedera\r\n5.	Jika sakit kelapa berlangsung selama 3 minggu lebih baik anda periksakanlah ke dokter\r\n', '1.	Konsumsilah kentang karena mengandung banyak kalium, yakni 100 gram kalium\r\n2.	Makanlah ikan berlemak seperti salmon, tuna dan makarel karena mengandung asam lemak esensial dan omega-3. Jika tidak bisa untuk mengonsumsi ikannya dengan langsung bisa mengonsumsi suplemen minyak ikan\r\n3.	Semangka merupakan buah yang banyak air mineral, selain itu mengandung nutrisi seperti magnesium. Anda bisa mencoba buah yang lainnya antara lain, tomat dan melon\r\n4.	Konsumsi 60 buah kismis karena mengandung 1 gram serat dan 212 mg kalium\r\n5.	Pisang mengandung magnesium yang baik untuk melancarkan pembuluh darah dan mengurangi sakit kepla	\r\n6.	Makanan yang mengandung magnesium lainnya yaitu almond, kacang mete, beras merah, alpukat, kacang-kacangan dan biji-bjian\r\n'),
(7, 'Pusing', 'Berdasarkan hasil diagnosa anda mengalami penyakit pusing. Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh sensasi merasa kehilangan keseimbangan atau kepala yang terasa berputar yang dapat mempengaruhi bagian tubuh.', '1.	Batasi konsumsi kafein, minuman keras dan rokok\r\n2.	Banyak minum air putih. Ini dapat menyembuhkan sekaligus mencagah pusing akibat kepanasan dan dehidrasi\r\n3.	Makan secara teratur, terutama rutinlah untuk makan pagi atau sarapan\r\n4.	Jangan berdiri secara tiba-tiba karena penyebab pusing sering muncul akibat anda berbaring atau duduk lalu berdiri secara tiba-tiba\r\n5.	Jauhi sinar komputer, televisi dan handphone yang secara berlebihan\r\n', '1.	Konsumsi kentang dengan cara di rebus karena mengandung kalium\r\n2.	Konsumsi almond karena memiliki kandungan gizi yang lengkap. Selain almond anda bisa mengonsumsi kacang tanah, brokoli dan pisang\r\n3.	Konsumsi makanan yang mengandung karbohidrat sehat seperti oatmeal, buah, yogurt, roti gandum. Karbohidrat mengandung glikogen karena sumber energi bagi otak\r\n4.	Banyaklah untuk mengonsumsi bayam karena dapat menurunkan tekanan darah\r\n'),
(8, 'Sakit Perut', 'Berdasarkan hasil diagnosa anda mengalami penyakit sakit perut. Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh gangguan organ di dalam perut dan bisa bermacam-macam gejala yang bisa saja menyertainya. ', '1.	Minumlah air mineral secukupya, minimal 2 liter tiap hari\r\n2.	Utamakan untuk memakanan makanan yang berserat \r\n3.	Hindari minuman berkafein\r\n4.	Kurangi konsumsi makanan berlemak agar sistem pencernaan menjadi sehat\r\n5.	Hindari pikiran setres\r\n', '1.	Sering konsumsi yoghurt karena akan meningkatkan sistem kekebalan tubuh\r\n2.	Konsumsi jus wortel dan tambahkan beberapa tangkai daun mint  \r\n3.	Konsumsilah makanan bertepung, seperti nasi\r\n4.	Konsumsi apel yang akan mengandung pektin dan enzim yag dapat memecah dan menyingkirkan parktikel makanan di tubuh\r\n5.	Konsumsi papaya yang mengandung enzim pencernaan alami yang disebut papain\r\n'),
(9, 'Diare', 'Berdasarkan hasil diagnosa anda mengalami penyakit diare. Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh infeksi pada usus yang dapat disebabkan oleh bakteri, virus atau parasite. Infeksi yang diderita dapat tercemar oleh air atau makanan yang dapat merusak sistem pencernaan atau alergi.', '1.	Jika diare berlangsung lebih dari beberapa minggu bahkan melebihi dari 4 minggu dikatakan diare kronis segeralah periksa kan ke dokter\r\n2.	Banyak minum air putih\r\n3.	Hindari produk susu dan makanan yang kaya magnesium, kafein, teh dan batasi makanan manis\r\n4.	Sebaiknya wadah air minum tidak tercemar air mentah dari dapur atau pencemar lainnya\r\n5.	Rajin-rajinlah mencuci tangan pake sabun setelah ke toilet\r\n6.	Selalu konsumsi makanan dan minuman sodium, potassium dan serat \r\n', '1.	Minumlah jus buah tanpa gula tambahan\r\n2.	Konsumsi makanan kaya akan potassium, seperti pisang dan kentang\r\n3.	Konsumsi makanan dan minuman kaya akan sodium, seperti air kaldu, sup, minuman energi dan biskuit asin\r\n4.	Konsumsi makanan akan serat seperti pisang, oatmeal, nasi\r\n5.	Konsumsi yoghurt, daging ayam tanpa kulit dan lemak\r\n'),
(10, 'Mual dan muntah', 'Berdasarkan hasil diagnosa anda mengalami penyakit mual dan muntah. Kemungkinan hasil gejala yang Anda rasakan disebabkan karena sensasi tidak nyaman dan gelisah di perut yang merupakan infeksi oleh bakteri atau virus.', '1.	Usahakan tetap mengonsumsi cairan agar terhindar dari dehidrasi\r\n2.	Minum larutan penambah caira tubuh atau oralit \r\n3.	Disarankan untuk mengonsumsi minuman manis untuk menggantikan kandungan gula yang hilang\r\n4.	Makanan yang mengandung garam juga dianjurkan untuk dikonsumsi, agar dapat mengganti kandungan garam tubuh\r\n5.	Hindari untuk melakukan banyak aktivitas yang dapat membuat mual menjadi lebih parah\r\n6.	Konsumsilah makanan lunak dan mudah dicerna.\r\n', '1.	Minum atau makanlah jahe secara efektif untuk menangani mual\r\n2.	Konsumsi labu karena mampu meringkan rasa mual, selain itu memiliki kandungan karbohidrat bagi tubuh\r\n3.	Konsumsi alpukat karena mengurangi rasa mual dan sifatnya lunak untuk mudah di cerna \r\n4.	 Crackers asin (saltine crackers) adalah biskuit dengan rasa asin yang kaya akan kandungan karbohidrat. Makanan ini dapat membantu tubuh dalam menyerap asam berlebihan pada saluran pencernaan\r\n'),
(11, 'Muntaber', 'Berdasarkan hasil diagnosa anda mengalami penyakit muntaber. Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh peradangan usus oleh suatu bakteri, parasit, keracunan makanan karena bakteri maupun bahan kimia. Dimana keadaan seseorang yang mengalami muntan-muntah dan buang air besar secara terus menerus.', '1.	Sebaiknya konsumsi air kelapa karena sangat baik dan bermanfaat bagi penderita kekurangan cairan, air kelapa mengandung banyak mineral dan kalium. Kalium dan natrium dibutuhkan unutuk penderita kekurangan cairan dan mineral\r\n2.	Makan-makanan yang bergizi dan tidak makan sembarangan\r\n3.	Mengurangi makan makanan yang beraroma tajam serta menyengat untuk mencegah terjadinya muntah \r\n4.	Minum air cukup sehingga mencegah dehidrasi\r\n5.	Apabila makin parah dengan menunjukkan dua tanda-tanda atau lebih tanda-tanda muntaber atau berak lembek disertai darah atau diare yang terjadi lebih dari satu minggu, bawalah ke rumah sakit terdekat\r\n', '1.	Berikan makanan-makanan lunak seperti bubur, nasi tim dan pisang \r\n2.	Berikan minuman seperti air kelapa, air tajin, air buah atau LGG yang memberikan banyak cairan\r\n3.	Dianjurkan konsumsi yoghurt, apel, sereal dan kentang rebus\r\n4.	Berikan oralit 200 cc, caranya adalah dengan 3 jam pertama 12 gelas, selanjutnya 2 gelas setiap kali mencret \r\n5.	Jangan lupa untuk selalu banyak minum air putih \r\n'),
(12, 'Demam Berdarah Dengue (DBD)', 'Berdasarkan hasil diagnosa anda mengalami penyakit Demam berdarah dengue (DBD). Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh virus dengue yang ditularkan melalui nyamuk Aedes Aegypti. Seseorang mengalami nyeri hebat yang seakan-akan tulangnya merasa patah.', '1.	Dihindari untuk mengkonsumsi teh, kopi, coklat atau yang berwarna coklat/merah\r\n2.	Dicatat untuk kapan saja ketika kencing dan minum \r\n3.	Dianjurkan untuk banyak makan dan banyak minum air putih\r\n4.	Jika demam diatas 38derajat berikan parasetamol\r\n5.	Jagalah kebersihan sanitasi lingkungan disekitar rumah, jangan biarkan genangan air yang mungkin menjadi tempat berkembangbiak nyamuk\r\n6.	Kalau bisa harus perlu diinfus agar darah tetap encer\r\n7.	Sebaiknya bawa ke dokter dan pemeriksaan darah terutama hemaktorit dan trombosit\r\n', '1.	Minum air putih yang banyak dan banyak makan\r\n2.	Sebaiknya minum jus jambu yang sangat kaya vitamin C, vitamin B\r\n3.	Konsumsi makanan seperti daun papaya, air jahe, air kelapa, bubur dan jeruk\r\n4.	Kosumsi buah-buahan seperti semangka, jambu biji, kiwi dan papaya\r\n5.	Konsumsi sayauran seperti wortel mentimun dan sayuran yang berdaun hijau untuk memberikan '),
(13, 'Gatal-gatal', 'Berdasarkan hasil diagnosa anda mengalami penyakit gatal-gatal. Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh sensai kulit yang memicu refleks untuk menggaruk area tertentu pada tubuh dan peyebab yang lainnya bisa bermacam-macam.', '1.	Hindari untuk menggaruk secara terus menerus karena akan membuat iritasi pada kulit dan menambah rasa gatal\r\n2.	Gatal-gatal dapat terjadi karena alergi dan juga kontak dengan bahan pakaian tertentu seperti wol dan sebagainya\r\n3.	Hindari cuaca panas yang menyebabkan gatal-gatal terutama pada daerah lembab karena banyaknya keringat\r\n', '1.	Konsumsi apel karena mengandung zat quercetin yang dapat mencegah pelepasan histamin dari sel tubuh\r\n2.	Konsumsi semangka dapat mengobati alergi karena mengandung air yang dapat menghilangkan semua racun dan kaya vitamin C untuk meningkatkan kekebalan tubuh\r\n3.	Teh hijau mengandung antioksidan yang kuat yang dikenal sebagai epigallocatechin gallate, yang dapat mencegah respon alergi dalam tubuh. Minum dua cangkir teh hijau dengan lemon setiap hari untuk mengobati alergi\r\n4.	Konsumsi kunyit karena memiliki sifat anti-inflamasi dan anti-alergi karena mengandung zat yang dikena sebagai kurkumin. Campurkan satu sendok teh kunyit dengan sus panas minum dua kali sehari untuk mencegah alergi\r\n'),
(14, 'Anemia', 'Berdasarkan hasil diagnosa anda mengalami penyakit anemia. Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh kekurangan sel darah merah yang mengandung hemoglobin untuk menyebarkan oksigen ke seluruh organ tubuh. Seseorang dengan kondisi ini akan merasa letih dan lesu.', '1.	Rutin meminum air putih akan membantu tubuh untuk menyerap nutrisi\r\n2.	Mengurangi makanan yang banyak mengandung karbohidrat, hindari minuman beralkohol dan melalukan pola hidup sehat\r\n3.	Hindari begadang karena memiliki dampak buruk bagi tubuh \r\n', '1.	Konsumsilah daging, hati, kacang-kacangan, sereal, sayuran berdaun hijau gelap dan buah kering yang mengandung zat besi yang baik untuk produksi hemoglobin\r\n2.	Konsumsi semua buah yang mengandung kadar tinggi Vitamin C untuk meningkatkan penyerapan gizi dalam tubuh seperti jeruk, lemon, mangga, brokoli, tomat, stroberi dan melon\r\n3.	Konsumsilah buah-buahan pasta, gandum, nasi sereal yang mengandung akan asam folat \r\n4.	Konsumsilah vitamin B-12 yang ditemukan dalam daging, keju, susu. Lalu vitamin B-12 bisa di tambahkan dalam sereal maupun produk kedelai (tempe dan tahu)\r\n5.	Konsumsi telur terutama kuning telur karena mengandung zat besi\r\n'),
(15, 'Maag (Dispepsia)', 'Berdasarkan hasil diagnosa anda mengalami penyakit maag (dispepsia). Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh munculnya gejala berupa rasa nyeri dan gangguan yang terjadi pada area perut bagian tengah.', '1.	Hindari zat kefein atau alkohol \r\n2.	Makanlah dengan teratur jangan sampai perut kosong sama sekali\r\n3.	Konsumsi makanan-makanan yang lunak dan hindari untuk makan agar jangan terlalu kenyang\r\n4.	Hindari makanan daging kambing, nangka, durian, pedas asam dan minuman es\r\n5.	Selalu konsumsi air putih satu gelas setiap bangun tidur \r\n6.	Hindari rasa cemas dan bisa mengendalikan setres\r\n', '1.	Konsumsi bubur karena bubur makanan yang lunak \r\n2.	Konsumsi kentang rebus karena dapat menggantikan karbohidrat dalam tubuh. Sebab kentang rebus bersifat alkali dan menetralisir asam lambung\r\n3.	Konsumsi brokoli karena mengandung kalium, vitamin C dan sulfur\r\n4.	Konsumsi pisang karena membuat rasa kenyang dan menstabilkan lambung\r\n5.	Mengonsumsi lidah buaya berkhasiat sebagai antibiotik dan menghilangkan rasa sakit\r\n'),
(16, 'Insomnia', 'Berdasarkan hasil diagnosa anda mengalami penyakit maag insomnia. Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh gangguan tidur dengan kesulitan untuk melakukan tidur yang normal. Seseorang yang mengalami ini kesulitan tidur atau tidak bisa tidur cukup lama.', '1.	Hindari makanan besar dan minuman sebelum tidur\r\n2.	Hindari atau batasi untuk mengkonsumsi kafein dan alkohol \r\n3.	Hindari atau batasi tidur siang dan hindari tidur siang setelah jam 3 sore\r\n4.	Biasakan untuk berolahraga\r\n', '1.	Konsumsi kacang almond karena memiliki sumber kalsium dan magnesium yang dapat menenangkan otot dan meningkatkan kualitas tidur\r\n2.	Konsumsi oatmeal karena mengandung serat dan karbohidrat yang dapat mengatasi insomnia\r\n3.	Sesering kali konsumsi cokelat karena bisa membuat seseorang tidur nyenyak pada malam hari\r\n4.	Madu mengandung asam amino dan triptofan. Konsumsi madu 1 sdm sebelum tidur \r\n5.	Konsumsi salad yang terdapat selada di dalamnya karena mengandung lactucarium \r\n'),
(17, 'Sakit gigi', 'Berdasarkan hasil diagnosa anda mengalami penyakit sakit gigi. Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh rasa nyeri yang timbul dalam berbagai macam hal. Hal ini terjadi ketika pulpa gigi mengalami peradangan.', '1.	Berhenti atau mengurangi rokok karena dapat berdampak buruk bagi kesehatan gigi dan mulut\r\n2.	Membatasi konsumsi makanan atau minuman manis \r\n3.	Letakkan kompres dingin di luar pipi apabila sakit gigi disebabkan cedera\r\n4.	Memeriksakan gigi anda ke dokter setidaknya dua kali dalam setahun\r\n5.	Sakit gigi minimal 2 kali sehari dan gunakan pasta gigi yang mengandung fluoride\r\n', '1.	Mengonsumsi sup tidak akan membuat anda dehidrasi karena tinggi akan air dan dapat mncukupi kebutuhan nutrisi \r\n2.	Telur dapat meringkan sakit gigi yang sedang dialami\r\n3.	Kentang yang mengandung zat besi dan zinc akan mengurangi rasa sakit gigi dan dapat menucukupi kebutuhan karbodidrat\r\n4.	Mengonsumsi yoghurt dapat menguatkan gigi\r\n5.	Konsumsi jus sayuran merupakan makanan tinggi yang mengandung vitamin dan mineral. Selain itu konsumsi juga jus buah\r\n6.	Jika sedang sakit gigi konsumsilah es krim favorit anda karena bertujuan mengurangi rasa sakit dan susu yang kaya akan kalsium \r\n'),
(18, 'Hepatitis', 'Berdasarkan hasil diagnosa anda mengalami penyakit hepatitis. Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh infeksinya virus maupun kondisi lain yang merujuk pada perdangan yang terjadi pada hati.', '1.	Menjaga kebersihan sumber air \r\n2.	Mencuci bahan makanan yang akan dikonsumsi, terutama sayuran dan buah-buahan\r\n3.	Tidak berbagi pakai sikat gigi, pisau cukur, atau jarum suntik dengan orang lain\r\n4.	Tidak menyentuh tumpahan darah tanpa sarung tangan pelindung\r\n5.	Hindari atau kurangi konsumsi alkohol\r\n', '1.	Konsumsi kacang-kacangan seperti kacang kedelai, kacang merah, kacang polong dan kacang kenari\r\n2.	Mengkonsumsi brokoli dapat meningkatkan kesehatan hati karena mengandung sulforophane\r\n3.	Asparagus dapat dikonsumsi secara teratur karena memiliki kandungan fitokimia yang akan membersihkan hati secara alami dan membuat hati menjadi normal\r\n4.	Bayam akan membantu mengembalikan fungsi hati yang rusak \r\n5.	Beras merah dapat menjaga kesehatan organ tubuh karena vitamin dan antioksidannya cukup tinggi\r\n'),
(19, 'Lemah Jantung', 'Berdasarkan hasil diagnosa anda mengalami penyakit lemah jantung. Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh faktor usia maupun keturunan, pola hidup yang tidak sehat maupun kompilkasi penyakit lainnya. Seseorang yang mengalami ini jantung menjadi lebih besar, lebih tebal atau kaku.', '1.	Hindari setres dan sebisa mungkin untuk mengatasi setres\r\n2.	Menerapkan pola makan yang sehat untuk jantung\r\n3.	Memilik berat badan yang sehat\r\n4.	Hindari atau berhenti untuk merokok\r\n', '1.	Daun sukun karena mengandung senyawa sitosterol dan flavonoid untuk meningkatkan pembuluh dari dan jantung\r\n2.	Oatmeal dapat menurunkan kadar kolestrol yang dapat menumbat arteri jantung dan memicu serangan jantung lainnya\r\n3.	Kunyit berguna untuk melarutkan kolesterol jahat dan melancarkan perdaran darah\r\n4.	Mengonsumsi teh hijau karena mengandung senyawa resveratrol dan katekin sebagai antioksidan\r\n4.	Konsumsilah buah-buahan seperti buah manggis, apel dan jeruk\r\n5.	Konsumsilah sayuran hijau karena baik untuk penderita lemah jantung seperti kangkung dan bayam\r\n'),
(20, 'Ambeien', 'Berdasarkan hasil diagnosa anda mengalami penyakit ambeien. Kemungkinan hasil gejala yang Anda rasakan disebabkan oleh kaitan kuat yang meningkatnya tekanan dalam aliran darah di dalam atau sekitar anus.', '1.	Disarakan untuk mengkonsumsi makanan yang berserat\r\n2.	Segera buang air besar jika sudah ingin\r\n3.	Minum banyak cairan dan kurangi mengonsumsi kafein\r\n4.	Jangan mengejan secara berlebihan\r\n5.	Jangan lupa untuk teratur berolarahraga\r\n', '1.	Konsumsi sayuran yang kaya akan serat yang memiliki daun berwarna hijau gelap. Misalnya brokoli, bayam, kubis dan kangkung\r\n2.	Konsumsi makanan yang mengandung banyak air seperti mentimun, seledri dan semangka \r\n3.	Konsumsi buah-buahan seperti pisang, kurma, ceri, apel dan anggur\r\n4.	Konsumsi kacang-kacangan seperti almond, kacang polong, kacang hitam, kacang hijau dan kacang lentil\r\n5.	Konsumsi biji-bijian yang kaya akan serat tidak larut seperti oatmeal, jagung, roti atau biskuit yang terbuat dari tepung gandum\r\n'),
(21, 'Konsultasikan dengan dokter', 'Untuk informasi lebih lanjut, silakan konsultasikan dengan dokter Anda. Bila menurut Anda, gejala yang anda rasakan cukup serius, segera kunjungi dokter.', 'Untuk informasi lebih lanjut, silakan konsultasikan dengan dokter Anda. Bila menurut Anda, gejala yang anda rasakan cukup serius, segera kunjungi dokter.', 'Untuk informasi lebih lanjut, silakan konsultasikan dengan dokter Anda. Bila menurut Anda, gejala yang anda rasakan cukup serius, segera kunjungi dokter.');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tahap_pemeriksaan`
--

CREATE TABLE `tahap_pemeriksaan` (
  `id_pemeriksaan` int(11) NOT NULL,
  `pertanyaan` varchar(200) NOT NULL,
  `id_gejala` int(11) DEFAULT NULL,
  `status_muncul_setelah_id_pemeriksaan` int(11) DEFAULT NULL,
  `status` enum('true','false','netral') DEFAULT NULL,
  `penyakit_benar` int(11) DEFAULT NULL,
  `penyakit_salah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahap_pemeriksaan`
--

INSERT INTO `tahap_pemeriksaan` (`id_pemeriksaan`, `pertanyaan`, `id_gejala`, `status_muncul_setelah_id_pemeriksaan`, `status`, `penyakit_benar`, `penyakit_salah`) VALUES
(1, 'Apakah anda merasakan sesak nafas, serta nyeri dada?', 1, NULL, NULL, NULL, NULL),
(2, 'Apakah anda merasakan denyut jantung yang meningkat?', NULL, 1, 'netral', 5, NULL),
(3, 'Apakah anda mengalami gejala sakit kepala atau menggigil?', NULL, 2, 'false', NULL, NULL),
(4, 'Apakah anda merasakan kulit terasa panas atau berkeringat dingin?', NULL, 3, 'netral', 2, NULL),
(5, 'Apakah anda mengalami demam tinggi rentang 39derajat – 40derajat yang sangat meningkat?', NULL, 4, 'false', NULL, NULL),
(6, 'Apakah anda merasakan jantung terasa lemah dan nadi lambat?', NULL, 5, 'netral', 3, NULL),
(7, 'Apakah anda mengalami sakit kepala, gangguan tenggorokan dan batuk kering?', NULL, 6, 'false', NULL, NULL),
(8, 'Apakah anda mengalami hidung meler atau gatal dan bersin?', NULL, 7, 'netral', 4, 1),
(9, 'Apakah anda merasakan dehidrasi dan kelelahan ?', 4, NULL, NULL, NULL, NULL),
(10, 'Apakah anda mengalami gejala sakit kepala atau menggigil? ', NULL, 9, 'netral', 2, NULL),
(11, 'Apakah anda mengalami sakit kepala, gangguan tenggorokan dan batuk kering?', NULL, 10, 'false', NULL, NULL),
(12, 'Apakah anda mengalami hidung meler atau gatal dan bersin?', NULL, 11, 'netral', 4, 1),
(13, 'Apakah anda mengalami migran dan hilangnya kesadaran?', 10, NULL, NULL, NULL, NULL),
(14, 'Apakah anda merasakan nyeri kepala dan memiliki pandangan yang kabur?', NULL, 13, 'netral', 6, 21),
(15, 'Apakah anda merasakan sesak nafas dan gangguan tenggorokan?\r\n', 9, NULL, NULL, NULL, NULL),
(16, 'Apakah anda merasakan nyeri dada?', NULL, 15, 'netral', 1, 21),
(17, 'Apakah anda merasakan nyeri kepala dan memiliki pandangan yang kabur?', 12, NULL, NULL, NULL, NULL),
(18, 'Apakah anda mengalami migran dan hilangnya kesadaran?', NULL, 17, 'netral', 6, 21),
(19, 'Apakah anda merasakan di sekeliling anda menjadi berputar atau bergerak (vertigo)?', 14, NULL, NULL, NULL, NULL),
(20, 'Apakah anda merasakan kepala merasa berat dan kehilangan keseimbangan?', NULL, 19, NULL, 7, 6),
(21, 'Apakah anda merasakan pusing berkunang-kunang?', 16, NULL, NULL, NULL, NULL),
(22, 'Apakah anda merasakan lemas dan lelah serta kulit terliha pucat?', NULL, 21, 'netral', 14, NULL),
(23, 'Apakah anda merasakan jantung terasa lemah dan nadi lambat?', NULL, 22, 'false', NULL, NULL),
(24, 'Apakah anda merasakan lemas dan kelelahan serta sakit perut?', NULL, 23, 'netral', 3, 21),
(25, 'Apakah anda merasakan kepala merasa berat dan kehilangan keseimbangan?', 17, NULL, NULL, NULL, NULL),
(26, 'Apakah anda merasakan di sekeliling anda menjadi berputar atau bergerak?', NULL, 25, 'netral', 7, 21),
(27, 'Apakah anda merasakan kulit terasa panas atau berkeringat dingin?', 18, NULL, NULL, NULL, NULL),
(28, 'Apakah anda mengalami gejala sakit kepala atau menggigil?', NULL, 27, 'netral', 2, 21),
(29, 'Apakah anda merasakan bahwa denyut jantung menjadi cepat?', 19, NULL, NULL, NULL, NULL),
(30, 'Apakah anda merasakan sakit perut dan sering berkeringat dingin?', NULL, 29, 'netral', 10, NULL),
(31, 'Apakah anda mengalami gejala sakit kepala atau menggigil?', NULL, 30, 'false', NULL, NULL),
(32, 'Apakah anda mengalami gejala sakit kepala atau menggigil?', NULL, 31, 'netral', 2, 21),
(33, 'Apakah anda merasakan sesak nafas dan gangguan tenggorokan?', 3, NULL, NULL, NULL, NULL),
(34, 'Apakah anda merasakan nyeri dada?', NULL, 33, 'netral', 1, NULL),
(35, 'Apakah anda merasakan kepala merasa berat dan kehilangan keseimbangan?', NULL, 34, 'false', NULL, NULL),
(36, 'Apakah anda merasakan sensai seperti ingan pingsan?', NULL, 35, 'netral', 7, NULL),
(37, 'Apakah kulit anda terlihat pucat dan bibir membiru?', NULL, 36, 'false', NULL, NULL),
(38, 'Apakah anda merasakan sesak nafas, mengi serta nyeri dada?', NULL, 37, 'netral', 5, NULL),
(39, 'Apakah anda merasakan pusing berkunang-kunang?', NULL, 38, 'false', NULL, NULL),
(40, 'Apakah anda merasakan lemas dan lelah serta kulit terlihat pucat?', NULL, 39, 'netral', 14, NULL),
(41, 'Apakah anda merasakan detak jantung yang tidak beraturan?', NULL, 40, 'false', NULL, NULL),
(42, 'Apakah anda merasakan gejala pusing, nyeri dada, pingsan dan sesak nafas?', NULL, 41, 'netral', 19, 21),
(43, 'Apakah anda mengalami migran dan hilangnya kesadaran?', 11, 42, NULL, NULL, NULL),
(44, 'Apakah anda merasakan nyeri kepala dan memiliki pandangan yang kabur?', NULL, 43, 'netral', 6, NULL),
(45, 'Apakah anda mengalami demam tinggi rentang 39derajat – 40derajat yang sangat meningkat?', NULL, 44, 'false', NULL, NULL),
(46, 'Apakah anda merasakan jantung terasa lemah dan nadi lambat?', NULL, 45, 'netral', 3, 21),
(47, 'Apakah anda merasakan dehidrasi dan kelelahan ?', 20, 46, NULL, NULL, NULL),
(48, 'Apakah anda mengalami gejala sakit kepala atau menggigil?', NULL, 47, 'netral', 2, NULL),
(49, 'Apakah anda merasakan buang air besar yang sering dan feses terlihat encer?', NULL, 48, 'false', NULL, NULL),
(50, 'Apakah anda merasakan kehilangan nafsu makan, sakit perut dan dehidrasi?', NULL, 49, 'netral', 9, NULL),
(51, 'Apakah anda merasa lemas dan tidak nafsu makan?', NULL, 50, 'false', NULL, NULL),
(52, 'Apakah anda merasa bahwa kencing anda menjadi lebih jarang dari biasanya?', NULL, 51, 'netral', 11, 21),
(53, 'Apakah anda mengalami gejala sakit kepala atau menggigil?', 21, 52, NULL, NULL, NULL),
(54, 'Apakah anda merasakan kulit terasa panas atau berkeringat dingin?', NULL, 53, 'netral', 2, 21),
(55, 'Apakah anda mengalami nyeri perut yang terasa parah, seperti di tusuk-tusuk atau kram? ', 22, 54, '', NULL, NULL),
(56, 'Apakah nyeri terasa di perut bagian tengah atas atau kanan atas?', NULL, 55, 'netral', 9, NULL),
(57, 'Apakah anda mengalami demam?', NULL, 56, 'false', NULL, NULL),
(58, 'Apakah anda merasakan sakit perut dan sering berkeringat dingin?', NULL, 57, 'netral', 10, 9),
(59, 'Apakah anda mengalami mual atau muntah beberapa hari ini?', 23, 58, NULL, NULL, NULL),
(60, 'Apakah anda merasakan buang air besar yang sering dan feses terlihat encer?', NULL, 59, 'netral', 9, 21),
(61, 'Apakah anda merasakan kehilangan nafsu makan, sakit perut dan dehidrasi?', 24, 60, NULL, NULL, NULL),
(62, 'Apakah anda merasakan buang air besar yang sering dan feses terlihat encer?', NULL, 61, 'netral', 9, NULL),
(63, 'Apakah anda alergi terhadap susu?', NULL, 62, 'false', NULL, NULL),
(64, 'Apakah anda merasakan sakit perut dan sering berkeringat dingin?', NULL, 63, 'netral', 10, 21),
(65, 'Apakah anda mengalami demam?', 25, 64, NULL, NULL, NULL),
(66, 'Apakah anda merasakan sakit perut dan sering berkeringat dingin?', NULL, 65, 'netral', 10, 21),
(67, 'Apakah anda merasa lemas dan tidak nafsu makan?', 26, 66, NULL, NULL, NULL),
(68, 'Apakah anda merasa lemas dan tidak nafsu makan?', NULL, 67, 'netral', 11, 21),
(69, 'Apakah anda merasa bahwa kencing anda menjadi lebih jarang dari biasanya?', 28, 0, NULL, NULL, NULL),
(70, 'Apakah berak terlihat encer dan berulang secara terus menerus?', NULL, 69, 'netral', 11, 21),
(71, 'Apakah anda merasa lemas dan tidak nafsu makan?', 29, NULL, NULL, NULL, NULL),
(72, 'Apakah anda merasa bahwa kencing anda menjadi lebih jarang dari biasanya?', NULL, 71, 'netral', 11, NULL),
(73, 'Apakah anda merasa bahwa kencing anda menjadi lebih jarang dari biasanya?', NULL, 72, 'false', NULL, NULL),
(74, 'Apakah anda merasa bahwa kencing anda menjadi lebih jarang dari biasanya?', NULL, 73, 'netral', 18, 21),
(75, 'Apakah anda merasakan kehilangan nafsu makan?', 30, 0, NULL, NULL, NULL),
(76, 'Apakah anda mengalami demam tinggi rentang 39derajat – 40derajat yang sangat meningkat?', NULL, 75, 'netral', 3, NULL),
(77, 'Apakah muncul ruam bintik-bintik merah pada kulit?', NULL, 76, 'false', NULL, NULL),
(78, 'Apakah merasa nyeri otot dan sendi?', NULL, 77, 'netral', 12, 21),
(79, 'Apakah anda merasakan jantung terasa lemah dan nadi lambat?', 31, NULL, NULL, NULL, NULL),
(80, 'Apakah anda mengalami demam tinggi rentang 39derajat – 40derajat yang sangat meningkat?', NULL, 79, 'netral', 3, NULL),
(81, 'Apakah merasa nyeri otot dan sendi?', NULL, 80, 'false', NULL, NULL),
(82, 'Apakah muncul ruam bintik-bintik merah pada kulit?', NULL, 81, 'netral', 12, NULL),
(83, 'Apakah anda merasakan alergi pada makanan?', NULL, 82, 'false', NULL, NULL),
(84, 'Apakah muncul ruam bintik-bintik merah pada kulit?', NULL, 83, 'netral', 13, 21),
(85, 'Apakah anda merasakan jantung terasa lemah dan nadi lambat?', 32, NULL, NULL, NULL, NULL),
(86, 'Apakah anda merasakan jantung terasa lemah dan nadi lambat?', NULL, 85, 'netral', 3, 21),
(87, 'Apakah merasa nyeri otot dan sendi?', 34, NULL, NULL, NULL, NULL),
(88, 'Apakah anda mengalami demam tinggi rentang 39derajat – 40derajat yang sangat meningkat?', NULL, 87, 'netral', 12, 21),
(89, 'Apakah anda merasakan kehilangan nafsu makan?', 35, NULL, NULL, NULL, NULL),
(90, 'Apakah merasa nyeri otot dan sendi?', NULL, 89, 'netral', 12, 21),
(91, 'Apakah merasa nyeri otot dan sendi?', 36, NULL, NULL, NULL, NULL),
(92, 'Apakah anda mengalami hidung meler atau gatal dan bersin?', NULL, 91, 'netral', 4, 21),
(93, 'Apakah anda mengalami gangguan tidur?', 37, NULL, NULL, NULL, NULL),
(94, 'Apakah anda mengalami hidung meler atau gatal dan bersin?', NULL, 93, 'netral', 4, NULL),
(95, 'Apakah muncul ruam bintik-bintik merah pada kulit?', NULL, 94, 'false', 13, NULL),
(96, 'Apakah anda merasakan sulit untuk tidur?', NULL, 95, 'false', NULL, NULL),
(97, 'Apakah anda merasa bahwa anda cepat marah dan depresi?', NULL, 96, 'netral', 16, 21),
(98, 'Apakah anda mengalami sakit kepala, gangguan tenggorokan dan batuk kering?', 38, NULL, NULL, NULL, NULL),
(99, 'Apakah anda mengalami sakit kepala, gangguan tenggorokan dan batuk kering?', NULL, 98, 'netral', 4, 21),
(100, 'Apakah anda merasakan denyut jantung yang meningkat?', 40, NULL, NULL, NULL, NULL),
(101, 'Apakah kulit anda terlihat pucat dan bibir membiru?', NULL, 100, 'netral', 5, 21),
(102, 'Apakah kulit anda terlihat pucat dan bibir membiru?', 41, NULL, NULL, NULL, NULL),
(103, 'Apakah kulit anda terlihat pucat dan bibir membiru?', NULL, 102, 'netral', 5, 21),
(104, 'Apakah anda merasakan lemas dan lelah serta kulit terliha pucat?', 42, NULL, NULL, NULL, NULL),
(105, 'Apakah anda merasakan pusing berkunang-kunang?', NULL, 104, 'netral', 14, NULL),
(106, 'Apakah kulit anda terlihat pucat dan bibir membiru?', NULL, 105, 'false', NULL, NULL),
(107, 'Apakah anda merasakan sesak nafas, mengi serta nyeri dada?', NULL, 106, 'netral', 5, 21),
(108, 'Apakah anda merasakan alergi pada makanan?', 43, NULL, NULL, NULL, NULL),
(109, 'Apakah muncul ruam bintik-bintik merah pada kulit?', NULL, 108, 'netral', 13, 21),
(110, 'Apakah anda baru tergigit oleh serangga?', 44, NULL, NULL, NULL, NULL),
(111, 'Apakah muncul ruam bintik-bintik merah pada kulit?', NULL, 110, 'netral', 13, 21),
(112, 'Apakah anda merasakan lemas dan lelah serta kulit terliha pucat?', 45, NULL, NULL, NULL, NULL),
(113, 'Apakah anda merasakan pusing berkunang-kunang?', NULL, 112, 'netral', 14, 21),
(114, 'Apakah anda merasakan nyeri pada bagian uluh hati?', 47, NULL, NULL, NULL, NULL),
(115, 'Apakah anda merasakan kembung dan mual atau muntah?', NULL, 114, 'netral', 15, 21),
(116, 'Apakah anda merasakan kram perut yang berkepanjangan?', 48, NULL, NULL, NULL, NULL),
(117, 'Apakah anda merasakan nyeri pada bagian uluh hati?', NULL, 116, 'netral', 15, 21),
(118, 'Apakah anda sering bersendawa?', 49, NULL, NULL, NULL, NULL),
(119, 'Apakah anda merasakan nyeri pada bagian uluh hati?', NULL, 118, 'netral', 15, 21),
(120, 'Apakah anda merasakan nyeri pada bagian uluh hati?', 50, NULL, NULL, NULL, NULL),
(121, 'Apakah anda merasakan kembung dan mual atau muntah?', NULL, 120, 'netral', 15, 21),
(122, 'Apakah anda merasa bahwa anda cepat marah dan depresi?', 51, NULL, NULL, NULL, NULL),
(123, 'Apakah anda merasakan sulit untuk tidur?', NULL, 122, 'netral', 16, 21),
(124, 'Apakah anda sering bangun pada malam hari atau terlalu dini?', 52, NULL, NULL, NULL, NULL),
(125, 'Apakah anda merasakan sulit untuk tidur?', NULL, 124, 'netral', 16, 21),
(126, 'Apakah anda sering bangun pada malam hari atau terlalu dini?', 53, NULL, NULL, NULL, NULL),
(127, 'Apakah anda merasakan sulit untuk tidur?', NULL, 126, 'netral', 16, 21),
(128, 'Apakah anda mengalami demam atau pusing?', 54, NULL, NULL, NULL, NULL),
(129, 'Apakah anda merasakan bengkak di sekitar gigi dan nyeri pada gigi?', NULL, 128, 'netral', 17, 21),
(130, 'Apakah anda merasakan kehilangan nafsu makan?', 55, NULL, NULL, NULL, NULL),
(131, 'Apakah anda merasakan bengkak di sekitar gigi dan nyeri pada gigi?', NULL, 130, 'netral', 17, 21),
(132, 'Apakah anda mengalami demam atau pusing?', 56, NULL, NULL, NULL, NULL),
(133, 'Apakah anda merasakan bengkak di sekitar gigi dan nyeri pada gigi?', NULL, 132, 'netral', 17, 21),
(134, 'Apakah urine ada menjadi gelap seperti teh?', 57, NULL, NULL, NULL, NULL),
(135, 'Apakah anda merasakan pilek dan flu, mual atau muntah dan lemas?', NULL, 134, 'netral', 18, 21),
(136, 'Apakah anda mengalami nyeri pada perut?', 58, NULL, NULL, NULL, NULL),
(137, 'Apakah anda merasakan pilek dan flu, mual atau muntah dan lemas?', NULL, 136, 'netral', 18, 21),
(138, 'Apakah anda merasakan pilek dan flu, mual atau muntah dan lemas?', 59, NULL, NULL, NULL, NULL),
(139, 'Apakah anda merasakan pilek dan flu, mual atau muntah dan lemas?', NULL, 138, 'netral', 19, 21),
(140, 'Apakah anda mengalami pembengkakan pada daerah kaki atau urat leher?', 60, NULL, NULL, NULL, NULL),
(141, 'Apakah anda merasakan detak jantung yang tidak beraturan?', NULL, 140, 'netral', 19, 21),
(142, 'Apakah anda merasakan nyeri dan gatal maupun iritasi pada anus?', 63, NULL, NULL, NULL, NULL),
(143, 'Apakah pada saat buang air besar berdarah warna merah terang?', NULL, 142, 'netral', 20, 21),
(144, 'Apakah anda merasakan nyeri dan gatal maupun iritasi pada anus?', 64, NULL, NULL, NULL, NULL),
(145, 'Apakah pada saat buang air besar berdarah warna merah terang?', NULL, 144, 'netral', 20, 21),
(146, 'Apakah anda sering duduk dalam waktu lama?', 65, NULL, NULL, NULL, NULL),
(147, 'Apakah pada saat buang air besar berdarah warna merah terang?', NULL, 146, 'netral', 20, 21),
(148, 'Apakah anda merasa lemas dan tidak nafsu makan?', 27, NULL, NULL, NULL, NULL),
(149, 'Apakah anda merasakan mual atau muntah beberapa hari ini?', NULL, 148, 'netral', 11, NULL),
(150, 'Apakah anda merasakan lemas dan lelah serta kulit terliha pucat?', NULL, 149, 'false', NULL, NULL),
(151, 'Apakah anda merasakan pusing berkunang-kunang?', NULL, 150, 'netral', 14, NULL),
(152, 'Apakah anda merasakan pilek dan flu, mual atau muntah dan lemas?', NULL, 151, 'false', NULL, NULL),
(153, 'Apakah urine ada menjadi gelap seperti teh?', NULL, 152, 'netral', 18, NULL),
(154, 'Apakah anda merasakah lemas dan Lelah?', NULL, 153, 'false', NULL, NULL),
(155, 'Apakah anda merasakan detak jantung yang tidak beraturan?', NULL, 154, 'netral', 19, 21),
(156, 'Apakah anda mengalami demam?', 13, NULL, NULL, NULL, NULL),
(157, 'Apakah anda mengalami hidung meler atau gatal dan bersin?', NULL, 156, 'netral', 4, NULL),
(158, 'Apakah anda merasakan pilek dan flu, mual atau muntah dan lemas?', NULL, 157, 'false', NULL, NULL),
(159, 'Apakah urine ada menjadi gelap seperti teh?', NULL, 158, 'netral', 18, NULL),
(160, 'Apakah anda merasakan mual atau muntah beberapa hari ini?', NULL, 159, 'false', NULL, NULL),
(161, 'Apakah berak terlihat encer dan berulang secara terus menerus?', NULL, 160, 'netral', 11, NULL),
(162, 'Apakah anda merasakan sakit perut dan sering berkeringat dingin?', NULL, 161, 'false', NULL, NULL),
(163, 'Apakah anda mengalami demam?', NULL, 162, 'netral', 10, NULL),
(164, 'Apakah anda merasakan kehilangan nafsu makan, sakit perut dan dehidrasi?', NULL, 163, 'false', NULL, NULL),
(165, 'Apakah anda merasakan buang air besar yang sering dan feses terlihat encer?', NULL, 164, 'netral', 9, NULL),
(166, 'Apakah anda merasakan kembung dan mual atau muntah?', NULL, 165, 'false', NULL, NULL),
(167, 'Apakah anda merasakan nyeri pada bagian uluh hati?', NULL, 166, 'netral', 15, 8),
(168, 'Apakah anda merasakan kehilangan nafsu makan?', 15, NULL, NULL, NULL, NULL),
(169, 'Apakah anda mengalami gejala sakit kepala atau menggigil?', NULL, 168, 'netral', 2, NULL),
(170, 'Apakah anda merasa lemas dan tidak nafsu makan? ', NULL, 169, 'false', NULL, NULL),
(171, 'Apakah berak terlihat encer dan berulang secara terus menerus?', NULL, 170, 'netral', 11, NULL),
(172, 'Apakah anda merasakan jantung terasa lemah dan nadi lambat?', NULL, 171, 'false', NULL, NULL),
(173, 'Apakah anda merasakan lemas dan kelelahan serta sakit perut?', NULL, 172, 'netral', 3, NULL),
(174, 'Apakah anda merasakan kehilangan nafsu makan?', NULL, 173, 'false', NULL, NULL),
(175, 'Apakah anda mengalami demam tinggi rentang 39derajat – 40derajat yang sangat meningkat?', NULL, 174, 'netral', 12, NULL),
(176, 'Apakah anda merasakan pilek dan flu, mual atau muntah dan lemas?', NULL, 175, 'false', NULL, NULL),
(177, 'Apakah urine ada menjadi gelap seperti teh?', NULL, 176, 'netral', 18, 21),
(178, 'Apakah anda merasakan sesak nafas dan gangguan tenggorokan?', 6, NULL, NULL, NULL, NULL),
(179, 'Apakah anda merasakan nyeri dada?', NULL, 178, 'netral', 1, NULL),
(180, 'Apakah anda merasakan pilek dan flu, mual atau muntah dan lemas?', NULL, 179, 'false', NULL, NULL),
(181, 'Apakah urine ada menjadi gelap seperti teh?', NULL, 180, 'netral', 18, NULL),
(182, 'Apakah anda mengalami gejala mual atau muntah dan demam?', NULL, 181, 'false', NULL, NULL),
(183, 'Apakah anda merasakan kepala merasa berat dan kehilangan keseimbangan?', NULL, 182, 'netral', 7, NULL),
(184, 'Apakah anda mengalami gejala sakit kepala atau menggigil?', NULL, 183, 'false', NULL, NULL),
(185, 'Apakah anda merasakan kulit terasa panas atau berkeringat dingin?', NULL, 184, 'netral', 2, 4),
(186, 'Apakah anda merasakan mual atau muntah dan sesak nafas?', 7, NULL, NULL, NULL, NULL),
(187, 'Apakah nyeri terasa di perut bagian tengah atas atau kanan atas?', NULL, 186, 'netral', 8, NULL),
(188, 'Apakah anda mengalami gejala mual atau muntah dan demam?', NULL, 187, 'false', NULL, NULL),
(189, 'Apakah anda merasakan di sekeliling anda menjadi berputar atau bergerak (vertigo)?', NULL, 188, 'netral', 7, NULL),
(190, 'Apakah anda merasakan gejala pusing, nyeri dada, pingsan dan sesak nafas?', NULL, 189, 'false', NULL, NULL),
(191, 'Apakah anda merasakan detak jantung yang tidak beraturan?', NULL, 190, 'netral', 19, NULL),
(192, 'Apakah anda merasakan nyeri dada?', NULL, 191, 'false', NULL, NULL),
(193, 'Apakah anda merasakan sesak nafas dan gangguan tenggorokan?', NULL, 192, 'netral', 1, NULL),
(194, 'Apakah anda merasakan sesak nafas, mengi serta nyeri dada?', NULL, 193, 'false', NULL, NULL),
(195, 'Apakah kulit anda terlihat pucat dan bibir membiru?', NULL, 194, 'netral', 5, 21),
(196, 'Apakah sakit yang anda rasakan baru akhir-akhir ini?', 8, 195, NULL, NULL, NULL),
(197, 'Apakah anda merasakan sesak nafas dan gangguan tenggorokan?', NULL, 196, 'netral', 1, NULL),
(198, 'Apakah anda mengalami demam tinggi rentang 39derajat – 40derajat yang sangat meningkat?', NULL, 197, 'false', NULL, NULL),
(199, 'Apakah merasa nyeri otot dan sendi?', NULL, 198, 'netral', 12, NULL),
(200, 'Apakah anda mengalami sakit kepala?', NULL, 199, 'false', NULL, NULL),
(201, 'Apakah anda merasakan sulit untuk tidur?', NULL, 200, 'netral', 16, NULL),
(202, 'Apakah anda merasakan jantung terasa lemah dan nadi lambat?', NULL, 201, 'false', NULL, NULL),
(203, 'Apakah anda mengalami demam tinggi rentang 39derajat – 40derajat yang sangat meningkat?', NULL, 202, 'netral', 14, NULL),
(204, 'Apakah anda mengalami sakit kepala, gangguan tenggorokan dan batuk kering?', NULL, 203, 'false', NULL, NULL),
(205, 'Apakah anda mengalami hidung meler atau gatal dan bersin?', NULL, 204, 'netral', 4, NULL),
(206, 'Apakah anda mengalami gejala sakit kepala atau menggigil?', NULL, 205, 'false', NULL, NULL),
(207, 'Apakah anda merasakan kulit terasa panas atau berkeringat dingin?', NULL, 206, 'netral', 2, 6),
(208, 'Apakah anda mengalami gejala mual atau muntah dan demam?', 5, NULL, NULL, NULL, NULL),
(209, 'Apakah anda merasakan kepala merasa berat dan kehilangan keseimbangan?', NULL, 208, 'netral', 7, NULL),
(210, 'Apakah anda mengalami gejala sakit kepala atau menggigil?', NULL, 209, 'false', NULL, NULL),
(211, 'Apakah anda merasakan kulit terasa panas atau berkeringat dingin?', NULL, 210, 'netral', 2, NULL),
(212, 'Apakah anda mengalami demam tinggi rentang 39derajat – 40derajat yang sangat meningkat?', NULL, 211, 'false', NULL, NULL),
(213, 'Apakah merasa nyeri otot dan sendi?', NULL, 212, 'netral', 12, NULL),
(214, 'Apakah anda mengalami migran dan hilangnya kesadaran?', NULL, 213, 'false', NULL, NULL),
(215, 'Apakah anda merasakan nyeri kepala dan memiliki pandangan yang kabur?', NULL, 214, 'netral', 6, NULL),
(216, 'Apakah anda merasakan mual atau muntah dan sesak nafas?', NULL, 215, 'false', NULL, NULL),
(217, 'Apakah anda mengalami nyeri perut yang terasa parah, seperti di tusuk-tusuk atau kram?', NULL, 216, 'netral', 8, NULL),
(218, 'Apakah anda mengalami mual atau muntah beberapa hari ini?', NULL, 217, 'false', NULL, NULL),
(219, 'Apakah anda merasakan buang air besar yang sering dan feses terlihat encer?', NULL, 218, 'netral', 9, NULL),
(220, 'Apakah anda merasakan mual atau muntah beberapa hari ini?', NULL, 219, 'false', NULL, NULL),
(221, 'Apakah berak terlihat encer dan berulang secara terus menerus?', NULL, 220, 'netral', 11, NULL),
(222, 'Apakah anda merasakan kembung dan mual atau muntah?', NULL, 221, 'false', NULL, NULL),
(223, 'Apakah anda merasakan nyeri pada bagian uluh hati?', NULL, 222, 'netral', 15, 10),
(224, 'Apakah anda merasakan nyeri dada?', 2, NULL, NULL, NULL, NULL),
(225, 'Apakah anda merasakan sesak nafas dan gangguan tenggorokan?', NULL, 224, 'netral', 1, NULL),
(226, 'Apakah anda mengalami demam?', NULL, 225, 'false', NULL, NULL),
(227, 'Apakah anda merasakan sakit perut dan sering berkeringat dingin?', NULL, 226, 'netral', 10, NULL),
(228, 'Apakah anda mengalami mual atau muntah beberapa hari ini?', NULL, 227, 'false', NULL, NULL),
(229, 'Apakah anda merasakan buang air besar yang sering dan feses terlihat encer?', NULL, 228, 'netral', 9, NULL),
(230, 'Apakah anda mengalami migran dan hilangnya kesadaran?', NULL, 229, 'false', NULL, NULL),
(231, 'Apakah anda merasakan nyeri kepala dan memiliki pandangan yang kabur?', NULL, 230, 'netral', 6, NULL),
(232, 'Apakah anda mengalami gejala mual atau muntah dan demam?', NULL, 231, 'false', NULL, NULL),
(233, 'Apakah anda merasakan di sekeliling anda menjadi berputar atau bergerak (vertigo)?', NULL, 232, 'netral', 7, NULL),
(234, 'Apakah anda merasa lemas dan tidak nafsu makan?', NULL, 233, 'false', NULL, NULL),
(235, 'Apakah berak terlihat encer dan berulang secara terus menerus?', NULL, 234, 'netral', 11, NULL),
(236, 'Apakah anda mengalami demam atau pusing?', NULL, 235, 'false', NULL, NULL),
(237, 'Apakah anda merasakan bengkak di sekitar gigi dan nyeri pada gigi?', NULL, 236, 'netral', 17, NULL),
(238, 'Apakah anda mengalami demam?', NULL, 237, 'false', NULL, NULL),
(239, 'Apakah anda mengalami hidung meler atau gatal dan bersin?', NULL, 238, 'netral', 4, NULL),
(240, 'Apakah anda mengalami demam tinggi rentang 39derajat – 40derajat yang sangat meningkat?', NULL, 239, 'false', NULL, NULL),
(241, 'Apakah merasa nyeri otot dan sendi?', NULL, 240, 'netral', 12, 2);

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
(1, 'admin', 'admin', 'admin@gmail.com', 'M', '1983-01-01', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0', '', '', '2018-07-02 03:26:12'),
(2, 'ushop', 'ushop', 'ushop@gmail.com', 'male', '1998-12-16', 'e158cfbb057f12c8a1909b36f983601d', 'user', '0', '', '', '2018-07-02 04:30:37'),
(3, 'nami', 'nami', 'nami@gmail.com', 'female', '1998-12-09', '1a34268cf4d5356d69badfc8b53303b4', 'dokter', '0', '', '', '2018-07-02 09:23:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cetak_riwayat`
--
ALTER TABLE `cetak_riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

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
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengguna` (`id_user`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `tahap_pemeriksaan`
--
ALTER TABLE `tahap_pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`),
  ADD KEY `symptoms_id` (`id_gejala`),
  ADD KEY `sickness_true` (`penyakit_benar`),
  ADD KEY `sickness_false` (`penyakit_salah`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `jadwal_login`
--
ALTER TABLE `jadwal_login`
  MODIFY `id_history_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konsul_dokter`
--
ALTER TABLE `konsul_dokter`
  MODIFY `id_konsul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahap_pemeriksaan`
--
ALTER TABLE `tahap_pemeriksaan`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `konsul_dokter_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `konsul_dokter_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `periksa_ibfk_2` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);

--
-- Constraints for table `tahap_pemeriksaan`
--
ALTER TABLE `tahap_pemeriksaan`
  ADD CONSTRAINT `tahap_pemeriksaan_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`),
  ADD CONSTRAINT `tahap_pemeriksaan_ibfk_3` FOREIGN KEY (`penyakit_benar`) REFERENCES `penyakit` (`id_penyakit`),
  ADD CONSTRAINT `tahap_pemeriksaan_ibfk_4` FOREIGN KEY (`penyakit_salah`) REFERENCES `penyakit` (`id_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
