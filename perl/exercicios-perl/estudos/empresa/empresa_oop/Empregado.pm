#!/usr/bin/perl
package Empregado;
use strict;
use warnings;
use Carp;

our $num_empregados = 0;

sub new {
	my $class = shift;
	my %args = @_;
	$num_empregados++;
	my $self = {
		Nome => ($args{nome} or ''),
		Dept => ($args{dept} or ''),
		Salario => ($args{salario} or 0),
		Entrada => ($args{entrada} or '1999-03-31')
	};
	bless $self, $class;
}

sub nome {
	my $self = shift;
	$self->{Nome} = shift if @_;
	return $self->{Nome};
}

sub dept {
	my $self = shift;
	$self->{Dept} = shift if @_;
	return $self->{Dept};
}

sub salario {
	my $self = shift;
	$self->{Salario} = shift if @_;
	return $self->{Salario};
}

sub entrada {
	my $self = shift;
	$self->{Entrada} = shift if @_;
	return $self->{Entrada};
}

sub aumentarSalario() {
	my $self = shift;
	$self->{Salario} += shift;
}

# Atributos da classe
sub cadastrados { $num_empregados }
1;
