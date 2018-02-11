#include <stdio.h>

int main ( ) {
  int c, n, e, cash, cash_exc;

  printf( "\nDigite o código do operário --> " );
  scanf( "%d", &c );

  printf( "\nDigite o número de horas trabalhadas pelo operário %d --> ", c );
  scanf( "%d", &n );

  if ( n > 50 ) {
    e = n - 50;
    n = 50;
  }

  cash      = n * 10;
  cash_exc  = e * 20;

  printf( "\nO salário do operário %d é de %d reais, sendo que:\n", c, cash + cash_exc );
  printf( "\n%d reais foram das %d horas trabalhadas normamente\n", cash, n );
  printf( "\n%d reais foram das %d horas escedentes\n", cash_exc, e );
}
