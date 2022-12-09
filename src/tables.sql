-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 20-Jun-2015 às 20:20
-- Versão do servidor: 5.5.43-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `seatle`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_nome` varchar(200) DEFAULT NULL,
  `area_pos` int(11) DEFAULT '0',
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`area_id`, `area_nome`, `area_pos`) VALUES
(6, 'World''s', 0),
(7, 'Magazine', 0),
(8, 'Nature', 0),
(9, 'Techonology', 0),
(10, 'People', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `area1`
--

CREATE TABLE IF NOT EXISTS `area1` (
  `area1_id` int(11) NOT NULL AUTO_INCREMENT,
  `area1_nome` varchar(200) DEFAULT NULL,
  `area1_pos` int(11) DEFAULT '0',
  PRIMARY KEY (`area1_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `area1`
--

INSERT INTO `area1` (`area1_id`, `area1_nome`, `area1_pos`) VALUES
(2, 'Design', 4),
(3, 'Photography', 3),
(4, 'Art', 1),
(5, 'Bootstrap', 0),
(6, 'Nature', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_nome` varchar(200) DEFAULT NULL,
  `cliente_subtitulo` varchar(200) DEFAULT NULL,
  `cliente_descricao` text NOT NULL,
  `cliente_imagem` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cliente_id`, `cliente_nome`, `cliente_subtitulo`, `cliente_descricao`, `cliente_imagem`) VALUES
(10, 'Ram', 'Fundadora', 'Lacus lundium cursus ridiculus? Ridiculus tempor penatibus integer dolor eros scelerisque facilisis elit proin, magnis cursus facilisis mauris, et facilisis! Aliquet turpis amet, sit sagittis ac nec purus. Etiam nisi? Sociis nunc, in! Vut velit? Ac pulvinar cursus et dis natoque dis! Sagittis nec nunc, proin ut amet? Enim, cum etiam et odio elementum parturient! Porta est aliquam arcu nascetur, enim ultricies penatibus, porttitor cras, nisi duis scelerisque dis vut porttitor pulvinar magna ut nunc, habitasse pid pulvinar, urna elit? Et in, a integer? Lundium ridiculus etiam porttitor. Non, nisi vut, a tortor nec, mauris arcu nascetur egestas aliquet, in tincidunt rhoncus. Urna ac elementum, arcu ultrices adipiscing et proin, a a sociis ridiculus dis ultrices dictumst auctor ac dictumst.', '1432228682.jpg'),
(11, 'Dudu', 'Developer', 'Lacus lundium cursus ridiculus? Ridiculus tempor penatibus integer dolor eros scelerisque facilisis elit proin, magnis cursus facilisis mauris, et facilisis! Aliquet turpis amet, sit sagittis ac nec purus. Etiam nisi? Sociis nunc', '1432229684.jpg'),
(12, 'Peter', 'Designer', 'in! Vut velit? Ac pulvinar cursus et dis natoque dis! Sagittis nec nunc, proin ut amet? Enim, cum etiam et odio elementum parturient! Porta est aliquam arcu nascetur', '1432229718.jpg'),
(13, 'Hardik', 'Graphics', 'enim ultricies penatibus, porttitor cras, nisi duis scelerisque dis vut porttitor pulvinar magna ut nunc, habitasse pid pulvinar, urna elit? Et in, a integer? Lundium ridiculus etiam porttitor. Non, nisi vut, a tortor nec, mauris arcu nascetur egestas aliquet, in tincidunt rhoncus. Urna ac elementum, arcu ultrices adipiscing et proin, a a sociis ridiculus dis ultrices dictumst auctor ac dictumst.', '1432229883.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `comentario_id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario_nome` varchar(200) DEFAULT NULL,
  `comentario_email` varchar(200) DEFAULT NULL,
  `comentario_mensagem` text,
  `comentario_data` varchar(200) DEFAULT NULL,
  `comentario_status` int(11) DEFAULT '0',
  `comentario_pagina` int(11) DEFAULT NULL,
  PRIMARY KEY (`comentario_id`),
  KEY `fk_comentario_pagina1_idx` (`comentario_pagina`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`comentario_id`, `comentario_nome`, `comentario_email`, `comentario_mensagem`, `comentario_data`, `comentario_status`, `comentario_pagina`) VALUES
(9, 'Luiz', 'luiz@luiz', 'Pellentesque auctor hac in nec, integer urna. Parturient cursus integer cras? Amet! Lectus ut! Lectus a odio? Elit sed vel eros, egestas platea nisi porta duis, tincidunt elit urna elit cursus?', '13/04/2015  09:59:09', 1, 50),
(32, 'Jhon', 'jhon@gmail', 'Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lÃ¡ , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. MÃ© faiz elementum girarzis, nisi eros vermeio, in elementis mÃ© pra quem Ã© amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.', '14/04/2015  03:35:50', 1, 50),
(33, 'Manoel', 'manoel@manoel', 'Suco de cevadiss, Ã© um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Interagi no mÃ©, cursus quis, vehicula ac nisi. Aenean vel dui dui. Nullam leo erat, aliquet quis tempus a, posuere ut mi. Ut scelerisque neque et turpis posuere pulvinar pellentesque nibh ', '14/04/2015  03:03:35', 1, 50),
(34, 'Mike', 'mike@mike', 'Suco de cevadiss,teste', '14/04/2015  05:31:25', 1, 52),
(36, 'Sophie', 'sophie@sophie', 'Pellentesque auctor porttitor, turpis auctor augue, auctor hac tincidunt aliquam velit dolor pulvinar velit phasellus tortor, sit dignissim scelerisque vel lacus a ac auctor, tincidunt vel nisi, magna cum enim dis est dapibus ac magna vel, lorem aliquam ut est dolor, ', '22/04/2015  05:03:44', 1, 52),
(37, 'Russel', 'russel@russel', 'Et, ultrices nisi ut adipiscing, purus hac? Nec natoque! Et porta! Mid risus natoque penatibus odio penatibus, eu ac scelerisque scelerisque? Tincidunt duis, vel est ac sed augue sociis, vel, et auctor tempor rhoncus, mauris! Amet pulvinar lundium natoque amet turpis, odio placerat ac, nunc pulvinar habitasse elementum integer. Pulvinar, proin vut ac integer in nunc a egestas, etiam? Phasellus augue arcu nunc sed cursus.', '01/05/2015', 1, 52),
(38, 'Sophie', 'sophie@sophie', 'Adipiscing purus ut est odio? Scelerisque in nec eros tincidunt nunc? A amet ridiculus et massa habitasse turpis a cursus, lorem augue ac, integer pulvinar lundium et ac lectus, massa nisi, duis, massa, adipiscing nunc, egestas turpis urna. Non in, dolor. Quis pid quis, aenean quis vut, in sed, et augue porta magna sed. ', '01/05/2015', 1, 52),
(39, 'Sophie', 'sophie@sophie', 'Adipiscing purus ut est odio? Scelerisque in nec eros tincidunt nunc? A amet ridiculus et massa habitasse turpis a cursus, lorem augue ac, integer pulvinar lundium et ac lectus, massa nisi, duis, massa, adipiscing nunc, egestas turpis urna. Non in, dolor. Quis pid quis, aenean quis vut, in sed, et augue porta magna sed. ', '01/05/2015', 1, 52),
(40, 'Illana Nguyen', 'zivyryluw@gmail.com', 'Eos, sit, nostrud commodi accusantium ratione dolor quis voluptatum ducimus, consequuntur.', '20/06/2015', 1, 56),
(41, 'Kyle Daniel', 'loxiwymeto@gmail.com', 'Veniam, in consectetur, ea quaerat accusantium amet, qui fugiat, quisquam qui error.', '20/06/2015', 0, 56);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `contato_id` int(11) NOT NULL,
  `contato_email` varchar(200) DEFAULT NULL,
  `contato_telefone1` varchar(200) DEFAULT NULL,
  `contato_endereco` varchar(200) DEFAULT NULL,
  `contato_long_lat` varchar(200) DEFAULT NULL,
  `contato_telefone2` varchar(200) DEFAULT NULL,
  `contato_telefone3` varchar(200) DEFAULT NULL,
  `contato_telefone4` varchar(200) DEFAULT NULL,
  `contato_telefone5` varchar(200) DEFAULT NULL,
  `contato_telefone6` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`contato_id`, `contato_email`, `contato_telefone1`, `contato_endereco`, `contato_long_lat`, `contato_telefone2`, `contato_telefone3`, `contato_telefone4`, `contato_telefone5`, `contato_telefone6`) VALUES
