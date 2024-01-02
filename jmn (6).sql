-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2023 at 06:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jmn`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddCustomer` (IN `customer_name` VARCHAR(255), IN `contact_number` VARCHAR(20), IN `email` VARCHAR(255), IN `address` TEXT, IN `idcardimg` VARCHAR(255))   BEGIN
    INSERT INTO tbl_customer (customer_name, contact_number, email, address, photo)
    VALUES (customer_name, contact_number, email, address, idcardimg);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteCategory` (IN `cat_id` INT)   BEGIN
    DELETE FROM `tbl_category` WHERE `category_id` = `cat_id`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteCustomer` (IN `customer_id` INT)   BEGIN
    DELETE FROM tbl_customer WHERE customer_id = customer_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteProduct` (IN `product_id` INT)   BEGIN
    DELETE FROM tbl_product WHERE product_id = product_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteSupplier` (IN `supplier_id_param` INT)   BEGIN
    DELETE FROM `tbl_supplier`
    WHERE `supplier_id` = supplier_id_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCategory` (IN `tbl_categories` INT(225))   SELECT * FROM tbl_category WHERE category_id = category_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUsers` (IN `tbl_admin` INT(225))   SELECT * FROM tbl_admin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertCategory` (IN `cat_name` VARCHAR(255), IN `cat_description` VARCHAR(255))   BEGIN
    INSERT INTO `tbl_category` (`category_name`, `category_decription`, `date_created`)
    VALUES (`cat_name`, `cat_description`, CURRENT_TIMESTAMP());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertProduct` (IN `product_code` TEXT, IN `category_name` VARCHAR(255), IN `product_name` VARCHAR(255), IN `description` VARCHAR(255), IN `product_price` TEXT, IN `product_image` TEXT)   BEGIN
    INSERT INTO tbl_product (product_code, category_name, product_name, description, product_price, product_image, date_created)
    VALUES (product_code, category_name, product_name, description, product_price, product_image, NOW());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertSupplier` (IN `supplier_name_param` VARCHAR(255), IN `contact_number_param` VARCHAR(255), IN `email_param` VARCHAR(255), IN `address_param` VARCHAR(255), IN `photo_param` TEXT)   BEGIN
    INSERT INTO `tbl_supplier` (`supplier_name`, `contact_number`, `email`, `address`, `photo`, `date_created`)
    VALUES (supplier_name_param, contact_number_param, email_param, address_param, photo_param, NOW());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LoginProcedure` (IN `in_user` VARCHAR(50), IN `in_pass` VARCHAR(50), OUT `admin_id` INT, OUT `count_records` INT)   BEGIN
    SELECT COUNT(*) INTO count_records
    FROM tbl_admin 
    WHERE `username` = in_user AND `password` = in_pass;

    SELECT admin_id
    INTO admin_id
    FROM tbl_admin 
    WHERE `username` = in_user AND `password` = in_pass;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateCategory` (IN `cat_id` INT, IN `new_name` VARCHAR(255), IN `new_description` VARCHAR(255))   BEGIN
    UPDATE `tbl_category`
    SET `category_name` = `new_name`, `category_decription` = `new_description`, `date_created` = CURRENT_TIMESTAMP()
    WHERE `category_id` = `cat_id`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateCustomer` (IN `customer_id` INT, IN `new_customer_name` VARCHAR(255), IN `new_contact_number` VARCHAR(20), IN `new_email` VARCHAR(255), IN `new_address` TEXT)   BEGIN
    UPDATE tbl_customer
    SET customer_name = new_customer_name, contact_number = new_contact_number, email = new_email, address = new_address
    WHERE customer_id = customer_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateProduct` (IN `product_id` INT, IN `new_product_code` TEXT, IN `new_category_name` VARCHAR(255), IN `new_product_name` VARCHAR(255), IN `new_description` VARCHAR(255), IN `new_product_price` TEXT, IN `new_product_image` TEXT)   BEGIN
    UPDATE tbl_product
    SET product_code = new_product_code,
        category_name = new_category_name,
        product_name = new_product_name,
        description = new_description,
        product_price = new_product_price,
        product_image = new_product_image,
        date_created = NOW()
    WHERE product_id = product_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateSupplier` (IN `supplier_id_param` INT, IN `supplier_name_param` VARCHAR(255), IN `contact_number_param` VARCHAR(255), IN `email_param` VARCHAR(255), IN `address_param` VARCHAR(255), IN `photo_param` TEXT)   BEGIN
    UPDATE `tbl_supplier`
    SET
        `supplier_name` = supplier_name_param,
        `contact_number` = contact_number_param,
        `email` = email_param,
        `address` = address_param,
        `photo` = photo_param,
        `date_created` = NOW()
    WHERE `supplier_id` = supplier_id_param;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `category_id`, `action`, `cdate`) VALUES
