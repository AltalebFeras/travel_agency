-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 09, 2024 at 11:38 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Beach Holidays', 'Relaxing vacations by the sea with sun, sand, and surf.'),
(2, 'Adventure Travel', 'Exciting trips for adrenaline junkies seeking thrill and excitement.'),
(3, 'Cultural Tours', 'Immersive journeys to explore diverse cultures, traditions, and heritage sites.'),
(4, 'Wildlife Safaris', 'Experiences to observe and appreciate the wonders of the natural world.'),
(5, 'Urban Exploration', 'Discovering the vibrant energy and unique charm of cities around the globe.'),
(6, 'Wellness Retreats', 'Rejuvenating escapes focused on health, relaxation, and self-care.'),
(7, 'Eco-Tourism', 'Responsible travel promoting conservation, sustainability, and environmental awareness.'),
(8, 'Food and Wine Tours', 'Gastronomic adventures to savor delicious cuisines and fine wines.'),
(9, 'Historical Journeys', 'Journeys through time to explore the rich history and heritage of civilizations.'),
(10, 'Mountain Expeditions', 'Challenging treks and climbs to conquer majestic peaks and breathtaking landscapes.');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status_id` int DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4C62E6386BF700BD` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

DROP TABLE IF EXISTS `destination`;
CREATE TABLE IF NOT EXISTS `destination` (
  `id` int NOT NULL AUTO_INCREMENT,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`id`, `country`, `city`, `image`) VALUES
