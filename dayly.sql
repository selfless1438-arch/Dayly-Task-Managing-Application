-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2026 at 10:45 AM
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
-- Database: `dayly`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `taskTitle` varchar(255) NOT NULL,
  `taskDesc` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateTime` varchar(255) NOT NULL,
  `completed_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `username`, `taskTitle`, `taskDesc`, `status`, `created_at`, `updateTime`, `completed_at`) VALUES
(13, 'danishameer', 'Complete UI Design', 'Finish dashboard UI', 'completed', '2026-04-07 01:24:41', '2026-04-07 06:24:41', '2026-04-07 06:24:41'),
(14, 'danishameer', 'Fix Login Bug', 'Resolve login issue', 'pending', '2026-04-07 01:24:41', '', ''),
(15, 'danishameer', 'API Integration', 'Connect frontend with API', 'inprocess', '2026-04-07 01:24:41', '2026-04-07 06:24:41', ''),
(16, 'danishameer', 'Database Optimization', 'Improve queries', 'completed', '2026-04-06 01:24:41', '2026-04-06 06:24:41', '2026-04-06 06:24:41'),
(17, 'danishameer', 'Create Charts', 'Add dashboard charts', 'pending', '2026-04-06 01:24:41', '', ''),
(18, 'danishameer', 'Task Filter', 'Filter tasks by date', 'inprocess', '2026-04-06 01:24:41', '2026-04-06 06:24:41', ''),
(19, 'danishameer', 'Mobile Responsive', 'Fix responsive layout', 'completed', '2026-04-05 01:24:41', '2026-04-05 06:24:41', '2026-04-05 06:24:41'),
(20, 'danishameer', 'Add Notifications', 'Add alerts system', 'completed', '2026-04-05 01:24:41', '', '2026-04-08 19:54:01'),
(21, 'danishameer', 'Dark Mode', 'Implement dark theme', 'completed', '2026-04-05 01:24:41', '2026-04-05 06:24:41', '2026-04-08 19:54:11'),
(22, 'danishameer', 'User Profile', 'Create profile page', 'completed', '2026-04-04 01:24:41', '2026-04-04 06:24:41', '2026-04-04 06:24:41'),
(23, 'danishameer', 'Settings Page', 'Create settings', 'inprocess', '2026-04-04 01:24:41', '', ''),
(24, 'danishameer', 'Security Fix', 'Improve authentication', 'inprocess', '2026-04-04 01:24:41', '2026-04-04 06:24:41', ''),
(25, 'danishameer', 'Add Search', 'Task search feature', 'completed', '2026-04-03 01:24:41', '2026-04-03 06:24:41', '2026-04-03 06:24:41'),
(26, 'danishameer', 'Export Data', 'Export tasks to CSV', 'completed', '2026-04-03 01:24:41', '', '2026-04-08 19:53:03'),
(27, 'danishameer', 'Pagination', 'Add pagination', 'inprocess', '2026-04-03 01:24:41', '2026-04-03 06:24:41', ''),
(28, 'danishameer', 'Improve UX', 'Better UI flow', 'completed', '2026-04-02 01:24:41', '2026-04-02 06:24:41', '2026-04-02 06:24:41'),
(29, 'danishameer', 'Bug Fix', 'Fix task delete bug', 'inprocess', '2026-04-02 01:24:41', '', ''),
(30, 'danishameer', 'Loading Spinner', 'Add loader', 'inprocess', '2026-04-02 01:24:41', '2026-04-02 06:24:41', ''),
(31, 'danishameer', 'Performance Boost', 'Optimize code', 'completed', '2026-04-01 01:24:41', '2026-04-01 06:24:41', '2026-04-01 06:24:41'),
(32, 'danishameer', 'Validation', 'Add form validation', 'pending', '2026-04-01 01:24:41', '', ''),
(33, 'danishameer', 'Refactor Code', 'Clean code', 'inprocess', '2026-04-01 01:24:41', '2026-04-01 06:24:41', ''),
(34, 'danishameer', 'Task 1', 'Sample task', 'completed', '2026-03-31 01:24:41', '2026-03-31 06:24:41', '2026-03-31 06:24:41'),
(35, 'danishameer', 'Task 2', 'Sample task', 'pending', '2026-03-31 01:24:41', '', ''),
(36, 'danishameer', 'Task 3', 'Sample task', 'inprocess', '2026-03-31 01:24:41', '2026-03-31 06:24:41', ''),
(37, 'danishameer', 'Task 4', 'Sample task', 'completed', '2026-03-30 01:24:41', '2026-03-30 06:24:41', '2026-03-30 06:24:41'),
(38, 'danishameer', 'Task 5', 'Sample task', 'pending', '2026-03-30 01:24:41', '', ''),
(39, 'danishameer', 'Task 6', 'Sample task', 'inprocess', '2026-03-30 01:24:41', '2026-03-30 06:24:41', ''),
(40, 'danishameer', 'Task 7', 'Sample task', 'completed', '2026-03-29 01:24:41', '2026-03-29 06:24:41', '2026-03-29 06:24:41'),
(41, 'danishameer', 'Task 8', 'Sample task', 'pending', '2026-03-29 01:24:41', '', ''),
(42, 'danishameer', 'Task 9', 'Sample task', 'inprocess', '2026-03-29 01:24:41', '2026-03-29 06:24:41', ''),
(43, 'danishameer', 'Task 10', 'Sample task', 'completed', '2026-03-24 01:24:41', '2026-03-24 06:24:41', '2026-03-24 06:24:41'),
(44, 'danishameer', 'Task 11', 'Sample task', 'pending', '2026-03-21 01:24:41', '', ''),
(45, 'danishameer', 'Task 12', 'Sample task', 'inprocess', '2026-03-19 01:24:41', '2026-03-19 06:24:41', ''),
(46, 'danishameer', 'Fix Dashboard UI', 'Improve layout spacing', 'completed', '2026-04-07 01:28:39', '2026-04-07 06:28:39', '2026-04-07 06:28:39'),
(47, 'danishameer', 'Add Task Animation', 'Smooth expand animation', 'pending', '2026-04-07 01:28:39', '', ''),
(48, 'danishameer', 'Improve Mobile Layout', 'Responsive fixes', 'inprocess', '2026-04-07 01:28:39', '2026-04-07 06:28:39', ''),
(49, 'danishameer', 'Create Sidebar', 'Add collapsible sidebar', 'completed', '2026-04-06 01:28:39', '2026-04-06 06:28:39', '2026-04-06 06:28:39'),
(50, 'danishameer', 'Fix Logout Bug', 'Session destroy issue', 'pending', '2026-04-06 01:28:39', '', ''),
(51, 'danishameer', 'Add Icons', 'Add lucide icons', 'inprocess', '2026-04-06 01:28:39', '2026-04-06 06:28:39', ''),
(52, 'danishameer', 'Chart Integration', 'Add line chart', 'completed', '2026-04-05 01:28:39', '2026-04-05 06:28:39', '2026-04-05 06:28:39'),
(53, 'danishameer', 'Add Filters', 'Date filter option', 'pending', '2026-04-05 01:28:39', '', ''),
(54, 'danishameer', 'Dark Mode Toggle', 'Switch theme', 'inprocess', '2026-04-05 01:28:39', '2026-04-05 06:28:39', ''),
(55, 'danishameer', 'Create API', 'Tasks API', 'completed', '2026-04-04 01:28:39', '2026-04-04 06:28:39', '2026-04-04 06:28:39'),
(56, 'danishameer', 'Fix Validation', 'Form validation', 'pending', '2026-04-04 01:28:39', '', ''),
(57, 'danishameer', 'Add Loading Spinner', 'Loader animation', 'inprocess', '2026-04-04 01:28:39', '2026-04-04 06:28:39', ''),
(58, 'danishameer', 'Task Sorting', 'Sort by date', 'completed', '2026-04-03 01:28:39', '2026-04-03 06:28:39', '2026-04-03 06:28:39'),
(59, 'danishameer', 'Delete Task', 'Delete button', 'pending', '2026-04-03 01:28:39', '', ''),
(60, 'danishameer', 'Update Task', 'Edit functionality', 'inprocess', '2026-04-03 01:28:39', '2026-04-03 06:28:39', ''),
(61, 'danishameer', 'User Profile', 'Profile page', 'completed', '2026-04-02 01:28:39', '2026-04-02 06:28:39', '2026-04-02 06:28:39'),
(62, 'danishameer', 'Notification UI', 'Notification panel', 'pending', '2026-04-02 01:28:39', '', ''),
(63, 'danishameer', 'Add Search', 'Search feature', 'inprocess', '2026-04-02 01:28:39', '2026-04-02 06:28:39', ''),
(64, 'danishameer', 'Improve Security', 'Password hashing', 'completed', '2026-04-01 01:28:39', '2026-04-01 06:28:39', '2026-04-01 06:28:39'),
(65, 'danishameer', 'Fix CSS Bug', 'Layout issue', 'pending', '2026-04-01 01:28:39', '', ''),
(66, 'danishameer', 'Optimize Queries', 'Speed improvement', 'inprocess', '2026-04-01 01:28:39', '2026-04-01 06:28:39', ''),
(67, 'danishameer', 'Add Export', 'Export CSV', 'completed', '2026-03-29 01:28:39', '2026-03-29 06:28:39', '2026-03-29 06:28:39'),
(68, 'danishameer', 'Add Import', 'Import tasks', 'inprocess', '2026-03-29 01:28:39', '', ''),
(69, 'danishameer', 'Backup System', 'Auto backup', 'inprocess', '2026-03-29 01:28:39', '2026-03-29 06:28:39', ''),
(70, 'danishameer', 'Task Categories', 'Add categories', 'completed', '2026-03-24 01:28:39', '2026-03-24 06:28:39', '2026-03-24 06:28:39'),
(71, 'danishameer', 'Priority Labels', 'High/Low priority', 'pending', '2026-03-24 01:28:39', '', ''),
(72, 'danishameer', 'Tag System', 'Task tags', 'inprocess', '2026-03-24 01:28:39', '2026-03-24 06:28:39', ''),
(73, 'danishameer', 'Initial Setup', 'Project start', 'completed', '2026-03-19 01:28:39', '2026-03-19 06:28:39', '2026-03-19 06:28:39'),
(74, 'danishameer', 'Database Design', 'Tables creation', 'completed', '2026-03-19 01:28:39', '2026-03-19 06:28:39', '2026-03-19 06:28:39'),
(75, 'danishameer', 'Login System', 'Authentication', 'completed', '2026-03-19 01:28:39', '2026-03-19 06:28:39', '2026-03-19 06:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `question`, `answer`, `password`, `created_at`) VALUES
(17, 'danishameer', 'Danish Ameer', 'dani@mail.com', 'What\'s your mother name?', 'Nasreen', '$2y$10$R71kjk0IN3ZsWaCyovZYGenEa6rutS4Pv6XQ4YVj7fPHDoiTL9rc2', '2026-04-03 17:28:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `user_fk_username` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
