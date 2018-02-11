#!/usr/bin/perl
# Exercício 4.2: Sistema operacional e pasta raiz do usuário

use 5.14.0;
use strict;
use warnings;

say "SO => $ENV{'XDG_CURRENT_DESKTOP'} | Pasta Raíz => $ENV{'HOME'}";
