-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.3.22-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.0.0.5958
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп данных таблицы hw3db.accounts: ~11 rows (приблизительно)
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` (`id`, `user_id`, `balance`, `currency_id`) VALUES
	(1, 1, 15000, 1),
	(2, 1, 70000, 3),
	(3, 1, 35000, 2),
	(4, 2, 700, 1),
	(5, 2, 7800, 3),
	(6, 2, 159123, 2),
	(7, 3, 430, 1),
	(8, 3, 900, 2),
	(9, 3, 750, 3),
	(10, 4, 250, 3),
	(11, 5, 330, 2);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;

-- Дамп данных таблицы hw3db.amounts: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `amounts` DISABLE KEYS */;
INSERT INTO `amounts` (`id`, `cashbox_id`, `value`, `quantity`) VALUES
	(1, 1, 200, 100),
	(2, 1, 500, 50),
	(3, 1, 50, 150),
	(4, 1, 20, 100),
	(5, 4, 500, 50);
/*!40000 ALTER TABLE `amounts` ENABLE KEYS */;

-- Дамп данных таблицы hw3db.cashboxes: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `cashboxes` DISABLE KEYS */;
INSERT INTO `cashboxes` (`id`, `city`, `model`, `currency_id`) VALUES
	(1, 'Poltava', 'px-5', 1),
	(2, 'Poltava', 'px-5', 2),
	(3, 'Poltava', 'px-5', 3),
	(4, 'Kyiv', 'kx-5', 1),
	(5, 'Kyiv', 'kx-5', 2),
	(6, 'Kyiv', 'kx-5', 3),
	(7, 'Lviv', 'lx-5', 1),
	(8, 'Lviv', 'lx-5', 2),
	(9, 'Lviv', 'lx-5', 3);
/*!40000 ALTER TABLE `cashboxes` ENABLE KEYS */;

-- Дамп данных таблицы hw3db.currencies: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` (`id`, `sign`, `name`) VALUES
	(1, '₴ ', 'Hryvnia'),
	(2, '$', 'Dollar'),
	(3, '₽', 'Rouble');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;

-- Дамп данных таблицы hw3db.logs: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` (`id`, `date`, `cashbox_id`, `account_id`, `amount`) VALUES
	(1, '2010-09-15 04:16:13', 1, 3, 150),
	(2, '2003-10-11 15:18:44', 4, 7, 13000),
	(3, '2001-02-03 04:05:06', 6, 2, 4000),
	(4, '2012-08-11 12:17:21', 8, 1, 8000),
	(5, '2001-02-03 04:05:06', 2, 8, 4200),
	(6, '2008-09-01 01:11:11', 1, 1, 1111),
	(7, '2002-03-04 05:06:07', 7, 11, 7812),
	(8, '2004-05-06 07:08:09', 3, 4, 9000),
	(9, '2005-06-07 08:09:15', 5, 5, 1307),
	(10, '2007-08-09 01:11:12', 9, 9, 777);
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Дамп данных таблицы hw3db.users: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `age`) VALUES
	(1, 'Alex', 23),
	(2, 'Vladislav', 20),
	(3, 'Onemore', 50),
	(4, 'Houken', 35),
	(5, 'James', 63);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
