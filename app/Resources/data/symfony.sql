
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symfony`
--

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `content`) VALUES
(1, 'An Article', 'Some text goes here'),
(2, 'Another one', 'More text to see');

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `article_id`, `title`, `content`) VALUES
(1, 1, 'First', 'This is the first comment'),
(2, 1, 'Damn', 'second comment for this aritcle');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
