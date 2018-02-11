#!/usr/bin/perl
#exemplo 2.2

$time = hora_brasil( localtime() );
print "$time\n";

sub hora_brasil() {
	$_[5] += 1900;
	return qq($_[2]:$_[1]:$_[0] $_[3]/$_[4]/$_[5]);
}
