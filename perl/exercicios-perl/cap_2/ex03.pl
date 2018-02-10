#!/usr/bin/perl
# Exercicio 2.3: CGI.

use 5.14.0;

use strict;
use warnings;
use CGI qw/:standard/;

open (my $fp, ">", "index.html");
print $fp
        header,
        start_html('Selecao de calcinhas'),
        h1('Escolha sua calcinha'),
        start_form,
        "Qual o seu nome, vagabunda? ",textfield('nome'),p,
	"Qua tamanho de calcinha desejado?",
        popup_menu(-name=>'tamanho',
    		-values=>['PP','P','M','G']),p,
        submit,
        end_form,
        hr,"\n";
        if (param) {
           print $fp
    	   "Seu nome é ",em(param('nome')),p,
    	   "Você quer uma calcinha no tamanho ",em(param('tamanho')),".\n";
        }
        print $fp end_html;
close ($fp);
