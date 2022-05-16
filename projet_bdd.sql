-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 03 sep. 2020 à 18:24
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `ad_bdd`
--

CREATE TABLE `ad_bdd` (
  `idAd` int(25) NOT NULL,
  `nomAd` tinytext NOT NULL,
  `prenomAd` tinytext NOT NULL,
  `emailAd` longtext NOT NULL,
  `pwdAd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ad_bdd`
--

INSERT INTO `ad_bdd` (`idAd`, `nomAd`, `prenomAd`, `emailAd`, `pwdAd`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$So.kHYJLKUfD6TNvtkgy3uCCIPrdmvZn6GJxf41JE0i1lxw3R7X32');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idComd` int(99) NOT NULL,
  `infoclComd` longtext NOT NULL,
  `adrclComd` longtext NOT NULL,
  `infoprodComd` longtext NOT NULL,
  `prixComd` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idComd`, `infoclComd`, `adrclComd`, `infoprodComd`, `prixComd`) VALUES
(2, 'client(1):huhu&nbsp;huhu<br>numero:0561266547', 'tizi ouzou tizi ouzou', 'prod(1):iPhone SE 2020<br>prod(12):Apple MacBook Pro 16 2019<br>', 372128.33),
(3, 'client(1):huhu&nbsp;huhu<br>numero:0561266547', 'tizi ouzou tizi ouzou', 'prod(14):Sony WH-1000XM3<br>prod(19):Brother MFC-L3750CDW<br>', 86748.9),
(4, 'client(1):huhu&nbsp;huhu<br>numero:0561266547', 'tizi ouzou tizi ouzou', 'prod(14):Sony WH-1000XM3<br>prod(19):Brother MFC-L3750CDW<br>', 86748.9),
(5, 'client(1):huhu&nbsp;huhu<br>numero:0561266547', 'tizi ouzou tizi ouzou', 'prod(9):DELL XPS 13 (2020)<br>prod(6):REALME 6<br>', 239682.38),
(6, 'client(1):huhu&nbsp;huhu<br>numero:0790359118', 'tizi ouzou tizi ouzou', 'prod(23): Brother HL-L2310D<br>prod(17):Technics EAH-AZ70W<br>', 48429.15);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `idProd` int(11) NOT NULL,
  `catProd` tinytext NOT NULL,
  `nomProd` tinytext NOT NULL,
  `prixProd` double NOT NULL,
  `discProd` longtext NOT NULL,
  `imgProd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`idProd`, `catProd`, `nomProd`, `prixProd`, `discProd`, `imgProd`) VALUES
(1, 'PORTABLE', 'iPhone SE 2020', 58736.9, 'Ecran compact de 4,7 pouces et un unique bouton central également utilisé pour Touch ID. Il est équipé d\'un SoC Apple A13 Bionic et un simple capteur photo de 12 mégapixels à l\'arrière.', '5f4798414017d7.86617757.png'),
(2, 'PORTABLE', 'REALME X50 PRO 5G', 75244.65, 'Equipé d\'un SoC Qualcomm Snapdragon 865, épaulé par 6, 8 ou 12 Go de RAM et 128 ou 256 Go de stockage, non extensible. Il possède 4 capteurs photos à l\'arrière, dont le principal à 64 mégapixels. Il bénéficie d\'une batterie de 4200 mAh.', '5f47994ab962a4.10213544.png'),
(3, 'PORTABLE', 'XIAOMI POCO F2 PRO', 42868.98, 'Le Xiaomi Poco F2 Prodispose notamment d\'un SoC Qualcomm Snapdragon 865 compatible 5G épaulé par 6 ou 8 Go de RAM, d\'un écran Super AMOLED Full HD+ et d\'une batterie de 4700 mAh.', '5f479a4b0d5113.74171379.png'),
(4, 'PORTABLE', 'Huawei P30 Pro', 76396.36, 'Annoncé par Huawei en mars 2019. Équipé d\'une puce Kirin 980, il dispose d\'un quadruple capteur photo compatible zoom 10x, d\'un SoC Kirin 980 et d\'un écran de 6,47 pouces.', '5f479ab0a71bb9.05265780.png'),
(5, 'PORTABLE', 'OnePlus Nord', 51058.87, 'Annoncé en juillet 2020,Il est équipé d\'un SoC Qualcomm Snapdragon 765 épaulé par 8 à 12 Go de RAM, un écran AMOLED de 6,44 pouces Full HD+ et 90 Hz et un quadruple capteur photo de 48+8+5+2 mégapixels.', '5f479b43862841.45062466.png'),
(6, 'PORTABLE', 'REALME 6', 29304.47, ' équipé d\'un SoC Qualcomm Snapdragon 730G, épaulé par 6 Go de RAM et 128 Go de stockage, capteur photo principal de 12.2 mégapixels. Il possède une batterie de 3140 mAh.', '5f479bfc4f6646.21486795.png'),
(7, 'PC', 'Asus ExpertBook B9450', 216392.91, 'L\'Asus ExpertBook B9450 est un ultraportable de 14 pouces à moins de 1 kg. Il est équipé d\'un processeur Intel (i5 ou i7 de 10th génération), épaulé par 8 ou 16 Go de RAM et jusqu\'à 2 To de stockage en Raid (2 x 2 SSD de 2 To). Il a une autonomie maximale annoncée de 24 heures et 39 minutes suffisent pour recharger 60 % de son énergie.', '5f479d4bdb46c9.99333022.png'),
(8, 'PC', 'Microsoft Surface Laptop 3', 122720.33, 'Le Surface Laptop 3, c’est l’ordinateur portable « classique » de Microsoft. Pas de charnière magique ici, mais simplement un PC portable fin avec un large touchpad, un clavier et un écran LCD tactile au format 2:3. Pour la troisième génération, Microsoft propose une nouvelle taille, un modèle 15 pouces, en plus du modèle 13,5 pouces.', '5f479d8a66c211.88413123.png'),
(9, 'PC', 'DELL XPS 13 (2020)', 210377.91, 'Core i5 (i7 en option) de 10e génération. Pour le reste aucune différence, on a tous les canons de la gamme XPS. Cela commence par ce fameux écran 13 pouces IPS Full HD+ (1920 x 1200)  « Infinity Edge », aux bordures particulièrement fines. C’est l’élément de design qui fait sortir l’XPS 13 du lot.', '5f479ea96f7614.34129514.png'),
(10, 'PC', 'Apple MacBook Air 2020', 153432.55, 'L\'Apple MacBook Air 2020 est un ordinateur portable officialisé en mars 2020. Il reprend la solution introduite par les derniers MacBook Pro, avec une amélioration du clavier qui s\'inspire de celle introduite par le MacBook Pro 16. Il est équipé d\'un CPU Intel Core i3 ou i5 de dixième génération épaulé par 8 Go de RAM et dispose désormais de 256 ou 512 Go de stockage flash.', '5f479f02a96552.39518872.png'),
(11, 'PC', 'Asus ROG Zephyrus G14', 230212.81, 'Annoncé au CES 2020, le PC portable Asus ROG Zephyrus G14 est orienté gaming. Il est équipé d\'un processeur AMD Ryzen 7 4800HS (Zen 2) et d\'une carte graphique NVIDIA GeForce RTX 2060, épaulé par 32 Go de RAM et 1 To de stockage.', '5f479f4b500986.95975582.png'),
(12, 'PC', 'Apple MacBook Pro 16 2019', 313391.43, 'Le MacBook Pro de 16 pouces a été officialisé en octobre 2019,. Il est équipé d’un écran IPS « Retina » de 16 pouces avec une définition native de 3072 x 1920 pixels, soit 226 pixels par pouces. Ses deux principales nouveautés est un nouveau clavier classique, ainsi qu\'une nouvelle batterie Li-po de 100 Wh.', '5f479f8fac03b5.33425433.png'),
(13, 'ACCESSOIRE', 'BOSE HEADPHONES 700', 40437.6, 'Le casque Bose 700 est un casque circum-aural sans fil avec réduction de bruit active. Il adopte un design très différent de la série Quiet Comfort, mais avec une conception similaire : du similicuir pour recouvrir les mousses à mémoire de forme des oreillettes, du métal pour les coques des oreillettes et pour l\'arceau.', '5f47a0e8385125.13076221.png'),
(14, 'ACCESSOIRE', 'Sony WH-1000XM3', 36982.49, 'Le Sony WH-1000XM3 est un casque sans-fil très populaire circum-aural avec réduction de bruit active. Il est équipé du codec aptX HD (ainsi que AAC, SBC et LDAC) ce qui le différencie des casques Bose. Du côté des connectiques, un port USB-C pour la charge rapide et une sortie jack.', '5f47a1345afd77.05165833.png'),
(15, 'ACCESSOIRE', 'Philips PH805', 22906.11, 'Le Philips ph805 est un casque circum-aural sans fil compatible Hi-Res audio, qui peut se replier et possédant une autonomie annoncée de 31 heures. Sa recharge complète prend environ 2 heures et demi.', '5f47a17050da18.91243313.png'),
(16, 'ACCESSOIRE', 'Samsung Galaxy Watch Active 2', 35702.82, 'La Samsung Galaxy Watch Active 2 est une montre connectée annoncée le 5 août 2019. Disponible en version 40 nm et 44 nm, elle améliore l\'analyse du rythme cardiaque, du stress et du sommeil. Une version compatible 4G est également disponible sur cette version.', '5f47a22e5c4502.25824795.png'),
(17, 'ACCESSOIRE', 'Technics EAH-AZ70W', 35702.82, 'Les écouteurs AZ70W de Technics sont True Wireless et de type intra-auriculaires avec boutons tactiles. Ils possèdent une technologie hybride de double réduction du bruit. Ils sont compatibles avec Siri, Google et Alexa. Leur autonomie maximale annoncée est de 19.5 heures (boîtier de charge comprise) et le temps de recharge total se fait en 4 heures.', '5f47a2cc4a0495.14602890.png'),
(18, 'ACCESSOIRE', 'Amazon Echo Plus', 9469.57, 'L\'Amazon Echo Plus est une variante de l\'enceinte connectée Amazon Echo. Elle est reliée à Amazon Alexa, une intelligence artificielle évolutive et permet d\'accéder à de nombreux services comme Spotify, TuneIn, Uber, Dominos et des services de domotique comme Philips Hue', '5f47a3ce51d522.12419078.png'),
(19, 'IMPRIMANTE', 'Brother MFC-L3750CDW', 49766.41, 'Si vous avez besoin de ce qui se fait de mieux en imprimante laser, alors cette proposition de Brother est ce qu’il vous faut. Elle offre une qualité d’impression élevée et des fonctionnalités plus qu’étendues.', '5f47f69033b398.04851639.jpg'),
(20, 'IMPRIMANTE', ' Canon Pixma TS8250 series', 20473.46, 'Cette imprimante jet d’encre est un bon exemple de polyvalence, ce qui la rend intéressante tant pour les amateurs de photographie que pour les adeptes de bureautique. Elle profite en plus d’une belle variété de fonctionnalités supplémentaires.', '5f47f7a36d0344.81538786.jpg'),
(21, 'IMPRIMANTE', ' Canon Pixma TS6250 series', 37109.18, 'Avec une qualité aussi élevée que celle de sa grande soeur, cette version jet d’encre d’entrée de gamme est une très bonne solution pour les budgets réduits visant la qualité avant tout.', '5f47f7e5768ce3.86725834.jpg'),
(22, 'IMPRIMANTE', ' Canon Pixma G6050', 38262.16, 'Pensée pour l’économie, cette imprimante jet d’encre mise sur un système de réservoirs rechargeables pour présenter un coût d’utilisation proche de ses concurrentes fonctionnant au laser. En parallèle, la qualité est bien sûr au rendez-vous.', '5f47f813998512.08501007.jpg'),
(23, 'IMPRIMANTE', ' Brother HL-L2310D', 12726.33, 'Si vous cherchez à tout prix une solution laser mais que vous ne voulez pas vous ruiner, alors ce modèle monochromatique, basique mais efficace, est idéal.', '5f47f8474a1304.51340636.jpg'),
(24, 'IMPRIMANTE', ' HP LaserJet Pro M254dw', 38262.16, 'Entre sa qualité d’impression élevée et son ergonomie soignée, cette imprimante laser est la meilleure solution avec cette technologie. Elle présente en prime une bonne rapidité, au bénéfice de la productivité.', '5f47f8835484d4.23080318.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUsers` int(25) NOT NULL,
  `nomUsers` tinytext NOT NULL,
  `prenomUsers` tinytext NOT NULL,
  `emailUsers` longtext NOT NULL,
  `pwdUsers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUsers`, `nomUsers`, `prenomUsers`, `emailUsers`, `pwdUsers`) VALUES
(1, 'huhu', 'huhu', 'email@gmail.com', '$2y$10$2pAaClTXtKgvhmS3IlzH/u0.YDZHys5bIeDdcqeua9jmXuN1tUTD6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ad_bdd`
--
ALTER TABLE `ad_bdd`
  ADD PRIMARY KEY (`idAd`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idComd`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProd`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ad_bdd`
--
ALTER TABLE `ad_bdd`
  MODIFY `idAd` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idComd` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `idProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
