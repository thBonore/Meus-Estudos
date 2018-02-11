#include <stdio.h>

int main( ) {
  int contador_numero, contador_primo, divisor = 0;

  for ( contador_numero = 2; contador_numero <= 1000; contador_numero++ ) {
    for ( contador_primo = 1; contador_primo <= contador_numero; contador_primo++ )
      if ( contador_numero % contador_primo == 0 )
        divisor++;

    if ( divisor == 2 )
      printf("\n%d\n", contador_numero );

    divisor = 0;
  }
}
