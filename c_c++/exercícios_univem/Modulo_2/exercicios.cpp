#include <stdio.h>
#include <string.h>

main( ) {
  char string[50], letra[1];
  int numeroVogais = 0;

  printf( "\n Digite uma string --> " );
  fflush( stdin );
  gets( string );
  strupr( string );

  for ( int contador = 0; contador < strlen( string ) - 1; contador++ ) {
    if ( string[contador] == 'A' || string[contador] == 'E' || string[contador] == 'I' || string[contador] == 'O' || string[contador] == 'U' )
      numeroVogais++;
  }

  printf( "\n A palavra %s possui %d vogais!!", string, numeroVogais );
}
