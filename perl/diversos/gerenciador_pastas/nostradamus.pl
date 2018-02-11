#!/usr/bin/perl
# Nostradamus, o explorador do império

use 5.14.0;
use strict;
use warnings;

opendir(my $dh, "./") or die "ERRO: O programa não possui permissão para acessar seu diretório!!";
say for grep { -d && /^perl-/ } readdir $dh;
closedir $dh;
