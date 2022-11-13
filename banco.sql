CREATE DATABASE `cakecrudempresa` /*!40100 DEFAULT CHARACTER SET latin1 */;
use cakecrudempresa;
CREATE TABLE `establishments`
(
    `id`          int(11)      NOT NULL AUTO_INCREMENT,
    `razaoSocial` varchar(255) NOT NULL,
    `cnpj`        varchar(18)  NOT NULL,
    `telefone`    varchar(16)  NOT NULL,
    `email`       varchar(255) NOT NULL,
    `logradouro`  varchar(180) NOT NULL,
    `numero`      varchar(30)  DEFAULT NULL,
    `complemento` varchar(150) DEFAULT NULL,
    `referencia`  varchar(180) DEFAULT NULL,
    `bairro`      varchar(140) DEFAULT NULL,
    `cidade`      varchar(140) NOT NULL,
    `estado`      varchar(2)   NOT NULL,
    `cep`         varchar(10)  NOT NULL,
    `ativo`       varchar(1)   DEFAULT 'S',
    `created`     datetime     NOT NULL,
    `modified`    datetime     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = latin1;
CREATE TABLE `employees`
(
    `id`               int(11)      NOT NULL AUTO_INCREMENT,
    `nome`             varchar(180) NOT NULL,
    `telefone`         varchar(16)  NOT NULL,
    `email`            varchar(180) NOT NULL,
    `dataDeNascimento` varchar(10)  NOT NULL,
    `ativo`            varchar(1) DEFAULT 'S',
    `created`          datetime     NOT NULL,
    `modified`         datetime     NOT NULL,
    `establishment_id` int(11)      NOT NULL,
    PRIMARY KEY (`id`),
    KEY `establishment_id` (`establishment_id`),
    CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`establishment_id`) REFERENCES `establishments` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = latin1;

CREATE DATABASE `cakecrudempresa` /*!40100 DEFAULT CHARACTER SET latin1 */;
use cakecrudempresa;
CREATE TABLE `establishments`
(
    `id`          int(11)      NOT NULL AUTO_INCREMENT,
    `razaoSocial` varchar(255) NOT NULL,
    `cnpj`        varchar(18)  NOT NULL,
    `telefone`    varchar(16)  NOT NULL,
    `email`       varchar(255) NOT NULL,
    `logradouro`  varchar(180) NOT NULL,
    `numero`      varchar(30)  DEFAULT NULL,
    `complemento` varchar(150) DEFAULT NULL,
    `referencia`  varchar(180) DEFAULT NULL,
    `bairro`      varchar(140) DEFAULT NULL,
    `cidade`      varchar(140) NOT NULL,
    `estado`      varchar(2)   NOT NULL,
    `cep`         varchar(10)  NOT NULL,
    `ativo`       varchar(1)   DEFAULT 'S',
    `created`     datetime     NOT NULL,
    `modified`    datetime     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = latin1;
CREATE TABLE `employees`
(
    `id`               int(11)      NOT NULL AUTO_INCREMENT,
    `nome`             varchar(180) NOT NULL,
    `telefone`         varchar(16)  NOT NULL,
    `email`            varchar(180) NOT NULL,
    `dataDeNascimento` varchar(10)  NOT NULL,
    `ativo`            varchar(1) DEFAULT 'S',
    `created`          datetime     NOT NULL,
    `modified`         datetime     NOT NULL,
    `establishment_id` int(11)      NOT NULL,
    PRIMARY KEY (`id`),
    KEY `establishment_id` (`establishment_id`),
    CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`establishment_id`) REFERENCES `establishments` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = latin1;

