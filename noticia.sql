-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Out-2024 às 22:33
-- Versão do servidor: 8.0.29
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `starssecrets`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE `noticia` (
  `id` int NOT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `conteudo` text NOT NULL,
  `data` date NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `nomeAutor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`id`, `categoria`, `conteudo`, `data`, `titulo`, `foto`, `nomeAutor`) VALUES
(5, NULL, 'No dia 1º de outubro, às 13 horas, o Campus de Telêmaco Borba será palco de um evento muito esperado: o IF Inclusão 2024! Com a participação das turmas AUT 1, INF 1, JOGOS 1, INF 2, MEC 2, AUT 3 e INF 3, a iniciativa promete promover a inclusão e a diversidade, destacando a importância da convivência entre todos os alunos. O evento ocorrerá no auditório do campus e contará com diversas atividades interativas, apresentações e uma troca enriquecedora de experiências. É uma oportunidade única para celebrar a diversidade e reforçar o compromisso do Instituto Federal com a inclusão. Não fique de fora! Venha participar e fazer parte desse momento especial. Juntos, vamos construir um ambiente mais acolhedor e inclusivo para todos!', '2024-10-03', 'Vem Aí o IF Inclusão 2024!', 'img/IF.png', NULL),
(7, NULL, 'A Mostra de Cursos do IFPR 2024 está chegando, e este ano promete ser ainda mais especial! Além de apresentar todos os cursos oferecidos pelo Instituto, trazendo detalhes sobre cada área de estudo, laboratórios e possibilidades de carreira, teremos uma novidade empolgante: uma competição entre as turmas pela melhor sala decorada. \r\n\r\nCada turma terá o desafio de trabalhar em conjunto para transformar suas salas de aula em espaços criativos, temáticos e inspiradores, que não apenas representem seus cursos, mas que também cativem e envolvam os visitantes. E o esforço valerá a pena! As salas mais bem decoradas serão premiadas, trazendo ainda mais entusiasmo para a competição e incentivando o trabalho em equipe.\r\n\r\nO principal objetivo dessa iniciativa é atrair mais atenção dos alunos e futuros estudantes, mostrando de forma divertida e dinâmica o que o IFPR tem a oferecer. Queremos que todos se sintam parte desse momento e percebam o quanto o Instituto Federal é um lugar acolhedor, inovador e repleto de oportunidades para crescimento pessoal e profissional.\r\n\r\nSeja para conhecer os cursos, se inspirar ou apoiar sua turma, não fique de fora! A Mostra de Cursos 2024 é uma chance imperdível de vivenciar o que o IFPR tem de melhor, além de estimular a criatividade e o espírito de equipe. Venha participar, descubra o que o IFPR pode fazer por você e ajude a construir um ambiente ainda mais vibrante e colaborativo!', '2024-11-13', 'Mostra de cursos 2024!', 'img/IF (1).png', NULL),
(8, NULL, 'O Instituto Federal do Paraná (IFPR) se uniu aos alunos para promover uma iniciativa especial: AdotaIF. Este evento visa ajudar a encontrar lares amorosos para os cães abandonados do nosso bairro. Em um momento de solidariedade e compromisso com a comunidade, convidamos todos a participar deste dia dedicado à adoção responsável.\r\n\r\nDurante o evento, os visitantes terão a oportunidade de conhecer os cães disponíveis para adoção, aprender sobre cuidados e responsabilidades de ter um animal de estimação e contribuir para uma causa nobre. Venha fazer a diferença na vida desses animais e traga sua família e amigos para um dia repleto de amor, carinho e novas amizades! Juntos, podemos proporcionar uma segunda chance para esses adoráveis cães!', '2024-10-03', 'AdotaIF: Uma Ação Solidária para a Adoção de Cães do Bairro!', 'img/animal.jpg', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
