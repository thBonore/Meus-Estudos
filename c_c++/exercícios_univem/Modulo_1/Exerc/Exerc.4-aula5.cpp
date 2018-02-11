#include <stdio.h>

main(){
	float peso,alt,imc;
	
	printf("Digite o peso da pessoa:");
	scanf("%f",&peso);
	
	printf("Digite a altura da pessoa:");
	scanf("%f",&alt);
	
	imc=peso/(alt*alt);
	
	if(imc < 18){
		printf("Abaixo do peso! IMC = %.2f",imc);
	}else if(imc < 25){
		printf("Peso normal! IMC = %.2f",imc);
	}else if(imc < 30){
		printf("Acima do peso! IMC = %.2f",imc);
	}else{
		printf("Obeso(a)! IMC = %.2f",imc);
	}
}
