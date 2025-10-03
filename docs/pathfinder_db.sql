-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2025 at 09:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pathfinder_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `change_log`
--

DROP TABLE IF EXISTS `change_log`;
CREATE TABLE `change_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_table_name` varchar(64) NOT NULL COMMENT 'e.g., "orders", "customers", "order_items"',
  `log_record_id` int(10) UNSIGNED NOT NULL COMMENT 'Primary key of the affected record',
  `log_action` enum('INSERT','UPDATE','DELETE') NOT NULL COMMENT 'Type of change',
  `log_user_id` int(11) NOT NULL COMMENT 'FK to users table; who made the change',
  `log_changed_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'When the change occurred',
  `log_ip_address` varchar(45) DEFAULT NULL COMMENT 'Client IP for security/audit (IPv4/IPv6)',
  `log_user_agent` text DEFAULT NULL COMMENT 'Browser/device info for context',
  `log_old_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Serialized old data (e.g., {"paper_type": "bond", "quantity": 500})' CHECK (json_valid(`log_old_values`)),
  `log_new_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Serialized new data (only for INSERT/UPDATE)' CHECK (json_valid(`log_new_values`)),
  `log_change_summary` text DEFAULT NULL COMMENT 'Human-readable diff (auto-generated, e.g., "Quantity changed from 500 to 600")',
  `log_is_deleted` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Soft-delete flag for logs if needed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Audit trail for all entity changes';

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `cust_id` int(10) UNSIGNED NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_tax` tinyint(1) NOT NULL DEFAULT 1,
  `cust_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cust_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `cust_type` enum('Charity','Government','Business','Individual') NOT NULL,
  `cust_notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_name`, `cust_tax`, `cust_updated`, `cust_created`, `cust_type`, `cust_notes`) VALUES
(2847000, 'Halfway Snow Removal', 1, '2025-09-30 20:15:13', '2025-09-30 20:15:13', 'Business', 'Lorem ipsum dolor sit amet consectetur adipiscing elit quisque faucibus ex sapien vitae pellentesque sem placerat in id cursus mi pretium tellus duis convallis tempus leo eu aenean sed diam urna tempor pulvinar vivamus fringilla lacus nec metus bibendum egestas iaculis massa nisl malesuada lacinia integer nunc posuere ut hendrerit.');

-- --------------------------------------------------------

--
-- Table structure for table `cust_contacts`
--

DROP TABLE IF EXISTS `cust_contacts`;
CREATE TABLE `cust_contacts` (
  `cont_id` int(10) UNSIGNED NOT NULL,
  `cust_id` int(10) UNSIGNED NOT NULL,
  `cont_name` varchar(255) NOT NULL,
  `cont_dept` varchar(100) DEFAULT NULL,
  `cont_phone` varchar(20) DEFAULT NULL,
  `cont_ext` varchar(10) DEFAULT NULL,
  `cont_email` varchar(255) DEFAULT NULL,
  `cont_street` varchar(255) DEFAULT NULL,
  `cont_street2` varchar(100) DEFAULT NULL,
  `cont_city` varchar(100) DEFAULT NULL,
  `cont_state` varchar(50) DEFAULT NULL,
  `cont_zip` varchar(10) DEFAULT NULL,
  `cont_zip4` varchar(4) DEFAULT NULL,
  `cont_type` enum('Primary','Billing','Accounts Payable','Shipping','Other') DEFAULT NULL,
  `cont_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `cont_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cust_contacts`
--

