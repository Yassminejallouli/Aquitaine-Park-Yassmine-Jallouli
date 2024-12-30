-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 30 déc. 2024 à 18:53
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_parking`
--

-- --------------------------------------------------------

--
-- Structure de la table `places`
--

CREATE TABLE `places` (
  `ID` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `statut` enum('libre','occupée') DEFAULT 'libre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `places`
--

INSERT INTO `places` (`ID`, `numero`, `statut`) VALUES
(1, 1, 'libre'),
(2, 2, 'occupée'),
(5, 5, 'occupée'),
(6, 1, 'occupée'),
(7, 2, 'occupée'),
(8, 3, 'occupée'),
(9, 4, 'occupée'),
(10, 5, 'occupée'),
(11, 6, 'occupée'),
(12, 7, 'occupée'),
(13, 8, 'occupée'),
(14, 9, 'occupée'),
(15, 10, 'occupée'),
(16, 11, 'occupée'),
(17, 12, 'occupée'),
(18, 13, 'occupée'),
(19, 14, 'occupée'),
(20, 15, 'occupée'),
(21, 16, 'occupée'),
(22, 17, 'occupée'),
(23, 18, 'occupée'),
(24, 19, 'occupée'),
(25, 20, 'occupée'),
(26, 21, 'occupée'),
(27, 22, 'occupée'),
(28, 23, 'occupée'),
(29, 24, 'occupée'),
(30, 25, 'occupée'),
(31, 26, 'occupée'),
(32, 27, 'occupée'),
(33, 28, 'occupée'),
(34, 29, 'occupée'),
(35, 30, 'occupée'),
(36, 31, 'occupée'),
(37, 32, 'occupée'),
(38, 33, 'occupée'),
(39, 34, 'occupée'),
(40, 35, 'occupée'),
(41, 36, 'occupée'),
(42, 37, 'occupée'),
(43, 38, 'occupée'),
(44, 39, 'occupée'),
(45, 40, 'occupée'),
(46, 41, 'occupée'),
(47, 42, 'occupée'),
(48, 43, 'occupée'),
(49, 44, 'occupée'),
(50, 45, 'occupée'),
(51, 46, 'occupée'),
(52, 47, 'occupée'),
(53, 48, 'occupée'),
(54, 49, 'occupée'),
(55, 50, 'occupée'),
(56, 51, 'occupée'),
(57, 52, 'occupée'),
(58, 53, 'occupée'),
(59, 54, 'occupée'),
(60, 55, 'occupée'),
(61, 1, 'occupée'),
(62, 2, 'occupée'),
(63, 3, 'occupée'),
(64, 4, 'occupée'),
(65, 5, 'occupée'),
(66, 6, 'occupée'),
(67, 7, 'occupée'),
(68, 8, 'occupée'),
(69, 9, 'occupée'),
(70, 10, 'occupée'),
(71, 11, 'occupée'),
(72, 12, 'occupée'),
(73, 13, 'occupée'),
(74, 14, 'occupée'),
(75, 15, 'occupée'),
(76, 16, 'occupée'),
(77, 17, 'occupée'),
(78, 18, 'occupée'),
(79, 19, 'occupée'),
(80, 20, 'occupée'),
(81, 21, 'occupée'),
(82, 22, 'occupée'),
(83, 23, 'occupée'),
(84, 24, 'occupée'),
(85, 25, 'occupée'),
(86, 26, 'occupée'),
(87, 27, 'occupée'),
(88, 28, 'occupée'),
(89, 29, 'occupée'),
(90, 30, 'occupée'),
(91, 31, 'occupée'),
(92, 32, 'occupée'),
(93, 33, 'occupée'),
(94, 34, 'occupée'),
(95, 35, 'occupée'),
(96, 36, 'occupée'),
(97, 37, 'occupée'),
(98, 38, 'occupée'),
(99, 39, 'occupée'),
(100, 40, 'occupée'),
(101, 41, 'occupée'),
(102, 42, 'occupée'),
(103, 43, 'occupée'),
(104, 44, 'occupée'),
(105, 45, 'occupée'),
(106, 46, 'occupée'),
(107, 47, 'occupée'),
(108, 48, 'occupée'),
(109, 49, 'occupée'),
(110, 50, 'occupée'),
(111, 51, 'occupée'),
(112, 52, 'occupée'),
(113, 53, 'occupée'),
(114, 54, 'occupée'),
(115, 55, 'occupée'),
(116, 1, 'occupée'),
(117, 2, 'occupée'),
(118, 3, 'occupée'),
(119, 4, 'occupée'),
(120, 5, 'occupée'),
(121, 6, 'occupée'),
(122, 7, 'occupée'),
(123, 8, 'occupée'),
(124, 9, 'occupée'),
(125, 10, 'occupée'),
(126, 11, 'occupée'),
(127, 12, 'occupée'),
(128, 13, 'occupée'),
(129, 14, 'occupée'),
(130, 15, 'occupée'),
(131, 16, 'occupée'),
(132, 17, 'occupée'),
(133, 18, 'occupée'),
(134, 19, 'occupée'),
(135, 20, 'occupée'),
(136, 21, 'occupée'),
(137, 22, 'occupée'),
(138, 23, 'occupée'),
(139, 24, 'occupée'),
(140, 25, 'occupée'),
(141, 26, 'occupée'),
(142, 27, 'occupée'),
(143, 28, 'occupée'),
(144, 29, 'occupée'),
(145, 30, 'occupée'),
(146, 31, 'occupée'),
(147, 32, 'occupée'),
(148, 33, 'occupée'),
(149, 34, 'occupée'),
(150, 35, 'occupée'),
(151, 36, 'occupée'),
(152, 37, 'occupée'),
(153, 38, 'occupée'),
(154, 39, 'occupée'),
(155, 40, 'occupée'),
(156, 41, 'occupée'),
(157, 42, 'occupée'),
(158, 43, 'occupée'),
(159, 44, 'occupée'),
(160, 45, 'occupée'),
(161, 46, 'occupée'),
(162, 47, 'occupée'),
(163, 48, 'occupée'),
(164, 49, 'occupée'),
(165, 50, 'occupée'),
(166, 51, 'occupée'),
(167, 52, 'occupée'),
(168, 53, 'occupée'),
(169, 54, 'occupée'),
(170, 55, 'occupée'),
(171, 56, 'occupée'),
(172, 57, 'occupée'),
(173, 58, 'occupée'),
(174, 59, 'occupée'),
(175, 60, 'occupée'),
(176, 61, 'occupée'),
(177, 62, 'occupée'),
(178, 63, 'occupée'),
(179, 64, 'occupée'),
(180, 65, 'occupée'),
(181, 66, 'occupée'),
(182, 67, 'occupée'),
(183, 68, 'occupée'),
(184, 69, 'occupée'),
(185, 70, 'occupée'),
(186, 71, 'occupée'),
(187, 72, 'occupée'),
(188, 73, 'occupée'),
(189, 74, 'occupée'),
(190, 75, 'occupée'),
(191, 76, 'occupée'),
(192, 77, 'occupée'),
(193, 78, 'occupée'),
(194, 79, 'occupée'),
(195, 80, 'occupée'),
(196, 81, 'occupée'),
(197, 82, 'occupée'),
(198, 83, 'occupée'),
(199, 84, 'occupée'),
(200, 85, 'occupée'),
(201, 86, 'occupée'),
(202, 87, 'occupée'),
(203, 88, 'occupée'),
(204, 89, 'occupée'),
(205, 90, 'occupée'),
(206, 91, 'occupée'),
(207, 92, 'occupée'),
(208, 93, 'occupée'),
(209, 94, 'occupée'),
(210, 95, 'occupée'),
(211, 96, 'occupée'),
(212, 97, 'occupée'),
(213, 98, 'occupée'),
(214, 99, 'occupée'),
(215, 100, 'occupée'),
(216, 101, 'occupée'),
(217, 102, 'occupée'),
(218, 103, 'occupée'),
(219, 104, 'occupée'),
(220, 105, 'occupée'),
(221, 106, 'occupée'),
(222, 107, 'occupée'),
(223, 108, 'occupée'),
(224, 109, 'occupée'),
(225, 110, 'occupée'),
(226, 111, 'occupée'),
(227, 112, 'occupée'),
(228, 113, 'occupée'),
(229, 114, 'occupée'),
(230, 115, 'occupée'),
(231, 116, 'occupée'),
(232, 117, 'occupée'),
(233, 118, 'occupée'),
(234, 119, 'occupée'),
(235, 120, 'occupée'),
(236, 121, 'occupée'),
(237, 122, 'occupée'),
(238, 123, 'occupée'),
(239, 124, 'occupée'),
(240, 125, 'occupée'),
(241, 126, 'occupée'),
(242, 127, 'occupée'),
(243, 128, 'occupée'),
(244, 129, 'occupée'),
(245, 130, 'occupée'),
(246, 131, 'occupée'),
(247, 132, 'occupée'),
(248, 133, 'occupée'),
(249, 134, 'occupée'),
(250, 135, 'occupée'),
(251, 136, 'occupée'),
(252, 137, 'occupée'),
(253, 138, 'occupée'),
(254, 139, 'occupée'),
(255, 140, 'occupée'),
(256, 141, 'occupée'),
(257, 142, 'occupée'),
(258, 143, 'occupée'),
(259, 144, 'occupée'),
(260, 145, 'occupée'),
(261, 146, 'occupée'),
(262, 147, 'occupée'),
(263, 148, 'occupée'),
(264, 149, 'occupée'),
(265, 150, 'occupée'),
(266, 151, 'occupée'),
(267, 152, 'occupée'),
(268, 153, 'occupée'),
(269, 154, 'occupée'),
(270, 155, 'occupée'),
(271, 156, 'occupée'),
(272, 157, 'occupée'),
(273, 158, 'occupée'),
(274, 159, 'occupée'),
(275, 160, 'occupée'),
(276, 161, 'occupée'),
(277, 162, 'occupée'),
(278, 163, 'occupée'),
(279, 164, 'occupée'),
(280, 165, 'occupée'),
(281, 166, 'occupée'),
(282, 167, 'occupée'),
(283, 168, 'occupée'),
(284, 169, 'occupée'),
(285, 170, 'occupée'),
(286, 171, 'occupée'),
(287, 172, 'occupée'),
(288, 173, 'occupée'),
(289, 174, 'occupée'),
(290, 175, 'occupée'),
(291, 176, 'occupée'),
(292, 177, 'occupée'),
(293, 178, 'occupée'),
(294, 179, 'occupée'),
(295, 180, 'occupée'),
(296, 181, 'occupée'),
(297, 182, 'occupée'),
(298, 183, 'occupée'),
(299, 184, 'occupée'),
(300, 185, 'occupée'),
(301, 186, 'occupée'),
(302, 187, 'occupée'),
(303, 188, 'occupée'),
(304, 189, 'occupée'),
(305, 190, 'occupée'),
(306, 191, 'occupée'),
(307, 192, 'occupée'),
(308, 193, 'occupée'),
(309, 194, 'occupée'),
(310, 195, 'occupée'),
(311, 196, 'occupée'),
(312, 197, 'occupée'),
(313, 198, 'occupée'),
(314, 199, 'occupée'),
(315, 200, 'occupée'),
(316, 201, 'occupée'),
(317, 202, 'occupée'),
(318, 203, 'occupée'),
(319, 204, 'occupée'),
(320, 205, 'occupée'),
(321, 206, 'occupée'),
(322, 207, 'occupée'),
(323, 208, 'occupée'),
(324, 209, 'occupée'),
(325, 210, 'occupée'),
(326, 211, 'occupée'),
(327, 212, 'occupée'),
(328, 213, 'occupée'),
(329, 214, 'occupée'),
(330, 215, 'occupée'),
(331, 216, 'occupée'),
(332, 217, 'occupée'),
(333, 218, 'occupée'),
(334, 219, 'occupée'),
(335, 220, 'occupée'),
(336, 221, 'occupée'),
(337, 222, 'occupée'),
(338, 223, 'occupée'),
(339, 224, 'occupée'),
(340, 225, 'occupée'),
(341, 226, 'occupée'),
(342, 227, 'occupée'),
(343, 228, 'occupée'),
(344, 229, 'occupée'),
(345, 230, 'occupée'),
(346, 231, 'occupée'),
(347, 232, 'occupée'),
(348, 233, 'occupée'),
(349, 234, 'occupée'),
(350, 235, 'occupée'),
(351, 236, 'occupée'),
(352, 237, 'occupée'),
(353, 238, 'occupée'),
(354, 239, 'occupée'),
(355, 240, 'occupée'),
(356, 241, 'occupée'),
(357, 242, 'occupée'),
(358, 243, 'occupée'),
(359, 244, 'occupée'),
(360, 245, 'occupée'),
(361, 246, 'occupée'),
(362, 247, 'occupée'),
(363, 248, 'occupée'),
(364, 249, 'occupée'),
(365, 250, 'occupée'),
(366, 251, 'occupée'),
(367, 252, 'occupée'),
(368, 253, 'occupée'),
(369, 254, 'occupée'),
(370, 56, 'occupée'),
(371, 57, 'occupée'),
(372, 58, 'occupée'),
(373, 59, 'occupée'),
(374, 60, 'occupée'),
(375, 61, 'occupée'),
(376, 62, 'occupée'),
(377, 63, 'occupée'),
(378, 64, 'occupée'),
(379, 65, 'occupée'),
(380, 66, 'occupée'),
(381, 67, 'occupée'),
(382, 68, 'occupée'),
(383, 69, 'occupée'),
(384, 70, 'occupée'),
(385, 71, 'occupée'),
(386, 72, 'occupée'),
(387, 73, 'occupée'),
(388, 74, 'occupée'),
(389, 75, 'occupée'),
(390, 76, 'occupée'),
(391, 77, 'occupée'),
(392, 78, 'occupée'),
(393, 79, 'occupée'),
(394, 80, 'occupée'),
(395, 81, 'occupée'),
(396, 82, 'occupée'),
(397, 83, 'occupée'),
(398, 84, 'occupée'),
(399, 85, 'occupée'),
(400, 86, 'occupée'),
(401, 87, 'occupée'),
(402, 88, 'occupée'),
(403, 89, 'occupée'),
(404, 90, 'occupée'),
(405, 91, 'occupée'),
(406, 92, 'occupée'),
(407, 93, 'occupée'),
(408, 94, 'occupée'),
(409, 95, 'occupée'),
(410, 96, 'occupée'),
(411, 97, 'occupée'),
(412, 98, 'occupée'),
(413, 99, 'occupée'),
(414, 100, 'libre'),
(415, 101, 'occupée'),
(416, 102, 'occupée'),
(417, 103, 'occupée'),
(418, 104, 'occupée'),
(419, 105, 'occupée'),
(420, 106, 'occupée'),
(421, 107, 'occupée'),
(422, 108, 'libre'),
(423, 109, 'occupée'),
(424, 110, 'occupée'),
(425, 111, 'libre'),
(426, 112, 'libre'),
(427, 113, 'occupée'),
(428, 114, 'occupée'),
(429, 115, 'occupée'),
(430, 116, 'libre'),
(431, 117, 'libre'),
(432, 118, 'occupée'),
(433, 119, 'libre'),
(434, 120, 'libre'),
(435, 121, 'libre'),
(436, 122, 'libre'),
(437, 123, 'libre'),
(438, 124, 'occupée'),
(439, 125, 'occupée'),
(440, 126, 'libre'),
(441, 127, 'libre'),
(442, 128, 'libre'),
(443, 129, 'libre'),
(444, 130, 'occupée'),
(445, 131, 'occupée'),
(446, 132, 'libre'),
(447, 133, 'libre'),
(448, 134, 'libre'),
(449, 135, 'libre'),
(450, 136, 'libre'),
(451, 137, 'libre'),
(452, 138, 'libre'),
(453, 139, 'libre'),
(454, 140, 'libre'),
(455, 141, 'libre'),
(456, 142, 'libre'),
(457, 143, 'libre'),
(458, 144, 'libre'),
(459, 145, 'libre'),
(460, 146, 'libre'),
(461, 147, 'libre'),
(462, 148, 'libre'),
(463, 149, 'libre'),
(464, 150, 'libre'),
(465, 151, 'libre'),
(466, 152, 'libre'),
(467, 153, 'libre'),
(468, 154, 'libre'),
(469, 155, 'libre'),
(470, 156, 'libre'),
(471, 157, 'libre'),
(472, 158, 'libre'),
(473, 159, 'libre'),
(474, 160, 'libre'),
(475, 161, 'libre'),
(476, 162, 'libre'),
(477, 163, 'libre'),
(478, 164, 'libre'),
(479, 165, 'libre'),
(480, 166, 'libre'),
(481, 167, 'libre'),
(482, 168, 'libre'),
(483, 169, 'libre'),
(484, 170, 'libre'),
(485, 171, 'libre'),
(486, 172, 'libre'),
(487, 173, 'libre'),
(488, 174, 'libre'),
(489, 175, 'libre'),
(490, 176, 'libre'),
(491, 177, 'libre'),
(492, 178, 'libre'),
(493, 179, 'libre'),
(494, 180, 'libre'),
(495, 181, 'libre'),
(496, 182, 'libre'),
(497, 183, 'libre'),
(498, 184, 'libre'),
(499, 185, 'libre'),
(500, 186, 'libre'),
(501, 187, 'libre'),
(502, 188, 'libre'),
(503, 189, 'libre'),
(504, 190, 'libre'),
(505, 191, 'libre'),
(506, 192, 'libre'),
(507, 193, 'libre'),
(508, 194, 'libre'),
(509, 195, 'libre'),
(510, 196, 'libre'),
(511, 197, 'libre'),
(512, 198, 'libre'),
(513, 199, 'libre'),
(514, 200, 'libre'),
(515, 201, 'libre'),
(516, 202, 'libre'),
(517, 203, 'libre'),
(518, 204, 'libre'),
(519, 205, 'libre'),
(520, 206, 'libre'),
(521, 207, 'libre'),
(522, 208, 'libre'),
(523, 209, 'libre'),
(524, 210, 'libre'),
(525, 211, 'libre'),
(526, 212, 'libre'),
(527, 213, 'libre'),
(528, 214, 'libre'),
(529, 215, 'libre'),
(530, 216, 'libre'),
(531, 217, 'libre'),
(532, 218, 'libre'),
(533, 219, 'libre'),
(534, 220, 'libre'),
(535, 221, 'libre'),
(536, 222, 'libre'),
(537, 223, 'libre'),
(538, 224, 'libre'),
(539, 225, 'libre'),
(540, 226, 'libre'),
(541, 227, 'libre'),
(542, 228, 'libre'),
(543, 229, 'libre'),
(544, 230, 'libre'),
(545, 231, 'libre'),
(546, 232, 'libre'),
(547, 233, 'libre'),
(548, 234, 'libre'),
(549, 235, 'libre'),
(550, 236, 'libre'),
(551, 237, 'libre'),
(552, 238, 'libre'),
(553, 239, 'libre'),
(554, 240, 'libre'),
(555, 241, 'libre'),
(556, 242, 'libre'),
(557, 243, 'libre'),
(558, 244, 'libre'),
(559, 245, 'libre'),
(560, 246, 'libre'),
(561, 247, 'libre'),
(562, 248, 'libre'),
(563, 249, 'libre'),
(564, 250, 'libre'),
(565, 251, 'libre'),
(566, 252, 'libre'),
(567, 253, 'libre'),
(568, 254, 'libre'),
(569, 255, 'libre'),
(570, 0, 'occupée'),
(571, 0, 'occupée'),
(572, 0, 'occupée'),
(573, 0, 'occupée'),
(574, 0, 'occupée'),
(575, 0, 'occupée'),
(576, 0, 'occupée'),
(577, 0, 'occupée'),
(578, 0, 'occupée'),
(579, 0, 'occupée'),
(580, 0, 'occupée'),
(581, 0, 'occupée'),
(582, 0, 'occupée'),
(583, 0, 'occupée'),
(584, 0, 'occupée'),
(585, 0, 'occupée'),
(586, 0, 'occupée'),
(587, 0, 'occupée'),
(588, 0, 'occupée'),
(589, 0, 'occupée'),
(590, 0, 'occupée'),
(591, 0, 'occupée'),
(592, 0, 'occupée'),
(593, 0, 'occupée'),
(594, 0, 'occupée'),
(595, 0, 'occupée'),
(596, 0, 'occupée'),
(597, 0, 'occupée'),
(598, 0, 'occupée'),
(599, 0, 'occupée'),
(600, 0, 'occupée'),
(601, 0, 'occupée'),
(602, 0, 'occupée'),
(603, 0, 'occupée'),
(604, 0, 'occupée'),
(605, 0, 'occupée'),
(606, 0, 'occupée'),
(607, 0, 'occupée'),
(608, 0, 'occupée'),
(609, 0, 'occupée'),
(610, 0, 'occupée'),
(611, 0, 'occupée'),
(612, 0, 'libre'),
(613, 0, 'libre'),
(614, 0, 'libre'),
(615, 0, 'libre'),
(616, 0, 'libre'),
(617, 0, 'libre'),
(618, 0, 'libre'),
(619, 0, 'libre'),
(620, 0, 'libre'),
(621, 0, 'libre'),
(622, 0, 'libre'),
(623, 0, 'libre'),
(624, 0, 'libre'),
(625, 0, 'libre'),
(626, 0, 'libre'),
(627, 0, 'libre'),
(628, 0, 'libre'),
(629, 0, 'libre'),
(630, 0, 'libre'),
(631, 0, 'libre'),
(632, 0, 'libre'),
(633, 0, 'libre'),
(634, 0, 'libre'),
(635, 0, 'libre'),
(636, 0, 'libre'),
(637, 0, 'libre'),
(638, 0, 'libre'),
(639, 0, 'libre'),
(640, 0, 'occupée'),
(641, 0, 'occupée'),
(642, 0, 'occupée'),
(643, 0, 'occupée'),
(644, 0, 'occupée'),
(645, 120, 'libre'),
(646, 200, 'libre'),
(647, 200, 'libre'),
(648, 120, 'libre'),
(649, 108, 'libre'),
(650, 5, 'libre'),
(651, 5, 'libre'),
(652, 5, 'libre'),
(653, 120, 'libre'),
(654, 12, 'libre'),
(655, 12, 'libre'),
(656, 121, 'libre'),
(657, 3, 'libre');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `statut` enum('confirmée','annulée','en attente') DEFAULT 'en attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`ID`, `user_id`, `place_id`, `date_debut`, `date_fin`, `statut`) VALUES
(5, 25, 200, '2025-01-02 16:31:00', '2025-01-03 16:31:00', 'en attente'),
(6, 26, 150, '2024-12-18 16:47:00', '2024-12-20 16:47:00', 'en attente');

-- --------------------------------------------------------

--
-- Structure de la table `stationnements`
--

CREATE TABLE `stationnements` (
  `ID` int(11) NOT NULL,
  `vehicule_id` int(11) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL,
  `date_entree` datetime NOT NULL,
  `date_sortie` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stationnements`
