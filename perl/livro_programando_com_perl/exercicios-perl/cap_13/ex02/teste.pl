#!/usr/bin/perl
use 5.14.0;
use strict;
use warnings;

use lib('./lib/');
use Automotor;
use Carro;
use Motocicleta;
use Onibus;

my %args = (
  peso => 3200,
  check_kms => 6500,
  check_meses => 4,
  num_rodas => 4,
	num_portas => 4,
  quilometragem => 16500,
  preco => 78000,
  idade => 45,
  placa => 'SDG-9067'
);
my $carro_obj = new Carro(%args);
$carro_obj->rodarKms(3000);
say Carro->qtde(), "º CARRO";
say $_, " => ", $carro_obj->$_() for keys %args;
say $carro_obj->blitz() ? "PASSOU NA BLITZ" : "FUDEU!!";


%args = (
  peso => 3200,
  check_kms => 0,
  check_meses => 4,
  num_rodas => 4,
  quilometragem => 0,
  preco => 78000,
  idade => 0,
  placa => 'UHF-5642'
);
my $moto_obj = new Motocicleta(%args);
$moto_obj->rodarKms(12300);
say Motocicleta->qtde(), "º CICLOMOTOR";
say $_, " => ", $moto_obj->$_() for keys %args;
say $moto_obj->blitz() ? "PASSOU NA BLITZ" : "FUDEU!!";
