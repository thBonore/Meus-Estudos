#include <stdio.h>

main(){
	int max,vel;
	
	printf("Digite a velocidade maxima permitida:");
	scanf("%d",&max);
	
	printf("Digite a velocidade do veiculo:");
	scanf("%d",&vel);
	
	if(vel>max){
		printf("Sera multado. Velocidade: %d",vel);
	}else{
		printf("Velocidade correta: %d",vel);
	}
}
