#!/usr/bin/perl

use 5.22.0;
use strict;
use warnings;

my %hash = ("a" => "c", "b" => "b", "c" => "a" );
imprimeHashPorChave(\%hash);

sub imprimeHashPorChave {
	for my $ch (sort { lc $a cmp lc $b } keys %{$_[0]}) {
		say uc $ch, " => ", ${$_[0]}{$ch};
	}
}
