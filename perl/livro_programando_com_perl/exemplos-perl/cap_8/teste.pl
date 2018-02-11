#!/usr/bin/perl
#exemplo8.20
#Verifique com seu provedor a versão suportada do Perl.
use strict; 
use warnings; 
use CGI; 
use CGI::Carp qw/fatalsToBrowser/; #Não usar esta linha em produção 
use Data::Validate::Email qw(is_email is_email_rfc822); 
my $cgi = CGI->new(); 
print $cgi->header(-type => 'Content-Type', -charset => 'iso-8859-1'), 
$cgi->start_html(-title => "Verifica e-mail"); 
if ( not $cgi->param("Email") ) { 
print $cgi->start_form(-action => $cgi->url()), 
$cgi->p("Informe seu e-mail " . 
$cgi->textfield(-name => "Email") . " " . 
$cgi->submit(-name => "testar")), 
$cgi->end_form; 
} 
else{ 
my $mail = $cgi->param("Email"); 
if (not is_email($mail)){ 
die "Email informado inválido\n"; 
} 
$mail =~ m{^([\w-]+)\@(([\w-]+)\.([\w-]+)(\.([\w-]+))?)}; 
print $cgi->p("Username = $1"), 
$cgi->p("Domain = $2"), 
$cgi->p("\t Parte 1 = $3"), 
$cgi->p("\t Parte 2 = $4"); 
print $cgi->p("\t Parte 3 = $6") if $5; 
} 
