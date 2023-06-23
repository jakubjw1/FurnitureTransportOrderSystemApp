-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 23, 2023 at 02:10 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ftos`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `transport_capacity` double(8,2) NOT NULL,
  `height` double(8,2) NOT NULL,
  `width` double(8,2) NOT NULL,
  `length` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `transport_capacity`, `height`, `width`, `length`, `created_at`, `updated_at`) VALUES
(1, 'Ford', 'Transit', 1000.00, 200.00, 150.00, 300.00, '2023-06-23 10:08:59', '2023-06-23 10:08:59'),
(2, 'Ford', 'Transit', 1000.00, 200.00, 150.00, 300.00, '2023-06-23 10:08:59', '2023-06-23 10:08:59'),
(3, 'Ford', 'Transit', 1000.00, 200.00, 150.00, 300.00, '2023-06-23 10:08:59', '2023-06-23 10:08:59'),
(4, 'Renault', 'Master', 1500.00, 220.00, 155.00, 345.00, '2023-06-23 10:08:59', '2023-06-23 10:08:59');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'Adam', 'Kowalski', '2023-06-23 10:08:59', '2023-06-23 10:08:59'),
(2, 'Adrian', 'Nowak', '2023-06-23 10:08:59', '2023-06-23 10:08:59'),
(3, 'Marcin', 'Kowalski', '2023-06-23 10:08:59', '2023-06-23 10:08:59'),
(4, 'Filip', 'Szwacz', '2023-06-23 10:08:59', '2023-06-23 10:08:59');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_07_093833_add_columns_to_user_table', 1),
(6, '2023_06_07_094701_create_services_table', 1),
(7, '2023_06_07_095850_create_cars_table', 1),
(8, '2023_06_07_100008_create_drivers_table', 1),
(9, '2023_06_07_100117_create_orders_table', 1),
(10, '2023_06_07_100421_create_service_orders_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED DEFAULT NULL,
  `driver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_date` datetime NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `service_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `order_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `car_id`, `driver_id`, `order_date`, `payment_method`, `service_date`, `description`, `from`, `destination`, `total_amount`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2023-06-01 10:30:00', 'Credit Card', '2023-06-05', 'Table 100x100x50', 'Rzeszow, Zalesie 123', 'Rzeszow, Targowa 5', 100.00, 'Done', '2023-06-23 10:08:59', '2023-06-23 10:08:59'),
(2, 2, 2, 3, '2023-06-01 10:30:00', 'Cash', '2023-06-03', 'Sofa 300x100x100', 'Rzeszow, Podkarpacka 45', 'Sanok, Kolejowa 10', 150.00, 'Done', '2023-06-23 10:08:59', '2023-06-23 10:08:59');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Furniture Transport(city)', 'Our company offers professional furniture transportation services within the city. Whether you are planning a move to a new apartment, have purchased new furniture for your home, or need to relocate furniture within a room, we can assist you. Our experienced team will ensure the safe and efficient transfer of your furniture within the city, taking care to protect and secure them during transportation.', 50.00, '/images/truck_service.png', '2023-06-23 10:08:59', '2023-06-23 10:08:59'),
(2, 'Furniture transport(province)', 'Need to transport furniture across the province? Our furniture transportation services within the province are perfect for you. Whether you are planning a move to another city within the province or need to deliver furniture to your vacation home, our experienced carriers will provide fast and reliable furniture transport. You can rest assured that your furniture will be properly secured and arrive at its destination intact.', 150.00, '/images/truck_service.png', '2023-06-23 10:08:59', '2023-06-23 10:08:59'),
(3, 'Furniture transport(country)', 'If you are planning a larger-scale move, you require professional furniture transportation services across the country. Whether you are relocating to another city or region, our company offers comprehensive transport solutions. Our specialized fleet of vehicles and experienced crew will ensure the safe and efficient transfer of your furniture over long distances. We can take care of all stages of the process, allowing you to focus on other important aspects of your move.', 250.00, '/images/truck_service.png', '2023-06-23 10:08:59', '2023-06-23 10:08:59'),
(4, 'Disassembly + assembly', 'Whether you are moving to a new home, rearranging your living space, or updating your apartments decor, our furniture disassembly and assembly service is at your disposal. Our experienced teams are equipped with the tools and skills to quickly and precisely disassemble and assemble your furniture. You wont have to worry about complicated assembly instructions or missing parts. Trust us to provide you with convenience and time-saving solutions when moving or updating your furniture.', 50.00, '/images/assembly.jpg', '2023-06-23 10:08:59', '2023-06-23 10:08:59');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `service_orders`
--

CREATE TABLE `service_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_orders`
--

INSERT INTO `service_orders` (`id`, `service_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-06-23 10:08:59', '2023-06-23 10:08:59'),
(2, 2, 2, '2023-06-23 10:08:59', '2023-06-23 10:08:59'),
(3, 4, 1, '2023-06-23 10:08:59', '2023-06-23 10:08:59');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `tax_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `first_name`, `last_name`, `company_name`, `tax_id`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$W9cazqln1DlzsJeo8n1o1uXYeY74Ru4AB2KhBoJ2ereregT9v42Om', 'admin', NULL, '2023-06-23 10:08:58', '2023-06-23 10:08:58', 'Admin', ' ', ' ', 0),
(2, 'user', 'user@gmail.com', '$2y$10$w1wWCUo1gzYxdNwMKLPIqOqKqf.CYwYNkS7BPxXkX8WJnDAb7m6au', 'user', NULL, '2023-06-23 10:08:58', '2023-06-23 10:08:58', 'User', 'User', 'Company1', 1234567890),
(3, 'pawel007', 'pawel007@gmail.com', '$2y$10$2ezaoS2qQmim89DcsCR77eN2WqQgAfcIZbZwctQjMvSP5M0rBhx52', 'user', NULL, '2023-06-23 10:08:59', '2023-06-23 10:08:59', 'Pawel', 'Pawlik', 'Company2', 1321567890),
(4, 'dawid00', 'dawid00@gmail.com', '$2y$10$N2mmxfQj7E/s4fGd1K/o2eimhc61Lh5W/zBWEW./4fuMhxdyLYl9q', 'user', NULL, '2023-06-23 10:08:59', '2023-06-23 10:08:59', 'Dawid', 'Dawidowicz', 'Company1', 1134567890),
(5, 'moni123', 'moni123@gmail.com', '$2y$10$ESds9TZkJFdGAoIYWY93XeRY.ivgW1y6Dl6iw6VwucCf4iX9c9UkW', 'user', NULL, '2023-06-23 10:08:59', '2023-06-23 10:08:59', 'Monika', 'Nowak', 'Company1', 1234567800),
(6, 'arturoo1', 'arturoo1@gmail.com', '$2y$10$zW9MG1kCbN4GzZKpbl2szuC8ibO2D4OK6fjTdj7Ni4eenWidK/rnm', 'user', NULL, '2023-06-23 10:08:59', '2023-06-23 10:08:59', 'Artur', 'Kowalski', ' ', 1224567890);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_car_id_foreign` (`car_id`),
  ADD KEY `orders_driver_id_foreign` (`driver_id`);

--
-- Indeksy dla tabeli `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeksy dla tabeli `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeksy dla tabeli `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `service_orders`
--
ALTER TABLE `service_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_orders_service_id_foreign` (`service_id`),
  ADD KEY `service_orders_order_id_foreign` (`order_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_tax_id_unique` (`tax_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_orders`
--
ALTER TABLE `service_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `orders_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `service_orders`
--
ALTER TABLE `service_orders`
  ADD CONSTRAINT `service_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_orders_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