(1, 'Thailand', 'Bangkok', 'https://images.unsplash.com/photo-1523731407965-2430cd12f5e4?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(2, 'United Arab Emirates', 'Dubai', 'https://images.unsplash.com/flagged/photo-1559717201-fbb671ff56b7?q=80&w=1471&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(3, 'Netherlands', 'Amsterdam', 'https://images.unsplash.com/photo-1534351590666-13e3e96b5017?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(4, 'Argentina', 'Buenos Aires', 'https://images.unsplash.com/photo-1610135206707-0f03e4800631?q=80&w=1287&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(5, 'Turkey', 'Istanbul', 'https://images.unsplash.com/photo-1527838832700-5059252407fa?q=80&w=1298&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(6, 'Czech Republic', 'Prague', 'https://images.unsplash.com/photo-1600623471616-8c1966c91ff6?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(7, 'South Korea', 'Seoul', 'https://images.unsplash.com/photo-1570191913384-7b4ff11716e7?q=80&w=1287&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(8, 'Canada', 'Vancouver', 'https://images.unsplash.com/photo-1559510904-60bd53ecb973?q=80&w=1537&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(9, 'Singapore', 'Singapore', 'https://images.unsplash.com/photo-1542114740389-9b46fb1e5be7?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(10, 'Hungary', 'Budapest', 'https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(20).webp'),
(11, 'Italy', 'Florence', 'https://images.unsplash.com/photo-1537366057310-3501fc868fd8?q=80&w=1315&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(12, 'USA', 'San Francisco', 'https://images.unsplash.com/photo-1501594907352-04cda38ebc29?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(13, 'Japan', 'Kyoto', 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(14, 'Austria', 'Vienna', 'https://images.unsplash.com/photo-1516550893923-42d28e5677af?q=80&w=1472&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(15, 'Morocco', 'Marrakech', 'https://images.unsplash.com/photo-1587974928442-77dc3e0dba72?q=80&w=1524&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(16, 'Germany', 'Berlin', 'https://images.unsplash.com/photo-1566404791232-af9fe0ae8f8b?q=80&w=1336&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(17, 'New Zealand', 'Auckland', 'https://images.unsplash.com/photo-1577581739644-d302d8ca8392?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(18, 'Russia', 'Moscow', 'https://images.unsplash.com/photo-1513326738677-b964603b136d?q=80&w=1349&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(19, 'Ireland', 'Dublin', 'https://images.unsplash.com/photo-1602797882193-51cb0e037534?q=80&w=1473&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(20, 'Sweden', 'Stockholm', 'https://images.unsplash.com/photo-1588653818221-2651ec1a6423?q=80&w=1471&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(21, 'Iceland', 'Reykjavik', 'https://images.unsplash.com/photo-1474690870753-1b92efa1f2d8?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(22, 'Portugal', 'Lisbon', 'https://images.unsplash.com/photo-1558102400-72da9fdbecae?q=80&w=1396&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(23, 'Greece', 'Santorini', 'https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff?q=80&w=1438&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(24, 'Syria', 'Damascus', 'https://images.unsplash.com/photo-1636052494749-8a6e647efe88?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(25, 'Peru', 'Machu Picchu', 'https://images.unsplash.com/photo-1587595431973-160d0d94add1?q=80&w=1476&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(26, 'USA', 'Miami', 'https://i.ibb.co/QXJ7xQS/miami.jpg'),
(27, 'France', 'Paris', 'https://i.ibb.co/gZWXRhT/paris.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240509084127', '2024-05-09 08:41:34', 569);

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
CREATE TABLE IF NOT EXISTS `reply` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reservation_id` int DEFAULT NULL,
  `content` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FDA8C6E0B83297E7` (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reply_to_conatct_request`
--

DROP TABLE IF EXISTS `reply_to_conatct_request`;
CREATE TABLE IF NOT EXISTS `reply_to_conatct_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `contact_id` int DEFAULT NULL,
  `content` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D8519DE4E7A1254A` (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `trip_id` int DEFAULT NULL,
  `status_id` int DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_42C84955A5BC2E0E` (`trip_id`),
  KEY `IDX_42C849556BF700BD` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Unread'),
(2, 'Read'),
(3, 'Received & Reviewed'),
(4, 'Under Review'),
(5, 'Confirmed'),
(6, 'Declined'),
(7, 'Rejected'),
(8, 'Invitation Sent'),
(9, 'In Progress'),
(10, 'Marked as SPAM');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

DROP TABLE IF EXISTS `trip`;
CREATE TABLE IF NOT EXISTS `trip` (
  `id` int NOT NULL AUTO_INCREMENT,
  `destination_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure` datetime NOT NULL,
  `coming_back` datetime NOT NULL,
  `description` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7656F53B816C6140` (`destination_id`),
  KEY `IDX_7656F53BA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`id`, `destination_id`, `user_id`, `name`, `departure`, `coming_back`, `description`, `price`) VALUES
(1, 7, 3, 'Romantic Getaway', '2024-09-16 22:49:00', '2024-09-22 02:30:00', 'Escape with your loved one to a romantic paradise filled with love and serenity.', 288),
(2, 12, 3, 'Cultural Experience', '2025-04-12 18:09:00', '2025-04-18 17:59:00', 'Immerse yourself in the rich cultural heritage of diverse communities and traditions.', 1914),
(3, 15, 3, 'Adventure Expedition', '2024-09-21 12:09:00', '2024-09-24 00:55:00', 'Embark on an adrenaline-fueled journey through untamed landscapes and thrilling escapades.', 1680),
(4, 21, 3, 'Historical Journey', '2025-03-16 10:20:00', '2025-03-22 12:39:00', 'Travel back in time to explore the wonders and mysteries of ancient civilizations.', 717),
(5, 24, 3, 'Nature Exploration', '2024-09-14 20:52:00', '2024-09-22 00:58:00', 'Discover the breathtaking beauty and tranquility of pristine natural landscapes.', 1915),
(6, 9, 3, 'Urban Escape', '2024-10-08 14:57:00', '2024-10-21 12:18:00', 'Indulge in the vibrant energy and endless possibilities of bustling city life.', 843),
(7, 3, 3, 'Foodie Adventure', '2024-07-13 19:36:00', '2024-07-23 22:58:00', 'Savor the flavors and delights of gastronomic wonders from around the world.', 734),
(8, 2, 3, 'Relaxing Retreat', '2025-04-18 15:26:00', '2025-04-24 09:19:00', 'Rejuvenate your mind, body, and soul in a blissful sanctuary of peace and relaxation.', 1785),
(9, 20, 3, 'Family Vacation', '2024-06-03 00:19:00', '2024-06-12 19:04:00', 'Create unforgettable memories with your loved ones on a fun-filled family adventure.', 908),
(10, 23, 3, 'Beach Paradise', '2025-02-12 14:42:00', '2025-02-17 01:21:00', 'Bask in the sun and soak up the laid-back vibes of a tropical beach paradise.', 1463),
(11, 22, 3, 'Mountain Adventure', '2024-12-25 00:59:00', '2025-01-08 21:21:00', 'Challenge yourself to conquer towering peaks and rugged terrain in the heart of the mountains.', 1685),
(12, 16, 3, 'Safari Expedition', '2024-10-01 04:18:00', '2024-10-05 05:48:00', 'Embark on an epic safari adventure and witness the awe-inspiring beauty of wild animals in their natural habitat.', 224),
(13, 14, 3, 'City Tour', '2024-05-19 21:20:00', '2024-05-31 16:54:00', 'Discover the hidden gems and iconic landmarks of bustling cities on an immersive city tour.', 1277),
(14, 25, 3, 'Luxury Escape', '2024-11-16 10:16:00', '2024-11-29 18:15:00', 'Indulge in the ultimate luxury experience and pamper yourself with opulent accommodations and exquisite amenities.', 1710),
(15, 13, 3, 'Spiritual Retreat', '2024-08-05 23:39:00', '2024-08-17 00:07:00', 'Find inner peace and enlightenment on a spiritual journey of self-discovery and reflection.', 961),
(16, 6, 3, 'Road Trip', '2024-09-15 20:05:00', '2024-09-18 11:21:00', 'Hit the open road and embark on an epic road trip filled with adventure and unforgettable experiences.', 501),
(17, 11, 3, 'Winter Wonderland', '2025-02-03 04:17:00', '2025-02-16 17:48:00', 'Embrace the magic of winter in a snowy wonderland filled with festive cheer and snowy landscapes.', 1126),
(18, 18, 3, 'Tropical Getaway', '2024-07-02 05:12:00', '2024-07-06 13:17:00', 'Escape to a tropical paradise of palm-fringed beaches and crystal-clear waters.', 195),
(19, 10, 3, 'Artistic Discovery', '2024-09-02 11:15:00', '2024-09-12 08:54:00', 'Immerse yourself in the vibrant world of art and creativity as you explore galleries and art districts.', 1389),
(20, 19, 3, 'Wellness Retreat', '2024-08-01 11:54:00', '2024-08-05 05:12:00', 'Nurture your body, mind, and soul on a rejuvenating wellness retreat focused on holistic healing.', 1331),
(21, 1, 3, 'Wildlife Safari', '2024-07-02 10:30:00', '2024-07-07 23:03:00', 'Embark on a thrilling wildlife safari and encounter majestic creatures in their natural habitat.', 101),
(22, 8, 3, 'Scenic Drive', '2024-05-09 08:28:00', '2024-05-16 01:12:00', 'Take the scenic route and soak in breathtaking views of picturesque landscapes and charming villages.', 943),
(23, 17, 3, 'Hiking Expedition', '2024-11-20 00:14:00', '2024-11-26 22:02:00', 'Challenge yourself to new heights on an exhilarating hiking expedition through rugged terrain and stunning vistas.', 514),
(24, 4, 3, 'Photography Tour', '2024-09-21 19:17:00', '2024-10-05 18:30:00', 'Capture the beauty of the world through the lens of your camera on a photography tour.', 518),
(25, 5, 3, 'Shopping Spree', '2024-09-22 17:01:00', '2024-09-25 02:16:00', 'Indulge in retail therapy and shop till you drop in the world\'s most iconic shopping destinations.', 622),
(26, 26, 1, 'Miami Discovery', '2024-05-23 17:40:00', '2024-06-06 20:40:00', 'Explore the enchanting beauty of coastal regions on a journey filled with seaside charm and maritime wonders. From rugged cliffs to sandy shores, picturesque fishing villages to bustling harbors, this trip offers a delightful blend of coastal exploration and cultural discovery.', 2349),
(27, 27, 1, 'Parisian Adventure', '2024-05-30 18:00:00', '2024-06-28 08:40:00', 'Experience the romance and charm of the City of Light on a Parisian adventure. Stroll along the Seine River, marvel at iconic landmarks like the Eiffel Tower and Notre-Dame Cathedral, and indulge in delectable French cuisine at quaint cafes and gourmet restaurants. Explore world-class museums, wander through charming neighborhoods, and immerse yourself in the vibrant culture and history of this captivating metropolis.', 1299);

-- --------------------------------------------------------

--
-- Table structure for table `trip_category`
--

DROP TABLE IF EXISTS `trip_category`;
CREATE TABLE IF NOT EXISTS `trip_category` (
  `trip_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`trip_id`,`category_id`),
  KEY `IDX_AE1D2AD1A5BC2E0E` (`trip_id`),
  KEY `IDX_AE1D2AD112469DE2` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip_category`
--

INSERT INTO `trip_category` (`trip_id`, `category_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 9),
(1, 10),
(2, 3),
(2, 4),
(2, 7),
(2, 9),
(3, 2),
(3, 4),
(3, 5),
(3, 7),
(3, 8),
(3, 9),
(4, 1),
(4, 3),
(4, 6),
(4, 8),
(4, 9),
(5, 2),
(5, 5),
(6, 2),
(6, 3),
(6, 7),
(6, 9),
(6, 10),
(7, 1),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 9),
(8, 4),
(8, 7),
(8, 8),
(8, 10),
(9, 2),
(9, 5),
(9, 6),
(9, 9),
(9, 10),
(10, 1),
(10, 3),
(10, 4),
(10, 6),
(10, 7),
(10, 8),
(11, 4),
(11, 5),
(11, 9),
(11, 10),
(12, 1),
(12, 3),
(12, 5),
(12, 6),
(12, 9),
(13, 3),
(13, 7),
(13, 10),
(14, 3),
(14, 5),
(14, 6),
(14, 7),
(14, 9),
(14, 10),
(15, 1),
(15, 3),
(15, 5),
(15, 7),
(15, 8),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(16, 6),
(16, 7),
(16, 8),
(16, 10),
(17, 1),
(17, 6),
(17, 7),
(17, 8),
(17, 10),
(18, 1),
(18, 3),
(18, 5),
(18, 8),
(18, 9),
(19, 3),
(19, 4),
(19, 5),
(19, 7),
(19, 8),
(19, 9),
(20, 1),
(20, 2),
(20, 5),
(20, 6),
(20, 10),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(21, 5),
(21, 8),
(21, 10),
(22, 1),
(22, 4),
(22, 5),
(22, 7),
(22, 8),
(22, 10),
(23, 2),
(23, 6),
(23, 8),
(23, 10),
(24, 2),
(24, 3),
(24, 4),
(24, 8),
(25, 3),
(25, 4),
(25, 7),
(25, 9),
(25, 10),
(26, 1),
(26, 9),
(27, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `telephone`, `email`, `roles`, `is_verified`, `password`) VALUES
(1, 'Feras', 'The admin', '02125465489', 'feras@gmail.com', '[\"ROLE_ADMIN\"]', 0, '$2y$13$QcFplItvIT67fXhm3pQJ9ehXbFp8GF5F6t..yKeJmIX8/tEYmDUvS'),
(2, 'Sam', 'The editor', '546544658', 'altalib@mail.com', '[]', 0, '$2y$13$NWWIkw07qtwLCRgQY7qSG.OjqLUIDg6uXxIbe8B/uD1aTQavQbQ7e'),
(3, 'Joseph', 'From fixture', '4654853255', 'fixture@fixture.fix', '[]', 0, '$2y$13$1wIorsoL38dHWvM8c8axl.219ZSgsE/wRLc7z5gAKEE46SWH/h8hu');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_4C62E6386BF700BD` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `FK_FDA8C6E0B83297E7` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`);

--
-- Constraints for table `reply_to_conatct_request`
--
ALTER TABLE `reply_to_conatct_request`
  ADD CONSTRAINT `FK_D8519DE4E7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_42C849556BF700BD` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `FK_42C84955A5BC2E0E` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`id`);

--
-- Constraints for table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `FK_7656F53B816C6140` FOREIGN KEY (`destination_id`) REFERENCES `destination` (`id`),
  ADD CONSTRAINT `FK_7656F53BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `trip_category`
--
ALTER TABLE `trip_category`
  ADD CONSTRAINT `FK_AE1D2AD112469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AE1D2AD1A5BC2E0E` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
