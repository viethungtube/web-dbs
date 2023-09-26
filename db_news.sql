-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 10:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `ID` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`ID`, `title`, `content`, `picture`, `users_id`) VALUES
(16, 'Sức khỏe BLACKPINK báo động vì concert dày đặc: Jennie đau đớn trên sân khấu, Rosé nghi vấn phải truyền nước?', 'Kể từ tháng 10/2022, BLACKPINK đã bắt đầu những chuyến lưu diễn cho concert world tour BORN PINK vòng quanh thế giới cho đến hết tháng 7/2023. Đây là tin vui với cộng đồng BLINK trên toàn cầu khi có cơ hội được nhìn ngắm BLACKPINK trực tiếp trên sân khấu.', 'https://thuthuatnhanh.com/wp-content/uploads/2021/06/Hinh-anh-Rose-Black-Pink-1.jpg', 3),
(39, '39 ne', ',./;\'[]-=--\r\n', '', 18),
(40, '40 ne', ' .,/ ;\'[]-==--\r\n', '', 18),
(41, 'Rosé (BLACKPINK), Kendall Jenner hở bạo trên thảm đỏ LACMA 2022', '22 tuổi, trẻ trung và xinh đẹp, Amee là ngôi sao đại diện cho Gen Z, một thế hệ kế tục và là tương lai của làng giải trí Việt.22 tuổi, trẻ trung và xinh đẹp, Amee là ngôi sao đại diện cho Gen Z, một thế hệ kế tục và là tương lai của làng giải trí Việt.22 tuổi, trẻ trung và xinh đẹp, Amee là ngôi sao đại diện cho Gen Z, một thế hệ kế tục và là tương lai của làng giải trí Việt.', 'https://kenh14cdn.com/thumb_w/620/203336854389633024/2022/11/7/photo-10-1667781986199268274612.jpg', 3),
(42, 'Amee tạo dáng nhí nhảnh khi lên hình tạp chí', 'Thật khó lòng đặt nhan sắc của bộ đôi này lên bàn cân so sánh. Thua kém đàn chị về cả tuổi nghề lẫn tuổi đời, nhưng không vì thế mà Amee chịu nhún nhường khi thể hiện tinh thần của Tiffany & Co. Cả hai đã có công đem món trang sức tưởng như quá cao sang, già cỗi này tới gần hơn với đối tượng khách hàng trẻ tuổiThật khó lòng đặt nhan sắc của bộ đôi này lên bàn cân so sánh. Thua kém đàn chị về cả tuổi nghề lẫn tuổi đời, nhưng không vì thế mà Amee chịu nhún nhường khi thể hiện tinh thần của Tiffany & Co. Cả hai đã có công đem món trang sức tưởng như quá cao sang, già cỗi này tới gần hơn với đối tượng khách hàng trẻ tuổiThật khó lòng đặt nhan sắc của bộ đôi này lên bàn cân so sánh. Thua kém đàn chị về cả tuổi nghề lẫn tuổi đời, nhưng không vì thế mà Amee chịu nhún nhường khi thể hiện tinh thần của Tiffany & Co. Cả hai đã có công đem món trang sức tưởng như quá cao sang, già cỗi này tới gần hơn với đối tượng khách hàng trẻ tuổi', 'https://dudeplace.co/wp-content/uploads/2019/05/rose-blackpink.jpg', 3),
(43, 'Rosé liên tục lăng xê váy ôm sát body. Thiết kế cúp ngực vạt chéo làm nổi bật vòng eo thon thả, giúp chính chủ càng thêm nổi bật', 'Thiết kế cúp ngực vạt chéo làm nổi bật vòng eo thon thả, bờ vai mảnh khảnh cùng xương quai xanh quyến rũ của Rosé. Ngoài phần cut-out, chiếc váy trên còn có phần chun đặt tạo eo cắt may khéo léo, vừa là điểm nhấn hay ho vừa giúp thu trọn sự chú ý từ người đối diện vào phần bụng phẳng lỳ của Rosé. Đặc biệt, phần mũ trùm đầu tạo cảm giác cổ điển, bí ẩn, giúp chính chủ càng thêm nổi bật.\r\n\r\n\r\n\r\nThiết kế cúp ngực vạt chéo làm nổi bật vòng eo thon thả, bờ vai mảnh khảnh cùng xương quai xanh quyến rũ của Rosé. Ngoài phần cut-out, chiếc váy trên còn có phần chun đặt tạo eo cắt may khéo léo, vừa là điểm nhấn hay ho vừa giúp thu trọn sự chú ý từ người đối diện vào phần bụng phẳng lỳ của Rosé. Đặc biệt, phần mũ trùm đầu tạo cảm giác cổ điển, bí ẩn, giúp chính chủ càng thêm nổi bật.\r\n\r\n', 'https://kenh14cdn.com/thumb_w/620/203336854389633024/2022/11/7/photo-4-16678047318291742856287.jpg', 3),
(44, 'Rosé (BlackPink) khoe vẻ đẹp không tì vết', 'Quả thực, Rosé sau khi trở thành Đại sứ của Saint Laurent ngày càng cho thấy những điểm mạnh và đột phá của bản thân trong mảng thời trang. Tìm ra kiểu trang phục phù hợp với vóc dáng, Rosé thành công đáp trả những lời chê bai về thân hình gầy gò hay bình luận nói cô một màu. Nếu không phải là Rosé, ít thần tượng Hàn Quốc nào dám lăng xê thời trang size 0 tại những sự kiện quốc tế như vậy.', 'https://image.thanhnien.vn/w2048/Uploaded/2022/abfluao/2022_09_01/8-6281.jpg', 3),
(46, 'Lisa has hilarious response for fan asking her to marry him during live with Jisoo', 'Blackpink members Lisa and Jisoo recently held a live session on fan community platform Weverse. During their interaction with the fans, they sang some popular track and went on to answer some fans as well\r\n\r\nBlackpink members Lisa and Jisoo recently held a live session on fan community platform Weverse. During their interaction with the fans, they sang some popular track and went on to answer some fans as well', 'https://media-cdn-v2.laodong.vn/Storage/NewsPortal/2022/3/18/1024908/Blackpink_Lisa_Vogue.png', 19),
(47, 'Lisa mang về cho mình chiến thắng ở hạng mục', 'Tại lễ trao giải MTV EMAs 2022 (MTV Europe Music Awards), Lisa của BLACKPINK đã được vinh danh với chiến thắng ở hạng mục Ca khúc K-Pop xuất sắc nhất. Cũng chỉ vài tháng trước đó, Lisa cũng làm nên lịch sử khi trở thành nghệ sĩ solo K-Pop đầu tiên chiến thắng hạng mục tương tự tại lễ trao giả MTV VMAs (MTV Video Music Awards).', 'https://kenh14cdn.com/203336854389633024/2022/10/21/photo-2-1666321904264592612434.jpg', 19),
(48, 'Lisa còn giúp cô đạt được nhiều kỉ lục mới trên các nền tảng âm nhạc', 'Không chỉ được công nhận ở các giải thưởng quốc tế, màn solo của Lisa còn giúp cô đạt được nhiều kỉ lục mới trên các nền tảng âm nhạc. Trên iTunes, ca khúc chủ đề LALISA đã đứng vị trí số 1 trên BXH của 102 quốc gia và vùng lãnh thổ khác nhau. Trước đó, chỉ một nữ nghệ sĩ duy nhất làm được điều này chính là Adele với bản hit toàn cầu Hello. Sau 7 năm, Lisa trở thành nghệ sĩ đầu tiên san bằng kỉ lục này với Adele.', 'https://suckhoedoisong.qltns.mediacdn.vn/324455921873985536/2021/9/27/photo-1632743174106-16327431742922125488746.jpg', 19),
(49, 'Lisa (BLACKPINK) lập kì tích mới, san bằng kỉ lục với Adele', 'Chưa dừng lại ở đó, việc đứng vị trí đầu bảng tại 102 quốc gia cũng giúp LALISA trở thành ca khúc duy nhất bởi một nữ nghệ sĩ châu Á làm được điều này trên BXH của iTunes. Đặc biệt, mặc dù đã được ra mắt từ năm 2021 nhưng ca khúc vẫn giữ được nhiệt và được khán giả yêu thích sau một năm phát hành.', 'https://ss-images.saostar.vn/w800/pc/1633432744094/saostar-t63viz7aewo18e56.jpg', 19),
(50, 'Police crackdown on large-scale online football betting ring', 'According to a report from the ministry, police conducted urgent checks at 14 spots organising illegal football betting activities and detained 14 people on November 21 and 22.\r\n\r\n\r\nInitial investigations uncovered a large-scale gambling ring operating via the Bong88 and Agbong88 websites.\r\n\r\nUsers logged in on Bong88 and Agbong88 to bet.\r\n\r\nThe gambling ring has been operating for three years.\r\n\r\nThe Public Security Ministry is further investigating the case.', 'http://i.dtinews.vn/images/editor/images/lanhieu/112022/23/Big/gNhnNMS.jpg', 19),
(51, 'Visit Ha Long Bay of the hills', 'Earlier, it took several days to reach there from Tuyen Quang City. However, as the road to Na Hang has been upgraded and widened, it takes visitors only two hours by car to reach there.\r\n\r\nThe site sprawls across 21,000ha, of which Na Hang Lake makes up for 8,000ha.\r\n\r\nEarlier, it took several days to reach there from Tuyen Quang City. However, as the road to Na Hang has been upgraded and widened, it takes visitors only two hours by car to reach there.\r\n\r\nThe site sprawls across 21,000ha, of which Na Hang Lake makes up for 8,000ha.', 'http://i.dtinews.vn/images/editor/images/thaonguyen/62015/16/Big/20150515161542-tra3-1-na-hang.jpg', 19),
(52, 'HP considering PC spinoff, buying software company', 'In a further move away from the consumer space, HP said it was discontinuing its TouchPad tablet computer, its rival to Apple\'s iPad which was introduced just seven weeks ago, and phones based on the webOS mobile operating system acquired from Palm last year for $1.2 billion.\r\n\r\nTrading in HP was briefly suspended on Wall Street as the firm published quarterly earnings ahead of schedule and made the block-buster announcements.\r\n\r\nHP shares were down 3.1 percent at $30.42 when trading was suspended around 3:05 pm and resumed their downward slide when it resumed to close at $29.51, a loss of 5.99 percent for the day.', 'http://i.dtinews.vn/stores/news_dataimages/lanhieu/082011/19/08/hp.jpg', 3),
(53, 'China to top world in e-commerce by 2015: report online shoppers in China', 'Within five years, online shoppers in China will be spending an average $980 per year -- twice what they spend today and close to the US average of $1,000, said the report, issued Tuesday.\r\n\r\nUp to a quarter of e-commerce demand is for products consumers cannot find in physical stores -- a circumstance unique to China, whose huge size limits the coverage of physical retailers, it said.', 'http://i.dtinews.vn/images/editor/images/namhang/112011/23/Big/photo_1322035367760-1-0.jpg', 3),
(54, 'admin ne', 'title of adminnnnnnnn\r\n', 'https://ytuongkinhdoanh.vn/wp-content/uploads/2021/03/admin-640.jpg', 1),
(57, '57 ne', 'ád\r\n', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvgRMad98wVTdc-qAMIhYEF6tJ0QVKdJ03oA&usqp=CAU', 1),
(58, 'id 58 test new', 'id 58 ne\r\n', 'https://nhaxinhplaza.vn/wp-content/uploads/58-co-y-nghia-gi.png', 19),
(60, 'asd \' ne \" : hi', '', '', 19),
(61, '60 nef \' : hi..', '', '', 19),
(62, 'hi \' ', '\'\r\n', '', 19),
(63, '61 ne \'', 'asd: \' \r\n\" } --\r\n', '', 19),
(64, 'BLACKPINK’s Rosé Gets Her Long-Awaited Reunion As She Returns To South Korea', 'BLACKPINK‘s Lisa, Jisoo, and Rosé have returned to South Korea after wrapping up their successful North American leg of the BORN PINK world tour.', 'https://lh3.googleusercontent.com/mwrPrW9peYmi5_QN6xv_0CP0IX7s3cKO429cqQ0LML95paWkAeVVjGbKjBKuusFOptG_D72LPBjwH37YnXzWh6KXT8AyHXWyrhqpM-nPqJjR_6c=w960-rj-l80-nu-e365', 3),
(71, '432489', '406952', '602431', 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `email`, `password`, `phone_number`, `address`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', '123456', '123', '123', 1),
(3, 'Như 2', 'ntn2@gmail.com', '123', '12222', 'Hải Dương', 0),
(9, 'final 2', '8@gmail.com', '123', '0912321', 'Quảng Bình', 0),
(10, 'final 3', 'final3@gmail.com', '123', '48123123', 'Hà Nam', 0),
(18, 'no', 'no@gmail.com', '123', '132', 'sdfdfs', 0),
(19, 'Như', 'ntn@gmail.com', '', '123123', 'Hải Phòng', 0),
(20, 'mo', 'mo@gmail.com', '123', '123', 'HN', 0),
(23, 'KdHXRxPh', 'KdHXRxPh@burpcollaborator.net', 's5P!m6v!P4', '175-484-3555', 'KdHXRxPh', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
