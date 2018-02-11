#include <stdio.h>

main(){
	int limite=50;
	float multa=4.00,p;
	
	printf("Digite o peso de peixes:");
	scanf("%f",&p);
	
	if(p>limite){
		multa = p*multa;
		printf("%.2f",multa);
	}
}
