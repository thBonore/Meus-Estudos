#!/usr/bin/perl
# Txt (Excell) para json

use 5.18.0;
use warnings;

use JSON::XS;
use FileHandle;

my $arquivo = new FileHandle('< lista_nova.txt');
chomp( my @linhas = <$arquivo> );

my @familias;

for (@linhas) {
	my %familia;
	my @dados = split /\d?\t\s*\d{0,2}\s*\t?/;
	my @membros;
	my $membros = defined $dados[2] && !($dados[2] =~ /^cri/ || $dados[2] =~ /^ok/) ? (split /\s\-.*/, $dados[2])[0] : $dados[0];
	push @membros, $_ for split /[\;\,]\W+/, $membros;

	for (my $idx = 0; $idx <= $#membros; $idx++) {
		my @membros_split = split /\se\s/i, $membros[$idx];

		if (scalar @membros_split > 1) {
			splice @membros, $idx, 1;
			push @membros, $_ for @membros_split;
		}
	}

	$familia{nome} = $dados[0];
	$familia{membros} = \@membros;
	push @familias, \%familia;
}

my $json = {familias => \@familias};

my $arquivo_json = new FileHandle(">json_da_familia.json");
say $arquivo_json JSON::XS->new->utf8->pretty(1)->encode($json);
$arquivo_json->close;
