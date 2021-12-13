-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.18-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for notulis
CREATE DATABASE IF NOT EXISTS `notulis` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `notulis`;

-- Dumping structure for table notulis.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table notulis.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table notulis.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table notulis.migrations: ~5 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2021_12_13_121043_create_notulens_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table notulis.notulens
CREATE TABLE IF NOT EXISTS `notulens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `notulis_id` bigint(20) unsigned NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peserta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi_rapat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `risalah_rapat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table notulis.notulens: ~30 rows (approximately)
/*!40000 ALTER TABLE `notulens` DISABLE KEYS */;
REPLACE INTO `notulens` (`id`, `notulis_id`, `hari`, `tanggal`, `tempat`, `peserta`, `materi_rapat`, `risalah_rapat`, `created_at`, `updated_at`) VALUES
	(1, 6, 'Millie Dach', '2021-12-13 14:10:09', 'Jacky O\'Reilly', 'Corporis reiciendis doloremque quod unde porro. Debitis eum qui debitis vero et in in. Vel culpa voluptatibus incidunt placeat sit ab iusto.', 'Excepturi culpa est odio ut tenetur voluptatem veniam. Accusamus repellendus labore dolor non et error. Accusamus accusamus modi ratione reprehenderit.', 'Soluta perferendis nulla inventore quibusdam. Qui et quidem quo quod aut vel. Consequuntur nisi nihil voluptatem fugit.', NULL, NULL),
	(2, 8, 'Ms. Gwen Klocko DVM', '2021-12-13 14:10:09', 'Hertha Konopelski', 'Nisi beatae odio ex pariatur. Nihil debitis iusto quo ea pariatur veniam id. Nihil unde enim omnis et voluptatem et.', 'Illo atque sed aliquid quia. Vel suscipit quis iure ut quia. Debitis et animi molestiae velit est nisi perferendis. Alias non nihil quis animi.', 'Iure expedita et dolorem qui. Sit dolor qui suscipit temporibus minima nam illum. Aut repudiandae nesciunt illo doloribus. Qui sint ex dolorum voluptas placeat expedita fugiat assumenda.', NULL, NULL),
	(3, 6, 'Carley Keebler', '2021-12-13 14:10:10', 'Ibrahim Wunsch', 'Maxime blanditiis cum qui similique delectus. Ratione quis error velit veritatis possimus autem et. Repellat voluptatem aspernatur perferendis vero omnis. Qui hic voluptas ad modi.', 'Quia voluptates est eos aspernatur voluptatum est. Quia quidem exercitationem labore est odit et nesciunt. Voluptatem atque repellat inventore aliquid sapiente.', 'Vero libero id beatae. Libero at reiciendis eos maxime. Voluptatem quia ipsum aut numquam hic. Numquam sed voluptatem rerum sed nihil. Placeat ea vel quia iste. Error magnam ducimus ea quod ut velit.', NULL, NULL),
	(4, 5, 'Dr. Hanna Wisoky II', '2021-12-13 14:10:10', 'Tia O\'Keefe V', 'Eum quia itaque accusantium ea aut. Rerum beatae et modi earum temporibus totam. Velit aut et voluptatum sunt optio sunt odio reprehenderit. Aspernatur velit dolor nesciunt qui asperiores.', 'Aut culpa consequuntur consectetur nihil dolore reprehenderit. Dignissimos quia ut consectetur dolores quae et et.', 'Cupiditate aut nesciunt omnis perspiciatis autem. Illum voluptas quas delectus corporis est sequi. Ad veniam sequi dolores ut ex illo perspiciatis.', NULL, NULL),
	(5, 4, 'Kristoffer Mueller', '2021-12-13 14:10:10', 'Hailey Walsh', 'Quaerat nemo quis quia quisquam. Quidem voluptatum illo ratione similique aliquam ut. Suscipit et rerum ab natus modi. Accusamus provident optio eaque temporibus aut velit sed alias.', 'Ut eius quam molestiae quia id praesentium. Voluptatem quisquam aut praesentium doloremque quae. Inventore et officia expedita rem.', 'Aspernatur dolorum in maiores doloribus sit suscipit voluptatum. Sint qui animi maxime corrupti assumenda. Est qui fugiat sed eius.', NULL, NULL),
	(6, 8, 'Erin Wisozk', '2021-12-13 14:10:10', 'German Bartoletti', 'Perspiciatis dolor deserunt blanditiis nesciunt repellat qui occaecati. Delectus et nostrum doloremque iusto quod est. Odio omnis ut perspiciatis culpa itaque.', 'Doloremque neque voluptatibus adipisci vel. Quia delectus est quasi aut veritatis. Et voluptatem quo maxime.', 'Est perspiciatis molestias ab iure dolores deleniti. Quia illum ex dolorum adipisci sunt ducimus. Facilis dolore vero aperiam vero molestias ea. Aut quis non vel in quis cumque.', NULL, NULL),
	(7, 5, 'Elaina Considine', '2021-12-13 14:10:10', 'Kristina Durgan', 'Voluptatem veniam est voluptas atque eos ut velit. Aut cum ut vel. Quo odio eum maiores.', 'Sint velit iste ut. Dolorem doloribus voluptatem earum tenetur. Dolorem eveniet eaque perferendis adipisci pariatur consectetur eum. Fugit et sit eligendi odit eos fuga.', 'Eaque adipisci voluptas totam nesciunt sit. Accusantium nihil tenetur ut dolorem quis quisquam dicta. Eveniet eos dolorum rem cum. Ut voluptatem corrupti nulla asperiores.', NULL, NULL),
	(8, 4, 'Rick Greenfelder', '2021-12-13 14:10:10', 'Jakayla Hermiston', 'Deserunt tempora quaerat architecto quia consequatur occaecati. Veniam dicta incidunt molestiae. Consequatur ut id pariatur veniam harum pariatur. Expedita deserunt quia officia cum.', 'Distinctio commodi rerum molestiae dolore totam placeat velit est. Iure expedita ullam consectetur molestias.', 'Amet corrupti ducimus sit nihil nobis rem. Quia sint velit quia voluptatem aperiam ut sunt voluptatem. Totam sed veritatis natus dolores quam.', NULL, NULL),
	(9, 5, 'Mac Kuhic', '2021-12-13 14:10:10', 'Eleanore Koch IV', 'Iusto eaque provident illum minima consectetur error. Ducimus asperiores voluptatem autem impedit id. Voluptas ex illo et molestiae vel ipsam.', 'Aut cumque at odio voluptas inventore. Est at maxime porro quae. Quia a tempore ut.', 'Reprehenderit ipsa tempora aut eum eius. Perspiciatis facere quia id unde ullam. Et facere laboriosam quas voluptatem.', NULL, NULL),
	(10, 1, 'Dr. Tavares Weimann I', '2021-12-13 14:10:10', 'Brody Berge', 'Occaecati ducimus alias dicta vero nam. Quis explicabo distinctio labore est qui. Dolor cum sapiente odit quia autem occaecati necessitatibus. Voluptatem odio atque eum recusandae ad.', 'Autem non excepturi voluptas incidunt et. Ipsam earum deleniti quaerat quasi vel. Dolorem magnam minus exercitationem.', 'Eos assumenda libero aut. Pariatur neque et sint omnis consequatur recusandae. Ut dolorum nobis dicta voluptas qui et.', NULL, NULL),
	(11, 8, 'Arlene Kirlin Sr.', '2021-12-13 14:10:10', 'Lorine Moen', 'Itaque reprehenderit omnis aut ab ut nulla natus. Voluptas rerum quia ullam sit adipisci sint eligendi culpa. Vero blanditiis aut et et provident quibusdam quia.', 'Et omnis vitae tempora tempora distinctio optio est. Magni eos quisquam beatae itaque delectus atque. Enim et modi nihil nihil adipisci sit. Qui fugiat iste dolor nobis odit molestias hic.', 'Quam nihil quis est est. Magnam delectus qui odit possimus. Quia odit velit labore ut est esse ducimus.', NULL, NULL),
	(12, 7, 'Mrs. Cleta Kunze IV', '2021-12-13 14:10:10', 'Prof. Dillon Hegmann', 'Minus aperiam deserunt earum qui culpa quia. Quis itaque vel qui et. Ex aliquam accusantium aspernatur dolorum fugit inventore et omnis.', 'Laudantium eius qui est dolorem sint voluptates quisquam. Dicta optio veritatis itaque ex illum voluptas. Ad consequatur aut culpa explicabo.', 'Expedita autem laboriosam ea. Vitae ea veniam inventore dignissimos. Vitae voluptatem sed ea quisquam harum fugit.', NULL, NULL),
	(13, 8, 'Estrella Welch', '2021-12-13 14:10:10', 'Prof. Aleen Grant', 'Sed vel libero quam culpa voluptatem sit. Quam id quaerat molestias est at aut voluptatem. Consequatur eos itaque minus illo ducimus. Itaque odio quisquam voluptates reiciendis.', 'Blanditiis rerum rerum quibusdam et. Dolorem beatae consectetur nobis et. Consequuntur rerum facilis sed est quod quia ducimus.', 'Error rerum est reiciendis magni autem autem. Mollitia nisi blanditiis molestias ut recusandae. Architecto nemo occaecati et aperiam consequuntur. Id beatae et id dicta debitis.', NULL, NULL),
	(14, 8, 'Dr. Durward Littel', '2021-12-13 14:10:10', 'Myrna Ritchie', 'Eum quas et nostrum est omnis nemo error. Ea ex illo nostrum expedita atque. Non nisi consequatur blanditiis laudantium enim fuga. Aut aut omnis nesciunt repellat. Iusto quis aut eum ut ratione.', 'Velit omnis ut omnis autem sint ipsa. Voluptates veritatis amet omnis. Asperiores est est suscipit nihil vel ut natus. Molestiae ab dolor dolore placeat asperiores.', 'Et dolores est ullam dolorem. Eaque impedit sed vel aut et ad. Quod architecto enim harum omnis.', NULL, NULL),
	(15, 6, 'Dr. Ramon Balistreri', '2021-12-13 14:10:10', 'Percy Prosacco Sr.', 'Maiores delectus quasi ea autem labore. Repudiandae quis dolore ipsum placeat maxime aspernatur. Debitis et minima et facilis suscipit veritatis. Vero nisi fuga suscipit autem natus vel.', 'Nihil commodi est laboriosam earum ea earum. Minus fuga occaecati consectetur velit. Temporibus cupiditate minima autem dignissimos suscipit sapiente.', 'Quia nam facere quia voluptates quo eum optio laudantium. Ut eveniet veniam distinctio dolore nihil. Illum est totam ducimus a corrupti sunt. Minus molestiae distinctio odit ut explicabo.', NULL, NULL),
	(16, 7, 'Damon Green', '2021-12-13 14:10:10', 'Mr. Damian Moore II', 'Autem sunt nostrum voluptas modi quisquam blanditiis. Commodi ab nostrum voluptate sed et ut amet atque. Fuga aut quos asperiores aut.', 'Qui omnis quia et ullam qui. Facere consequatur nisi in. Asperiores nobis molestias consequatur est nisi. Eos voluptas omnis quas et.', 'Sed voluptatem accusamus aut omnis. Est omnis soluta harum tenetur animi. Voluptatibus velit accusamus eveniet voluptates nihil et. Ducimus et quidem pariatur qui.', NULL, NULL),
	(17, 4, 'Russ Kozey', '2021-12-13 14:10:11', 'Mrs. Eulalia Von V', 'Aliquid illo necessitatibus exercitationem voluptatem quasi repellendus et. Dolores corrupti sed ut maiores rem qui nam. Iste dolor accusantium quia fuga sapiente.', 'Non nesciunt esse harum vero libero quibusdam. Qui nulla voluptas corrupti eaque voluptatem sed aut explicabo. In quibusdam sunt porro dolor quisquam minima.', 'Earum et perferendis quod itaque minus mollitia ad. Voluptatem quod eaque ut est. Voluptatibus omnis ex optio repellendus provident corrupti.', NULL, NULL),
	(18, 7, 'Terrence Macejkovic', '2021-12-13 14:10:11', 'Tiara Pfannerstill', 'Ab pariatur esse architecto animi quibusdam quidem. Est quasi laborum tempore impedit expedita. Necessitatibus aut nobis velit aut in. Quidem molestiae aut et quis provident.', 'Nesciunt et cum eum temporibus. Laboriosam quia voluptas accusantium sint debitis itaque officia. Recusandae fuga quas enim numquam. Non sint ut qui beatae odit.', 'Et totam labore aut nisi beatae quia corrupti. Sed praesentium rerum eos recusandae deserunt dicta.', NULL, NULL),
	(19, 9, 'Dr. Norberto Sanford II', '2021-12-13 14:10:11', 'Chadd Blanda Jr.', 'Animi beatae sit repudiandae ex ut et. Sequi sint debitis nisi nesciunt. Ut sunt eaque illum. Ut consectetur quidem ad corrupti reprehenderit est et.', 'Optio illum quam temporibus id vel quis. Illo illo ut ipsam suscipit. Sit tempora corporis consequatur perferendis ipsam et laboriosam aut. Repellat velit tempore ratione aut quisquam.', 'Blanditiis sit nesciunt nesciunt eius. Maiores voluptatem aperiam corporis qui nihil quae consequatur. Porro hic officiis unde odio.', NULL, NULL),
	(20, 8, 'Eloise McDermott', '2021-12-13 14:10:11', 'Hank Predovic', 'Libero voluptatibus occaecati omnis qui expedita dolor ea corrupti. Quis repellat vel accusantium optio vel. Facilis vel optio similique aut non. Voluptatum sint vero eligendi eos in tempora.', 'Non officiis reprehenderit impedit laborum at. Amet quia exercitationem ex. Ut impedit fuga sit ab quam autem. Laborum aspernatur corrupti quibusdam. Totam eveniet beatae est nihil.', 'Dolores dolore impedit quos et laboriosam omnis illo beatae. Molestiae quae et iste velit odio eum. Ipsam odio sunt cupiditate similique dolores.', NULL, NULL),
	(21, 9, 'Dewayne Johns III', '2021-12-13 14:10:11', 'Clare Witting MD', 'Dolore ut aperiam ipsam eius. Mollitia autem possimus architecto animi et hic explicabo. Corporis corrupti non porro. Aliquam occaecati necessitatibus est illo enim.', 'Voluptatem ut rerum aperiam maxime occaecati. Eos suscipit eius suscipit sed et. Ullam suscipit sed enim aut quam. Ipsam libero error architecto incidunt. Vero odio consequatur eos est est.', 'Iste in libero qui nulla. Nihil porro aliquid dolore. Aut et tenetur eaque laudantium neque. Sit qui adipisci ut consequatur.', NULL, NULL),
	(22, 5, 'Abby Cummerata I', '2021-12-13 14:10:11', 'Sarai Graham', 'Et vel asperiores natus quis. Maiores quia architecto repudiandae et. Id ullam ab dolorem fuga quasi voluptas animi.', 'Veritatis ratione veritatis ut tempora. Voluptatum sit est doloribus esse. Non ex ad in omnis cumque harum. Officia amet delectus ipsam sequi porro quasi aliquid.', 'Ut et architecto veniam consequuntur vero aut unde. Ratione quibusdam mollitia quis illo eum. Qui totam cum esse doloremque. Ducimus esse suscipit voluptatem cum.', NULL, NULL),
	(23, 6, 'Miss Stephany Sporer Sr.', '2021-12-13 14:10:11', 'Gunner Smith', 'Fugit dolorum at et ut ducimus sequi. Corrupti voluptatem sunt blanditiis omnis. Quasi nesciunt non quasi debitis vitae rerum alias.', 'Non eos natus harum iure voluptatem architecto. Nihil quod nemo ut et. Reprehenderit repellat occaecati ab quod non corporis voluptatum vel.', 'Quibusdam officia quia ut inventore voluptates ut animi. Ut ab velit molestiae quam vero asperiores. Ut et est voluptas modi voluptas debitis. Vero totam ex sequi facere quas.', NULL, NULL),
	(24, 8, 'Etha Weissnat', '2021-12-13 14:10:11', 'Pietro Rosenbaum', 'Perferendis voluptatem iure tenetur vel iste. Dignissimos explicabo iure sed harum. Autem reiciendis eveniet ut. Aut totam et dolorem quos aut.', 'Ipsam et quos sunt hic. Id quo eveniet ut ullam atque. Doloremque voluptatum eaque itaque error architecto omnis.', 'Rerum sed commodi rerum magni error. Earum consequatur officiis aliquam eum facere. Magnam voluptatem ut et repudiandae. Reiciendis corrupti ut quis aut id fugiat est.', NULL, NULL),
	(25, 10, 'Jeanne Baumbach', '2021-12-13 14:10:11', 'Casper Langworth', 'Voluptas sapiente error quia. Qui est dolorum quisquam maiores sunt pariatur. Id autem consequuntur facere nobis libero non. Assumenda sint qui neque consectetur ut dolorem.', 'Quod praesentium doloremque possimus porro. Dolores illo dicta suscipit sequi suscipit aut. Eligendi ullam vitae sit voluptate nostrum inventore minus. A est at soluta molestiae ducimus.', 'Vel dolor harum ducimus aut debitis. Quos voluptatum qui aut quia minima enim ex. Est qui totam dolores possimus perspiciatis ut praesentium ea.', NULL, NULL),
	(27, 6, 'Prof. Morris Auer', '2021-12-13 14:10:11', 'Christelle Kutch', 'Ipsum eum eius harum harum nihil omnis expedita. Exercitationem veniam alias fuga sapiente eos. Blanditiis dolorem quasi aperiam provident consequatur dolorem.', 'Iure a nulla consequatur cum. Quia perferendis et sint iusto animi. Sint distinctio reiciendis illum ab voluptas iusto amet.', 'Corrupti sit odit fugiat eum aliquid molestiae. Eaque ut similique sed deleniti. Impedit nam amet minima ipsa quaerat beatae.', NULL, NULL),
	(28, 8, 'Don Williamson I', '2021-12-13 14:10:11', 'Otis Schiller', 'Rerum molestiae iusto sed veritatis voluptatem cum vitae et. Facilis possimus nisi vitae unde. Quaerat in dignissimos est blanditiis laborum laboriosam.', 'Voluptatem in veritatis aut corrupti nihil neque consequatur et. Dolore itaque eum tenetur dignissimos aliquid voluptas.', 'Architecto quaerat omnis rerum minus. Qui ad ipsam esse et cumque recusandae. Cupiditate animi nemo omnis.', NULL, NULL),
	(29, 3, 'Makenna Mante', '2021-12-13 14:10:11', 'Amara Lebsack', 'Non magnam impedit repudiandae. Soluta velit sed amet saepe accusamus aut in. Doloremque eveniet sapiente numquam ut magni maxime ipsam non. Nam repellat placeat qui quo voluptas soluta.', 'Facilis itaque architecto ut maxime amet. Voluptatem sit tempora cumque impedit consequuntur est. Commodi aliquam quisquam inventore voluptas officia temporibus. Quis nobis quasi sit dolorem fugiat.', 'Ad adipisci nesciunt nemo dignissimos quisquam et. Voluptatem deserunt et sed ad. Eligendi eum in non eaque ipsum.', NULL, NULL),
	(30, 8, 'German Reynolds', '2021-12-13 14:10:11', 'Perry Herzog', 'Ut ab ut minima reprehenderit. Ut facilis assumenda provident et qui hic recusandae. Repellendus quo eius quo dolores quisquam id. Non quidem non vitae ducimus incidunt et aut.', 'Eos et fugit amet voluptas neque facilis suscipit. Quisquam dolores quis voluptas possimus illum. Veniam consequatur sed repellat.', 'Sequi odio sint consequuntur ipsa dolores. Vel mollitia distinctio cumque eum qui qui accusantium.', NULL, NULL),
	(31, 1, 'Selasa', '2021-12-14 18:26:00', 'ahjfah', 'jfhdsyhfshdb', 'yhfyushdfusdjfsdfsdf', '<p>fsfsdfsdfsd</p>\r\n\r\n<ol>\r\n	<li>fsdfsd</li>\r\n	<li>fsd</li>\r\n	<li>f</li>\r\n	<li>sdfsdfsdfsdfsdfsdfsdfsdfsdf</li>\r\n</ol>', '2021-12-13 11:26:47', '2021-12-13 11:26:47');
