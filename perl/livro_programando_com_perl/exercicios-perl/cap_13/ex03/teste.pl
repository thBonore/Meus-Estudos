#!/usr/bin/perl
use 5.14.0;

use lib("./lib/");
use Ponto;
use Ponto3D;

my $ponto1 = Ponto->new(x => [5, 1], y => [-4, 3]);
my $ponto3D = Ponto3D->new(x => [5, 1], y => [-4, 3], z => 7);
