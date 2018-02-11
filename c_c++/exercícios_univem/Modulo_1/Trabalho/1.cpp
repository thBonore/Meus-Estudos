#include <stdio.h>

main(){
	int value,aux,cont=1;
	printf("Digite um valor de 3 casas:");
	scanf("%d",&value);
	
	if(value <= 999){
		do{
			aux= value % 10;
			value/=10;
			
			if(cont==3){
				printf("%d Centena\n",aux);
			}else if(cont==2){
				printf("%d Dezena\n",aux);
			}else if(cont==1){
				printf("%d Unidade\n",aux);
			}
			cont++;
		}while(value != 0);
	}else{
		printf("Apenas 3 numeros.");
	}
}
