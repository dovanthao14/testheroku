
-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 30, 2020 lúc 05:03 PM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shophip`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `cash` int(11) DEFAULT '0',
  `diamon_ff` int(11) NOT NULL DEFAULT '0',
  `email` text COLLATE utf8_unicode_ci,
  `phone` text COLLATE utf8_unicode_ci,
  `time` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `time_block` int(11) DEFAULT NULL,
  `days_block` int(11) DEFAULT NULL,
  `block` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `token` text COLLATE utf8_unicode_ci,
  `expired_token` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `acc_random`
--

CREATE TABLE `acc_random` (
  `id` int(11) NOT NULL,
  `iduser` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `time` datetime DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `auto` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ck` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `card`
--

INSERT INTO `card` (`id`, `auto`, `name`, `ck`, `status`) VALUES
(1, 1, 'Viettel AUTO', 100, 1),
(2, 1, 'Mobifone AUTO', 100, 1),
(3, 1, 'Vinaphone AUTO', 100, 1),
(11, 0, 'Viettel Chậm', 100, 0),
(12, 0, 'Mobifone Chậm', 100, 0),
(13, 0, 'Vinaphone Chậm', 100, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `descr_game`
--

CREATE TABLE `descr_game` (
  `type` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `descr_game`
--

INSERT INTO `descr_game` (`type`, `content`) VALUES
('free-fire', ' ACC đăng nhập bằng Facebook . Skin s&uacute;ng đều l&agrave; skin vĩnh viễn nh&eacute; mọi người !'),
('card', 'Nạp thẻ tỷ lệ nhận 100k thẻ = 100K Shop . CH&Uacute; &Yacute; : NẠP SAI M&Ecirc;NH GI&Aacute; MẤT THẺ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_buy`
--

CREATE TABLE `history_buy` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `id_products` int(11) NOT NULL,
  `id_random` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_card`
--

CREATE TABLE `history_card` (
  `id` int(11) NOT NULL,
  `request_id` text COLLATE utf8_unicode_ci,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type_card` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `seri` text COLLATE utf8_unicode_ci NOT NULL,
  `pin` text COLLATE utf8_unicode_ci NOT NULL,
  `count_card` int(11) NOT NULL,
  `cash_nhan` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `notice` text COLLATE utf8_unicode_ci,
  `time` datetime NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_dff`
--

CREATE TABLE `history_dff` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_ingame` text NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_wheel`
--

CREATE TABLE `history_wheel` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `nohu` int(11) NOT NULL DEFAULT '0',
  `prize` text COLLATE utf8_unicode_ci NOT NULL,
  `id_wheel` int(11) NOT NULL DEFAULT '0',
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `hide` int(11) NOT NULL DEFAULT '0',
  `date` text COLLATE utf8_unicode_ci,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lq_champion`
--

CREATE TABLE `lq_champion` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `vip` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `img_name` text COLLATE utf8_unicode_ci NOT NULL,
  `add_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lq_champion`
--

INSERT INTO `lq_champion` (`id`, `name`, `vip`, `img_name`, `add_time`) VALUES
(2, 'Vahein', 'no', '8625308f1624185a1ecc5e041e929d49583feed3a78cf.png', 1515853288),
(3, 'Thane', 'no', '7db02b3b8412f2ca1b1aa94c0235b2db58a1809854c76.jpg', 1515853297),
(6, 'Veera', 'no', '59dd4047e244607d78f76fb22e7ffced583ff0f89860d.png', 1515855142),
(7, 'Lữ Bố', 'yes', '21436d414c086275c3c956dcd97cc200583ff139b8f73.png', 1515855158),
(8, 'Mina', 'no', '63671026c0e03766c31176d07b56c364583ff15c728d2.png', 1515855174),
(9, 'Krixi', 'no', '3fa6fb1c1695570e79df259229e7a6c9583ff18becc9f.png', 1515855189),
(10, 'Mganga', 'no', 'b10fa7d489fc711e580999728c26c2e9583ff2252da26.png', 1515855201),
(11, 'Triệu Vân', 'no', 'a4f18d5371cdfde200170538794fc49e583ff24b4fd7a.png', 1515855213),
(12, 'Omega', 'no', 'ae349d2c12bb6b34a31311ee4e230970583ff272c5c61.png', 1515855271),
(13, 'Kahlii', 'no', '2.png', 1515858548),
(14, 'Zephys', 'no', '3.png', 1515858557),
(15, 'Điêu Thuyền', 'no', '4.png', 1515858567),
(16, 'Chaugnar', 'no', '5.png', 1515858576),
(17, 'Violet', 'no', '6.png', 1515858586),
(18, 'Butterfly', 'no', '7.png', 1515858596),
(19, 'Ormarr', 'no', '8.png', 1515858605),
(20, 'Azzen\'Ka', 'no', '9.png', 1515858615),
(21, 'Alice', 'no', '10.png', 1515858633),
(22, 'Gildur', 'no', '11.png', 1515858660),
(24, 'Toro', 'no', '13.png', 1515858678),
(25, 'Taara', 'no', '14.png', 1515858692),
(26, 'Nakroth', 'no', '15.jpg', 1515858710),
(27, 'Grakk', 'no', '16.png', 1515858719),
(28, 'Aleister', 'no', '17.png', 1515858728),
(29, 'Fennik', 'no', '18.jpg', 1515858737),
(30, 'Lumburr', 'no', '19.jpg', 1515858747),
(31, 'Natalya', 'no', '20.jpg', 1515858756),
(32, 'Cresht', 'no', 'bec21cbc276808ac22ccc228a1fabb8c5886bd5a1c3c8.jpg', 1515858766),
(33, 'Jinna', 'no', '21.jpg', 1515858776),
(34, 'Payna', 'no', '22.png', 1515858790),
(35, 'Maloch', 'no', '23.png', 1515858804),
(36, 'Ngộ Không', 'yes', '24.jpg', 1515858814),
(37, 'Kriknak', 'no', '25.png', 1515858826),
(38, 'Arthur', 'no', '26.jpg', 1515858839),
(39, 'Slimz', 'no', '27.jpg', 1515858852),
(40, 'Ilumia', 'no', '28.jpg', 1515858862),
(41, 'Preyta', 'no', '29.jpg', 1515858872),
(42, 'Skud', 'no', '30.jpg', 1515858880),
(43, 'Raz', 'no', '31.jpg', 1515858890),
(44, 'Lauriel', 'no', '32.jpg', 1515858899),
(45, 'Batman', 'yes', '33.jpg', 1515858910),
(46, 'Airi', 'no', '34.jpg', 1515858921),
(47, 'Zuka', 'no', '35.jpg', 1515858930),
(48, 'Ignis', 'no', '36.jpg', 1515858940),
(49, 'Murad', 'no', '37.jpg', 1515858949),
(50, 'Zill', 'no', '38.jpg', 1515858959),
(51, 'Arduin', 'no', '39.jpg', 1515858973),
(52, 'Joker', 'yes', '40.jpg', 1515858984),
(53, 'Ryoma', 'yes', '41.jpg', 1515858993),
(54, 'Astrid', 'no', '42.jpg', 1515859005),
(55, 'Tel\'Annas', 'no', '43.jpg', 1515859015),
(56, 'Superman', 'yes', '44.jpg', 1515859033),
(58, 'Xeniel', 'no', '46.jpg', 1515859062),
(59, 'Kil\'Groth', 'no', '47.gif', 1515859076),
(60, 'Moren', 'no', '48.jpg', 1515859091),
(61, 'TeeMee', 'no', '49.jpg', 1515859101),
(65, 'Tulen', 'no', '07210c9e529faa7766ba324bd86b75165a81722f3eab8.jpg', 1537428160),
(68, 'Rourke', 'yes', '749d47479eb9744d656b5e7c59f213555b1914bf90d29.jpg', 1537429243),
(69, 'Omen', 'no', '00a78d4f7222a428cd06b45252f88a565a73df2c56ad8.jpg', 1537429329),
(70, 'Max', 'no', '9b5e17b2059b1e710663e1ec542f254b5acdd5b022003.jpg', 1537429816);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lq_skin`
--

CREATE TABLE `lq_skin` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `vip` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `img_name` text COLLATE utf8_unicode_ci NOT NULL,
  `add_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lq_skin`
--

INSERT INTO `lq_skin` (`id`, `name`, `vip`, `img_name`, `add_time`) VALUES
(2, 'Vahein Đại Công Tước', 'yes', '0a45ad90483db97aca43d58f916f48335a20d7ddec759.jpg', 1515855396),
(3, 'Vahein Vũ Khí Tối Thượng', 'yes', '74c07022219dce077da6a570e4a79a8558770e408a379.jpg', 1515855411),
(4, 'BatMan Đôi Cánh Đại Dương', 'no', '7a9f7dce9c922c7ce20496e98c643333599aa6a73de06.jpg', 1515898752),
(5, 'Murad Thợ săn tiền thưởng', 'no', '836770165ef5132ef5a3a8e00decbf1a5983e6e014e80.jpg', 1515898814),
(6, 'Superman Chúa Tể Công Lý', 'no', '674b771ab988b9990cefd5ddebd375995a02b81954294.jpg', 1515898847),
(7, 'Ryoma Thợ Săn Tiền Thưởng', 'no', '393fbab80d0999d82b90b0137cc05f5059d9bf076868d.jpg', 1515898883),
(8, 'Thane Quang Vinh', 'no', '7db02b3b8412f2ca1b1aa94c0235b2db58a1809854c76.jpg', 1515904479),
(9, 'Veera Cô giáo Hắc ám', 'no', '872c3a024de2dacdb3cd4d76d0af6f525847d5fcccbf2.jpg', 1515904660),
(10, 'Veera Nàng Dơi Tuyết', 'no', '3aafdb1e5fd9d829244664f52a16d1b1589a8ee463823.jpg', 1515904708),
(12, 'Lữ Bố Long Kỵ Sĩ', 'yes', 'd1d534bd196982ccd15345d3c8a159c558f47835118b6.jpg', 1515904826),
(13, 'Lữ Bố Kỵ Sĩ Âm Phủ', 'yes', '9bcf4ea793622a27451a371bbc8de6125949ec3b9609e.jpg', 1515904859),
(14, 'Lữ Bố Đặc Nhiệm SWAT', 'yes', 'ec8a790aabb7620e51f852115199bfc559d1ad758bbc0.jpg', 1515904894),
(15, 'Lữ Bố Tiệc Bãi Biển', 'yes', '89edf66b7c36aa5659dd54f19c273c595a15037de22dc.jpg', 1515904920),
(16, 'Lữ Bố Nam Vương', 'yes', '0e3fa00396a90ee03c16db04bf3b80c85a4da7e225387.jpg', 1515904944),
(17, 'Mina Nữ Hoàng Kẹo Ngọt', 'no', '4d45a450e664e8c3dfb8aee1c67f7a225983e74939305.jpg', 1515904975),
(18, 'Mina Tiểu Thư Đoạt Hồn', 'no', '2010b7e41dd78615e8b3a2f35b09ff7f589a8bd7ac141.jpg', 1515905008),
(19, 'Krixi Công Chúa Bướm', 'no', 'ecbf4af52d7e8dea8fd35e7cca7cd1f6583ff206709f5.png', 1515905063),
(20, 'Krixi Xứ Sở Thần Tiên', 'yes', 'eeee1e5428969d0bdc7649dd95bcf39859225ea21af4f.jpg', 1515905092),
(21, 'Krixi Tiệc Bãi Biển', 'yes', 'bf70da385602cfc9d019fa1f7651a4fb5a0a94c564d27.jpg', 1515905136),
(22, 'Mganga Hề Cung Đình', 'no', 'd042bfff5dcbe4a23bb6f71e89e8c537589a931a4d4df.jpg', 1515905174),
(23, 'Mganga Tiệc Bánh Kẹo', 'no', '21fa954fe61c4fd13766848f8dcb8acd597b5f695e84b.jpg', 1515905202),
(24, 'Veera Y Tá Bạo Loạn', 'no', '7c13a1c0b946ce53c46d47a8010c1320599fa67ce6734.jpg', 1515905494),
(25, 'Triệu Vân Quang Vinh', 'no', 'd7342b00ec05faf09f815c74ce8306eb59d1ad95b5505.jpg', 1515921442),
(26, 'Triệu Vân Dũng sĩ đồ long', 'yes', '0c3845aa6836b92ca1e3ac2c793526205a1544dcd070b.jpg', 1515921463),
(29, 'Omega Người máy xanh', 'no', '29a399dc6ea27378a232dd4b34bf7f6858b92058572ad.png', 1515921526),
(30, 'Kahlii Cô dâu hắc ám', 'no', '5e81871f14d071c0f9bf01cd7ac0ef0058a170124a390.png', 1515921573),
(31, 'Zephys Hiệp Sĩ Bí Ngô', 'yes', '84de1c274b7b4d1f6c73341e7ce9f26759f83096648b7.jpg', 1515921628),
(32, 'Zephys Oán Linh', 'no', 'd77019c238b7f93c7ed0c3f37db9bdb158a17150bcb6d.jpg', 1515921637),
(33, 'Điêu Thuyền Nữ Vương Anh Đào', 'no', 'c6bdc7259484c5a75a04019b81b798945847d6daaad2f.jpg', 1515921670),
(34, 'Điêu Thuyền Hoa Hậu', 'yes', 'cb125521bf055b3d0117689a652ef4d85a4da80cc1a9c.jpg', 1515921684),
(35, 'Chaugnar Ác Mông Sinh Hóa', 'no', '25fb7638a4b2cd9306e99cc1fc67e8f658cf626892af5.jpg', 1515921725),
(36, 'Violet Nữ đặc cảnh', 'no', 'ea8e80b2aceeb0045f6ba21c7f139fc858462ef3570d3.png', 1515921755),
(37, 'Violet Nữ Hoàng Pháo Hoa', 'yes', 'd8b09710ebceb2d01dd1f79a79ae0a92590c02a0362fd.jpg', 1515921772),
(38, 'Violet Mèo Siêu Quậy', 'yes', '1e1035bc47f3d80054dd554d5dc9b2735a1be3e1c862e.jpg', 1515921790),
(39, 'Butterfly Thủy Thủ', 'no', 'ac8137f34f98d5fa6989b05e8b91ce6a583ff89eeb0f9.png', 1515921829),
(40, 'Butterfly Teen nữ công nghệ', 'no', 'f8f91308600416c688cb8c8f5c5ca814593248e7abb42.jpg', 1515921861),
(41, 'Butterfly Xuân nữ ngổ ngáo', 'yes', 'cbfdca52f37f668169031f9b72d90444589a8b76a140e.jpg', 1515921894),
(42, 'Butterfly Nữ Quái Nổi Loạn', 'yes', '2d9ca037a21225003e44e2e40879c034598d7ed026687.jpg', 1515921910),
(43, 'Ormarr Thông thỏa thích', 'yes', '71965e9f57f08c167ac32a4dc50181a65a30e5f77611a.jpg', 1515921954),
(44, 'Ormarr cựu chiến binh', 'no', '4168fdfc6e4bcf4f0392a89fefb66d12583ff8b891d97.png', 1515921966),
(45, 'Azzen\'Ka Linh hồn lữ khách', 'no', '0ffd9626a663ebad9045e6cdcfdee438597b602420d5b.jpg', 1515921994),
(46, 'Alice Nhà chiêm tinh', 'no', '4994ed2f082a8bc5a271789f5629e0e058462f5b49ff3.png', 1515922142),
(47, 'Gildur Phượt Thủ', 'no', '5bd246adef798cea7e93b0dd0643ea175910307d6456b.jpg', 1515922162),
(48, 'Gildur Tiệc Bãi Biển', 'yes', '6ace6488468bc629f27d748ce2cde2ab5a027b76c3bd1.jpg', 1515922185),
(49, 'Yorn Cung thủ bóng đêm', 'no', 'eb9a70763e08ff3f12365a7f40d803ad583ffac536794.png', 1515922240),
(50, 'Yorn Đặc Nhiệm SWAT', 'yes', '60315c4d2109aef556ad2b3f425c977859c622a9c93d2.jpg', 1515922257),
(51, 'Yorn Thế tử nguyệt tộc', 'yes', '31c9c51abdc9e81332054eba6cf207745a5837bd0932c.jpg', 1515922272),
(52, 'Toro Đặc cảnh NYPD', 'no', 'af54d8a843bef7631fc44b7e13b62eb6583ffb2427a06.png', 1515922308),
(53, 'Taara Đại Tù Trưởng', 'no', '454657ba0b11387f88d0b58132180d3358bd14757b83a.jpg', 1515922331),
(54, 'Nakroth Chiến binh hỏa ngục', 'no', '3c6d838b3f3cce60daa0b9b00226efd55a276e9f22fc1.jpg', 1515922364),
(55, 'Nakroth Quân đoàn địa ngục', 'no', 'e5835a60db6ebe9a238e4782808b7024584a46fd13c3d.jpg', 1515922380),
(56, 'Nakroth Bboy công nghệ', 'no', '9ca27ec280c4befd2e299ff144b0058459b29278de58d.jpg', 1515922401),
(57, 'Grakk chàng gấu tuyết', 'no', '806bbbb3afea652e74bf851bc909d079589a8f4b1d113.jpg', 1515922430),
(58, 'Grakk Khô lâu đại tướng', 'no', '53e81c3e4cde13d6ff480b0ae98789cf598a8866b8f60.jpg', 1515922466),
(59, 'Aleister Thiếu Niên Hắc Ám', 'yes', 'fce1d984d1d72596a44ce17027b7976b59d1ad0da7848.jpg', 1515922500),
(60, 'Fennik Tuần lộc láu lỉnh', 'yes', '36f61762ca45def9be5ebacb6982ffea5a31070d6cf24.jpg', 1515923899),
(61, 'Fennik Tiệc bánh kẹo', 'yes', 'de82761cc17f0a5d724c5707b50655135a06943d46ec4.jpg', 1515923949),
(62, 'Fennik Nhà Thám Hiểm', 'yes', '25175f5edb65931ec15fca3b631850735860e4bd97ebd.jpg', 1515923963),
(63, 'Lumburr dung nham', 'no', 'b10699500629002b70b13a47687f503f587858f7c97be.jpg', 1515923986),
(64, 'Natalya Quà quái quỷ', 'no', 'f1247464ad506c3fef7c6240a4303a355a31049546157.jpg', 1515924028),
(65, 'Natalya Quý cô thủy tề', 'no', '0778faf4426f76588f813ab7b7737a2159351e6327360.jpg', 1515924039),
(66, 'Natalya Nghệ Nhân Lân', 'no', 'b3e06b2967ffd043882f883cb19bfc2058e1ba5cce51b.jpg', 1515924054),
(67, 'Cresht Thợ sửa đứt cáp', 'no', '1e69b5b59bf63865b011ec3fe292870e589978710997f.jpg', 1515924072),
(68, 'Jinna Đại tư tế', 'no', '017c5c5b76b2ce2c8bcd0c2a7941ef41591a7a4edaab6.jpg', 1515924105),
(69, 'Payna Cảnh vệ rừng', 'no', '107515ee327ec4e57be28abfd5b4ef8d590c0367c6227.jpg', 1515924127),
(70, 'Maloch Samurai tử sĩ', 'yes', '0c808c311e0aeedfc4e39e25a53de72259f830b4a3783.jpg', 1515924170),
(71, 'Maloch Ác ma địa ngục', 'no', 'f1cb5b3e3c0003c231afdbba9d31b00e595f5f72f32d7.jpg', 1515924184),
(72, 'Maloch Tiệc Hóa Trang', 'no', '5f9961c48b8e706d66c6f2b0db56881458cb97a14ebd9.jpg', 1515924201),
(73, 'Ngộ Không Đạo Tặc', 'no', '9750f204bf00281fe2e51ca142768cce59b293b79faeb.jpg', 1515924217),
(74, 'Kriknak bọ cánh bạc', 'no', '4d0710b07e77ecb6eec89769f76be9a058e7140a02122.png', 1515924248),
(75, 'Arthur Hoàng Kim Cốt', 'no', '83494858109b6461b5ca1e7c020f0a6c59b291d4589a7.jpg', 1515924289),
(76, 'Arthur Lãnh chúa xương', 'yes', '5ef7c0a31ffd7d33b5d796204e1db83059df131e7f053.jpg', 1515924303),
(77, 'Slimz Thỏ thợ mỏ', 'no', '965f014f79fd278f7a4c40fc3f089b3e58f97f7641f80.jpg', 1515924331),
(78, 'Slimz chú thỏ ngọc', 'no', '208bd1fd4cb7c51a982e1325d50406265a027b9ab25cc.jpg', 1515924345),
(79, 'Ilumia Nữ chúa tuyết', 'no', 'd7851de6d120997cc96c8d00325b28ce5902bf7e2d0b2.jpg', 1515924370),
(80, 'Ilumia Hồng hoa hậu', 'no', '8598bde77c508d55b2f4b769f9a2e6215a0694150191a.jpg', 1515924382),
(81, 'Preyta Không Tặc', 'no', '53d33d16407ad9990d8306b10f618bf8590bf53bdd701.jpg', 1515924731),
(82, 'Skud Sơn Tặc', 'no', '51de75e4c9fe36ba49bdd1d49bed3453591533c1c5b67.jpg', 1515924761),
(83, 'Raz đại tù trưởng', 'no', '030f0f59184dc9591ab3a5a29c88d27e591e6a2fe3ac7.jpg', 1515924853),
(84, 'Lauriel Đọa lạc thiên sứ', 'no', '6219e053befd53c837031f749e12bbdb59439b0d5d764.jpg', 1515924881),
(85, 'Lauriel Hỏa phượng hoàng', 'no', '8ba2de85e1704808e11ae0fec1b80ac75a531d237e852.jpg', 1515924898),
(86, 'Lauriel Phù thủy bí ngô', 'no', '4ce799b7f6cefbc36e1fd54741a9778a59f830732345e.jpg', 1515924917),
(87, 'Airi Thích Khách', 'no', 'ab3664fa2804c2fb0d3788615369507b59f04b5275536.jpg', 1515924962),
(88, 'Airi Ninja xanh lá', 'no', 'ed61d00fb8c65dc7784322d012b2f3f25965e9f49b412.jpg', 1515924975),
(89, 'Zuka Đại Phú Ông', 'no', '8a8bf57271482598002478914874fc65596c774871d32.jpg', 1515925017),
(90, 'Zuka Giáo Sư Sừng Sỏ', 'no', '2225114632e2b46f7cf7b9fe6386f7db5a55d226bbefa.jpg', 1515925031),
(91, 'Ignis Hỏa thuật sư', 'no', '813d13b400642dcc6d907693007539eb5970de81101b3.jpg', 1515925062),
(92, 'Zill Lốc Địa Ngục', 'no', '8006a0f36b59be7ef020ee1d43ccf94a59966eec3e9b8.jpg', 1515925098),
(93, 'Arduin Cận vệ hoàng gia', 'no', 'cae93a1b59ff9cf28c81a1c420b00a5559bb7ef7c91e8.jpg', 1515925123),
(94, 'Joker trò đùa tử vong', 'no', '7875ea4bbc4de3a54e3308a3364dc22159d1ac32a0429.jpg', 1515925146),
(95, 'Astrid bạch kiếm tiểu thư', 'no', 'e9ba2dd34a3052af56b8d833c7152b1359e0234e1fc61.jpg', 1515925183),
(96, 'Tel\'Annas cảnh vệ rừng', 'no', '8707e09b758532f8e7f78230743337be59e9660d26297.jpg', 1515925274),
(97, 'Xeniel thiên sứ hủy diệt', 'no', '9c5d076425687051a3eb523ebb1aefb05a17a09d469b3.jpg', 1515925308),
(98, 'Kil\'Groth cảnh vệ biển', 'no', '72a9d5d7335fbb427d067ccbcedb31005a29fc99330d8.gif', 1515925329),
(99, 'Moren chú thợ điện', 'no', 'f288c74b4d9178892f61d21abc1b4c7a5a3a36d22409a.jpg', 1515925349),
(100, 'TeeMee Xiếc Cung Đình', 'no', 'e69c320e8c1202ad886d17ecc04b1b485a4df9c83816c.jpg', 1515925375),
(105, 'Chaugnar Quang Vinh', 'no', '2d377cfea4bfbf93a2269d1ac8cee1915ab9fa12cbf1a.jpg', 1537427690),
(106, 'TULEN NHÀ THÁM HIỂM', 'yes', '9891d55e2156b484cf5d49b5cbf70d925a81729f72ced.jpg', 1537428598),
(108, 'Aleister Quang Vinh', 'no', 'dde4315d3872f16c23df92117c9d5cca5aa0e736b237b.jpg', 1537428764),
(109, 'Điêu Thuyền Tiệc Bãi Biển', 'yes', '08aa6db0addad6487aba42a9aefa662e5b3d8aa68a14e.jpg', 1537430644),
(110, 'Taara Hoả Ngọc Nữ Để', 'yes', '57bd995d4de5a2b87a5162a74f750c685aa8f5025b23c.jpg', 1537431521),
(111, 'Omen sĩ quan viễn chinh', 'yes', '00a78d4f7222a428cd06b45252f88a565a73df2c56ad8.jpg', 1537432043),
(113, 'Murad M-TP Thần Tượng Học Đường', 'yes', '5e775f1787d59bc3ee6adc4316c05ecf5a698f792b392.jpg', 1537432413),
(114, 'Violet Phi Công Trẻ', 'yes', 'c4f043968a2d8ca50c6815e75d172c715a66f08a3e408.jpg', 1537432481);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `gem_count` int(11) NOT NULL,
  `skins_count` int(11) NOT NULL,
  `skins` longtext COLLATE utf8_unicode_ci NOT NULL,
  `champs_count` int(11) NOT NULL,
  `champs` longtext COLLATE utf8_unicode_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type_post` int(11) NOT NULL,
  `type_account` text COLLATE utf8_unicode_ci NOT NULL,
  `date_posted` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `sdt` text COLLATE utf8_unicode_ci,
  `cmnd` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `descr` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `youtube` text COLLATE utf8_unicode_ci NOT NULL,
  `fanpage` text COLLATE utf8_unicode_ci NOT NULL,
  `fb_admin` text COLLATE utf8_unicode_ci NOT NULL,
  `name_admin` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_admin` text COLLATE utf8_unicode_ci NOT NULL,
  `email_admin` text COLLATE utf8_unicode_ci NOT NULL,
  `notify` longtext COLLATE utf8_unicode_ci NOT NULL,
  `domain` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `status_random` int(11) NOT NULL,
  `status_notify` int(11) NOT NULL DEFAULT '0',
  `rd_1` int(11) NOT NULL,
  `rd_2` int(11) NOT NULL,
  `rd_3` int(11) DEFAULT '0',
  `rd_4` int(11) NOT NULL DEFAULT '0',
  `rd_5` int(11) NOT NULL DEFAULT '0',
  `rd_6` int(11) NOT NULL DEFAULT '0',
  `rd_7` int(11) NOT NULL DEFAULT '0',
  `rd_8` int(11) NOT NULL DEFAULT '0',
  `rd_9` int(11) NOT NULL DEFAULT '0',
  `rd_10` int(11) NOT NULL DEFAULT '0',
  `merchant_key` text COLLATE utf8_unicode_ci,
  `merchant_id` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`title`, `descr`, `keywords`, `youtube`, `fanpage`, `fb_admin`, `name_admin`, `phone_admin`, `email_admin`, `notify`, `domain`, `status`, `status_random`, `status_notify`, `rd_1`, `rd_2`, `rd_3`, `rd_4`, `rd_5`, `rd_6`, `rd_7`, `rd_8`, `rd_9`, `rd_10`, `merchant_key`, `merchant_id`) VALUES
('Shop Hip Free Fire, Liên Quân', 'Shop Chính Chủ Duy Nhất Của YTB Hip', 'Shop Mua B&aacute;n Nick Li&ecirc;n Qu&acirc;n, Free Fire', 'https://www.youtube.com/embed/ajwJIvPLH70', 'https://www.facebook.com/598181974027295', 'https://www.facebook.com/598181974027295', 'Hip', '', 'shophipvn@gmail.com', 'Ch&agrave;o Mừng Bạn Đến Với ShopHip.VN . Thử vận may 100% Acc Đ&uacute;ng . R&uacute;t Kim Cương 100% được g&oacute;i Kim Cương N&ecirc;n c&aacute;c bạn y&ecirc;n t&acirc;m nh&eacute; !', 'shophip.vn', 1, 1, 1, 9000, 30000, 50000, 100000, 20000, 40000, 50000, 80000, 90000, 100000, 'a9ca9e3948f7b3a2852173f7a00a5d2e', '8451707551');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting_wheel`
--

CREATE TABLE `setting_wheel` (
  `1` int(11) NOT NULL DEFAULT '0',
  `2` int(11) NOT NULL DEFAULT '0',
  `3` int(11) NOT NULL DEFAULT '0',
  `4` int(11) NOT NULL DEFAULT '0',
  `5` int(11) NOT NULL DEFAULT '0',
  `6` int(11) NOT NULL DEFAULT '0',
  `7` int(11) NOT NULL DEFAULT '0',
  `8` int(11) NOT NULL DEFAULT '0',
  `9` int(11) NOT NULL DEFAULT '0',
  `10` int(11) NOT NULL DEFAULT '0',
  `11` int(11) NOT NULL DEFAULT '0',
  `12` int(11) NOT NULL DEFAULT '0',
  `13` int(11) NOT NULL DEFAULT '0',
  `14` int(11) NOT NULL DEFAULT '0',
  `15` int(11) NOT NULL DEFAULT '0',
  `16` int(11) NOT NULL DEFAULT '0',
  `huvang` int(11) NOT NULL DEFAULT '0',
  `wheel_price` int(11) NOT NULL DEFAULT '0',
  `wheel_price_2` int(11) NOT NULL DEFAULT '0',
  `id_nohu` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `setting_wheel`
--

INSERT INTO `setting_wheel` (`1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `huvang`, `wheel_price`, `wheel_price_2`, `id_nohu`, `status`) VALUES
(0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 872000, 20000, 20000, 'Thanh Trực,Nguyễn Xuân Bính,Đức Đăng,Khổng Đức,Quân Hoàng,Đinh Sỹ Hiếu ,Dong Au,Lê Trần Đăng Khôi,Tâm Nhok,Pham AnhTuan,Khiem Nguyen,Bùi Đức Đạt,Lý Ngọc,Cuong Truong,Pé Ngốc,Tâm Tôi Là,Khiêm Đola,Ng Tuấn Sơn,Thỏ Trắng,Thanh Le,Tài Bts,Minh Trường Nguyễn,Thanh Phước,Nhân Đoàn,Đưc Lê,Nguyễn Hồng,Tuấn Vũ,Soái Muội,Nguyễn Thành Long,Đoàn Nhật Huy,Nguyễn Trường,Lắp Trung Bê Trần,MA Ket,Nguyễn Thịnh,Minh Hiền,Luc Do,Đoàn Thị Ánh Vân,Nguyễn Trường,NM Tâm,Tôi Tên Tuấn,Nak Best,Nguyễn Quyền,Đặng Lộc,Minh Đen,Đặng Hoàng Phương,Bùi Văn Lâm,Thanh Thắng,Long Hoàng,Nguyễn Quan Hải Mc,Thịnh Levis,Nguyễn Việt Trung,Trọng Híp,Thuong Pham,Vũ Tú,Nguyễn Đăng Khoa,Luân Nguyễn,Tường Minh,Nguyen Hai Nam,Trần Văn Nhật,Lê Huy Nguyễn Vĩnh,Aov Garena,Trần Tuấn Hưng,Trung Ha,Ngọc Thường,Nguyễn Hoàng Khánh Nam,Trương Lầy,Nguyễn Gia Hiếu,Koku Ka,Nguyễn Đình Tuấn,Huyền Nhuyễn,Thằng Hề,Trần Ngọc Anh,Nguyenthuc Nguyenthuc,Lò Văn Long,Phong Wind,Vương Đăng Khôi,Cậu Bánh,Quyen Minh,Trẻ Trâu,Hoàng Nguyễn,Trương Nguyễn Kim Hùng,Long Nguyễn,Trần Hoàng Phúc,Nguyễn Xuân Đạt,Nguyễn Thuận,Thiên Dii,Hoàng Đai Nguyên,Nguyễn Nữ,Thị Khuyên Nguyễn,Bé Trung,Bi Nè,Nguyễn Tiến Đạt,Hoàng Văn Bảy,Nguyễn Vinh,Mai Mai,Hoàng Khải,Ký Nông,Dương Văn Cường,Phúc Lê,Lử Bố,Lường Út Đại,Niem Nguyen,Bach Ngô,Thuy Linh Ngo,Thao Cao,Pham Anh Tuấn,Đoán Xem,Tuyen Huynh,Nguyễn Kpa,Lương Lợi,Hương Thanh,Lâm Phong,Nguyễn Tiến,Thịnh Trần,Cc Hack,Khon Nhu Cho,Đỗ Huy,Nguyễn Kim Hương,Nguyễn Tiến Thanh,Nguyễn Nga,Nguyễn Nhung,Trần Khải,Hoangviet Vo,Lai Tức Nhii,Mai Vàng,Hoi Bui,Tên Ko Đẹp,Do Hoang Anh,Thuan Nguyen,Trọng Khá,Hoa Ly,Box Box,Kẻ Bất Dung Thứ,Cao Trung Kiên,Ngu Nhai', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `top_recharge`
--

CREATE TABLE `top_recharge` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `cash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wheel`
--

CREATE TABLE `wheel` (
  `id` int(11) NOT NULL,
  `iduser` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `acc_random`
--
ALTER TABLE `acc_random`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_buy`
--
ALTER TABLE `history_buy`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_card`
--
ALTER TABLE `history_card`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_dff`
--
ALTER TABLE `history_dff`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_wheel`
--
ALTER TABLE `history_wheel`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lq_champion`
--
ALTER TABLE `lq_champion`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lq_skin`
--
ALTER TABLE `lq_skin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`status`);

--
-- Chỉ mục cho bảng `setting_wheel`
--
ALTER TABLE `setting_wheel`
  ADD PRIMARY KEY (`1`);

--
-- Chỉ mục cho bảng `top_recharge`
--
ALTER TABLE `top_recharge`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wheel`
--
ALTER TABLE `wheel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `acc_random`
--
ALTER TABLE `acc_random`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_buy`
--
ALTER TABLE `history_buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_card`
--
ALTER TABLE `history_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_dff`
--
ALTER TABLE `history_dff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_wheel`
--
ALTER TABLE `history_wheel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lq_champion`
--
ALTER TABLE `lq_champion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `lq_skin`
--
ALTER TABLE `lq_skin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `top_recharge`
--
ALTER TABLE `top_recharge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wheel`
--
ALTER TABLE `wheel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
