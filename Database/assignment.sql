-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 02:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(6) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_icon` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `admin_name`, `admin_password`, `admin_icon`) VALUES
(1, 'admin', 'admin123', 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `comment_date` date NOT NULL DEFAULT current_timestamp(),
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentID`, `userID`, `postID`, `comment_date`, `message`) VALUES
(1, 1, 1, '2020-04-09', 'Hello!!'),
(2, 4, 2, '2022-04-06', 'OMG!! Obito I\'m your fans!!! You are insane!!!!!! Love you so much.'),
(3, 8, 2, '2022-04-06', 'Wait what, how come obito appear in this agriculture community. '),
(4, 15, 4, '2015-04-14', 'Can I ?'),
(5, 21, 3, '2022-04-06', 'Very interesting topic. Hope to see more.'),
(6, 21, 6, '2014-04-03', 'As I know, electricity first became a power source on farms in Japan and Germany in the early 1900s right.'),
(7, 21, 5, '2022-04-06', 'I see'),
(8, 21, 1, '2022-04-06', 'Hi!!!!!!'),
(10, 21, 3, '2022-04-13', 'hihi'),
(11, 21, 3, '2022-04-13', 'holoah'),
(12, 21, 2, '2022-04-15', 'hihi'),
(13, 2, 26, '2022-04-18', 'hi hi everyone'),
(14, 2, 6, '2022-04-18', 'wow');

-- --------------------------------------------------------

--
-- Table structure for table `crop`
--

