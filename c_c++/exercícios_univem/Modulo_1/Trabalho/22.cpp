#include <stdio.h>

int main( ) {
  int ano, contador;

  printf( "\nDigite o ano atual --> " );
  scanf( "%d", &ano );

  for ( contador = 1; contador <= ano; contador++ )
    if ( contador % 400 == 0 || ( contador % 4 == 0 && contador % 100 != 0 ) )
      printf( "\n%d\n", contador );
}
