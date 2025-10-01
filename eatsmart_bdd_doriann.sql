-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 01 oct. 2025 à 20:55
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eatsmart_bdd_doriann`
--
CREATE DATABASE IF NOT EXISTS `eatsmart_bdd_doriann` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eatsmart_bdd_doriann`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `idArticle` int(11) NOT NULL,
  `nomArticle` varchar(50) DEFAULT NULL,
  `ingredientsArticle` varchar(250) DEFAULT NULL,
  `quantiteArticle` decimal(15,2) DEFAULT NULL,
  `PrixArticle` decimal(15,2) DEFAULT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`idArticle`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idArticle`, `nomArticle`, `ingredientsArticle`, `quantiteArticle`, `PrixArticle`, `idCategorie`) VALUES
(26, 'Chevre miel', 'sauce crème fraîche premium, mozzarella, chevre, miel, olive', '33.00', '13.90', 3),
(24, 'White royale', 'sauce crème fraîche premium, mozzarella, jambon label rouge, champignon brun, olive', '33.00', '13.90', 3),
(22, 'Armenienne', 'sauce crème fraîche premium, mozzarella, viande hachée 100% pur bœuf, oignon rouge, olive', '33.00', '13.90', 3),
(23, 'White royale ', 'sauce crème fraîche premium, mozzarella, jambon label rouge, champignon brun, olive', '23.00', '8.90', 3),
(20, 'Italienne', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, jambon cru IGP, roquette, parmigiano reggiano, olive', '33.00', '16.90', 2),
(21, 'Armenienne', 'sauce crème fraîche premium, mozzarella, viande hachée 100% pur bœuf, oignon rouge, olive', '23.00', '8.90', 3),
(19, 'Italienne', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, jambon cru IGP, roquette, parmigiano reggiano, olive', '23.00', '10.40', 2),
(18, 'Espagnol', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, chorizo de León, poivron, olive', '33.00', '13.90', 2),
(17, 'Espagnol', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, chorizo de León, poivron, olive', '23.00', '8.90', 2),
(16, 'Provencale', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, filets de poulet rôti, oignon rouge, poivron, olive', '33.00', '13.90', 2),
(15, 'Provencale', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, filets de poulet rôti, oignon rouge, poivron, olive', '23.00', '8.90', 2),
(14, 'Vegetarienne', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, roquette, oignon rouge, poivron, champignon brun, olive', '33.00', '13.90', 2),
(13, 'Vegetarienne', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, roquette, oignon rouge, poivron, champignon brun, olive', '23.00', '8.90', 2),
(12, 'Royale', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, jambon label rouge, champignon brun, olive', '33.00', '13.90', 2),
(11, 'Royale', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, jambon label rouge, champignon brun, olive', '23.00', '8.90', 2),
(9, '4 fromages', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, emmental, chevre, roquefort', '23.00', '8.90', 1),
(10, '4 fromages', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, emmental, chevre, roquefort', '33.00', '13.90', 1),
(8, '3 fromages', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, emmental, chevre', '33.00', '12.90', 1),
(7, '3 fromages', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, emmental, chevre', '23.00', '8.40', 1),
(6, 'Margherita', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella', '33.00', '11.90', 1),
(5, 'Margherita', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella', '23.00', '7.90', 1),
(3, 'Emmental', 'sauce tomate premium, origan, huile d\'olive extra vierge, emmental, basilic, olive', '23.00', '7.90', 1),
(4, 'Emmental', 'sauce tomate premium, origan, huile d\'olive extra vierge, emmental, basilic, olive', '33.00', '11.90', 1),
(2, 'Anchois', 'sauce tomate premium, origan, huile d\'olive extra vierge, anchois, olive', '33.00', '11.90', 1),
(1, 'Anchois', 'sauce tomate premium, origan, huile d\'olive extra vierge, anchois, olive', '23.00', '7.90', 1),
(25, 'Chevre miel', 'sauce crème fraîche premium, mozzarella, chevre, miel, olive', '23.00', '8.90', 3),
(27, 'Tiramisu', 'boudoirs imbibés ou non de café, mascarpone, œufs, sucre, arôme vanille, cacao en poudre', NULL, '3.90', 4),
(28, 'Gourmande', 'nutella, avec une glace noix de coco râpé ou chocolat, supplément fruits frais possible', NULL, '6.90', 4),
(29, 'Eaux', 'eaux cristalline, san pellegrino, badoit', NULL, '1.90', 5),
(30, 'Soda 33cl', 'coca original, zero, cherry', NULL, '1.90', 5),
(31, 'Soda 1L+', 'coca, icetea, orangina, sprite, oasis', NULL, '3.00', 5),
(32, 'Biere', 'desperados, heineken', NULL, '3.50', 5),
(33, 'Vin AOP 25cl', 'rouge, rose', NULL, '4.90', 5),
(34, 'Vin AOP 50cl', 'rouge, rose', NULL, '7.50', 5);

-- --------------------------------------------------------

--
-- Structure de la table `assosiation_artcicle_commande`
--

DROP TABLE IF EXISTS `assosiation_artcicle_commande`;
CREATE TABLE IF NOT EXISTS `assosiation_artcicle_commande` (
  `idArticle` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `quantiteArticle` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`idArticle`,`idCommande`),
  KEY `idCommande` (`idCommande`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `assosiation_artcicle_commande`
--

INSERT INTO `assosiation_artcicle_commande` (`idArticle`, `idCommande`, `quantiteArticle`) VALUES
(27, 5, '1.00'),
(33, 5, '1.00'),
(3, 4, '1.00'),
(1, 3, '3.00'),
(7, 5, '1.00'),
(5, 4, '2.00'),
(1, 4, '2.00'),
(5, 2, '1.00'),
(3, 2, '1.00'),
(1, 1, '1.00'),
(1, 2, '1.00');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`) VALUES
(1, 'classic'),
(2, 'tradition'),
(3, 'creme'),
(4, 'dessert maison'),
(5, 'boisson');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL,
  `prixTotal` decimal(15,2) DEFAULT NULL,
  `dateCommande` date DEFAULT NULL,
  `estPret` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCommande`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `prixTotal`, `dateCommande`, `estPret`) VALUES
(1, '7.90', '2024-10-25', 'en Cours'),
(2, '23.20', '2024-10-25', 'en Cours'),
(3, '23.70', '2024-10-25', 'en Cours'),
(4, '34.20', '2024-10-25', 'en Cours'),
(5, '17.70', '2024-10-25', 'en Cours');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
