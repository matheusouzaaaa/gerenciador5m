-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql01-farm59.uni5.net
-- Tempo de geração: 10/04/2018 às 20:48
-- Versão do servidor: 5.5.43-log
-- Versão do PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `falcon5m28`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_chat`
--

CREATE TABLE IF NOT EXISTS `tb_chat` (
  `id` int(16) NOT NULL,
  `tb_usuarios_id` int(16) NOT NULL,
  `data` date DEFAULT NULL,
  `horario` varchar(5) DEFAULT NULL,
  `texto` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_clientes`
--

CREATE TABLE IF NOT EXISTS `tb_clientes` (
  `id` int(16) NOT NULL,
  `nome` varchar(155) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`id`, `nome`) VALUES
(1, 'Falcon5M'),
(4, 'Matheus Souza'),
(5, 'Maysul'),
(6, 'Atitude Eco'),
(7, 'Área Gestão Imobiliária'),
(8, 'Compostchêra'),
(9, 'Cia dos Cartuchos'),
(10, 'UFRGS'),
(11, 'Ciex do Brasil'),
(12, 'SINDAGRI/RS'),
(13, 'Solare Investimentos'),
(14, 'Samuel Silveira Music'),
(15, 'Eco Delivery Sul - Higienização de interiores'),
(16, 'Rancho Online'),
(17, 'Professionalità'),
(18, 'Aury Lopes'),
(19, 'APROPENS'),
(20, 'Compre no Litoral'),
(21, 'RM Imperatriz'),
(22, '2M Notícias'),
(23, '3º Registro de Títulos e Documentos'),
(24, 'Aea Assessoria Administrativa'),
(25, 'Aditiva Nutrition'),
(26, 'AGBAN'),
(27, 'AKS nformática'),
(28, 'Alternativa'),
(29, 'Ambiental'),
(30, 'Ana Iurtchenko'),
(31, 'Andorra Café'),
(32, 'Andre Ronaldo Froehlich'),
(33, 'André Saute'),
(34, 'Anfitrião Quartos'),
(35, 'Angela Heringer'),
(36, 'Angelo Pretto'),
(37, 'Angulo Empreiteira'),
(38, 'Artefatos Confiança'),
(39, 'Art Persianas'),
(40, 'Arv Advogados'),
(41, 'Arventus'),
(42, 'ASEMARGS'),
(43, 'Audimax'),
(44, 'Baixinho dos Trailers'),
(45, 'Barbieri'),
(46, 'Basalto Casa Nova'),
(47, 'Basser'),
(48, 'Becker Hauz Paz'),
(49, 'Bedin Contabilidade'),
(50, 'Bella Vitta'),
(51, 'Boff Advogados'),
(52, 'Caça e Pesca'),
(53, 'Câmera de Vereadores - Santa Rita'),
(54, 'Cartório 2 Zona'),
(55, 'Cellebra Eventos'),
(56, 'Central Auto Peças'),
(57, 'CEOT RS'),
(58, 'Cezar de Lima'),
(59, 'CFC Superior'),
(60, 'Churrascaria Santo Antonio'),
(61, 'CK Brindes'),
(62, 'Clínica de Geriatria Porto Alegre'),
(63, 'Clínica Gramado'),
(64, 'Coelho e Matos'),
(65, 'Consabe iPGS'),
(66, 'CORE RS'),
(67, 'Cotou Fechou Seguros'),
(68, 'Daniela Brasil'),
(69, 'David Aguirre'),
(70, 'Daysi Anne Persianas'),
(71, 'Desentupidora Ricardo'),
(72, 'Dimenino'),
(73, 'Editora Paixão'),
(74, 'Elétrica Prates'),
(75, 'EMI'),
(76, 'Empório do Cabelo e Perucas'),
(77, 'Encoin'),
(78, 'Erico Santos'),
(79, 'Estilo Casarão'),
(80, 'Fabiano Antunes'),
(81, 'Fabiola'),
(82, 'Fabrício Brinco'),
(83, 'Farmácia Saracura'),
(84, 'Ferauto Veículos'),
(85, 'FIVEIT'),
(86, 'Gamak'),
(87, 'Geraldo Gama'),
(88, 'Grêmio Vencedor'),
(89, 'Hertz Nutrition'),
(90, 'Iamau Supra'),
(91, 'IBH Recuperação de Dados'),
(92, 'iFace Group'),
(93, 'InstalSystem'),
(94, 'iPGS'),
(95, 'KM Química'),
(96, 'LBF Engenharia'),
(97, 'Master Class Turismo'),
(98, 'MedCorp'),
(99, 'Metalring'),
(100, 'Mister Chopp'),
(101, 'Mobiliscar'),
(102, 'Ponte do Guaíba'),
(103, 'Pontelos'),
(104, 'Porto Alegrense Seguros'),
(105, 'RB Engenharia'),
(106, 'Vecchio e Associados'),
(107, 'Zanata Digital'),
(108, 'Zarek');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_equipes`
--

CREATE TABLE IF NOT EXISTS `tb_equipes` (
  `id` int(16) NOT NULL,
  `nome` varchar(155) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tb_equipes`
--

INSERT INTO `tb_equipes` (`id`, `nome`) VALUES
(1, 'Falcon5M');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_mural`
--

CREATE TABLE IF NOT EXISTS `tb_mural` (
  `id` int(11) NOT NULL,
  `comentario` text CHARACTER SET utf8 NOT NULL,
  `data_cadastro` date DEFAULT NULL,
  `tb_usuarios_id` int(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tb_mural`
--

