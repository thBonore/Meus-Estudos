package PessoaBrasil;

use 5.14.0;
use strict;
use warnings;

use lib('./lib/PessoaBrasil/');
use base('Person');

sub new {
	my $class = shift;
	my $self = $class->SUPER::new(@_);
	my %args = @_;
	$self->{RG} = exists $args{RG} ? $args{RG} : '';
	$self->{Tipo_sangue} = exists $args{Tipo_sangue} ? $args{Tipo_sangue} : '';
	return $self
}

sub rg {
	my $self = shift;
	$self->{RG} = shift if @_;
	return $self->{RG};
}

sub tipo_sangue {
	my $self = shift;
	$self->{Tipo_sangue} = shift if @_;
	return $self->{Tipo_sangue};
}
1;
