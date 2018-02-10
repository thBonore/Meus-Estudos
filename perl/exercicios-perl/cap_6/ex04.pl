#!/usr/bin/perl
# Exercicio 6.4: Folha de pagamento

use 5.14.0;
use strict;
use warnings;

my @funcionarios;
my $valorHora; 
my $totalDespesas = 0;

do {
	system "clear";
	say "Digite o valor da hora trabalhada:";
	chomp($valorHora = <>);
} until ($valorHora =~ /^\d+$/);

my $acao;
do {
	system "clear";
	if ( scalar(@funcionarios) > 0 ) {
		say "EMPREGADOS CADASTRADOS";
		say "-> ".${$_}{'nome'}." => ".${$_}{'salario'}." doletas (".${$_}{'horas'}." horas)" for @funcionarios;
	} else {
		say "*NENHUM EMPREGADO CADASTRADO*";
	}

	say "\n".tamanhoLinha();
	say "\nVALOR DA HORA: $valorHora doletas";
	say "TOTAL DAS DESPESAS: $totalDespesas doletas";

	say "\n## MUDAR VALOR DA HORA: \$\$\"VALOR\"";
	say "## CADASTRAR EMPREGADO: \"NOME\" - \"HORAS TRABALHADAS\"";
	say "## PESQUISAR EMPREGADO: \@\@\"PESQUISA\"";
	say "## SAIR: -1";
	say "\nSua escolha:";
	chomp($acao = <STDIN>);

	alterarValorHora((split /\$\$/, $acao)[1]) if ($acao =~ /^\$\$\d+$/);
  cadastrarEmpregado(split / - /, $acao) if ($acao =~ /^\D+ - \d{1,4}$/);
} until ($acao == -1);

system "clear";
say "Até a próxima...";
<>;
system "clear";

sub alterarValorHora() {
	$valorHora = $_[0];
	$totalDespesas = 0;
	map { ${$_}{'salario'} = calcularSalario(${$_}{'horas'}) } @funcionarios;
}

sub cadastrarEmpregado {
	my %func = ("nome" => $_[0], "horas" => $_[1], "salario" => calcularSalario($_[1]));
	push @funcionarios, \%func;
}

sub calcularSalario {
	$totalDespesas += $valorHora * $_[0] + ($_[1] - 144 * ($_[0] > 144)) * $valorHora * 0.30
}

#sub pesquisarEmpregado {
#	system "clear";
#	my @resultados;
#	push @resultados, $_ for grep { /$_[0]/ } @funcionarios;
#	say "$_[0] => $_[1]" each @resultados;
#	<>;
#}

sub tamanhoLinha {
	(sort { $a <=> $b } map { scalar (split //,${$_}{'nome'}) } @funcionarios)[0];
}
