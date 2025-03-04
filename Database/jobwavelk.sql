-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2023 at 09:59 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21211813_jobwavelk`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_job`
--

CREATE TABLE `add_job` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `num_of_vacancy` int(11) NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `com_id` int(11) NOT NULL,
  `post_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `add_job`
--

INSERT INTO `add_job` (`job_id`, `job_title`, `description`, `num_of_vacancy`, `job_type`, `date`, `time`, `salary`, `com_id`, `post_time`) VALUES
(1, 'Security', 'no', 4, 'part time', '2023-09-15', '18:30:00', 2000.00, 1, '2023-09-03 07:59:53'),
(2, 'Dummy job1', '-', 2, 'part time', '2023-09-06', '12:12:00', 2000.00, 2, '2023-09-04 06:42:45'),
(3, 'Dummy job2', 'description', 1, 'part time', '2023-09-08', '08:00:00', 1500.00, 3, '2023-09-04 06:56:18'),
(4, 'Dummy job3', 'description', 4, 'part time', '2023-09-08', '09:00:00', 1000.00, 4, '2023-09-04 07:03:38'),
(5, 'Cleaning vacancies', 'no', 5, 'part time', '2023-09-14', '05:30:00', 800.00, 1, '2023-09-05 17:24:36'),
(6, 'waiter Vacancies', 'You have to serve food and drinks to customers. You have to work until 2.00 pm.', 2, 'part time', '2023-09-08', '07:00:00', 1000.00, 5, '2023-09-05 19:00:10'),
(7, 'Cleaning Vacancies', 'Cleaning plates, glass', 1, 'part time', '2023-09-08', '06:00:00', 1000.00, 5, '2023-09-05 19:03:00'),
(9, 'Shop Helper', 'Time : 7:00 am to 5:00 pm', 0, 'part time', '2023-09-09', '07:00:00', 1000.00, 7, '2023-09-06 03:09:34'),
(10, 'Hotel watering', 'time 9.00am - 3.00pm', 2, 'part time', '2023-09-08', '09:00:00', 1500.00, 1, '2023-09-06 09:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `com_msg`
--

CREATE TABLE `com_msg` (
  `msg_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `com_msg`
--

