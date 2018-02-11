#include <stdio.h>
#include <stdlib.h>

bool VerficarPrimo( int numero ) {
  int divisores = 0;
  for ( int contador = 1; contador <= numero / 2; contador++ )
    if ( numero % contador == 0 )
      divisores++;

  return divisores == 1 ? true : false;
}

main () {
  int inicio, fim, num_primos, ultimo = 0, primos_gemeos = 0;
  bool validado = false;

  do {
    printf( "\n Digite o ponto de início --> " );
    scanf( "%d", &inicio );

    if ( inicio > 0 ) {
      printf( "\n Digite o ponto de fim --> " );
      scanf( "%d", &fim );

      if ( fim < 1000000 ) {
        if ( inicio < fim ) {
          validado = true;
        } else {
          printf( "Início deve ser menor do que fim!!" );
        }
      } else {
        printf( "Fim deve ser menor do que 1000000!!" );
      }
    } else
      printf( "Início não pode ser negativo!!" );
  } while ( !validado );

  printf( "\n Primos gêmeos entre %d e %d: \n", inicio, fim );

  for ( int contador = inicio; contador <= fim; contador++ ) {
    if ( VerficarPrimo( contador ) ) {
      if ( ultimo && contador - ultimo == 2 ) {
        printf( "\n %d & %d \n", ultimo, contador );
        ultimo = contador;
        primos_gemeos++;
      } else
        ultimo = contador;
    }
  }

  printf( "\n Total de primos gêmeos encontrados --> %d\n", primos_gemeos );
}
