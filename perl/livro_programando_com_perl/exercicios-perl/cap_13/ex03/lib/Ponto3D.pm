package Ponto3D;
use 5.14.0;
use Carp;

use lib(".");
use base("Ponto");

sub new {
  my $class = shift;
  my %args = @_;
  my $this = $class->SUPER::new(@_);
  $this->{z} = defined $args{z} ? $args{z} : confess "Coordenada Z não informada!";
  bless $this, $class;
}

sub z {
  my $this = shift;
  $this->{z} = shift if @_;
  return $this->{z};
}
1;
