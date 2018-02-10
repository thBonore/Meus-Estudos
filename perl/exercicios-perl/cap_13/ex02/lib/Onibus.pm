package Onibus;

use 5.14.0;
use strict;
use warnings;

use lib('.');
use base("Automotor");

sub new {
	my $class = shift;
	my %args = @_;
	my $self = $class->SUPER::new(@_);
	$self->{lugares} = defined $args{lugares} ? $args{lugares} : 0;
	bless $self, $class;
}

sub lugares {
	my $self = shift;
	$self->{lugares} = shift if @_;
	return $self->{lugares};
}

sub blitz {
  my $this = shift;
  return
    $this->SUPER::blitz() &&
    $this->num_rodas() > 6
}
1;