(17, 37, 'Inserted', '2023-12-08 02:53:19'),
(18, 35, 'UPDATE', '2023-12-08 02:59:25'),
(19, 37, 'Deleted', '2023-12-08 03:01:21'),
(20, 38, 'Inserted', '2023-12-08 23:38:24'),
(21, 4, 'Deleted', '2023-12-08 23:40:07'),
(22, 35, 'Deleted', '2023-12-10 22:29:42'),
(23, 39, 'Inserted', '2023-12-11 08:57:53'),
(24, 40, 'Inserted', '2023-12-11 09:07:16'),
(25, 41, 'Inserted', '2023-12-11 09:10:22'),
(26, 42, 'Inserted', '2023-12-11 09:12:23');

-- --------------------------------------------------------

--
-- Stand-in structure for view `receiving_report`
-- (See below for the actual view)
--
CREATE TABLE `receiving_report` (
`receiving_id` int(11)
,`reference_no` text
,`supplier_name` varchar(255)
,`product_id` int(11)
,`r_description` varchar(255)
,`quantity` text
,`price` decimal(10,0)
,`amount` text
,`receiving_date` datetime
,`receiver_name` varchar(255)
,`receiver_address` varchar(255)
,`product_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`, `status`) VALUES
(1, 'nimwhel', 'salonga45', 'active');

--
-- Triggers `tbl_admin`
--
DELIMITER $$
CREATE TRIGGER `admin_login_trigger` AFTER INSERT ON `tbl_admin` FOR EACH ROW BEGIN
    DECLARE log_message VARCHAR(255);
    
    -- Construct the log message
    SET log_message = CONCAT('Admin login: ', NEW.username, ' logged in at ', NOW());

    -- Insert the log into the 'logs' table
    INSERT INTO logs (`category_id`, `action`, `cdate`)
    VALUES (NEW.admin_id, log_message, NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_decription` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_decription`, `date_created`) VALUES
(3, 'Shampoo', 'Pang buhok', '2022-07-07 13:02:09'),
(38, 'Soft Drinks', 'Coke', '2023-12-08 23:38:24'),
(39, 'Alcohol', 'Beverage/alcohol', '2023-12-11 08:57:53'),
(40, 'Biscuit', 'Biscuit', '2023-12-11 09:07:16'),
(41, 'Chips', 'Chips and Snack', '2023-12-11 09:10:22'),
(42, 'Can', 'In can products', '2023-12-11 09:12:23');

