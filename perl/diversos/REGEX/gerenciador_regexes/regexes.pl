#!/usr/bin/perl
use 5.22.0;
use strict;
use warnings;
use FileHandle;
my %regexes;
my $entr;
system "clear";
say "Seja bem vindo ao meu gerenciador de regexes!!";
<>;
do {
	system "clear";
	if (scalar %regexes) {
		say "REGEXES CADASTRADAS:\n";
		while (my ($nome, $regex) = each %regexes) {
			say "$nome => /$regex/" ;
		}
	} else {
		say "\nNENHUMA REGEX CADASTRADA!!";
	}
	say "\n+[NOME => REGEX]: Adicionar nova Regex";
	if (scalar %regexes) {
		say "-NOME: Excluir Regex";
		say "TEXTO: Rodar texto nas regex existentes";
		say "ARQUIVO << NOME_REGEX/SUBSTITUICAO: Substituir ocorrências de uma regex em um arquivo legível";
	}
	say "exit: Sair do programa";
	print "\n> ";
	chomp($entr = <STDIN>);
	given ($entr) {
		when(/^\+\[\w+\s\=\>\s.+\]$/) { cadastrarRegex(split /\s\=\>\s/, (split /^\+\[|\]$/, $entr)[1], 2); }
		when(/^\-\w+$/) { excluirRegex((split /\-/, $entr)[1]) if scalar %regexes; }
		when(/.+\s\<{2}\s\w+\/.?/) {
			if (scalar %regexes) {
				my ($arg1, $arg2) = (split /\s\<{2}\s/, $entr);
				($arg2, my $arg3) = (split /\//, $arg2);
				substituirRegexArquivo($arg1, $arg2, $arg3) if defined $regexes{$arg2};
			}
		}
		when(!/^exit$/) { rodarRegexes($entr) if scalar %regexes; }
	}
} until ($entr eq "exit");
sub cadastrarRegex {
	$regexes{$_[0]} = $_[1];
}
sub excluirRegex {
	delete $regexes{$_[0]};
}
sub substituirRegexArquivo {
	my $fp = FileHandle->new("+<$_[0]") or return reportarErro("Arquivo não encontrado!!");
  my $inicio = $fp->getpos();
	chomp(my @linhas = <$fp>);
	$fp->setpos($inicio);
	say $fp s/$regexes{$_[1]}/$_[2]/r for @linhas; 
	$fp->close();
}
sub rodarRegexes {
	system "clear";
	say "Resultados para \"$_[0]\":\n";
	while (my($nome, $regex) = each %regexes) {
		say $nome, $_[0] =~ /$regex/ ? " ~MATCH" : " ~N MATCH";
	}
	<>;
}
sub reportarErro {
	system "clear";
	say "ERRO: $_[0]";
	<>;
}
