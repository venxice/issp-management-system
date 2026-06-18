-- Create positions table
CREATE TABLE IF NOT EXISTS `positions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Add position_id column to users table if it doesn't exist
ALTER TABLE `users` ADD COLUMN IF NOT EXISTS `position_id` int DEFAULT NULL AFTER `department_id`;
ALTER TABLE `users` ADD KEY IF NOT EXISTS `users_position_id_key` (`position_id`);

-- Seed initial positions
INSERT INTO `positions` (`name`, `created_at`) VALUES
('Director General', NOW()),
('Assistant Director', NOW()),
('Chief ICT', NOW()),
('ICT Planner', NOW()),
('Network Administrator', NOW()),
('Software Developer', NOW()),
('Computer Maintenance Technologist', NOW()),
('Data Management Specialist', NOW()),
('Administrative Aide', NOW()),
('Project Manager', NOW())
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`);
