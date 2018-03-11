-- Menambahkan field picture
ALTER TABLE `users` ADD `profile_picture` VARCHAR(250) NOT NULL AFTER `level_user`;