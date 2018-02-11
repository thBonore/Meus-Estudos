package Database 0.2;

use 5.14.0;
use strict;
use warnings;

use DBI;
use DBD::mysql;

use constant DATABASE => 'perlmed';
use constant HOST => 'localhost';

our $con;
our $num_cons = 0;

sub new {
	my $class = shift;
	$class->connect();
	bless { con => $con }, $class;
}

sub connect {
	unless ($num_cons) {
		my $dsn = 'DBI:mysql:database='.DATABASE.';host='.HOST;
		$con = DBI->connect($dsn, 'root', 'rozcovo') or
			die ("Não foi possível conectar-se ao banco:", DBI->errstr);
		$con->{mysql_auto_reconnect} = 1;
		$num_cons++;
	}
}

sub run {
	my $self = shift;
	my $sql = shift;

	my $sth = $con->prepare($sql);
	$sth->execute;
	$sth;
}

sub DESTROY {
	$con->disconnect unless $num_cons;
	$num_cons--;
}
1
