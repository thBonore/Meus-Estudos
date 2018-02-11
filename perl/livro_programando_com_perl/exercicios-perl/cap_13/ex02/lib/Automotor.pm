package Automotor;

use 5.14.0;
use strict;
use warnings;

use Scalar::Util "looks_like_number";

our $qtde = 0;

sub new {
	my $class = shift;
	my %args = @_;
	my $this = {
		peso => ($args{peso} or 0),
    check_kms => ($args{check_kms} or 0),
    check_meses => ($args{check_meses} or 0),
    num_rodas => ($args{num_rodas} or 0),
		quilometragem => ($args{quilometragem} or 0),
		preco => ($args{preco} or 0),
		idade => ($args{idade} or 0),
    placa => ($args{placa} or '')
	};
	$qtde++;
	bless $this, $class;
}

# Get's e Set's
sub peso {
	my $this = shift;
	$this->{peso} = shift if @_;
	return $this->{peso};
}

sub check_kms {
	my $this = shift;
	$this->{check_kms} = shift if @_;
	return $this->{check_kms};
}

sub check_meses {
	my $this = shift;
	$this->{check_meses} = shift if @_;
	return $this->{check_meses};
}

sub num_rodas {
	my $this = shift;
	$this->{num_rodas} = shift if @_;
	return $this->{num_rodas};
}

sub quilometragem {
	my $this = shift;
	$this->{quilometragem} = shift if @_;
	return $this->{quilometragem};
}

sub preco {
	my $this = shift;
	$this->{preco} = shift if @_;
	return $this->{preco};
}

sub placa {
	my $this = shift;
	$this->{placa} = shift if @_;
	return $this->{placa};
}

sub idade {
	my $this = shift;
	$this->{idade} = shift if @_;
	return $this->{idade};
}

# Métodos da classe
sub qtde {
	return $qtde;
}

# Métodos
sub rodarKms {
	my $this = shift;
	my $kms = shift;
	$this->quilometragem($this->quilometragem() + $kms) if looks_like_number $kms;
}

sub blitz {
  my $this = shift;
  return
    ($this->placa() ne '' || $this->idade() <= 15) &&
    ($this->check_kms < 10000 || $this->check_meses < 6);
}

# Destrutor
sub DESTROY {
  $qtde--;
}
1;
