package Reta;
use 5.14.0;
use Carp qw/confess/;
use lib(".");
use Ponto;

sub new {
  my $class = shift;
  my %args = @_;
	my $this = {};
  $class->ponto_inicio($args{ponto_inicio}),
  bless $this, $class;
}

sub ponto_inicio {
  my $this = shift;
  if (@_) {
    my $args = shift;
    $this->{ponto_inicio} = Ponto->new(%{$args});
  }
  return $this->{ponto_inicio};
}

sub ponto_fim {
  my $this = shift;
  if (@_) {
    my $args = shift;
    $this->{ponto_fim} = new Ponto(%{$args});
}
  return $this->{ponto_fim};
}
1;
