use sis_vigia;

CREATE TABLE `usuario` (
	`usuario_id` int(11) NOT NULL AUTO_INCREMENT,
	`usuario_nome` varchar(25) NOT NULL,
	`usuario_sobrenome` varchar(25) NOT NULL,
	`usuario_email` varchar(50) NOT NULL UNIQUE,
	`usuario_senha` varchar(32) NOT NULL,
	`usuario_adm` enum('0', '1') NOT NULL DEFAULT '0',
	`usuario_criacao` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`usuario_id`)
);
