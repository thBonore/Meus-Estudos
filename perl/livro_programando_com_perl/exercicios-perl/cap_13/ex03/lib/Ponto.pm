package Ponto;
use 5.14.0;
use Carp;

sub new {
  my $class = shift;
  my %args = @_;
  my $this = {
    x => ($args{x} or confess "Coordenada X não informada!"),
    y => ($args{y} or confess "Coordenada Y não informada!")
  };
  bless $this, $class;
}

sub x {
  my $this = shift;
  $this->{x} = shift if @_;
  return $this->{x};
}

sub y {
  my $this = shift;
  $this->{y} = shift if @_;
  return $this->{y};
}
1;
