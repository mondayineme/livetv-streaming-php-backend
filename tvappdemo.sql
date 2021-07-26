-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 04:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tvappdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image_url`) VALUES
(1, 'Sports', 'https://timesofindia.indiatimes.com/thumb/msid-71008133,width-1200,height-900,resizemode-4/.jpg'),
(2, 'News', 'https://s.france24.com/media/display/d1676b6c-0770-11e9-8595-005056a964fe/w:1400/p:16x9/news_1920x1080.webp'),
(3, 'Entertainment', 'https://www.cnb.com/industries-we-serve/entertainment.thumb.800.480.png?ck=1623254696');

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `live_url` varchar(1000) NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `name`, `description`, `live_url`, `thumbnail`, `facebook`, `twitter`, `youtube`, `website`, `category`) VALUES
(1, 'Kantipur TV', ' Kantipur Television, popularly known as KTV, is a private television station based in Kathmandu, Nepal. The Chairman and Managing director are Kailash Sirohiya. Launched in July 2003, KTV is licensed for terrestrial and satellite transmission. Kantipur T', 'https://broadcastktv184.ekantipur.com/ktv_desktop_02347834/hd/playlist.m3u8', 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Kantipur_TV_new_logo.png', 'https://www.facebook.com/kantipurtelevisionnetwork/', 'https://www.twitter.com/kantipurtelevisionnetwork/', 'https://www.youtube.com/channel/UC3yDoaqQzOd1bNP74ZrGPTA', 'https://kantipurtv.com/live', 'News'),
(2, 'CNN ', 'The Cable News Network is a multinational news-based pay television channel headquartered in Atlanta, United States. It is owned by CNN Worldwide, a unit of the WarnerMedia News & Sports division of AT&T\'s WarnerMedia.', 'https://turnerlive.warnermediacdn.com/hls/live/586495/cnngo/cnn_slate/VIDEO_0_3564000.m3u8', 'https://cdn.cnn.com/cnn/.e/img/3.0/global/misc/cnn-logo.png', 'https://facebook.com/CNN', 'https://twitter.com/CNN', 'https://youtube.com/CNN', 'https://cnn.com', 'News'),
(3, 'CBS NEWS', 'CBS News is the news division of the American television and radio service CBS. CBS News television programs include the CBS Evening News, CBS This Morning, news magazine programs CBS News Sunday Morning, 60 Minutes, and 48 Hours, and Sunday morning polit', 'https://cbsnewshd-lh.akamaihd.net/i/CBSNHD_7@199302/master.m3u8', 'https://cbsnews3.cbsistatic.com/hub/i/r/2019/04/01/727e357a-a126-4138-a2c5-4d3222669d57/thumbnail/1920x1080/6cf41fcba0c5e4418c548fd8f270265d/cbsn2-logo-1920x1080.jpg', 'https://www.facebook.com/CBSNews/', 'https://twitter.com/CBSNews', 'https://www.youtube.com/channel/UC8p1vwvWtl6T73JiExfWs1g', 'https://www.cbs.com/', 'News'),
(4, 'Global News', 'Global News is the news and current affairs division of the Canadian Global Television Network. The network is owned by Corus Entertainment, which oversees all of the network\'s national news programming as well as local news on its 21 owned-and-operated s', 'https://live.corusdigitaldev.com/groupb/live/3062d0e3-ed4c-4f47-8482-95648250f4b8/live.isml/.m3u8', 'https://assets.corusent.com/wp-content/uploads/2020/08/19152236/global-news-blue-logo.png', 'https://www.facebook.com/GlobalNews/', 'https://globalnews.ca/pages/twitter/', 'https://www.youtube.com/channel/UChLtXXpo4Ge1ReTEboVvTDg', 'https://www.globaltimes.cn/', 'News'),
(5, 'Fashion TV', 'FashionTV is an international fashion and lifestyle broadcasting television channel. Founded in France in 1997, by its Polish-born president Michel Adam Lisowski, FashionTV is a widely distributed satellite channel in the world with 31 satellite and 2,000', 'https://fash1043.cloudycdn.services/slive/_definst_/ftv_midnite_secrets_adaptive.smil/playlist.m3u8', 'https://pbs.twimg.com/profile_images/1448375509/FTV_FASHIONTV_1024_7681.jpg', 'https://www.facebook.com/FTV/', 'https://www.twitter.com/FTV/', 'https://www.youtube.com/channel/UCqzju-_WMKsgNx8R3QwupQQ', 'https://www.fashiontv.com/', 'Entertainment'),
(6, 'MTV', 'MTV is an American cable channel that launched on August 1, 1981. Based in New York City, it serves as the flagship property of the MTV Entertainment Group, part of ViacomCBS Domestic Media Networks, a division of ViacomCBS. Prior to launch, the network w', 'https://pluto-live.plutotv.net/egress/chandler/pluto01/live/VIACBS02/master_2400.m3u8', 'https://mtv-intl.mtvnimages.com/', 'https://facebook.com/MTV', 'https://twitter.com/MTV', 'https://www.youtube.com/user/MTV', 'https://www.ctv.ca/mtv', 'Entertainment'),
(7, 'Celebrity Scene TV', 'Celebrity Scene TV features up-to-date coverage of celebrity news, interviews, fashion, lifestyle, entertainment gossip, and more.  Don’t miss your favorite celebrities and get all the details on what they’re up to, where they’ll be and what they’ll be do', 'https://rebroadcast.mytvtogo.net/mytvtogo/rebroadcastcelebrityscene/playlist.m3u8', 'https://mytvtogo.net/wp-content/uploads/2019/06/Network_CelebrityScene-520x293.jpg', 'https://mytvtogo.net/category/lifestyle-tv-networks/', 'https://mytvtogo.net/category/lifestyle-tv-networks/', 'https://mytvtogo.net/category/lifestyle-tv-networks/', 'https://mytvtogo.net/category/lifestyle-tv-networks/', 'Entertainment'),
(8, 'FOX SPORTS', 'Fox Sports is the brand name for a number of sports channels, broadcast divisions, programming, and other media around the world. The name originates from the Fox Broadcasting Company in the United States, which in turn derives its name from Fox Film, nam', 'https://austchannel-live.akamaized.net/hls/live/2002736/austchannel-sport/master1280x720_v3.m3u8', 'https://b.fssta.com/uploads/application/fscom/SiteShareImage.vresize.1200.630.high.0.png', 'https://www.foxsports.com/', 'https://www.foxsports.com/', 'https://www.foxsports.com/', 'https://www.foxsports.com/', 'Sports'),
(9, 'BEIN SPORTS EXTRA', 'eIN Sports is a global network of sports channels owned and operated by the Qatari media group beIN. It has played a major role in the increased commercialization of Qatari sports. Its chairman is Nasser Al-Khelaifi, and its CEO is Yousef Obaidly.', 'https://siloh-ns1.plutotv.net/lilo/production/bein/master.m3u8', 'https://image.xumo.com/v1/channels/channel/9999387/800x800.png?type=smartCast_channelTile', 'https://www.beinsportsxtra.com/', 'https://www.beinsportsxtra.com/', 'https://www.beinsportsxtra.com/', 'https://www.beinsportsxtra.com/', 'Sports'),
(10, 'Whistle Sports', 'Whistle, formerly Whistle Sports, is a sports broadcaster. Since its launch in 2014, Whistle Sports has raised more than $56 million in funding to date. It raised $8 million in 2014, mostly from Sky Broadcasting, $28 million in a second-round in 2015, and', 'https://whistle-1.samsung.wurl.com/manifest/playlist.m3u8', 'https://frontofficesports.com/wp-content/uploads/2018/12/whistle-sports1.png', 'frontofficesports.com', 'frontofficesports.com', 'frontofficesports.com', 'frontofficesports.com', 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `api_key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `api_key`) VALUES
(1, 'admin@mail.com', '$2y$10$DsAPjNiSN/zJGnlacJrYhOqkBfoRo.hXtwOFC5R62R4jurvRXWxky', '1A4mgi2rBHCJdqggsYVx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
