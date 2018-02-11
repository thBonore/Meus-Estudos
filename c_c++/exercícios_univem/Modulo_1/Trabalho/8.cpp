#include <stdio.h>

int main( ) {
  float divisor, contador, resultado = 0;

  printf( "\nDigite o número base para a soma --> " );
  scanf( "%f", &divisor );

  if ( divisor <= 0 )
    printf( "\nERRO: Não estamos na Rússia para você me fazer executar uma divisão por 0!!\n" );
  else {
    for ( contador = 1; contador <= divisor; contador++ )
      resultado += 1 / contador;

    printf( "\nO resultado da operação é --> %f\n", resultado );
  }
}
