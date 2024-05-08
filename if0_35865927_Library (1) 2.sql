-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql200.infinityfree.com
-- Generation Time: Jan 27, 2024 at 05:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_35865927_Library`
--

-- --------------------------------------------------------

--
-- Table structure for table `Authors`
--

CREATE TABLE `Authors` (
  `A_ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Authors`
--

INSERT INTO `Authors` (`A_ID`, `Name`) VALUES
(20, 'Adam M. Grant'),
(12, 'Bram Stoker'),
(21, 'Cal Newport'),
(13, 'Cassandra Clare'),
(10, 'Charlotte Bronte'),
(19, 'Cormac McCarthy'),
(18, 'Daphne du Maurier'),
(8, 'Donna Tartt'),
(14, 'E.B. White'),
(9, 'F. Scott Fitzgerald'),
(16, 'Frank Herbert'),
(7, 'Gabriel Garcia Marquez'),
(15, 'George Orwell'),
(3, 'J. R. R. Tolkien'),
(1, 'Jane Austen'),
(11, 'Markus Zusak'),
(6, 'Mary Shelley'),
(17, 'Roald Dahl'),
(4, 'Stephen King'),
(5, 'Virginia Woolf');

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `ISBN` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Summary` text NOT NULL,
  `No_of_copies` int(11) NOT NULL,
  `Picture_path` varchar(200) NOT NULL,
  `Publisher` varchar(50) NOT NULL,
  `Author` varchar(40) NOT NULL,
  `Genre` varchar(20) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`ISBN`, `Title`, `Summary`, `No_of_copies`, `Picture_path`, `Publisher`, `Author`, `Genre`, `Date`) VALUES
