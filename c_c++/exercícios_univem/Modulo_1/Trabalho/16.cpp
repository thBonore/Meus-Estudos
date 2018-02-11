#include <stdio.h>

int main( ) {
  int voto, contador = 0;
  float dilma = 0, serra = 0, heloisa = 0;

   do {
    contador++;
    printf( "\nDigite seu voto --> " );
    scanf( "%d", &voto );

    if ( voto == 13 )
      dilma++;
    else if ( voto == 45 )
      serra++;
    else if ( voto == 50 )
      heloisa++;
    else if ( voto == 0 )
      contador--;

  } while( voto != 0 );

  printf( "\n\nForam realizados %d votos, sendo que:\n", contador );
  printf( "\n*A candidata Dilma recebeu %f votos, com %f por cento dos votos\n", dilma, ( dilma / contador ) * 100 );
  printf( "\n*O candidato Serra recebeu %f votos, com %f por cento dos votos\n", serra, ( serra / contador ) * 100 );
  printf( "\n*A candidata Heloísa recebeu %f votos, com %f por cento dos votos\n", heloisa, ( heloisa / contador ) * 100 );
  printf( "\n*Houveram %f votos nulos", contador - ( dilma + serra + heloisa ) );

  if ( dilma > serra ) {
    if ( dilma > heloisa )
      printf( "\n\n --> Pela pesquisa, Dilma ganharia a eleicao\n" );
    else if ( dilma == heloisa )
      printf( "\n\n --> Pela pesquisa, Dilma e Heloísa iriam para o segundo turno\n" );
  } else if ( dilma == serra ) {
    if ( dilma > heloisa )
      printf( "\n\n --> Pela pesquisa, Dilma e Serra iriam para o segundo turno\n" );
    else if ( dilma == heloisa )
      printf( "\n\n --> Pela pesquisa, os três candidatos empatariam\n" );
  } else if ( serra > heloisa ) {
    printf( "\n\n --> Pela pesquisa, Serra ganharia a eleicao\n" );
  } else {
    printf( "\n\n --> Pela pesquisa, Serra e Heloísa iriam para o segundo turno\n" );
  }
}
