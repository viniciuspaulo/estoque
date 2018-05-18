-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Maio-2018 às 03:05
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 5.6.34

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
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idade` int(4) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor` double NOT NULL,
  `cnpj` int(11) NOT NULL,
  `produto_cod` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `cnpj` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `compra_cnpj` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `funcionario_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `adm` int(1) NOT NULL,
  `telefone` varchar(10) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`funcionario_id`, `nome`, `email`, `senha`, `adm`, `telefone`, `cep`, `rua`, `bairro`, `cidade`, `uf`) VALUES
(5, '', 'joaquim@tcc.com', '12345', 0, '', '', '', '', '', ''),
(6, 'joaquim', 'joaquimgarcia@tcc.com', '12345', 1, '', '', '', '', '', ''),
(7, 'rinaldo', 'rinaldo@tcc.com', '1234', 0, '', '', '', '', '', ''),
(16, 'Roberto Antonio da Silva', 'roberto@tcc.com', '2233', 1, '982713463', '22260-006', 'Rua SÃ£o Clemente', 'Botafogo', 'Rio de Janeiro', 'RJ'),
(17, 'Marito Buchinho', 'roberto@tcc.com', '12345', 1, '982713463', '22260-006', 'Rua SÃ£o Clemente', 'Botafogo', 'Rio de Janeiro', 'RJ'),
(18, 'Leandro Roberto', 'leandro@hotmail.com', '12345', 1, '8686868670', '22260-006', '...cinelandia', '...centro', 'Rio de Janeiro', 'RJ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_compra`
--

CREATE TABLE `item_compra` (
  `cod_produto` int(11) NOT NULL,
  `num_compra` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor` double NOT NULL,
  `compra_cnpj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_venda`
--

CREATE TABLE `item_venda` (
  `nun_venda` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor` double NOT NULL,
  `venda_num_venda` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `preco` double(10,2) DEFAULT NULL,
  `descricao` text,
  `categoria_id` int(11) DEFAULT NULL,
  `usado` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUser` int(11) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Dataregistro` varchar(45) NOT NULL,
  `Permissao` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUser`, `Username`, `Email`, `Password`, `Dataregistro`, `Permissao`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', '', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(250) NOT NULL,
  `telefone` int(100) NOT NULL,
  `cpf` int(10) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `adm` int(10) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`email`, `senha`, `nome`, `sobrenome`, `telefone`, `cpf`, `pais`, `estado`, `adm`, `id`) VALUES
('joaquim@tcc.com', '1234', 'joaquim', '', 0, 0, '', '', 1, 1),
('rinaldo@tcc.com', '12345', 'rinaldo', '', 0, 0, '', '', 0, 2),
('roberto@tcc.com', '666777', 'Roberto Antonio', 'Silva', 982713463, 8990076, 'usa', 'RJ', 0, 31);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariox`
--

CREATE TABLE `usuariox` (
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `cep` varchar(250) NOT NULL,
  `rua` varchar(250) NOT NULL,
  `bairro` varchar(250) NOT NULL,
  `cidade` varchar(250) NOT NULL,
  `uf` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `nun_venda` int(11) NOT NULL,
  `data` date NOT NULL,
  `end_entrega` varchar(45) NOT NULL,
  `id_client` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `produto_cod_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`cnpj`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`cnpj`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`funcionario_id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuariox`
--
ALTER TABLE `usuariox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`nun_venda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `cnpj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `cnpj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `funcionario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `usuariox`
--
ALTER TABLE `usuariox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `nun_venda` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
