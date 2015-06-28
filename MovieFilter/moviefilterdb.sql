-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `moviefilterdb`
--

-- --------------------------------------------------------

--
-- Структура на таблица `actors`
--

CREATE TABLE IF NOT EXISTS `actors` (
  `Film_ID` int(100) NOT NULL,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Film_ID`,`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `actors`
--

INSERT INTO `actors` (`Film_ID`, `Name`) VALUES
(1, 'Brittany Snow'),
(1, 'Max Thieriot'),
(1, 'Vin Diesel'),
(2, 'Busy Philipps'),
(2, 'Marlon Wayans'),
(2, 'Shawn Wayans'),
(3, 'Ashley Judd'),
(3, 'Dwayne Johnson'),
(3, 'Julie Andrews'),
(4, 'Channing Tatum'),
(4, 'Ice Cube'),
(4, 'Jonah Hill'),
(5, 'Dwayne Johnson'),
(5, 'Paul Walker'),
(5, 'Vin Diesel'),
(6, 'Blake Lively'),
(6, 'Harrison Ford'),
(6, 'Michiel Hulsman'),
(7, 'Ansel Elgort'),
(7, 'Shailene Woodley'),
(7, 'Theo James'),
(8, 'Carrie-Anne Moss'),
(8, 'Keanu Reeves'),
(8, 'Laurence Fishburne');

-- --------------------------------------------------------

--
-- Структура на таблица `actors_info`
--

CREATE TABLE IF NOT EXISTS `actors_info` (
  `Name` varchar(50) NOT NULL,
  `Info` varchar(1500) NOT NULL,
  `Image` varchar(255) NOT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `Film_ID` int(100) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Comment` varchar(2000) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Username`,`Date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `comments`
--

INSERT INTO `comments` (`Film_ID`, `Username`, `Comment`, `Date`) VALUES
(4, 'JoroIo', 'This is my first comment here...', '2015-06-27 15:38:01'),
(4, 'JoroIo', 'And here comes my second comment!', '2015-06-27 15:38:27');

-- --------------------------------------------------------

--
-- Структура на таблица `directors_info`
--

CREATE TABLE IF NOT EXISTS `directors_info` (
  `Name` varchar(50) NOT NULL,
  `Info` varchar(1500) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `Title` varchar(200) NOT NULL,
  `Duration` int(4) NOT NULL,
  `Genre` varchar(255) NOT NULL,
  `Director` varchar(100) NOT NULL,
  `Actor` varchar(500) NOT NULL,
  `Year` varchar(11) NOT NULL,
  `Description` varchar(2500) NOT NULL,
  `Rating` float NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Схема на данните от таблица `films`
--

INSERT INTO `films` (`ID`, `Title`, `Duration`, `Genre`, `Director`, `Actor`, `Year`, `Description`, `Rating`, `Image`) VALUES
(1, 'The Pacifier', 95, 'Action, Comedy, Drama', 'Adam Shankman', 'Vin Diesel, Brittany Snow, Max Thieriot', '2005', 'Disgraced Navy SEAL Shane Wolfe is handed a new assignment: Protect the five Plummer kids from enemies of their recently deceased father -- a government scientist whose top-secret experiment remains in the kids'' house.', 5.5, 'ThePacifier.jpg'),
(2, 'White Chicks', 109, 'Comedy', 'Keenen Ivory Wayans', 'Marlon Wayans, Shawn Wayans, Busy Philipps', '2004', 'Two disgraced FBI agents go way undercover in an effort to protect hotel heiresses the Wilson Sisters from a kidnapping plot.', 5.4, 'WhiteChicks.jpg'),
(3, 'Tooth Fairy', 101, 'Comedy, Fantasy', 'Michael Lembeck', 'Dwayne Johnson, Ashley Judd, Julie Andrews', '2010', 'A bad deed on the part of a tough minor-league hockey player results in an unusual sentence: He must serve one week as a real-life tooth fairy.', 5, 'ToothFairy.jpg'),
(4, '22 Jump Street', 112, 'Action, Comedy', 'Phil Lord', 'Channing Tatum, Jonah Hill, Peter Stormare', '2014', 'After making their way through high school (twice), big changes are in store for officers Schmidt and Jenko when they go deep undercover at a local college.', 7.1, '22jumpStreet.jpg'),
(5, 'Fast and Furious 6', 130, 'Action', 'Justin Lin', 'Vin Diesel, Paul Walker, Dwayne Johnson', '2013', 'Hobbs has Dominic and Brian reassemble their crew to take down a team of mercenaries: Dominic unexpectedly gets convoluted also facing his presumed deceased girlfriend, Letty.', 7.2, 'FastAndFurious6.jpg'),
(6, 'The Age of Adaline', 112, 'Drama, Romantic', 'Lee Toland Krieger', 'Blake Lively, Michiel Huisman, Harrison Ford', '2015', 'A young woman, born at the turn of the 20th century, is rendered ageless after an accident. After many solitary years, she meets a man who complicates the eternal life she has settled into.', 7.3, 'TheAgeOfAdaline.jpg'),
(7, 'Insurgent', 119, 'Romantic', 'Robert Schwentke', 'Shailene Woodley, Ansle Elgort, Theo James', '2015', 'Beatrice Prior must confront her inner demons and continue her fight against a powerful alliance which threatens to tear her society apart with the help from others on her side.', 6.9, 'Insurgent.jpg'),
(8, 'The Matrix', 136, 'Action, Fantasy, Horror', 'Andy Wachowski', 'Keanu Reeves, Laurence Fishburne, Carrie-Ann Moss', '1999', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', 8.7, 'TheMatrix.jpg'),
(9, 'The Ring', 115, 'Horror', 'Gore Verbinski', 'Naomi Watts, Martin Henderson, Brian Cox', '2002', 'A journalist must investigate a mysterious videotape which seems to cause the death of anyone in a week of viewing it.', 7.1, 'TheRing.jpg'),
(10, 'Big Game', 110, 'Action', 'Jalmari Helander', 'Samuel Jackson, Onni Tommila, Ray Stevenson', '2014', 'A young teenager camping in the woods helps rescue the President of the United States when Air Force One is shot down near his campsite.', 5.7, 'BigGame.jpg'),
(11, 'Bravetown', 112, 'Drama', 'Daniel Duran', 'Laura Dern, Maria Bello, Josh Duhamel', '2015', 'Josh is a lost soul with an extraordinary musical talent set on a journey to encounter what he was least expecting but undoubtedly needed most. Feeling like it is him against the world at first, his path is crossed by many people looking for their own fate, that in the end, his presence in their lives turns out to be of extraordinary importance.', 5.9, 'Bravetown.jpg'),
(12, 'InsideOut', 94, 'Comedy, Drama', 'Pete Docter', 'Amy Poehler, Bill Hader, Lewis Black', '2015', 'After young Riley is uprooted from her Midwest life and moved to San Francisco, her emotions - Joy, Fear, Anger, Disgust and Sadness - conflict on how best to navigate a new city, house and school.', 8.9, 'InsideOut.jpg'),
(13, 'Survivor', 96, 'Action', 'James McTeigue', 'Paddy Wallace, Parker Sawyers, Bashar Rahal', '2015', 'A Foreign Service Officer in London tries to prevent a terrorist attack set to hit New York, but is forced to go on the run when she is framed for crimes she did not commit.', 5.5, 'Survivor.jpg'),
(14, 'Taken 3', 109, 'Action', 'Olivier Megaton', 'Liam Neeson, Forest Whitaker, Maggie Grace', '2014', 'Ex-government operative Bryan Mills is accused of a ruthless murder he never committed or witnessed. As he is tracked and pursued, Mills brings out his particular set of skills to find the true killer and clear his name.', 6.1, 'Taken3.jpg'),
(15, 'Ted 2', 115, 'Comedy', 'Seth MacFarlane', 'Mark Wahlberg, Seth MacFarlane, Amanda Seyfried', '2015', 'Newlywed couple Ted and Tami-Lynn want to have a baby, but in order to qualify to be a parent, Ted will have to prove he is a person in a court of law.', 6.3, 'Ted2.jpg'),
(16, 'Tomorrowland', 130, 'Action, Fantasy', 'Brad Bird', 'George Clooney, Britt Robertson, Hugh Laurie', '2015', 'Bound by a shared destiny, a teen bursting with scientific curiosity and a former boy-genius inventor embark on a mission to unearth the secrets of a place somewhere in time and space that exists in their collective memory.', 6.7, 'Tomorrowland.jpg'),
(23, 'Fast Five', 131, 'Action, Drama', 'Justin Lin', 'Vin Diesel, Paul Walker, Dwayne Johnson', '2011', 'Dominic Toretto and his crew of street racers plan a massive heist to buy their freedom while in the sights of a powerful Brazilian drug lord and a dangerous federal agent.', 7.6, 'FastFive.jpg');

-- --------------------------------------------------------

--
-- Структура на таблица `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `Film_ID` int(5) NOT NULL,
  `Genre` varchar(20) NOT NULL,
  PRIMARY KEY (`Film_ID`,`Genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `genres`
--

INSERT INTO `genres` (`Film_ID`, `Genre`) VALUES
(1, 'Action'),
(1, 'Comedy'),
(1, 'Drama'),
(2, 'Comedy'),
(3, 'Comedy'),
(3, 'Fantasy'),
(4, 'Action'),
(4, 'Comedy'),
(5, 'Action'),
(6, 'Drama'),
(6, 'Romantic'),
(7, 'Romantic'),
(8, 'Action'),
(8, 'Fantasy'),
(8, 'Horror'),
(9, 'Horror'),
(10, 'Action'),
(11, 'Drama'),
(12, 'Comedy'),
(12, 'Drama'),
(13, 'Action'),
(14, 'Action'),
(15, 'Comedy'),
(16, 'Action'),
(16, 'Fantasy');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(35) NOT NULL AUTO_INCREMENT,
  `fname` varchar(120) NOT NULL,
  `lname` varchar(120) NOT NULL,
  `uname` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `gender` varchar(120) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`ID`, `fname`, `lname`, `uname`, `email`, `password`, `gender`, `isAdmin`) VALUES
(2, 'Georgi', 'Ivanov', 'joroio', 'ghim@abv.bg', 'a2bd81f508ae3e4dc7910f15ab71c58b', 'male', 0),
(3, 'Dimitar', 'Slavchev', 'dimslavchev', 'dslavchev@abv.bg', 'f453c8af711ff87177c8a1eec42d435e', 'male', 0),
(4, 'Admin', 'Administratorov', 'administrator', 'admin@abv.bg', 'cc26cd414f8376f8237027628069cc66', 'male', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
