CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Animals');

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `post` (`id`, `category_id`, `author`, `content`, `created_at`) VALUES
(1, 1, 'Test author', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-02-06 04:45:06'),
(2, 1, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '2018-02-06 04:45:20'),
(3, 1, 'Last test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2018-02-06 04:45:39');

CREATE TABLE `post_comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `post_comment` (`id`, `post_id`, `author`, `comment`, `created_at`) VALUES
(1, 1, 'Feodor', 'Hello, test comment', '2018-02-06 04:47:01'),
(2, 1, 'Admin', 'Yeah!!', '2018-02-06 04:47:09'),
(3, 1, 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-02-06 04:47:24'),
(4, 1, 'Nice', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-02-06 04:47:38'),
(5, 2, 'Shorty', 'Sh', '2018-02-06 04:48:04');

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `username`, `password`, `is_admin`) VALUES
(1, 'admin', '$2y$10$y4AKNZ5x.wNeTu.VOAGBjOz8kSHYnkeRVxlTpmSMHdJ4Bia4f6mfS', 1),
(2, 'manager', '$2y$10$Bh43GJjzaINuhouPnqXXdewm7NLmQ.M3ri4wXqefGpiEDKv5hQcGe', 0);

ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `post_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE `post_comment`
  ADD CONSTRAINT `post_comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
