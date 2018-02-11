#!/usr/bin/perl
use 5.22.0;
use CGI;
my $cgi = CGI->new;
say $cgi->header();
say $cgi->start_html('Olá mundo!!');
say $cgi->h1('Bem vindo à programação web com Perl');
say $cgi->end_html;
