-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 02:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electramaroc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `IdPrd` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `prixtotal` int(11) NOT NULL,
  `prixunitaire` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `IdCmnd` int(11) NOT NULL,
  `situation` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`IdPrd`, `id`, `prixtotal`, `prixunitaire`, `quantite`, `client`, `IdCmnd`, `situation`) VALUES
(39, 193, 46, 2, 23, 22, 262, 'done'),
(39, 195, 30, 2, 15, 22, 262, 'done');

-- --------------------------------------------------------

--
-- Table structure for table `catégorie`
--

CREATE TABLE `catégorie` (
  `IdCat` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catégorie`
--

INSERT INTO `catégorie` (`IdCat`, `nom`, `description`, `photo`) VALUES
(13, 'headphones', 'Bose Noise Cancelling Headphones 700 – Casque Bluetooth sans fil Supra-Aural avec Microphone Intégré', '3.png'),
(14, 'PHONES', 'Amazon.fr: mobile phones. ... Cher 4500mAh Quad Core, 16Go ROM/SD-128Go, 8MP Caméra, Double SIM Mobi', '71mSoImBQBL._AC_SX679_.jpg'),
(15, 'PC', 'Thomson Ordinateur PC Portable Neo 14,1 Pouces, Intel Celeron N3350, 4Gb RAM, 64Gb Stockage SSD, Win', 'QQQQ.jpg'),
(16, 'KEYBOARD', 'KDJFHDJ Typewriter Wireless Gaming Keyboard Mechanical Keyboard 87 Key Gaming Keypad Blue Switch ave', '410pxTXAPCL._AC_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `IdCl` int(11) NOT NULL,
  `nom complet` varchar(50) NOT NULL,
  `numéro de téléphone` int(11) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `datedecreation` varchar(250) NOT NULL,
  `datedenvoi` varchar(250) NOT NULL,
  `datedelivraison` varchar(250) NOT NULL,
  `idclient` int(11) NOT NULL,
  `prixtotaldelacommande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `datedecreation`, `datedenvoi`, `datedelivraison`, `idclient`, `prixtotaldelacommande`) VALUES
(261, '2023-01-02 11:29:22', '2023-01-04 11:29:22', '2023-01-09 11:29:22', 22, 46),
(262, '2023-01-02 11:51:00', '2023-01-04 11:51:00', '2023-01-09 11:51:00', 22, 30);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `IdPrd` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `codebarre` varchar(50) NOT NULL,
  `prixdachat` int(11) NOT NULL,
  `prixfinal` int(11) NOT NULL,
  `Prixoffre` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `catégorie` int(11) NOT NULL,
  `picProcuct` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`IdPrd`, `libelle`, `codebarre`, `prixdachat`, `prixfinal`, `Prixoffre`, `description`, `catégorie`, `picProcuct`) VALUES
(38, 'Bose Noise Cancelling Headphones 700 – Casque Blue', '', 12, 15, 20, 'Casques et écouteurs: 20,3 cm (H) x 16,5 cm (L) x ', 13, '1.png'),
(39, 'Sony MDR-ZX110B Casque Pliable - Noir', '', 1, 2, 3, 'Diaphragmes de 30 mm en forme de dôme pour un son ', 13, '3.png'),
(40, 'Samsung Galaxy S20 FE «Fan Edition», Téléphone mob', '', 1, 2, 3, 'Le Galaxy S20 FE 5G est un smartphone haut de gamm', 14, '71NbGttIUQL._AC_SX522_.jpg'),
(41, 'CyberpowerPC Gamer Xtreme VR Gaming PC, Intel Core', '', 5, 55, 555, 'System: Intel Core i5-9400F 2.9 GHz 6-Core: Intel ', 15, '71fVpfx5oiL._AC_SX679_.jpg'),
(42, 'Skytech Shiva Gaming PC Desktop - AMD Ryzen 5 2600', '', 6, 66, 666, '✔ AMD Ryzen 5 2600 6-Core 3.4 GHz (3.9 GHz Turbo) ', 15, '810epc7PeYL._AC_SX679_.jpg'),
(43, 'VIBOX - VIII-56 PC Gamer SG-Series', '', 99, 999, 999, 'Vibox VIII-56 PC Gamer SG-Series - 27\" 144Hz Écran', 15, 'viii-56-pc-gamer-sg-series-10964948-726962_2_600x600.jpg'),
(44, 'HyperX Alloy Core RGB – Clavier Gaming Membrane (A', '', 34, 234, 242, 'Barre lumineuse exclusive et effets lumineux RGB d', 16, '61+IicQWwaL._AC_SX679_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `login` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `TYPEACC` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `userPic` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`login`, `Password`, `email`, `TYPEACC`, `id`, `userPic`) VALUES
('admin', 'admin', 'admin@admin.com', 'admin', 1, '486-1664881477.JPG'),
('marwaneaitelhaj001', 'WACwac123', 'marwaneaitelhaj001@gmail.com', 'user', 22, '486-1664881477.jfif'),
('aminemajidi@majidi.com', 'aminemajidi@majidi.com', 'aminemajidi@majidi.com', 'user', 23, 'EL (1).png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdPrd` (`IdPrd`),
  ADD KEY `cart_ibfk_2` (`client`);

--
-- Indexes for table `catégorie`
--
ALTER TABLE `catégorie`
  ADD PRIMARY KEY (`IdCat`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`IdCl`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id client` (`idclient`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`IdPrd`),
  ADD KEY `produit_ibfk_1` (`catégorie`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `catégorie`
--
ALTER TABLE `catégorie`
  MODIFY `IdCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `IdCl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `IdPrd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`IdPrd`) REFERENCES `produit` (`IdPrd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`client`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`catégorie`) REFERENCES `catégorie` (`IdCat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
