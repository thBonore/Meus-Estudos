#include <stdio.h>

main(){
	int id,cont=0;
	float med,soma=0;
	
	do{
		printf("Digite uma idade ou 0 para encerrar:");
		scanf("%d",&id);
		
		if(id>0){
			soma +=id;
			cont++;	
		}
		
	}while(id>0);
	
	if(soma == 0){
		printf("Nao houve idades digitadas");
	}else{
		med = soma/(cont-1);
		printf("Media das idades = %.2f",med);
	}
}
