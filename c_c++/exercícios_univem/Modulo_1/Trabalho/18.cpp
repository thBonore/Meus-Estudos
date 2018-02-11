#include <stdio.h>

int main( ) {
  int contador, numero, soma = 0;

  printf( "\nDigite um número --> " );
  scanf("%d", &numero );

  for ( contador = 1; contador <= 100; contador++ )
    soma += numero + contador;

  printf("\nO Resultado da operação foi --> %d\n", soma );
}
