#!/usr/bin/perl
# Achar o maior número no código de países;

use 5.14.0;
use strict;
use warnings;

use Geography::Countries;

sub maior_pais()
{
	my $cont = 1000;
	my @pais;

	until ($pais[0]) { @pais = country --$cont; }
	return $cont;
}