CREATE TABLE `crop` (
  `crop_ID` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `crop_name` varchar(50) NOT NULL,
  `body` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crop`
--

INSERT INTO `crop` (`crop_ID`, `image`, `crop_name`, `body`) VALUES
(1, 'wheat.jpg', 'Wheat', 'Wheat is a grass that is commonly farmed for its seed, which is a cereal grain that is a global staple meal. The genus Triticum includes various wheat species, the most common of which being common wheat.'),
(2, 'corns.jpg', 'Corn', 'Corn, commonly known as maize, is a starchy food that comes in the form of kernels on a cob wrapped in a husk. Corn is a popular vegetable that often receives a poor name due to its high natural sugar and glucose content. But don\'t neglect this multipurpose vegetable\'s health advantages.'),
(3, 'potato.jpg', 'Potato', 'The potato is a root vegetable native to the Americas that is a starchy tuber of the plant Solanum tuberosum. The plant is a perennial of the nightshade Solanaceae family. They are now a staple food in many regions of the world, as well as an essential component of much of the world\'s food supply.  Potatoes are edible tubers that are accessible all year. They are quite inexpensive to raise, are high in nutrients, and may be used to make a tasty delicacy. Because of the growing interest in low-ca'),
(4, 'download.jpg', 'Sweet Potato', 'The sweet potato (Ipomoea batatas) is a dicotyledonous plant in the Convolvulaceae family, which also includes bindweed and morning glory. Its big, starchy, sweet-tasting (pumpkin-like) tuberous roots are eaten as a root vegetable. Young shoots and leaves are occasionally consumed as greens. Sweet potato cultivars have been developed to produce tubers with varying hues of flesh and skin. The sweet potato (Solanum tuberosum) is only distantly related to the common potato (Solanum tuberosum), as both are members of the Solanales order.'),
(5, 'yam.jpg', 'Yam', 'The popular name for several plant species in the genus Dioscorea (family Dioscoreaceae) that produce edible tubers is yam. Yams are perennial herbaceous vines used for their starchy tubers in many temperate and tropical locations, including West Africa, South America and the Caribbean, Asia, and Oceania. Because of the different cultivars and related species, the tubers, commonly known as \"yams,\" occur in a range of shapes and sizes.'),
(6, 'mungbean.jpg', 'Mung Bean', 'Mung bean is a plant species that belongs to the legume family. The mung bean is mostly grown in East, Southeast, and South Asia. It may be found in both savory and sweet recipes. It is a form of pulse with a high nutritional balance and a lot of vitamins and minerals. According to preliminary study, these beans may provide a number of health advantages.'),
(7, 'cucumber.jpg', 'Cucumber', 'Cucumber (Cucumis sativus) is a popular creeping vine plant in the Cucurbitaceae family that produces cylindrical fruits that are eaten as vegetables. Cucumbers originated in South Asia, but they are currently grown on most continents due to the worldwide market\'s need for a variety of cucumber varieties.'),
(8, 'tomato.jpg', 'Tomato', 'The tomato is the edible berry of the plant Solanum Lycopersicon, often known as the tomato plant. The species originates in western South America and Central America. The Mexican Nahuatl word tomatl gave rise to the Spanish term tomate, from which the English word tomato was derived. Its domestication and usage as a cultivated food may have begun with the indigenous peoples of Mexico.'),
(9, 'carrot.jpg', 'Carrot', 'The carrot (Daucus carota subsp. sativus) is a root vegetable that is primarily orange in color, however purple, black, red, white, and yellow cultivars exist, all of which are domesticated variants of the wild carrot, Daucus carota, native to Europe and Southwestern Asia. The plant is said to have originated in Persia and was initially farmed for its leaves and seeds. The taproot is the most widely consumed component of the plant, while the stems and leaves are also consumed. Domestic carrots have been carefully developed for their much larger, more edible, and less woody-textured taproot.'),
(10, 'garlic.jpg', 'Garlic', 'Garlic (Allium sativum) is a bulbous flowering plant species of the genus Allium. It is related to the onion, shallot, leek, chive, Welsh onion, and Chinese onion, among others. It is native to Central Asia and northern Iran and has been used as a seasoning for thousands of years, having a human consumption and usage history spanning several thousand years. It was known to the ancient Egyptians and was used as a culinary flavoring as well as a traditional remedy.'),
(11, 'chili pepper.jpg', 'Chili Pepper', 'Chili peppers (also chile, chile pepper, chilli pepper, or chilli), from Nahuatl chlli, are variants of the berry-fruit of plants in the genus Capsicum, members of the nightshade family Solanaceae, grown for their pungency. Chili peppers are frequently used as a spice in various cuisines to impart \"heat\" to foods. Capsaicin and related chemicals known as capsaicinoids are the components that give chili peppers their spiciness when consumed or applied topically. Bell peppers (UK: sweet peppers) are another kind of capsicum, however unlike chili peppers, which are pungent to varied degrees, bell peppers are not'),
(12, 'pineapple.jpg', 'Pineapple', 'The pineapple (Ananas comosus) is a tropical plant with edible fruit and the most economically important plant in the Bromeliaceae family. The pineapple is native to South America, where it has been grown for millennia. When the pineapple was introduced to Europe in the 17th century, it became a prominent cultural emblem of wealth. Pineapple has been cultivated commercially in greenhouses and on numerous tropical farms since the 1820s.'),
(13, 'coffee.jpg', 'Coffee', 'A coffee bean is a seed of the Coffea plant that is used to make coffee. It is the pip within the red or purple fruit known as a cherry. The coffee fruit, like regular cherries, is classified as a stone fruit. Despite the fact that coffee beans are not actually beans, they are referred to as such due to their similarity to genuine beans. The fruits, usually cherries or berries, have two stones with flat sides together. A small fraction of cherry have a solitary seed rather than the normal two. This is known as a \"peaberry.\" The peaberry occurs only 10% to 15% of the time, and there is a widely held idea that they have greater flavor than regular coffee beans.'),
(14, 'sugarcane.jpg', 'Sugar Cane', 'Sugarcane, often known as sugar cane, is a kind of tall, perennial grass (in the genus Saccharum, tribe Andropogoneae) used for sugar production. The plants grow to be 2–6 m (6–20 ft) tall, with strong, jointed, fibrous stalks rich in sucrose that accumulates in the stalk internodes. Sugarcanes are a member of the grass family Poaceae, which also contains maize, wheat, rice, and sorghum, as well as numerous forage crops. It is endemic to India, Southeast Asia, and New Guinea, where it grows in mild temperate and tropical climates.'),
(15, 'blackpepper.jpg', 'Black Pepper', 'Black pepper (Piper nigrum) is a flowering vine in the Piperaceae family that is grown for its fruit, known as a peppercorn, which is often dried and consumed as a spice and condiment. The fruit is a drupe (stonefruit) that is about 5 mm (0.20 in) in diameter (fresh and completely developed), dark red, and has a stone that carries a single pepper seed. Peppercorns and the ground pepper obtained from them can be referred to as pepper in general, or as black pepper (boiled and dried unripe fruit), green pepper (dried unripe fruit), or white pepper in particular (ripe fruit seeds). Black pepper is indigenous to India\'s Malabar Coast, where it is widely farmed, as well as in other tropical places.'),
(16, 'kangkung1.jpg', 'Water Spinach', 'Ipomoea aquatica, often known as kangkong (sometimes written kangkung) or water spinach, is a semi-aquatic, tropical plant used for its delicate shoots as a vegetable. Water Spinach is said to have been domesticated initially in Southeast Asia. It is widely grown in Southeast Asia, East Asia, and South Asia. It thrives near streams and requires little to no maintenance.'),
(17, 'onion.jpg', 'Onion', 'The onion (Allium cepa L., from Latin cepa, which means \"onion\"), commonly known as the bulb onion or common onion, is the most frequently farmed member of the genus Allium. The shallot is a botanical variant of the onion that was previously classed as a distinct species until 2010. Garlic, scallion, leek, chive, and Chinese onion are close cousins. Onions are grown and utilized all over the world. They are often served cooked, as a vegetable or as part of a prepared savory meal, although they may also be eaten raw or used to create pickles or chutneys. When sliced, they have a strong odor and contain chemicals that can irritate the eyes.'),
(18, 'broccoli.jpg', 'Broccoli ', 'Broccoli is a delicious green plant in the cabbage family (family Brassicaceae, genus Brassica) that is grown for its enormous blooming head, stem, and tiny accompanying leaves. Broccoli is a member of the Italica cultivar group of the Brassica oleracea species. Broccoli features big dark green blossom heads grouped in a tree-like arrangement spreading out from a tall light green stalk. The flower heads are encircled by foliage. Broccoli is similar to cauliflower, a separate but closely related cultivar group of the same Brassica plant.'),
(19, 'napacabbage.jpg', 'Napa Cabbage', 'Napa cabbage is a variety of Chinese cabbage that originated around the Beijing area of China and is popular in East Asian cuisine. It has also become a common crop in Europe, the Americas, and Australia since the twentieth century. It is known as \"Chinese cabbage\" in many parts of the world. The first evidence of napa cabbage cultivation dates back to the 15th century in China\'s Yangtze River area. Beginning in the nineteenth century with the Chinese exodus, it spread throughout the rest of Asia, Europe, America, and Australia.'),
(20, 'coco.jpg', 'Cocoa Bean', 'The cocoa bean, also known as the cacao bean or cacao, is a dried and completely fermented seed of Theobroma cacao from which cocoa solids and cocoa butter may be extracted. The cacao tree is native to the Amazon rainforest.');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `post_like` int(255) NOT NULL,
  `post_date` date NOT NULL DEFAULT current_timestamp(),
  `post_img` varchar(500) DEFAULT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postID`, `title`, `content`, `post_like`, `post_date`, `post_img`, `userID`) VALUES
