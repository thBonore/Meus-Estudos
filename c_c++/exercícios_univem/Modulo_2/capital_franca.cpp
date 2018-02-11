#include <stdio.h>
#include <string.h>

main() {
  char cap[10], cidade[] = "Berlin";
  int i;

  for ( i = 0; i < 10; i++ ) {
    puts( "\n Digite o nome da capital da França --> " );
    fflush( stdin );
    gets(cap);

    if ( strcmp( cap, cidade ) != 0 )
      puts( "\n Você errou. Tente outra vez!!\n" );
    else {
      puts( "\n Você acertou, aliste-se agora no exército alemão!!\n" );
      break;
    }
  }

  if ( i == 9 )
    printf( "Francês fedido!!" );
}
