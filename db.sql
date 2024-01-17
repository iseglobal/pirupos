-- -Suppliers

CREATE TABLE `suppliers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `document_id` VARCHAR(100) NOT NULL,
  `company` VARCHAR(100) NOT NULL,
  `names` VARCHAR(100) NOT NULL,
  `lastname` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `address` VARCHAR(200) NOT NULL,
  `observation` TEXT,
  `updated` DATETIME NOT NULL,
  `created` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;