(1, 'Hi guys!!', 'Hope to learn more agriculture knowledge here. ', 7, '2022-04-08', 'img5.jpg', 21),
(2, 'YO Wassup guys!', 'I\'M Obito. I\'m here to find Kakashi. Did anyone see him ?', 3, '2022-04-08', NULL, 21),
(3, 'The Art and Science of Agriculture', 'For thousands of years, agricultural development was very slow. One of the earliest agricultural tools was fire. Native Americans used fire to control the growth of berry-producing plants, which they knew grew quickly after a wildfire. Farmers cultivated small plots of land by hand, using axes to clear away trees and digging sticks to break up and till the soil.', 14, '2022-04-08', NULL, 3),
(4, 'Tan Zhong is here to find a girlfriend!!!', 'Anyone can be my girlfriend!! At least she is a girl.', 100, '2022-04-08', NULL, 6),
(5, 'Machinery', 'A period of important agricultural development began in the early 1700s for Great Britain and the Low Countries (Belgium, Luxembourg, and the Netherlands, which lie below sea level). New agricultural inventions dramatically increased food production in Europe and European colonies, particularly the United States and Canada.', 23, '2022-04-08', NULL, 10),
(6, 'Agricultural Science\r\n', 'In the early 1900s, an average farmer in the U.S. produced enough food to feed a family of five. Many of today’s farmers can feed that family and a hundred other people. \r\nBy the late 1950s, most farmers in developed countries were using both gasoline and electricity to power machinery. Tractors had replaced draft animals and steam-powered machinery. Farmers were using machines in almost every stage of cultivation and livestock management.', 2, '2022-04-08', 'img4.jpg', 18),
(7, 'Agriculture the best', 'Letss goooooo', 1, '2022-04-08', 'joao-marcelo-marques-Qp0lt8ehfjg-unsplash.jpg', 21);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp(),
  `gender` varchar(6) NOT NULL,
  `email` varchar(500) NOT NULL,
  `icon` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `fname`, `lname`, `dob`, `gender`, `email`, `icon`) VALUES
