#!/usr/bin/perl

use 5.22.0;
use strict;
use warnings;

my %hash1 = ( "teste1" => "HueBR", "teste2" => "ghjk", "teste3" => "oq", "teste2" => "asd" );
my %hash2 = ( "teste1" => "HueBR", "teste2" => "asd", "teeew5" => "oq" );

say uc $_, " => ", $hash1{$_} for keys comparaHashChaves(\%hash1, \%hash2);

sub comparaHashChaves {
	my %retorno;
	for my $chave(keys %{$_[0]}) { push %retorno, ${$_[0]}{$chave} if scalar grep { /^$chave$/ && ${$_[0]}{$chave} eq ${$_[1]}{$_} } values %{$_[1]}; }
	%retorno
}
