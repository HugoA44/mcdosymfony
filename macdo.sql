-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 15 fév. 2021 à 15:47
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `macdo`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210215130129', '2021-02-15 13:01:44', 269),
('DoctrineMigrations\\Version20210215140534', '2021-02-15 14:05:58', 415);

-- --------------------------------------------------------

--
-- Structure de la table `infos_nutrition`
--

CREATE TABLE `infos_nutrition` (
  `id` int(11) NOT NULL,
  `energy` int(11) DEFAULT NULL,
  `fat` int(11) DEFAULT NULL,
  `glucid` int(11) DEFAULT NULL,
  `fiber` int(11) NOT NULL,
  `protein` int(11) NOT NULL,
  `sugar` int(11) NOT NULL,
  `salt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `infos_nutrition`
--

INSERT INTO `infos_nutrition` (`id`, `energy`, `fat`, `glucid`, `fiber`, `protein`, `sugar`, `salt`) VALUES
(1, 232, 12, 19, 1, 12, 4, 1),
(2, 242, 8, 29, 2, 12, 6, 1),
(3, 242, 8, 29, 2, 12, 6, 1),
(4, 259, 13, 19, 1, 15, 4, 1),
(5, 41, 0, 10, 0, 0, 10, 0),
(6, 0, 0, 0, 0, 0, 0, 0),
(7, 35, 1, 4, 0, 2, 4, 0),
(8, 26, 0, 7, 0, 0, 7, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `image`) VALUES
(1, 'American cheese', 'american_cheese_180x180.png'),
(2, 'Big Mac Bun', 'big_mac_bun.png'),
(5, 'Big Mac sauce', 'big_mac_sauce.png'),
(6, 'ketchup', 'ketchup.png'),
(7, 'mustard', 'mustard.png'),
(8, 'pickles', 'pickles.png'),
(9, 'reconstituted onions', 'reconstituted_onions.png'),
(10, 'regular bun', 'regular_bun.png'),
(11, 'shredded lettuce', 'shredded_lettuce.png'),
(12, 'steak', 'steak.png');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `image`, `prix`) VALUES
(1, 'Menu Best Of', 'Petite mise au point sur la viande bovine :\r\n? La viande de nos steaks hachés est 100% pur bœuf et provient de bovins d\'origine française pour 51,27% (chiffres et estimations sur base des volumes de produits achetés en 2015). Le volume restant provient de', 'bestof.png', 0),
(2, 'Menu Maxi Best Of', 'Petite mise au point sur la viande bovine :\r\n? La viande de nos steaks hachés est 100% pur bœuf et provient de bovins d\'origine française pour 51,27% (chiffres et estimations sur base des volumes de produits achetés en 2015). Le volume restant provient de', 'maxibestof.png', 0);

-- --------------------------------------------------------

--
-- Structure de la table `menu_product`
--

CREATE TABLE `menu_product` (
  `menu_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nutrition_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `image`, `price`, `type`, `category`, `nutrition_id`) VALUES