(1, 'lneilan0', '0fv2gc0', 'Laina', 'Neilan', '2024-03-13', 'Female', 'lneilan0@va.gov', 'pf1.jpg'),
(2, 'pburel1', '1pZErR20XE', 'Pembroke', 'Burel', '2022-04-12', 'Male', 'pburel1@nyu.edu', 'pf2.jpg'),
(3, 'nstroband2', 'WguP3sIA', 'Niles', 'Stroband', '2015-02-15', 'Male', 'nstroband2@trellian.com', 'pf3.jpg'),
(4, 'nwhitelock3', '97wgLsB', 'Naoma', 'Whitelock', '2027-12-14', 'Female', 'nwhitelock3@live.com', 'pf32.jpg'),
(5, 'nbeardshall4', 'ptCJ5f', 'Neville', 'Beardshall', '2024-08-18', 'Male', 'nbeardshall4@nps.gov', 'pf4.jpg'),
(6, 'hpregel5', 'CWW9HMgGCo', 'Haroun', 'Pregel', '2019-05-15', 'Male', 'hpregel5@weibo.com', 'pf5.jpg'),
(7, 'tpendlington6', '7qLHirKCHlAH', 'Tabina', 'Pendlington', '0000-00-00', 'Female', 'tpendlington6@tripod.com', 'pf6.jpg'),
(8, 'ccopins7', 'lbyVmBs7Mg', 'Chandler', 'Copins', '0000-00-00', 'Male', 'ccopins7@tumblr.com', 'pf8.jpg'),
(9, 'ecrippen8', 's6iSNu1C3W', 'Earvin', 'Crippen', '2018-04-15', 'Male', 'ecrippen8@addtoany.com', 'pf9.jpg'),
(10, 'gredparth9', 'rb8GMS', 'Granville', 'Redparth', '2015-10-13', 'Male', 'gredparth9@tinypic.com', 'profile.jpg'),
(11, 'bbarrowcliffa', '1XARw3G8', 'Basil', 'Barrowcliff', '0000-00-00', 'Male', 'bbarrowcliffa@drupal.org', 'profile.jpg'),
(12, 'lcourageb', 'dkdta3', 'Logan', 'Courage', '2017-02-17', 'Male', 'lcourageb@guardian.co.uk', 'pf10.jpg'),
(13, 'scollimorec', 'Z8SwAoCHou', 'Sidoney', 'Collimore', '2031-10-17', 'Female', 'scollimorec@hhs.gov', 'pf11.jpg'),
(14, 'fjeavonsd', 'XgRTZ6', 'Frederick', 'Jeavons', '2024-11-17', 'Male', 'fjeavonsd@ihg.com', 'profile.jpg'),
(15, 'abriggee', '9XN52yb', 'Ammamaria', 'Brigge', '2025-04-18', 'Female', 'abriggee@barnesandnoble.com', 'profile.jpg'),
(16, 'vkearfordf', '92BiLAW', 'Valli', 'Kearford', '2019-10-14', 'Female', 'vkearfordf@de.vu', 'pf12.jpg'),
(17, 'cgilyottg', 'Uugg9UkuAiwI', 'Chase', 'Gilyott', '0000-00-00', 'Male', 'cgilyottg@desdev.cn', 'pf13.jpg'),
(18, 'isevitth', 'ykOg7ex', 'Irwinn', 'Sevitt', '2025-02-21', 'Male', 'isevitth@woothemes.com', 'pf14.jpg'),
(19, 'churlesi', 'rc0Wq4PB', 'Camey', 'Hurles', '0000-00-00', 'Male', 'churlesi@google.co.uk', 'pf15.jpg'),
(20, 'scudiffj', '4je07j5', 'Selia', 'Cudiff', '2026-09-14', 'Female', 'scudiffj@sitemeter.com', 'profile.jpg'),
(21, 'obito', '12345', 'Obito', 'Uchiha', '1926-02-17', 'Male', 'obito@gmail.com', 'pf7.jpg ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `crop`
--
ALTER TABLE `crop`
  ADD PRIMARY KEY (`crop_ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `crop`
--
ALTER TABLE `crop`
  MODIFY `crop_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