(1, 'coletivaambiental@gmail.com', '(13) 3356-9312', 'Centro, Passira - PE', '-7.980159, -35.581747', '', '(99) 9 9999-9999 Tim', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `depoimento`
--

CREATE TABLE IF NOT EXISTS `depoimento` (
  `depoimento_id` int(11) NOT NULL AUTO_INCREMENT,
  `depoimento_nome` varchar(200) DEFAULT NULL,
  `depoimento_cargo` varchar(200) DEFAULT NULL,
  `depoimento_sobre` text,
  `depoimento_data` varchar(200) DEFAULT NULL,
  `depoimento_imagem` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`depoimento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `depoimento`
--

INSERT INTO `depoimento` (`depoimento_id`, `depoimento_nome`, `depoimento_cargo`, `depoimento_sobre`, `depoimento_data`, `depoimento_imagem`) VALUES
(2, 'Stanley Roe', 'CEO & Founder', 'Magna velit aliquet lectus amet porttitor elementum nec augue sit vut, mattis adipiscing tortor. Non, eu nunc ac, cum habitasse in aliquam nec tortor, sit odio sagittis magna, ultrices porttitor. Integer porta? Duis, arcu ut aliquam magna dis nascetur scelerisque. Montes habitasse lacus lorem, sagittis turpis lectus turpis adipiscing lorem, enim sit rhoncus duis mid porttitor? ', '15/05/2015', '1432298411.jpg'),
(4, 'Olga', 'Web design', 'Arcu integer nascetur quis ridiculus, porttitor! Pellentesque in aliquam sed penatibus magna. In auctor, quis dignissim, ultricies rhoncus est, amet, eros, tempor urna nec integer, augue cras ultrices. Dolor amet! Nisi proin magnis cum velit, et, a sed integer eros nunc, proin turpis phasellus mattis, dapibus. Nisi placerat, proin elementum, nisi, purus sit placerat phasellus urna, nec. A elit, facilisis! Aenean dolor et odio? Parturient mid, tincidunt sed elementum enim, augue porttitor amet sociis nunc elementum est elementum tristique et hac et proin hac odio pid ac lorem? Tincidunt aliquet. Porttitor! Tempor rhoncus nec mus quis parturient in, eros aliquet augue auctor egestas ut rhoncus sit auctor, magna! Non augue, elementum, penatibus, porttitor phasellus tincidunt lorem, elementum ac augue habitasse.', '15/05/2015', '1432298417.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `foto_id` int(11) NOT NULL AUTO_INCREMENT,
  `foto_url` varchar(200) DEFAULT NULL,
  `foto_pos` int(11) DEFAULT '0',
  `foto_portfolio` int(11) DEFAULT NULL,
  PRIMARY KEY (`foto_id`),
  KEY `fk_foto_portfolio_idx` (`foto_portfolio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=210 ;

--
-- Extraindo dados da tabela `foto`
--

INSERT INTO `foto` (`foto_id`, `foto_url`, `foto_pos`, `foto_portfolio`) VALUES
(15, '5a1ba318885f3c4a0b89a857f975bf9a.jpg', 0, 4),
(24, '869af905d7ea98285bc175fae41cc991.jpg', 0, 4),
(26, '4e049de74b230318e1aa04213f57ba39.jpg', 0, 4),
(30, '2fe90a2f2bc77d61150bc4db148c529e.jpg', 0, 4),
(31, '3ddd510a983ffe2b82c457be264786ea.jpg', 0, 5),
(32, 'b900387ae6bc2a2f8f1a64d6168dc473.jpg', 0, 5),
(33, 'f39e3139327291b71d206f4035e4f988.jpg', 0, 5),
(34, '7c809c15171d6a4123ce5cee9e46b6c1.jpg', 0, 5),
(35, '881c9e46d972c75247ffef4ee44c1e31.jpg', 0, 5),
(36, 'f6e58b3b5bc402b7e4ebe04f324e516e.jpg', 0, 5),
(37, '618d1af280d43c64a6e74b91adc90094.jpg', 0, 5),
(38, 'f4f69fc06b0ff7e20ebe1f9a0d50b315.jpg', 0, 5),
(39, '34bd8af36329d720540faa30b210293e.jpg', 0, 5),
(40, '69c12b5e8071beaa3f023f2fc930305c.jpg', 0, 6),
(41, '8eb0f4936165edddea249269e8f69e01.jpg', 0, 6),
(42, '4691750a53bcf3176fa316b607a729cc.jpg', 0, 6),
(43, '8b980edfac550d5d7bba6363359b4dd9.jpg', 0, 6),
(44, '0487aa4b5f301a00be5f50ff9cbad9be.jpg', 0, 6),
(45, '69bc8c32e89e9f10dbbd6cb2476b710c.jpg', 0, 6),
(46, 'edeb7eed1eedd9b3075076d921f2d756.jpg', 0, 6),
(47, '4357ccdfcd651c7176dc04d4c7a85645.jpg', 0, 6),
(48, '9ca997d0f3cc5b1be76baf9be04addd2.jpg', 0, 6),
(49, 'e7bf72675bbb442519e2d558a7a1e40e.jpg', 0, 6),
(50, '11808c9b6044ace5e34b449e351fee75.jpg', 0, 6),
(51, 'ac1e23f2ad0c358cd3f81ced7315e7fb.jpg', 0, 6),
(52, '6d99dabe16b8f11b09af3d1809e18606.jpg', 0, 6),
(53, '1f8a3c2aab0b23e177e01fca1c92c06e.jpg', 0, 6),
(70, 'd7e2ac626f90e2cbd93b5d3f0dc0a528.jpg', 0, 60),
(71, '7b245df1b87ab5cef33a59f47a825486.jpg', 0, 60),
(72, 'fd6bd578c810d76b4df27a854cc0e96a.jpg', 0, 60),
(73, 'f148624a30caf6c8d093319615de0b29.jpg', 0, 60),
(74, 'a3b9f678ec010fb3b11dd1767ecfd3f1.jpg', 0, 60),
(75, '5caaf9c8195736e9243967bf9d3cfa9b.jpg', 0, 60),
(76, 'a0dec3f34eca30eea3cccba170c0b22c.jpg', 0, 60),
(98, 'baea02e11c568b7ee30f7483e5c75f88.jpg', 0, 62),
(99, '515df712fd8259f3a7f133d68c8f73a8.jpg', 0, 62),
(100, '9e61d433fb9ae8b17c2a5404cb57f0e6.jpg', 0, 62),
(103, 'ce72a30fb21a6522fb9fc4efbee8fc8a.jpg', 0, 62),
(104, '40bf7c0d2761579b2a15eb1d8e5d207e.jpg', 0, 62),
(105, '36527bfd21600a8ea24aa90c4fcc03dc.jpg', 0, 7),
(106, '3bea748fbfd50de3f8abecb9c7f6c528.jpg', 0, 7),
(107, 'dd8c568be49e5a99a6f28edc191db6eb.jpg', 0, 7),
(108, '1b73d77903f1292b320dd9c2fcefffb4.jpg', 0, 7),
(109, '1f6b234506143b9776b41eacb3a462e8.jpg', 0, 7),
(110, '666f02d4ddea418aec689f24ffa962d7.jpg', 0, 7),
(111, 'ae262fbe65bc9da3c86cfb5f05160c59.jpg', 0, 7),
(112, '9a351722f22d57b5f90365a32489be66.jpg', 0, 61),
(113, '4913e1e2b3a6a05dc5584cf8010da458.jpg', 0, 61),
(114, '58e382d85037a2890d9f5035894349a1.jpg', 0, 61),
(115, 'f1a6abeb72e676c4e4961220de05ed7a.jpg', 0, 61),
(116, '8f387207cd08b00072bbc9f7eb8da542.jpg', 0, 61),
(117, 'f8ed03ac641d394a65c950e89c75c55a.jpg', 0, 61),
(118, 'a676e58bf2630c2b01eeb99ddcbd70a6.jpg', 0, 61),
(119, '01f6d701adbd435be4fc8e3ae86912ce.jpg', 0, 61),
(120, 'ef528c2fe72483775f14f400474a3257.jpg', 0, 63),
(121, 'ae7b08520def467e83fc945d164d7b83.jpg', 0, 63),
(122, '002e3c02b5952ed5b4301573448a7280.jpg', 0, 63),
(123, '20eba184e32b9df9e12186c1c3e0d03e.jpg', 0, 63),
(124, '8521fc063cd5795a11832735de5665c9.jpg', 0, 63),
(125, '494981894c9b91ea3d16dfdfc1c3ceac.jpg', 0, 63),
(126, 'ffae97f5dc4647a8c1048c4d03159e33.jpg', 0, 63),
(127, '43769ce46233ea58e1be0a3c573a068c.jpg', 0, 63),
(128, 'f86ec03a361e34d16f547583ded3c592.jpg', 0, 64),
(129, 'f86ec03a361e34d16f547583ded3c592.jpg', 0, 64),
(130, '119e29c801ef60f7c5b7d00701c99080.jpg', 0, 64),
(131, '5775f66289ca77ac4e430382d0636bcc.jpg', 0, 64),
(132, '3ea4072988c7a67a686de6a2b87ccb49.jpg', 0, 64),
(133, '19beb981ed4c5d5d94c52410caa23f61.jpg', 0, 64),
(134, '0219ab0a202ccc971b7924c52256fb07.jpg', 0, 64),
(135, 'f754ec2abe32d62bd7ff1da18dddcec1.jpg', 0, 65),
(136, 'abcb2ea4bf6dabdeb0fa327a2d9f138b.jpg', 0, 65),
(137, '9fec242ba8b43d1649bfc603543898bf.jpg', 0, 65),
(138, '84937d46f34c4eff1941910a9d29cbf5.jpg', 0, 65),
(139, '70e7f11f1a10343ec71ea7bbcb689c19.jpg', 0, 65),
(140, 'e1e4d3840e37d4b33a4c843449dd67a4.jpg', 0, 65),
(141, '42a8e29605ff6cb8ec90061c659d5f74.jpg', 0, 65),
(142, 'ebeec2266b5aef7cfa5354c95ebe00c2.jpg', 0, 65),
(143, 'a737444c3b17c98d4cd8210215048968.jpg', 0, 65),
(144, '03ad7aec1e31d895bad1c0f192e32d79.jpg', 0, 66),
(145, 'eb498d8b2968d12e38b17df9612be7f5.jpg', 0, 66),
(146, '3febb699859584f4ca80e1a2ce22e88a.jpg', 0, 66),
(147, 'e69acaf8c4519a18a49d6fde650fe8c6.jpg', 0, 66),
(148, 'b3ccb10eaf86ba16638445997676669a.jpg', 0, 66),
(149, 'aaa95a7f08faa6102d5f014b3a66995c.jpg', 0, 66),
(150, 'af0f57a104579fabd7a004244581a4c6.jpg', 0, 66),
(151, 'b444b529333444dfd3d97b6e3a22c69b.jpg', 0, 66),
(152, 'bb2ad157a90b4b2dc125d91eb5e153ec.jpg', 0, 67),
(153, 'fad7af4fb28ff7a54a2e60416f4a554a.jpg', 0, 67),
(154, 'e877a1907377479d9d6ad9f71db2ddb5.jpg', 0, 67),
(155, '1ee5d4823eb80b2dbcbc9d5326025154.jpg', 0, 67),
(156, 'bd6d32d3de88746ec4489bd577cfabc1.jpg', 0, 67),
(157, '9b937b54773cb5deea5c06cf25a75c9a.jpg', 0, 67),
(158, '6ff81fe459285cd62ab4b915e247299d.jpg', 0, 67),
(159, 'b418859aa1c51071b738eddb77998ffb.jpg', 0, 67),
(160, 'd5542a281c7bb7276e485c1361cff7bc.jpg', 0, 67),
(161, 'd3a293405f31304b517a1f1f95e00f17.jpg', 0, 67),
(162, '9c03b1874bebabc759cbe1aa51806b4c.jpg', 0, 67),
(163, '83d9393b16f6a88ad77ef87409cc960d.jpg', 0, 67),
(164, '8fec0a88ebec0e23a2e934fe41eb72da.jpg', 0, 68),
(165, 'e61da95f3e68262a025229eaac34bb7f.jpg', 0, 68),
(166, '796dfa65a8aebd219702115c996eb8d9.jpg', 0, 68),
(167, '9fa713804bd23fb53b859d9af186cb0e.jpg', 0, 68),
(168, '54a3aed7020c40ec37dd23cdb10563f7.jpg', 0, 68),
(169, 'b9ded90f2ca75f515eb4b1806ea88ed1.jpg', 0, 68),
(170, 'c9d85bfc7696164a5d9790701fcb0fb0.jpg', 0, 68),
(171, '028d3c182d7b864b060c9dd2ef76ada7.jpg', 0, 68),
(172, '8dbc46f70c63cb4ecf63886e87da5b13.jpg', 0, 69),
(173, '46d3a5a155fa339a1aacc211fc665cbd.jpg', 0, 69),
(174, 'd5fd300c7ae6c1e9c5d31af5f188d09c.jpg', 0, 69),
(175, 'c88b5dd4451644c96f25c7612462eaff.jpg', 0, 69),
(176, '45373b04690026ae41708f600549c489.jpg', 0, 69),
(177, 'c3683f9b3883db06156a9a4f4ee16353.jpg', 0, 69),
(178, '4776247002a17ab5f2a55021c7da4ebd.jpg', 0, 69),
(179, 'aa3ce981b83b65d56636dd0140a1df3f.jpg', 0, 69),
(180, 'ae42104a98d7098d4ceac4a0ccae5701.jpg', 0, 69),
(181, '9a0e546953d4ddf44baec0b345a6b0c1.jpg', 0, 69),
(182, '2ef4b6ab3f56eacd05698f62c0e932cd.jpg', 0, 69),
(183, 'a513fade4ed6cf1ed2305757956c00ab.jpg', 0, 69),
(184, 'dbb1e0f7670ae6953bfbf849e93bf916.jpg', 0, 69),
(187, '9463d09bfe7b84684f14924190d51765.jpg', 0, 71),
(188, 'e3b3e9fd84d1d61da9eb6416fe230379.jpg', 0, 71),
(199, '10996db5cbe7e6046231566d7fb0441e.jpg', 0, 72),
(200, '510fc87e5096683569cdf8f269e637d6.jpg', 0, 72),
(204, 'c61ce04a2cdf29fbf6d45f728a53244f.jpg', 0, 72),
(208, '54f4ef45be7e4a48aa7b33848c58a29e.jpg', 0, 70),
(209, '52eb2bf05c65c0e845904983fac48105.jpg', 0, 70);

-- --------------------------------------------------------

--
-- Estrutura da tabela `icones`
--

CREATE TABLE IF NOT EXISTS `icones` (
  `icones_id` int(11) NOT NULL AUTO_INCREMENT,
  `icones_nome` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`icones_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=719 ;

--
-- Extraindo dados da tabela `icones`
--

INSERT INTO `icones` (`icones_id`, `icones_nome`) VALUES
(1, 'fa fa-bed'),
(2, 'fa fa-buysellads'),
(3, 'fa fa-cart-arrow-down'),
(4, 'fa fa-cart-arrow-down'),
(5, 'fa fa-connectdevelop'),
(6, 'fa fa-diamond'),
(7, 'fa fa-facebook-official'),
(8, 'fa fa-forumbee'),
(9, 'fa fa-hotel'),
(10, 'fa fa-leanpub'),
(11, 'fa fa-mars'),
(12, 'fa fa-mars-double'),
(13, 'fa fa-mars-stroke'),
(14, 'fa fa-mars-stroke-h'),
(15, 'fa fa-mars-stroke-v'),
(16, 'fa fa-medium'),
(17, 'fa fa-mercury'),
(18, 'fa fa-motorcycle'),
(19, 'fa fa-neuter'),
(20, 'fa fa-pinterest-p'),
(21, 'fa fa-sellsy'),
(22, 'fa fa-server'),
(23, 'fa fa-ship'),
(24, 'fa fa-shirtsinbulk'),
(25, 'fa fa-simplybuilt'),
(26, 'fa fa-skyatlas'),
(27, 'fa fa-street-view'),
(28, 'fa fa-subway'),
(29, 'fa fa-train'),
(30, 'fa fa-transgender'),
(31, 'fa fa-transgender-alt'),
(32, 'fa fa-user-plus'),
(33, 'fa fa-user-secret'),
(34, 'fa fa-user-times'),
(35, 'fa fa-venus'),
(36, 'fa fa-venus-double'),
(37, 'fa fa-venus-mars'),
(38, 'fa fa-viacoin'),
(39, 'fa fa-whatsapp'),
(40, 'fa fa-adjust'),
(41, 'fa fa-anchor'),
(42, 'fa fa-archive'),
(43, 'fa fa-area-chart'),
(44, 'fa fa-arrows'),
(45, 'fa fa-arrows-h'),
(46, 'fa fa-arrows-v'),
(47, 'fa fa-asterisk'),
(48, 'fa fa-at'),
(49, 'fa fa-automobile'),
(50, 'fa fa-ban'),
(51, 'fa fa-bank'),
(52, 'fa fa-bar-chart'),
(53, 'fa fa-bar-chart-o'),
(54, 'fa fa-barcode'),
(55, 'fa fa-bars'),
(56, 'fa fa-bed'),
(57, 'fa fa-beer'),
(58, 'fa fa-bell'),
(59, 'fa fa-bell-o'),
(60, 'fa fa-bell-slash'),
(61, 'fa fa-bell-slash-o'),
(62, 'fa fa-bicycle'),
(63, 'fa fa-binoculars'),
(64, 'fa fa-birthday-cake'),
(65, 'fa fa-bolt'),
(66, 'fa fa-bomb'),
(67, 'fa fa-book'),
(68, 'fa fa-bookmark'),
(69, 'fa fa-bookmark-o'),
(70, 'fa fa-briefcase'),
(71, 'fa fa-bug'),
(72, 'fa fa-building'),
(73, 'fa fa-building-o'),
(74, 'fa fa-bullhorn'),
(75, 'fa fa-bullseye'),
(76, 'fa fa-bus'),
(77, 'fa fa-cab'),
(78, 'fa fa-calculator'),
(79, 'fa fa-calendar'),
(80, 'fa fa-calendar-o'),
(81, 'fa fa-camera'),
(82, 'fa fa-camera-retro'),
(83, 'fa fa-car'),
(84, 'fa fa-caret-square-o-down'),
(85, 'fa fa-caret-square-o-left'),
(86, 'fa fa-caret-square-o-right'),
(87, 'fa fa-caret-square-o-up'),
(88, 'fa fa-cart-arrow-down'),
(89, 'fa fa-cart-plus'),
(90, 'fa fa-cc'),
(91, 'fa fa-certificate'),
(92, 'fa fa-check'),
(93, 'fa fa-check-circle'),
(94, 'fa fa-check-circle-o'),
(95, 'fa fa-check-square'),
(96, 'fa fa-check-square-o'),
(97, 'fa fa-child'),
(98, 'fa fa-circle'),
(99, 'fa fa-circle-o'),
(100, 'fa fa-circle-o-notch'),
(101, 'fa fa-circle-thin'),
(102, 'fa fa-clock-o'),
(103, 'fa fa-close'),
(104, 'fa fa-cloud'),
(105, 'fa fa-cloud-download'),
(106, 'fa fa-cloud-upload'),
(107, 'fa fa-code'),
(108, 'fa fa-code-fork'),
(109, 'fa fa-coffee'),
(110, 'fa fa-cog'),
(111, 'fa fa-cogs'),
(112, 'fa fa-comment'),
(113, 'fa fa-comment-o'),
(114, 'fa fa-comments'),
(115, 'fa fa-comments-o'),
(116, 'fa fa-compass'),
(117, 'fa fa-copyright'),
(118, 'fa fa-credit-card'),
(119, 'fa fa-crop'),
(120, 'fa fa-crosshairs'),
(121, 'fa fa-cube'),
(122, 'fa fa-cubes'),
(123, 'fa fa-cutlery'),
(124, 'fa fa-dashboard'),
(125, 'fa fa-database'),
(126, 'fa fa-desktop'),
(127, 'fa fa-diamond'),
(128, 'fa fa-dot-circle-o'),
(129, 'fa fa-download'),
(130, 'fa fa-edit'),
(131, 'fa fa-ellipsis-h'),
(132, 'fa fa-ellipsis-v'),
(133, 'fa fa-envelope'),
(134, 'fa fa-envelope-o'),
(135, 'fa fa-envelope-square'),
(136, 'fa fa-eraser'),
(137, 'fa fa-exchange'),
(138, 'fa fa-exclamation'),
(139, 'fa fa-exclamation-circle'),
(140, 'fa fa-exclamation-triangle'),
(141, 'fa fa-external-link'),
(142, 'fa fa-external-link-square'),
(143, 'fa fa-eye'),
(144, 'fa fa-eye-slash'),
(145, 'fa fa-eyedropper'),
(146, 'fa fa-fax'),
(147, 'fa fa-female'),
(148, 'fa fa-fighter-jet'),
(149, 'fa fa-file-archive-o'),
(150, 'fa fa-file-audio-o'),
(151, 'fa fa-file-code-o'),
(152, 'fa fa-file-excel-o'),
(153, 'fa fa-file-image-o'),
(154, 'fa fa-file-movie-o'),
(155, 'fa fa-file-pdf-o'),
(156, 'fa fa-file-photo-o'),
(157, 'fa fa-file-picture-o'),
(158, 'fa fa-file-powerpoint-o'),
(159, 'fa fa-file-sound-o'),
(160, 'fa fa-file-video-o'),
(161, 'fa fa-file-word-o'),
(162, 'fa fa-file-zip-o'),
(163, 'fa fa-film'),
(164, 'fa fa-filter'),
(165, 'fa fa-fire'),
(166, 'fa fa-fire-extinguisher'),
(167, 'fa fa-flag'),
(168, 'fa fa-flag-checkered'),
(169, 'fa fa-flag-o'),
(170, 'fa fa-flash'),
(171, 'fa fa-flask'),
(172, 'fa fa-folder'),
(173, 'fa fa-folder-o'),
(174, 'fa fa-folder-open'),
(175, 'fa fa-folder-open-o'),
(176, 'fa fa-frown-o'),
(177, 'fa fa-futbol-o'),
(178, 'fa fa-gamepad'),
(179, 'fa fa-gavel'),
(180, 'fa fa-gear'),
(181, 'fa fa-gears'),
(182, 'fa fa-genderless'),
(183, 'fa fa-gift'),
(184, 'fa fa-glass'),
(185, 'fa fa-globe'),
(186, 'fa fa-graduation-cap'),
(187, 'fa fa-group'),
(188, 'fa fa-hdd-o'),
(189, 'fa fa-headphones'),
(190, 'fa fa-heart'),
(191, 'fa fa-heart-o'),
(192, 'fa fa-heartbeat'),
(193, 'fa fa-history'),
(194, 'fa fa-home'),
(195, 'fa fa-hotel'),
(196, 'fa fa-image'),
(197, 'fa fa-inbox'),
(198, 'fa fa-info'),
(199, 'fa fa-info-circle'),
(200, 'fa fa-institution'),
(201, 'fa fa-key'),
(202, 'fa fa-keyboard-o'),
(203, 'fa fa-language'),
(204, 'fa fa-laptop'),
(205, 'fa fa-leaf'),
(206, 'fa fa-legal'),
(207, 'fa fa-lemon-o'),
(208, 'fa fa-level-down'),
(209, 'fa fa-level-up'),
(210, 'fa fa-life-bouy'),
(211, 'fa fa-life-buoy'),
(212, 'fa fa-life-ring'),
(213, 'fa fa-life-saver'),
(214, 'fa fa-lightbulb-o'),
(215, 'fa fa-line-chart'),
(216, 'fa fa-location-arrow'),
(217, 'fa fa-lock'),
(218, 'fa fa-magic'),
(219, 'fa fa-magnet'),
(220, 'fa fa-mail-forward'),
(221, 'fa fa-mail-reply'),
(222, 'fa fa-mail-reply-all'),
(223, 'fa fa-male'),
(224, 'fa fa-map-marker'),
(225, 'fa fa-meh-o'),
(226, 'fa fa-microphone'),
(227, 'fa fa-microphone-slash'),
(228, 'fa fa-minus'),
(229, 'fa fa-minus-circle'),
(230, 'fa fa-minus-square'),
(231, 'fa fa-minus-square-o'),
(232, 'fa fa-mobile'),
(233, 'fa fa-mobile-phone'),
(234, 'fa fa-money'),
(235, 'fa fa-moon-o'),
(236, 'fa fa-mortar-board'),
(237, 'fa fa-motorcycle'),
(238, 'fa fa-music'),
(239, 'fa fa-navicon'),
(240, 'fa fa-newspaper-o'),
(241, 'fa fa-paint-brush'),
(242, 'fa fa-paper-plane'),
(243, 'fa fa-paper-plane-o'),
(244, 'fa fa-paw'),
(245, 'fa fa-pencil'),
(246, 'fa fa-pencil-square'),
(247, 'fa fa-pencil-square-o'),
(248, 'fa fa-phone'),
(249, 'fa fa-phone-square'),
(250, 'fa fa-photo'),
(251, 'fa fa-picture-o'),
(252, 'fa fa-pie-chart'),
(253, 'fa fa-plane'),
(254, 'fa fa-plug'),
(255, 'fa fa-plus'),
(256, 'fa fa-plus-circle'),
(257, 'fa fa-plus-square'),
(258, 'fa fa-plus-square-o'),
(259, 'fa fa-power-off'),
(260, 'fa fa-print'),
(261, 'fa fa-puzzle-piece'),
(262, 'fa fa-qrcode'),
(263, 'fa fa-question'),
(264, 'fa fa-question-circle'),
(265, 'fa fa-quote-left'),
(266, 'fa fa-quote-right'),
(267, 'fa fa-random'),
(268, 'fa fa-recycle'),
(269, 'fa fa-refresh'),
(270, 'fa fa-remove'),
(271, 'fa fa-reorder'),
(272, 'fa fa-reply'),
(273, 'fa fa-reply-all'),
(274, 'fa fa-retweet'),
(275, 'fa fa-road'),
(276, 'fa fa-rocket'),
(277, 'fa fa-rss'),
(278, 'fa fa-rss-square'),
(279, 'fa fa-search'),
(280, 'fa fa-search-minus'),
(281, 'fa fa-search-plus'),
(282, 'fa fa-send'),
(283, 'fa fa-send-o'),
(284, 'fa fa-server'),
(285, 'fa fa-share'),
(286, 'fa fa-share-alt'),
(287, 'fa fa-share-alt-square'),
(288, 'fa fa-share-square'),
(289, 'fa fa-share-square-o'),
(290, 'fa fa-shield'),
(291, 'fa fa-ship'),
(292, 'fa fa-shopping-cart'),
(293, 'fa fa-sign-in'),
(294, 'fa fa-sign-out'),
(295, 'fa fa-signal'),
(296, 'fa fa-sitemap'),
(297, 'fa fa-sliders'),
(298, 'fa fa-smile-o'),
(299, 'fa fa-soccer-ball-o'),
(300, 'fa fa-sort'),
(301, 'fa fa-sort-alpha-asc'),
(302, 'fa fa-sort-alpha-desc'),
(303, 'fa fa-sort-amount-asc'),
(304, 'fa fa-sort-amount-desc'),
(305, 'fa fa-sort-asc'),
(306, 'fa fa-sort-desc'),
(307, 'fa fa-sort-down'),
(308, 'fa fa-sort-numeric-asc'),
(309, 'fa fa-sort-numeric-desc'),
(310, 'fa fa-sort-up'),
(311, 'fa fa-space-shuttle'),
(312, 'fa fa-spinner'),
(313, 'fa fa-spoon'),
(314, 'fa fa-square'),
(315, 'fa fa-square-o'),
(316, 'fa fa-star'),
(317, 'fa fa-star-half'),
(318, 'fa fa-star-half-empty'),
(319, 'fa fa-star-half-full'),
(320, 'fa fa-star-half-o'),
(321, 'fa fa-star-o'),
(322, 'fa fa-street-view'),
(323, 'fa fa-suitcase'),
(324, 'fa fa-sun-o'),
(325, 'fa fa-support'),
(326, 'fa fa-tablet'),
(327, 'fa fa-tachometer'),
(328, 'fa fa-tag'),
(329, 'fa fa-tags'),
(330, 'fa fa-tasks'),
(331, 'fa fa-taxi'),
(332, 'fa fa-terminal'),
(333, 'fa fa-thumb-tack'),
(334, 'fa fa-thumbs-down'),
(335, 'fa fa-thumbs-o-down'),
(336, 'fa fa-thumbs-o-up'),
(337, 'fa fa-thumbs-up'),
(338, 'fa fa-ticket'),
(339, 'fa fa-times'),
(340, 'fa fa-times-circle'),
(341, 'fa fa-times-circle-o'),
(342, 'fa fa-tint'),
(343, 'fa fa-toggle-down'),
(344, 'fa fa-toggle-left'),
(345, 'fa fa-toggle-off'),
(346, 'fa fa-toggle-on'),
(347, 'fa fa-toggle-right'),
(348, 'fa fa-toggle-up'),
(349, 'fa fa-trash'),
(350, 'fa fa-trash-o'),
(351, 'fa fa-tree'),
(352, 'fa fa-trophy'),
(353, 'fa fa-truck'),
(354, 'fa fa-tty'),
(355, 'fa fa-umbrella'),
(356, 'fa fa-university'),
(357, 'fa fa-unlock'),
(358, 'fa fa-unlock-alt'),
(359, 'fa fa-unsorted'),
(360, 'fa fa-upload'),
(361, 'fa fa-user'),
(362, 'fa fa-user-plus'),
(363, 'fa fa-user-secret'),
(364, 'fa fa-user-times'),
(365, 'fa fa-users'),
(366, 'fa fa-video-camera'),
(367, 'fa fa-volume-down'),
(368, 'fa fa-volume-off'),
(369, 'fa fa-volume-up'),
(370, 'fa fa-warning'),
(371, 'fa fa-wheelchair'),
(372, 'fa fa-wifi'),
(373, 'fa fa-wrench'),
(374, 'fa fa-ambulance'),
(375, 'fa fa-automobile'),
(376, 'fa fa-bicycle'),
(377, 'fa fa-bus'),
(378, 'fa fa-cab'),
(379, 'fa fa-car'),
(380, 'fa fa-fighter-jet'),
(381, 'fa fa-motorcycle'),
(382, 'fa fa-plane'),
(383, 'fa fa-rocket'),
(384, 'fa fa-ship'),
(385, 'fa fa-space-shuttle'),
(386, 'fa fa-subway'),
(387, 'fa fa-taxi'),
(388, 'fa fa-train'),
(389, 'fa fa-truck'),
(390, 'fa fa-wheelchair'),
(391, 'fa fa-circle-thin'),
(392, 'fa fa-genderless'),
(393, 'fa fa-mars'),
(394, 'fa fa-mars-double'),
(395, 'fa fa-mars-stroke'),
(396, 'fa fa-mars-stroke-h'),
(397, 'fa fa-mars-stroke-v'),
(398, 'fa fa-mercury'),
(399, 'fa fa-neuter'),
(400, 'fa fa-transgender'),
(401, 'fa fa-transgender-alt'),
(402, 'fa fa-venus'),
(403, 'fa fa-venus-double'),
(404, 'fa fa-venus-mars'),
(405, 'fa fa-file'),
(406, 'fa fa-file-archive-o'),
(407, 'fa fa-file-audio-o'),
(408, 'fa fa-file-code-o'),
(409, 'fa fa-file-excel-o'),
(410, 'fa fa-file-image-o'),
(411, 'fa fa-file-movie-o'),
(412, 'fa fa-file-o'),
(413, 'fa fa-file-pdf-o'),
(414, 'fa fa-file-photo-o'),
(415, 'fa fa-file-picture-o'),
(416, 'fa fa-file-powerpoint-o'),
(417, 'fa fa-file-sound-o'),
(418, 'fa fa-file-text'),
(419, 'fa fa-file-text-o'),
(420, 'fa fa-file-video-o'),
(421, 'fa fa-file-word-o'),
(422, 'fa fa-file-zip-o'),
(423, 'fa fa-cog fa-spin'),
(424, 'fa fa-gear fa-spin'),
(425, 'fa fa-refresh fa-spin'),
(426, 'fa fa-spinner fa-spin'),
(427, 'fa fa-check-square'),
(428, 'fa fa-check-square-o'),
(429, 'fa fa-circle'),
(430, 'fa fa-circle-o'),
(431, 'fa fafa fa-dot-circle-o'),
(432, 'fa fa-minus-square'),
(433, 'fa fa-minus-square-o'),
(434, 'fa fa-plus-square'),
(435, 'fa fa-plus-square-o'),
(436, 'fa fa-square'),
(437, 'fa fa-square-o'),
(438, 'fa fa-cc-amex'),
(439, 'fa fa-cc-discover'),
(440, 'fa fa-cc-mastercard'),
(441, 'fa fa-cc-paypal'),
(442, 'fa fa-cc-stripe'),
(443, 'fa fa-cc-visa'),
(444, 'fa fa-credit-card'),
(445, 'fa fa-google-wallet'),
(446, 'fa fa-paypal'),
(447, 'fa fa-area-chart'),
(448, 'fa fa-bar-chart'),
(449, 'fa fa-bar-chart-o'),
(450, 'fa fa-line-chart'),
(451, 'fa fa-pie-chart'),
(452, 'fa fa-bitcoin'),
(453, 'fa fa-btc'),
(454, 'fa fa-cny'),
(455, 'fa fa-dollar'),
(456, 'fa fa-eur'),
(457, 'fa fa-euro'),
(458, 'fa fa-gbp'),
(459, 'fa fa-ils'),
(460, 'fa fa-inr'),
(461, 'fa fa-jpy'),
(462, 'fa fa-krw'),
(463, 'fa fa-money'),
(464, 'fa fa-rmb'),
(465, 'fa fa-rouble'),
(466, 'fa fa-rub'),
(467, 'fa fa-ruble'),
(468, 'fa fa-rupee'),
(469, 'fa fa-shekel'),
(470, 'fa fa-sheqel'),
(471, 'fa fa-try'),
(472, 'fa fa-turkish-lira'),
(473, 'fa fa-usd'),
(474, 'fa fa-won'),
(475, 'fa fa-yen'),
(476, 'fa fa-align-center'),
(477, 'fa fa-align-justify'),
(478, 'fa fa-align-left'),
(479, 'fa fa-align-right'),
(480, 'fa fa-bold'),
(481, 'fa fa-chain'),
(482, 'fa fa-chain-broken'),
(483, 'fa fa-clipboard'),
(484, 'fa fa-columns'),
(485, 'fa fa-copy'),
(486, 'fa fa-cut'),
(487, 'fa fa-dedent'),
(488, 'fa fa-eraser'),
(489, 'fa fa-file'),
(490, 'fa fa-file-o'),
(491, 'fa fa-file-text'),
(492, 'fa fa-file-text-o'),
(493, 'fa fa-files-o'),
(494, 'fa fa-floppy-o'),
(495, 'fa fa-font'),
(496, 'fa fa-header'),
(497, 'fa fa-indent'),
(498, 'fa fa-italic'),
(499, 'fa fa-link'),
(500, 'fa fa-list'),
(501, 'fa fa-list-alt'),
(502, 'fa fa-list-ol'),
(503, 'fa fa-list-ul'),
(504, 'fa fa-outdent'),
(505, 'fa fa-paperclip'),
(506, 'fa fa-paragraph'),
(507, 'fa fa-paste'),
(508, 'fa fa-repeat'),
(509, 'fa fa-rotate-left'),
(510, 'fa fa-rotate-right'),
(511, 'fa fa-save'),
(512, 'fa fa-scissors'),
(513, 'fa fa-strikethrough'),
(514, 'fa fa-subscript'),
(515, 'fa fa-superscript'),
(516, 'fa fa-table'),
(517, 'fa fa-text-height'),
(518, 'fa fa-text-width'),
(519, 'fa fa-th'),
(520, 'fa fa-th-large'),
(521, 'fa fa-th-list'),
(522, 'fa fa-underline'),
(523, 'fa fa-undo'),
(524, 'fa fa-unlink'),
(525, 'fa fa-angle-double-down'),
(526, 'fa fa-angle-double-left'),
(527, 'fa fa-angle-double-right'),
(528, 'fa fa-angle-double-up'),
(529, 'fa fa-angle-down'),
(530, 'fa fa-angle-left'),
(531, 'fa fa-angle-right'),
(532, 'fa fa-angle-up'),
(533, 'fa fa-arrow-circle-down'),
(534, 'fa fa-arrow-circle-left'),
(535, 'fa fa-arrow-circle-o-down'),
(536, 'fa fa-arrow-circle-o-left'),
(537, 'fa fa-arrow-circle-o-right'),
(538, 'fa fa-arrow-circle-o-up'),
(539, 'fa fa-arrow-circle-right'),
(540, 'fa fa-arrow-circle-up'),
(541, 'fa fa-arrow-down'),
(542, 'fa fa-arrow-left'),
(543, 'fa fa-arrow-right'),
(544, 'fa fa-arrow-up'),
(545, 'fa fa-arrows'),
(546, 'fa fa-arrows-alt'),
(547, 'fa fa-arrows-h'),
(548, 'fa fa-arrows-v'),
(549, 'fa fa-caret-down'),
(550, 'fa fa-caret-left'),
(551, 'fa fa-caret-right'),
(552, 'fa fa-caret-square-o-down'),
(553, 'fa fa-caret-square-o-left'),
(554, 'fa fa-caret-square-o-right'),
(555, 'fa fa-caret-square-o-up'),
(556, 'fa fa-caret-up'),
(557, 'fa fa-chevron-circle-down'),
(558, 'fa fa-chevron-circle-left'),
(559, 'fa fa-chevron-circle-right'),
(560, 'fa fa-chevron-circle-up'),
(561, 'fa fa-chevron-down'),
(562, 'fa fa-chevron-left'),
(563, 'fa fa-chevron-right'),
(564, 'fa fa-chevron-up'),
(565, 'fa fa-hand-o-down'),
(566, 'fa fa-hand-o-left'),
(567, 'fa fa-hand-o-right'),
(568, 'fa fa-hand-o-up'),
(569, 'fa fa-long-arrow-down'),
(570, 'fa fa-long-arrow-left'),
(571, 'fa fa-long-arrow-right'),
(572, 'fa fa-long-arrow-up'),
(573, 'fa fa-toggle-down'),
(574, 'fa fa-toggle-left'),
(575, 'fa fa-toggle-right'),
(576, 'fa fa-toggle-up'),
(577, 'fa fa-arrows-alt'),
(578, 'fa fa-backward'),
(579, 'fa fa-compress'),
(580, 'fa fa-eject'),
(581, 'fa fa-expand'),
(582, 'fa fa-fast-backward'),
(583, 'fa fa-fast-forward'),
(584, 'fa fa-forward'),
(585, 'fa fa-pause'),
(586, 'fa fa-play'),
(587, 'fa fa-play-circle'),
(588, 'fa fa-play-circle-o'),
(589, 'fa fa-step-backward'),
(590, 'fa fa-step-forward'),
(591, 'fa fa-stop'),
(592, 'fa fa-youtube-play'),
(593, 'fa fa-adn'),
(594, 'fa fa-android'),
(595, 'fa fa-angellist'),
(596, 'fa fa-apple'),
(597, 'fa fa-behance'),
(598, 'fa fa-behance-square'),
(599, 'fa fa-bitbucket'),
(600, 'fa fa-bitbucket-square'),
(601, 'fa fa-bitcoin'),
(602, 'fa fa-btc'),
(603, 'fa fa-buysellads'),
(604, 'fa fa-cc-amex'),
(605, 'fa fa-cc-discover'),
(606, 'fa fa-cc-mastercard'),
(607, 'fa fa-cc-paypal'),
(608, 'fa fa-cc-stripe'),
(609, 'fa fa-cc-visa'),
(610, 'fa fa-codepen'),
(611, 'fa fa-connectdevelop'),
(612, 'fa fa-css3'),
(613, 'fa fa-dashcube'),
(614, 'fa fa-delicious'),
(615, 'fa fa-deviantart'),
(616, 'fa fa-digg'),
(617, 'fa fa-dribbble'),
(618, 'fa fa-dropbox'),
(619, 'fa fa-drupal'),
(620, 'fa fa-empire'),
(621, 'fa fa-facebook'),
(622, 'fa fa-facebook-f'),
(623, 'fa fa-facebook-square'),
(624, 'fa fa-flickr'),
(625, 'fa fa-forumbee'),
(626, 'fa fa-foursquare'),
(627, 'fa fa-ge'),
(628, 'fa fa-git'),
(629, 'fa fa-git-square'),
(630, 'fa fa-github'),
(631, 'fa fa-github-alt'),
(632, 'fa fa-github-square'),
(633, 'fa fa-gittip'),
(634, 'fa fa-google'),
(635, 'fa fa-google-plus'),
(636, 'fa fa-google-plus-square'),
(637, 'fa fa-google-wallet'),
(638, 'fa fa-gratipay'),
(639, 'fa fa-hacker-news'),
(640, 'fa fa-html5'),
(641, 'fa fa-instagram'),
(642, 'fa fa-ioxhost'),
(643, 'fa fa-joomla'),
(644, 'fa fa-jsfiddle'),
(645, 'fa fa-lastfm'),
(646, 'fa fa-lastfm-square'),
(647, 'fa fa-leanpub'),
(648, 'fa fa-linkedin'),
(649, 'fa fa-linkedin-square'),
(650, 'fa fa-linux'),
(651, 'fa fa-maxcdn'),
(652, 'fa fa-meanpath'),
(653, 'fa fa-medium'),
(654, 'fa fa-openid'),
(655, 'fa fa-pagelines'),
(656, 'fa fa-paypal'),
(657, 'fa fa-pied-piper'),
(658, 'fa fa-pied-piper-alt'),
(659, 'fa fa-pinterest'),
(660, 'fa fa-pinterest-p'),
(661, 'fa fa-pinterest-square'),
(662, 'fa fa-qq'),
(663, 'fa fa-ra'),
(664, 'fa fa-rebel'),
(665, 'fa fa-reddit'),
(666, 'fa fa-reddit-square'),
(667, 'fa fa-renren'),
(668, 'fa fa-sellsy'),
(669, 'fa fa-share-alt'),
(670, 'fa fa-share-alt-square'),
(671, 'fa fa-shirtsinbulk'),
(672, 'fa fa-simplybuilt'),
(673, 'fa fa-skyatlas'),
(674, 'fa fa-skype'),
(675, 'fa fa-slack'),
(676, 'fa fa-slideshare'),
(677, 'fa fa-soundcloud'),
(678, 'fa fa-spotify'),
(679, 'fa fa-stack-exchange'),
(680, 'fa fa-stack-overflow'),
(681, 'fa fa-steam'),
(682, 'fa fa-steam-square'),
(683, 'fa fa-stumbleupon'),
(684, 'fa fa-stumbleupon-circle'),
(685, 'fa fa-tencent-weibo'),
(686, 'fa fa-trello'),
(687, 'fa fa-tumblr'),
(688, 'fa fa-tumblr-square'),
(689, 'fa fa-twitch'),
(690, 'fa fa-twitter'),
(691, 'fa fa-twitter-square'),
(692, 'fa fa-viacoin'),
(693, 'fa fa-vimeo-square'),
(694, 'fa fa-vine'),
(695, 'fa fa-vk'),
(696, 'fa fa-wechat'),
(697, 'fa fa-weibo'),
(698, 'fa fa-weixin'),
(699, 'fa fa-whatsapp'),
(700, 'fa fa-windows'),
(701, 'fa fa-wordpress'),
(702, 'fa fa-xing'),
(703, 'fa fa-xing-square'),
(704, 'fa fa-yahoo'),
(705, 'fa fa-yelp'),
(706, 'fa fa-youtube'),
(707, 'fa fa-youtube-square'),
(708, 'fa fa-ambulance'),
(709, 'fa fa-h-square'),
(710, 'fa fa-heart'),
(711, 'fa fa-heart-o'),
(712, 'fa fa-heartbeat'),
(713, 'fa fa-hospital-o'),
(714, 'fa fa-medkit'),
(715, 'fa fa-plus-square'),
(716, 'fa fa-stethoscope'),
(717, 'fa fa-user-md'),
(718, 'fa fa-wheelchair');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo1`
--

CREATE TABLE IF NOT EXISTS `modulo1` (
  `modulo1_id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo1_nome` varchar(200) DEFAULT NULL,
  `modulo1_subtitulo1` text,
  `modulo1_status` int(11) DEFAULT '0',
  PRIMARY KEY (`modulo1_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `modulo1`
--

INSERT INTO `modulo1` (`modulo1_id`, `modulo1_nome`, `modulo1_subtitulo1`, `modulo1_status`) VALUES
(1, 'Seja bem-vindo a COLETIVA AMBIENTAL - Trabalhando para salvar o nosso planeta', 'Coleta de óleo segura e prática', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo2`
--

CREATE TABLE IF NOT EXISTS `modulo2` (
  `modulo2_id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo2_nome` text NOT NULL,
  `modulo2_nome1` text NOT NULL,
  `modulo2_nome2` varchar(200) DEFAULT NULL,
  `modulo2_nome3` varchar(200) DEFAULT NULL,
  `modulo2_nome4` varchar(200) DEFAULT NULL,
  `modulo2_nome5` varchar(200) DEFAULT NULL,
  `modulo2_nome6` varchar(200) DEFAULT NULL,
  `modulo2_nome7` varchar(200) DEFAULT NULL,
  `modulo2_nome8` varchar(200) DEFAULT NULL,
  `modulo2_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`modulo2_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `modulo2`
--

INSERT INTO `modulo2` (`modulo2_id`, `modulo2_nome`, `modulo2_nome1`, `modulo2_nome2`, `modulo2_nome3`, `modulo2_nome4`, `modulo2_nome5`, `modulo2_nome6`, `modulo2_nome7`, `modulo2_nome8`, `modulo2_status`) VALUES
(1, 'Home', 'Sobre NÃ³s', 'PortfÃ³lio', 'Blog', 'Contato', 'Blog', 'Valores', 'Blog', 'Contato', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo3`
--

CREATE TABLE IF NOT EXISTS `modulo3` (
  `modulo3_id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo3_nome` text,
  `modulo3_descricao` longtext,
  `modulo3_status` int(11) DEFAULT '0',
  `modulo3_imagem` varchar(200) DEFAULT '1',
  PRIMARY KEY (`modulo3_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `modulo3`
--

INSERT INTO `modulo3` (`modulo3_id`, `modulo3_nome`, `modulo3_descricao`, `modulo3_status`, `modulo3_imagem`) VALUES
(1, 'Nossa Empresa', '<p class="mb30" style="margin-bottom: 3em; color: rgb(119, 119, 119); font-family: ''PT Sans'', sans-serif; line-height: 22px; background-color: rgb(254, 254, 254);">Eu velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent et dolor ac erat tempor auctor a in odio. Quisque sollicitudin elementum tristique. Phasellus ultrices tincidunt nulla ut fringilla. Nam interdum enim a mauris accumsan congue. Vivamus vitae leo lacus. Etiam mattis neque mollis eros hendrerit et dictum lacus feugiat. Aliquam sit amet sem erat. In lobortis erat non ipsum rutrum molestie.</p><p style="margin-bottom: 12px; color: rgb(119, 119, 119); font-family: ''PT Sans'', sans-serif; line-height: 22px; background-color: rgb(254, 254, 254);">Curabitur turpis orci, gravida non ornare id, venenatis nec enim. Praesent posuere condimentum leo eget volutpat. Maecenas in ligula in lacus aliquam ultricies scelerisque vitae nisl. Pellentesque quam dui, cursus in mollis sed, pretium quis dui. Proin ac nibh et leo malesuada congue. Phasellus adipiscing lectus quis nisl bibendum nec hendrerit elit lacinia. Pellentesque mauris enim, varius scelerisque suscipit at, volutpat at dui. Ut aliquam lectus nunc. Sed non neque id lectus auctor facilisis id quis felis. Vivamus quis lectus erat. Donec sit amet nibh eget felis feugiat pulvinar. Integer in consectetur nibh.</p><hr style="color: rgb(119, 119, 119); font-family: ''PT Sans'', sans-serif; line-height: 22px; background-color: rgb(254, 254, 254);"><h3 style="font-family: ''PT Sans'', sans-serif; line-height: 1.25em; color: rgb(51, 51, 51); margin: 0px 0px 1em; font-size: 19px; background-color: rgb(254, 254, 254);">Pellentesque libero est, sagittis eget vestibulum ut</h3><p style="margin-bottom: 12px; color: rgb(119, 119, 119); font-family: ''PT Sans'', sans-serif; line-height: 22px; background-color: rgb(254, 254, 254);">facilisis porttitor nisl. Nulla scelerisque lectus id ipsum sollicitudin euismod. Mauris fermentum erat a ante tincidunt id condimentum lorem sodales. Nam lacus justo, porttitor sit amet egestas sit amet, scelerisque non nibh. Ut ultricies orci vitae nisl viverra quis tempus nulla ultricies. Etiam lorem tellus, porttitor nec fermentum sed, scelerisque eget sapien. Fusce quam turpis, bibendum eu pretium ut, vehicula eget mi. Aliquam erat volutpat.</p><h3 style="font-family: ''PT Sans'', sans-serif; line-height: 1.25em; color: rgb(51, 51, 51); margin: 0px 0px 1em; font-size: 19px; background-color: rgb(254, 254, 254);">Lorem ipsum dolor</h3><p style="margin-bottom: 12px; color: rgb(119, 119, 119); font-family: ''PT Sans'', sans-serif; line-height: 22px; background-color: rgb(254, 254, 254);">mauris in facilisis venenatis, sapien purus fringilla risus, eu vestibulum lacus dolor et ante. Praesent semper quam ac sem adipiscing rhoncus. Integer pellentesque, augue ut feugiat laoreet, eros nulla vulputate quam, in tristique dolor odio non neque. Nullam convallis dapibus dolor, quis imperdiet mi fringilla quis. Donec lorem libero, pretium accumsan condimentum ut, dignissim vel augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu scelerisque sem.</p><h4 style="font-family: ''PT Sans'', sans-serif; line-height: 1.25em; color: rgb(51, 51, 51); margin: 0px 0px 1em; background-color: rgb(254, 254, 254);">Integer viverra purus eu lacus ultrices</h4><p style="margin-bottom: 12px; color: rgb(119, 119, 119); font-family: ''PT Sans'', sans-serif; line-height: 22px; background-color: rgb(254, 254, 254);">ac volutpat metus blandit. Phasellus a sollicitudin elit. Nullam a urna nulla, aliquet adipiscing tellus. Vestibulum sit amet lectus sit amet risus molestie rutrum. Vivamus purus metus, blandit sed aliquam eu, auctor bibendum risus. In hac habitasse platea dictumst.</p><p style="margin-bottom: 12px; color: rgb(119, 119, 119); font-family: ''PT Sans'', sans-serif; line-height: 22px; background-color: rgb(254, 254, 254);">Fusce ut condimentum dui. Vivamus diam diam, vestibulum et dictum id, faucibus non massa. Nullam elit eros, feugiat quis feugiat pharetra, viverra eu eros. Ut ac risus diam, at volutpat leo. Fusce facilisis sodales mauris at laoreet. Etiam molestie rhoncus rutrum. Aenean pulvinar sodales nisi, sed tristique eros pretium in. Sed eget libero lectus, ac hendrerit dolor. Donec congue libero quis magna euismod quis tempus nibh adipiscing. Mauris condimentum turpis eu ipsum varius posuere. Nunc non libero orci, eu lobortis lorem.</p>', 1, '1432305908.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo4`
--

CREATE TABLE IF NOT EXISTS `modulo4` (
  `modulo4_id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo4_descricao` text,
  `modulo4_imagem` varchar(200) NOT NULL,
  `modulo4_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`modulo4_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `modulo4`
--

INSERT INTO `modulo4` (`modulo4_id`, `modulo4_descricao`, `modulo4_imagem`, `modulo4_status`) VALUES
(1, 'A tomada de decisÃ£o informada vem de uma longa tradiÃ§Ã£o <br>\r\nde adivinhaÃ§Ã£o e, em seguida, culpar os outros por resultados inadequados.', 'parallax-3.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo5`
--

CREATE TABLE IF NOT EXISTS `modulo5` (
  `modulo5_id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo5_nome` varchar(200) DEFAULT NULL,
  `modulo5_descricao` text,
  `modulo5_status` int(11) DEFAULT NULL,
  `modulo5_imagem` varchar(200) DEFAULT NULL,
  `modulo5_limite` int(11) DEFAULT NULL,
  PRIMARY KEY (`modulo5_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `modulo5`
--

INSERT INTO `modulo5` (`modulo5_id`, `modulo5_nome`, `modulo5_descricao`, `modulo5_status`, `modulo5_imagem`, `modulo5_limite`) VALUES
(1, '<span class="condiment"> Depoimentos</span>', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and by the <span class="dark bold">charms</span> of pleasure of the moment, so blinded by desire, that they cannot foresee the pain ', 1, 'i3.jpg', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo6`
--

CREATE TABLE IF NOT EXISTS `modulo6` (
  `modulo6_id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo6_nome` varchar(200) DEFAULT NULL,
  `modulo6_descricao` text NOT NULL,
  `modulo6_nome1` text NOT NULL,
  `modulo6_descricao1` text NOT NULL,
  `modulo6_imagem` varchar(200) DEFAULT NULL,
  `modulo6_status` int(11) DEFAULT '0',
  PRIMARY KEY (`modulo6_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `modulo6`
--

INSERT INTO `modulo6` (`modulo6_id`, `modulo6_nome`, `modulo6_descricao`, `modulo6_nome1`, `modulo6_descricao1`, `modulo6_imagem`, `modulo6_status`) VALUES
(1, 'serviÃ§os', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain  teste', '<span class="condiment">Porque escolher  Oxygen ?</span>', '                            <ul>   \r\n  <li class="h-item uppercase ">100% Responsive Design</li>\r\n                                <li class="h-item uppercase ">html5 & css3</li>\r\n                                <li class="h-item uppercase ">Clean coding</li>\r\n                                <li class="h-item uppercase ">Easy customizable</li>\r\n                                <li class="h-item uppercase ">Retina ready </li>\r\n                                <li class="h-item uppercase ">7X24 support</li>\r\n</ul>      ', 'i1.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo7`
--

CREATE TABLE IF NOT EXISTS `modulo7` (
  `modulo7_id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo7_nome` varchar(200) DEFAULT NULL,
  `modulo7_descricao` text,
  `modulo7_status` int(11) DEFAULT '0',
  PRIMARY KEY (`modulo7_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `modulo7`
--

INSERT INTO `modulo7` (`modulo7_id`, `modulo7_nome`, `modulo7_descricao`, `modulo7_status`) VALUES
(1, ' PortfÃ³lio', 'ConheÃ§a alguns de nossos trabalhos e saiba como  podemos ajudar sua empresa ou negÃ³cio!', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo8`
--

CREATE TABLE IF NOT EXISTS `modulo8` (
  `modulo8_id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo8_nome` varchar(200) DEFAULT NULL,
  `modulo8_descricao` text,
  `modulo8_status` int(11) DEFAULT '0',
  PRIMARY KEY (`modulo8_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `modulo8`
--

INSERT INTO `modulo8` (`modulo8_id`, `modulo8_nome`, `modulo8_descricao`, `modulo8_status`) VALUES
(1, 'Equipe Criativa', 'NÃ³s somos especialistas em web e diversÃ£o. Em nossas mÃ£os o seu projeto irÃ¡ decolar rapidamente! ', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo9`
--

CREATE TABLE IF NOT EXISTS `modulo9` (
  `modulo9_id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo9_nome` varchar(200) DEFAULT NULL,
  `modulo9_subtitulo` text,
  `modulo9_button` varchar(200) DEFAULT NULL,
  `modulo9_imagem` varchar(200) NOT NULL,
  `modulo9_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`modulo9_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `modulo9`
--

INSERT INTO `modulo9` (`modulo9_id`, `modulo9_nome`, `modulo9_subtitulo`, `modulo9_button`, `modulo9_imagem`, `modulo9_status`) VALUES
(1, 'Entre em <span class="extrabold">Contato</span>', 'Escreva para nÃ³s, vamos trocar algums ideias. Fique por perto!', 'Enviar Mensagem', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo10`
--

CREATE TABLE IF NOT EXISTS `modulo10` (
  `modulo10_id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo10_nome` varchar(200) DEFAULT NULL,
  `modulo10_subtitulo` varchar(200) DEFAULT NULL,
  `modulo10_icon` varchar(200) DEFAULT NULL,
  `modulo10_button` varchar(200) DEFAULT NULL,
  `modulo10_button1` varchar(200) DEFAULT NULL,
  `modulo10_status` varchar(200) DEFAULT NULL,
  `modulo10_imagem` varchar(200) DEFAULT NULL,
  `modulo10_paginacao` int(11) DEFAULT NULL,
  PRIMARY KEY (`modulo10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `modulo10`
--

INSERT INTO `modulo10` (`modulo10_id`, `modulo10_nome`, `modulo10_subtitulo`, `modulo10_icon`, `modulo10_button`, `modulo10_button1`, `modulo10_status`, `modulo10_imagem`, `modulo10_paginacao`) VALUES
(1, 'Bem vindo ao nosso blog !', 'Posts DiÃ¡rios', 'fa fa-camera', 'ComentÃ¡rios', 'leia mais', '1', NULL, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo11`
--

CREATE TABLE IF NOT EXISTS `modulo11` (
  `modulo11_id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo11_nome` varchar(200) DEFAULT NULL,
  `modulo11_button` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`modulo11_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `modulo11`
--

INSERT INTO `modulo11` (`modulo11_id`, `modulo11_nome`, `modulo11_button`) VALUES
(1, 'Onde estamos? clique no mapa', 'Seu Site Â© 2014 All Rights Reserved. Designed by Dudu Muniz');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo_aparencia`
--

CREATE TABLE IF NOT EXISTS `modulo_aparencia` (
  `modulo_aparencia_id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo_aparencia_cor` varchar(200) DEFAULT NULL,
  `modulo_aparencia_favicon` varchar(200) DEFAULT NULL,
  `modulo_aparencia_logo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`modulo_aparencia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `modulo_aparencia`
--

INSERT INTO `modulo_aparencia` (`modulo_aparencia_id`, `modulo_aparencia_cor`, `modulo_aparencia_favicon`, `modulo_aparencia_logo`) VALUES
(1, 'blue', 'logo.png', 'logo.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagina`
--

CREATE TABLE IF NOT EXISTS `pagina` (
  `pagina_id` int(11) NOT NULL AUTO_INCREMENT,
  `pagina_nome` varchar(200) DEFAULT NULL,
  `pagina_imagem` varchar(200) DEFAULT NULL,
  `pagina_descricao` longtext,
  `pagina_pos` int(11) DEFAULT '0',
  `pagina_area` int(11) DEFAULT NULL,
  `pagina_data` varchar(200) DEFAULT NULL,
  `pagina_autor` varchar(200) DEFAULT NULL,
  `pagina_description` varchar(200) DEFAULT NULL,
  `pagina_keywords` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`pagina_id`),
  KEY `fk_pagina_area_idx` (`pagina_area`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Extraindo dados da tabela `pagina`
--

INSERT INTO `pagina` (`pagina_id`, `pagina_nome`, `pagina_imagem`, `pagina_descricao`, `pagina_pos`, `pagina_area`, `pagina_data`, `pagina_autor`, `pagina_description`, `pagina_keywords`) VALUES
(49, 'Sed tristique tincidunt', '1434837901.jpg', '<p style="padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: arial; line-height: normal; background: transparent;">Sed tristique tincidunt, ultrices augue tempor mauris sed! Lacus massa, facilisis mauris lacus dictumst dis sed? Ac magna, placerat scelerisque phasellus, mauris! Lorem ac nisi pulvinar ut odio ultrices nunc? Mattis eros, ridiculus dis adipiscing sit dignissim nascetur ac natoque placerat elementum, enim proin ut, vel platea cursus, ultrices amet vel ac in montes hac, purus et placerat, mus tempor pulvinar penatibus platea? Lectus dolor nec lorem lacus a sed tempor nec ridiculus cursus tempor ac odio nunc porta porta, a, porta magna pulvinar, sit hac aliquet porta, dictumst quis, amet ultrices parturient tortor tempor pulvinar, egestas odio. Duis! Quis, ultricies turpis rhoncus platea in magna sed adipiscing porta ultrices elementum elementum, elementum et? Nascetur elementum ultrices a nascetur magna</p><p style="padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: arial; line-height: normal; background: transparent;">Cliente: Microsoft &nbsp;&nbsp;</p><p style="padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: arial; line-height: normal; background: transparent;">HTML 5 / bootstrap</p><p style="padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: arial; line-height: normal; background: transparent;"><br></p>', 0, 7, '12/Abril/2015', '', '', ''),
(50, 'augue ac ac mattis penatibus elit ', '1432261086.jpg', '<p style="padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: arial; line-height: normal; background: transparent;">In a massa nunc porttitor eu egestas natoque pulvinar nascetur tincidunt pulvinar lorem a, amet lectus! Massa placerat, dictumst urna ut mattis porta velit, mid? In odio et in sagittis augue turpis lectus a tincidunt, penatibus duis eu arcu dapibus duis penatibus. Porta magna in, ut dapibus, quis. Porta? Odio. Nec, scelerisque aliquam pulvinar dis turpis rhoncus, ultricies lectus natoque, tincidunt eros amet enim integer, nec elementum ridiculus. Nunc aliquam, adipiscing nec phasellus natoque dictumst elementum ut, rhoncus elementum est. Nisi velit tristique vel! Aenean rhoncus ut et in mattis, natoque rhoncus eros sed, dignissim massa nunc, dolor scelerisque augue cum lacus duis in. Enim natoque sed pulvinar amet velit porta eros. In porta amet nunc odio et massa, vut.</p><p style="padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: arial; line-height: normal; background: transparent;">Diam mauris auctor montes platea. Nunc turpis rhoncus porta, amet risus? Augue! Pulvinar mus, aliquam nisi, urna aliquet turpis. Massa adipiscing augue scelerisque. Purus scelerisque, sit diam adipiscing enim. Enim purus, turpis porttitor. Ut. Facilisis nisi enim auctor mauris sed urna ultricies duis est rhoncus quis dolor! Enim lundium! Ultricies? Augue nunc auctor! Pulvinar etiam, lundium lacus urna elit! Dignissim nec dolor sagittis adipiscing platea arcu habitasse nec aliquet proin, porttitor, sagittis arcu sit sagittis habitasse urna? Sed elementum ac cras massa risus integer risus tincidunt proin habitasse sit, sagittis arcu pulvinar tincidunt, et lorem! Ultricies ac lundium? Lectus sociis quis sed ut. Amet, nunc etiam et, scelerisque lectus? Amet aliquet? Nisi vel adipiscing auctor proin, lundium magnis purus.</p>', 0, 8, '12/Abril/2015', NULL, NULL, NULL),
(51, 'Tincidunt tempor, dignissim tincidunt!', '1434837868.jpg', '<p style="padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: arial; line-height: normal; background: transparent;">Tincidunt tempor, dignissim tincidunt! In duis lectus nunc urna dictumst mid platea? Dictumst ultrices ultricies nec platea montes? Integer penatibus? Integer sagittis tincidunt nascetur? Mus? Odio lundium rhoncus mattis amet. Nec adipiscing turpis scelerisque sagittis. Dictumst! Magna vut. Aliquet lorem! Integer nec? Sagittis duis sociis. Elementum arcu natoque! Urna, augue! Tincidunt risus sed, eros. Penatibus egestas nunc vel lectus massa magnis dis nascetur dis nascetur cras, sit nascetur! Ultrices duis. Proin a! Nec, natoque. Magna cursus dictumst nec ultrices nec, aenean. Elit rhoncus aliquet, penatibus porta lectus, dolor etiam porttitor amet cras, ut, arcu non sit, in arcu, dolor ut in rhoncus lacus velit tristique mus elementum hac! Odio pid, parturient augue? Ridiculus ut. Nec et, massa, aliquam mattis porttitor.</p><p style="padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: arial; line-height: normal; background: transparent;">Etiam dis mauris augue in, nisi natoque duis phasellus tincidunt urna urna, magnis egestas sed, scelerisque, porta cum purus. Elementum amet nisi, platea elementum sit pid aliquam odio habitasse! Sociis natoque, arcu sit. Natoque porta? Porttitor turpis phasellus, a, turpis purus vut velit phasellus, elit cras eros, porttitor quis magnis eros pellentesque? Duis! Dis amet. Turpis pulvinar odio nec et risus etiam a, rhoncus, tincidunt nec nascetur nascetur? Lundium et platea ut, phasellus elementum egestas vel vel elit eu pulvinar tempor nisi lacus massa! Eros ac tempor? Magnis proin, a lundium in penatibus? Diam amet, pellentesque dictumst auctor. Eu. Porttitor sit pid est. Mattis, rhoncus tincidunt, aenean? Urna pulvinar scelerisque sagittis enim nunc! Phasellus egestas! Enim in tempor phasellus.</p>', 0, 8, '12/Abril/2015', '', '', ''),
(52, 'Urna elit amet mauris, et odio,', '1434837887.jpg', '<p style="margin-bottom: 12px; color: rgb(119, 119, 119); font-family: ''PT Sans'', sans-serif; line-height: 22px; background-color: rgb(254, 254, 254);">Lorizzle ipsizzle dolizzle sit amet, consectetuer adipiscing its fo rizzle. Nullam velizzle, fo shizzle my nizzle volutpizzle, suscipizzle quis, the bizzle vel, own yo''. Pellentesque go to hizzle away. Sed ma nizzle. Fizzle izzle dolizzle dapibizzle turpis tempizzle tempor. Maurizzle pellentesque own yo'' mammasay mammasa mamma oo sa turpis. Vestibulum izzle tortor. Pellentesque that''s the shizzle rhoncus dope. In i''m in the shizzle sheezy platea dictumst. Check it out dapibus. Curabitur tellivizzle we gonna chung, break yo neck, yall that''s the shizzle, mattis ac, eleifend check out this, nunc. Phat fo shizzle. Integizzle for sure crackalackin ma nizzle own yo''.</p><p style="margin-bottom: 12px; color: rgb(119, 119, 119); font-family: ''PT Sans'', sans-serif; line-height: 22px; background-color: rgb(254, 254, 254);">Vivamus nec hizzle pizzle nisi we gonna chung pretizzle. Funky fresh sit amizzle lacizzle. Black eu boom shackalack eget lacus pimpin'' fo shizzle mah nizzle fo rizzle, mah home g-dizzle. Praesent suscipizzle stuff that''s the shizzle. Curabitizzle fo shizzle arcu. Vestibulum enim mah nizzle, brizzle nizzle, congue tellivizzle, dignissim uhuh ... yih!, libero. Nullam vitae for sure non erizzle posuere break it down. Quisque pede tortizzle, rizzle pulvinar, auctizzle a, mollis stuff shizzlin dizzle, erizzle. Nizzle izzle tellivizzle. Aliquizzle risus gangsta, pizzle gizzle, sollicitudin in, consequat izzle, turpis. Quisque a brizzle boom shackalack mi rutrum vehicula. Curabitur accumsan sagittizzle ipsum. Daahng dawg habitant morbi phat senectus izzle dizzle ass yippiyo i saw beyonces tizzles and my pizzle went crizzle izzle turpizzle egestas. In shizznit. Curabitizzle elementum. Crackalackin pizzle da bomb, semper nizzle, suscipizzle daahng dawg, porta pulvinizzle, daahng dawg. Nulla sagittis gravida velit.</p><h3 style="font-family: ''PT Sans'', sans-serif; line-height: 1.25em; color: rgb(51, 51, 51); margin: 0px 0px 1em; font-size: 19px; background-color: rgb(254, 254, 254);">Wait, there is more...</h3><p style="margin-bottom: 12px; color: rgb(119, 119, 119); font-family: ''PT Sans'', sans-serif; line-height: 22px; background-color: rgb(254, 254, 254);">Praesent tellivizzle daahng dawg izzle leo fo shizzle molestie. Ass get down get down tortor vizzle boom shackalack. Quisque malesuada ornare magna. Morbi crazy, nisl rizzle bibendizzle egestizzle, magna mah nizzle vestibulizzle dawg, izzle shit justo check out this quizzle augue. Rizzle id own yo'' ma nizzle amizzle dang bow wow wow sagittizzle. Vivamizzle dope pede ut rizzle. I saw beyonces tizzles and my pizzle went crizzle rhoncizzle nonummy leo. Lorizzle ipsizzle dolizzle brizzle amet, consectetizzle bling bling elit. Phasellus nisi crackalackin, shut the shizzle up funky fresh funky fresh, facilisis sizzle, cool brizzle, libero. Mammasay mammasa mamma oo sa izzle faucibus diam. Ut i saw beyonces tizzles and my pizzle went crizzle tellivizzle. Nunc sizzle bizzle a dizzle accumsizzle shizzlin dizzle. Quisque condimentum metizzle shizzlin dizzle nunc. Aenean sodalizzle, fo quizzle brizzle lacinia, bow wow wow dizzle sheezy felizzle, nizzle ullamcorpizzle erizzle you son of a bizzle fizzle own yo''. Vivamizzle leo sheezy, rizzle da bomb amizzle, dang yippiyo, pulvinar , my shizz.</p>', 0, 9, '12/Abril/2015', 'Mathias', '', ''),
(53, 'Porta amet et mus pulvinar velit amet.', '1434837855.png', '<p style="padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: arial; line-height: normal; background: transparent;">Magna? Porta amet et mus pulvinar velit amet. Mauris dis mauris tempor elementum integer sociis, et turpis in nunc lorem vel arcu pulvinar magnis pulvinar. Porttitor, augue magna, tortor amet. Placerat diam dis pellentesque porttitor elementum risus sociis! Ac parturient. Pid integer natoque duis urna lundium natoque sociis, aenean proin turpis facilisis, auctor augue magna integer montes! Dapibus in magnis nec quis porta est rhoncus, placerat rhoncus amet in mid vel magna, nunc, sed nisi sed mus montes. Odio in! Sagittis et. Lacus et? Ultrices tempor rhoncus ultricies amet rhoncus? Pid mauris dictumst, dignissim. Aliquam placerat, turpis dolor enim ac, risus nec adipiscing dignissim pellentesque, nascetur sit nec velit urna turpis sed magnis sociis placerat, tincidunt, in? Adipiscing parturient augue.</p><p style="padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: arial; line-height: normal; background: transparent;">In magnis ac et ut hac sed urna dictumst? Placerat lacus a? Parturient mattis phasellus tincidunt phasellus phasellus sed porttitor, a elementum pulvinar! Sed ut, risus vut vel non? Nec mus amet nascetur! Sit tristique, tempor egestas adipiscing, vel, est? Ac. Ut augue habitasse montes ac. Phasellus? Rhoncus phasellus natoque, natoque, tristique sit! Odio risus pulvinar, lectus mid phasellus dapibus aliquam, nisi odio, lectus facilisis et augue, turpis porttitor cursus aenean. Elit ridiculus aliquam phasellus, porta amet, in augue, amet scelerisque dignissim augue, montes eros tortor etiam! Quis diam, sit augue platea amet, enim, sagittis. Porta urna eu enim, ut mid porttitor dapibus. Sed placerat, scelerisque arcu nisi placerat tristique nunc, mauris et ultricies penatibus odio, ultricies, ut auctor.</p>', 0, 6, '12/Abril/2015', '', '', ''),
(54, 'Sophie Charlotte revela rotina de beleza', '1434837826.jpg', '<p style="font-family: arial, helvetica, freesans, sans-serif; font-size: 1.26em; margin-bottom: 0px; outline: 0px; padding: 0px 0px 1.5em; color: rgb(51, 51, 51); letter-spacing: -0.02em; line-height: 1.45em; background: rgb(255, 255, 255);">A performance de Ivete Sangalo no Rock in Rio USA,&nbsp;<a href="http://g1.globo.com/musica/noticia/2015/05/rock-rio-usa-taylor-swift-tombo-de-ivete-veja-o-que-rolou-na-sexta.html" style="font-family: inherit; font-size: 15.1199998855591px; margin: 0px; outline-width: 0px; padding: 0px; color: rgb(168, 0, 0); font-weight: bold; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">no fim de semana pop do evento</a>&nbsp;em Las Vegas, recebeu elogios de jovens americanas ouvidas pelo&nbsp;<strong style="font-family: inherit; font-size: 15.1199998855591px; margin: 0px; outline: 0px; padding: 0px; background: transparent;">G1&nbsp;</strong>(<strong style="font-family: inherit; font-size: 15.1199998855591px; margin: 0px; outline: 0px; padding: 0px; background: transparent;">veja vÃ­deo acima</strong>). Ela foi comparada a popstars como Cher e Shakira.</p><p style="font-family: arial, helvetica, freesans, sans-serif; font-size: 1.26em; margin-bottom: 0px; outline: 0px; padding: 0px 0px 1.5em; color: rgb(51, 51, 51); letter-spacing: -0.02em; line-height: 1.45em; background: rgb(255, 255, 255);">Em parte contaminados pela gritaria da plateia de brasileiros que prestigiaram Ivete, um pÃºblico que nÃ£o conhecia a baiana elogiou a "voz Ãºnica", a energia e a "boa vibe" de Ivete.</p><p style="font-family: arial, helvetica, freesans, sans-serif; font-size: 1.26em; margin-bottom: 0px; outline: 0px; padding: 0px 0px 1.5em; color: rgb(51, 51, 51); letter-spacing: -0.02em; line-height: 1.45em; background: rgb(255, 255, 255);">"O figurino dela? NinguÃ©m nos EUA usaria, mas mesmo assim eu gosto. Ele Ã© cool", disse Tia, de 20 anos. "Ela quer que todos se divirtam e curtam o show", resumiu Samantha, de 23. "Ela tem uma voz Ãºnica, nÃ£o Ã© como as que eu escuto nos EUA", opinou Lauren, de 16.</p>', 0, 10, '20/Abril/2015', 'Administrador', 'contaminados pela gritaria da plateia de brasileiros que prestigiaram Ivete', 'performance, Sangalo, m de semana pop do evento em Las Vegas'),
(55, 'Blogueira Camila Coelho ensina a fazer make em apenas 5 minutos!', '1434837846.jpg', '<p><span style="color: rgb(102, 102, 102); font-family: arial, helvetica, freesans, sans-serif; font-size: 16px; letter-spacing: -0.319999992847443px; line-height: 27px;">A blogueira Camila Coelho bomba no mundo das maquiagens e adora dar dicas para suas seguidoras nas redes sociais. E no</span><a href="http://gshow.globo.com/programas/mais-voce/" style="font-family: arial, helvetica, freesans, sans-serif; font-size: 16px; margin: 0px; outline-width: 0px; padding: 20px 0px; color: rgb(96, 140, 210); font-weight: bold; border-top-width: 3px; letter-spacing: -0.319999992847443px; line-height: 27px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">&nbsp;Mais VocÃª</a><span style="color: rgb(102, 102, 102); font-family: arial, helvetica, freesans, sans-serif; font-size: 16px; letter-spacing: -0.319999992847443px; line-height: 27px;">&nbsp;desta segunda-feira (20), a mineirinha ensinou a mulherada a fazer uma maquiagem de arrasar em apenas cinco minutos! Sim, isso Ã© possÃ­vel. Agora nÃ£o tem desculpa para deixar os homens esperando. "O mais importante Ã© vocÃª achar produtos certos para o seu tipo e tom de pele. NÃ£o precisam ser caros", garantiu a blogueira.</span><strong style="font-family: arial, helvetica, freesans, sans-serif; font-size: 16px; margin: 0px; outline: 0px; padding: 0px; color: rgb(102, 102, 102); letter-spacing: -0.319999992847443px; line-height: 27px; background: transparent;">Assista ao vÃ­deo, siga os conselhos da Camila e arrase!</strong><br></p>', 0, 10, '20/Abril/2015', '', '', ''),
(56, 'Velocidade da banda larga no Brasil varia entre taxas de LÃ­bia e JapÃ£o', '1434837814.jpg', '<p style="font-family: arial, helvetica, freesans, sans-serif; font-size: 1.26em; margin-bottom: 0px; outline: 0px; padding: 0px 0px 1.5em; color: rgb(51, 51, 51); letter-spacing: -0.02em; line-height: 1.45em; background: rgb(255, 255, 255);"><strong style="font-family: inherit; font-size: 15.1199998855591px; margin: 0px; outline: 0px; padding: 0px; background: transparent;">Banda Larga para Todos</strong><br style="font-family: inherit; font-size: 15.1199998855591px; margin: 0px; outline: 0px; padding: 0px; background: transparent;">O Brasil tem atualmente 24,3 milhÃµes de pontos de acesso de banda larga fixa. Destes, 46,3% estÃ£o na faixa de 2Mbps a 12 Mbps.</p><p style="font-family: arial, helvetica, freesans, sans-serif; font-size: 1.26em; margin-bottom: 0px; outline: 0px; padding: 0px 0px 1.5em; color: rgb(51, 51, 51); letter-spacing: -0.02em; line-height: 1.45em; background: rgb(255, 255, 255);">O diretor da Sinditelebrasil traÃ§a um cenÃ¡rio otimista para os prÃ³ximos anos. â€œAs operadoras comeÃ§aram a investir em novas tecnologias. No caso do mÃ³vel, a soluÃ§Ã£o Ã© o 4G. Na banda larga, as operadoras usaram soluÃ§Ãµes para otimizar o trÃ¡fego. ComeÃ§aram a usar anÃ©is metropolitanos de fibra Ã³tica e atÃ© em bairros. AtÃ© 2019, vai ter acesso em todos os municÃ­pios do Brasil, e o paÃ­s todo vai ter internet no patamar prÃ³ximo de 20 Mbps.â€</p><p style="font-family: arial, helvetica, freesans, sans-serif; font-size: 1.26em; margin-bottom: 0px; outline: 0px; padding: 0px 0px 1.5em; color: rgb(51, 51, 51); letter-spacing: -0.02em; line-height: 1.45em; background: rgb(255, 255, 255);">A meta do governo Ã© ainda mais ousada. Segundo o MinistÃ©rio das ComunicaÃ§Ãµes, o Plano Banda Larga para Todos, ainda em formulaÃ§Ã£o, pretende levar internet rÃ¡pida, com uma velocidade mÃ©dia de 25 Mbps, para 95% da populaÃ§Ã£o brasileira atÃ© 2018.</p><p style="font-family: arial, helvetica, freesans, sans-serif; font-size: 1.26em; margin-bottom: 0px; outline: 0px; padding: 0px 0px 1.5em; color: rgb(51, 51, 51); letter-spacing: -0.02em; line-height: 1.45em; background: rgb(255, 255, 255);">Para chegar a esse patamar, no entanto, hÃ¡ um longo caminho a ser percorrido. Hoje, sÃ³ 4,5% das conexÃµes sÃ£o por fibra Ã³tica, relevam dados da Anatel.</p><p style="font-family: arial, helvetica, freesans, sans-serif; font-size: 1.26em; margin-bottom: 0px; outline: 0px; padding: 0px 0px 1.5em; color: rgb(51, 51, 51); letter-spacing: -0.02em; line-height: 1.45em; background: rgb(255, 255, 255);">O ministÃ©rio diz que serÃ¡ preciso contar com â€œforte investimento em infraestrutura de fibra Ã³ptica e a operaÃ§Ã£o do SatÃ©lite GeoestacionÃ¡rio de Defesa e ComunicaÃ§Ãµes EstratÃ©gicas, que serÃ¡ lanÃ§ado em 2016â€. A pasta afirma, no entanto, que isso ainda depende do orÃ§amento disponÃ­vel para o programa.</p>', 0, 9, '23/Maio/2015', 'Administrador', 'Enquanto a maior parte dos moradores de 406 cidades do Brasil acessa a internet com uma velocidade inferior Ã  oferecida na LÃ­bia â€“ um paÃ­s em conflito', 'banda larga no Brasil , cidades do Brasil acessa a internet, CarÃªncia de internet no Norte');

-- --------------------------------------------------------

--
-- Estrutura da tabela `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `portfolio_id` int(11) NOT NULL AUTO_INCREMENT,
  `portfolio_nome` varchar(200) DEFAULT NULL,
  `portfolio_cliente` varchar(200) NOT NULL,
  `portfolio_data` varchar(200) DEFAULT NULL,
  `portfolio_imagem` varchar(200) DEFAULT NULL,
  `portfolio_descricao` longtext,
  `portfolio_area1` int(11) DEFAULT NULL,
  `portfolio_url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`portfolio_id`),
  KEY `fk_portfolio_area1_idx` (`portfolio_area1`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- Extraindo dados da tabela `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `portfolio_nome`, `portfolio_cliente`, `portfolio_data`, `portfolio_imagem`, `portfolio_descricao`, `portfolio_area1`, `portfolio_url`) VALUES
(70, 'In Women & cats', 'Big International Company', '14/Novembro/2015', '1434834205.jpg', '<p><span style="color: rgb(119, 119, 119); font-family: ''PT Sans'', sans-serif; line-height: 22px; background-color: rgb(254, 254, 254);">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate nunc ut tellus sollicitudin placerat. Sed ac consectetur leo. Pellentesque habitant morbi tristique senectus et netus...</span><br></p>', 5, 'www.google.com'),
(71, 'Projeto 007', 'Forest', '22/Maio/2015', '1434834225.jpg', '<p style="padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: arial; line-height: normal; background: transparent;">Et integer tincidunt. Natoque! Urna dis parturient velit cum. Dolor? Tortor lorem dignissim urna! Vel nec diam integer. Sed augue enim odio tristique nec arcu lundium natoque, ut aliquet rhoncus et nunc? Magna urna, urna nisi? Scelerisque pulvinar elementum cras placerat integer, pid auctor nec magnis pid, porta, a nec et, phasellus cursus elementum, integer enim et, dapibus! Nascetur porttitor? Et, enim et facilisis! Ac adipiscing odio mattis. Placerat non, nascetur augue? Ultrices a et platea mattis? Ultricies ac scelerisque, tempor lectus! Nisi urna. Amet, mauris eu massa enim amet, ac, a turpis et nascetur lorem, aliquam cras et, mattis est lundium, lacus mus, sociis, proin porttitor non? Lacus scelerisque scelerisque. Scelerisque mauris dignissim aenean! Cras magnis a velit? Hac.</p><p style="padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: arial; line-height: normal; background: transparent;">Et aliquam magnis velit augue, ac vel etiam! Porttitor magnis turpis, pulvinar mattis penatibus? Scelerisque integer platea parturient cum. Sed et, pulvinar porttitor ac! Pellentesque porttitor pellentesque diam nunc, integer in augue facilisis? Enim sit! Placerat sed purus integer in eu ut pid placerat, parturient tincidunt a integer nunc eros, magna aliquam ut porta tempor aenean! Sagittis. Placerat nec, porttitor ut eu adipiscing a turpis scelerisque diam scelerisque? Nisi scelerisque ut eros pulvinar amet! Eu, lorem odio? Integer vel sociis magnis. Nunc urna pulvinar lectus lundium egestas augue cum? Adipiscing elementum et aliquam tincidunt a ac auctor habitasse enim velit a elementum facilisis arcu hac duis a sociis in magnis dolor turpis dolor, nec ac rhoncus et vel nisi.</p>', 6, ''),
(72, 'Job 001', ' Envato', '07/Maio/2015', '1434834245.jpg', '<p><span style="color: rgb(0, 0, 0); font-family: arial; font-size: 13px; line-height: normal; background-color: rgb(255, 255, 255);">Sed dictumst integer etiam enim pid magna ut elit mid phasellus natoque, cum et, urna vut, natoque aliquam! Montes porttitor dignissim ac sit phasellus. Facilisis enim elit a, mid ultrices pulvinar ridiculus turpis massa montes dolor! Dignissim mid pid tincidunt. Porta lacus dolor placerat porttitor, sit lectus porttitor! Dis. Enim turpis pulvinar duis tempor, pulvinar, et nec enim nec tristique.&nbsp;</span><br></p>', 5, 'www.google.com'),
(73, 'Ut Molestiae ', 'Laborum Animi', '17/Junho/2015', '1434833957.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 3, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
  `servico_id` int(11) NOT NULL AUTO_INCREMENT,
  `servico_nome` varchar(200) DEFAULT NULL,
  `servico_icon` varchar(200) DEFAULT NULL,
  `servico_descricao` text,
  PRIMARY KEY (`servico_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`servico_id`, `servico_nome`, `servico_icon`, `servico_descricao`) VALUES
(1, 'Design Limpo', 'fa fa-heart', 'Layouts elegantes que ajudam a organizar o conteÃºdo da melhor maneira'),
(2, 'HTML5 & CSS3', 'fa fa-thumbs-up', 'ConstruÃ­do com tecnologias modernas, como HTML5 e CSS3, SEO otimizado'),
(3, 'Design Responsivo', 'fa fa-rocket', 'CompatÃ­vel com vÃ¡rios desktop, tablet e dispositivos mÃ³veis.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `site_id` int(11) NOT NULL,
  `site_meta_desc` text,
  `site_meta_palavra` varchar(200) DEFAULT NULL,
  `site_meta_titulo` varchar(200) DEFAULT NULL,
  `site_sobre_titulo` varchar(200) DEFAULT NULL,
  `site_sobre` varchar(200) DEFAULT NULL,
  `site_logo` varchar(200) DEFAULT NULL,
  `site_meta_autor` varchar(200) DEFAULT NULL,
  `site_imagem` varchar(200) DEFAULT NULL,
  `site_analytics` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `site`
--

INSERT INTO `site` (`site_id`, `site_meta_desc`, `site_meta_palavra`, `site_meta_titulo`, `site_sobre_titulo`, `site_sobre`, `site_logo`, `site_meta_autor`, `site_imagem`, `site_analytics`) VALUES
(1, 'Fazemos coleta de óleo de fritura usado - ', 'template admin, php admin, phpstaff, cÃ³digo php, gerenciador de conteÃºdo php', 'Dudu Muniz - Template Admin', NULL, 'sobre', 'logo-small.png', 'Dudu Muniz', 'parallax_bg11.jpg', 'UA-123456-7');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_imagem` varchar(200) DEFAULT NULL,
  `slide_nome` varchar(200) DEFAULT NULL,
  `slide_subtitulo` varchar(200) DEFAULT NULL,
  `slide_subtitulo1` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `slide`
--

INSERT INTO `slide` (`slide_id`, `slide_imagem`, `slide_nome`, `slide_subtitulo`, `slide_subtitulo1`) VALUES
(18, '1432395987.jpg', 'Premium  Template Com 10 Cores', '', ''),
(20, '1432396013.jpg', 'Template com Painel Admin Completo', 'Customizado por PHP Staf', ''),
(21, '1432396240.jpg', 'Template Premium Com 10 Cores + Admin', 'Design limpo, responsivo e inteligente', 'Desenvolvido por Dudu Muniz para nossos Parceiro!'),
(22, '1434836834.jpg', 'Template Premium Com 10 Cores', 'Design limpo, responsivo e inteligente', 'Customizado por Dudu Muniz para nossos parceiros!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `smtp`
--

CREATE TABLE IF NOT EXISTS `smtp` (
  `smtp_id` int(11) NOT NULL,
  `smtp_host` varchar(200) DEFAULT NULL,
  `smtp_username` varchar(100) DEFAULT NULL,
  `smtp_password` varchar(100) DEFAULT NULL,
  `smtp_fromname` varchar(200) DEFAULT NULL,
  `smtp_bcc` varchar(100) DEFAULT NULL,
  `smtp_replyto` varchar(100) DEFAULT NULL,
  `smtp_port` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `smtp`
--

INSERT INTO `smtp` (`smtp_id`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_fromname`, `smtp_bcc`, `smtp_replyto`, `smtp_port`) VALUES
(1, 'dudu.com.br', 'dudu', '123', 'dudu', 'dude.dudu266@gmail.com', 'dude.dudu26@gmail.com', 587);

-- --------------------------------------------------------

--
-- Estrutura da tabela `social`
--

CREATE TABLE IF NOT EXISTS `social` (
  `social_id` int(11) NOT NULL AUTO_INCREMENT,
  `social_url` varchar(200) DEFAULT NULL,
  `social_nome` varchar(200) DEFAULT NULL,
  `social_status` int(11) NOT NULL,
  PRIMARY KEY (`social_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Extraindo dados da tabela `social`
--

INSERT INTO `social` (`social_id`, `social_url`, `social_nome`, `social_status`) VALUES
(1, 'www.br.exemploss/', 'fa fa-adn', 0),
(2, 'www.plus', 'fa fa-android', 0),
(3, 'www.instagram.com/', 'fa fa-apple', 0),
(4, 'www.twitter.com', 'fa fa-bitbucket', 0),
(5, 'https://www.facebook.com', 'fa fa-bitcoin', 1),
(6, 'https://br.linkedin.com/', 'fa fa-css3', 0),
(7, 'https://br.linkedin.com/', 'fa fa-dribbble', 0),
(8, 'https://br.linkedin.com/', 'fa fa-dropbox', 0),
(9, 'www.facebook.com', 'fa fa-facebook', 1),
(10, 'https://br.linkedin.com/', 'fa fa-flickr', 0),
(11, 'https://br.linkedin.com/', 'fa fa-foursquare', 1),
(12, 'https://br.linkedin.com/', 'fa fa-github', 0),
(13, 'https://www.google.com/', 'fa fa-google-plus', 1),
(14, 'https://br.linkedin.com/', 'fa fa-html5', 0),
(15, 'https://br.linkedin.com/', 'fa fa-instagram', 1),
(16, 'https://br.linkedin.com/', 'fa fa-linkedin', 0),
(17, 'https://br.linkedin.com/', 'fa fa-linux', 0),
(18, 'https://br.linkedin.com/', 'fa fa-maxcdn', 0),
(19, 'https://br.linkedin.com/', 'fa fa-pagelines', 0),
(20, 'https://br.pinterest.com/', 'fa fa-pinterest', 0),
(21, 'https://br.linkedin.com/', 'fa fa-renren', 0),
(22, 'https://br.linkedin.com/', 'fa fa-skype', 1),
(23, 'https://br.linkedin.com/', 'fa fa-stack-exchange', 0),
(24, 'https://br.linkedin.com/', 'fa fa-trello', 0),
(25, 'https://br.linkedin.com/', 'fa fa-tumblr', 0),
(26, 'https://twitter.com/', 'fa fa-twitter', 1),
(27, 'https://vimeo.com/', 'fa fa-vimeo-square', 0),
(29, 'www.youtube.com', 'fa fa-youtube', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nome` varchar(200) DEFAULT NULL,
  `usuario_login` varchar(200) DEFAULT NULL,
  `usuario_email` varchar(200) DEFAULT NULL,
  `usuario_senha` varchar(200) DEFAULT NULL,
  `usuario_data` varchar(200) DEFAULT NULL,
  `usuario_imagem` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nome`, `usuario_login`, `usuario_email`, `usuario_senha`, `usuario_data`, `usuario_imagem`) VALUES
(13, 'Dudu', 'admin', 'dudumunizads@gmail.com', '123', '19/04/1997', '1432663838.jpg'),
(14, 'DuduMuniz', 'dudu', 'dudumunizads@gmail.com', '123', '19/04/2022', '1432663844.jpg');
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_pagina` FOREIGN KEY (`comentario_pagina`) REFERENCES `pagina` (`pagina_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pagina`
--
ALTER TABLE `pagina`
  ADD CONSTRAINT `fk_pagina_area` FOREIGN KEY (`pagina_area`) REFERENCES `area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `fk_portfolio_area1` FOREIGN KEY (`portfolio_area1`) REFERENCES `area1` (`area1_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
