#!/usr/bin/perl

use 5.22.0;
use strict;
use warnings;

system "clear";
say "Digite o primeiro array das operações";
chomp(my $str = <STDIN>);
my @arr = split /\|/, $str;

say "Digite o segundo array das operações";
chomp($str = <STDIN>);
my @arr_2 = split /\|/, $str;

say "\nUnião dos arrays:";
print "$_ " for uniao(\@arr, \@arr_2);
say "\nIntersecção dos arrays:";
print "$_ " for intersec(\@arr, \@arr_2);
say "\nDiferença entre os arrays:";
print "$_ " for diff(\@arr, \@arr_2);
say "\n";

sub uniao {
	my @uniao = @{$_[0]};
	splice @uniao, $#uniao + 1, $#{$_[1]}, @{$_[1]};
	@uniao;
}

sub intersec {
	my @intersec;
	for my $comp(@{$_[0]}) {
		push @intersec, $comp if scalar (grep {/^$comp$/} @{$_[1]});
	}
	@intersec
}

sub diff {
	my @diff;
	my @intersec = intersec($_[0], $_[1]);
	for my $item (uniao($_[0], $_[1])) {
		push @diff, $item if (!scalar(grep { /^$item$/ } @intersec));
	}
	@diff
}
