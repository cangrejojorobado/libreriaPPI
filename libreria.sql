SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `libros` (
  `id` int NOT NULL,
  `Autor` varchar(100) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  `Imagen` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `libros`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;
