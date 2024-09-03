-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 12-Ago-2024 às 08:13
-- Versão do servidor: 8.0.37-0ubuntu0.20.04.3
-- versão do PHP: 7.4.3-4ubuntu2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto a`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesse a sua conta`
--

CREATE TABLE `acesse a sua conta` (
  `id` int NOT NULL,
  `senha do usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha do email` varchar(100) NOT NULL,
  `endereço` varchar(100) NOT NULL,
  `telefone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ano de publicação`
--

CREATE TABLE `ano de publicação` (
  `id do manga` int NOT NULL,
  `data do lançamento` int NOT NULL,
  `editora do manga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro do produto`
--

CREATE TABLE `cadastro do produto` (
  `autor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `editora` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `codigo` int NOT NULL,
  `ano_de_publicacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tipo` enum('manga','genero','inicio','altas','ano') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat oline`
--

CREATE TABLE `chat oline` (
  `id` int NOT NULL,
  `mensagens` varchar(500) NOT NULL,
  `publicacao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero de mangas`
--

CREATE TABLE `genero de mangas` (
  `id dos mangas` int NOT NULL,
  `ação` int NOT NULL,
  `aventura` int NOT NULL,
  `terror` int NOT NULL,
  `romance` int NOT NULL,
  `em altas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista de mangas`
--

CREATE TABLE `lista de mangas` (
  `id dos manga` int NOT NULL,
  `genero do manga` varchar(100) NOT NULL,
  `autor do manga` varchar(100) NOT NULL,
  `ano de publicacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mangas em altas`
--

CREATE TABLE `mangas em altas` (
  `id dos manga` int NOT NULL,
  `avaliações do manga` varchar(100) NOT NULL,
  `numerro de visitas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagina inicial`
--

CREATE TABLE `pagina inicial` (
  `lista de mangas` varchar(100) NOT NULL,
  `genero do manga` varchar(30) NOT NULL,
  `mangas em alta` varchar(20) NOT NULL,
  `ano de publicacao` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `endereco` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `endereco`) VALUES
(1, '', '', '', '', ''),
(2, 'sfgh', 'dagdsay@gmail', '856', '998657854', 'xghvh'),
(3, 'twrttwe', 'djsbhhbd@gmail', 'errryh', '993242824', 'iehnngjle'),
(4, 'diego', 'hdienhek@gmail.com', 'gidot', '6662450012', 'cascavel'),
(5, 'marcio alves', 'aluno@viv.com.br', '324506', '45 984341149', 'rua ipe 72'),
(6, 'juao', 'tra@escola.pr', '496538', '459996851', 'cascavel'),
(7, 'tony', 'root@esagaa', 'escola', '220555632', 'juufhe');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acesse a sua conta`
--
ALTER TABLE `acesse a sua conta`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ano de publicação`
--
ALTER TABLE `ano de publicação`
  ADD PRIMARY KEY (`id do manga`);

--
-- Índices para tabela `cadastro do produto`
--
ALTER TABLE `cadastro do produto`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Índices para tabela `chat oline`
--
ALTER TABLE `chat oline`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `genero de mangas`
--
ALTER TABLE `genero de mangas`
  ADD PRIMARY KEY (`id dos mangas`);

--
-- Índices para tabela `lista de mangas`
--
ALTER TABLE `lista de mangas`
  ADD PRIMARY KEY (`id dos manga`);

--
-- Índices para tabela `mangas em altas`
--
ALTER TABLE `mangas em altas`
  ADD PRIMARY KEY (`id dos manga`);

--
-- Índices para tabela `pagina inicial`
--
ALTER TABLE `pagina inicial`
  ADD PRIMARY KEY (`lista de mangas`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acesse a sua conta`
--
ALTER TABLE `acesse a sua conta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro do produto`
--
ALTER TABLE `cadastro do produto`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `genero de mangas`
--
ALTER TABLE `genero de mangas`
  MODIFY `id dos mangas` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lista de mangas`
--
ALTER TABLE `lista de mangas`
  MODIFY `id dos manga` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mangas em altas`
--
ALTER TABLE `mangas em altas`
  MODIFY `id dos manga` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
