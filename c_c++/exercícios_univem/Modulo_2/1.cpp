#include <stdio.h>
#include <stdlib.h>

main() {
	char nome[50];
	
	printf( "Digite um nome --> " );
	gets( nome );
	
	printf( "\n" );
	
	for ( int i = 0; i < 4; i++ )
		printf( "%c", nome[i] );
}
