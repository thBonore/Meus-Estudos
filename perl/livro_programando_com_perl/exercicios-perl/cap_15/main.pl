#!/usr/bin/perl
# Aplicação para consultório médico

use 5.18.0;
use strict;
use warnings;

use lib('./PerMed/');
use PerlMed::Medic;
use PerlMed::Pacient;
use PerlMed::Database;

our @Medics;
{
	my $res = new Database()->run("SELECT * FROM medic");

	while ($dados = $res->fetchrow->hashref) {
		push @Medics, $dados;
	}
}

say $_->name for @Medics;
