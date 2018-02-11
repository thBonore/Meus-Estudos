#!/usr/bin/perl
#exemplo 2.4

use 5.14.0;
use strict;
use warnings;

my $idade = 25;
my @nomes = qw(Frodo Sam Fred Vilma);
my %conta  = (banco => "Perl Bank", correntista => "Larry Wall", saldo => 10);

# Criando Ponteiros
my $pointer1 = \$idade;
my $pointer2 = \@nomes;
my $pointer3 = \%conta;
my $pointer4 = [qw(céu árvore mar)];
my $pointer5 = {SP => "São Paulo", RS => "Rio Grande do Sul"};

# Removendo a referência
say $$pointer1;
say @$pointer2;
say %$pointer3;
say $pointer2->[1];
say $pointer3->{"correntista"};
say "@{$pointer4}";
say %{$pointer5};
