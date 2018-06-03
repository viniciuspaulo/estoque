-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Maio-2018 às 03:06
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 5.6.34


CREATE DATABASE tcc2

USE tcc2


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `construcao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL
)

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cep` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `cnpj` varchar(100) NOT NULL
)

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `id_compra` int PRIMARY KEY AUTO_INCREMENT,
  `data` date NOT NULL,
  `valor` double NOT NULL,
  `cnpj` int(11) NOT NULL,
  `produto_cod` int(11) NOT NULL
)

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `cnpj` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL, 
  `estado` varchar(45) NOT NULL, 
  `naturalidade` varchar(45) NOT NULL, 
  `compra_cnpj` int(11) NOT NULL,
  `produto` varchar(255) NOT NULL
)

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `funcionario_id` int PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `cep` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `telefone` varchar(100),
  `dataadmissao` varchar(100) NOT NULL,
  `datadesligamento` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `perfil` varchar(100) NOT NULL
)


-- --------------------------------------------------------

--
-- Estrutura da tabela `item_compra`
--

CREATE TABLE `item_compra` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `cod_produto` int(11) NOT NULL,
  `num_compra` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor` double NOT NULL,
  `compra_cnpj` int(11) NOT NULL
)

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_venda`
--

CREATE TABLE `item_venda` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nun_venda` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor` double NOT NULL,
  `venda_num_venda` int(11) NOT NULL
)

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `preco` varchar(10) DEFAULT NULL,
  `quantidade` int(10) DEFAULT NULL,
  `descricao` text,
  `categoria_id` int(11) DEFAULT NULL,
  `usado` tinyint(1) DEFAULT '0'
)



-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nun_venda` int(11) NOT NULL,
  `data` date NOT NULL,
  `end_entrega` varchar(45) NOT NULL,
  `id_client` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `produto_cod_produto` int(11) NOT NULL,
  `vendedor` varchar(255) NOT NULL
)




--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'blocos'),
(2, 'tijolos'),
(3, 'calhas'),
(4, 'rufos'),
(5, 'tintas'),
(6, 'cimento'),
(7, 'lampada'),
(8, 'chuveiro'),
(9, 'construcao');



--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `categoria_id`, `usado`) VALUES
(28, 'dsgsdg', 44.00, 'dgddgg', NULL, 0),
(29, 'Espatula', 5.00, 'espatula para pintura', NULL, 0),
(31, 'Luvas', 5.00, 'Luvas para lavagem', 4, 0),
(32, 'Barra de Ferro', 37.00, 'Material de construÃ§Ã£o civil usado pelos pedreiros', 9, 1),
(33, 'Barra de Ferro', 37.00, 'Material de construÃ§Ã£o civil usado pelos pedreiros', 9, 1),
(34, 'Barra de Ferro', 37.00, 'Material de construÃ§Ã£o civil usado pelos pedreiros', 9, 1),
(35, 'Tijolo', 10.00, 'tijolo', 9, 0),
(36, 'cerrote', 9.00, 'cerro de madeira', 3, 1),
(37, 'ferro fundido', 21.00, 'ferro velho', 3, 0);


INSERT INTO `funcionario`(`nome`, `cpf`, `matricula` ,`cep`, `endereco`, `numero`, `complemento`, `bairro`, `estado`, `cargo`, `dataadmissao`, `datadesligamento`, `email`, `senha`, `perfil`,`telefone`) VALUES ('admin','123.123.123-12', '10', '17026-839', 'Rua Nilton Gimenes Bonachela, Núcleo Habitacional Nobuji Nagasawa', '307', 'teste', 'Núcleo Habitacional Nobuji Nagasawa', 'SP', 'admin', '2018-05-27' ,'','admin@admin.com','admin','2','014996726674')

commit