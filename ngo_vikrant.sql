-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2025 at 02:14 PM
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
-- Database: `ngo_vikrant`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `application_type` enum('vivah_help','death_help','education_help') NOT NULL,
  `applicant_name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `aadhar_number` varchar(12) NOT NULL,
  `income_certificate` varchar(255) DEFAULT NULL,
  `bank_account` varchar(20) NOT NULL,
  `ifsc_code` varchar(11) NOT NULL,
  `application_amount` decimal(10,2) NOT NULL,
  `application_reason` text NOT NULL,
  `documents` text DEFAULT NULL COMMENT 'JSON field for storing document paths',
  `status` enum('pending','approved','rejected','processing') NOT NULL DEFAULT 'pending',
  `admin_remarks` text DEFAULT NULL,
  `approved_amount` decimal(10,2) DEFAULT 0.00,
  `approved_by` int(11) UNSIGNED DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `application_type`, `applicant_name`, `father_name`, `mother_name`, `phone`, `address`, `aadhar_number`, `income_certificate`, `bank_account`, `ifsc_code`, `application_amount`, `application_reason`, `documents`, `status`, `admin_remarks`, `approved_amount`, `approved_by`, `approved_date`, `created_at`, `updated_at`) VALUES
(1, 2, 'vivah_help', 'राजेश कुमार', 'रामप्रसाद कुमार', 'सीता देवी', '9876543210', 'गली नंबर 5, सेक्टर 15, नोएडा, उत्तर प्रदेश', '123456789012', 'IC/2024/001', '1234567890123456', 'SBIN0001234', 45000.00, 'मेरी बेटी का विवाह आने वाले महीने में है। परिवार की आर्थिक स्थिति अच्छी नहीं है इसलिए विवाह के लिए सहायता की आवश्यकता है।', '{\"aadhar_card\":\"doc1.pdf\",\"income_cert\":\"doc2.pdf\"}', 'approved', 'सभी दस्तावेज सत्यापित और स्वीकृत हैं।\r\n', 40000.00, 1, '2025-10-07 12:08:58', '2025-09-27 07:50:03', '2025-10-07 12:08:58'),
(2, 3, 'death_help', 'प्रिया शर्मा', 'विकास शर्मा', 'सुनीता शर्मा', '9876543211', 'हाउस नंबर 45, कमला नगर, दिल्ली', '123456789013', 'IC/2024/002', '2345678901234567', 'HDFC0001235', 20000.00, 'मेरे पिता जी का हाल ही में निधन हो गया है। अंतिम संस्कार के लिए सहायता की आवश्यकता है।', '{\"death_cert\":\"death1.pdf\",\"aadhar_card\":\"aadhar1.pdf\"}', 'pending', NULL, NULL, NULL, NULL, '2025-10-04 07:50:03', '2025-10-04 07:50:03'),
(3, 4, 'vivah_help', 'अमित वर्मा', 'सुरेश वर्मा', 'गीता वर्मा', '9876543212', 'फ्लैट नंबर 101, रॉयल पैलेस, गुड़गांव, हरियाणा', '123456789014', 'IC/2024/003', '3456789012345678', 'ICIC0001236', 35000.00, 'मेरे छोटे भाई का विवाह निश्चित हो गया है। पारिवारिक आर्थिक समस्या के कारण सहायता चाहिए।', '{\"aadhar_card\":\"doc3.pdf\",\"bank_pass\":\"bank3.pdf\"}', 'processing', 'दस्तावेज सत्यापन के लिए भेजे गए हैं।', NULL, NULL, NULL, '2025-09-30 07:50:03', '2025-10-05 07:50:03'),
(4, 5, 'death_help', 'सुनीता देवी', 'महेश प्रसाद', 'कमला देवी', '9876543213', 'मोहल्ला नया गांव, लखनऊ, उत्तर प्रदेश', '123456789015', 'IC/2024/004', '4567890123456789', 'PUNB0001237', 15000.00, 'मेरी माता जी का दुखद निधन हो गया है। अंतिम क्रिया के लिए आर्थिक सहायता की आवश्यकता है।', '{\"death_cert\":\"death2.pdf\",\"income_cert\":\"income2.pdf\"}', 'approved', 'दस्तावेज सत्यापित। राशि स्वीकृत।', 15000.00, 1, '2025-10-04 07:50:03', '2025-09-29 07:50:03', '2025-10-04 07:50:03'),
(5, 6, 'vivah_help', 'दीपक सिंह', 'राजू सिंह', 'शांति देवी', '9876543214', 'वार्ड नंबर 12, जयपुर, राजस्थान', '123456789016', 'IC/2024/005', '5678901234567890', 'SBIN0001238', 50000.00, 'विवाह के लिए सहायता चाहिए।', '{\"aadhar_card\":\"doc5.pdf\"}', 'rejected', 'अपूर्ण दस्तावेज। आय प्रमाण पत्र गुम। पुनः आवेदन करें।', NULL, 1, NULL, '2025-09-25 07:50:03', '2025-09-29 07:50:03'),
(6, 7, 'education_help', 'कविता गुप्ता', 'अशोक गुप्ता', 'रीता गुप्ता', '9876543215', 'ब्लॉक सी, सेक्टर 22, चंडीगढ़', '123456789017', 'IC/2024/006', '6789012345678901', 'HDFC0001239', 25000.00, 'मेरी बेटी की उच्च शिक्षा के लिए सहायता चाहिए। कॉलेज की फीस भरने में समस्या हो रही है।', '{\"admission_letter\":\"admission1.pdf\",\"fee_receipt\":\"fee1.pdf\"}', 'pending', NULL, NULL, NULL, NULL, '2025-10-05 07:50:03', '2025-10-05 07:50:03'),
(7, 8, 'vivah_help', 'मनीष जैन', 'अनिल जैन', 'सुषमा जैन', '9876543216', 'पुराना शहर, इंदौर, मध्य प्रदेश', '123456789018', 'IC/2024/007', '7890123456789012', 'ICIC0001240', 30000.00, 'परिवार में दो शादियां एक साथ हैं। आर्थिक मदद की जरूरत है।', '{\"aadhar_card\":\"doc7.pdf\",\"income_cert\":\"income7.pdf\"}', 'approved', 'आवेदन उचित है। राशि स्वीकृत।', 25000.00, 1, '2025-10-06 07:50:03', '2025-10-01 07:50:03', '2025-10-06 07:50:03'),
(8, 9, 'death_help', 'नेहा अग्रवाल', 'राजेश अग्रवाल', 'सरोज अग्रवाल', '9876543217', 'नेहरू नगर, भोपाल, मध्य प्रदेश', '123456789019', 'IC/2024/008', '8901234567890123', 'SBIN0001241', 18000.00, 'मेरे दादा जी का हाल ही में निधन हुआ है। परिवार की आर्थिक स्थिति कमजोर है।', '{\"death_cert\":\"death3.pdf\",\"bank_pass\":\"bank8.pdf\"}', 'processing', 'दस्तावेज की जांच की जा रही है।', NULL, NULL, NULL, '2025-10-03 07:50:03', '2025-10-06 07:50:03'),
(9, 10, 'education_help', 'राहुल यादव', 'सुरेंद्र यादव', 'अनीता यादव', '9876543218', 'कृष्णा नगर, पटना, बिहार', '123456789020', 'IC/2024/009', '9012345678901234', 'PUNB0001242', 20000.00, 'इंजीनियरिंग कॉलेज की फीस के लिए सहायता चाहिए। पहले वर्ष की फीस भरने में समस्या है।', '{\"college_id\":\"college9.pdf\",\"fee_structure\":\"fee9.pdf\"}', 'approved', 'शिक्षा सहायता स्वीकृत। अच्छे अंक हैं।', 18000.00, 1, '2025-10-05 07:50:03', '2025-09-28 07:50:03', '2025-10-05 07:50:03'),
(10, 11, 'vivah_help', 'पूजा मिश्रा', 'रामनाथ मिश्रा', 'संगीता मिश्रा', '9876543219', 'आशियाना कॉलोनी, कानपुर, उत्तर प्रदेश', '123456789021', 'IC/2024/010', '0123456789012345', 'HDFC0001243', 40000.00, 'मेरी शादी अगले महीने तय है। पिता जी की नौकरी चली गई है इसलिए सहायता की आवश्यकता है।', '{\"aadhar_card\":\"doc10.pdf\",\"invitation\":\"invite10.pdf\"}', 'pending', NULL, NULL, NULL, NULL, '2025-10-06 07:50:03', '2025-10-06 07:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-10-06-122110', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1759753569, 1),
(2, '2025-10-06-122216', 'App\\Database\\Migrations\\CreateApplicationsTable', 'default', 'App', 1759753569, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `aadhar_number` varchar(12) NOT NULL,
  `role` enum('admin','member') NOT NULL DEFAULT 'member',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `phone`, `address`, `aadhar_number`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@ngovikrant.com', '$2y$10$09uvSv24AeO9TpGpBJy1Te62.rL5mMG1vXveBhifOAeTmYhUeg0Qi', 'एडमिन उपयोगकर्ता', '1234567890', 'एनजीओ विक्रांत कार्यालय', '123456789012', 'admin', 'active', '2025-10-06 12:26:09', '2025-10-06 12:26:09'),
(2, 'vinaysingh43', 'vinaysingh43@gmail.com', '$2y$10$8NSeKYf9P0isugZUEorF4eYWA0It8AO/vY6/9jpV4kxLJSEXukwfq', 'Vinay Singh', '9457790679', 'LGF 10 ANORA KALAN', '123456789012', 'member', 'active', '2025-10-06 13:15:39', '2025-10-06 13:15:39'),
(3, 'rajesh_kumar', 'rajesh.kumar@gmail.com', '$2y$10$Ja23XzxWgkqcl5mZqKPF.e2yawhrfX51sLdZSKE6CaFeHxsvrIC6m', 'राजेश कुमार', '9876543210', 'गली नंबर 5, सेक्टर 15, नोएडा, उत्तर प्रदेश', '123456789012', 'member', 'active', '2025-10-07 06:16:26', '2025-10-07 11:52:27'),
(4, 'priya_sharma', 'priya.sharma@gmail.com', '$2y$10$QKueSftKyQY6M0BpHa7sG.jNSaEyiwBNZ9bOD4mgeVbaVztjcp.nW', 'प्रिया शर्मा', '9876543211', 'हाउस नंबर 45, कमला नगर, दिल्ली', '123456789013', 'member', 'active', '2025-10-07 06:16:26', '2025-10-07 06:16:26'),
(5, 'amit_verma', 'amit.verma@gmail.com', '$2y$10$Gfc0/ij7qXKu/aLdPUfs1ephR7fESOY.Et2KQxRIj3KvMg0lYmDy6', 'अमित वर्मा', '9876543212', 'फ्लैट नंबर 101, रॉयल पैलेस, गुड़गांव, हरियाणा', '123456789014', 'member', 'active', '2025-10-07 06:16:26', '2025-10-07 06:16:26'),
(6, 'sunita_devi', 'sunita.devi@gmail.com', '$2y$10$NJTFdg/tLozKVAKGXfd8xebA8L39mZVPaYCA2vncQVC.Dd6k9IMjO', 'सुनीता देवी', '9876543213', 'मोहल्ला नया गांव, लखनऊ, उत्तर प्रदेश', '123456789015', 'member', 'active', '2025-10-07 06:16:26', '2025-10-07 06:16:26'),
(7, 'deepak_singh', 'deepak.singh@gmail.com', '$2y$10$YFxb7jyLP6nxEzZX.PsYeeLjA/.Uqb7194Yl3veoO5P5PxfXJH4/m', 'दीपक सिंह', '9876543214', 'वार्ड नंबर 12, जयपुर, राजस्थान', '123456789016', 'member', 'active', '2025-10-07 06:16:26', '2025-10-07 06:16:26'),
(8, 'kavita_gupta', 'kavita.gupta@gmail.com', '$2y$10$Ti7gSUMaBtvjU4VQoPTWuu1xkR8AHghEp/RVHLtaQGmhE9vNjiRTO', 'कविता गुप्ता', '9876543215', 'ब्लॉक सी, सेक्टर 22, चंडीगढ़', '123456789017', 'member', 'inactive', '2025-10-07 06:16:26', '2025-10-07 06:16:26'),
(9, 'manish_jain', 'manish.jain@gmail.com', '$2y$10$HKX3adp7O6.1qOI3op5myevQJmCfVKulBdbqZ0jfG0vVXbaeg1sdi', 'मनीष जैन', '9876543216', 'पुराना शहर, इंदौर, मध्य प्रदेश', '123456789018', 'member', 'active', '2025-10-07 06:16:26', '2025-10-07 06:16:26'),
(10, 'neha_agarwal', 'neha.agarwal@gmail.com', '$2y$10$Z9BjDBKqMcbJSzesugRqhO4ONc473d84NWT9wRI1cKOOMUOfKOCGq', 'नेहा अग्रवाल', '9876543217', 'नेहरू नगर, भोपाल, मध्य प्रदेश', '123456789019', 'member', 'active', '2025-10-07 06:16:26', '2025-10-07 06:16:26'),
(11, 'rahul_yadav', 'rahul.yadav@gmail.com', '$2y$10$fTJyFvAk/ZgGPv3lJwe3cuBQ/zp2HomTYbSGy7Uz6/0XgpE7gFP9O', 'राहुल यादव', '9876543218', 'कृष्णा नगर, पटना, बिहार', '123456789020', 'member', 'active', '2025-10-07 06:16:27', '2025-10-07 06:16:27'),
(12, 'pooja_mishra', 'pooja.mishra@gmail.com', '$2y$10$SDDF0KtjVVK4gj9NUY.ry.XOGHYMJm5tz83hj1Pb4F.OmkrNgs0cW', 'पूजा मिश्रा', '9876543219', 'आशियाना कॉलोनी, कानपुर, उत्तर प्रदेश', '123456789021', 'member', 'inactive', '2025-10-07 06:16:27', '2025-10-07 06:16:27'),
(13, 'vinod_tiwari', 'vinod.tiwari@gmail.com', '$2y$10$FsUhYPyXUkP.frQoIP515utMNVsyge/FtkHaeYl1ug6R9SKbk1EHO', 'विनोद तिवारी', '9876543220', 'सिविल लाइन्स, इलाहाबाद, उत्तर प्रदेश', '123456789022', 'member', 'active', '2025-10-07 06:16:27', '2025-10-07 06:16:27'),
(14, 'meera_pandey', 'meera.pandey@gmail.com', '$2y$10$KkRg5Zw2O4ojMHSL35dBMua1SG7cPYiYTrrvPbEnRNw8Vo0VoEt2m', 'मीरा पांडे', '9876543221', 'गोमती नगर, लखनऊ, उत्तर प्रदेश', '123456789023', 'member', 'active', '2025-10-07 06:16:27', '2025-10-07 06:16:27'),
(15, 'suresh_maurya', 'suresh.maurya@gmail.com', '$2y$10$8c5vjTLLUx2OPbXvuRe2feF28of2vAqFmqGevTIN/llvKL.p/JLru', 'सुरेश मौर्य', '9876543222', 'राजा बाजार, वाराणसी, उत्तर प्रदेश', '123456789024', 'member', 'active', '2025-10-07 06:16:27', '2025-10-07 06:16:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_user_id_foreign` (`user_id`),
  ADD KEY `applications_approved_by_foreign` (`approved_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE SET NULL,
  ADD CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
