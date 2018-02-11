/*
  Israel da Costa Batista         RM 57473-2
  Matheus da Conceissão Bonore    RM 56777-9
  Gustavo de Castro Fernandes     RM 57349-3
*/
#include <stdio.h>
#include <stdlib.h>

main () {
  int piramide[15][15], n, linha, coluna, resposta = 0, x, soma, existe, ponteiro;

  do {
    printf("\nN = ");
    scanf("%d", &n);

    for (linha = 0; linha < n; linha++) {
      for (coluna = 0; coluna <= linha; coluna++) {
        if (coluna > 0 && linha > 1 && coluna != linha) {
            piramide[linha][coluna] = piramide[linha - 1][coluna] + piramide[linha - 1][coluna - 1];
        } else
          piramide[linha][coluna] = 1;
      }
    }

    do {
    	printf("\nTriângulo de Pascal:\n");

    	for (linha = 0; linha < n; linha++) {
    		for ( coluna = 0; coluna <= linha; coluna++)
    		  printf("%4d ", piramide[linha][coluna]);

    		printf("\n");
    	}

      printf("\n1.Calcular 2 elevado a X (X < N);");
      printf("\n2.Ler um valor qualquer;");
      printf("\n3.Destruir triângulo;");
      printf("\n\nSua opção --> ");
      scanf("%d", &resposta);

      /*
        Olá professora,

        estou fazendo este comentário pois acredito que há um pequeno erro no enunciado do trabalho, pois nele consta que na opção 1
        deve ser lido um valor X, onde X <= N, deixando assim implícito que este cálculo deve ser feito a partir da soma de todos os
        elementos da linha X, porém, a minha correção indica que X < N, uma vez que se eu obtiver um valor 15 para X em uma pirâmide
        de 15 linhas e a linha 15 for lida ( em busca de 2 elevado a 15 ) eu obterei uma sujeira de memória, evidentemente este cálculo
        não pode ser efetuado a partir da linha 14, já que esta contém x elevado a 14.

        Caso eu esteja errado quanto a isso, por favor, envie uma explicação no meu email:
          israel.batista@etec.sp.gov.br

        Agradeço desde já!
      */

      if (resposta == 1) {
        printf("\nX = ");
        scanf("%d", &x);

        if (x > n || x < 0)
          printf("\nVALOR INVÁLIDO");
        else {
          for (coluna = 0, soma = 0; coluna <= x; coluna++)
            soma += piramide[x][coluna];

          printf("\n2 elevado a %d --> %d\n", x, soma);
        }
      } else if (resposta == 2) {
        printf("\nVAL = ");
        scanf("%d", &x);
        for (linha = 0, existe = 0; linha < n; linha++)
          for (coluna = 0; coluna <= linha; coluna++)
            if (piramide[linha][coluna] == x) {
              if (!existe) {
                existe = 1;
                printf("\nO valor %d é gerado elas seguintes colunas:\n", x);
              }
              printf("\nColuna %d (", coluna - 1);
              for (ponteiro = coluna - 1; ponteiro < linha; ponteiro++) {
                printf(" %d ", piramide[ponteiro][coluna - 1]);
                if (ponteiro + 1 < linha)
                  printf("+");
              }
              printf(")");
            }
        if (!existe)
          printf("\nO valor %d não aparece na pirâmide", x);
      }

    } while (resposta != 3);

    printf("\n\nDeseja executar este programa novamente? (1 = Sim/ 0 = Não) --> ");
    scanf("%d", &resposta);

  } while (resposta != 0);
}
