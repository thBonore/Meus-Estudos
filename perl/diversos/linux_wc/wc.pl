#!/usr/bin/perl
# Linux wc

use 5.14.0;
use strict;
use warnings;
use FileHandle;
use Switch;

my $fp = FileHandle->new( "+< $ARGV[1]" ) or die "Impossível abrir o arquivo '$ARGV[1]'";
my $res = 0;
switch ($ARGV[0]) {
	case ("-c") { $res = scalar(map { split // } <$fp>) }
	case ("-L") { $res = (map { split /\n/ } <$fp>) }
}
say $res, " ", $ARGV[1];
