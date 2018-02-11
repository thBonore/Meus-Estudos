#include <stdio.h>

main(){
	int voltas;
	printf("Digite um angulo:");
	scanf("%d",&voltas);
	
	voltas = voltas % 360;
	
	if(voltas >= 0 and voltas < 90){
		printf("1 quadrante");
	}else if(voltas >= 90 and voltas < 180){
		printf("2 quadrante");
	}else if(voltas >= 180 and voltas < 270){
		printf("3 quadrante");
	}else if(voltas >= 270){
		printf("4 quadrante");
	}
}