INSERT INTO `com_msg` (`msg_id`, `com_id`, `subject`, `message`, `date`) VALUES
(1, 1, 'cdcdc', 'vhjbm ', '2023-09-03 14:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `com_profile`
--

CREATE TABLE `com_profile` (
  `com_id` int(20) NOT NULL,
  `com_description` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `terms` text NOT NULL,
  `reg_id` int(20) NOT NULL,
  `com_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `com_profile`
--

INSERT INTO `com_profile` (`com_id`, `com_description`, `address`, `terms`, `reg_id`, `com_image`) VALUES
(1, 'We are the pioneers of job search.', 'Jobwavelk, Jaffna  ', 'Punctuality imperative. Deliver courteous service. Prioritize conflict resolution. Foster seamless collaboration with colleagues for a harmonious work environment.', 1, 'IMG-64f57aa420dcf6.84044592.jpg'),
(2, 'Update Company Description', 'Update Company Address ', 'Punctuality imperative. Deliver courteous service. Prioritize conflict resolution. Foster seamless collaboration with colleagues for a harmonious work environment.', 6, 'IMG-64f57c7e8fea90.69555005.jpg'),
(3, 'Update Company Description', 'Update Company Address   ', 'Punctuality imperative. Deliver courteous service. Prioritize conflict resolution. Foster seamless collaboration with colleagues for a harmonious work environment.', 7, 'IMG-64f58094050e93.35912864.jpg'),
(4, 'Update Company Description', 'Update Company Address', 'Punctuality imperative. Deliver courteous service. Prioritize conflict resolution. Foster seamless collaboration with colleagues for a harmonious work environment.', 8, 'company_avatar.jpg'),
(5, 'Indulge in JR Restaurant : delicious cuisine, local ingredients, unforgettable dining experience.', 'Adiyapathan Rd, Thirunelvely ', 'Punctuality imperative. Deliver courteous service. Prioritize conflict resolution. Foster seamless collaboration with colleagues for a harmonious work environment.', 13, 'company_avatar.jpg'),
(6, 'A luxury boutique hotel in Jaffna', '257 Jaffna-Kankesanturai Rd, Kokkuvil', 'Punctuality imperative. Deliver courteous service. Prioritize conflict resolution. Foster seamless collaboration with colleagues for a harmonious work environment.', 14, 'IMG-64f77d54795d91.00117345.jpg'),
(7, ' ', 'No.49, Adiyapatham Rd, Thirunelvely, Jaffna  ', 'Punctuality imperative. Deliver courteous service. Prioritize conflict resolution. Foster seamless collaboration with colleagues for a harmonious work environment.', 15, 'IMG-64f7ee345ac672.61411620.jpg'),
(8, 'To Get A Good Experience & Opportunity', '71/3,Arasadi Road, Jaffna, Nothern Province, Jaffna Town, Srilanka 40000,40000Jaffna Town Srilanka. ', 'Punctuality imperative. Deliver courteous service. Prioritize conflict resolution. Foster seamless collaboration with colleagues for a harmonious work environment.', 16, 'company_avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(20) NOT NULL,
  `com_id` int(20) NOT NULL,
  `work_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `com_id`, `work_id`) VALUES
(1, 1, 3),
(3, 3, 2),
(9, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `msg_anyone`
--

CREATE TABLE `msg_anyone` (
  `msg_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(500) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `msg_anyone`
--

INSERT INTO `msg_anyone` (`msg_id`, `name`, `email`, `subject`, `message`, `date`) VALUES
(1, 'Channa maduranga', 'channamaduranga.dh@gmail.com', 'dsd', 'i want to know more deatails', '2023-09-03 14:27:22'),
(2, 'Ravindu deshitha', 'ravindudeshitha01@gmail.com', 'cdcdc', 'rydhfjhjjhkjnkjnm, ,m', '2023-09-03 14:32:08'),
(3, 'Ravindu deshitha', 'ravindudeshitha01@gmail.com', 'fsddsfs', 'dfdfsd', '2023-09-03 14:39:47'),
(4, 'Ravindu deshitha', 'eshitha01@gmail.com', 'fsddsfs', 'dfdfsdffefwef', '2023-09-03 14:40:21'),
(5, 'Deeptha', 'dee@gmail.com', ';fla', 'l;aG<L:GhklJKFA:LKJgrkfdn;kJFLKJHFLKJDASHjgKGKJfgjfhcbGEJKg e fGjSFk skfgKJ gjegfsjfhg iUFEShljh lkhfkjfh ', '2023-09-05 16:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `reg_id` int(20) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `password` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`reg_id`, `user_name`, `user_type`, `email`, `phone_number`, `password`) VALUES
(1, 'Jobwave Company', 'company', 'jobwavelk@gmail.com', 123456789, '$2y$10$iGblFqHavPQhVvgEZSMJeeWM5NGQBYdpVNH/UXXYGKnF9xH7elhHO'),
(2, 'test', 'worker', 'test@gmail.com', 123456789, '$2y$10$R9fQJ0vUOdm/eNkw75T6CuzGvlWsjKBaTv3wqysi6JaGXvzxklTdG'),
(3, 'Jobwave Work', 'worker', 'abc@gmail.com', 1234569870, '$2y$10$C19BRHO114VcVAnzSm4rYeQdTBJhtfV8heOrxKqmwfnuOrXVZEyOq'),
(4, 'channa maduranga', 'worker', 'channamaduranga4@gmail.com', 767450489, '$2y$10$MlMSRlTs0AHCbappGLkgce7/WtLkEjNW84oQXrlEHBgeylJEZqXPW'),
(5, 'Nimantha', 'worker', 'nimantha.rathnayake1999@gmail.com', 778042076, '$2y$10$PtNWJnoW6Su8DCMpi.i9UeG7i2bc7C.hQsrKvy.MRg2WaBpXJkc5G'),
(6, 'Test Com1', 'company', 'testcom1@gmail.com', 1234567890, '$2y$10$ZkfqxpD.w2.qLKrgpEP/T.l0kwSqDXH6wMiheLFVh6eazX5.Rk3Z6'),
(7, 'Test Com 2', 'company', 'channa.uoj@gmail.com', 767450489, '$2y$10$peS7RbybWy1FqmeIOuO.7eQD2.47fAtTci82ADxqcQLtCiiQiwatW'),
(8, 'Test Com 3', 'company', 'ruwiniarunika@gmail.com', 767450489, '$2y$10$zmqpUeS27v3tU2Pj8QGqaueF0QXacQ3cQW3iZwDqHs5IoxujWeqeC'),
(9, 'JOBWAVELK', 'admin', 'jobwavelk@gmail.com', 770710398, '$2y$10$3IIGXits6r0zFCghqwfure7bizuvx6RkMyj/LBwPdN5iKPQb8uI8K'),
(10, 'akilapiyumal', 'worker', 'akilapiyumal11@gmail.com', 711115856, '$2y$10$Qe8XFvrt0uAy.uPslkUFi.Rvjr2KKi9LkQBNdOAfumrEW7HcHSS9.'),
(11, 'Deeptha', 'worker', 'deeptharanaweera26@gmail.com', 768302810, '$2y$10$4K866swUA4CkEY6E9FAi6OonkRjoW3Njcbe7DaWTICyiqcXOpYss2'),
(13, 'JR Restaurant', 'company', 'Jrajakrishnan9@gmail.com', 760045896, '$2y$10$nfAvESaF/21mCuK49CuDAuLbJQHdK8jfPZlGuDGN4dwCpvzNLcwOm'),
(14, 'Fox Resort', 'company', 'hrfoxresort.jaffna@gmail.com', 711115856, '$2y$10$2F6k95VsostlyxU5n/um0.T//2OP2Xn0mA5eKT1A0GVQuoZhSX.Zq'),
(15, 'Wasana Bakery', 'company', 'thineshbabuthiru@gmail.com', 11223345, '$2y$10$cUX7RM1GTREZvneEJIh46uJb549gk3TCdzwVExUZ5pjUhDZTD3Clq'),
(16, 'Yarl IT', 'company', 'myarlit@gmail.com', 777861677, '$2y$10$7yNm3So1fyDCM9lOz.pamO9H4QpfOfjakReShnM5zF8ELT63U03ba'),
(17, 'akila', 'worker', 'akila@gmail.com', 767450489, '$2y$10$7K1Dqz56koyaTBvHktc/muQ7KLDbjLlv1.R741yUE/vbmEeSUDKEK');

-- --------------------------------------------------------

--
-- Table structure for table `work_msg`
--

CREATE TABLE `work_msg` (
  `msg_id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_profile`
--

CREATE TABLE `work_profile` (
  `work_id` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `work_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `work_profile`
--

INSERT INTO `work_profile` (`work_id`, `reg_id`, `description`, `work_image`) VALUES
(1, 2, 'Update Company Description', 'worker_avatar.jpg'),
(2, 3, 'Update Company Description', 'IMG-64f339fa2f5c74.15253426.jpg'),
(3, 4, 'I most llike working on weekend', 'IMG-64f759ea9f8b88.19772055.jpg'),
(4, 5, 'Update Company Description', 'IMG-64f4c18d5270b0.45202969.jpeg'),
(5, 10, 'Update Company Description', ''),
(6, 11, 'Update Company Description', 'IMG-64f761e7e0b851.26429038.jpg'),
(8, 17, 'Update Company Description', 'worker_avatar.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_job`
--
ALTER TABLE `add_job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `com_id` (`com_id`);

--
-- Indexes for table `com_msg`
--
ALTER TABLE `com_msg`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `com_id` (`com_id`);

--
-- Indexes for table `com_profile`
--
ALTER TABLE `com_profile`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD KEY `job_id` (`job_id`),
  ADD KEY `com_id` (`com_id`),
  ADD KEY `work_id` (`work_id`);

--
-- Indexes for table `msg_anyone`
--
ALTER TABLE `msg_anyone`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `work_msg`
--
ALTER TABLE `work_msg`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `work_profile`
--
ALTER TABLE `work_profile`
  ADD PRIMARY KEY (`work_id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_job`
--
ALTER TABLE `add_job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `com_msg`
--
ALTER TABLE `com_msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `com_profile`
--
ALTER TABLE `com_profile`
  MODIFY `com_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `msg_anyone`
--
ALTER TABLE `msg_anyone`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `reg_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `work_msg`
--
ALTER TABLE `work_msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_profile`
--
ALTER TABLE `work_profile`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_job`
--
ALTER TABLE `add_job`
  ADD CONSTRAINT `add_job_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `com_profile` (`com_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `com_msg`
--
ALTER TABLE `com_msg`
  ADD CONSTRAINT `com_msg_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `com_profile` (`com_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `com_profile`
--
ALTER TABLE `com_profile`
  ADD CONSTRAINT `com_profile_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `user` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `add_job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`com_id`) REFERENCES `com_profile` (`com_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_ibfk_3` FOREIGN KEY (`work_id`) REFERENCES `work_profile` (`work_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_profile`
--
ALTER TABLE `work_profile`
  ADD CONSTRAINT `work_profile_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `user` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
