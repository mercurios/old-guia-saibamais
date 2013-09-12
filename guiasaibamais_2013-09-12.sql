# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.25)
# Database: guiasaibamais
# Generation Time: 2013-09-12 23:49:57 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table guia_acomodacoes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_acomodacoes`;

CREATE TABLE `guia_acomodacoes` (
  `id_acomodacao` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome_acomodacao` varchar(100) DEFAULT NULL,
  `desc_acomodacao` text,
  `extra_acomodacao` text,
  `titulo_preco_um` varchar(100) DEFAULT NULL,
  `titulo_preco_dois` varchar(100) DEFAULT NULL,
  `titulo_preco_tres` varchar(100) DEFAULT NULL,
  `valor_preco_um` varchar(100) DEFAULT NULL,
  `valor_preco_dois` varchar(100) DEFAULT NULL,
  `valor_preco_tres` varchar(100) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_acomodacao`),
  UNIQUE KEY `id_acomodacao` (`id_acomodacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_acomodacoes` WRITE;
/*!40000 ALTER TABLE `guia_acomodacoes` DISABLE KEYS */;

INSERT INTO `guia_acomodacoes` (`id_acomodacao`, `nome_acomodacao`, `desc_acomodacao`, `extra_acomodacao`, `titulo_preco_um`, `titulo_preco_dois`, `titulo_preco_tres`, `valor_preco_um`, `valor_preco_dois`, `valor_preco_tres`, `id_cliente`)
VALUES
	(1,'Suite prata','Descrição da suite\n','<p>extra da suite</p>','tituo1','tituo2','tituo3','valor1','valor2','valor3',1);

/*!40000 ALTER TABLE `guia_acomodacoes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_bebidas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_bebidas`;

CREATE TABLE `guia_bebidas` (
  `id_bebida` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `logo_bebida` varchar(255) DEFAULT NULL,
  `nome_bebida` varchar(255) DEFAULT NULL,
  `desc_bebida` text,
  `pag_bebida` varchar(255) DEFAULT NULL,
  `extra_bebida` varchar(255) DEFAULT '',
  `local_bebida` varchar(255) DEFAULT NULL,
  `tipo_extra_bebida` varchar(255) DEFAULT NULL,
  `tipo_bebida_bebida` varchar(255) DEFAULT NULL,
  `rua_bebida` varchar(255) DEFAULT NULL,
  `num_bebida` varchar(255) DEFAULT NULL,
  `cep_bebida` varchar(255) DEFAULT NULL,
  `bairro_bebida` varchar(255) DEFAULT NULL,
  `cidade_bebida` varchar(255) DEFAULT NULL,
  `uf_bebida` varchar(255) DEFAULT NULL,
  `long_bebida` varchar(255) DEFAULT NULL,
  `lati_bebida` varchar(255) DEFAULT NULL,
  `fone_atend_bebida` varchar(255) DEFAULT NULL,
  `fone_entrega_bebida` varchar(255) DEFAULT NULL,
  `email_bebida` varchar(255) DEFAULT NULL,
  `site_bebida` varchar(255) DEFAULT NULL,
  `twitter_bebida` varchar(255) DEFAULT NULL,
  `facebook_bebida` varchar(255) DEFAULT NULL,
  `youtube_bebida` varchar(255) DEFAULT NULL,
  `insta_bebida` varchar(255) DEFAULT NULL,
  `flickr_bebida` varchar(255) DEFAULT NULL,
  `googleplus_bebida` varchar(255) DEFAULT NULL,
  `orkut_bebida` varchar(255) DEFAULT NULL,
  `adaptado_bebida` varchar(255) DEFAULT NULL,
  `slug_bebida` varchar(255) DEFAULT NULL,
  `h_dom` varchar(100) DEFAULT NULL,
  `h_seg` varchar(100) DEFAULT NULL,
  `h_ter` varchar(100) DEFAULT NULL,
  `h_qua` varchar(100) DEFAULT NULL,
  `h_qui` varchar(100) DEFAULT NULL,
  `h_sex` varchar(100) DEFAULT NULL,
  `h_sab` varchar(100) DEFAULT NULL,
  UNIQUE KEY `id_restaurante` (`id_bebida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_bebidas` WRITE;
/*!40000 ALTER TABLE `guia_bebidas` DISABLE KEYS */;

INSERT INTO `guia_bebidas` (`id_bebida`, `logo_bebida`, `nome_bebida`, `desc_bebida`, `pag_bebida`, `extra_bebida`, `local_bebida`, `tipo_extra_bebida`, `tipo_bebida_bebida`, `rua_bebida`, `num_bebida`, `cep_bebida`, `bairro_bebida`, `cidade_bebida`, `uf_bebida`, `long_bebida`, `lati_bebida`, `fone_atend_bebida`, `fone_entrega_bebida`, `email_bebida`, `site_bebida`, `twitter_bebida`, `facebook_bebida`, `youtube_bebida`, `insta_bebida`, `flickr_bebida`, `googleplus_bebida`, `orkut_bebida`, `adaptado_bebida`, `slug_bebida`, `h_dom`, `h_seg`, `h_ter`, `h_qua`, `h_qui`, `h_sex`, `h_sab`)
VALUES
	(1,'9ba8d7424ce9a13305a2f6e9a6da8c6c.jpg','Bebida22','Bebida','dinheiro,visa,master,hiper,diners,elo,credcard,visaelectro,paggo,redeshop,vr,aura,toppremium,sodexo,sodexopass','wifi,estacionamento,lutas-ao-vivo,jogos-ao-vivo,shows-ao-vivo','bares,botecos,cafeterias,lanchonetes,restaurante','musicas-ao-vivo,jogos-ao-vivo,lutas-transmitidas,open-bar','batidas,caipirinhas,cachacas,cafes,cervejas,chopps,energeticas,licor,milk-shake,refrigerantes,sucos,tequilas,vinhos,whisky','Bebida','Bebida','Bebida','Bebida','Bebida','v','v','Bebida','Bebida','Bebida','Bebida','Bebida','Bebida','Bebida','Bebida','Bebida','Bebida','Bebida','Bebida','cego,surdo,deficientefisico,braile,obeso,idoso,gestante,bebe','bebida22','Bebida','Bebida','Bebida','Bebida','Bebida','Bebida','Bebida');

/*!40000 ALTER TABLE `guia_bebidas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_cardapios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_cardapios`;

CREATE TABLE `guia_cardapios` (
  `id_cardapio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_prato` varchar(100) DEFAULT NULL,
  `desc_prato` text,
  `titulo_preco_um` varchar(100) DEFAULT NULL,
  `titulo_preco_dois` varchar(100) DEFAULT NULL,
  `titulo_preco_tres` varchar(100) DEFAULT NULL,
  `valor_preco_um` varchar(100) DEFAULT NULL,
  `valor_preco_dois` varchar(100) DEFAULT NULL,
  `valor_preco_tres` varchar(100) DEFAULT NULL,
  `tipo_prato` varchar(100) DEFAULT NULL,
  `dia_prato` varchar(100) DEFAULT NULL,
  `categoria_prato` varchar(100) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cardapio`),
  UNIQUE KEY `id_cardapio` (`id_cardapio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_cardapios` WRITE;
/*!40000 ALTER TABLE `guia_cardapios` DISABLE KEYS */;

INSERT INTO `guia_cardapios` (`id_cardapio`, `nome_prato`, `desc_prato`, `titulo_preco_um`, `titulo_preco_dois`, `titulo_preco_tres`, `valor_preco_um`, `valor_preco_dois`, `valor_preco_tres`, `tipo_prato`, `dia_prato`, `categoria_prato`, `id_cliente`)
VALUES
	(1,'Cuzcuz com charque','Carne de sol assada na brasa, servida com arroz branco, batatas fritas e salada.','Executivo','Prato Feito','Self-service','25,00','10,00','25,00','pratoprincipal','sexta,sabado,domingo','restaurante',1),
	(2,'Cuzcuz com charque normal','desc','titulo','titulo2','titulo3','valor1','valor2','valor3','normal','terÃ§a,quarta','restaurante',1),
	(3,'Cuzcuz com charque normal','Uma breve descriÃ§Ã£o do que Ã© feito o prato','Executivo','Prato Feito','Self-service','25,00','10,00','25,00','normal','sexta,sabado,domingo','restaurante',1),
	(4,'Chocolate quente','Descrição\n','titulo','titulo2','titulo3','valor1','valor2','valor3','bebida','terÃ§a,quarta','restaurante',1),
	(5,'Cuzcuz com charque','Uma breve descriÃ§Ã£o do que Ã© feito o prato','Executivo','Prato Feito','Self-service','25,00','10,00','25,00','pratoprincipal','sexta,sabado,domingo','restaurante',1),
	(6,'Cuzcuz com charque','desc','titulo','titulo2','titulo3','valor1','valor2','valor3','pratoprincipal','terÃ§a,quarta','lanchonete',2),
	(7,'Cuzcuz com charque','Uma breve descriÃ§Ã£o do que Ã© feito o prato','Executivo','Prato Feito','Self-service','25,00','10,00','25,00','pratoprincipal','sexta,sabado,domingo','restaurante',1),
	(8,'Prato 1','Descrição do prato','Titulo 1','titulo 2','titulo 3','Valor 1','Valor 2','Valor 3','normal','segunda,quarta,sabado','restaurante',6);

/*!40000 ALTER TABLE `guia_cardapios` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_chamadas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_chamadas`;

CREATE TABLE `guia_chamadas` (
  `id_chamada` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo_chamada` varchar(255) DEFAULT NULL,
  `link_chamada` varchar(255) DEFAULT NULL,
  `img_chamada` varchar(50) DEFAULT NULL,
  `desc_chamada` text,
  `categoria_chamada` varchar(50) DEFAULT NULL,
  `pos_chamada` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_chamada`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_chamadas` WRITE;
/*!40000 ALTER TABLE `guia_chamadas` DISABLE KEYS */;

INSERT INTO `guia_chamadas` (`id_chamada`, `titulo_chamada`, `link_chamada`, `img_chamada`, `desc_chamada`, `categoria_chamada`, `pos_chamada`)
VALUES
	(1,'Titulo da matéria 1','http://site.saibamais:8888/restaurante/detalhe/churrascaria-bode-do-no/2','2768c7faf39fe2ffa05f83037d66ca4c.jpg','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>\r\n<p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>\r\n<p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>\r\n<p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p>\r\n<p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>\r\n<p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','restaurante','media'),
	(2,'Titulo da matéria 2','http://site.saibamais:8888/restaurante/detalhe/churrascaria-bode-do-no/2','2768c7faf39fe2ffa05f83037d66ca4c.jpg','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>\r\n<p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>\r\n<p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>\r\n<p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p>\r\n<p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>\r\n<p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','restaurante','pequena'),
	(3,'Titulo da matéria 3','http://site.saibamais:8888/restaurante/detalhe/churrascaria-bode-do-no/2','34bf66489cb8ed68ea09645c64a282bd.jpg','<p>Descri&ccedil;&atilde;o</p>','restaurante','pequena'),
	(4,'Titulo da matéria 4','http://site.saibamais:8888/restaurante/detalhe/churrascaria-bode-do-no/2','2768c7faf39fe2ffa05f83037d66ca4c.jpg','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>\r\n<p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>\r\n<p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>\r\n<p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p>\r\n<p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>\r\n<p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','restaurante','pequena'),
	(5,'Titulo da matéria 5','http://site.saibamais:8888/restaurante/detalhe/churrascaria-bode-do-no/2','2768c7faf39fe2ffa05f83037d66ca4c.jpg','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>\r\n<p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>\r\n<p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>\r\n<p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p>\r\n<p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>\r\n<p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','restaurante','pequena'),
	(6,'Titulo da matéria 6','http://site.saibamais:8888/restaurante/detalhe/churrascaria-bode-do-no/2','34bf66489cb8ed68ea09645c64a282bd.jpg','<p>Descri&ccedil;&atilde;o</p>','restaurante','pequena');

/*!40000 ALTER TABLE `guia_chamadas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_cinemas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_cinemas`;

CREATE TABLE `guia_cinemas` (
  `id_cinema` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logo_cinema` varchar(100) DEFAULT NULL,
  `nome_cinema` varchar(100) DEFAULT NULL,
  `desc_cinema` text,
  `extras_cinema` text,
  `adaptado_cinema` varchar(100) DEFAULT NULL,
  `fone_cinema` varchar(100) DEFAULT NULL,
  `email_cinema` varchar(100) DEFAULT NULL,
  `site_cinema` varchar(100) DEFAULT NULL,
  `twitter_cinema` varchar(100) DEFAULT NULL,
  `facebook_cinema` varchar(100) DEFAULT NULL,
  `youtube_cinema` varchar(100) DEFAULT NULL,
  `insta_cinema` varchar(100) DEFAULT NULL,
  `flickr_cinema` varchar(100) DEFAULT NULL,
  `googleplus_cinema` varchar(100) DEFAULT NULL,
  `orkut_cinema` varchar(100) DEFAULT NULL,
  `rua_cinema` varchar(100) DEFAULT NULL,
  `num_cinema` varchar(100) DEFAULT NULL,
  `cep_cinema` varchar(100) DEFAULT NULL,
  `bairro_cinema` varchar(100) DEFAULT NULL,
  `cidade_cinema` varchar(100) DEFAULT NULL,
  `uf_cinema` varchar(100) DEFAULT NULL,
  `long_cinema` varchar(100) DEFAULT NULL,
  `lati_cinema` varchar(100) DEFAULT NULL,
  `titulo_extra_cinema` varchar(100) DEFAULT NULL,
  `valor_dom_inteira` varchar(100) DEFAULT NULL,
  `valor_dom_meia` varchar(100) DEFAULT NULL,
  `valor_dom_tresd` varchar(100) DEFAULT NULL,
  `valor_dom_meiatresd` varchar(100) DEFAULT NULL,
  `valor_dom_extra` varchar(100) DEFAULT NULL,
  `valor_seg_inteira` varchar(100) DEFAULT NULL,
  `valor_seg_meia` varchar(100) DEFAULT NULL,
  `valor_seg_tresd` varchar(100) DEFAULT NULL,
  `valor_seg_meiatresd` varchar(100) DEFAULT NULL,
  `valor_seg_extra` varchar(100) DEFAULT NULL,
  `valor_ter_inteira` varchar(100) DEFAULT NULL,
  `valor_ter_meia` varchar(100) DEFAULT NULL,
  `valor_ter_tresd` varchar(100) DEFAULT NULL,
  `valor_ter_meiatresd` varchar(100) DEFAULT NULL,
  `valor_ter_extra` varchar(100) DEFAULT NULL,
  `valor_qua_inteira` varchar(100) DEFAULT NULL,
  `valor_qua_meia` varchar(100) DEFAULT NULL,
  `valor_qua_tresd` varchar(100) DEFAULT NULL,
  `valor_qua_meiatresd` varchar(100) DEFAULT NULL,
  `valor_qua_extra` varchar(100) DEFAULT NULL,
  `valor_qui_inteira` varchar(100) DEFAULT NULL,
  `valor_qui_meia` varchar(100) DEFAULT NULL,
  `valor_qui_tresd` varchar(100) DEFAULT NULL,
  `valor_qui_meiatresd` varchar(100) DEFAULT NULL,
  `valor_qui_extra` varchar(100) DEFAULT NULL,
  `valor_sex_inteira` varchar(100) DEFAULT NULL,
  `valor_sex_meia` varchar(100) DEFAULT NULL,
  `valor_sex_tresd` varchar(100) DEFAULT NULL,
  `valor_sex_meiatresd` varchar(100) DEFAULT NULL,
  `valor_sex_extra` varchar(100) DEFAULT NULL,
  `valor_sab_inteira` varchar(100) DEFAULT NULL,
  `valor_sab_meia` varchar(100) DEFAULT NULL,
  `valor_sab_tresd` varchar(100) DEFAULT NULL,
  `valor_sab_meiatresd` varchar(100) DEFAULT NULL,
  `valor_sab_extra` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cinema`),
  UNIQUE KEY `id_cinema` (`id_cinema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_cinemas` WRITE;
/*!40000 ALTER TABLE `guia_cinemas` DISABLE KEYS */;

INSERT INTO `guia_cinemas` (`id_cinema`, `logo_cinema`, `nome_cinema`, `desc_cinema`, `extras_cinema`, `adaptado_cinema`, `fone_cinema`, `email_cinema`, `site_cinema`, `twitter_cinema`, `facebook_cinema`, `youtube_cinema`, `insta_cinema`, `flickr_cinema`, `googleplus_cinema`, `orkut_cinema`, `rua_cinema`, `num_cinema`, `cep_cinema`, `bairro_cinema`, `cidade_cinema`, `uf_cinema`, `long_cinema`, `lati_cinema`, `titulo_extra_cinema`, `valor_dom_inteira`, `valor_dom_meia`, `valor_dom_tresd`, `valor_dom_meiatresd`, `valor_dom_extra`, `valor_seg_inteira`, `valor_seg_meia`, `valor_seg_tresd`, `valor_seg_meiatresd`, `valor_seg_extra`, `valor_ter_inteira`, `valor_ter_meia`, `valor_ter_tresd`, `valor_ter_meiatresd`, `valor_ter_extra`, `valor_qua_inteira`, `valor_qua_meia`, `valor_qua_tresd`, `valor_qua_meiatresd`, `valor_qua_extra`, `valor_qui_inteira`, `valor_qui_meia`, `valor_qui_tresd`, `valor_qui_meiatresd`, `valor_qui_extra`, `valor_sex_inteira`, `valor_sex_meia`, `valor_sex_tresd`, `valor_sex_meiatresd`, `valor_sex_extra`, `valor_sab_inteira`, `valor_sab_meia`, `valor_sab_tresd`, `valor_sab_meiatresd`, `valor_sab_extra`)
VALUES
	(1,'6f3f74457f9b8b6ca39fc891bb9aeed4.jpg','Cinema','Desc cinema ','SeguranÃ§a,estacionamento','cadeirante,deficientevisual','Telefone','email','site','twitter','face','yout','insta','flickr','plus','orkut','rua','35','646513843','bairro','cidade','uf','long','lati','Itau','domingo inteira','domingo meia','domingo 3d','domingo meia 3d','Domingo extra','Segunda inteira','Segunda meia','Segunda 3d','Segunda meia 3d','Segunda extra','TerÃ§a inteira','TerÃ§a meia','TerÃ§a 3d','TerÃ§a meia 3d','TerÃ§a extra','Quarta inteira','Quarta meia','Quarta 3d','Quarta meia 3d','Quarta extra','Quinta inteira','Quinta meia','Quinta 3d','Quinta meia 3d','Quinta extra','Sexta inteira','Sexta meia','Sexta 3d','Sexta meia 3d','Sexta extra','SÃ¡bado inteira','SÃ¡bado meia','SÃ¡bado 3d','SÃ¡bado meia 3d','SÃ¡bado extra');

/*!40000 ALTER TABLE `guia_cinemas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_esportes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_esportes`;

CREATE TABLE `guia_esportes` (
  `id_esporte` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logo_esporte` varchar(100) DEFAULT NULL,
  `nome_esporte` varchar(255) DEFAULT NULL,
  `ondepraticar_esporte` varchar(100) DEFAULT NULL,
  `desc_esporte` text,
  `rua_esporte` varchar(100) DEFAULT NULL,
  `num_esporte` varchar(100) DEFAULT NULL,
  `cep_esporte` varchar(100) DEFAULT NULL,
  `bairro_esporte` varchar(100) DEFAULT NULL,
  `cidade_esporte` varchar(100) DEFAULT NULL,
  `uf_esporte` varchar(100) DEFAULT NULL,
  `long_esporte` varchar(100) DEFAULT NULL,
  `lati_esporte` varchar(100) DEFAULT NULL,
  `horario_esporte` varchar(100) DEFAULT NULL,
  `valor_esporte` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_esporte`),
  UNIQUE KEY `id_esporte` (`id_esporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_esportes` WRITE;
/*!40000 ALTER TABLE `guia_esportes` DISABLE KEYS */;

INSERT INTO `guia_esportes` (`id_esporte`, `logo_esporte`, `nome_esporte`, `ondepraticar_esporte`, `desc_esporte`, `rua_esporte`, `num_esporte`, `cep_esporte`, `bairro_esporte`, `cidade_esporte`, `uf_esporte`, `long_esporte`, `lati_esporte`, `horario_esporte`, `valor_esporte`)
VALUES
	(1,'c23f0f69290c5d7f3a9f4f71c2b8ae96.jpg','Volei','Boa viagem','DescriÃ§aio','asijoas','iojasijo','ijoasijo','ijoasijoq','ijoasijo','qijoadijo','ijosijo','ijoasijo','ijoijosaijoas','gratis');

/*!40000 ALTER TABLE `guia_esportes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_estadias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_estadias`;

CREATE TABLE `guia_estadias` (
  `id_estadia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logo_estadia` varchar(100) DEFAULT NULL,
  `nome_estadia` varchar(100) DEFAULT NULL,
  `desc_estadia` varchar(100) DEFAULT NULL,
  `extra_estadia` varchar(100) DEFAULT NULL,
  `tipo_estadia` varchar(100) DEFAULT NULL,
  `localidade_estadia` varchar(100) DEFAULT NULL,
  `class_estadia` varchar(100) DEFAULT NULL,
  `rua_estadia` varchar(100) DEFAULT NULL,
  `num_estadia` varchar(100) DEFAULT NULL,
  `cep_estadia` varchar(100) DEFAULT NULL,
  `bairro_estadia` varchar(100) DEFAULT NULL,
  `cidade_estadia` varchar(100) DEFAULT NULL,
  `uf_estadia` varchar(100) DEFAULT NULL,
  `long_estadia` varchar(100) DEFAULT NULL,
  `lati_estadia` varchar(100) DEFAULT NULL,
  `fone_estadia` varchar(100) DEFAULT NULL,
  `site_estadia` varchar(100) DEFAULT NULL,
  `email_estadia` varchar(100) DEFAULT NULL,
  `twitter_estadia` varchar(100) DEFAULT NULL,
  `facebook_estadia` varchar(100) DEFAULT NULL,
  `youtube_estadia` varchar(100) DEFAULT NULL,
  `insta_estadia` varchar(100) DEFAULT NULL,
  `flickr_estadia` varchar(100) DEFAULT NULL,
  `googleplus_estadia` varchar(100) DEFAULT NULL,
  `orkut_estadia` varchar(100) DEFAULT NULL,
  `adaptado_estadia` varchar(100) DEFAULT NULL,
  `slug_estadia` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_estadia`),
  UNIQUE KEY `id_estadia` (`id_estadia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_estadias` WRITE;
/*!40000 ALTER TABLE `guia_estadias` DISABLE KEYS */;

INSERT INTO `guia_estadias` (`id_estadia`, `logo_estadia`, `nome_estadia`, `desc_estadia`, `extra_estadia`, `tipo_estadia`, `localidade_estadia`, `class_estadia`, `rua_estadia`, `num_estadia`, `cep_estadia`, `bairro_estadia`, `cidade_estadia`, `uf_estadia`, `long_estadia`, `lati_estadia`, `fone_estadia`, `site_estadia`, `email_estadia`, `twitter_estadia`, `facebook_estadia`, `youtube_estadia`, `insta_estadia`, `flickr_estadia`, `googleplus_estadia`, `orkut_estadia`, `adaptado_estadia`, `slug_estadia`)
VALUES
	(1,'2c9330d30daf447e55032a07e380dc27.jpg','Boa Viagem Praia','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labor','wifi,estacionamento,lutas-ao-vivo,jogos-ao-vivo,shows-ao-vivo','chale,hotel,pousada','cidade','cincoestrelas,seisestrelas','Av. Boa Viagem','088','54221157','Boa Viagem','Recife','PE','-34.904483','-8.119846','(81) 0000-0000','boaviagem.com.br','contato@boaviagem.com.br','ijo','ijo','ijo','jio','ijo','ijo','ijo','cego,surdo,deficientefisico,braile,obeso,idoso,gestante,bebe','boa-viagem-praia');

/*!40000 ALTER TABLE `guia_estadias` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_exposicoes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_exposicoes`;

CREATE TABLE `guia_exposicoes` (
  `id_exposicao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logo_exposicao` varchar(100) DEFAULT NULL,
  `nome_exposicao` varchar(100) DEFAULT NULL,
  `desc_exposicao` text,
  `extra_exposicao` text,
  `pag_exposicao` varchar(100) DEFAULT NULL,
  `fone_exposicao` varchar(100) DEFAULT NULL,
  `email_exposicao` varchar(100) DEFAULT NULL,
  `site_exposicao` varchar(100) DEFAULT NULL,
  `twitter_exposicao` varchar(100) DEFAULT NULL,
  `facebook_exposicao` varchar(100) DEFAULT NULL,
  `youtube_exposicao` varchar(100) DEFAULT NULL,
  `insta_exposicao` varchar(100) DEFAULT NULL,
  `flickr_exposicao` varchar(100) DEFAULT NULL,
  `googleplus_exposicao` varchar(100) DEFAULT NULL,
  `orkut_exposicao` varchar(100) DEFAULT NULL,
  `titulo_preco_um` varchar(100) DEFAULT NULL,
  `titulo_preco_dois` varchar(100) DEFAULT NULL,
  `titulo_preco_tres` varchar(100) DEFAULT NULL,
  `val_preco_um` varchar(100) DEFAULT NULL,
  `val_preco_dois` varchar(100) DEFAULT NULL,
  `val_preco_tres` varchar(100) DEFAULT NULL,
  `data_exposicao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_exposicao`),
  UNIQUE KEY `id_exposicao` (`id_exposicao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_exposicoes` WRITE;
/*!40000 ALTER TABLE `guia_exposicoes` DISABLE KEYS */;

INSERT INTO `guia_exposicoes` (`id_exposicao`, `logo_exposicao`, `nome_exposicao`, `desc_exposicao`, `extra_exposicao`, `pag_exposicao`, `fone_exposicao`, `email_exposicao`, `site_exposicao`, `twitter_exposicao`, `facebook_exposicao`, `youtube_exposicao`, `insta_exposicao`, `flickr_exposicao`, `googleplus_exposicao`, `orkut_exposicao`, `titulo_preco_um`, `titulo_preco_dois`, `titulo_preco_tres`, `val_preco_um`, `val_preco_dois`, `val_preco_tres`, `data_exposicao`)
VALUES
	(1,'34ac891b04d43d351ea1a87e4eb4f1bd.jpg','Expo coringa2','desc coringa','extras\r\n','visa,master,hiper','Fone','email','site','twitter','face','youtu','insta','flickr','google','orkut','Titulo 1','titulo 2','titulo 3','valor 1','valor 2','','17/07/2013');

/*!40000 ALTER TABLE `guia_exposicoes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_feiraeventos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_feiraeventos`;

CREATE TABLE `guia_feiraeventos` (
  `id_feiraevento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logo_feiraevento` varchar(100) DEFAULT NULL,
  `nome_feiraevento` varchar(100) DEFAULT NULL,
  `desc_feiraevento` text,
  `extra_feiraevento` text,
  `pag_feiraevento` varchar(100) DEFAULT NULL,
  `fone_feiraevento` varchar(100) DEFAULT NULL,
  `email_feiraevento` varchar(100) DEFAULT NULL,
  `site_feiraevento` varchar(100) DEFAULT NULL,
  `twitter_feiraevento` varchar(100) DEFAULT NULL,
  `facebook_feiraevento` varchar(100) DEFAULT NULL,
  `youtube_feiraevento` varchar(100) DEFAULT NULL,
  `insta_feiraevento` varchar(100) DEFAULT NULL,
  `flickr_feiraevento` varchar(100) DEFAULT NULL,
  `googleplus_feiraevento` varchar(100) DEFAULT NULL,
  `orkut_feiraevento` varchar(100) DEFAULT NULL,
  `titulo_preco_um` varchar(100) DEFAULT NULL,
  `titulo_preco_dois` varchar(100) DEFAULT NULL,
  `titulo_preco_tres` varchar(100) DEFAULT NULL,
  `val_preco_um` varchar(100) DEFAULT NULL,
  `val_preco_dois` varchar(100) DEFAULT NULL,
  `val_preco_tres` varchar(100) DEFAULT NULL,
  `data_feiraevento` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_feiraevento`),
  UNIQUE KEY `id_feiraevento` (`id_feiraevento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_feiraeventos` WRITE;
/*!40000 ALTER TABLE `guia_feiraeventos` DISABLE KEYS */;

INSERT INTO `guia_feiraeventos` (`id_feiraevento`, `logo_feiraevento`, `nome_feiraevento`, `desc_feiraevento`, `extra_feiraevento`, `pag_feiraevento`, `fone_feiraevento`, `email_feiraevento`, `site_feiraevento`, `twitter_feiraevento`, `facebook_feiraevento`, `youtube_feiraevento`, `insta_feiraevento`, `flickr_feiraevento`, `googleplus_feiraevento`, `orkut_feiraevento`, `titulo_preco_um`, `titulo_preco_dois`, `titulo_preco_tres`, `val_preco_um`, `val_preco_dois`, `val_preco_tres`, `data_feiraevento`)
VALUES
	(1,'34ac891b04d43d351ea1a87e4eb4f1bd.jpg','Feira e eventos','desc coringa','extras\r\n','visa,master,hiper','Fone','email','site','twitter','face','youtu','insta','flickr','google','orkut','Titulo 1','titulo 2','titulo 3','valor 1','valor 2','','17/07/2013');

/*!40000 ALTER TABLE `guia_feiraeventos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_filmes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_filmes`;

CREATE TABLE `guia_filmes` (
  `id_filme` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logo_filme` varchar(100) DEFAULT NULL,
  `titulo_filme` varchar(100) DEFAULT NULL,
  `sinopse_filme` text,
  `h_dom` varchar(255) DEFAULT NULL,
  `h_seg` varchar(100) DEFAULT NULL,
  `h_ter` varchar(100) DEFAULT NULL,
  `h_qua` varchar(100) DEFAULT NULL,
  `h_qui` varchar(100) DEFAULT NULL,
  `h_sex` varchar(100) DEFAULT NULL,
  `h_sab` varchar(100) DEFAULT NULL,
  `id_cinema` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_filme`),
  UNIQUE KEY `id_filme` (`id_filme`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_filmes` WRITE;
/*!40000 ALTER TABLE `guia_filmes` DISABLE KEYS */;

INSERT INTO `guia_filmes` (`id_filme`, `logo_filme`, `titulo_filme`, `sinopse_filme`, `h_dom`, `h_seg`, `h_ter`, `h_qua`, `h_qui`, `h_sex`, `h_sab`, `id_cinema`)
VALUES
	(2,'59e6742851f581ef91f036995c6f3120.jpg','','','','','','','','','','1');

/*!40000 ALTER TABLE `guia_filmes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_fotos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_fotos`;

CREATE TABLE `guia_fotos` (
  `id_foto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo_foto` varchar(100) DEFAULT NULL,
  `img_foto` varchar(100) DEFAULT NULL,
  `categoria_foto` varchar(100) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_foto`),
  UNIQUE KEY `id_foto` (`id_foto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_fotos` WRITE;
/*!40000 ALTER TABLE `guia_fotos` DISABLE KEYS */;

INSERT INTO `guia_fotos` (`id_foto`, `titulo_foto`, `img_foto`, `categoria_foto`, `id_cliente`)
VALUES
	(10,'Panicat','68caeb8a6d84c22de984c2727930329b.jpg','restaurante',1),
	(11,'Foto lanchonete','dce1d6d20f6953188ef795f2627ac2e0.jpg','lanchonete',1),
	(12,'Praia','9fe5b2835998e5deb72a24325d3a935b.jpg','locais',1),
	(13,'Camelo','160daa0fd91218d024e0910d04868ee9.jpg','acomodacao',1),
	(14,'Boa viagem foto','1313e4257d45ab9e83a853b6fb848db6.jpg','estadia',1),
	(15,'Bode 1','ca5852bf709eb3e41ad1e29032eb5f0a.jpg','restaurante',6),
	(16,'bode','470b2f647a2302db7aa24e8c0a78fc1f.jpeg','restaurante',6);

/*!40000 ALTER TABLE `guia_fotos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_frases
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_frases`;

CREATE TABLE `guia_frases` (
  `id_frase` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo_frase` varchar(255) DEFAULT NULL,
  `texto_frase` text,
  `autor_frase` varchar(255) DEFAULT NULL,
  `dia_frase` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_frase`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_frases` WRITE;
/*!40000 ALTER TABLE `guia_frases` DISABLE KEYS */;

INSERT INTO `guia_frases` (`id_frase`, `titulo_frase`, `texto_frase`, `autor_frase`, `dia_frase`)
VALUES
	(1,'Titulo segunda2','<p>Texto seg</p>','Segunda-Feira','segunda'),
	(2,'Titulo terça','Texto ter','Terça-Feira','terca'),
	(3,'Titulo da quarta','<p>Deus me enviou &agrave; terra com uma miss&atilde;o. S&oacute; Ele pode me deter, os homens nunca poder&atilde;o.</p>','Bob Marley','quarta'),
	(4,'Titulo quinta','<p>Deus me enviou &agrave; terra com uma miss&atilde;o. S&oacute; Ele pode me deter, os homens nunca poder&atilde;o.</p>','Quinta-Feira','quinta'),
	(5,'Titulo sexta','Texto sex','Sexta-Feira','sexta'),
	(6,'Titulo sabado','Texto sab','Sábado','sabado'),
	(7,'Titulo domingo','Texto dom','Domingo','domingo');

/*!40000 ALTER TABLE `guia_frases` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_lanchonetes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_lanchonetes`;

CREATE TABLE `guia_lanchonetes` (
  `id_lanchonete` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `logo_lanchonete` varchar(255) DEFAULT NULL,
  `extra_lanchonete` text,
  `nome_lanchonete` varchar(255) DEFAULT NULL,
  `desc_lanchonete` text,
  `pag_lanchonete` varchar(255) DEFAULT NULL,
  `tipo_lanchonete` varchar(255) DEFAULT NULL,
  `tipo_comida_lanchonete` varchar(255) DEFAULT NULL,
  `tipo_servico_lanchonete` varchar(255) DEFAULT NULL,
  `rua_lanchonete` varchar(255) DEFAULT NULL,
  `num_lanchonete` varchar(255) DEFAULT NULL,
  `cep_lanchonete` varchar(255) DEFAULT NULL,
  `bairro_lanchonete` varchar(255) DEFAULT NULL,
  `cidade_lanchonete` varchar(255) DEFAULT NULL,
  `uf_lanchonete` varchar(255) DEFAULT NULL,
  `long_lanchonete` varchar(255) DEFAULT NULL,
  `lati_lanchonete` varchar(255) DEFAULT NULL,
  `fone_atend_lanchonete` varchar(255) DEFAULT NULL,
  `fone_entrega_lanchonete` varchar(255) DEFAULT NULL,
  `email_lanchonete` varchar(255) DEFAULT NULL,
  `site_lanchonete` varchar(255) DEFAULT NULL,
  `twitter_lanchonete` varchar(255) DEFAULT NULL,
  `facebook_lanchonete` varchar(255) DEFAULT NULL,
  `youtube_lanchonete` varchar(255) DEFAULT NULL,
  `insta_lanchonete` varchar(255) DEFAULT NULL,
  `flickr_lanchonete` varchar(255) DEFAULT NULL,
  `googleplus_lanchonete` varchar(255) DEFAULT NULL,
  `orkut_lanchonete` varchar(255) DEFAULT NULL,
  `adaptado_lanchonete` varchar(255) DEFAULT NULL,
  `slug_lanchonete` varchar(255) DEFAULT NULL,
  `h_dom` varchar(255) DEFAULT NULL,
  `h_seg` varchar(255) DEFAULT NULL,
  `h_ter` varchar(255) DEFAULT NULL,
  `h_qua` varchar(255) DEFAULT NULL,
  `h_qui` varchar(255) DEFAULT NULL,
  `h_sex` varchar(255) DEFAULT NULL,
  `h_sab` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_lanchonete`),
  UNIQUE KEY `id_lanchonete` (`id_lanchonete`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_lanchonetes` WRITE;
/*!40000 ALTER TABLE `guia_lanchonetes` DISABLE KEYS */;

INSERT INTO `guia_lanchonetes` (`id_lanchonete`, `logo_lanchonete`, `extra_lanchonete`, `nome_lanchonete`, `desc_lanchonete`, `pag_lanchonete`, `tipo_lanchonete`, `tipo_comida_lanchonete`, `tipo_servico_lanchonete`, `rua_lanchonete`, `num_lanchonete`, `cep_lanchonete`, `bairro_lanchonete`, `cidade_lanchonete`, `uf_lanchonete`, `long_lanchonete`, `lati_lanchonete`, `fone_atend_lanchonete`, `fone_entrega_lanchonete`, `email_lanchonete`, `site_lanchonete`, `twitter_lanchonete`, `facebook_lanchonete`, `youtube_lanchonete`, `insta_lanchonete`, `flickr_lanchonete`, `googleplus_lanchonete`, `orkut_lanchonete`, `adaptado_lanchonete`, `slug_lanchonete`, `h_dom`, `h_seg`, `h_ter`, `h_qua`, `h_qui`, `h_sex`, `h_sab`)
VALUES
	(1,'e47b9ee2d19bf9f567c40d3b667b42df.jpg','wifi,estacionamento,lutas-ao-vivo,jogos-ao-vivo,shows-ao-vivo','Laça Burguer 2','Laça Burguer descrição','dinheiro,visa,master,hiper,diners,elo,credcard,visaelectro,paggo,redeshop,vr,aura,toppremium,sodexo,sodexopass','doces,gelados,massas,especiais,naturais,salgados','acai,crepes,doces,fondue,hamburguers,iorgutes,pasteis,pizzas,salgados,sanduiches,sorvete-picole,outros','fast-food,dilivery,drive-thrur,rodizios','Rua','Numero','cep','bairro','cidade','uf','longitude','latitude','atendimento','entrega','email','site','twitter','facebook','youtube','instagram','flickr','google','orkut','cego,surdo,deficientefisico,braile,obeso,idoso,gestante,bebe','laca-burguer','18:00 as 13:00 e 17:00 as 22:00','18:00 as 13:00 e 16:00 as 22:00','18:00 as 13:00 e 16:00 as 22:00','18:00 as 13:00 e 16:00 as 22:00','18:00 as 13:00 e 16:00 as 22:00','18:00 as 13:00 e 16:00 as 22:00','18:00 as 13:00 e 16:00 as 22:00');

/*!40000 ALTER TABLE `guia_lanchonetes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_locais
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_locais`;

CREATE TABLE `guia_locais` (
  `id_local` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `logo_local` varchar(255) DEFAULT NULL,
  `nome_local` varchar(255) DEFAULT NULL,
  `desc_local` varchar(255) DEFAULT NULL,
  `dicas_local` varchar(255) DEFAULT NULL,
  `rua_local` varchar(255) DEFAULT NULL,
  `num_local` varchar(255) DEFAULT NULL,
  `cep_local` varchar(255) DEFAULT NULL,
  `bairro_local` varchar(255) DEFAULT NULL,
  `cidade_local` varchar(255) DEFAULT NULL,
  `uf_local` varchar(255) DEFAULT NULL,
  `long_local` varchar(255) DEFAULT NULL,
  `lati_local` varchar(255) DEFAULT NULL,
  `horarios_local` varchar(255) DEFAULT NULL,
  `valor_local` varchar(255) DEFAULT NULL,
  `slug_local` varchar(255) DEFAULT NULL,
  `categoria_local` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_local`),
  UNIQUE KEY `id_local` (`id_local`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_locais` WRITE;
/*!40000 ALTER TABLE `guia_locais` DISABLE KEYS */;

INSERT INTO `guia_locais` (`id_local`, `logo_local`, `nome_local`, `desc_local`, `dicas_local`, `rua_local`, `num_local`, `cep_local`, `bairro_local`, `cidade_local`, `uf_local`, `long_local`, `lati_local`, `horarios_local`, `valor_local`, `slug_local`, `categoria_local`)
VALUES
	(1,'e5e6fb7f1b137d0c79b45817838552a7.jpg','Praia de boa viagem','desc','<p>Dicas sobre boa viagem</p>','Av boa viagem','','642521145','Boa viagem','cidade','uf','long','latitude','Dia todo','GrÃ¡tis','praia-de-boa-viagem','cachoeiras');

/*!40000 ALTER TABLE `guia_locais` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_logs`;

CREATE TABLE `guia_logs` (
  `id_log` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_log` varchar(255) COLLATE latin1_general_ci DEFAULT '',
  `hora_log` datetime NOT NULL,
  `ip_log` varchar(15) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `msg_log` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_log`),
  KEY `hora` (`hora_log`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

LOCK TABLES `guia_logs` WRITE;
/*!40000 ALTER TABLE `guia_logs` DISABLE KEYS */;

INSERT INTO `guia_logs` (`id_log`, `user_log`, `hora_log`, `ip_log`, `msg_log`)
VALUES
	(1,'Tassiano Alencar','2013-08-06 00:05:07','127.0.0.1','Recuperou a senha'),
	(2,'Tassiano Alencar','2013-08-06 00:05:11','127.0.0.1','Recuperou a senha'),
	(3,'Tassiano Alencar','2013-08-26 11:15:19','127.0.0.1','Listou'),
	(4,'Tassiano Alencar','2013-09-02 17:24:22','127.0.0.1','Editou uma estadia.'),
	(5,'Tassiano Alencar','2013-09-02 17:24:33','127.0.0.1','Editou uma estadia.'),
	(6,'Tassiano Alencar','2013-09-02 17:24:52','127.0.0.1','Editou uma estadia.'),
	(7,'Tassiano Alencar','2013-09-02 17:27:07','127.0.0.1','Editou uma estadia.'),
	(8,'Tassiano Alencar','2013-09-02 17:28:05','127.0.0.1','Editou uma estadia.'),
	(9,'Tassiano Alencar','2013-09-02 17:28:37','127.0.0.1','Editou uma estadia.'),
	(10,'Tassiano Alencar','2013-09-02 17:33:52','127.0.0.1','Editou uma estadia.'),
	(11,'Tassiano Alencar','2013-09-02 17:34:00','127.0.0.1','Editou uma estadia.'),
	(12,'Tassiano Alencar','2013-09-02 17:34:46','127.0.0.1','Editou uma estadia.'),
	(13,'Tassiano Alencar','2013-09-02 17:53:19','127.0.0.1','Editou uma estadia.'),
	(14,'Tassiano Alencar','2013-09-02 17:53:34','127.0.0.1','Editou uma estadia.'),
	(15,'Tassiano Alencar','2013-09-02 18:17:17','127.0.0.1','Editou uma estadia.'),
	(16,'Tassiano Alencar','2013-09-02 18:17:58','127.0.0.1','Editou uma estadia.'),
	(17,'Tassiano Alencar','2013-09-06 15:37:38','127.0.0.1','Editou uma lanchonete.'),
	(18,'Tassiano Alencar','2013-09-06 16:08:37','127.0.0.1','Adicionou um novo cardápio.'),
	(19,'Tassiano Alencar','2013-09-06 16:41:59','127.0.0.1','Adicionou uma lanchonete.'),
	(20,'Tassiano Alencar','2013-09-06 16:46:58','127.0.0.1','Editou uma lanchonete.'),
	(21,'Tassiano Alencar','2013-09-06 16:47:44','127.0.0.1','Editou uma lanchonete.'),
	(22,'Tassiano Alencar','2013-09-06 16:48:01','127.0.0.1','Editou uma lanchonete.'),
	(23,'Tassiano Alencar','2013-09-06 16:48:47','127.0.0.1','Editou uma lanchonete.'),
	(24,'Tassiano Alencar','2013-09-06 16:48:54','127.0.0.1','Editou uma lanchonete.'),
	(25,'Tassiano Alencar','2013-09-06 16:49:03','127.0.0.1','Editou uma lanchonete.'),
	(26,'Tassiano Alencar','2013-09-06 16:50:09','127.0.0.1','Editou uma lanchonete.'),
	(27,'Tassiano Alencar','2013-09-06 16:50:19','127.0.0.1','Editou uma lanchonete.'),
	(28,'Tassiano Alencar','2013-09-06 16:50:42','127.0.0.1','Editou uma lanchonete.'),
	(29,'Tassiano Alencar','2013-09-06 16:50:54','127.0.0.1','Editou uma lanchonete.'),
	(30,'Tassiano Alencar','2013-09-06 16:51:33','127.0.0.1','Adicionou uma lanchonete.'),
	(31,'Tassiano Alencar','2013-09-06 16:52:26','127.0.0.1','Editou uma lanchonete.'),
	(32,'Tassiano Alencar','2013-09-06 16:53:28','127.0.0.1','Editou uma lanchonete.'),
	(33,'Tassiano Alencar','2013-09-06 16:54:00','127.0.0.1','Editou uma lanchonete.'),
	(34,'Tassiano Alencar','2013-09-06 16:55:14','127.0.0.1','Editou uma lanchonete.'),
	(35,'Tassiano Alencar','2013-09-06 18:09:08','127.0.0.1','Adicionou um cliente na categoria Bebidas.'),
	(36,'Tassiano Alencar','2013-09-06 18:21:33','127.0.0.1','Atualizou um cliente na categoria bebidas.'),
	(37,'Tassiano Alencar','2013-09-06 18:21:38','127.0.0.1','Atualizou um cliente na categoria bebidas.'),
	(38,'Tassiano Alencar','2013-09-06 18:21:43','127.0.0.1','Atualizou um cliente na categoria bebidas.'),
	(39,'Tassiano Alencar','2013-09-06 18:21:46','127.0.0.1','Atualizou um cliente na categoria bebidas.'),
	(40,'Tassiano Alencar','2013-09-06 18:21:48','127.0.0.1','Atualizou um cliente na categoria bebidas.'),
	(41,'Tassiano Alencar','2013-09-06 18:25:04','127.0.0.1','Atualizou um cliente na categoria bebidas.');

/*!40000 ALTER TABLE `guia_logs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_pecas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_pecas`;

CREATE TABLE `guia_pecas` (
  `id_peca` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `logo_peca` varchar(100) DEFAULT NULL,
  `titulo_peca` varchar(100) DEFAULT NULL,
  `desc_peca` text,
  `h_dom` varchar(100) DEFAULT NULL,
  `h_seg` varchar(100) DEFAULT NULL,
  `h_ter` varchar(100) DEFAULT NULL,
  `h_qua` varchar(100) DEFAULT NULL,
  `h_qui` varchar(100) DEFAULT NULL,
  `h_sex` varchar(100) DEFAULT NULL,
  `h_sab` varchar(100) DEFAULT NULL,
  `val_inteira` varchar(100) DEFAULT NULL,
  `val_meia` varchar(100) DEFAULT NULL,
  `id_teatro` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_peca`),
  UNIQUE KEY `id_peca` (`id_peca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_pecas` WRITE;
/*!40000 ALTER TABLE `guia_pecas` DISABLE KEYS */;

INSERT INTO `guia_pecas` (`id_peca`, `logo_peca`, `titulo_peca`, `desc_peca`, `h_dom`, `h_seg`, `h_ter`, `h_qua`, `h_qui`, `h_sex`, `h_sab`, `val_inteira`, `val_meia`, `id_teatro`)
VALUES
	(2,'79d36e1e78420bb77f27fbf20468b748.jpg','Jogos mortais','654654','654','654','65','46','546','54','65',NULL,NULL,'1'),
	(3,'05a5d5b1cfde9a73559b2576d7a712bc.jpg','Jogos mortais 23','asd','ijojio','ijo','ijo','ijo','jio','ijoij','oijo','ijo','ijo','');

/*!40000 ALTER TABLE `guia_pecas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_promocoes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_promocoes`;

CREATE TABLE `guia_promocoes` (
  `id_promocao` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo_promocao` varchar(255) DEFAULT NULL,
  `desc_promocao` text,
  `categoria_promocao` varchar(100) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `data_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_final` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dia_semana` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_promocao`),
  UNIQUE KEY `id_promocao` (`id_promocao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_promocoes` WRITE;
/*!40000 ALTER TABLE `guia_promocoes` DISABLE KEYS */;

INSERT INTO `guia_promocoes` (`id_promocao`, `titulo_promocao`, `desc_promocao`, `categoria_promocao`, `id_cliente`, `data_inicio`, `data_final`, `dia_semana`)
VALUES
	(1,'PromoÃ§Ã£o com data de inÃ­cio e fim','<p>Inicio e fim</p>','restaurante',1,'2013-08-01 00:00:00','2013-08-10 00:00:00',''),
	(2,'Promocao com dia da semana','<p>dia da semana</p>','restaurante',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','segunda,quinta'),
	(3,'Promo 1','<p>promo</p>','lanchonete',2,'2013-08-15 00:00:00','2013-08-22 00:00:00',''),
	(4,'','','restaurante',2,'0000-00-00 00:00:00','0000-00-00 00:00:00','segunda,terca,quarta,quinta,sabado,domingo'),
	(5,'asas','<p>asasas</p>','restaurante',2,'0000-00-00 00:00:00','0000-00-00 00:00:00','quinta');

/*!40000 ALTER TABLE `guia_promocoes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_publicidade
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_publicidade`;

CREATE TABLE `guia_publicidade` (
  `id_publicidade` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo_publicidade` varchar(100) DEFAULT NULL,
  `img_vd_publicidade` varchar(100) DEFAULT NULL,
  `posicao_publicidade` varchar(100) DEFAULT NULL,
  `link_publicidade` varchar(100) DEFAULT NULL,
  `newtab_publicidade` varchar(100) DEFAULT NULL,
  `paginas_publicidade` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_publicidade`),
  UNIQUE KEY `id_publicidade` (`id_publicidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table guia_restaurantes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_restaurantes`;

CREATE TABLE `guia_restaurantes` (
  `id_restaurante` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `logo_restaurante` varchar(100) DEFAULT NULL,
  `nome_restaurante` varchar(100) DEFAULT NULL,
  `desc_restaurante` text,
  `pag_restaurante` varchar(255) DEFAULT NULL,
  `extra_restaurante` varchar(255) DEFAULT '',
  `tipo_cozinha_restaurante` varchar(100) DEFAULT NULL,
  `tipo_comida_restaurante` varchar(100) DEFAULT NULL,
  `tipo_servico_restaurante` varchar(100) DEFAULT NULL,
  `rua_restaurante` varchar(100) DEFAULT NULL,
  `num_restaurante` varchar(100) DEFAULT NULL,
  `cep_restaurante` varchar(100) DEFAULT NULL,
  `bairro_restaurante` varchar(100) DEFAULT NULL,
  `cidade_restaurante` varchar(100) DEFAULT NULL,
  `uf_restaurante` varchar(100) DEFAULT NULL,
  `long_restaurante` varchar(100) DEFAULT NULL,
  `lati_restaurante` varchar(100) DEFAULT NULL,
  `fone_atend_restaurante` varchar(100) DEFAULT NULL,
  `fone_entrega_restaurante` varchar(100) DEFAULT NULL,
  `email_restaurante` varchar(100) DEFAULT NULL,
  `site_restaurante` varchar(100) DEFAULT NULL,
  `twitter_restaurante` varchar(100) DEFAULT NULL,
  `facebook_restaurante` varchar(100) DEFAULT NULL,
  `youtube_restaurante` varchar(100) DEFAULT NULL,
  `insta_restaurante` varchar(100) DEFAULT NULL,
  `flickr_restaurante` varchar(100) DEFAULT NULL,
  `googleplus_restaurante` varchar(100) DEFAULT NULL,
  `orkut_restaurante` varchar(100) DEFAULT NULL,
  `adaptado_restaurante` varchar(100) DEFAULT NULL,
  `status_restaurante` varchar(1) DEFAULT NULL,
  `slug_restaurante` varchar(255) DEFAULT NULL,
  `h_dom` varchar(31) DEFAULT NULL,
  `h_seg` varchar(31) DEFAULT NULL,
  `h_ter` varchar(31) DEFAULT NULL,
  `h_qua` varchar(31) DEFAULT NULL,
  `h_qui` varchar(31) DEFAULT NULL,
  `h_sex` varchar(31) DEFAULT NULL,
  `h_sab` varchar(31) DEFAULT NULL,
  PRIMARY KEY (`id_restaurante`),
  UNIQUE KEY `id_restaurante` (`id_restaurante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_restaurantes` WRITE;
/*!40000 ALTER TABLE `guia_restaurantes` DISABLE KEYS */;

INSERT INTO `guia_restaurantes` (`id_restaurante`, `logo_restaurante`, `nome_restaurante`, `desc_restaurante`, `pag_restaurante`, `extra_restaurante`, `tipo_cozinha_restaurante`, `tipo_comida_restaurante`, `tipo_servico_restaurante`, `rua_restaurante`, `num_restaurante`, `cep_restaurante`, `bairro_restaurante`, `cidade_restaurante`, `uf_restaurante`, `long_restaurante`, `lati_restaurante`, `fone_atend_restaurante`, `fone_entrega_restaurante`, `email_restaurante`, `site_restaurante`, `twitter_restaurante`, `facebook_restaurante`, `youtube_restaurante`, `insta_restaurante`, `flickr_restaurante`, `googleplus_restaurante`, `orkut_restaurante`, `adaptado_restaurante`, `status_restaurante`, `slug_restaurante`, `h_dom`, `h_seg`, `h_ter`, `h_qua`, `h_qui`, `h_sex`, `h_sab`)
VALUES
	(6,'e7734dd4013c713373ccc9ba3cc1c285.jpg','Bode do nô','Bode do nô é uma churrascaria na qual você pode encontrar vários tipos de comidas. Bode do nô é uma churrascaria na qual você pode.','dinheiro,visa,master,diners,credcard,sodexo','wifi,estacionamento,lutas-ao-vivo,jogos-ao-vivo,shows-ao-vivo','africanas','crustaceos','rodizios','Rua São Miguel','1401','','Afogados','Recife','PE','-34.919552','-8.081208','(81) 0000.0000','(81) 0000.0000','bodedono@dobe.com','bodedono.com','Twitter','facebook','youtube','instagram','flickr','google','orkut','cego,surdo,deficientefisico,braile,obeso,idoso,gestante,bebe',NULL,'bode-do-no','','','','','','','');

/*!40000 ALTER TABLE `guia_restaurantes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_rotas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_rotas`;

CREATE TABLE `guia_rotas` (
  `id_rota` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo_rota` varchar(255) DEFAULT NULL,
  `ideal_rota` varchar(100) DEFAULT NULL,
  `logo_desc_rota` varchar(100) DEFAULT NULL,
  `img_rota` varchar(100) DEFAULT NULL,
  `valor_rota` varchar(100) DEFAULT NULL,
  `desc_rota` text,
  `atracao_rota` varchar(100) DEFAULT NULL,
  `valor_total_rota` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_rota`),
  UNIQUE KEY `id_rota` (`id_rota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table guia_shows
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_shows`;

CREATE TABLE `guia_shows` (
  `id_show` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `logo_show` varchar(100) DEFAULT NULL,
  `nome_show` varchar(100) DEFAULT NULL,
  `desc_show` text,
  `extra_show` text,
  `pag_show` varchar(100) DEFAULT NULL,
  `fone_show` varchar(100) DEFAULT NULL,
  `email_show` varchar(100) DEFAULT NULL,
  `site_show` varchar(100) DEFAULT NULL,
  `twitter_show` varchar(100) DEFAULT NULL,
  `facebook_show` varchar(100) DEFAULT NULL,
  `youtube_show` varchar(100) DEFAULT NULL,
  `insta_show` varchar(100) DEFAULT NULL,
  `googleplus_show` varchar(100) DEFAULT NULL,
  `orkut_show` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_show`),
  UNIQUE KEY `id_show` (`id_show`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_shows` WRITE;
/*!40000 ALTER TABLE `guia_shows` DISABLE KEYS */;

INSERT INTO `guia_shows` (`id_show`, `logo_show`, `nome_show`, `desc_show`, `extra_show`, `pag_show`, `fone_show`, `email_show`, `site_show`, `twitter_show`, `facebook_show`, `youtube_show`, `insta_show`, `googleplus_show`, `orkut_show`)
VALUES
	(1,'52520d75fa837aaa41fc4d4b709ce9a3.jpg','Nome2','desc','extra','visa,master','Fone','','site','tw','fa','you','insta','goo','orkut');

/*!40000 ALTER TABLE `guia_shows` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_teatros
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_teatros`;

CREATE TABLE `guia_teatros` (
  `id_teatro` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `logo_teatro` varchar(100) DEFAULT NULL,
  `nome_teatro` varchar(100) DEFAULT NULL,
  `sinopse_teatro` varchar(100) DEFAULT NULL,
  `extra_teatro` varchar(100) DEFAULT NULL,
  `adaptado_teatro` varchar(255) DEFAULT NULL,
  `fone_teatro` varchar(100) DEFAULT NULL,
  `email_teatro` varchar(100) DEFAULT NULL,
  `site_teatro` varchar(100) DEFAULT NULL,
  `twitter_teatro` varchar(100) DEFAULT NULL,
  `facebook_teatro` varchar(100) DEFAULT NULL,
  `youtube_teatro` varchar(100) DEFAULT NULL,
  `insta_teatro` varchar(100) DEFAULT NULL,
  `flickr_teatro` varchar(100) DEFAULT NULL,
  `googleplus_teatro` varchar(100) DEFAULT NULL,
  `orkut_teatro` varchar(100) DEFAULT NULL,
  `rua_teatro` varchar(100) DEFAULT NULL,
  `num_teatro` varchar(100) DEFAULT NULL,
  `cep_teatro` varchar(100) DEFAULT NULL,
  `bairro_teatro` varchar(100) DEFAULT NULL,
  `cidade_teatro` varchar(100) DEFAULT NULL,
  `uf_teatro` varchar(100) DEFAULT NULL,
  `long_teatro` varchar(100) DEFAULT NULL,
  `lati_teatro` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_teatro`),
  UNIQUE KEY `id_teatro` (`id_teatro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_teatros` WRITE;
/*!40000 ALTER TABLE `guia_teatros` DISABLE KEYS */;

INSERT INTO `guia_teatros` (`id_teatro`, `logo_teatro`, `nome_teatro`, `sinopse_teatro`, `extra_teatro`, `adaptado_teatro`, `fone_teatro`, `email_teatro`, `site_teatro`, `twitter_teatro`, `facebook_teatro`, `youtube_teatro`, `insta_teatro`, `flickr_teatro`, `googleplus_teatro`, `orkut_teatro`, `rua_teatro`, `num_teatro`, `cep_teatro`, `bairro_teatro`, `cidade_teatro`, `uf_teatro`, `long_teatro`, `lati_teatro`)
VALUES
	(1,'155550eb052cd3b955d77a57aba8fd04.jpg','Santa Isabel','santa isabel desc','extras','cadeirante','88554477','md5@gmail.com','site.com.br','','facebook.com','youtube','instagram','flickr','google','orkut','Rua te deu doro','69','558877485','casa azul','dos pï¿½s juntos','PE','4646846468486','466446');

/*!40000 ALTER TABLE `guia_teatros` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_user`;

CREATE TABLE `guia_user` (
  `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome_user` varchar(100) DEFAULT NULL,
  `email_user` varchar(255) DEFAULT NULL,
  `senha_user` varchar(32) DEFAULT NULL,
  `acesso_user` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_user` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_user` WRITE;
/*!40000 ALTER TABLE `guia_user` DISABLE KEYS */;

INSERT INTO `guia_user` (`id_user`, `nome_user`, `email_user`, `senha_user`, `acesso_user`, `status_user`)
VALUES
	(1,'Tassiano Alencar','tassianomac@me.com','21232f297a57a5a743894a0e4a801fc3','2013-09-06 15:37:10',1),
	(3,'Mateus Baitola','mateus@mercurios.com.br','827ccb0eea8a706c4c34a16891f84e7b','2013-08-21 15:51:35',1);

/*!40000 ALTER TABLE `guia_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guia_videos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guia_videos`;

CREATE TABLE `guia_videos` (
  `id_video` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo_video` varchar(100) DEFAULT NULL,
  `link_video` varchar(255) DEFAULT NULL,
  `categoria_video` varchar(100) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_video`),
  UNIQUE KEY `id_video` (`id_video`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `guia_videos` WRITE;
/*!40000 ALTER TABLE `guia_videos` DISABLE KEYS */;

INSERT INTO `guia_videos` (`id_video`, `titulo_video`, `link_video`, `categoria_video`, `id_cliente`)
VALUES
	(6,'','','',0),
	(7,'VÃ­deo Lanchonete 1','http://www.youtube.com/watch?v=M_EHpid9EMs','lanchonete',1),
	(8,'VÃ­deo 2','http://www.youtube.com/watch?v=M_EHpid9EMs','lanchonete',2),
	(9,'Bode do nô intro','http://www.youtube.com/watch?v=6xFtBdDAo9E','restaurante',6);

/*!40000 ALTER TABLE `guia_videos` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