INSERT INTO `tb_mural` (`id`, `comentario`, `data_cadastro`, `tb_usuarios_id`) VALUES
(1, 'Teste', '2017-03-23', 1),
(2, 'Olá', '2017-03-23', 5),
(3, 'Fala gurizada', '2017-03-23', 2),
(4, 'Teste com a data', '2017-03-23', 1),
(5, 'testando novamente', '2017-06-14', 5),
(6, 'Telefone cliente X = 33849714', '2017-06-26', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_projetos`
--

CREATE TABLE IF NOT EXISTS `tb_projetos` (
  `id` int(16) NOT NULL,
  `nome` varchar(155) CHARACTER SET utf8 DEFAULT NULL,
  `tb_clientes_id` int(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tb_projetos`
--

INSERT INTO `tb_projetos` (`id`, `nome`, `tb_clientes_id`) VALUES
(1, 'TCC Matheus Souza', 4),
(2, 'Maysul', 5),
(3, 'Atitude Eco', 6),
(4, 'Área Gestão Imobiliária', 7),
(5, 'Compostchêra', 8),
(6, 'Cia dos Cartuchos', 9),
(7, 'UFRGS', 10),
(8, 'Ciex do Brasil', 11),
(9, 'SINDAGRI/RS', 12),
(10, 'Samuel Silveira Music', 14),
(11, 'Solare Investimentos', 13),
(14, 'Eco Delivery Sul - Higienização de interiores', 15),
(15, 'Rancho Online', 16),
(16, 'Professionalità', 17),
(17, 'Aury Lopes', 18),
(18, 'APROPENS', 19),
(19, 'Compre no Litoral', 20),
(20, 'RM Imperatriz', 21),
(21, '2M Notícias', 22),
(22, '3º Registro de Títulos e Documentos', 23),
(23, 'Aditiva Nutrition', 25),
(24, 'Aea Assessoria Administrativa', 24),
(25, 'AGBAN', 26),
(26, 'AKS nformática', 27),
(27, 'Alternativa', 28),
(28, 'Ambiental', 29),
(29, 'Ana Iurtchenko', 30),
(30, 'Andorra Café', 31),
(31, 'Andre Ronaldo Froehlich', 32),
(32, 'André Saute', 33),
(33, 'Anfitrião Quartos', 34),
(34, 'Angela Heringer', 35),
(35, 'Angelo Pretto', 36),
(36, 'Angulo Empreiteira', 37),
(37, 'Art Persianas', 39),
(38, 'Artefatos Confiança', 38),
(39, 'Arv Advogados', 40),
(40, 'Arventus', 41),
(41, 'ASEMARGS', 42),
(42, 'Audimax', 43),
(43, 'Baixinho dos Trailers', 44),
(44, 'Barbieri', 45),
(45, 'Basalto Casa Nova', 46),
(46, 'Basser', 47),
(47, 'Becker Hauz Paz', 48),
(48, 'Bedin Contabilidade', 49),
(49, 'Bella Vitta', 50),
(50, 'Boff Advogados', 51),
(51, 'Caça e Pesca', 52),
(52, 'Câmera de Vereadores - Santa Rita', 53),
(53, 'Cartório 2 Zona', 54),
(54, 'Cellebra Eventos', 55),
(55, 'Central Auto Peças', 56),
(56, 'CEOT RS', 57),
(57, 'Cezar de Lima', 58),
(58, 'CFC Superior', 59),
(59, 'Churrascaria Santo Antonio', 60),
(60, 'CK Brindes', 61),
(61, 'Clínica de Geriatria Porto Alegre', 62),
(62, 'Clínica Gramado', 63),
(63, 'Coelho e Matos', 64),
(64, 'Consabe iPGS', 65),
(65, 'CORE RS', 66),
(66, 'Cotou Fechou Seguros', 67),
(67, 'Daniela Brasil', 68),
(68, 'David Aguirre', 69),
(69, 'Daysi Anne Persianas', 70),
(70, 'Desentupidora Ricardo', 71),
(71, 'Dimenino', 72),
(72, 'Editora Paixão', 73),
(73, 'Elétrica Prates', 74),
(74, 'EMI', 75),
(75, 'Empório do Cabelo e Perucas', 76),
(76, 'Encoin', 77),
(77, 'Erico Santos', 78),
(78, 'Estilo Casarão', 79),
(79, 'Fabiano Antunes', 80),
(80, 'Fabiola', 81),
(81, 'Fabrício Brinco', 82),
(82, 'Farmácia Saracura', 83),
(83, 'Ferauto Veículos', 84),
(84, 'FIVEIT', 85),
(85, 'Gamak', 86),
(86, 'Geraldo Gama', 87),
(87, 'Grêmio Vencedor', 88),
(88, 'Hertz Nutrition', 89),
(89, 'Iamau Supra', 90),
(90, 'IBH Recuperação de Dados', 91),
(91, 'iFace Group', 92),
(92, 'InstalSystem', 93),
(93, 'iPGS', 94),
(94, 'KM Química', 95),
(95, 'LBF Engenharia', 96),
(96, 'Master Class Turismo', 97),
(97, 'MedCorp', 98),
(98, 'Metalring', 99),
(99, 'Mister Chopp', 100),
(100, 'Mobiliscar', 101),
(101, 'Ponte do Guaíba', 102),
(102, 'Pontelos', 103),
(103, 'Porto Alegrense Seguros', 104),
(104, 'RB Engenharia', 105),
(105, 'Vecchio e Associados', 106),
(106, 'Zanata Digital', 107),
(107, 'Zarek', 108);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_tarefas`
--

CREATE TABLE IF NOT EXISTS `tb_tarefas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(155) CHARACTER SET utf8 DEFAULT NULL,
  `descricao` text CHARACTER SET utf8,
  `data_cadastro` date DEFAULT NULL,
  `data_final` date DEFAULT NULL,
  `hora_cadastro` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `dia_entrega` int(2) unsigned zerofill DEFAULT NULL,
  `mes_entrega` int(2) unsigned zerofill DEFAULT NULL,
  `ano_entrega` int(16) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `usuario_cadastra` int(16) DEFAULT NULL,
  `tb_usuarios_id` int(16) NOT NULL,
  `tb_tarefas_tipo_id` int(16) NOT NULL,
  `tb_projetos_id` int(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tb_tarefas`
--

INSERT INTO `tb_tarefas` (`id`, `titulo`, `descricao`, `data_cadastro`, `data_final`, `hora_cadastro`, `hora_final`, `dia_entrega`, `mes_entrega`, `ano_entrega`, `status`, `usuario_cadastra`, `tb_usuarios_id`, `tb_tarefas_tipo_id`, `tb_projetos_id`) VALUES
(21, 'Criação de tarefas com outro usuário', 'Teste de tarefa criada pelo usuário Henrik', '2016-10-24', '2016-10-24', '21:36:00', '21:39:00', 24, 10, 2016, 1, 2, 2, 5, 1),
(22, 'Criação de tarefas para outro usuário ', 'Tarefa criada pelo Matheus para o Henrik', '2016-10-24', '2017-06-06', '21:37:00', '15:32:00', 06, 06, 2017, 1, 1, 2, 5, 1),
(23, 'Criação de tarefas para o outro usuário', 'Tarefa criada pelo Henrik para o Matheus', '2016-10-24', '2016-11-12', '21:38:00', '15:40:00', 12, 11, 2016, 1, 2, 1, 5, 1),
(24, 'Teste Layout 1', 'Alguns testes da implementação do Layout com o sistema já desenvolvido até o momento', '2016-11-02', '2016-11-12', '17:54:00', '15:40:00', 12, 11, 2016, 1, 1, 1, 5, 1),
(25, 'Teste de Layout 2', 'Outros testes de implementação do layout com o sistema já desenvolvido', '2016-11-02', '2016-11-12', '17:54:00', '15:40:00', 12, 11, 2016, 1, 1, 1, 5, 1),
(28, 'Teste de Criação de Nova Tarefa com Layout Implementado', 'Teste de Criação de Nova Tarefa com Layout Implementado', '2016-11-02', '2016-11-12', '18:46:00', '15:38:00', 12, 11, 2016, 1, 1, 1, 5, 1),
(29, 'Teste de Finalização de Tarefa', 'Teste de finalização da tarefa com o layout implementado', '2016-11-02', '2016-11-12', '18:58:00', '16:00:00', 12, 11, 2016, 1, 1, 1, 5, 1),
(30, 'Tarefa pro Henrik', 'Tarefa pro Henriik', '2016-11-02', '2017-03-03', '20:55:00', '17:16:00', 03, 03, 2017, 1, 1, 2, 5, 1),
(33, 'Teste Horário', 'Teste horário criação', '2016-11-03', '2016-11-03', '09:03:00', '09:11:00', 03, 11, 2016, 1, 1, 1, 5, 1),
(34, 'Teste inserção sem comentários', 'Teste de inserção sem comentários', '2016-11-12', '2016-11-12', '14:07:00', '15:40:00', 12, 11, 2016, 1, 1, 1, 5, 1),
(35, 'Apresentação do TCC para a Banca 1', 'O aluno Matheus dos Santos Souza deve apresentar seu projeto parcial para a banca de TCC no dia 19/11/2016 às 09:40', '2016-11-12', '2016-12-31', '15:49:00', '21:52:00', 31, 12, 2016, 1, 1, 1, 5, 1),
(37, 'Alterações diárias', 'Vou realizar alterações no dia  20/04/2017', '2017-04-20', '2017-05-10', '17:51:00', '21:02:00', 10, 05, 2017, 1, 1, 2, 5, 1),
(38, 'Implementação do Tipo de Tarefa', 'Implementar o cadastro do tipo de tarefa', '2016-11-17', '2016-11-17', '19:08:00', '19:13:00', 17, 11, 2016, 1, 1, 1, 5, 1),
(39, 'Teste de Criação de Nova Tarefa com um Tipo de Tarefa Implementado', '.', '2016-11-17', '2016-11-17', '19:09:00', '19:13:00', 17, 11, 2016, 1, 1, 1, 5, 1),
(40, 'Implementar o Cadastro e Listagem de Usuários', 'Implementar o Cadastro, Listagem e Edição de Usuários', '2016-11-17', '2016-11-17', '19:15:00', '19:57:00', 17, 11, 2016, 1, 1, 1, 5, 1),
(41, 'Teste final de ordenação', '.', '2016-11-17', '2016-11-17', '19:57:00', '19:58:00', 17, 11, 2016, 1, 1, 1, 5, 1),
(42, 'Banca de TCC 1', 'O aluno Matheus dos Santos Souza irá apresentar se u projeto na Banca de TCC 1', '2016-11-19', '2016-11-19', '09:00:00', '09:20:00', 19, 11, 2016, 1, 1, 1, 7, 1),
(43, 'Arrumar o Time do Manchester', 'Arrumar o posicionamento, formação e etc', '2016-12-03', '2016-12-03', '00:08:00', '00:09:00', 03, 12, 2016, 1, 1, 1, 5, 1),
(44, 'Realizar o cadastro, listagem e edição dos clientes.', 'Realizar a inserção dos dados do cliente no banco de dados.', '2017-01-21', '2017-01-21', '23:13:00', '23:49:00', 21, 01, 2017, 1, 1, 1, 5, 1),
(45, 'Realizar o cadastro, listagem e edição dos projetos.', 'Realizar o cadastro, listagem e edição dos projetos.', '2017-01-21', '2017-01-21', '23:14:00', '23:49:00', 21, 01, 2017, 1, 1, 1, 5, 1),
(47, 'Criação do Lista Usuários', 'Criar a opção de listar os usuários no menu usuários', '2017-01-21', '2017-01-21', '23:29:00', '23:49:00', 21, 01, 2017, 1, 1, 1, 5, 1),
(48, 'Alteração página Tarefas', 'Criar uma estrutura caso o usuário não tenha nenhuma tarefa criada.', '2017-01-22', '2017-03-03', '01:25:00', '16:42:00', 03, 03, 2017, 1, 1, 1, 5, 1),
(49, 'Alteração no "Configurações"', 'Quando o usuário clicar no "configurações" permitir o mesmo a editar seus dados cadastrais', '2017-01-22', '2017-03-03', '03:29:00', '16:10:00', 03, 03, 2017, 1, 1, 1, 5, 1),
(50, 'Alterar a estrutura da página de tarefas', 'Criar um "tab" com as tarefas já entregues pelo usuário.', '2017-01-22', '2017-03-03', '03:33:00', '16:55:00', 03, 03, 2017, 1, 1, 1, 5, 1),
(51, 'alterações das tarefas ', 'Realizar a implementação da funcionalidade de visualizar as tarefas dos outros usuários ', '2017-01-22', '2017-03-23', '03:35:00', '21:11:00', 23, 03, 2017, 1, 1, 1, 5, 1),
(52, 'Editar a página de Login - 24/02/2017', 'Editar a página de login colocando o logo da aplicação e personalizando as cores conforme as cores da identidade visual.', '2017-02-24', '2017-04-25', '21:31:00', '15:18:00', 25, 04, 2017, 1, 1, 1, 5, 1),
(53, 'Tarefa cadastrada pelo Henrik', '', '2017-02-27', '2017-02-27', '17:40:00', '17:42:00', 27, 02, 2017, 1, 1, 2, 2, 1),
(54, 'Colocar o botão "Nova Tarefa" próximo ao botão "Logout"', 'Colocar o botão para que o usuário possa criar uma nova tarefa no top nav ao lado do botão Logout. ', '2017-02-27', '2017-03-03', '17:53:00', '16:13:00', 03, 03, 2017, 1, 1, 1, 5, 1),
(55, 'Alterações - Página Tarefas - 25/03/2017', 'Colocar um botão para o usuário poder editar a descrição da tarefa. E realizar o update das informações. Falta só alterar o usuário', '2017-03-03', '2017-04-25', '17:20:00', '21:56:00', 25, 04, 2017, 1, 1, 1, 5, 1),
(56, 'Alterar os selects dos cadastros.', 'Alterar os selects dos cadastros por aqueles selects que tu pode selecionar ou escrever a informação.', '2017-03-23', '2017-03-23', '11:41:00', '21:05:00', 23, 03, 2017, 1, 1, 1, 5, 1),
(57, 'Revisar os códigos de cadastros', 'Revisar a codificação dos cadastros dos produtos.', '2017-03-23', '2017-03-23', '11:43:00', '21:03:00', 23, 03, 2017, 1, 1, 1, 5, 1),
(58, 'Implementar o Mural', 'Implementar o mural que vai ser o local aonde os usuários vão poder interagir salvando informações importantes e pertinentes', '2017-03-23', '2017-03-23', '20:45:00', '22:04:00', 23, 03, 2017, 1, 1, 1, 5, 1),
(59, 'Implementar o menu Administrar - 23/03/2017', '', '2017-03-23', '2017-04-25', '20:48:00', '15:17:00', 25, 04, 2017, 1, 1, 1, 5, 1),
(60, 'Alterações Gerais - TCC - 23/03/2017', 'Melhorar a usabilidade e navegabilidade do sistema', '2017-03-23', '2017-03-23', '21:05:00', '22:23:00', 23, 03, 2017, 1, 1, 1, 5, 1),
(61, 'Arrumar CSS - TCC - 23/03/2017', 'Colocar os styles em classes do CSS', '2017-03-23', '2017-03-23', '22:18:00', '22:56:00', 23, 03, 2017, 1, 1, 1, 5, 1),
(62, 'Implementar Gráficos - TCC - 25/04/2017', 'Implementar gráficos no TCC', '2017-03-23', '2017-05-22', '22:57:00', '16:27:00', 22, 05, 2017, 1, 1, 1, 5, 1),
(63, 'Criar logo ', 'Criar logo para o gerenciador 5M', '2017-03-24', '2017-03-24', '09:58:00', '09:59:00', 24, 03, 2017, 1, 5, 5, 4, 1),
(64, 'Arrumar Relatório Parcial - TCC - 07/04/2017', 'Arrumar as anotações feitas pelo professor Fábio Dal Osto e mais as considerações informadas pela minha orientadora Sirlei.', '2017-04-07', '2017-04-25', '22:15:00', '15:17:00', 25, 04, 2017, 1, 1, 1, 5, 1),
(65, 'Atualizar imagens do Relatório Atualizado', 'Atualizar as imagens da modelagem de banco de dados e todas as outras imagens da seção de funcionamento do sistema.', '2017-04-08', '2017-04-25', '11:51:00', '15:16:00', 25, 04, 2017, 1, 1, 1, 5, 1),
(66, 'Alterar fonte para Arial.', '', '2017-04-25', '2017-04-25', '15:32:00', '21:10:00', 25, 04, 2017, 1, 1, 1, 5, 1),
(67, 'Ensaiar apresentação Banca', 'Ensaiar a apresentação da banca. Para poder explicar toda as sprints e demonstrar o sistema em 10min,', '2017-04-25', '2017-04-25', '20:41:00', '21:09:00', 25, 04, 2017, 1, 1, 1, 5, 1),
(68, 'Implementar Filtros - TCC - 25/04/2017', 'Implementar os filtros na página de Tarefas entregues. Fazer os filtros por Tipos de Tarefas.', '2017-04-25', '2017-04-25', '22:00:00', '22:39:00', 25, 04, 2017, 1, 1, 1, 5, 1),
(69, 'Apresentação Banca de Seminário de Andamento.', 'O aluno Matheus dos Santos Souza vai apresentar o seu projeto na Banca de Seminário de Andamento, no dia 27/04/2017 às 19:00.', '2017-04-26', '2017-04-27', '22:37:00', '19:32:00', 27, 04, 2017, 1, 1, 1, 7, 1),
(70, 'Alterações - Maysul - 06/06/2017', 'Matheus, pode usar estas imagens em anexo para inserir na rolagem das fotos e abaixo as marcas que revendemos são.\r\n \r\nTupy conexões\r\nEmmeti\r\nClesse do Brasil\r\nAmanco\r\nAépio medidores\r\nDaeflex medidores\r\nFrialen\r\nAliança reguladores', '2017-06-06', '2017-06-06', '15:00:00', '16:16:00', 06, 06, 2017, 1, 1, 1, 8, 2),
(71, 'Alterações - Atitude Eco - 06/06/2017', 'Gostaria que colocassem no final do Site as bandeiras do BNDES , PROGER , Bancos e cartoes de credito', '2017-06-06', '2017-06-06', '15:01:00', '15:29:00', 06, 06, 2017, 1, 1, 1, 8, 3),
(72, 'Criação de Usuário - Área Gestão Imobiliária - 06/06/2017', 'Criar um usuário para a Geruza.', '2017-06-06', '2017-06-06', '15:33:00', '16:10:00', 06, 06, 2017, 1, 2, 2, 8, 4),
(73, 'Desenvolvimento Layout - Compostchêra - 06/06/2017', '', '2017-06-06', '2017-06-06', '15:35:00', '17:38:00', 06, 06, 2017, 1, 2, 2, 9, 5),
(74, 'Alterações - Cia dos Cartuchos', '', '2017-06-06', '2017-06-07', '16:18:00', '16:10:00', 07, 06, 2017, 1, 2, 2, 8, 6),
(75, 'Alterações - PPGEdu', '', '2017-06-06', '2017-06-09', '16:19:00', '10:45:00', 09, 06, 2017, 1, 2, 2, 8, 7),
(76, 'Alterações - Ciex do Brasil', '', '2017-06-06', '2017-06-08', '16:20:00', '16:58:00', 08, 06, 2017, 1, 2, 2, 8, 8),
(77, 'Migração de Site e E-mail - SINDAGRI/RS', '', '2017-06-06', '2017-06-06', '16:44:00', '17:34:00', 06, 06, 2017, 1, 1, 1, 10, 9),
(78, 'Alterações - Atitude Eco - 06/06/2017', 'Vamos ao próximo passo.\r\n\r\nDá uma melhorada no logo que ficou na parte inferior. Ficou meio apagado', '2017-06-06', '2017-06-08', '17:36:00', '14:12:00', 08, 06, 2017, 1, 1, 1, 8, 3),
(80, 'Treinamento Painel - Samuel Silveira Music - 07/06/2017', 'Cliente ligará as 14h', '2017-06-07', '2017-06-07', '10:42:00', '14:07:00', 07, 06, 2017, 1, 1, 1, 12, 10),
(81, 'Verificar Funções - Samuel Silveira', '', '2017-06-07', '2017-06-07', '10:45:00', '12:58:00', 07, 06, 2017, 1, 1, 1, 8, 10),
(83, 'Migração de Site - Solare Investimentos', 'Migração de Site - Solare Investimentos', '2017-06-07', '2017-06-07', '10:46:00', '13:00:00', 07, 06, 2017, 1, 2, 2, 10, 11),
(84, 'Alterações Usabilidade - TCC - 07/06/2017', 'Verificar TABS, nos formulários (ir de um campo para outro).\r\nRealizar alguma opção de fazer o usuário cadastrar um cliente e projeto na própria criação de tarefas.\r\nValidação dos formulários.', '2017-06-07', '2017-06-07', '10:47:00', '17:16:00', 07, 06, 2017, 1, 1, 1, 5, 1),
(85, 'Alteração capa', 'Alterar capa para Eco Delivery em razão do dia dos namorados', '2017-06-07', '2017-06-14', '11:03:00', '10:06:00', 14, 06, 2017, 1, 5, 5, 11, 14),
(86, 'imagens ppgedu', 'imagens para home do site', '2017-06-07', '2017-06-07', '11:28:00', '16:18:00', 07, 06, 2017, 1, 5, 5, 4, 7),
(87, 'Alterações - Rancho Online - 07/06/2017', 'Bom dia,\r\nConforme tratado via telefone seguem as alterações propostas:\r\n- Centralizar verticalmente a barra de pesquisa.\r\n- Novos produtos Destaques Ofertas centralizado na página.\r\n- Remoção do título "Novos produtos" quando selecionado, vale também para "Destaques" e "Ofertas", mas manter o texto.\r\n- Manter o centro do o e-mail igual ao centro do logo. Assim como o centro do "entrar ou criar uma conta" no centro do coração, do carrinho e do R$.  \r\n- Aumentar o número de itens na lista de compras até o limite da norma.\r\n- Mudar a parte dos blocos "Atendimento diferenciado", "Excelência no serviço prestado", "Economize seu tempo", "Entrega até às 22h", para uma estrutura similar a "Nossas soluções" do site da Falcon. Incluindo um fundo que mude conforme a rolagem do scroll.\r\n\r\nEm caso de dúvida entre em contato conosco, a qualquer horário.\r\nGrato.', '2017-06-07', '2017-06-08', '13:08:00', '16:27:00', 08, 06, 2017, 1, 1, 1, 8, 15),
(88, 'Alterações - Professionalità - 07/06/2017', 'Boa tarde Matheus, pode por favor incluir no formulário ORÇAMENTO o item de preenchimento TELEFONE. Muitas pessoas nos informam o e-mail errado e temos dificuldade em encontrá-las. \r\n\r\nObrigada,\r\nFernanda.\r\n\r\n____________________________________________________________\r\n\r\nMatheus, no formulário do fale conosco e nos demais canais do nosso site, também, se for possível, acrescenta este item.\r\n\r\nObrigada!\r\nFernanda', '2017-06-07', '2017-06-08', '13:09:00', '16:45:00', 08, 06, 2017, 1, 1, 1, 8, 16),
(89, 'Alterações - Maysul - 07/06/2017', 'Boa tarde Matheus,\r\nQuero acrescentar este link para os clientes pesquisarem as peças. https://tupy.collabo.com.br/pt/catalog/', '2017-06-07', '2017-06-12', '14:32:00', '17:21:00', 12, 06, 2017, 1, 1, 1, 8, 2),
(113, 'Alterações - Aury Lopes - 08/06/2017', 'colocar logo centralizado no slide \r\nretirar circulo em volta do icone do telefone \r\nalterar fontes do menu \r\nretirar informações de contato no rodapé do slide \r\ntrocar foto do fundo do slide \r\ntirar o filtro do slide \r\nfonte do menu tem que ser a mesma do logo \r\nretirar a foto sobreposta e deixar uma só \r\nretirar sobre nós \r\nretirar icones em áreas de atuação. \r\nretirar foto do martelo em áreas de atuação; \r\npadronizar todas as fontes do site \r\nalterar "nossa equipe" para sócios \r\ndeixar a seção mais escura "cinza" \r\nretirar "drs" \r\ncolocar vitor por último \r\nalterar a identidade visual do site para cinza \r\nretirar formulário de fale conosco da página principal \r\ncolocar mapa na seção de contato na página inicial \r\nalterar menu mídia para "publicações" \r\ncolocar um botão abaixo do aury lopes para curriculo', '2017-06-08', '2017-06-09', '13:09:00', '15:36:00', 09, 06, 2017, 1, 1, 1, 8, 17),
(114, 'Verificação de Loja Virtual - Maysul - 08/06/2017', 'Matheus, me diga se consigo criar este e-commerce para a Maysul dentro do nosso site..  \r\n \r\nhttps://tupy.collabo.com.br/pt/faq/howtoquote/', '2017-06-08', '2017-06-12', '13:35:00', '17:21:00', 12, 06, 2017, 1, 1, 1, 8, 2),
(115, 'Migração de Site - APROPENS', '', '2017-06-08', '2017-06-08', '13:37:00', '15:14:00', 08, 06, 2017, 1, 1, 2, 10, 18),
(116, 'Criação das Páginas Internas - Atitude Eco - 08/06/2017', 'Criar as páginas internas com o conteúdo enviado pelo cliente no documento Site.docx', '2017-06-08', '2017-06-12', '16:56:00', '15:58:00', 12, 06, 2017, 1, 1, 1, 13, 3),
(117, 'Implementação do Chat - TCC', '', '2017-06-08', '2017-06-08', '22:18:00', '22:39:00', 08, 06, 2017, 1, 1, 1, 5, 1),
(118, 'Alterações de Layout - TCC ', '', '2017-06-08', '2017-06-08', '22:19:00', '22:39:00', 08, 06, 2017, 1, 1, 1, 5, 1),
(119, 'Alteração de Formulário - Solare Investimentos - 09/06/2017', '', '2017-06-09', '2017-06-09', '09:42:00', '09:46:00', 09, 06, 2017, 1, 1, 1, 8, 11),
(120, 'Alterações - Cia dos Cartuchos', '', '2017-06-09', '2017-06-09', '10:44:00', '12:48:00', 09, 06, 2017, 1, 2, 2, 8, 6),
(121, 'Alterações - Samuel Silveira', '', '2017-06-09', '2017-06-09', '11:12:00', '11:13:00', 09, 06, 2017, 1, 1, 1, 8, 10),
(122, 'Alterações - Compre no Litoral', '', '2017-06-09', '2017-06-09', '11:44:00', '13:00:00', 09, 06, 2017, 1, 1, 1, 8, 19),
(123, 'Alterações - Solare Investimentos - 09/06/2017', '', '2017-06-09', '2017-06-09', '13:13:00', '14:47:00', 09, 06, 2017, 1, 2, 2, 8, 11),
(124, 'Alteração - RM Imperatriz', '', '2017-06-09', '2017-06-12', '14:48:00', '10:00:00', 12, 06, 2017, 1, 2, 2, 8, 20),
(125, 'Alteração de Logo - Samuel Silveira Music - 12/06/2017', '', '2017-06-12', '2017-06-12', '10:01:00', '11:19:00', 12, 06, 2017, 1, 1, 1, 4, 10),
(126, 'Realizar configurações - Atitude Eco - 12/06/2017', '', '2017-06-12', '2017-06-12', '11:19:00', '13:13:00', 12, 06, 2017, 1, 1, 1, 8, 3),
(127, 'Verificar Documentação - TCC - 13/06/2017', 'Verificar toda a documentação para deixar tudo OK.', '2017-06-13', '2017-06-19', '11:12:00', '09:38:00', 19, 06, 2017, 1, 1, 1, 5, 1),
(128, 'Analisar Questionário - TCC - 13/06/2017', 'Analisar as respostas dos meus colegas e escrever isso no documento', '2017-06-13', '2017-06-16', '11:12:00', '15:59:00', 16, 06, 2017, 1, 1, 1, 5, 1),
(129, 'Alterar Imagens do Documento - TCC - 13/06/2017', '', '2017-06-13', '2017-06-14', '13:21:00', '13:19:00', 14, 06, 2017, 1, 1, 1, 5, 1),
(130, 'Completar Sprints - TCC - 13/06/2017', '', '2017-06-13', '2017-06-14', '13:22:00', '10:53:00', 14, 06, 2017, 1, 1, 1, 5, 1),
(131, 'Inserção de Imagens - TCC - 13/06/2017', 'Inserir as imagens na página interna do Aury Lopes', '2017-06-13', '2017-06-13', '13:55:00', '16:09:00', 13, 06, 2017, 1, 1, 1, 8, 17),
(132, 'Alterações - Atitude Eco - 13/06/2017', 'Alterações:\r\n\r\n1- Remover a aba ( missão,visão, valores).\r\n2- alterar a foto por uma mais a ver com o tema, com moinhos eólicos e placas e tal.\r\nImagem inline 1\r\n3- Remover gráfico e colocar outra imagem.( exemplo em anexo)\r\nImagem inline 2 \r\n\r\n\r\n\r\n\r\n\r\n\r\n4- Adicionar texto na aba Benefícios;\r\n\r\nRedução de Co2 no planeta:\r\n\r\nAlém da economia no bolso, a energia solar é limpa, renovável e traz inúmeros benefícios como a redução na emissão de CO2. \r\nUma usina solar de 100 MWp, por exemplo, é capaz de gerar energia para 20 mil casas e evitar o lançamento de 175 mil toneladas de CO2 na atmosfera.\r\nA maioria das análises de caminhos de baixo carbono considera o que precisa ser feito para atingir os ambiciosos objetivos climáticos, como o de manter o aquecimento global abaixo dos 2° C. Aqui olhamos o que aconteceria com o sistema energético global e a temperatura global se as opções de menor custo fossem implementadas, à luz das últimas projeções de custos da energia solar fotovoltaica e dos veículos elétricos.\r\n\r\n\r\n5- Preparando se para Carros Elétricos:\r\n\r\n Os veículos elétricos estão crescendo atualmente a uma taxa de 60% ano-em-ano e já há mais de um milhão deles nas estradas. Os custos das baterias caíram 73% para US$ 268 / kWh nos sete anos até 2015 de acordo com o Departamento de Energia dos EUA, e a Tesla, fabricante de carros elétricos, prevê que eles chegarão a US$ 100 / kWh até 2020. Os cenários deste estudo assumem que os veículos elétricos serão mais baratos que os convencionais a partir de 2020. O relatório conclui que os veículos elétricos poderiam ter um quinto do mercado de transporte rodoviário em 2030 e, com o crescimento adicional em carros de hidrogênio e híbridos de óleo / elétrico, os modelos convencionais poderiam representar menos da metade do mercado. Em 2050, os veículos elétricos podem vir a representar 1,7 bilhão (69% do mercado), enquanto os convencionais modelos de combustão interna responderão por apenas 12%\r\n\r\nSe a resposta internacional às mudanças climáticas for mais forte do que os compromissos nacionalmente determinados, então as tendências de mercado em energia fotovoltaica solar e carros elétricos poderiam ajudar a limitar o aquecimento global de 2,2° C a 2,4° C (probabilidades de 50% e 66%) até 2100.\r\n\r\n6- Remover do texto as palavras isso é fato, está muito repetitivo, e adicionar os benefícios que citei acima na página:\r\n\r\nImagem inline 3\r\n\r\n7-  Na aba Manutenção e Garantia Alterar para " MANUTENÇÃO" Remover Explicativo de GARANTIA DO SISTEMA. Adicionar foto em ANEXO com Homem Limpando as Placas.\r\nAdicionar com a mesma fonte de Imagem inline 5e abaixo introduzir este texto:\r\nQual a vida útil dos painéis solares?\r\nOs painéis solares fotovoltaicos estão constantemente submetidos às intempéries da natureza – Sol, chuva, granizo, ventos fortes, etc.  Essa exposição leva ao envelhecimento do material e as células fotovoltaicas se tornam menos eficientes.\r\n\r\nMesmo assim, o tempo médio da garantia de produção de pelo menos 80% da sua capacidade é de 25 anos. A vida útil dos painéis varia entre 30 e 40 anos.\r\n\r\nA perda de capacidade de funcionamento é de cerca de 0,7% ao ano. Os inversores têm vida útil esperada de mais de 15 anos e podem ser trocados sem ter que trocar também os painéis.\r\n\r\nJá nos sistemas que não estão ligados à rede elétrica, também deve ser considerado o tempo de vida dos outros equipamentos. As baterias normais duram quatro anos, mas são facilmente trocadas.\r\n\r\n\r\n\r\n\r\n\r\nImagem inline 4\r\n\r\n8- Fale conosco introduzir um padrão, mas com opção de enviar arquivos ou currículos para o e mail - contato@atitude-eco.com.br. Com abas das redes sociais.\r\n9- Trabalharemos com redes sociais Facebook apenas por enquanto.\r\n10- Na aba TREINAMENTOS realizar baseado neste modelo:\r\n\r\nhttps://www.neosolar.com.br/cursos-energia-solar\r\n\r\nTodos com Aguarde abertura do próximo treinamento.\r\n\r\n11- Na aba Loja fazer uma página com aviso que em breve a loja estará disponível.\r\n12- Na aba ORÇAMENTO adicionar a a opção de anexo de projetos ou outros docs para e mail contato@atitude-eco.com.br\r\n13- Melhorar a Qualidade do Logo e aumentar o tamanho da marca.\r\n14- Dar uma melhorada nesta parte, Conheça as vantagens de se utilizar a anergia solar fotovoltaica como fonte de energia. NÃO FIQUE DE FORA!\r\n  Colocar as imagens da folha que seja mais coerentes com o texto.\r\nImagem inline 7\r\n\r\nÉ isso.\r\n\r\nEstamos fazendo um maravilhoso trabalho.\r\n\r\nAbraço', '2017-06-13', '2017-06-16', '15:46:00', '16:25:00', 16, 06, 2017, 1, 1, 1, 8, 3),
(133, 'Treinamento Painel - Samuel Silveira Music - 14/06/2017', '', '2017-06-14', '2017-06-14', '13:23:00', '13:57:00', 14, 06, 2017, 1, 1, 1, 12, 10),
(134, 'Treinamento Painel - Samuel Silveira Music - 19/06/2017', 'Entrar em contato com o samuel pelo telefone das 13:00 as 13:50', '2017-06-19', '2017-06-19', '11:08:00', '13:30:00', 19, 06, 2017, 1, 1, 1, 12, 10),
(135, 'Desenvolver Layout - iFace Group - 19/06/2017', 'Será uma loja virtual, com vendas. E também haverá uma opção de "Ver preços do varejo" quando o usuário clicar nessa opção ele terá que preencher um formulário e depois de enviar esse formulário ele poderá visualizar um PDF com os valores de todos os produtos.', '2017-06-19', '2017-06-23', '11:09:00', '10:37:00', 23, 06, 2017, 1, 1, 1, 9, 91),
(136, 'Implementação do Painel Administrativo - Atitude Eco - 19/06/2017', 'Desenvolver o painel com o ACF;', '2017-06-19', '2017-06-20', '11:11:00', '14:35:00', 20, 06, 2017, 1, 1, 1, 2, 3),
(137, 'Alterações - Samuel Silveira Music - 19/06/2017', '', '2017-06-19', '2017-06-19', '13:25:00', '13:49:00', 19, 06, 2017, 1, 1, 1, 8, 10),
(138, 'Alterações - Rancho Online - 21/06/2017', 'Bom dia Matheus,\r\n\r\nSegue a baixo as alterações passadas por telefone:\r\n\r\n- Mudar fonte dos títulos da barra azul escura para 13px;\r\n- Aguardamos mais informações sobre o treinamento;\r\n- Trocar a página "kits" por "combos".\r\n\r\nVocê e o Darlan teriam disponibilidade na sexta 15hrs para uma reunião?\r\n\r\nAtenciosamente,\r\n\r\nMatheus Louzada', '2017-06-21', '2017-06-23', '10:13:00', '11:47:00', 23, 06, 2017, 1, 1, 1, 8, 15),
(139, 'Alterações - MedCorp - 21/06/2017', 'trocar o mapa pra o endereço bento\r\nretirar foto do acidente pessoal e colocar no lugar uma foto planos de saude para idosos (igual ao fb).\r\ntrocar o telefone 3086-4499 para 3111-4499.\r\nfazer um botao destacado na pagina de contato com o telefone 48 3223-3308. com a funcção de ligar.\r\n\r\ncontato@medcorpsaude.com\r\n', '2017-06-21', '2017-06-23', '13:35:00', '14:10:00', 23, 06, 2017, 1, 1, 1, 8, 97),
(140, 'Alterações - Maysul - 21/06/2017', 'Boa tarde!\r\n \r\nMatheus, seguem mais algumas inclusões:\r\nNO CAMPO CATEGORIAS Vamos colocar em maiúscula e negrito como está abaixo. Duvidas me ligue!!!!\r\n \r\nMEDIDORES\r\nDaeflex\r\nLao\r\n \r\nREGULADORES\r\nClesse\r\nAliança\r\n \r\nTUBOS AÇO\r\nGalvanizado\r\nPreto\r\n \r\nCONEXÕES AÇO\r\nTupy\r\n \r\nTUBOS MULTICAMADA\r\nClesse\r\nEmmeti\r\nSigas\r\nAmanco\r\n \r\nCONEXÕES MULTICAMADA\r\nClesse\r\nEmmeti\r\nSigas\r\nAmanco\r\n \r\nTUBOS PEAD\r\n \r\n \r\nCONEXÕES PEAD\r\nFrialen\r\n \r\n \r\nTUBOS DE COBRE\r\n \r\n \r\nCONEXÕES COBRE\r\n \r\n \r\nCONEXÕES LATÃO\r\n \r\n \r\nVÁLVULAS ESFÉRICAS\r\n \r\n \r\nMANÔMETROS\r\n \r\n \r\nFERRAMENTAS\r\n \r\n \r\nINSUMOS\r\nFita demarcação\r\nAdesivo perigo gás\r\nFita teflon\r\nVeda juntas zulin\r\nTinta amarela\r\n \r\nSUPORTES E FIXAÇÃO', '2017-06-21', '2017-06-26', '19:30:00', '11:41:00', 26, 06, 2017, 1, 1, 1, 8, 2),
(141, 'Alterações - SINDAGRI/RS - 21/06/2017', 'Notícia de interesse - Curatela compartilhada: Direito de Família em evidência\r\n\r\nCuratela compartilhada: Direito de Família em evidência\r\n\r\nA difícil rotina de uma família que precisa dedicar cuidados especiais a um familiar pode se tornar menos pesada por meio do Direito de Família. Foi esse o caso recente que levou a advogada Mariana Chuy, que atua em parceria com Bordas Advogados Associados, a requerer judicialmente a curatela compartilhada a pai e filho sobre os direitos da esposa e mãe.\r\n\r\nA curatela é uma medida com o objetivo de amparar e proteger uma pessoa que perdeu sua capacidade de exercer direitos e liberdades, por si só. Ela costuma ser solicitada para colaborar com a segurança da enferma ou incapaz, incluindo a gestão de bens e patrimônios. “No caso específico em que requeremos o pedido de curatela compartilhada, a divisão de tarefas e cuidados para melhor atender às necessidades da esposa e mãe auxiliou à família a manter-se estruturada. Isso porque as rotinas demandam dedicação intensa à enferma. A divisão de responsabilidades ajuda a todos, especialmente, aos interesses da pessoa que precisa de cuidados”, comenta Mariana.\r\n\r\nA assessoria jurídica defendeu a possibilidade de deferimento de curatela compartilhada com base no Estatuto da Pessoa com Deficiência, que incluiu o artigo 1.775-A do Código Civil, para estabelecer expressamente: “quando da nomeação de curador para pessoa com deficiência, o juiz poderá estabelecer curatela compartilhada a mais de uma pessoa visando ao melhor interesse do curatelado”. A liminar pleiteada foi deferida pelo Juiz da Vara de Curatelas do Foro Central de Porto Alegre.\r\n\r\nO Direito de Família pode ser tratado pela equipe do Bordas Advogados Associados em benefício dos servidores. Para agendar um horário com a advogada especialista nessa área – Mariana Chuy, o filiado deverá entrar em contato O telefone é (51) 3228-9997 e o e-mail é bordas@bordas.adv.br, – horário de atendimento é, de segundas-feiras a quintas-feiras, das 9h às 12h e das 13h30 às 18h.\r\n\r\n \r\nFonte Bordas Advogados', '2017-06-21', '2017-06-26', '19:44:00', '13:51:00', 26, 06, 2017, 1, 1, 1, 8, 9),
(142, 'Treinamento Painel - APROPENS - 22/06/2017', '', '2017-06-22', '2017-06-22', '13:58:00', '14:27:00', 22, 06, 2017, 1, 1, 1, 12, 18),
(143, 'Treinamento Painel - Atitude Eco - 23/06/2017', 'Usuário: paulo\r\nSenha: atitudeeco2017', '2017-06-23', '2017-06-26', '09:27:00', '10:24:00', 26, 06, 2017, 1, 1, 1, 12, 3),
(144, 'Reunião - Rancho Online - 23/06/2017', '', '2017-06-23', '2017-06-23', '15:15:00', '16:08:00', 23, 06, 2017, 1, 1, 1, 17, 15),
(145, 'Implementar Painel Administrativo - Atitude Eco - 26/06/2017', 'Implementar a página inicial e trocar a foto de fundo.', '2017-06-26', '2017-08-23', '11:02:00', '11:08:00', 23, 08, 2017, 1, 1, 1, 8, 3),
(146, 'Alterações de Imagens - Solare Investimentos - 26/06/2017', '', '2017-06-26', '2017-06-26', '15:52:00', '17:46:00', 26, 06, 2017, 1, 1, 1, 8, 11),
(147, 'Apresentação Banca de TCC II - TCC - 27/06/2017', 'Apresentar o Gerenciador5M para a banca de TCC II.', '2017-06-26', '2017-06-27', '20:40:00', '11:38:00', 27, 06, 2017, 1, 1, 1, 7, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_tarefas_comentarios`
--

CREATE TABLE IF NOT EXISTS `tb_tarefas_comentarios` (
  `id` int(16) NOT NULL,
  `comentario` text CHARACTER SET utf8 NOT NULL,
  `tb_usuarios_id` int(16) NOT NULL,
  `tb_tarefas_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tb_tarefas_comentarios`
--

INSERT INTO `tb_tarefas_comentarios` (`id`, `comentario`, `tb_usuarios_id`, `tb_tarefas_id`) VALUES
(14, 'Opa! Comentei', 1, 24),
(15, 'Teste do Henrik', 2, 28),
(16, 'Foi implementado o sistema de comentários nas tarefas! YEAH!', 1, 28),
(17, 'Ola', 1, 29),
(18, 'Apresentação Finalizada', 1, 35),
(19, 'Opa! ai está', 2, 37),
(20, 'Foi realizado o cadastro do tipo de tarefa.', 1, 38),
(21, 'Foi criado perfeitamente', 1, 39),
(22, 'Foi implementado a criação de usuários novos', 1, 40),
(23, 'Teste de comentário do Kleber', 3, 40),
(24, 'Opa', 1, 40),
(25, 'Ordenamento funcionando perfeitamente', 1, 41),
(26, 'Realizado', 1, 35),
(27, 'Apresentação finalizada com êxito', 1, 35),
(28, 'Demonstrado', 1, 42),
(29, 'Testteeeeeee', 1, 35),
(30, 'Eu arrumei a formação em 4-3-1-2 e escolhi o uniforme mais foda', 1, 43),
(31, 'Foi realizada a inserção dos dados no banco de dados via PHP', 1, 44),
(32, 'A tarefa foi realizada com excelência', 1, 45),
(33, 'Foi criada a lista dos usuários cadastrados no sistema', 1, 47),
(34, 'Foram realizadas diversas tentativas para a realização dessa tarefas. Mas ainda sem êxito.', 1, 48),
(35, 'Tarefa finalizada', 2, 53),
(36, 'Quando o usuário apertar "Configurações" ele vai para seus dados pessoais e ele pode realizar a atualização desses dados cadastrais.', 1, 49),
(37, 'Foi adicionado um botão "Nova Tarefa" na parte superior do site.', 1, 54),
(38, 'Foi criada uma estrutura para caso o usuário não tenha nenhuma tarefa cadastrada.', 1, 48),
(39, 'tarefa entregue', 2, 22),
(40, 'Os códigos foram verificados e estão arrumados.', 1, 57),
(41, 'É possível visualizar as tarefas dos outros usuários acessando o menu "Relatórios" e escolhendo o usuário que você quer visualizar as tarefas', 1, 51),
(42, 'O mural foi implementado com sucesso! Está postando um comentário e está listando.', 1, 58),
(43, 'Alguns links que não estavam lincados foram arrumados.', 1, 60),
(44, 'Alguns CSS já foram arrumados', 1, 61),
(45, 'Todo o CSS foi revisado e o código está com todas as classes criadas', 1, 61),
(46, 'Foram realizadas as modificações do documento até a sessão de "Abordagem de Desenvolvimento".', 1, 64),
(47, 'As imagens do relatório foram atualizadas.', 1, 65),
(48, 'As modificações foram realizadas no documento.', 1, 64),
(49, 'O menu Administrar foi implementado', 1, 59),
(50, 'A banca foi ensaida no dia 25/04/2017', 1, 67),
(51, 'A fonte foi alterada para Arial', 1, 66),
(52, 'Todas as informações que podem ser editadas foram editadas.', 1, 55),
(53, 'Foram realizados os filtros', 1, 68),
(54, 'Foi implementado o gráfico no menu administrar', 1, 62),
(55, 'O projeto foi apresentado e as considerações dos professores foram dadas. Segundo o professor Zanuz, as considerações irão por e-mail. ', 1, 69),
(56, 'Foram inseridos os logos do Proger, Bndes, Bancos e Cartões de Crédito', 1, 71),
(57, 'Foi criado um usuário para a Geruza e também foi enviado um e-mail para ela informando os dados', 2, 72),
(58, 'Alterações realizadas:\r\nForam colocadas as fotos enviadas em alguns produtos.\r\nForam colocadas as fotos das marcas.', 1, 70),
(59, 'Foram migrado os e-mails e o site. Agora é só esperar o DNS', 1, 77),
(60, 'Layout foi desenvolvido', 2, 73),
(61, 'Foram realizados diversos ajustes no site do Samuel Silveira', 1, 81),
(62, 'Foi realizada a migração do site', 2, 83),
(63, 'Foi passado o treinamento para o Cliente', 1, 80),
(64, 'Foram realizadas as modificações no Cia dos Cartuchos', 2, 74),
(65, 'Foram realizadas melhorias significativas no quesito de usabilidade', 1, 84),
(66, 'O logo do rodapé foi modificado para ficar melhor destacado', 1, 78),
(67, 'O site foi migrado corretamente para o endereço apropens.com.br', 2, 115),
(68, 'Foram realizadas as modificações solicitadas pelo cliente', 1, 76),
(69, 'Alterações realizadas:\r\nA barra foi alinhada verticalmente.\r\nAs abas "Destaques..." foram alinhadas centralizadas.\r\nOs títulos dos Destaques, Ofertas foram removidos.\r\nO e-mail e o minha conta foram alinhados conforme solicitado.\r\nO limite de produtos foram aumentados até o limite da norma, que no caso foi analisado e é de 15 itens.\r\nFoi mudado a parte dos blocos do Atendimento Diferenciado. Foi colocado o mesmo fundo e cores da Falcon, para exemplo. O Darlan, responsável pela criação de artes, vai realizar uma arte para ficar no lugar dessa que está como exemplo.', 1, 87),
(70, 'O campo telefone foi colocado em todos os formulários do site.', 1, 88),
(71, 'O chat foi implementado reaproveitando o código de uma cadeira de Sistemas Distribuídos', 1, 117),
(72, 'Foram mudadas inúmeras questões de layout. Como coloração e imagens.', 1, 118),
(73, 'O e-mail do solare investimentos foi alterado', 1, 119),
(74, 'Foram realizadas as alterações do PPGEdu', 2, 75),
(75, 'Foram realizadas', 2, 120),
(76, 'Foram realizadas as solicitações enviadas por e-mail para o Kleber', 1, 122),
(77, 'Foi realizado as alterações no solare investimentos', 2, 123),
(78, 'Alterações realizadas:\r\nO logo foi centralizado no Slide, ao invés do texto que estava ali antes.\r\nO círculo que ficava em volta do ícone do telefone, no cabeçalho, foi retirado.\r\nAs fontes do site foram todas alteradas e unificadas.\r\nAs informações do rodapé do slide foram retiradas.\r\nA foto do slide foi alterada pela foto selecionada em reunião, segundo o Henrik.\r\nO filtro do slide foi removido.\r\nA foto que estava sobreposta foi retirada ficando somente uma.\r\nA foto que sobrou foi alterada pela foto do escritório selecionada em reunião, segundo o Henrik.\r\nFoi retirado o "Sobre nós" que estava na lateral da seção, no site.\r\nOs ícones que estavam na "Área de Atuação" foram removidos.\r\nA foto do martelo foi retirado da "Área de Atuação".\r\nA frase "Nossa Equipe" foi alterada para "Sócios".\r\nA seção dos "Sócios" foi deixada em um tom de cinza bem escuro.\r\nO prefixo "Dr" foi retirado de todos os sócios.\r\nA ordem dos sócios foram alteradas.\r\nOs elementos que estavam em azul foram adaptados para algum tom de cinza.\r\nO formulário do rodapé foi removido.\r\nUm mapa foi colocado no lugar do formulário, no rodapé do site.\r\nO item de menu "Mídia" foi alterado para "Publicações".\r\nO botão "Ver Currículo" foi colocado abaixo do Aury Lopes Jr.', 1, 113),
(79, 'Foi alterado o logo', 1, 125),
(80, 'As configurações foram realizadas.', 1, 126),
(81, 'Foram criadas as páginas que o cliente enviou o conteúdo.', 1, 116),
(82, 'Foram realizadas modificações no carrinho do projeto', 1, 89),
(83, 'A página Curriculo foi criada.', 1, 131),
(84, 'capa alterada', 5, 85),
(85, 'Foram realizadas melhorias na explicação das Sprints e suas Sprints backlogs.', 1, 130),
(86, 'As imagens foram alteradas com sucesso', 1, 129),
(87, 'Treinamento não pode ocorrer, pois não conseguimos contato com o Samuel por telefone.', 1, 133),
(88, 'As perguntas do questionário foram analisadas', 1, 128),
(89, 'Alterações realizadas:\r\nA aba "Missão, Visão e Valores" foi removida do menu principal do site.\r\nA foto do topo das páginas internas foi alterada por outra que tem mais haver com a proposta da Atitude Eco.\r\nO gráfico da página foi removido e no seu lugar foi posto uma nova imagem.\r\nOs textos foram adicionados na página Benefícios.\r\nAs sentenças "Isso é fato" foram removidos dos textos introdutórios.\r\nO "Manutenção e Garantia" foi alterado para "Manutenção".\r\nO texto da página "Manutenção" foi alterado.\r\nAs páginas Fale Conosco, Treinamentos e Loja foram criadas. A página Fale Conosco está com uma estruturação padrão, conforme solicitado. A página Treinamentos está estática ainda, isso quer dizer sem nenhuma ação ainda e a página Loja está com uma informações de "Em breve". Lembrando que estamos na etapa de aprovação de estrutura. Depois da aprovação das páginas internas as funcionalidades de edição de fotos, textos e conteúdos será implementada.\r\nFoi adicionado um campo para enviar arquivos nos formulários de orçamento e no formulário de contato.\r\nO logo teve seu tamanho aumentado, juntamente de sua qualidade.\r\nFoi arrumada a frase na página inicial.\r\nOs ícones da parte das Vantagens foram alterados por ícones mais relevantes.', 1, 132),
(90, 'Foi passado o treinamento de algumas funcionalidades do painel administrativo por team viewer.', 1, 134),
(91, 'Foi realizada a alteração solicitada pelo Samuel na ligação do dia 19/06/2017', 1, 137),
(92, 'Foi desenvolvido o painel do Atitude Eco com o ACF.', 1, 136),
(93, 'Foi passado o treinamento do painel administrativo', 1, 142),
(94, 'Foi realizado o layout juntamente de algumas páginas iniciais', 1, 135),
(95, 'Foi alterado a fonte de 14px para 13px.\r\nFoi alterado a página de Kits para Combo.', 1, 138),
(96, 'Foram realizadas as alterações solicitadas pela cliente', 1, 139),
(97, 'Informações serão enviadas para a cliente para o e-mail contato@medcorpsaude.com', 1, 139),
(98, 'Reunião realizada', 1, 144),
(99, 'Foi enviado um e-mail para o Paulo com as informações na sexta. Segundo o mesmo ele conseguiu realizar alterações nas páginas internas, mesmo sem treinamento do painel.', 1, 143),
(100, 'Foram colocadas as categorias com um submenu solicitado.', 1, 140),
(101, 'A notícia foi cadastrada com sucesso', 1, 141),
(102, 'TCC Apresentado! Valeus, flws', 1, 147);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_tarefas_tipo`
--

CREATE TABLE IF NOT EXISTS `tb_tarefas_tipo` (
  `id` int(16) NOT NULL,
  `tipo` varchar(155) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tb_tarefas_tipo`
--

INSERT INTO `tb_tarefas_tipo` (`id`, `tipo`) VALUES
(2, 'Implementação de Painel'),
(4, 'Identidade Visual'),
(5, 'TCC'),
(7, 'Apresentação Banca de TCC'),
(8, 'Alterações Complicadas'),
(9, 'Desenvolvimento de Layout'),
(10, 'Migração de Site'),
(11, 'Criação de imagem - Facebook'),
(12, 'Treinamento Painel Administrativo'),
(13, 'Criação das Páginas Internas'),
(14, 'Alteração de Arte'),
(15, 'Alteração de Painel Adminstrativo'),
(16, 'Configurar Responsivo'),
(17, 'Reunião');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_timer`
--

CREATE TABLE IF NOT EXISTS `tb_timer` (
  `id` int(10) NOT NULL,
  `action` varchar(5) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `tb_tarefas_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=329 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tb_timer`
--

INSERT INTO `tb_timer` (`id`, `action`, `timestamp`, `tb_tarefas_id`) VALUES
(43, 'start', 1477352286, 22),
(44, 'pause', 1477352294, 22),
(45, 'start', 1477352340, 23),
(46, 'pause', 1477352348, 23),
(47, 'start', 1477352348, 23),
(48, 'pause', 1477352394, 23),
(49, 'start', 1477425486, 23),
(50, 'pause', 1477425488, 23),
(51, 'start', 1478126751, 24),
(52, 'pause', 1478126755, 24),
(53, 'start', 1478126853, 24),
(54, 'pause', 1478126857, 24),
(55, 'start', 1478126870, 24),
(56, 'pause', 1478126881, 24),
(57, 'start', 1478127263, 24),
(58, 'pause', 1478127267, 24),
(59, 'start', 1478127273, 29),
(60, 'pause', 1478127288, 29),
(61, 'start', 1478129338, 24),
(62, 'pause', 1478129340, 24),
(63, 'start', 1478170095, 28),
(64, 'pause', 1478170103, 28),
(65, 'start', 1478171391, 33),
(66, 'pause', 1478171482, 33),
(67, 'start', 1478185597, 22),
(68, 'pause', 1478185599, 22),
(69, 'start', 1478216961, 28),
(70, 'pause', 1478216976, 28),
(71, 'start', 1478925905, 28),
(72, 'pause', 1478925909, 28),
(73, 'start', 1478929127, 28),
(74, 'pause', 1478929132, 28),
(77, 'start', 1478966876, 34),
(78, 'start', 1478967820, 23),
(79, 'start', 1478967827, 25),
(80, 'start', 1478967833, 24),
(83, 'start', 1478967852, 29),
(84, 'start', 1478967854, 28),
(85, 'pause', 1478972295, 28),
(86, 'start', 1478972341, 28),
(87, 'pause', 1478972344, 28),
(88, 'pause', 1478972357, 29),
(91, 'pause', 1478972364, 34),
(92, 'pause', 1478972367, 24),
(93, 'pause', 1478972369, 25),
(94, 'pause', 1478972371, 23),
(95, 'start', 1478973052, 35),
(96, 'pause', 1478973133, 35),
(97, 'start', 1479130082, 35),
(98, 'pause', 1479130094, 35),
(101, 'start', 1479383258, 22),
(102, 'start', 1479412306, 35),
(103, 'start', 1479416969, 38),
(104, 'pause', 1479417049, 38),
(105, 'start', 1479419138, 40),
(106, 'pause', 1479419167, 40),
(107, 'start', 1479419885, 41),
(108, 'pause', 1479419921, 41),
(109, 'pause', 1479421293, 35),
(110, 'start', 1479421297, 35),
(111, 'pause', 1479421299, 35),
(112, 'start', 1479421990, 35),
(113, 'pause', 1479422009, 35),
(114, 'start', 1479422107, 42),
(115, 'pause', 1479422113, 42),
(116, 'start', 1479555139, 35),
(117, 'pause', 1479555144, 35),
(118, 'start', 1479556978, 35),
(119, 'pause', 1479556990, 35),
(120, 'start', 1479673121, 35),
(121, 'pause', 1479673122, 35),
(122, 'start', 1480038098, 35),
(123, 'pause', 1480038111, 35),
(124, 'pause', 1480038256, 22),
(125, 'start', 1480038411, 35),
(126, 'pause', 1480038412, 35),
(127, 'start', 1480722926, 35),
(128, 'pause', 1480722939, 35),
(129, 'start', 1480730908, 43),
(130, 'pause', 1480730948, 43),
(131, 'start', 1485047703, 45),
(132, 'start', 1485047711, 44),
(133, 'start', 1485048617, 47),
(134, 'pause', 1485049726, 44),
(135, 'pause', 1485049750, 45),
(136, 'pause', 1485049778, 47),
(137, 'start', 1485049779, 47),
(138, 'pause', 1485049779, 47),
(139, 'start', 1487983508, 48),
(140, 'pause', 1487988804, 48),
(141, 'start', 1488228101, 53),
(142, 'pause', 1488228147, 53),
(143, 'start', 1488565708, 49),
(144, 'pause', 1488568150, 49),
(145, 'start', 1488568372, 54),
(146, 'pause', 1488568400, 54),
(147, 'start', 1488568874, 48),
(148, 'pause', 1488570144, 48),
(149, 'start', 1488571616, 50),
(150, 'pause', 1488571707, 50),
(151, 'start', 1488572212, 30),
(152, 'start', 1490313412, 57),
(153, 'pause', 1490313800, 57),
(154, 'start', 1490313845, 51),
(155, 'pause', 1490314264, 51),
(156, 'start', 1490315906, 58),
(157, 'pause', 1490317449, 58),
(158, 'start', 1490318090, 60),
(159, 'pause', 1490318601, 60),
(160, 'start', 1490318686, 61),
(161, 'pause', 1490319061, 61),
(162, 'start', 1490319061, 61),
(163, 'pause', 1490319145, 61),
(164, 'start', 1490319539, 61),
(165, 'pause', 1490320554, 61),
(166, 'start', 1490360395, 63),
(167, 'pause', 1490364497, 63),
(168, 'start', 1491614223, 64),
(169, 'pause', 1491618943, 64),
(170, 'start', 1492127331, 64),
(171, 'start', 1492128592, 59),
(172, 'pause', 1493144217, 64),
(173, 'pause', 1493144265, 59),
(174, 'start', 1493163721, 67),
(175, 'pause', 1493165048, 67),
(176, 'start', 1493165609, 55),
(177, 'pause', 1493166266, 55),
(178, 'start', 1493166643, 55),
(179, 'pause', 1493168196, 55),
(180, 'start', 1493168516, 68),
(181, 'pause', 1493170770, 68),
(182, 'start', 1493251776, 62),
(183, 'pause', 1493251792, 62),
(184, 'start', 1493256966, 62),
(185, 'pause', 1493313467, 62),
(186, 'start', 1493314213, 69),
(187, 'pause', 1493314214, 69),
(188, 'start', 1493314223, 62),
(189, 'pause', 1493314224, 62),
(190, 'start', 1493331036, 69),
(191, 'pause', 1493331538, 69),
(192, 'start', 1494455591, 62),
(193, 'pause', 1495061966, 62),
(194, 'start', 1495061968, 62),
(195, 'pause', 1495075079, 62),
(196, 'start', 1496772101, 71),
(197, 'pause', 1496773783, 71),
(198, 'start', 1496774048, 72),
(199, 'start', 1496774168, 73),
(200, 'start', 1496774286, 70),
(201, 'pause', 1496776207, 72),
(202, 'pause', 1496776607, 70),
(203, 'start', 1496778280, 77),
(204, 'pause', 1496781268, 77),
(205, 'pause', 1496781472, 73),
(206, 'start', 1496844139, 83),
(207, 'start', 1496844236, 85),
(208, 'pause', 1496844240, 85),
(209, 'start', 1496844285, 81),
(210, 'start', 1496846855, 86),
(211, 'pause', 1496847534, 86),
(212, 'start', 1496847536, 86),
(213, 'pause', 1496847550, 86),
(214, 'pause', 1496851117, 81),
(215, 'pause', 1496851229, 83),
(216, 'start', 1496853428, 80),
(217, 'pause', 1496855207, 80),
(218, 'start', 1496856295, 74),
(219, 'start', 1496858239, 84),
(220, 'pause', 1496862637, 74),
(221, 'start', 1496863085, 86),
(222, 'pause', 1496863089, 86),
(223, 'start', 1496864838, 89),
(224, 'pause', 1496864840, 89),
(225, 'pause', 1496866558, 84),
(226, 'start', 1496940151, 78),
(227, 'pause', 1496941934, 78),
(228, 'start', 1496942464, 87),
(229, 'start', 1496944462, 75),
(230, 'start', 1496945060, 115),
(231, 'start', 1496945761, 76),
(232, 'pause', 1496946374, 76),
(233, 'pause', 1496950028, 87),
(234, 'start', 1496950092, 88),
(235, 'pause', 1496951121, 88),
(236, 'start', 1496951836, 116),
(237, 'pause', 1496952642, 116),
(238, 'start', 1496971150, 117),
(239, 'start', 1496971188, 118),
(240, 'pause', 1496972303, 117),
(241, 'pause', 1496972352, 118),
(242, 'start', 1497012166, 119),
(243, 'pause', 1497012389, 119),
(244, 'start', 1497015892, 120),
(245, 'pause', 1497015899, 75),
(246, 'start', 1497015930, 113),
(247, 'pause', 1497017037, 113),
(248, 'start', 1497017590, 121),
(249, 'pause', 1497018619, 121),
(250, 'start', 1497019798, 122),
(251, 'pause', 1497022934, 122),
(252, 'pause', 1497023295, 120),
(253, 'start', 1497024968, 123),
(254, 'start', 1497028253, 113),
(255, 'pause', 1497028408, 123),
(256, 'start', 1497030441, 123),
(257, 'pause', 1497030456, 123),
(258, 'start', 1497030539, 124),
(259, 'pause', 1497032815, 113),
(260, 'pause', 1497272454, 124),
(261, 'start', 1497275960, 125),
(262, 'pause', 1497277159, 125),
(263, 'start', 1497277224, 126),
(264, 'pause', 1497278825, 126),
(265, 'start', 1497293436, 116),
(266, 'pause', 1497293937, 116),
(267, 'start', 1497297702, 89),
(268, 'pause', 1497298901, 89),
(269, 'start', 1497379284, 131),
(270, 'pause', 1497380938, 131),
(271, 'start', 1497381665, 132),
(272, 'pause', 1497384264, 132),
(273, 'start', 1497444638, 127),
(274, 'start', 1497444852, 130),
(275, 'start', 1497445564, 85),
(276, 'pause', 1497445565, 85),
(277, 'pause', 1497448355, 130),
(278, 'pause', 1497448389, 127),
(279, 'start', 1497456773, 127),
(280, 'start', 1497456781, 129),
(281, 'pause', 1497457186, 129),
(282, 'start', 1497457187, 129),
(283, 'pause', 1497457188, 129),
(284, 'pause', 1497457201, 127),
(285, 'start', 1497457424, 133),
(286, 'pause', 1497459446, 133),
(287, 'start', 1497465360, 132),
(288, 'pause', 1497471157, 132),
(289, 'start', 1497617484, 128),
(290, 'start', 1497632780, 132),
(291, 'pause', 1497639558, 128),
(292, 'pause', 1497641240, 132),
(293, 'start', 1497641252, 127),
(294, 'pause', 1497875928, 127),
(295, 'start', 1497889349, 134),
(296, 'pause', 1497889784, 134),
(297, 'start', 1497890757, 137),
(298, 'pause', 1497892186, 137),
(299, 'start', 1497894026, 136),
(300, 'pause', 1497901055, 136),
(301, 'start', 1497964492, 136),
(302, 'pause', 1497980038, 136),
(303, 'start', 1498051193, 135),
(304, 'pause', 1498084254, 135),
(305, 'start', 1498150788, 142),
(306, 'pause', 1498152469, 142),
(307, 'start', 1498223438, 135),
(308, 'pause', 1498225049, 135),
(309, 'start', 1498229190, 138),
(310, 'pause', 1498229417, 138),
(311, 'start', 1498234832, 139),
(312, 'pause', 1498237479, 139),
(313, 'start', 1498243342, 144),
(314, 'pause', 1498244899, 144),
(315, 'start', 1498483449, 143),
(316, 'pause', 1498485232, 143),
(317, 'start', 1498488050, 140),
(318, 'pause', 1498493173, 140),
(319, 'start', 1498495874, 141),
(320, 'pause', 1498500478, 141),
(321, 'start', 1498503603, 146),
(322, 'pause', 1498507836, 146),
(323, 'start', 1498509967, 146),
(324, 'pause', 1498509969, 146),
(325, 'start', 1498519667, 145),
(326, 'pause', 1498520396, 145),
(327, 'start', 1498565135, 147),
(328, 'pause', 1498566191, 147);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuarios`
--

CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `id` int(16) NOT NULL,
  `permissao` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `nome` varchar(155) CHARACTER SET utf8 DEFAULT NULL,
  `login` varchar(155) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(155) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `cargo` varchar(155) CHARACTER SET utf8 DEFAULT NULL,
  `telefone` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `tb_equipes_id` int(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `permissao`, `nome`, `login`, `email`, `password`, `cargo`, `telefone`, `tb_equipes_id`) VALUES
(1, 'admin', 'Matheus Souza', 'matheus', 'matheus@falcon5m.com.br', '3082534fd4ddabd025913be97be30732', 'Gerente de Projetos e Programador PHP', '(51) 98248-4091', 1),
(2, 'admin', 'Henrik Oliveira', 'henrik', 'henrik@agencia5m.com.br', '3082534fd4ddabd025913be97be30732', 'Desenvolvedor Web', '(51) 3085-7272', 1),
(3, 'admin', 'Kleber Kauch', 'kleber', 'contato@falcon5m.com.br', '3082534fd4ddabd025913be97be30732', 'CEO', '(51) 3085-7272', 1),
(5, 'admin', 'Darlan Benites', 'darlan', 'darlan@agencia5m.com.br', '3082534fd4ddabd025913be97be30732', 'Social Media', '(51) 3085-7272', 1),
(6, 'admin', 'João', NULL, 'joao', '3082534fd4ddabd025913be97be30732', 'Severino', 'nao sei', 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_equipes`
--
ALTER TABLE `tb_equipes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_mural`
--
ALTER TABLE `tb_mural`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_tb_mural_tb_usuarios1_idx` (`tb_usuarios_id`);

--
-- Índices de tabela `tb_projetos`
--
ALTER TABLE `tb_projetos`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_tb_projetos_tb_clientes1_idx` (`tb_clientes_id`);

--
-- Índices de tabela `tb_tarefas`
--
ALTER TABLE `tb_tarefas`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_tb_tarefas_tb_usuarios_idx` (`tb_usuarios_id`), ADD KEY `fk_tb_tarefas_tb_tarefas_tipo1_idx` (`tb_tarefas_tipo_id`), ADD KEY `fk_tb_tarefas_tb_projetos1_idx` (`tb_projetos_id`);

--
-- Índices de tabela `tb_tarefas_comentarios`
--
ALTER TABLE `tb_tarefas_comentarios`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_tb_tarefas_comentarios_tb_usuarios1_idx` (`tb_usuarios_id`), ADD KEY `fk_tb_tarefas_comentarios_tb_tarefas1_idx` (`tb_tarefas_id`);

--
-- Índices de tabela `tb_tarefas_tipo`
--
ALTER TABLE `tb_tarefas_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_timer`
--
ALTER TABLE `tb_timer`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_tb_timer_tb_tarefas1_idx` (`tb_tarefas_id`);

--
-- Índices de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_tb_usuarios_tb_equipes1_idx` (`tb_equipes_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT de tabela `tb_equipes`
--
ALTER TABLE `tb_equipes`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `tb_mural`
--
ALTER TABLE `tb_mural`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `tb_projetos`
--
ALTER TABLE `tb_projetos`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT de tabela `tb_tarefas`
--
ALTER TABLE `tb_tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT de tabela `tb_tarefas_comentarios`
--
ALTER TABLE `tb_tarefas_comentarios`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT de tabela `tb_tarefas_tipo`
--
ALTER TABLE `tb_tarefas_tipo`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de tabela `tb_timer`
--
ALTER TABLE `tb_timer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=329;
--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tb_mural`
--
ALTER TABLE `tb_mural`
ADD CONSTRAINT `fk_tb_mural_tb_usuarios1` FOREIGN KEY (`tb_usuarios_id`) REFERENCES `tb_usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_projetos`
--
ALTER TABLE `tb_projetos`
ADD CONSTRAINT `fk_tb_projetos_tb_clientes1` FOREIGN KEY (`tb_clientes_id`) REFERENCES `tb_clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_tarefas`
--
ALTER TABLE `tb_tarefas`
ADD CONSTRAINT `fk_tb_tarefas_tb_projetos1` FOREIGN KEY (`tb_projetos_id`) REFERENCES `tb_projetos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tb_tarefas_tb_tarefas_tipo1` FOREIGN KEY (`tb_tarefas_tipo_id`) REFERENCES `tb_tarefas_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tb_tarefas_tb_usuarios` FOREIGN KEY (`tb_usuarios_id`) REFERENCES `tb_usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_tarefas_comentarios`
--
ALTER TABLE `tb_tarefas_comentarios`
ADD CONSTRAINT `fk_tb_tarefas_comentarios_tb_tarefas1` FOREIGN KEY (`tb_tarefas_id`) REFERENCES `tb_tarefas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tb_tarefas_comentarios_tb_usuarios1` FOREIGN KEY (`tb_usuarios_id`) REFERENCES `tb_usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_timer`
--
ALTER TABLE `tb_timer`
ADD CONSTRAINT `fk_tb_timer_tb_tarefas1` FOREIGN KEY (`tb_tarefas_id`) REFERENCES `tb_tarefas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
ADD CONSTRAINT `fk_tb_usuarios_tb_equipes1` FOREIGN KEY (`tb_equipes_id`) REFERENCES `tb_equipes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
