
--for not-user/admin login system
CREATE TABLE  `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--for insert the first three role to db
INSERT INTO `tbl_users` (`id`, `user_role_id`, `full_name`,`username`, `email`, `password`) VALUES
	(1, 1, 'admin','admin123', 'admin@gmail.com', '$2y$10$ZyAGoVBhebeaGBXfO5zKkOeYNRHGcvjBXenXX4Oz46R0n98lg5z0K');
INSERT INTO `tbl_users` (`id`, `user_role_id`, `full_name`,`username`, `email`, `password`) VALUES
	(2, 2, 'editor','edit123', 'editor@gmail.com', '$2y$10$APMbvCXvXkRlXKpQ8qjVSuV4ioGWW0PSUwC/GC7bBtuPEDO3L1lZG');

--for role based purpose
CREATE TABLE IF NOT EXISTS `tbl_user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--inserting type of roles
INSERT INTO `tbl_user_role` (`id`, `user_role`) VALUES
	(1, 'admin');
INSERT INTO `tbl_user_role` (`id`, `user_role`) VALUES
	(2, 'editor');
INSERT INTO `tbl_user_role` (`id`, `user_role`) VALUES
	(3, 'customer');

--for product table--
CREATE TABLE  `tbl_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(150) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `product_price` int(5) NOT NULL,
  `product_qty` int(5) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_description` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--forum comment table--
CREATE TABLE IF NOT EXISTS `tbl_forum` (
  `comment_id` int(11) NOT NULL,
  `parentComId` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `sender` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;