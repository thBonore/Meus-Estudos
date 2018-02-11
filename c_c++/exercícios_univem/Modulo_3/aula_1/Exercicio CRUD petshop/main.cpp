#include <stdio.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

// Criação de um CRUD de um pet shop (eu sei, em perl é melhor)
// Nome: Israel da Costa Batista

typedef struct  
{
	char exc;
	char cpf[11];
	char nome[30];
} CLIENTE;

CLIENTE lista_clientes;
CLIENTE lista_clientes_aux;

FILE *clientes, *produtos, *vendas;

int menuInicial() {
	int opcao;
	printf("1. Clientes\n");
	printf("2. Produtos\n");
	printf("3. Vendas\n");
	printf("-1. Sair\n");
	printf("Digite o número correspondente da ação que deseja tomar --> ");
	fflush(stdin); scanf("%d", &opcao); fflush(stdin);
	return opcao;
}

int menuClientes() {
	int opcao;
	printf("1. Novo cliente\n");
	printf("2. Alterar cliente\n");
	printf("3. Excluir cliente\n");
	printf("-1. Voltar\n");
	printf("Digite o número correspondente da ação que deseja tomar --> ");
	fflush(stdin); scanf("%d", &opcao); fflush(stdin);
	return opcao;
}

int verificarCpf(char cpf[11]) {
	int pos = 0;
	
	fseek(clientes, pos*sizeof(lista_clientes), SEEK_SET);
	while (fread(&lista_clientes, sizeof(lista_clientes), 1, clientes) == 1) 
		if (lista_clientes.exc != '1' && !strcmp(lista_clientes.cpf, cpf)) {
			printf("\n**CPF JÁ EXISTENTE!!**\n");
			return 0;
		}
	return 1;
}

void adicionarCliente() {
	CLIENTE cliente_cadastro;
	
	do {
		printf("\nDigite o cpf do cliente --> ");
		fflush(stdin); gets(cliente_cadastro.cpf); fflush(stdin);
	} while(verificarCpf(cliente_cadastro.cpf));

	printf("\nDigite o nome do cliente --> ");
	fflush(stdin); gets(cliente_cadastro.nome); fflush(stdin);
	
	fwrite(&cliente_cadastro, sizeof(cliente_cadastro), 1, clientes);
}

void crudClientes() {
	int opcao = 0;
	
	clientes = fopen("clientes.dat", "rb");
	
	do {
		int numero_clientes = 0, pos = 0;
		
		fseek(clientes, pos*sizeof(lista_clientes), SEEK_SET);
		while (fread(&lista_clientes, sizeof(lista_clientes), 1, clientes) == 1)
			if (lista_clientes.exc != '1') {
				numero_clientes++;
				printf("\n\nCPF: %c", lista_clientes.cpf);
				printf("\nNOME: %c", lista_clientes.nome);
			}
		
		numero_clientes ?
			printf("\n%d clientes cadastrados\n", numero_clientes) :
			printf("\n*Nenhum cliente cadastrado*\n");
		
		opcao = menuClientes();
		
		switch (opcao) {
			case 1: adicionarCliente(); break;
		}
	} while (opcao != -1);
		
	fclose(clientes);
}

main() {
	int opcao;
	
	do {
		opcao = menuInicial();
		switch (opcao) {
			case 1: crudClientes(); break;
		}
	} while (opcao != -1);
	
	printf("\nAté mais!!");
}
