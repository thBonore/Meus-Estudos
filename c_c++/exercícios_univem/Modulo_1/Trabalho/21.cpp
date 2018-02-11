#include <stdio.h>

int main( ) {
  int contador, mc, du;

  printf( "\nOs seguintes números têm essa característica:\n" );

  for ( contador = 1000; contador <= 9999; contador++ ) {
    mc = contador / 100;
    du = contador % 100;

    if ( ( mc + du ) * ( mc + du ) == contador )
      printf( "\n%d\n", contador );
  }
}