INSERT INTO `cust_contacts` (`cont_id`, `cust_id`, `cont_name`, `cont_dept`, `cont_phone`, `cont_ext`, `cont_email`, `cont_street`, `cont_street2`, `cont_city`, `cont_state`, `cont_zip`, `cont_zip4`, `cont_type`, `cont_created`, `cont_updated`) VALUES
(2, 28470000, 'Bobby McGee', 'Redundancy Dept', '906-555-5555', '123', 'admin@test.com', '123 Privacy Way', 'Unit 0', 'Halfway', 'MI', '49855', '1234', 'Primary', '2025-09-30 20:16:34', '2025-09-30 20:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `cust_id` int(10) UNSIGNED NOT NULL COMMENT 'FK to customers',
  `order_title` varchar(255) DEFAULT NULL COMMENT 'Overall title for the entire order',
  `order_date` date NOT NULL COMMENT 'Date the order was placed (YYYY-MM-DD)',
  `order_due` date NOT NULL COMMENT 'Date the order is due (YYYY-MM-DD)',
  `order_previous_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Previous order ID if reorder/clone',
  `order_owner` int(11) NOT NULL COMMENT 'FK to users.user_id; responsible user',
  `order_status` enum('not started','in production','completed') NOT NULL DEFAULT 'not started' COMMENT 'Current status of the order',
  `order_job_bag` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'True if physical job bag exists',
  `order_created` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Timestamp when order was created',
  `order_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Timestamp of last update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Main orders table for tracking print jobs';

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cust_id`, `order_title`, `order_date`, `order_due`, `order_previous_id`, `order_owner`, `order_status`, `order_job_bag`, `order_created`, `order_updated`) VALUES
(70000, 2847000, 'FANCY TEST TITLE', '2025-10-03', '2025-10-10', 56000, 4, 'not started', 1, '2025-10-03 18:51:49', '2025-10-03 18:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `item_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL COMMENT 'FK to orders; parent order',
  `item_desc` varchar(255) NOT NULL COMMENT 'Text description of the item, e.g., brochures',
  `item_finish_qty` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Final number of pieces ordered',
  `item_prep` varchar(100) DEFAULT NULL COMMENT 'Typesetting, design, or layout before printing',
  `item_prep_cost` decimal(8,2) NOT NULL DEFAULT 0.00 COMMENT 'Fee for item prep',
  `item_notes` text DEFAULT NULL COMMENT 'User notes; 500 char limit via app',
  `item_subtotal` decimal(10,2) NOT NULL DEFAULT 0.00 COMMENT 'Running total of all cost fields',
  `item_status` enum('not started','prepped','printed','finished','shipped') NOT NULL DEFAULT 'not started' COMMENT 'Current status of the item',
  `item_created` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Timestamp when item was created',
  `item_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Timestamp of last update',
  `item_finish_width` decimal(5,2) DEFAULT NULL COMMENT 'Final width after finishing, in inches',
  `item_finish_height` decimal(5,2) DEFAULT NULL COMMENT 'Final height after finishing, in inches'
) ;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `item_desc`, `item_finish_qty`, `item_prep`, `item_prep_cost`, `item_notes`, `item_subtotal`, `item_status`, `item_created`, `item_updated`, `item_finish_width`, `item_finish_height`) VALUES
(11324, 70000, 'BUSINESS CARDS - W/BLEED', 1000, 'BASIC SETUP', 7.50, 'Must use the C810 for color accuracy.', 7.50, 'not started', '2025-10-03 19:14:39', '2025-10-03 19:14:39', 3.50, 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_friendly_name` varchar(100) DEFAULT NULL,
  `user_password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `user_role` enum('admin','user') DEFAULT 'user',
  `user_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `reset_token` varchar(255) DEFAULT NULL COMMENT 'Password reset token hash',
  `reset_expires_at` datetime DEFAULT NULL COMMENT 'Token expiration time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_friendly_name`, `user_password`, `token`, `user_role`, `user_created`, `user_updated`, `user_login`, `user_status`, `reset_token`, `reset_expires_at`) VALUES
(4, 'sling.load', 'filo@westerdrive.co', 'Jason', '$2y$10$9rqQTS2hEAnHeVPJcOFpd./ZGdu1NPi6cZVlsFN1pzfADo5KaYrbW', 'ueRd7f9wSQ8XkHUN', 'user', '2025-09-30 19:56:48', '2025-10-03 17:54:47', '2025-10-03 13:33:30', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

DROP TABLE IF EXISTS `user_settings`;
CREATE TABLE `user_settings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `setting_key` varchar(50) NOT NULL COMMENT 'Unique key for the setting (e.g., "theme_mode")',
  `setting_value` text DEFAULT NULL COMMENT 'Value as string (e.g., "dark"); use JSON for complex values if needed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Per-user UI and preference settings';

--
-- Dumping data for table `user_settings`
--

INSERT INTO `user_settings` (`id`, `user_id`, `setting_key`, `setting_value`, `created_at`, `updated_at`) VALUES
(1, 4, 'theme_mode', 'dark', '2025-10-02 13:37:48', '2025-10-03 17:54:47'),
(2, 4, 'sidebar_layout', 'vertical', '2025-10-02 13:37:48', '2025-10-03 17:54:47'),
(3, 4, 'home_screen', 'home', '2025-10-02 13:37:48', '2025-10-03 17:54:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `change_log`
--
ALTER TABLE `change_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_table_record` (`log_table_name`,`log_record_id`),
  ADD KEY `idx_user_time` (`log_user_id`,`log_changed_at`),
  ADD KEY `idx_action` (`log_action`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `cust_contacts`
--
ALTER TABLE `cust_contacts`
  ADD PRIMARY KEY (`cont_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `order_owner` (`order_owner`),
  ADD KEY `order_status` (`order_status`),
  ADD KEY `order_date` (`order_date`),
  ADD KEY `order_previous_id` (`order_previous_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`user_name`),
  ADD UNIQUE KEY `email` (`user_email`);

--
-- Indexes for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_setting` (`user_id`,`setting_key`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `change_log`
--
ALTER TABLE `change_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2847001;

--
-- AUTO_INCREMENT for table `cust_contacts`
--
ALTER TABLE `cust_contacts`
  MODIFY `cont_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70001;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_settings`
--
ALTER TABLE `user_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `change_log`
--
ALTER TABLE `change_log`
  ADD CONSTRAINT `change_log_ibfk_1` FOREIGN KEY (`log_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `cust_contacts`
--
ALTER TABLE `cust_contacts`
  ADD CONSTRAINT `cust_contacts_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`cust_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`cust_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_owner`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD CONSTRAINT `user_settings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
