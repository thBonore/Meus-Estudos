#include <stdio.h>

int main( ) {
  int numero, soma = 0, contador = 0;

  printf( "\nDigite um número --> " );
  scanf( "%d", &numero );

  while ( soma < numero ) {
    contador++;
    if ( contador % 2 )
      soma += contador;
  }

  if ( soma == numero )
    printf( "\nO número digitado é um quadrado perfeito\n" );
  else
    printf( "\nSinto muito, perfeito só Deus\n" );
}
