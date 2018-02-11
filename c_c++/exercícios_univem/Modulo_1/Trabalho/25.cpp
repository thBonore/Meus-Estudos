#include <stdio.h>

int main( ) {
  bool bissexto = false, pass = true;
  int dia, mes, ano;

  printf( "\nDigite o dia --> " );
  scanf( "%d", &dia );

  printf( "\nDigite o mes --> " );
  scanf( "%d", &mes );

  printf( "\nDigite o ano --> " );
  scanf( "%d", &ano );

  if ( ano < 0 )
    pass = false;
  else if ( ano % 400 == 0 || ( ano % 4 == 0 && ano % 100 != 0 ) )
    bissexto = true;

  if ( mes == 1 || mes == 3 || mes == 5 || mes == 7 || mes == 8 || mes == 10 || mes == 12 ) {
    if ( dia < 1 || dia > 31 )
      pass = false;
  } else if ( mes == 4 || mes == 6 || mes == 9 || mes == 11 ) {
    if ( dia < 1 || dia > 30 )
      pass = false;
  } else if ( mes == 2 ) {
    if ( bissexto ) {
      if ( dia < 1 || dia > 29 )
        pass = false;
    } else if ( dia < 1 || dia > 28 ) {
      pass = false;
    }
  } else {
    pass = false;
  }

  if ( pass )
    printf( "\n%d/%d/%d é uma data válida\n", dia, mes, ano );
  else
  printf( "\n%d/%d/%d não é uma data válida\n", dia, mes, ano );

}
