#!/usr/bin/perl
# Exercício 1.4: Par ou ímpar.

use 5.14.0;
use strict;
use warnings;

say "Digite um número";
say "Este número é ", <STDIN> % 2 ? "ímpar" : "par";
