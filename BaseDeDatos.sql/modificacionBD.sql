ALTER TABLE `usuarios`
ADD `reset_token` TEXT COLLATE utf8mb4_general_ci DEFAULT NULL,
ADD `reset_expires` DATETIME DEFAULT NULL;