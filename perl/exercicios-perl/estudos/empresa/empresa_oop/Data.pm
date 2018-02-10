#!/usr/bin/perl

use 5.14.0;
package Data;
use strict;
use warnings;

sub validar {
	my $limiteDia = 0;
	given($_[1]) {
		when ([1,3,5,7,8,10,12]) { $limiteDia = 31; }
		when ([4,6,9,11]) { $limiteDia = 30; }
		when (2) { $limiteDia = !($_[2] % 4) && ($_[2] % 100 || !($_[2] % 400)) ? 29 : 28; }
	}
	return $_[0] > 0 && $_[0] <= $limiteDia && $_[2] > 1900;
}

1;
