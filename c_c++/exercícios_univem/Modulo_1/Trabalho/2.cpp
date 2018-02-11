#include <stdio.h>

main(){
	int vm,vd,vv,result;
	
	printf("Digite a velocidade maxima:");
	scanf("%d",&vm);
	printf("Digite a velocidade determinada do veiculo trafegar:");
	scanf("%d",&vd);
	printf("Digite a velocidade do veiculo:");
	scanf("%d",&vv);
	
	if(vv > vd and vv < vm){
		printf("\nO veiculo esta na velocidade permitida\n");
	}else if(vv > vm){
		result = vv - vm;
		printf("\nO veiculo utrapassou (%d) da velocidade permitida\n",result);
	}
}
