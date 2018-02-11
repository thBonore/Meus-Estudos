package Motocicleta;

use 5.14.0;
use strict;
use warnings;

use lib('.');
use base("Automotor");

sub new {
	my $class = shift;
	my %args = @_;
	$args{num_rodas} = 2;
	my $this = $class->SUPER::new(@_);
	$this->{capacetes} = defined $args{capacetes} ? $args{capacetes} : 0;
	bless $this, $class;
}

sub capacetes {
	my $this = shift;
	$this->{capacetes} = shift if @_;
	return $this->{capacetes};
}

sub blitz {
	my $this = shift;
	return
		$this->SUPER::blitz() &&
		$this->num_rodas() == 2 &&
		$this->capacetes();
}
1;
