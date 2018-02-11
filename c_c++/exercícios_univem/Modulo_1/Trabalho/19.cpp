#include <stdio.h>
#include <stdlib.h>

int main( ) {
  int y;
  float x, pt;

  printf( "\nDigite um valor para a base --> " );
  scanf( "%f", &x );
  printf( "\nDigite um valor para o exponente --> " );
  scanf( "%d", &y );

  if ( y >= 0 )
    for ( pt = x; y > 0; y-- )
      pt *= x;
  else
    for ( y = abs( y ), x = 1 / x, pt = x; y > 0; y-- )
      pt *= x;
      
  printf( "\nO resultado da potenciação é --> %.2f\n", pt );
}