/*!40000 ALTER TABLE `notulens` ENABLE KEYS */;

-- Dumping structure for table notulis.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table notulis.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table notulis.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table notulis.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table notulis.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_user` enum('ketua','admin','notulis') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table notulis.users: ~10 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `nm_user`, `email`, `email_verified_at`, `password`, `level_user`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Shany Ziemann', 'justyn33@sawayn.net', NULL, '$2y$10$zEiLaN0/Gxhhbo3K/zDDpu/FjQs/4XmDJTs/TYoz2LXTD7J8G.fDW', 'notulis', NULL, NULL, NULL),
	(2, 'Sage Torp', 'marquardt.judd@gmail.com', NULL, '$2y$10$k5h42LNDOzvN68hskBbKGertgbEBegmn.d1thdHnr26PScTZtaHDO', 'notulis', NULL, NULL, NULL),
	(3, 'Prof. Adrian Kreiger', 'okutch@ortiz.biz', NULL, '$2y$10$NHwynxGQXvLdOe/rrdM5AuTbwMVjdBvsp8rpv2x7vvi6N6O4GgSeS', 'notulis', NULL, NULL, NULL),
	(4, 'Augusta Stanton', 'katelin.farrell@gmail.com', NULL, '$2y$10$AfvvVkuXnWhfUJnTMO3IxeqxbpiV9ZNbpguQzFWWqI4kRl2My1dd2', 'notulis', NULL, NULL, NULL),
	(5, 'Jesus Goodwin DVM', 'reichel.felicia@kozey.biz', NULL, '$2y$10$2U.bL4MZLIK9C2exOXK3teg6ZSVuVmghO7Bl1g2PfuVR/..dBOU/K', 'notulis', NULL, NULL, NULL),
	(6, 'Tomasa Hackett', 'meda.green@nader.com', NULL, '$2y$10$b0u..xkJ4l61XSHboTvDneY27FxFLHP534LarbueZ9Gd/UtknHJTi', 'ketua', NULL, NULL, NULL),
	(7, 'Rodrick Cole', 'dale73@hotmail.com', NULL, '$2y$10$fXO4bO4z4JwSsa02yqowm.Y3EQEm3NxbDk.j5HJnihiXY9UkZLVwy', 'ketua', NULL, NULL, NULL),
	(8, 'Deja Braun', 'white.alisa@hotmail.com', NULL, '$2y$10$s0YSm9ysSQ8XJQePyyLgSuAXjWCJL2cD4zgzlpZFnde8wzkzbRun6', 'notulis', NULL, NULL, NULL),
	(9, 'Lura Little', 'mckenna34@yahoo.com', NULL, '$2y$10$8uvMfMlDyXlWSV1HlKCcKum0Yc.0tcnzSamai7pERizF626FAWXyW', 'notulis', NULL, NULL, NULL),
	(10, 'Prof. Skye Hills DVM', 'amira33@yahoo.com', NULL, '$2y$10$WIM7QU5GY/dmD/iUKJrImeGOL/UNVRNZujzaBfnMElpE6ZlZGgSty', 'admin', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