--
-- Triggers `tbl_category`
--
DELIMITER $$
CREATE TRIGGER `deleteLog` BEFORE DELETE ON `tbl_category` FOR EACH ROW INSERT INTO logs VALUES(null, OLD.category_id, "Deleted", NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertLogs` AFTER INSERT ON `tbl_category` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.category_id, 'Inserted', NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatelog` AFTER UPDATE ON `tbl_category` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.category_id, "Udated", NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `contact_number`, `email`, `address`, `photo`, `date_created`) VALUES
(12, 'Nimwhel Salonga ', '09466139181', 'nimwhelsalonga45@gmail.com', '#3894 Castillo st. Camarin Caloocan City', '../uploads/WIN_20230822_15_25_25_Pro.jpg', '2023-12-11 10:45:36'),
(13, 'Michaela Villamore', '09145789462', 'micavillamor@gmail.com', 'Caloocan City', '../uploads/micaela.jpg', '2023-12-11 10:46:39'),
(14, 'Jessica Alonzo', '09785461248', 'icaalonzo@gmail.com', 'Quezon City', '../uploads/jessica.jpg', '2023-12-11 10:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_code` text NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `product_price` text NOT NULL,
  `product_image` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_code`, `category_name`, `product_name`, `description`, `product_price`, `product_image`, `date_created`) VALUES
(1, '42912502', 'Shampoo', 'safeguard', 'malambot', '40', '../uploads/safeguard-classic-beige-soap-with-infinishield-135g.jpg', '2022-07-08 15:25:56'),
(2, '54800296', 'Shampoo', 'palmolive', 'pangbuhok', '200', '../uploads/png-clipart-green-palmolive-shampoo-bottle-shampoo-palmolive-hair-conditioner-sunsilk-shampoo-miscellaneous-herbal.png', '2022-07-08 15:32:04'),
(4, '43173771', 'Alcohol', 'Ginebra', 'Kwatro Kantos', '120', '../uploads/370254852_656878216646875_2674225080841726253_n.jpg', '2023-12-11 08:59:12'),
(5, '94129967', 'Biscuit', 'Cream-O Chocolate', 'Chocolate cream-o Cookies', '80', '../uploads/345006995_1397230727789263_3854160008173459778_n.jpg', '2023-12-11 09:08:10'),
(6, '14121810', 'Alcohol', 'Alfonso I', 'Alcohol', '350', '../uploads/386447107_2005552263144676_4628762175720524122_n.jpg', '2023-12-11 09:08:43'),
(7, '48157866', 'Alcohol', 'Emperador', 'Coffee', '150', '../uploads/406373836_211418018673782_8323918340755792882_n.jpg', '2023-12-11 09:09:52'),
(8, '51405697', 'Chips', 'Piattos', 'Piattos Cheese', '36', '../uploads/368256239_230122716680120_8177014344864778993_n.jpg', '2023-12-11 09:10:56'),
(9, '20795965', 'Can', 'San Marino', 'Corned Tuna', '35', '../uploads/387338293_388778006954431_3633909392264771030_n.jpg', '2023-12-11 09:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receiving`
--

CREATE TABLE `tbl_receiving` (
  `receiving_id` int(11) NOT NULL,
  `reference_no` text NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `r_description` varchar(255) NOT NULL,
  `quantity` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `amount` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_receiving`
--

INSERT INTO `tbl_receiving` (`receiving_id`, `reference_no`, `supplier_name`, `product_id`, `r_description`, `quantity`, `price`, `amount`, `date_created`) VALUES
(1, '20220916C157', 'Micaela Villamor', 2, '', '2', 400, '', '2022-09-16 15:32:22'),
(2, '202209162DFA', 'Jesica Alonzo ', 2, '', '2', 400, '', '2022-09-17 04:14:03'),
(3, '202103162CFA', 'Nimwhel ', 4, '', '3', 240, '', '2023-12-11 10:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`supplier_id`, `supplier_name`, `contact_number`, `email`, `address`, `photo`, `date_created`) VALUES
(12, 'Micaela Villamor', '09125467894', 'micavillamor@gmail.com', 'Caloocan City', '../uploads/micaela.jpg', '2023-12-11 09:24:16'),
(13, 'Jessica Alonzo', '09785461248', 'icaalonzo@gmail.com', 'Quezon City', '../uploads/jessica.jpg', '2023-12-11 09:25:04'),
(14, 'Nimwhel Salonga ', '09466139181', 'nimwhelsalonga45@gmail.com', '#3894 Castillo Camarin Caloocan City.', '', '2023-12-11 10:20:10');

-- --------------------------------------------------------

--
-- Structure for view `receiving_report`
--
DROP TABLE IF EXISTS `receiving_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `receiving_report`  AS SELECT `r`.`receiving_id` AS `receiving_id`, `r`.`reference_no` AS `reference_no`, `r`.`supplier_name` AS `supplier_name`, `r`.`product_id` AS `product_id`, `r`.`r_description` AS `r_description`, `r`.`quantity` AS `quantity`, `r`.`price` AS `price`, `r`.`amount` AS `amount`, `r`.`date_created` AS `receiving_date`, `c`.`customer_name` AS `receiver_name`, `c`.`address` AS `receiver_address`, `p`.`product_name` AS `product_name` FROM ((`tbl_receiving` `r` left join `tbl_customer` `c` on(`r`.`supplier_name` = `c`.`customer_name`)) left join `tbl_product` `p` on(`r`.`product_id` = `p`.`product_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `idx_unique_email` (`email`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_receiving`
--
ALTER TABLE `tbl_receiving`
  ADD PRIMARY KEY (`receiving_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_receiving`
--
ALTER TABLE `tbl_receiving`
  MODIFY `receiving_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
