#!/usr/bin/perl

use 5.22.0;
use strict;
use warnings;

my %hash1 = ( "teste1" => "HueBR", "teste2" => "asdghjk", "teste3" => "oq" );
my %hash2 = ( "teste1" => "HueBR", "teste3" => "asdghjk", "teste5" => "oq" );

say for comparaHashChaves(\%hash1, \%hash2);

sub comparaHashChaves {
	my @retorno;
	for my $chave(keys %{$_[0]}) { push @retorno, $chave if scalar grep { /^$chave$/ } keys %{$_[1]}; }
	@retorno
}
