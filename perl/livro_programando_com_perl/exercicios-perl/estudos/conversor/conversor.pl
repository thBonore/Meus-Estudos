#!/usr/bin/perl
# Conversor de moedas

our @moedas = (
	{
		'nome' => 'Real',
		'valor' => 1.00,
		'lastro' => 1,
		'plural' => 'reais'
	}, {
		'nome' => 'Dollar',
		'valor' => 3.95,
		'lastro' => 0,
		'plural' => 'dólares'
	}
);

do {
	system "clear";
	say "ABAIXO AS MOEDAS CADASTRADAS:";
	my $plural = ${grep { ${$_}{'lastro'} } @moedas}{'plural'};
	for my $moeda(@moedas) {
		say ${$moeda}{'nome'}, " *LASTRO*" if ${$moeda}{'lastro'};
		say ${$moeda}{'nome'}, " => ", ${$moeda}{'valor'}, " $plural" unless ${$moeda}{'lastro'};
	}


	say "Escolha uma das ações abaixo digitando seu número correspondente (ou -1 para sair)";
	say "Sua eschola:";
	chomp(our $opcao = <STDIN>);
} until ($opcao == -1 );
say "Até mais!";
