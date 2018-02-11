#include <stdio.h>

int main( ) {
  int n, troca, ant_1 = 1, ant_2 = 0;

  printf( "\nDigite quantos números da série de Fibonacci voce deseja ver --> " );
  scanf( "%d", &n );

  printf( "\nSequência: 1 " );

  if ( n > 1 )
    for ( n -= 1; n > 0; n-- ) {
      printf( " %d ", ant_1 + ant_2 );
      troca   = ant_1;
      ant_1  += ant_2;
      ant_2   = troca;
    }

  printf( "\n" );
}
