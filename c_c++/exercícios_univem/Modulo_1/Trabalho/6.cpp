#include <stdio.h>

main(){
	float ind;
	
	printf("Indice de Poluicao:");
	scanf("%f",&ind);
	
	if((ind>=0.05) and (ind<0.25)){
		printf("Indice dentro dos padroes aceitaveis.");
	}else if((ind>0.25) and (ind<0.4)){
		printf("Paraliza as atividades somenta do 1 grupo.");
	}else if((ind>=0.4) and (ind<0.5)){
		printf("Paraliza as atividades do 1 e do 2 grupo.");
	}else if(ind>=0.5){
		printf("Paraliza as atividades dos tres grupos de industrias.");
	}
}
