-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 28, 2017 at 07:33 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_users`
--

CREATE TABLE `auth_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_users`
--

INSERT INTO `auth_users` (`id`, `username`, `email`, `password`) VALUES
(1, 'YOUR_USERNAME', 'YOUR_EMAIL', 'YOUR_HASHED_PASSWORD');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_name` varchar(100) NOT NULL,
  `created_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `date_time`, `category_name`, `created_by`) VALUES
(1, '2017-07-08 07:20:03', 'Web Design', 'YOUR_USERNAME'),
(2, '2017-07-08 21:19:21', 'Photography', 'YOUR_USERNAME'),
(3, '2017-07-08 21:24:06', 'Back-end Development', 'YOUR_USERNAME'),
(4, '2017-07-12 20:02:58', 'PHP', 'YOUR_USERNAME');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `category_id` int(24) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_body` varchar(10000) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `category_id`, `post_title`, `post_body`, `post_date`, `created_by`) VALUES
(1, 0, 'Very First Post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id molestie nulla. Aenean sagittis justo a dictum condimentum. Phasellus rhoncus massa tellus, et bibendum magna fermentum quis. Nunc efficitur arcu non consequat auctor. Nunc tempus dapibus porta. Nulla mollis massa a orci dapibus sagittis. Nullam fringilla lobortis nulla, vel facilisis diam lacinia vitae. Nam varius risus id dui finibus, vel viverra odio viverra. In turpis erat, fringilla vel pharetra at, maximus maximus nunc. Integer tempor elit sit amet ante semper ornare. Proin aliquet odio nec leo lobortis hendrerit. Etiam elementum felis id enim aliquam convallis. Duis nulla tortor, dapibus nec faucibus quis, aliquet nec dolor. Ut facilisis tellus quis sapien tincidunt lacinia. Morbi vehicula eros ante. ', '2017-07-12 17:57:52', 'Bekkah'),
(2, 0, 'The second post for this CMS.', 'Mauris justo ligula, mollis eu cursus sed, lacinia id risus. Sed sed lobortis tellus, ac hendrerit mauris. Donec bibendum bibendum mauris. Proin at pretium felis, eu faucibus quam. Donec varius nisi justo, sed ultricies enim malesuada ac. Curabitur semper dictum lorem id semper. Morbi egestas dignissim diam, eu vulputate eros consectetur at.', '2017-07-12 18:00:47', 'Bekkah'),
(3, 0, 'This is a post ever.', 'Donec in sodales leo. Morbi a laoreet elit, quis vehicula nunc. Pellentesque egestas mattis tempor. Mauris posuere, orci laoreet elementum accumsan, eros ipsum scelerisque tortor, eget tempor risus est consectetur leo. Quisque eget porttitor velit, vitae pharetra neque. Morbi interdum sem lectus, sit amet accumsan sem fermentum a.', '2017-07-12 19:52:00', 'Bekkah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_users`
--
ALTER TABLE `auth_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_users`
--
ALTER TABLE `auth_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;