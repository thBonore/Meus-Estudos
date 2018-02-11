package Person;

use 5.14.0;
use strict;
use warnings;

use Carp;

sub new {
	my $class = shift;
	my %args = @_;
	my $self = {
		Name => ($args{Name} or ''),
		Age => ($args{Age} or 0),
		Marital_state => ($args{Marital_state} or 'single')
	};
	bless $self, $class;
}

sub name {
	my $self = shift;
	$self->{Name} = shift if @_;
	return $self->{Name};
}

sub age {
	my $self = shift;
	$self->{Age} = shift if @_;
	return $self->{Age};
}

sub marital_state {
	my $self = shift;
	$self->{Marital_state} = shift if @_;
	return $self->{Marital_state};
}
1;
