#include <stdio.h>
#include <stdlib.h>
#include <string.h>

main() {
	char nome[50];
	
	printf( "Digite um nome --> " );
	gets( nome );
	
	for ( int i = 1; i < strlen( nome ); i += 2 )
		printf( "%c", nome[i] );
}
