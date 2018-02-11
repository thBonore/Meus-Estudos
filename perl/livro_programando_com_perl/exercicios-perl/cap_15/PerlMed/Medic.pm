package PerlMed::Medic;

use 5.18.0;
use warnings;

use lib('./');
use base('Database');

sub new {
	my $class = shift;
	my %args = @_;
	my $self = {
		id => ($args{id} or 0),
		name => ($args{name} or 'Jorge')
	};
	bless $self, $class;
}

sub name {
	my $self = shift;
	$self->{name} = shift if @_;
	$self->{name};
}
1