(1, 'Pride and Prejudice', 'Pride and Prejudice follows the turbulent relationship between Elizabeth Bennet, the daughter of a country gentleman, and Fitzwilliam Darcy, a rich aristocratic landowner. They must overcome the titular sins of pride and prejudice in order to fall in love and marry.', 7, 'resources/images/books/Pride and PREJUDICE.jpg', 'Penguin Books', 'Jane Austen', 'Classics', '2024-01-16'),
(2, 'Frankenstein', 'Frankenstein tells the story of gifted scientist Victor Frankenstein who succeeds in giving life to a being of his own creation. However, this is not the perfect specimen he imagines that it will be, but rather a hideous creature who is rejected by Victor and mankind in general.', 15, 'resources/images/books/Frankenstein.jpg', 'Penguin Books', 'Mary Shelley', 'Classics', '2024-01-01'),
(3, '100 Years of Solitude', 'Set in the fictional town of Macondo, the narrative follows seven generations of the Buendía family, weaving a rich tapestry of love, power, isolation, and destiny. From the town\'s inception to its foreordained demise, the tale encapsulates the cyclical nature of history and the universality of human experiences.', 10, 'resources/images/books/100 years of solitude.jpg', 'Penguin Books', 'Gabriel Garcia Marquez', 'Classics', '2024-01-15'),
(4, 'The Secret History', 'The Secret History (1992) is the gripping tale of a group of Classics students at a New England college who are involved in the murder of a classmate. The novel explores the complex relationships between the friends, and the impact the incident has on their lives.', 12, 'resources/images/books/the secret history.jpg', 'Penguin Books', 'Donna Tartt', 'Classics', '2024-01-06'),
(5, 'Persuasion', 'Persuasion focuses on Anne Elliot. When Anne was young, she was in love with a man named Frederick Wentworth. Due to his lack of fortune and lower social standing', 8, 'resources/images/books/Persuasion.jpg', 'Penguin Books', 'Jane Austen', 'Classics', '2024-01-14'),
(7, 'The Great Gatsby', 'The Great Gatsby is a 1925 novel by American writer F. Scott Fitzgerald. Set in the Jazz Age on Long Island, near New York City, the novel depicts first-person narrator Nick Carraway\'s interactions with mysterious millionaire Jay Gatsby and Gatsby\'s obsession to reunite with his former lover, Daisy Buchanan.', 9, 'resources/images/books/The great Gatsby.jpg', 'Penguin Books', 'F. Scott Fitzgerald', 'Classics', '2023-12-19'),
(8, 'To the Lighthouse', 'To the Lighthouse is a novel that explores the passage of time and the complexities of human relationships. Set on the Isle of Skye, the story revolves around the Ramsay family and their guests as they navigate their inner thoughts and emotions during a summer vacation.', 8, 'resources/images/books/to the lighthouse.jpg', 'Penguin Books', 'Virginia Woolf', 'Classics', '2023-12-05'),
(9, 'Jane Eyre', 'The novel follows the story of Jane, a seemingly plain and simple girl as she battles through life\'s struggles. Jane has many obstacles in her life - her cruel and abusive Aunt Reed, the grim conditions at Lowood school, her love for Rochester and Rochester\'s marriage to Bertha.', 10, 'resources/images/books/jane Eyre.jpg', 'HarperCollins', 'Charlotte Bronte', 'Classics', '2024-01-21'),
(10, 'The Waves', 'Set at a beach where growing up goes wrong, WAVES is a coming-of-age story about first love and first loss; about a family drowning in sorrow, and the remarkable son who is struggling against the tide to save them.\r\n', 12, 'resources/images/books/The Waves.jpeg', 'Penguin Books', 'Virginia Woolf', 'Classics', '2024-01-13'),
(11, 'The Fellowship', 'The Fellowship of the Ring consists of nine walkers who set out on the quest to destroy the One Ring, in opposition to the nine Black Riders: Frodo Baggins, Sam Gamgee, Merry Brandybuck and Pippin Took; Gandalf; the Men Aragorn and Boromir, son of the Steward of Gondor; the Elf Legolas; and the Dwarf Giml', 4, 'resources/images/books/Fellowship of the ring.jpeg', 'Simon and Schuster', 'J. R. R. Tolkein', 'Fantasy', '2024-01-13'),
(12, 'The Return', 'Gandalf rescues the hobbits with the help of eagles, and the surviving Fellowship is happily reunited in Minas Tirith. Aragorn is crowned King of Gondor and marries Arwen. The Hobbits return home to the Shire, where Sam marries Rosie Cotton.', 11, 'resources/images/books/Return of the King.jpeg', 'Simon and Schuster', 'J. R. R. Tolkein', 'Fantasy', '2023-12-17'),
(13, 'The Book Thief ', 'It is 1939. Nazi Germany. The country is holding its breath. Death has never been busier, and will be busier still.\r\n\r\nBy her brother\'s graveside, Liesel\'s life is changed when she picks up a single object, partially hidden in the snow. It is The Gravedigger\'s Handbook, left behind there by accident, and it is her first act of book thievery. So begins a love affair with books and words, as Liesel, with the help of her accordian-playing foster father, learns to read. Soon she is stealing books from Nazi book-burnings, the mayor\'s wife\'s library, wherever there are books to be found.', 10, 'resources/images/books/The Book Thief.jpeg', 'Simon and Schuster', 'Markus Zusak', 'Classics', '2023-12-27'),
(14, 'Dracula', 'When Jonathan Harker visits Transylvania to help Count Dracula with the purchase of a London house, he makes a series of horrific discoveries about his client. Soon afterwards, various bizarre incidents unfold in England: an apparently unmanned ship is wrecked off the coast of Whitby; a young woman discovers strange puncture marks on her neck; and the inmate of a lunatic asylum raves about the \'Master\' and his imminent arrival.', 9, 'resources/images/books/Dracula.jpeg', 'HarperCollins', 'Bram Stoker', 'Horror', '2024-01-08'),
(15, 'City of Bones', 'When fifteen-year-old Clary Fray heads out to the Pandemonium Club in New York City, she hardly expects to witness a murder― much less a murder committed by three teenagers covered with strange tattoos and brandishing bizarre weapons. Then the body disappears into thin air. It\'s hard to call the police when the murderers are invisible to everyone else and when there is nothing―not even a smear of blood―to show that a boy has died. Or was he a boy?', 10, 'resources/images/books/City of Bones.jpeg', 'Simon and Schuster', 'Cassandra Clare', 'Fantasy', '2024-01-10'),
(16, 'Charlotte\'s Web', 'Some Pig. Humble. Radiant. These are the words in Charlotte\'s Web, high up in Zuckerman\'s barn. Charlotte\'s spiderweb tells of her feelings for a little pig named Wilbur, who simply wants a friend. They also express the love of a girl named Fern, who saved Wilbur\'s life when he was born the runt of his litter.', 6, 'resources/images/books/Charlotte\'s Web.jpeg', 'Macmillan Publishers', 'E.B. White', 'Children', '2024-01-12'),
(17, '1984', 'Among the seminal texts of the 20th century, Nineteen Eighty-Four is a rare work that grows more haunting as its futuristic purgatory becomes more real. Published in 1949, the book offers political satirist George Orwell\'s nightmarish vision of a totalitarian, bureaucratic world and one poor stiff\'s attempt to find individuality. The brilliance of the novel is Orwell\'s prescience of modern life—the ubiquity of television, the distortion of the language—and his ability to construct such a thorough version of hell. Required reading for students since it was published, it ranks among the most terrifying novels ever written.', 10, 'resources/images/books/1984.jpeg', 'Penguin Books', 'Geroge Orwell', 'Sci-Fi', '2024-01-26'),
(18, 'Animal Farm', 'A farm is taken over by its overworked, mistreated animals. With flaming idealism and stirring slogans, they set out to create a paradise of progress, justice, and equality. Thus the stage is set for one of the most telling satiric fables ever penned –a razor-edged fairy tale for grown-ups that records the evolution from revolution against tyranny to a totalitarianism just as terrible.\r\nWhen Animal Farm was first published, Stalinist Russia was seen as its target. Today it is devastatingly clear that wherever and whenever freedom is attacked, under whatever banner, the cutting clarity and savage comedy of George Orwell’s masterpiece have a meaning and message still ferociously fresh.', 10, 'resources/images/books/Animal Farm.jpeg', 'Penguin Books', 'Geroge Orwell', 'Fantasy', '2024-01-24'),
(19, 'Dune', 'Set on the desert planet Arrakis, Dune is the story of the boy Paul Atreides, heir to a noble family tasked with ruling an inhospitable world where the only thing of value is the “spice” melange, a drug capable of extending life and enhancing consciousness. Coveted across the known universe, melange is a prize worth killing for...\r\n\r\nWhen House Atreides is betrayed, the destruction of Paul’s family will set the boy on a journey toward a destiny greater than he could ever have imagined. And as he evolves into the mysterious man known as Muad’Dib, he will bring to fruition humankind’s most ancient and unattainable dream.', 10, 'resources/images/books/Dune.jpg', 'HarperCollins', 'Frank Herbert', 'Sci-Fi', '2024-01-10'),
(20, 'Matilda', 'Matilda is a little girl who is far too good to be true. At age five-and-a-half she\'s knocking off double-digit multiplication problems and blitz-reading Dickens. Even more remarkably, her classmates love her even though she\'s a super-nerd and the teacher\'s pet. But everything is not perfect in Matilda\'s world...\r\n\r\nFor starters she has two of the most idiotic, self-centered parents who ever lived. Then there\'s the large, busty nightmare of a school principal, Miss (\"The\") Trunchbull, a former hammer-throwing champion who flings children at will, and is approximately as sympathetic as a bulldozer. Fortunately for Matilda, she has the inner resources to deal with such annoyances: astonishing intelligence, saintly patience, and an innate predilection for revenge.', 6, 'resources/images/books/Matilda.jpeg', 'Penguin Books', 'Roald Dahl', 'Children', '2024-01-17'),
(21, 'Rebecca', 'Last night I dreamt I went to Manderley again...\"\r\n\r\nAncient, beautiful Manderley, between the rose garden and the sea, is the county\'s showpiece. Rebecca made it so - even a year after her death, Rebecca\'s influence still rules there. How can Maxim de Winter\'s shy new bride ever fill her place or escape her vital shadow?\r\n\r\nA shadow that grows longer and darker as the brief summer fades, until, in a moment of climatic revelations, it threatens to eclipse Manderley and its inhabitants completely...', 10, 'resources/images/books/Rebecca.jpeg', 'HarperCollins', 'Daphne du Maurier', 'Mystery', '2024-01-02'),
(22, 'The Road', 'A father and his son walk alone through burned America. Nothing moves in the ravaged landscape save the ash on the wind. It is cold enough to crack stones, and when the snow falls it is gray. The sky is dark. Their destination is the coast, although they don’t know what, if anything, awaits them there. They have nothing; just a pistol to defend themselves against the lawless bands that stalk the road, the clothes they are wearing, a cart of scavenged food—and each other.\r\n\r\nThe Road is the profoundly moving story of a journey. It boldly imagines a future in which no hope remains, but in which the father and his son, “each the other’s world entire,” are sustained by love. Awesome in the totality of its vision, it is an unflinching meditation on the worst and the best that we are capable of: ultimate destructiveness, desperate tenacity, and the tenderness that keeps two people alive in the face of total devastation.', 10, 'resources/images/books/The Road.jpeg', 'Simon and Schuster', 'Cormac McCarthy', 'Horror', '2024-01-14'),
(23, 'It', 'Welcome to Derry, Maine ...\r\n\r\nIt’s a small city, a place as hauntingly familiar as your own hometown. Only in Derry the haunting is real ...\r\n\r\nThey were seven teenagers when they first stumbled upon the horror. Now they are grown-up men and women who have gone out into the big world to gain success and happiness. But none of them can withstand the force that has drawn them back to Derry to face the nightmare without an end, and the evil without a name.', 6, 'resources/images/books/It.jpeg', 'Simon and Schuster', 'Stephen King', 'Thriller', '2024-01-01'),
(24, 'Think Again', 'Think Again is a book about the benefit of doubt, and about how we can get better at embracing the unknown and the joy of being wrong. Evidence has shown that creative geniuses are not attached to one identity, but constantly willing to rethink their stances and that leaders who admit they don\'t know something and seek critical feedback lead more productive and innovative teams.', 5, 'resources/images/books/Think Again.jpeg', 'Macmillan Publishers', 'Adam M. Grant', 'Science', '2024-01-09'),
(25, 'Digital Minimalism', 'Digital minimalists are all around us. They\'re the calm, happy people who can hold long conversations without furtive glances at their phones. They can get lost in a good book, a woodworking project, or a leisurely morning run. They can have fun with friends and family without the obsessive urge to document the experience. They stay informed about the news of the day, but don\'t feel overwhelmed by it. They don\'t experience \"fear of missing out\" because they already know which activities provide them meaning and satisfaction.', 3, 'resources/images/books/Digital Minimalism.jpeg', 'Simon and Schuster', 'Cal Newport', 'Science', '2024-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `Genres`
--

CREATE TABLE `Genres` (
  `G_ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Genres`
--

INSERT INTO `Genres` (`G_ID`, `Name`) VALUES
(1, 'Classics'),
(2, 'Sci-Fi'),
(3, 'Mystery'),
(4, 'Horror'),
(5, 'Thriller'),
(6, 'Science'),
(7, 'Children'),
(8, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `Members`
--

CREATE TABLE `Members` (
  `M_ID` int(11) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Members`
--

INSERT INTO `Members` (`M_ID`, `Fname`, `Lname`, `Email`, `Password`, `Phone`) VALUES
(1, 'Shatha', 'Bitar', '22110021@htu.edu.jo', '123456', 796407478),
(2, 'shatha', 'Bitar', 'shathah28@outlook.com', '123456', 796407478),
(4, 'Shatha', 'Bitar', '22110021@google', '123456', 796407478),
(5, 'Shatha', 'Bitar', '11@hotm', '', 796407478),
(6, 'Shatha', 'Bitar', '11@gr', '12345', 8),
(8, 'Shatha', '123', 'shathab28@gmail.com', '1234', 796407478),
(9, 'Shatha', 'Bitar', 'shathah28@icloud.com', '1234', 796407478),
(10, 'Your First Name', 'Your Last Name', 'example@example.example', '********', 7);

-- --------------------------------------------------------

--
-- Table structure for table `Publishers`
--

CREATE TABLE `Publishers` (
  `P_ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Publishers`
--

INSERT INTO `Publishers` (`P_ID`, `Name`) VALUES
(1, 'Penguin Books'),
(2, 'Macmillan Publishers'),
(3, 'HarperCollins'),
(4, 'Dar Al-Manhal');

-- --------------------------------------------------------

--
-- Table structure for table `Transactions`
--

CREATE TABLE `Transactions` (
  `T_ID` int(11) NOT NULL,
  `Lease_date` date DEFAULT NULL,
  `Return_date` date DEFAULT NULL,
  `Quantity` int(11) NOT NULL DEFAULT 1,
  `M_ID` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Transactions`
--

INSERT INTO `Transactions` (`T_ID`, `Lease_date`, `Return_date`, `Quantity`, `M_ID`, `ISBN`) VALUES
(3, '2024-01-08', '2024-01-16', 2, 2, 5),
(49, '2024-01-27', '2024-02-03', 5, 10, 12),
(50, '2024-01-27', '2024-02-03', 5, 10, 9),
(51, '2024-01-27', '2024-02-03', 2, 10, 2),
(52, '2024-01-27', '2024-02-03', 5, 10, 10),
(54, '2024-01-27', '2024-02-03', 2, 1, 5),
(56, '2024-01-27', '2024-02-03', 3, 1, 10),
(57, '2024-01-27', '2024-02-03', 1, 1, 9),
(58, '2024-01-27', '2024-02-03', 1, 1, 24),
(59, '2024-01-24', '2024-01-31', 1, 1, 17),
(60, '2024-01-25', '2024-02-01', 1, 1, 21),
(61, '2024-01-16', '2024-01-25', 1, 1, 25),
(62, '2024-01-13', '2024-01-19', 1, 1, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Authors`
--
ALTER TABLE `Authors`
  ADD PRIMARY KEY (`A_ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `Genres`
--
ALTER TABLE `Genres`
  ADD PRIMARY KEY (`G_ID`);

--
-- Indexes for table `Members`
--
ALTER TABLE `Members`
  ADD PRIMARY KEY (`M_ID`);

--
-- Indexes for table `Publishers`
--
ALTER TABLE `Publishers`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD PRIMARY KEY (`T_ID`),
  ADD KEY `Transaction_Members_fk` (`M_ID`),
  ADD KEY `Transaction_Books_fk` (`ISBN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Authors`
--
ALTER TABLE `Authors`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `ISBN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `Genres`
--
ALTER TABLE `Genres`
  MODIFY `G_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Members`
--
ALTER TABLE `Members`
  MODIFY `M_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Publishers`
--
ALTER TABLE `Publishers`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Transactions`
--
ALTER TABLE `Transactions`
  MODIFY `T_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD CONSTRAINT `Transaction_Books_fk` FOREIGN KEY (`ISBN`) REFERENCES `Books` (`ISBN`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Transaction_Members_fk` FOREIGN KEY (`M_ID`) REFERENCES `Members` (`M_ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
