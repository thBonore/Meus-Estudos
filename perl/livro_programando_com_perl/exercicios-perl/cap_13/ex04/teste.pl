#!/usr/bin/perl
use 5.14.0;
use lib("./lib/");
use Reta;

my %ponto_inicio = (x => 4, y => 3);
my $reta = Reta->new(ponto_inicio => \%ponto_inicio);
