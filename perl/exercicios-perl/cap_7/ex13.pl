#!/usr/bin/perl
# Exercicio 7.13: Verificar se um hash é um conjuto de outro hash

use 5.22.0;
use strict;
use warnings;

my %meuHash = (
	'teste' => (
		'oi jurema' => 'oi juscenilton',
		'ai jurema' => 'ai juscenilton'
	),
	'aiaiaiaiai' => (
		'uiui' => 'aiai'
	),
	'teste com um hash em outro hash' =>
		'juremator 2000' => (
			'jucenilton 10 conto' => (
				'teste Israel Concat' => 'teste do mussum'
			)
		)
	)
);

say "Digite o hash (Ex: 'CHAVE' => 'VALOR', 'CHAVE' => 'VALOR'):";
chomp(my $cod_hash = <STDIN>);
my %hash = hashConv($cod_hash);
say contemHash(%hash) ? "Contém" : "Não contém";

sub contemHash {
	my retorno = 0;
	for	my $key(keys ) {
		
	}
}
sub hashConv {
	my %retorno;
	for my $par(split /\s?,\s?/, $_[0]) {
		my @valores = grep { /./ } split /'/, split /\s?=>\s?/, $par;
		$retorno{$valores[0]} = $valores[1];
	}
	%retorno
}
