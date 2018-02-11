#!/usr/bin/perl
# Exercicio 2.2: Pesquisas no google.

use 5.14.0;
use strict;
use warnings;

use REST::Google::Search::Web;

say "Digite sua pesquisa para ver os resultados...";

my $search = REST::Google::Search->Web( query => "rock" );
while ( my $result = $search->next ) {
    print $result->rank, " ", $result->uri, "\n";
}
