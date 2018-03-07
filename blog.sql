-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2018 at 04:46 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PHP Tutorials', '2018-02-13 17:00:00', '2018-02-13 17:00:00'),
(2, 'Laravel Tutorials', '2018-02-12 17:00:00', '2018-02-12 17:00:00'),
(3, 'C++', '2018-02-03 17:00:00', '2018-02-03 17:00:00'),
(4, 'People updates', '2018-02-16 07:45:56', '2018-02-16 07:45:56'),
(5, 'Natural', '2018-02-19 21:18:45', '2018-02-19 21:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_21_064432_create_posts_table', 1),
(4, '2018_02_01_052402_add_slug_to_posts', 1),
(5, '2018_02_04_161651_hello', 2),
(6, '2018_02_13_153620_create_categories_table', 3),
(7, '2018_02_13_161231_add_category_id_to_posts', 3),
(8, '2018_02_19_043505_create_tags_table', 4),
(9, '2018_02_19_053433_create_post_tag_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'This is blog laravel 5.5', 'The first blog in the website. Hello', 'blog-laravel', 1, '2018-02-01 01:08:00', '2018-02-01 01:50:51'),
(2, 'Visit London', 'Are you planning to visit London soon? Find free or cheap things to do on your London trip; fun and cool things to do; things to do this weekend; things to do with kids; unusual or romantic things to do in London. There are plenty of London breaks to choose from, whether you are coming for a day trip or for a whole weekend in London. Plan ahead for your trip to London: search for upcoming events, museum and galleries, sightseeing tours, shows, bars, restaurants, nightlife, days out and even day trips from London. Visiting London has never been easier with these ideas for London breaks.', 'visit-london', 1, '2018-02-04 19:21:18', '2018-02-04 20:17:39'),
(3, 'New York City', 'The City of New York, often called New York City or simply New York, is the most populous city in the United States.[9] With an estimated 2016 population of 8,537,673 distributed over a land area of about 302.6 square miles (784 km2), New York City is also the most densely populated major city in the United States.Located at the southern tip of the state of New York, the city is the center of the New York metropolitan area, one of the most populous urban agglomerations in the world with an estimated 23.7 million residents as of 2016. A global power city,[15] New York City has been described as the cultural, financial, and media capital of the world, and exerts a significant impact upon commerce, entertainment, research, technology, education, politics, and sports. The city\'s fast pace[23][24] defines the term New York minute.Home to the headquarters of the United Nations, New York is an important center for international diplomacy.\r\n\r\nSituated on one of the world\'s largest natural harbors,[28][29] New York City consists of five boroughs, each of which is a separate county of New York State.[30] The five boroughs – Brooklyn, Queens, Manhattan, The Bronx, and Staten Island – were consolidated into a single city in 1898.[31] The city and its metropolitan area constitute the premier gateway for legal immigration to the United States,[32] and as many as 800 languages are spoken in New York,[33][34][35] making it the most linguistically diverse city in the world.[34][36][37] New York City is home to more than 3.2 million residents born outside the United States,[38] the largest foreign-born population of any city in the world.[39] In 2013, the tri-state New York Metropolitan Statistical Area (MSA) produced a gross metropolitan product (GMP) of nearly US$1.4 trillion.[40] If greater New York City were a country, it would have the 12th highest GDP in the world.[41]', 'new-york-city', 2, '2018-02-04 19:23:57', '2018-02-04 20:19:00'),
(5, 'Lost Angeles', 'In its inaugural year, the Bloomberg Foundation has awarded its top gold certification honor to the City of Los Angeles for its work in being a data-driven city. The work of ITA’s Data Science Federation and the Mayor’s Open Data and i-Teams were featured.\r\n\r\nMayor Garcetti noted, “Data shines a light on the problem and inspires targeted action. It allows us to be more proactive, more efficient, and more engaging.”\r\n\r\nFor more details on the specific data programs that were highlighted, please click here. \r\n\r\nFor more information on the \'What Works Cities\' certification, please visit https://whatworkscities.bloomberg.org/', 'lost-angeles', 2, '2018-02-04 19:27:02', '2018-02-04 19:27:02'),
(6, 'Modal Boostrap', 'Before getting started with Bootstrap’s modal component, be sure to read the following as our menu options have recently changed.\r\n\r\nModals are built with HTML, CSS, and JavaScript. They’re positioned over everything else in the document and remove scroll from the <body> so that modal content scrolls instead.\r\nClicking on the modal “backdrop” will automatically close the modal.\r\nBootstrap only supports one modal window at a time. Nested modals aren’t supported as we believe them to be poor user experiences.\r\nModals use position: fixed, which can sometimes be a bit particular about its rendering. Whenever possible, place your modal HTML in a top-level position to avoid potential interference from other elements. You’ll likely run into issues when nesting a .modal within another fixed element.\r\nOnce again, due to position: fixed, there are some caveats with using modals on mobile devices. See our browser support docs for details.\r\nDue to how HTML5 defines its semantics, the autofocus HTML attribute has no effect in Bootstrap modals. To achieve the same effect, use some custom JavaScript:', 'modal-boostrap', 3, '2018-02-04 19:28:03', '2018-02-04 19:28:03'),
(7, 'Introduction', 'Get started with Bootstrap, the world’s most popular framework for building responsive, mobile-first sites, with BootstrapCDN and a template starter page.', 'introduction-boostrap', 3, '2018-02-04 19:29:07', '2018-02-04 19:29:07'),
(8, 'Example', 'data-toggle=\"modal\" opens the modal window\r\ndata-target=\"#myModal\" points to the id of the modal\r\nThe \"Modal\" part:\r\n\r\nThe parent <div> of the modal must have an ID that is the same as the value of the data-target attribute used to trigger the modal (\"myModal\").\r\n\r\nThe .modal class identifies the content of <div> as a modal and brings focus to it.\r\n\r\nThe .fade class adds a transition effect which fades the modal in and out. Remove this class if you do not want this effect.\r\n\r\nThe attribute role=\"dialog\" improves accessibility for people using screen readers.\r\n\r\nThe .modal-dialog class sets the proper width and margin of the modal.\r\n\r\nThe \"Modal content\" part:\r\n\r\nThe <div> with class=\"modal-content\" styles the modal (border, background-color, etc.). Inside this <div>, add the modal\'s header, body, and footer.\r\n\r\nThe .modal-header class is used to define the style for the header of the modal. The <button> inside the header has a data-dismiss=\"modal\" attribute which closes the modal if you click on it. The .close class styles the close button, and the .modal-title class styles the header with a proper line-height.\r\n\r\nThe .modal-body class is used to define the style for the body of the modal. Add any HTML markup here; paragraphs, images, videos, etc.', 'exmaple-boostrap', 1, '2018-02-04 20:19:52', '2018-02-04 20:26:23'),
(9, 'My girl', 'She is Emma Watson. She\'s awesome', 'my-girl', 4, '2018-02-18 08:45:49', '2018-02-18 09:23:20'),
(10, 'News', 'Today is Thursday. It\'s wet and look so sad', 'weather-news', 4, '2018-02-19 21:17:52', '2018-02-19 21:17:52'),
(11, 'ManyToMany', 'Relationship in laravel', 'many-to-many', 2, '2018-02-20 07:43:03', '2018-02-20 07:43:03'),
(12, 'Example', 'This is example about select multiple', 'example', 2, '2018-02-20 08:17:23', '2018-02-20 08:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 11, 2, NULL, NULL),
(2, 11, 3, NULL, NULL),
(4, 12, 3, NULL, NULL),
(9, 9, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Marketing', '2018-02-20 01:55:00', '2018-02-20 01:55:00'),
(2, 'PHP', '2018-02-20 01:55:51', '2018-02-20 01:55:51'),
(3, 'Laravel', '2018-02-20 01:55:56', '2018-02-20 01:55:56'),
(4, 'Homeless', '2018-02-20 01:56:10', '2018-02-20 01:56:10'),
(5, 'Ruby', '2018-02-20 01:56:22', '2018-02-20 01:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hero Gustin', 'herogustin@gmail.com', '$2y$10$Vvn6YYoVLfNICYd21URF0.JXanrZWo3cLcMw0QNhpDZ3Fqiy.aSMK', 'I9eMtomm9MP5ZplcNY8ICeyzZQcPoq8zywUyXA0mvnFagovb4jpFcVZWg9jl', '2018-02-05 07:55:00', '2018-02-08 09:33:05'),
(2, 'Emma', 'emma@gmail.com', '$2y$10$HOCtjFj0EuNW1JsgViUrV.tEFiRJ4zhEg8Ef6PEWc8X9FElaGLNw2', 'ohdkeOGWCwLT0bwTVrtJBFucofLIiYdz3AyY51ug3CFMwwLmTtHBryjot2PE', '2018-02-06 02:02:44', '2018-02-06 02:02:44'),
(3, 'Redhero', 'redhero@gmail.com', '$2y$10$0DUoEVfQx1Z3eoZ27IOJB.z6NTYTJuo6.f84HVU2gDsunCN2sdi9m', 'jYxYDDtyuEsMRCcqvcJGvmgbI1bltTM1jLRCG7vO5XWfhJHkYfx42NREQGu7', '2018-02-06 02:07:48', '2018-02-06 02:07:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