--

INSERT INTO `stationnements` (`ID`, `vehicule_id`, `place_id`, `date_entree`, `date_sortie`) VALUES
(14, 21, 409, '2024-12-29 00:50:47', NULL),
(15, 22, 413, '2024-12-29 01:46:43', NULL),
(16, 23, 401, '2024-12-29 01:47:43', NULL),
(17, 27, 422, '2024-12-30 00:28:41', '2024-12-30 02:43:28'),
(18, 28, 427, '2024-12-30 00:32:23', NULL),
(19, 29, 429, '2024-12-30 00:32:35', NULL),
(20, 30, 428, '2024-12-30 00:34:04', NULL),
(21, 31, 426, '2024-12-30 00:36:43', '2024-12-30 02:53:25'),
(22, 32, 412, '2024-12-30 00:39:31', NULL),
(23, 33, 433, '2024-12-30 00:42:39', '2024-12-30 02:54:05'),
(24, 34, 410, '2024-12-30 02:58:12', NULL),
(25, 35, 432, '2024-12-30 12:00:16', NULL),
(26, 36, 421, '2024-12-30 12:03:37', NULL),
(27, 37, 1, '2024-12-30 12:05:46', NULL),
(28, 38, 1, '2024-12-30 12:10:32', '2024-12-30 12:11:27'),
(29, 39, 424, '2024-12-30 12:14:16', NULL),
(30, 40, 404, '2024-12-30 12:20:32', '2024-12-30 12:20:58'),
(31, 41, 418, '2024-12-30 12:23:15', NULL),
(32, 42, 406, '2024-12-30 12:31:21', '2024-12-30 12:32:00'),
(33, 43, 439, '2024-12-30 12:33:57', NULL),
(34, 44, 1, '2024-12-30 14:19:06', '2024-12-30 14:19:46'),
(35, 45, 419, '2024-12-30 14:25:53', NULL),
(36, 46, 1, '2024-12-30 14:33:37', NULL),
(37, 47, 404, '2024-12-30 14:41:26', '2024-12-30 14:41:51'),
(38, 48, 420, '2024-12-30 14:43:31', NULL),
(39, 49, 1, '2024-12-30 15:00:36', '2024-12-30 15:01:34'),
(40, 50, 406, '2024-12-30 15:58:46', NULL),
(41, 51, 404, '2024-12-30 16:03:17', NULL),
(42, 52, 434, '2024-12-30 16:10:03', '2024-12-30 16:10:45'),
(43, 53, 414, '2024-12-30 16:13:08', '2024-12-30 16:13:52'),
(44, 54, 405, '2024-12-30 16:15:28', NULL),
(45, 55, 436, '2024-12-30 16:29:54', '2024-12-30 16:30:39'),
(46, 56, 444, '2024-12-30 16:32:51', NULL),
(47, 57, 433, '2024-12-30 16:46:15', '2024-12-30 16:46:50'),
(48, 58, 438, '2024-12-30 16:48:34', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `role`) VALUES
(3, 'admin', '3emeTEL', 'admin'),
(5, 'mariem', '65412789', 'user'),
(8, 'amira', 'amira213', 'user'),
(25, 'yassmine jallouli', '235689', 'user'),
(26, 'jallouli yassmine', '28204952', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `ID` int(11) NOT NULL,
  `plaque` varchar(20) NOT NULL,
  `proprietaire` varchar(100) NOT NULL,
  `telephone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`ID`, `plaque`, `proprietaire`, `telephone`) VALUES
(17, '245 tunis 5712', 'yassmine47', '28204952'),
(18, '245 tunis 575', 'Yassine', '25247896'),
(20, '245 tunis 572', 'fatma', '12457963'),
(21, '245 tunis 573', 'hana', '23568947'),
(22, '245 tunis 572', 'hela', '32659874'),
(23, '245 tunis 57547', 'mariem', '14725836'),
(24, '21 tunis 2134', 'Amira', '23568974'),
(25, '21 tunis 2135', 'yesmine', '23145786'),
(26, '123 tunis 222', 'Amira', '24785312'),
(27, '21 tunis 1257', 'eline', '23145786'),
(28, '23 tunis 6897', 'rania', '23147852'),
(29, '23 tunis 2345', 'rania', '23147852'),
(30, '23 tunis 2354', 'rania', '23147852'),
(31, '21 tunis 211', 'cycy', '24785311'),
(32, '123 tunis 2221', 'eline', '28204951'),
(33, '23 tunis 232', 'yesmine', '23147832'),
(34, '245 tunis 321', 'Yessine', '21479532'),
(35, '245 tunis 579', 'YesmineJ', '2820495232'),
(36, '245 tunis 325', 'aya', '2134568321'),
(37, '214 tunis 3256', 'mariem', '2147956323'),
(38, '245 tunis 554', 'yassmine47', '2457963332'),
(39, '2 tunis 2369', 'eyaA', '2824056923'),
(40, '245 tunis 544', 'yassmine jallouli', '2820495223'),
(41, '245 tunis 458', 'MARIEM', '2147956323'),
(42, '245 tunis 3215', 'jallouli yassmine', '2345671892'),
(43, '245 tunis 669', 'eya', '2147956323'),
(44, '21 tunis 321', 'yassmine2', '2147956312'),
(45, '245 tunis 968', 'fatma', '2147956336'),
(46, '245 tunis 258', 'yassmine jallouli', '2820495223'),
(47, '245 tunis 2356', 'yassmine jallouli', '1245796345'),
(48, '245 tunis 123', 'amira', '2820495224'),
(49, '245 tunis 369', 'jallouli yassmine', '2820495221'),
(50, '245 tunis 789', 'yassmine jallouli', '2824056923'),
(51, '245 tunis 396', 'yassmine jallouli', '2824056923'),
(52, '245 tunis 987', 'yassmine jallouli', '2147956323'),
(53, '245 tunis 753', 'jallouli yassmine', '2824056923'),
(54, '245 tunis 3698', 'amira', '2820495223'),
(55, '245 tunis 9874', 'yassmine jallouli', '2824056923'),
(56, '245 tunis 2589', 'amira', '2145796323'),
(57, '245 tunis 7452', 'yassmine jallouli', '2457813624'),
(58, '245 tunis 7425', 'amira', '9270832112');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `place_id` (`place_id`);

--
-- Index pour la table `stationnements`
--
ALTER TABLE `stationnements`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `vehicule_id` (`vehicule_id`),
  ADD KEY `place_id` (`place_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `places`
--
ALTER TABLE `places`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=669;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `stationnements`
--
ALTER TABLE `stationnements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `places` (`ID`) ON DELETE CASCADE;

--
-- Contraintes pour la table `stationnements`
--
ALTER TABLE `stationnements`
  ADD CONSTRAINT `stationnements_ibfk_1` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`ID`),
  ADD CONSTRAINT `stationnements_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `places` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
