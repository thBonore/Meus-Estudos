#include <stdio.h>

int main( ) {
  int numero;

  printf( "\nDigite um número --> " );
  scanf( "%d", &numero );

  if ( numero > 999 )
    printf( "\nO número tem que se menor do que 1000\n" );
  else if ( ( ( numero - ( numero % 10 ) - ( ( numero % 100 ) / 10 ) * 10 ) / 100 ) < ( ( numero % 100 ) / 10 ) && ( ( numero % 100 ) / 10 )  < ( numero % 10 ) )
    printf( "\nO número digitado é ascendente\n" );
  else
    printf( "\nO número digitado não é ascendente\n" );
}
