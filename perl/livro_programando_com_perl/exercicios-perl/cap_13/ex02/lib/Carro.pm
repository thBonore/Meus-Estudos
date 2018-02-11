package Carro;

use 5.14.0;
use strict;
use warnings;

use base("Automotor");

sub new {
  my $class = shift;
  my $this = $class->SUPER::new(@_);
  my %args = @_;
  $this->{num_portas} = defined $args{num_portas} ? $args{num_portas} : 0;
  bless $this, $class;
}

sub num_portas {
  my $this = shift;
  $this->{num_portas} = shift if @_;
  return $this->{num_portas};
}

sub blitz {
  my $this = shift;
  return
    $this->SUPER::blitz() &&
    $this->peso() <= 3500 &&
    $this->num_rodas() => 3 &&
    ($this->num_portas() == 2 || $this->num_portas() == 4);
}
1;
