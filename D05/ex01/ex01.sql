CREATE TABLE ft_table (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  login VARCHAR(8) NOT NULL DEFAULT 'toto',
  groupe ENUM('staff', 'student', 'other') NOT NULL,
  date_de_creation DATE NOT NULL);
