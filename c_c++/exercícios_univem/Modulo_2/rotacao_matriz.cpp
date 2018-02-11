#include <stdio.h>
#include <stdlib.h>
#include <time.h>

main() {
  int matriz[5][5], linha, coluna, linha_check, coluna_check, existe;

  srand( time( NULL ) );

  printf( "\n MATRIZ GERADA RANDOMICAMENTE:\n" );

  for ( linha = 0; linha < 5; linha++ ) {
    printf( "\n" );
    for ( coluna = 0; coluna < 5; coluna++ ) {
      do {
        existe = 1;
        matriz[linha][coluna] = rand() % 99;

        for ( linha_check = 0; linha_check <= linha; linha_check++ ) {
          for ( coluna_check = 0; coluna_check <= coluna; coluna_check++ ) {
            if ( ( linha_check != linha || coluna_check != coluna ) && matriz[linha][coluna] == matriz[linha_check][coluna_check] ) {
              existe = 0;
              break;
            }
          }
          if ( !existe )
            break;
        }
      } while ( !existe );
      printf( " %2.d ", matriz[linha][coluna] );
    }
    printf( "\n" );
  }
}
