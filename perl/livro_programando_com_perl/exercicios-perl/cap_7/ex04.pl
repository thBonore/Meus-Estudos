#!/usr/bin/perl

use 5.22.0;
use strict;
use warnings;

my @lista = (
	sub {
		say "Digita um número aí o talarico:";
		chomp(my $n1 = <STDIN>);
		say "Digita outro, o zé ruela:";
		chomp(my $n2 = <STDIN>);
		say "A soma entre os números digitados é ", $n1 + $n2;
	},
	sub {
		say "Digite seu nome:";
		say "Hello ".<STDIN>;
	},
	sub {
		say "Digite os elements do array (separados por espaço):";
		chomp(my $str = <STDIN>);
		say for split / /, $str;
	}
);
my $opcao;

do {
	system "clear";
	say "Elementos da lista:";
	print " $_ " for keys @lista;
	say "\n\n> >> --> Avançar a lista";
	say "> ./\"CHAVE\" -> Executar o procedimento CHAVE";
	say "> exit --> Sair";

	chomp($opcao = <STDIN>);
	andar() if ($opcao =~ /^\>\>$/);
	executar((split /\.\//, $opcao)[1]) if ($opcao =~ /^\.\/\d$/);
} until($opcao eq "exit");
say "\nAté mais!";

sub andar { unshift @lista, pop @lista }
sub executar { system "clear"; $lista[$_[0]]->(); <>; }
