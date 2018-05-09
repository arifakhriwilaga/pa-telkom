-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 11:51 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `consul_doctors`
--

CREATE TABLE `consul_doctors` (
  `consul_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `questions` text NOT NULL,
  `answer_status` enum('true','false') NOT NULL,
  `answer` text NOT NULL,
  `send_status` enum('true','false') NOT NULL,
  `read_status` enum('true','false') NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `answer_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `born_date` date NOT NULL,
  `phone` varchar(250) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `name`, `email`, `gender`, `born_date`, `phone`, `created_date`) VALUES
(1, 'Nika Ghea', 'nika21@gmail.com', 'F', '1985-10-06', '089990811303', '2018-03-17 14:16:46'),
(2, 'Yuan Miko', 'mikoyuan@gmail.com', 'M', '1983-01-01', '081211160908', '2018-03-17 14:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `login_histories`
--

CREATE TABLE `login_histories` (
  `login_history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Muntaber', '', '1.	Sebaiknya konsumsi air kelapa karena sangat baik dan bermanfaat bagi penderita kekurangan cairan, air kelapa mengandung banyak mineral dan kalium. Air kelapa diminum sebanyak mungkin jika tidak ada oralit. Kalium dan natrium dibutuhkan unutuk penderita kekurangan cairan dan mineral\r\n2.	Makan-makanan yang bergizi dan tidak makan sembarangan\r\n3.	Mengurangi makan makanan yang beraroma tajam serta menyengat untuk mencegah terjadinya muntah \r\n4.	Minum air cukup sehingga mencegah dehidrasi\r\n5.	Apabila makin parah dengan menunjukkan dua tanda-tanda atau lebih tanda-tanda muntaber atau berak lembek disertai darah atau diare yang terjadi lebih dari satu minggu, bawalah ke rumah sakit terdekat\r\n', '1.	Berikan makanan-makanan lunak seperti bubur, nasi tim dan pisang \r\n2.	Berikan minuman seperti air kelapa, air tajin, air buah atau LGG yang memberikan banyak cairan\r\n3.	Dianjurkan konsumsi yoghurt, apel, sereal dan kentang rebus\r\n4.	Berikan oralit 200 cc, caranya adalah dengan 3 jam pertama 12 gelas, selanjutnya 2 gelas setiap kali mencret \r\n5.	Jangan lupa untuk selalu banyak minum air putih \r\n'),
(2, 'Mual dan muntah', 'Mual dan muntah biasanya merupakan gejala yang bisa disebabkan oleh banyak hal. Mual jarang sekali menjadi pertanda penyakit yang serius atau bahkan mengancam nyawa seseorang. Kondisi ini adalah cara tubuh untuk membuang materi yang mungkin berbahaya dari dalam tubuh.\r\n\r\nMual juga merupakan efek samping dari berbagai macam obat-obatan, termasuk kemoterapi. Selain itu, terjadinya iritasi atau peradangan di dalam perut juga bisa menyebabkan mual dan muntah.\r\n\r\nBerikut ini adalah beberapa kondisi lain yang umumnya menyebabkan rasa mual:\r\n\r\n-Radang usus buntu atau apendisitis.\r\n-Mual pada awal kehamilan atau morning sickness.\r\n-Mabuk laut atau mabuk perjalanan.\r\n-Vertigo.\r\n-Penyakit asam lambung.\r\n', '-Usahakan tetap mengonsumsi cairan meskipun sedikit, agar terhindar dari dehidrasi.\r\n-Hindari mencium bau yang menyengat atau tidak sedap.\r\n-Bagi wanita hamil yang mengalami mual awal kehamilan bisa menjauhi bau makanan atau pemicu-pemicu lain yang menyebabkannya rasa mual makin menjadi-jadi.\r\n-Menghentikan obat yang dikonsumsi melalui mulut. Tapi, tanyakan kepada dokter sebelum menghentikan konsumsi obat-obatan Anda.\r\n-Makan secara perlahan-lahan dan jangan langsung berbaring setelah makan.', '-Disarankan untuk mengonsumsi minuman manis untuk menggantikan kandungan gula yang hilang.\r\n-Makanan yang mengandung garam juga dianjurkan untuk dikonsumsi, supaya dapat mengganti kandungan garam tubuh.\r\n-Konsumsilah makanan lunak dan mudah dicerna.\r\n-Minum larutan penambah cairan tubuh atau oralit untuk menghindari dehidrasi.\r\n-Minum atau makanlah jahe yang bisa secara efektif menangani mual.'),
(3, 'Diare', '', '1.	Jika diare berlangsung lebih dari beberapa minggu bahkan melebihi dari 4 minggu dikatakan diare kronis segeralah periksa kan ke dokter\r\n2.	Hindari produk susu dan makanan yang kaya magnesium, kafein, the\r\n3.	Batasi makanan manis\r\n4.	Sebaiknya wadah air minum tidak tercemar air mentah dari dapur atau pencemar lainnya\r\n5.	Rajin-rajinlah mencuci tangan pake sabun setelah ke toilet\r\n6.	Basuhlah tangan sebelum makan atau memegang makanan\r\n7.	Tidak jajan minuman sembarangan\r\n8.	Selalu konsumsi makanan dan minuman sodium, potassium dan serat', '1.	Minum jus buah tanpa gula tambahan\r\n2.	Konsumsi makanan kaya akan potassium, seperti pisang dan kentang\r\n3.	Konsumsi makanan dan minuman kaya akan sodium, seperti air kaldu, sup, minuman energy dan biscuit asin\r\n4.	Konsumsi makanan akan serat seperti pisang, oatmeal, nasi\r\n5.	Konsumsi yoghurt, daging ayan tanpa kulit dan lemak\r\n6.	Selalu banyak untuk minum air putih'),
(4, 'Ketegangan otot', 'Ketegangan otot perut (spasme abdomen) kerap menjadi penyebab umum terjadinya kram perut. Seseorang yang gemar berolahraga dalam intensitas tinggi, terutama bodybuilding, biasanya lebih sering mengalami kondisi seperti ini.', '', ''),
(5, 'Demam Berdarah Dengue ', '', '1.	Dihindari untuk mengkonsumsi teh, kopi, coklat atau yang berwarna coklat/merah\r\n2.	Dicatat untuk kapan saja ketika kencing dan minum \r\n3.	Dianjurkan untuk banyak makan dan banyak minum air putih\r\n4.	Kalau demam diatas 38derajat berikan parasetamol\r\n5.	Jagalah kebersihan sanitasi lingkungan disekitar rumah, jangan biarkan genangan air yang mungkin menjadi tempat berkembangbiak nyamuk\r\n6.	Sebaiknya bawa ke dokter dan pemeriksaan darah terutama hemaktorit dan trombosit', '1.	Minum air putih yang banyak dan banyak makan\r\n2.	Sebaiknya minum jus jambu yang sangat kaya vitamin C, vitamin B\r\n3.	Kalau bisa harus perlu diinfus agar darah tetap encer\r\n4.	Konsumsi makanan seperti daun papaya, air jahe, air kelapa, bubur, jeruk\r\n5.	Kosumsi buah-buahan seperti semangka, jambu biji, kiwi papaya');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `born_date` date NOT NULL,
  `password` varchar(250) NOT NULL,
  `level_user` varchar(150) NOT NULL,
  `profile_picture` varchar(250) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `name`, `email`, `gender`, `born_date`, `password`, `level_user`, `profile_picture`, `created_date`) VALUES
(1, 'user', 'User Kece', 'user@gmail.com', 'female', '1997-03-08', 'd781eaae8248db6ce1a7b82e58e60435', 'user', '', '2018-05-09 10:22:49'),
(2, 'admin', 'Admin Kece', 'admin@gmail.com', 'female', '1998-12-21', '9c1ad00a16a7c67e2727b471ac969e96', 'admin', '', '2018-05-09 10:23:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consul_doctors`
--
ALTER TABLE `consul_doctors`
  ADD PRIMARY KEY (`consul_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `login_histories`
--
ALTER TABLE `login_histories`
  ADD PRIMARY KEY (`login_history_id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consul_doctors`
--
ALTER TABLE `consul_doctors`
  MODIFY `consul_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_histories`
--
ALTER TABLE `login_histories`
  MODIFY `login_history_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consul_doctors`
--
ALTER TABLE `consul_doctors`
  ADD CONSTRAINT `consul_doctors_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`),
  ADD CONSTRAINT `consul_doctors_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `login_histories`
--
ALTER TABLE `login_histories`
  ADD CONSTRAINT `login_histories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

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
