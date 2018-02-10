#!/usr/bin/perl

use 5.14.0;
use strict;
use warnings;

use lib('./lib/');
use PessoaBrasil;

my $obj = new PessoaBrasil(
	Name => 'John',
	Age => 18,
	RG => '50.293.686-1',
	Tipo_sangue => 'O-'
);

say "This is ".$obj->name();
say $obj->name()." have ".$obj->age()." years old";
say "O RG de ".$obj->name()." é ".$obj->rg();
say "Seu tipo sanguíneo é ".$obj->tipo_sangue();
