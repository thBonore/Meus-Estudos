#include <stdio.h>

main(){
	int qp;
	float pp,total;
	
	do{
		printf("Digite o preco do produto:");
		scanf("%f",&pp);
		if(pp != 0){
			printf("Digite a quantidade:");
			scanf("%d",&qp);
			
			total+=pp*qp;
		}
	}while(pp != 0);
	
	printf("O total da compra deu : R$ %.2f",total);
}