(1, 'Big Mac', 'Mouthwatering perfection starts with two 100% pure beef patties and Big Mac® sauce sandwiched between a sesame seed bun. It’s topped off with pickles, crisp shredded lettuce, finely chopped onion and American cheese for a 100% beef burger with a taste lik', 't-mcdonalds-Big-Mac.jpg', 8, 'Burger', NULL, 1),
(2, 'Hambuger', 'The original burger starts with a 100% pure beef burger seasoned with just a pinch of salt and pepper. Then, the McDonald’s burger is topped with a tangy pickle, chopped onions, ketchup and mustard. McDonald’s hamburger contains no artificial flavors, pre', 't-mcdonalds-Hamburger.jpg', 1, 'Burger', NULL, 2),
(7, 'Cheeseburger', 'Our simple, classic cheeseburger begins with a 100% pure beef burger seasoned with just a pinch of salt and pepper. The McDonald’s Cheeseburger is topped with a tangy pickle, chopped onions, ketchup, mustard, and a slice of melty American cheese. It conta', 't-mcdonalds-Cheeseburger.jpg', 2, 'Burger', NULL, 3),
(8, 'Double Cheeseburger', 'The McDonald\'s Double Cheeseburger features two 100% pure beef burger patties seasoned with just a pinch of salt and pepper. It\'s topped with tangy pickles, chopped onions, ketchup, mustard and two slices of melty American cheese. There are 450 calories i', 't-mcdonalds-Double-Cheeseburger.jpg', 4, 'Burger', NULL, 4),
(9, 'Coca Cola ®', 'Coca-Cola® is a refreshing McDonald\'s soda option that complements all of your menu favorites. Have you ever wondered, is Coke® at McDonald’s different?', 't-mcdonalds-Coca-Cola-Classic-Small.jpg', 1, 'Drink', 'Soda', 5),
(10, 'Sprite ®', 'Sprite fountain drink has a delicious lemon-lime taste and is available in sizes Extra Small, Small, Medium, and Large. Sprite is a caffeine-free soft drink and makes the perfect addition to any McDonald’s Combo Meal.', 't-mcdonalds-Sprite-Small.jpg', 1, 'Drink', 'Soda', 6),
(11, 'Hot Chocolate McCafe shaked ', 'Try the McDonald’s Chocolate Shake, the perfect sweet treat for any time of the day. Our chocolate shake is made with delicious soft serve, chocolate syrup and finished off with a creamy whipped topping. McDonald\'s Chocolate Shake is available in small, m', 't-mcdonalds-Chocolate-McCafe-Shake-Medium.jpg', 2, 'Drink', 'McCafe', 7),
(12, 'Iced tea', 'McDonald’s Iced Tea is made with a brisk blend of orange pekoe black tea, freshly brewed and served ice cold. McDonald’s Unsweet Iced Tea is available in extra small, small, medium and large on the McDonald’s drinks menu.', 't-mcdonalds-Iced-Tea-Large.jpg', 1, 'Drink', 'Soda', 8),
(13, 'Vanilla Shake', 'The classic vanilla shake from McDonald’s. It’s made with our creamy vanilla soft serve and topped with whipped topping for a cool, tasty treat. Available in small, medium, and large. Check out all of McDonald’s Shakes and Desserts.', 't-mcdonalds-Vanilla-McCafe-Shake-Medium.jpg', 2, 'Drink', 'McCafe', NULL),
(14, 'McCafé® Pumpkin Spice Latte', 'Enjoy a fall drink perfect for warming up to the crisp autumn air. Our pumpkin spice latte is freshly brewed and spiced to perfection with hints of pumpkin and cinnamon flavors. Espresso made from Rainforest Alliance Certified Beans™ blends with steamed w', 't-mcdonalds-pumpkin-spice-latte.jpg', 1, 'Drink', 'McCafe', NULL),
(15, 'Fanta® Orange', 'McDonald’s Fanta® Orange is a caffeine-free soft drink full of bubbly, refreshing orange flavor. Fanta® soda is part of McDonald’s $1 Any Size Soft Drinks on the $1 $2 $3 Dollar Menu. Available in extra small, small, medium, and large fountain drink sizes', 't-mcdonalds-fanta-orange.jpg', 1, 'Drink', NULL, NULL),
(16, 'Hamburger Happy Meal®', 'McDonald\'s Hamburger Happy Meal includes a juicy hamburger with kid-sized World Famous Fries® and apple slices. Then pick a kid’s drink: 1% Low Fat Milk Jug, reduced sugar* chocolate milk, DASANI® Water or Honest Kids® Appley Ever After® Organic Juice Dri', 'h-mcdonalds-Hamburger.jpeg', 4, 'Happy Meal', NULL, NULL),
(17, '6 Piece Chicken McNuggets® Happy Meal', 'Enjoy a McDonald’s Happy Meal® and get six tender Chicken McNuggets® made with white meat with kid-sized World Famous Fries and a side of Apple Slices. Then pick a kids’ drink: 1% Low Fat Milk Jug, Reduced Sugar Low Fat Chocolate Milk Jug, DASANI® Water o', 'mcdonalds-Chicken-McNuggets-Mighty-Kids-Meals.jpeg', 6, 'Happy Meal', NULL, NULL),
(18, '4 Piece Chicken McNuggets® Happy Meal', 'Grab a McDonald’s Happy Meal® and get four tender Chicken McNuggets® made with white meat with kid-sized World Famous Fries and a side of Apple Slices. Then pick a kids’ drink: 1% Low Fat Milk Jug, Reduced Sugar Low Fat Chocolate Milk Jug, DASANI® Water o', 'h-mcdonalds-Chicken-McNuggets.jpeg', 4, 'Happy Meal', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `productMenu`
--

CREATE TABLE `productMenu` (
  `id` int(11) NOT NULL,
  `idMenu` int(11) DEFAULT NULL,
  `idProduct` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product_ingredients`
--

CREATE TABLE `product_ingredients` (
  `product_id` int(11) NOT NULL,
  `ingredients_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product_ingredients`
--

INSERT INTO `product_ingredients` (`product_id`, `ingredients_id`) VALUES
(1, 1),
(1, 2),
(1, 5),
(1, 8),
(1, 9),
(1, 11),
(1, 12),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 12),
(7, 1),
(7, 6),
(7, 7),
(7, 8),
(7, 9),
(7, 10),
(7, 12),
(8, 1),
(8, 6),
(8, 7),
(8, 8),
(8, 9),
(8, 10),
(8, 12);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `infos_nutrition`
--
ALTER TABLE `infos_nutrition`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu_product`
--
ALTER TABLE `menu_product`
  ADD PRIMARY KEY (`menu_id`,`product_id`),
  ADD KEY `IDX_5B911913CCD7E912` (`menu_id`),
  ADD KEY `IDX_5B9119134584665A` (`product_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D34A04ADB5D724CD` (`nutrition_id`);

--
-- Index pour la table `productMenu`
--
ALTER TABLE `productMenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idProductMenu` (`idProduct`),
  ADD KEY `fk_idMenu` (`idMenu`);

--
-- Index pour la table `product_ingredients`
--
ALTER TABLE `product_ingredients`
  ADD PRIMARY KEY (`product_id`,`ingredients_id`),
  ADD KEY `IDX_E74F8F504584665A` (`product_id`),
  ADD KEY `IDX_E74F8F503EC4DCE` (`ingredients_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `infos_nutrition`
--
ALTER TABLE `infos_nutrition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `productMenu`
--
ALTER TABLE `productMenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `menu_product`
--
ALTER TABLE `menu_product`
  ADD CONSTRAINT `FK_5B9119134584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5B911913CCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04ADB5D724CD` FOREIGN KEY (`nutrition_id`) REFERENCES `infos_nutrition` (`id`);

--
-- Contraintes pour la table `productMenu`
--
ALTER TABLE `productMenu`
  ADD CONSTRAINT `FK_7073D848C3F36F5F` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_7073D848EF8640D` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`id`);

--
-- Contraintes pour la table `product_ingredients`
--
ALTER TABLE `product_ingredients`
  ADD CONSTRAINT `FK_E74F8F503EC4DCE` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E74F8F504584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;
