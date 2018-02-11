#include <stdio.h>

main(){
	char sexo;
	float alt,peso;
	
	printf("Digite a altura da pessoa:");
	scanf("%f", &alt);
	
	printf("Digite o sexo (f ou m):");
	fflush(stdin);
	scanf("%c",&sexo);
	
	if(sexo=='m'){
		peso = 72.7*alt-58;
	}else{
		peso = 62.1*alt-44.7;
	}
	
	printf("\nPeso ideal = %.2f",peso);
}
