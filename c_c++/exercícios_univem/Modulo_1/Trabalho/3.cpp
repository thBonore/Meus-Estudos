#include <stdio.h>

main(){
	int idade;
	printf("Digite uma idade:");
	scanf("%d",&idade);
	
	if(idade >= 16){
		printf("Ja pode votar");
		if(idade >= 18){
			printf(",e ja pode Dirigir.");
		}else{
			printf(", Ainda nao pode dirigir.");
		}
	}else{
		printf("Nao pode votar, e nem dirigir;");
	}
}
