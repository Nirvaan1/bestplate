-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  lun. 20 déc. 2021 à 21:16
-- Version du serveur :  8.0.18
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bestplate`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `dish_id` int(11) DEFAULT NULL,
  `statu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `note` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526C148EB0CB` (`dish_id`),
  KEY `IDX_9474526C5D83CC1` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `description`, `date`, `dish_id`, `statu`, `name`, `entity`, `state_id`, `note`) VALUES
(4, 'La cuisine Française au top !!!', '2021-12-02 14:12:27', NULL, 'approuver', 'Bastien', 'state', 2, 5),
(5, 'Les meilleurs recettes sont ici  : )', '2021-12-06 14:13:19', NULL, 'approuver', 'Bob', 'state', 2, 4),
(6, 'Le pays des Pizzas', '2021-12-06 14:16:19', NULL, 'approuver', 'Miguelle', 'state', 3, 5),
(7, 'Un maffé il n\'y a que ça de vrai', '2021-12-06 14:17:37', NULL, 'approuver', 'Check', 'state', 4, 3),
(8, 'Un bon restaut Liban c\'est toujours plus cool', '2021-12-06 14:18:27', NULL, 'approuver', 'Bob', 'state', 1, 2),
(10, 'J\'adore', '2021-12-06 14:23:38', 26, 'approuver', 'Mario', 'dish', NULL, 4),
(11, 'Difficile le résultat est a revoir', '2021-12-06 14:24:38', 27, 'approuver', 'Check', 'dish', NULL, 1),
(14, 'Trés bon plat Végetarien !!!', '2021-12-06 18:28:19', 30, 'approuver', 'Robert', 'dish', NULL, 4),
(15, 'Plat trés agréable et facile ;)', '2021-12-07 13:49:28', 30, 'approuver', 'Mario', 'dish', NULL, 4),
(17, 'Liasse a désirer...', '2021-12-06 13:45:21', 27, 'approuver', 'Larry', 'dish', NULL, 2),
(18, 'Love', '2021-12-06 16:15:01', 27, 'approuver', 'Superman', 'dish', NULL, 4),
(22, 'La cuisine Marocaine est top !', '2021-12-06 18:59:38', NULL, 'approuver', 'Raoul', 'state', 8, 4),
(23, 'La cuisine Algérienne reste meilleur ;)', '2021-12-07 19:01:47', NULL, 'approuver', 'Karim', 'state', 8, 2),
(24, 'Très bonne pizza', '2021-12-07 19:39:41', 29, 'approuver', 'Luigi', 'dish', NULL, 4),
(25, 'Pas évident', '2021-12-07 19:40:01', 29, 'approuver', 'Laurent', 'dish', NULL, 2),
(26, 'Au top', '2021-12-07 19:40:15', 29, 'approuver', 'Yuri', 'dish', NULL, 4),
(27, 'Pas mal !!', '2021-12-07 19:40:42', 28, 'approuver', 'Fily', 'dish', NULL, 3),
(28, 'Brillant', '2021-12-07 19:40:55', 28, 'approuver', 'Claude', 'dish', NULL, 4),
(29, 'Super', '2021-12-07 19:41:06', 28, 'approuver', 'Thomas', 'dish', NULL, 5),
(30, 'Un peut long', '2021-12-07 19:41:26', 16, 'approuver', 'Thomas', 'dish', NULL, 2),
(31, 'Pas si top', '2021-12-07 19:41:49', 16, 'approuver', 'Aurélie', 'dish', NULL, 1),
(32, 'Ce n\'est pas la vrai recette...', '2021-12-07 19:42:14', 16, 'approuver', 'Marie', 'dish', NULL, 2),
(33, 'hmmmmmm !', '2021-12-07 19:42:35', 29, 'approuver', 'Elisa', 'dish', NULL, 5),
(34, 'Super', '2021-12-07 19:43:09', 29, 'approuver', 'Sabrina', 'dish', NULL, 3),
(35, 'Rien à dire, je devient végétarien', '2021-12-07 19:44:07', 30, 'approuver', 'Yury', 'dish', NULL, 4),
(36, 'j\'aime beaucoup', '2021-12-07 19:45:03', 30, 'approuver', 'Karim', 'dish', NULL, 3),
(37, 'Au top', '2021-12-07 19:45:26', 14, 'approuver', 'Tom', 'dish', NULL, 5),
(38, 'Pas évident', '2021-12-07 19:45:49', 8, 'approuver', 'Franck', 'dish', NULL, 2),
(39, 'Manque d\'éxplication', '2021-12-07 19:46:27', 8, 'approuver', 'Illan', 'dish', NULL, 2),
(40, 'La vrai recette des tortilla', '2021-12-07 19:46:47', 15, 'approuver', 'Robin', 'dish', NULL, 4),
(41, 'au Top', '2021-12-07 19:47:05', 15, 'approuver', 'Paul', 'dish', NULL, 4),
(42, 'Très bon', '2021-12-07 19:47:26', 13, 'approuver', 'Ivan', 'dish', NULL, 4),
(43, 'excellent', '2021-12-07 19:47:40', 13, 'approuver', 'Marc', 'dish', NULL, 4),
(44, 'Un classic', '2021-12-07 19:47:59', 7, 'traitement', 'Mario', 'dish', NULL, 4),
(45, 'la base', '2021-12-07 19:48:18', 7, 'traitement', 'Rob', 'dish', NULL, 3),
(46, 'Bon plat espagnol', '2021-12-07 19:48:50', 9, 'approuver', 'Franco', 'dish', NULL, 3),
(47, 'J\'adore les gaufres !!!', '2021-12-07 18:22:38', 1, 'approuver', 'Elisa', 'dish', NULL, 4);

-- --------------------------------------------------------

--
-- Structure de la table `dish`
--

DROP TABLE IF EXISTS `dish`;
CREATE TABLE IF NOT EXISTS `dish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stateId` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(855) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `activeTime` double NOT NULL,
  `bakingTime` double NOT NULL,
  `service` double NOT NULL,
  `mealTypeId` int(11) DEFAULT NULL,
  `userId` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_957D8CB85D83CC1` (`stateId`),
  KEY `IDX_957D8CB8BCFF3E8A` (`mealTypeId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dish`
--

INSERT INTO `dish` (`id`, `stateId`, `name`, `description`, `img`, `activeTime`, `bakingTime`, `service`, `mealTypeId`, `userId`) VALUES
(1, 1, 'Gaufre Facile', 'Mangez-les légèrement chaudes avec un peu de sucre glace... Délicieux et sans trop de complexes !!', 'dish_1.jpeg', 15, 2, 4, 4, 15),
(3, 3, 'Pates Sauce Tomates', 'La pasta e patate est une recette qui connaît plusieurs variantes, dont celle-ci à la sauce tomate et à la ricotta de brebis séchée. Une recette qui a souvent accompagné nos repas de famille.\r\nNormalement on prépare les pâtes aux pommes de terre comme un risotto, en cuisant les pâtes directement dans la sauce (souvent composée de carottes, céleri, oignons ou de pancetta) et en ajoutant du bouillon au fur et à mesure.', 'dish_3.jpeg', 10, 8, 4, 1, 14),
(5, 3, 'Pâtes fourrées', 'C\'est une recette raffinée, originale et très facile à faire. Après l\'avoir créée et testée avec diverses variantes, voici la version la plus aboutie. Je recommande uniquement ce type de pâtes pour un meilleur résultat car la pâte est fine et fondante, et le petit goût salé du jambon vient casser le goût assez doux des légumes.', 'dish_5.jpeg', 60, 15, 4, 1, 14),
(6, 2, 'Purée et Champignons', 'Voici une délicieuse version de purée de pommes de terre ! Je n\'avais pas de champignons en boîte, alors j\'ai fait sauter des champignons de Paris avec un peu d\'ail. J\'ai ajouté une tasse d\'eau à la fin et j\'ai laissé cuire les champignons dans l\'eau à feu doux une dizaine de minutes. J\'ai récupéré le jus des champignons que j\'ai mis avec l\'eau pour cuire les pommes de terre, et le reste j\'ai suivi à la lettre la recette.', 'dish_6.jpeg', 30, 10, 2, 1, 10),
(7, 3, 'Pâtes au Pesto', 'Super bon, original, ça change un peu des pâtes à la sauce tomate... j\'ai ajouté des pignons de pin... de plus avec le reste des spaghettis au pesto', 'dish_7.jpeg', 30, 10, 4, 1, 14),
(8, 3, 'Pizza Classic', 'La pizza n’est-elle pas l’une des plus belles inventions culinaires ? Une pâte, les ingrédients de votre choix et le bonheur est au bout des doigts. Parce qu’on aime tous ça et parce qu’on est surtout très sympas, nous vous avons dégoté des recettes à faire pâlir une mama italienne ! Tss tss, on vous voit derrière votre écran… vous vous dites « pourquoi faire ma pizza alors que je peux mettre les pieds sous la table au restaurant ».', 'dish_8.jpeg', 15, 30, 4, 1, 14),
(9, 6, 'Brocolis Potatoes', 'Un gratin est une préparation qui est cuite au four ou dont une partie de la cuisson se passe au four, en utilisant plus particulièrement le gril, ou à la salamandre, de telle sorte qu\'il se forme en surface de la préparation une croûte plus ou moins légère et dorée.', 'dish_9.jpeg', 30, 25, 2, 1, 15),
(13, 4, 'Riz Boeuf', 'Cet aliment assez rare est toujours cher et fort prisé des connaisseurs. Les ris de veau doivent être dégorgés, puis blanchis, égouttés et rafraîchis. Après refroidissement complet, il faut les parer puis les mettre sous presse au frais. Les ris se cuisinent le plus souvent braisés.', 'dish_13.jpeg', 30, 45, 4, 1, 12),
(14, 4, 'Riz sénégalais', 'Très bonne recette malgré que je n\'avais jamais mangé de poireaux ba en fin de compte ça ne m\'a pas dérangé le fait que le poireau prenne tout le goût.', 'dish_14.jpeg', 10, 30, 2, 1, 12),
(15, 7, 'Tortilla', 'Une tortilla est une galette préparée à base de maïs, dans la cuisine mexicaine et d\'Amérique centrale, où elle est un aliment de base depuis l\'Antiquité.\r\nDans le nord du Mexique et dans la cuisine tex-mex, la farine de maïs est remplacée par de la farine de blé additionnée de saindoux ou de graisse végétale. Ces tortillas de blé sont parfois très légèrement salées1,2, ce qui n\'est pas le cas des tortillas de maïs.', 'dish_15.jpeg', 15, 5, 2, 2, 15),
(16, 1, 'Riz Libanais', 'Le petit déjeuner peut être sucré (kenafé), ou bien salé (du labné, yaourt égoutté ressemblant du fromage frais), des mana\'ich (des petites pizzas sans tomate) au zaatar (thym), au fromage, ou au yaourt séché, le kechek. Il existe aussi des pizzas à la viande, les sfihas ou des bouchées aux épinards, nommées fata\'ir. Il est également fréquent de manger au petit déjeuner des œufs avec de la viande et de la graisse de mouton, plat portant le nom de kawarma.\r\nUn petit déjeuner végétarien comportera aussi du foul moudammass (fèves avec de l\'ail et du citron ou du sfeir, sorte d\'agrume moins acide que le citron et très fruité), des légumes (tomates, oignons doux, olives)', 'dish_16.jpeg', 15, 20, 4, 1, 10),
(26, 6, 'Crêpe Matin', 'Le matafan, ou matefaim, est une ancienne recette paysanne qu\'on retrouve sur l\'ensemble du territoire de locution du francoprovençal, aussi bien dans le Dauphiné, que dans le Forez ou en Savoie. Le terme désigne actuellement tantôt un type de galette tantôt un type de crêpe', 'dish_26.jpeg', 10, 15, 2, 2, 10),
(27, 8, 'Gallete Oriental', 'La forme de la galette et de la structure varie dans le monde entier. En Grande - Bretagne, les crêpes sont souvent azyme et ressemblent à un crépon . En Amérique du Nord, un agent est utilisé levante (généralement la cuisson en poudre ). Crêpes américaines sont semblables à Scotch crêpes ou déposer des scones . Une crêpe est une fine Breton crêpes d\'origine française cuite sur un ou deux côtés dans une poêle spéciale ou Crêpière pour obtenir un réseau lacelike de fines bulles. Une variation provenant de bien connue Europe du Sud est un palačinke , une crêpe mince humide frit sur les deux côtés et rempli de confiture, fromage à la crème, du chocolat ou les noix au sol, mais beaucoup d\' autres plombages sucrées ou salées peuvent également être utilisés.', 'dish_27.jpeg', 30, 10, 4, 2, 12),
(28, 7, 'Oeuf Potatoes', 'Veillez à ce que les \'potatoes\' soient bien séparées dans la poêle pour qu\'elles ne collent pas entre elles. L\'assaisonnement est donné à titre indicatif, mais laissez courir votre imagination!! Dégustez les \'potatoes\' immédiatement après la cuisson pour qu\'elles ne ramollissent pas (enlevez l\'huile superflue en les disposant sur un essui-tout). Accompagnent idéalement les beignets de poulet, poissons panés... Mais aussi les viandes grillées et volailles rôties.', 'dish_28.jpeg', 15, 30, 4, 2, 10),
(29, 3, 'Pizza Vegan', 'Vous aimez les pizzas mais au restaurant, à part la quatre fromages, votre choix est vite limité par votre régime végétarien ? Réalisez des pizzas maison avec tous les ingrédients que vous aimez … et ciao la viande ou le poisson ! Une pizza végétarienne : un pari fou ? Pas tant que ça, on a stimulé notre créativité et au final, notre sélection, ce n\'est rien que des recettes colorées, des pizzas aux légumes de saison et mille et une saveurs qui changent de la margherita et de la regina. Le but, c\'est toujours de se faire plaisir, alors tout est permis pour la garniture de votre pizza végétarienne : du fromage et des épices, des fruits comme les pommes ou les figues et des légumes comme la courgette et la tomate qui feront de beaux mariages pour faire une pizza végétarienne délicieuse. On a aussi pensé que vous voudriez les faire dans vos menus de la semaine alors promis, elles sont rapides et faciles. Faites chauffer les fours, les pizzas sont presque prêtes !', 'dish_29.jpeg', 30, 15, 4, 1, 14),
(30, 1, 'Tortilla façon Vegetarienne', 'La tortilla de patatas est une variété d\'omelette épaisse garnie de pommes de terre et typiquement espagnole. La recette traditionnelle est avec oignons.', 'dish_30.jpeg', 15, 20, 4, 2, 10);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(855) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id`, `name`, `unit`, `img`) VALUES
(1, 'Farine', 'gramme', 'https://assets.afcdn.com/recipe/20200116/106606_w100h100c1cx182cy256cxt0cyt0cxb364cyb512.png'),
(2, 'Sucre', 'gramme', 'https://assets.afcdn.com/recipe/20170607/67691_w100h100c1cx350cy350.jpg'),
(3, 'Lait', 'cl', 'https://assets.afcdn.com/recipe/20170607/67388_w100h100c1cx350cy350.jpg'),
(4, 'Oeuf', 'nombre', 'https://assets.afcdn.com/recipe/20170607/67505_w100h100c1cx350cy350.jpg'),
(5, 'Huile', 'cl', 'https://assets.afcdn.com/recipe/20170607/67717_w100h100c1cx1777cy2231.jpg'),
(6, 'Sel', 'gramme', 'https://assets.afcdn.com/recipe/20170607/67687_w100h100c1cx350cy350.jpg'),
(7, 'Pomme de Terre', 'nombre', 'https://assets.afcdn.com/recipe/20170607/67419_w100h100c1cx350cy350.jpg'),
(8, 'Lardon', 'gramme', 'https://assets.afcdn.com/recipe/20170607/67477_w100h100c1cx350cy350.jpg'),
(9, 'Fromage', 'gramme', 'https://assets.afcdn.com/recipe/20170607/67516_w100h100c1cx350cy350.jpg'),
(10, 'Concentrer Tomate', 'gramme', 'https://assets.afcdn.com/recipe/20170607/67663_w100h100c1cx350cy350.jpg'),
(15, 'Pois-Chiche', 'gramme', 'https://assets.afcdn.com/recipe/20170621/69132_w100h100c1.jpg'),
(16, 'Feves', 'gramme', 'https://assets.afcdn.com/recipe/20170607/67507_w100h100c1cx350cy350.jpg'),
(17, 'Oignons', 'nombre', 'https://assets.afcdn.com/recipe/20170607/67621_w100h100c1cx350cy350.jpg'),
(18, 'Butternut', 'nombre', 'https://assets.afcdn.com/recipe/20170621/68974_w100h100c1.jpg'),
(19, 'Créme-Fraiche', 'gramme', 'https://assets.afcdn.com/recipe/20170607/67763_w100h100c1cx350cy350.jpg'),
(20, 'Aubergine', 'nombre', 'https://assets.afcdn.com/recipe/20170607/67479_w100h100c1cx350cy350.jpg'),
(21, 'Tomate', 'nombre', 'https://assets.afcdn.com/recipe/20170607/67459_w100h100c1cx350cy350.jpg'),
(22, 'Poisson', 'gramme', 'https://assets.afcdn.com/recipe/20170607/67518_w100h100c1cx350cy350.jpg'),
(23, 'Poivre', 'gramme', 'https://assets.afcdn.com/recipe/20170607/67563_w100h100c1cx350cy350.jpg'),
(24, 'Pates', 'gramme', 'https://assets.afcdn.com/recipe/20170607/67341_w100h100c1cx350cy350.jpg'),
(25, 'Champignon', 'gramme', 'https://assets.afcdn.com/recipe/20170607/67739_w100h100c1cx350cy350.jpg'),
(26, 'Ail', 'gousse', 'https://assets.afcdn.com/recipe/20170607/67514_w100h100c1cx350cy350.jpg'),
(27, 'Brocolis', 'gramme', 'https://assets.afcdn.com/recipe/20170607/67718_w100h100c1cx1250cy1250.jpg'),
(28, 'Riz', 'gramme', 'https://assets.afcdn.com/recipe/20170607/67667_w100h100c1cx350cy350.jpg'),
(29, 'Cumin', 'gramme', 'https://assets.afcdn.com/recipe/20170607/67483_w100h100c1cx350cy350.jpg'),
(30, 'Salade', 'nombre', 'https://assets.afcdn.com/recipe/20170607/67567_w100h100c1cx350cy350.jpg'),
(31, 'Poulet', 'gramme', 'https://assets.afcdn.com/recipe/20180315/77988_w100h100c1cx2550cy2550cxt0cyt0cxb5100cyb5100.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `iso_country`
--

DROP TABLE IF EXISTS `iso_country`;
CREATE TABLE IF NOT EXISTS `iso_country` (
  `iso` varchar(2) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `iso_country`
--

INSERT INTO `iso_country` (`iso`, `country`) VALUES
('AF', 'Afghanistan'),
('ZA', 'Afrique du sud'),
('AX', 'Åland, îles'),
('AL', 'Albanie'),
('DZ', 'Algérie'),
('DE', 'Allemagne'),
('AD', 'Andorre'),
('AO', 'Angola'),
('AI', 'Anguilla'),
('AQ', 'Antarctique'),
('AG', 'Antigua et barbuda'),
('SA', 'Arabie saoudite'),
('AR', 'Argentine'),
('AM', 'Arménie'),
('AW', 'Aruba'),
('AU', 'Australie'),
('AT', 'Autriche'),
('AZ', 'Azerbaïdjan'),
('BS', 'Bahamas'),
('BH', 'Bahreïn'),
('BD', 'Bangladesh'),
('BB', 'Barbade'),
('BY', 'Bélarus'),
('BE', 'Belgique'),
('BZ', 'Belize'),
('BJ', 'Bénin'),
('BM', 'Bermudes'),
('BT', 'Bhoutan'),
('BO', 'Bolivie, l\'état plurinational '),
('BQ', 'Bonaire, saint eustache et sab'),
('BA', 'Bosnie herzégovine'),
('BW', 'Botswana'),
('BV', 'Bouvet, île'),
('BR', 'Brésil'),
('BN', 'Brunei darussalam'),
('BG', 'Bulgarie'),
('BF', 'Burkina faso'),
('BI', 'Burundi'),
('KY', 'Caïmans, îles'),
('KH', 'Cambodge'),
('CM', 'Cameroun'),
('CA', 'Canada'),
('CV', 'Cap vert'),
('CF', 'Centrafricaine, république'),
('CL', 'Chili'),
('CN', 'Chine'),
('CX', 'Christmas, île'),
('CY', 'Chypre'),
('CC', 'Cocos (keeling), îles'),
('CO', 'Colombie'),
('KM', 'Comores'),
('CG', 'Congo'),
('CD', 'Congo, la république démocrati'),
('CK', 'Cook, îles'),
('KR', 'Corée, république de'),
('KP', 'Corée, république populaire dé'),
('CR', 'Costa rica'),
('CI', 'Côte d\'ivoire'),
('HR', 'Croatie'),
('CU', 'Cuba'),
('CW', 'Curaçao'),
('DK', 'Danemark'),
('DJ', 'Djibouti'),
('DO', 'Dominicaine, république'),
('DM', 'Dominique'),
('EG', 'Égypte'),
('SV', 'El salvador'),
('AE', 'Émirats arabes unis'),
('EC', 'Équateur'),
('ER', 'Érythrée'),
('ES', 'Espagne'),
('EE', 'Estonie'),
('US', 'États unis'),
('ET', 'Éthiopie'),
('FK', 'Falkland, îles (malvinas)'),
('FO', 'Féroé, îles'),
('FJ', 'Fidji'),
('FI', 'Finlande'),
('FR', 'France'),
('GA', 'Gabon'),
('GM', 'Gambie'),
('GE', 'Géorgie'),
('GS', 'Géorgie du sud et les îles san'),
('GH', 'Ghana'),
('GI', 'Gibraltar'),
('GR', 'Grèce'),
('GD', 'Grenade'),
('GL', 'Groenland'),
('GP', 'Guadeloupe'),
('GU', 'Guam'),
('GT', 'Guatemala'),
('GG', 'Guernesey'),
('GN', 'Guinée'),
('GW', 'Guinée bissau'),
('GQ', 'Guinée équatoriale'),
('GY', 'Guyana'),
('GF', 'Guyane française'),
('HT', 'Haïti'),
('HM', 'Heard et îles macdonald, île'),
('HN', 'Honduras'),
('HK', 'Hong kong'),
('HU', 'Hongrie'),
('IM', 'Île de man'),
('UM', 'Îles mineures éloignées des ét'),
('VG', 'Îles vierges britanniques'),
('VI', 'Îles vierges des états unis'),
('IN', 'Inde'),
('ID', 'Indonésie'),
('IR', 'Iran, république islamique d\''),
('IQ', 'Iraq'),
('IE', 'Irlande'),
('IS', 'Islande'),
('IL', 'Israël'),
('IT', 'Italie'),
('JM', 'Jamaïque'),
('JP', 'Japon'),
('JE', 'Jersey'),
('JO', 'Jordanie'),
('KZ', 'Kazakhstan'),
('KE', 'Kenya'),
('KG', 'Kirghizistan'),
('KI', 'Kiribati'),
('KW', 'Koweït'),
('LA', 'Lao, république démocratique p'),
('LS', 'Lesotho'),
('LV', 'Lettonie'),
('LB', 'Liban'),
('LR', 'Libéria'),
('LY', 'Libye'),
('LI', 'Liechtenstein'),
('LT', 'Lituanie'),
('LU', 'Luxembourg'),
('MO', 'Macao'),
('MK', 'Macédoine, l\'ex république you'),
('MG', 'Madagascar'),
('MY', 'Malaisie'),
('MW', 'Malawi'),
('MV', 'Maldives'),
('ML', 'Mali'),
('MT', 'Malte'),
('MP', 'Mariannes du nord, îles'),
('MA', 'Maroc'),
('MH', 'Marshall, îles'),
('MQ', 'Martinique'),
('MU', 'Maurice'),
('MR', 'Mauritanie'),
('YT', 'Mayotte'),
('MX', 'Mexique'),
('FM', 'Micronésie, états fédérés de'),
('MD', 'Moldova, république de'),
('MC', 'Monaco'),
('MN', 'Mongolie'),
('ME', 'Monténégro'),
('MS', 'Montserrat'),
('MZ', 'Mozambique'),
('MM', 'Myanmar'),
('NA', 'Namibie'),
('NR', 'Nauru'),
('NP', 'Népal'),
('NI', 'Nicaragua'),
('NE', 'Niger'),
('NG', 'Nigéria'),
('NU', 'Niué'),
('NF', 'Norfolk, île'),
('NO', 'Norvège'),
('NC', 'Nouvelle calédonie'),
('NZ', 'Nouvelle zélande'),
('IO', 'Océan indien, territoire brita'),
('OM', 'Oman'),
('UG', 'Ouganda'),
('UZ', 'Ouzbékistan'),
('PK', 'Pakistan'),
('PW', 'Palaos'),
('PS', 'Palestinien occupé, territoire'),
('PA', 'Panama'),
('PG', 'Papouasie nouvelle guinée'),
('PY', 'Paraguay'),
('NL', 'Pays bas'),
('PE', 'Pérou'),
('PH', 'Philippines'),
('PN', 'Pitcairn'),
('PL', 'Pologne'),
('PF', 'Polynésie française'),
('PR', 'Porto rico'),
('PT', 'Portugal'),
('QA', 'Qatar'),
('RE', 'Réunion'),
('RO', 'Roumanie'),
('GB', 'Royaume uni'),
('RU', 'Russie, fédération de'),
('RW', 'Rwanda'),
('EH', 'Sahara occidental'),
('BL', 'Saint barthélemy'),
('SH', 'Sainte hélène, ascension et tr'),
('LC', 'Sainte lucie'),
('KN', 'Saint kitts et nevis'),
('SM', 'Saint marin'),
('MF', 'Saint martin(partie française)'),
('SX', 'Saint martin (partie néerlanda'),
('PM', 'Saint pierre et miquelon'),
('VA', 'Saint siège (état de la cité d'),
('VC', 'Saint vincent et les grenadine'),
('SB', 'Salomon, îles'),
('WS', 'Samoa'),
('AS', 'Samoa américaines'),
('ST', 'Sao tomé et principe'),
('SN', 'Sénégal'),
('RS', 'Serbie'),
('SC', 'Seychelles'),
('SL', 'Sierra leone'),
('SG', 'Singapour'),
('SK', 'Slovaquie'),
('SI', 'Slovénie'),
('SO', 'Somalie'),
('SD', 'Soudan'),
('SS', 'Soudan du sud'),
('LK', 'Sri lanka'),
('SE', 'Suède'),
('CH', 'Suisse'),
('SR', 'Suriname'),
('SJ', 'Svalbard et île jan mayen'),
('SZ', 'Swaziland'),
('SY', 'Syrienne, république arabe'),
('TJ', 'Tadjikistan'),
('TW', 'Taïwan, province de chine'),
('TZ', 'Tanzanie, république unie de'),
('TD', 'Tchad'),
('CZ', 'Tchèque, république'),
('TF', 'Terres australes françaises'),
('TH', 'Thaïlande'),
('TL', 'Timor leste'),
('TG', 'Togo'),
('TK', 'Tokelau'),
('TO', 'Tonga'),
('TT', 'Trinité et tobago'),
('TN', 'Tunisie'),
('TM', 'Turkménistan'),
('TC', 'Turks et caïcos, îles'),
('TR', 'Turquie'),
('TV', 'Tuvalu'),
('UA', 'Ukraine'),
('UY', 'Uruguay'),
('VU', 'Vanuatu'),
('VE', 'Venezuela, république bolivari'),
('VN', 'Viet nam'),
('WF', 'Wallis et futuna'),
('YE', 'Yémen'),
('ZM', 'Zambie'),
('ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Structure de la table `meal_type`
--

DROP TABLE IF EXISTS `meal_type`;
CREATE TABLE IF NOT EXISTS `meal_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `meal_type`
--

INSERT INTO `meal_type` (`id`, `type`) VALUES
(1, 'Plat-Principal'),
(2, 'Entrée'),
(3, 'Apéritif'),
(4, 'Désert'),
(5, 'Cocktail');

-- --------------------------------------------------------

--
-- Structure de la table `quantity`
--

DROP TABLE IF EXISTS `quantity`;
CREATE TABLE IF NOT EXISTS `quantity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredients_id` int(11) DEFAULT NULL,
  `dish_id` int(11) DEFAULT NULL,
  `qte` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9FF316363EC4DCE` (`ingredients_id`),
  KEY `IDX_9FF31636148EB0CB` (`dish_id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `quantity`
--

INSERT INTO `quantity` (`id`, `ingredients_id`, `dish_id`, `qte`) VALUES
(1, 1, 1, 200),
(2, 2, 1, 10),
(3, 4, 1, 3),
(4, 6, 1, 2),
(5, 5, 1, 10),
(8, 24, 3, 800),
(14, 21, 3, 5),
(15, 9, 3, 200),
(16, 24, 5, 800),
(17, 4, 5, 6),
(18, 19, 5, 100),
(19, 7, 5, 6),
(20, 25, 6, 200),
(21, 7, 6, 4),
(22, 26, 6, 1),
(23, 16, 6, 200),
(24, 5, 7, 20),
(25, 24, 7, 500),
(26, 23, 7, 10),
(27, 6, 7, 5),
(28, 25, 7, 5),
(29, 1, 8, 200),
(30, 25, 8, 100),
(31, 4, 8, 5),
(32, 19, 8, 50),
(33, 9, 8, 200),
(34, 10, 8, 110),
(35, 27, 9, 500),
(36, 7, 9, 6),
(37, 23, 9, 2),
(38, 5, 9, 10),
(41, 28, 13, 500),
(42, 21, 13, 5),
(43, 5, 13, 10),
(44, 17, 13, 2),
(45, 28, 14, 600),
(46, 29, 14, 10),
(47, 21, 14, 3),
(48, 27, 14, 10),
(49, 4, 15, 4),
(50, 31, 15, 200),
(51, 26, 15, 1),
(52, 6, 15, 2),
(53, 1, 15, 100),
(54, 22, 16, 100),
(55, 28, 16, 500),
(56, 5, 16, 10),
(57, 19, 16, 200),
(58, 3, 26, 200),
(59, 4, 26, 4),
(60, 7, 26, 3),
(61, 1, 27, 200),
(62, 21, 27, 2),
(63, 23, 27, 2),
(64, 19, 27, 30),
(65, 25, 27, 200),
(66, 4, 28, 4),
(67, 7, 28, 10),
(68, 19, 28, 20),
(69, 1, 29, 100),
(70, 4, 29, 6),
(71, 21, 29, 6),
(72, 20, 29, 2),
(73, 19, 29, 200),
(74, 1, 30, 200),
(75, 4, 30, 6),
(76, 7, 30, 4),
(77, 29, 30, 3),
(78, 30, 30, 1),
(81, 25, 30, 150);

-- --------------------------------------------------------

--
-- Structure de la table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(855) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `state`
--

INSERT INTO `state` (`id`, `country`, `flag`, `description`) VALUES
(1, 'Liban', 'https://www.countryflags.com/wp-content/uploads/lebanon-flag-png-large.png', 'Le mezza ou mezzé est un ensemble de plats variés, servis comme entrées sur une table libanaise, généralement à midi ou le soir, et qui sont suivis par le plat principal (qui peut varier de grillades de viande ou poulet, à du riz avec du poulet). Il existe par ailleurs un très grand nombre de plats végétariens au Liban. Les assortiments de plats formant le mezzé sont consommés généralement par petites bouchées saisies à l\'aide d\'un morceau de pain libanais ou d\'une fourchette.'),
(2, 'France', 'https://www.countryflags.com/wp-content/uploads/france-flag-png-large.png', 'La cuisine française fait référence à divers styles gastronomiques dérivés de la tradition française. Elle a évolué au cours des siècles, suivant ainsi les changements sociaux et politiques du pays. Le Moyen Âge a vu le développement de somptueux banquets qui ont porté la gastronomie française à un niveau supérieur, avec une nourriture décorée et fortement assaisonnée par des chefs tel Guillaume Tirel. Au xviie siècle, les habitudes ont changé, avec une utilisation moins systématique des épices et avec le développement de l\'utilisation des herbes aromatiques et de techniques raffinées, initiées par François Pierre de La Varenne et par d\'autres dignitaires de Napoléon Bonaparte, comme Marie-Antoine Carême.'),
(3, 'Italie', 'https://www.countryflags.com/wp-content/uploads/italy-flag-png-large.png', 'La cuisine italienne se caractérise par la variété des produits utilisés, ainsi que par une grande diversité régionale. Elle repose essentiellement sur le régime méditerranéen fait de produits frais, mais aussi d\'éléments n\'en faisant pas partie, comme les fromages ou la charcuterie.'),
(4, 'Senegalaise', 'https://www.countryflags.com/wp-content/uploads/senegal-flag-png-large.png', 'La cuisine sénégalaise est souvent décrite comme la plus riche et la plus variée d\'Afrique de l\'Ouest. Elle présente quelques similitudes avec celles des autres pays de l\'Afrique de l\'Ouest, mais elle a également subi d\'autres influences : Afrique du Nord, France ou Portugal.'),
(5, 'Japon', 'https://www.countryflags.com/wp-content/uploads/japan-flag-png-large.png', 'DescriptionLa cuisine japonaise peut être définie strictement comme la cuisine traditionnelle du Japon, appelée en japonais Nihon ryōri ou washoku précédant l\'ère Meiji, par opposition à la cuisine yōshoku répandue au Japon'),
(6, 'Espagnol', 'https://www.countryflags.com/wp-content/uploads/spain-flag-png-large.png', 'La cuisine espagnole procède, pour l\'essentiel, de commande diète méditerranéenne. La diversité des régions et terroirs de l\'Espagne en fait une cuisine très variée et réputée.'),
(7, 'Colombie', 'https://www.countryflags.com/wp-content/uploads/colombia-flag-png-large.png', 'La cuisine de Colombie est le résultat de la fusion des ingrédients, des pratiques et des traditions culinaires des cultures amérindiennes locales, européennes, africaines et métisses. La diversité de la faune et de la flore en Colombie est à l\'origine d\'une cuisine variée, essentiellement créole.'),
(8, 'Maroc', 'https://www.countryflags.com/wp-content/uploads/morocco-flag-png-large.png', 'La cuisine marocaine est une cuisine méditerranéenne caractérisée par sa variété de plats issus principalement de la cuisine berbère, avec des influences arabes et juives.');

-- --------------------------------------------------------

--
-- Structure de la table `step`
--

DROP TABLE IF EXISTS `step`;
CREATE TABLE IF NOT EXISTS `step` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dish_id` int(11) DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_43B9FE3C148EB0CB` (`dish_id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `step`
--

INSERT INTO `step` (`id`, `dish_id`, `description`, `num`) VALUES
(1, 1, 'Mettre la farine dans un saladier, y ajouter le sucre, les jaunes d\'œufs et le beurre ramolli.', 1),
(2, 1, 'Délayer peu à peu le tout en y ajoutant le lait pour qu\'il n\'y ait pas de grumeaux', 2),
(3, 1, 'Battre les blancs en neige avec une pincée de sel et les ajouter au restant en remuant délicatement.', 3),
(4, 1, 'Cuire le tout dans un gaufrier légèrement beurré.', 4),
(5, 1, 'Bon appétit !!', 5),
(8, 3, 'Tout d’abord, préparez la sauce tomate. Coupez un oignon et faites-le revenir dans une poêle à hauts rebords ou dans une casserole avec de l’huile d’olive, pendant cinq minutes environ. Ajoutez la sauce tomate, un peu d’eau, du sel et du poivre, et faites cuire pendant au moins 30 minutes à feu moyen.', 1),
(9, 3, 'Épluchez les pommes de terre et coupez-les en dés (ni trop grands et pas trop petits). Versez-les dans une casserole, ajoutez de l’eau (suffisamment pour faire cuire les pommes de terre et les pâtes en même temps), et portez à ébullition.', 2),
(12, 3, 'Égouttez le tout, et mélangez avec la sauce tomate, en ajoutant de la ricotta séchée râpée. Servez et ajoutez du fromage râpé.', 4),
(14, 3, 'Ajoutez du gros sel et les pâtes, et faites cuire en suivant le temps de cuisson indiqué sur le paquet.', 3),
(15, 5, 'Remplir une marmite ou une grande casserole avec de l\'eau, le vin blanc, l\'huile d\'olive, et les 2 cubes.', 1),
(16, 5, 'Faire chauffer à feu moyen jusqu\'à dissolution totale des 2 cubes. Laisser bouillir à feu moyen durant tout le temps de la recette.', 2),
(17, 5, 'Lorsque le fond de veau est ajouté directement dans de l\'eau bouillante, il forme des petits résidus au lieu de se dissoudre. Pour éviter cela, mettre la poudre de fond de veau dans un petit récipient (tasse, bol), et ajouter une cuillère à café d\'eau', 3),
(18, 5, 'Éplucher l\'oignon et le couper de manière à former des petits dés aussi fins que possible. Ciseler la coriandre et le basilic. Ajouter tout cela au bouillon, ainsi que le concentré de tomates.', 4),
(19, 5, 'Préparer les légumes : éplucher la courgette et l\'aubergine. Les couper en petits dés. Laver les champignons et les couper en fines rondelles. Sortir les carottes de la boîte de conserve, les laver, les écraser grossièrement. Ajouter tous les légumes découpés au bouillon.', 5),
(20, 6, 'Égoutter les champignons et garder le jus de la boite dans une casserole.', 1),
(21, 6, 'Éplucher les pommes de terre, les laver, les placer dans la casserole avec le jus de champignons, ajouter de l\'eau et un peu de sel, puis faire cuire les pommes de terre.', 2),
(22, 6, 'En attendant, mettre les champignons dans une poêle avec un peu de beurre, sel, poivre et ail, et faire revenir le tout quelques minutes.', 3),
(23, 6, 'Mettre en purée les pommes de terre.', 4),
(24, 6, 'Gardez la moitié d\'eau de cuisson des pommes de terre et y verser le fond de veau.', 5),
(25, 7, 'Cuire les pâtes dans l\'eau salée. Égoutter et réserver 60 ml de l\'eau de cuisson.', 1),
(26, 7, 'Pendant ce temps, préchauffer votre four à 200°C (thermostat 6-7).', 2),
(27, 7, 'Disposer les tomates cerises sur une feuille de papier sulfurisé, face coupée vers le haut. Saler et poivrer avant d\'enfourner 10 minutes ou jusqu\'à ce quelles soient légèrement grillées.', 3),
(28, 8, 'Préchauffer votre four à 220°C.', 1),
(29, 8, 'Pendant ce temps, préparer des copeaux de parmesan à l\'aide d\'un économe et couper la mozzarella en tranches très fines.', 2),
(30, 8, 'Répartir sur la pâte à pizza les tranches de mozzarella à plus de 1 cm du bord et recouvrir de 30g de copeaux de parmesan. Poivrer et parsemer de basilic (ne saler pas la bresaola, est déjà très salée en soi!). Verser un généreux filet d’huile d’olive.', 3),
(31, 8, 'Mettre au four environ 15 minutes, la pizza doit être dorée.', 4),
(32, 9, 'Faire cuire les brocolis surgelés à l\'auto-cuiseur, pendant 6 min, dès sifflement de la soupape.', 1),
(33, 9, 'Disposer les brocolis dans un plat à gratin.', 2),
(34, 9, 'Mélanger le lait, la crème fraiche, la muscade, le sel et le poivre.', 3),
(39, 13, 'Taillez la viande en dés de 3 cm de section. Pelez l\'oignon et les gousses d\'ail, émincez-les finement.', 1),
(40, 13, 'Faites fondre l\'ail et les oignons dans l\'huile dans une cocotte. Ajoutez la viande et laissez dorer quelques minutes. Salez. Relevez avec le paprika.', 2),
(41, 13, 'Mouillez avec la moitié du fond de viande et laissez cuire, à couvert, pendant 30 minutes.', 3),
(42, 13, 'Rincez le riz à l\'eau froide, puis égouttez-le. Ajoutez-le à la viande une fois les 30 minutes écoulées. Mouillez avec le fond de viande restant. Mélangez doucement.', 4),
(43, 14, 'Couper les cuisses de poulet en deux.', 1),
(44, 14, 'Dans une cocotte, mettre à chauffer l\'huile. Une fois bien chaude, plonger les morceaux de poulet dedans et faire dorer.', 2),
(45, 14, 'Ajouter les bouillons cubes écrasés et les oignons émincés. Faire cuire un peu, puis ajouter la tomate, le poivron coupé en petits dés et un peu d\'ail. Laisser cuire 10 mn.', 3),
(46, 15, 'Commencer par paner les blancs de poulet ou escalopes.', 1),
(47, 15, 'Battre les 2 œufs, tremper le poulet dedans et en suite dans de la chapelure.', 2),
(48, 15, 'Les mettre à cuire dans une poêle pendant 10-15 min.', 3),
(49, 15, 'Pendant ce temps, couper la salade, assaisonner le fromage blanc (sel, poivre ).', 4),
(50, 15, 'Une fois que les escalopes sont prêtes, passer les galettes 1 min au micro-ondes.', 5),
(51, 15, 'Étaler le fromage blanc sur la galette. Disposer la salade et l\'emmental (selon les goûts).', 6),
(52, 15, 'Déposer le poulet pané, plier le tout et servir.', 7),
(53, 16, 'Cuire le riz pendant 9 minutes dans l\'eau bouillante salée.', 1),
(54, 16, 'Pendant ce temps là, on passe à la garniture de la salade.\r\nTailler les tomates dans la longueur puis tailler les maïs en deux.\r\nMélanger les tomates et le maïs dans saladier.', 2),
(55, 16, 'Emietter le thon. Penser à conserver l’huile de votre boîte de thon pour\r\nvotre assaisonnement.', 3),
(56, 16, 'Une fois cuit, bien passer le riz sous l’eau froide.\r\nIncorporer le riz dans le saladier et mélanger délicatement.\r\nSaler, poivrer et ajouter les feuilles entières de basilic.', 4),
(57, 16, 'Pour l’assaisonnement, mélanger de l’huile d’olive et l’huile du thon.\r\nSi vous avez du citron à la maison, n’hésitez pas à rajouter quelques zestes et un peu de jus.', 5),
(58, 26, 'Après avoir confectionné les crêpes de vos blanches mains, recouvrez-les de tranches de pomme, de miel (avec parcimonie), de lardons et de tranches de fromage de chèvre et de quelques brins de thym.', 1),
(59, 26, 'Ne pas refermer la crêpe, la passer au four 10 mn. Résultat garanti.', 2),
(60, 27, 'délayer la levure dans 10 cl d\'eau juste tiede\r\nmettre la farine dans un plat avec la semoule et le sel\r\nmélanger', 1),
(61, 27, 'faire un puit\r\nverser les deux cuilleres d\'huile mélanger\r\nla levure délayée et mélanger a nouveau', 2),
(62, 27, 'ajouter en 3 fois le reste de l\'eau en mélangeant\r\nle mélange ne doit pas coller, si sa colle remettre\r\nun peu de semoule tres fine jusqu\'a obtenir une belle boule.', 3),
(63, 28, 'Coupez les pommes de terre en 4 quartiers, sans les éplucher.', 1),
(64, 28, 'Placez-les dans une boîte en plastique (avec couvercle).', 2),
(65, 28, 'Ajoutez l\'huile, les herbes, les épices, le sel et le poivre. Fermez la boîte et secouer afin d\'enrober les pommes de terre.', 3),
(66, 28, 'Ajoutez la farine tamisée, et secouez à nouveau.', 4),
(67, 28, 'Faites chauffer l\'huile dans une poêle profonde.', 5),
(68, 29, 'Mettre 350 g de farine dans un grand saladier puis ajouter successivement le sel, la levure boulangère et l\'huile d\'olive.', 1),
(69, 29, 'Verser petit à petit l\'eau tiède tout en mélangeant avec une cuillère en bois.', 2),
(70, 29, 'Remuer longuement jusqu\'à obtention d\'une pâte qui se détache du saladier.', 3),
(71, 29, 'Laisser reposer la pâte pendant 1h en couvrant le saladier avec un torchon dans un endroit chaud.', 4),
(72, 30, 'Mettre 350 g de farine dans un grand saladier puis ajouter successivement le sel, la levure boulangère et l\'huile d\'olive.', 1),
(73, 30, 'Verser petit à petit l\'eau tiède tout en mélangeant avec une cuillère en bois.', 2),
(74, 30, 'Remuer longuement jusqu\'à obtention d\'une pâte qui se détache du saladier.', 3),
(75, 30, 'Laisser reposer la pâte pendant 1h en couvrant le saladier avec un torchon dans un endroit chaud.', 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `forname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `signInDate` datetime NOT NULL,
  `lastLoginDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `forname`, `lastname`, `email`, `isAdmin`, `pwd`, `signInDate`, `lastLoginDate`) VALUES
(10, 'Jean', 'Guilloux', 'jean@hotmail.fr', 0, '$2y$10$drhRqAHlY2a60s7sNjYzC.4DH/WBSmVfHhsy3GX8QjbFxkfvLcfyi', '2021-12-02 18:25:42', NULL),
(12, 'Alexandre', 'Lerny', 'alexandre@hotmail.fr', 0, '$2y$10$4.30NN6GRBuvvdj17gd2je.K.UCoHl8VeEFbJL5/5JgyIJosunQt6', '2021-12-02 18:26:31', NULL),
(14, 'Mario', 'Luccini', 'mario@lebelge.fr', 0, '$2y$10$/znkml/9dPruqGaSTS3tU.htocjF7tR91ZIddkmRKXQQTrXLLAQuG', '2021-12-02 18:28:12', NULL),
(15, 'Philipe', 'Larond', 'larond@hotmail.fr', 0, '$2y$10$7NRrxDlzgi2mJ/PtodKSCuuNB8bHytFdJ4PRMaNQiRO4Ebkvd7bFC', '2021-12-02 18:33:14', NULL),
(16, 'Nirvaan', 'Guilloux', 'nirvaan@hotmail.fr', 1, '$2y$10$O/uvihp0wbtzI5.NydZdiOnCYlY9BHuQyYEjIQp17FeSbl0C/jlym', '2021-12-02 18:40:11', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `ibfc_dish_1` FOREIGN KEY (`dish_id`) REFERENCES `dish` (`id`),
  ADD CONSTRAINT `ibfc_state_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`);

--
-- Contraintes pour la table `dish`
--
ALTER TABLE `dish`
  ADD CONSTRAINT `FK_957D8CB85D83CC1` FOREIGN KEY (`stateId`) REFERENCES `state` (`id`),
  ADD CONSTRAINT `FK_957D8CB8BCFF3E8A` FOREIGN KEY (`mealTypeId`) REFERENCES `meal_type` (`id`),
  ADD CONSTRAINT `test` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `quantity`
--
ALTER TABLE `quantity`
  ADD CONSTRAINT `FK_9FF31636148EB0CB` FOREIGN KEY (`dish_id`) REFERENCES `dish` (`id`),
  ADD CONSTRAINT `FK_9FF316363EC4DCE` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredient` (`id`);

--
-- Contraintes pour la table `step`
--
ALTER TABLE `step`
  ADD CONSTRAINT `FK_43B9FE3C148EB0CB` FOREIGN KEY (`dish_id`) REFERENCES `dish` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
