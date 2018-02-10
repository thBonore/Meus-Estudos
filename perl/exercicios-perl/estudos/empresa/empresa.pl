#!/usr/bin/perl
# Operações com dados de funcionários de uma empresa

use 5.14.0;

my @campos = qw/nome dept salario entrada/;
my @empregados = (
	{
		'nome' => 'Joaquim Almeida',
		'dept' => 'Contabilidade',
		'salario'=> 2500,
		'entrada' => '2001-02-10'
	}, {
		'nome' => 'Rute Silveira',
		'dept' => 'Financas',
		'salario'=> 2000,
		'entrada' => '2002-01-14'
	}, {
		'nome' => 'Pedro Gonçalves',
		'dept' => 'Financas',
		'salario'=> 2200,
		'entrada' => '2000-12-4'
	}, {
		'nome' => 'Rita Aires',
		'dept' => 'Informática',
		'salario'=> 1800,
		'entrada' => '2000-04-1'
	}
);

sub listarMaiorDoisMil {
	system 'clear';
	say "ABAIXO OS EMPREGADOS CADASTRADOS QUE GANHAM MAIS QUE 2000 EUROS:";
	foreach my $empregado (grep { ${$_}{'salario'} >= 2000 } @empregados) {
		print "\n";
		say uc, " => ", ${$empregado}{$_} for (@campos);
	}
	say "\nPressione qualquer tecla para continuar...";
	<>;
}

sub aumentarSalarioDeptFinancas {
	map { ${$_}{'salario'} += 200 } grep { lc ${$_}{'dept'} eq 'financas' } @empregados;
}

sub validarData {
	my $limiteDia = 0;
	given($_[1]) {
		when ([1,3,5,7,8,10,12]) { $limiteDia = 31; }
		when ([4,6,9,11]) { $limiteDia = 30; }
		when (2) { $limiteDia = $_[2] % 4 ? 29 : 28; }
	}
	return $_[0] > 0 && $_[0] <= $limiteDia && $_[2] >= 1900;
}

sub formatarPrimeiraOpcao {
	my %retorno;
	if ($_[0] =~ /^\s/) {
		my @split = grep { /.+/ } split / /, $_[0];
		$retorno{'dept'} = join(' ', @split);
	} else {
		$retorno{'dept'} = $_[0];
	}
	$retorno{'salario'} = int((split / /, $_[1])[0]);
	my @data = split /\//, $_[2];
	$retorno{'entrada'} = "$data[2]-$data[1]-$data[0]";
	$retorno{'nome'} = $_[3];
	return %retorno;
}

sub formatarSegundaOpcao {
	my %retorno;
	if ($_[0] =~ /^\s/) {
		$retorno{'salario'} = int((grep { /.+/ } split / /, $_[0])[0]);
	} else {
		$retorno{'salario'} = int((split / /, $_[0])[0]);
	}
	$retorno{'nome'} = $_[1];
	$retorno{'entrada'} = join('', map { s/\//-/r } split //, $_[2]);
	$retorno{'dept'} = $_[3];
	return %retorno;
}

sub inserirFuncionario() {
	my $dados;
	my %novoRegistro;
	do {
		system 'clear';
		say "Digite os dados do funcionário em um dos formatos abaixo:";
		say "DEPARTAMENTO - SALARIO - DATA(dd/mm/aaaa) - NOME";
		say "SALARIO * NOME * DATA(aaaa/mm/dd) * DEPARTAMENTO";
		chomp($dados = <STDIN>);
	 	if ($dados =~ /^\s*\D+ - \d+\D* - (\d{1,2}\/){2}\d{4} - \D+$/) {
			my @splitDados = split / - /, $dados;
			my @data = split /\//, $splitDados[2];
			%novoRegistro = formatarPrimeiraOpcao(@splitDados) if (validarData($data[0], $data[1], $data[2]));
		} elsif ($dados =~ /^\s*\d+\D* \* \D+ \* \d{4}(\/\d{1,2}){2} \* \D+$/) {
			my @splitDados = split / \* /, $dados;
			my @data = split /\//, $splitDados[2];
			%novoRegistro = formatarSegundaOpcao(@splitDados) if (validarData($data[2], $data[1], $data[0]));
		}
	} until (%novoRegistro);
	push @empregados, \%novoRegistro;
}

sub despesasPorDepartamento {
	system 'clear';
	say "Abaixo as despesas em salários por departamento:";
	my %despesas;
	for (@empregados) {
		$despesas{${$_}{'dept'}} = 0 if not defined $despesas{${$_}{'dept'}};
		$despesas{${$_}{'dept'}} += ${$_}{'salario'};
	}
	say $_, ' => ', $despesas{$_} for keys %despesas;
	say "\nPressione qualquer tecla para continuar...";
	<>;
}

sub funcionariosAntesDe_2001() {
	system 'clear';
	say "Os seguintes usuários estão na empresa antes de 2001:";
	say ${$_}{'nome'} for grep { (split /-/, ${$_}{'entrada'})[0] < 2001 } @empregados;
	say "\nPressione qualquer tecla para continuar...";
	<>;
}

my $opcao;

do {
	system 'clear';
	say "ABAIXO OS EMPREGADOS CADASTRADOS:";
	foreach my $empregado (@empregados) {
		print "\n";
		say uc, " => ", ${$empregado}{$_} for (@campos);
	}
	say "\nEscolha uma ação digitando seu número correspondente (ou -1 para sair):";
	say "1. Listar os empregados que ganham mais do que 2000 Euros";
	say "2. Aumentar o salário dos empregados do departamento de finanças em 200 euros";
	say "3. Inserir mais empregados na empresa";
	say "4. Calcular as despesas em salários por departamento";
	say "5. Ver uma lista de funcionários que entraram antes de 2001";

	print "\nSua escolha --> ";
	chomp($opcao = <STDIN>);

	given($opcao) {
		when(1) { listarMaiorDoisMil(); }
		when(2) { aumentarSalarioDeptFinancas(); }
		when(3) { inserirFuncionario(); }
		when(4) { despesasPorDepartamento(); }
		when(5) { funcionariosAntesDe_2001(); }
	}
} until ($opcao == -1);

say "Até mais!!";
