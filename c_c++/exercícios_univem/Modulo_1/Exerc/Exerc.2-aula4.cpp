#include <stdio.h>

main(){
	int a,b;
	
	printf("Digite um valor A:");
	scanf("%d",&a);
	
	printf("Digite um valor para B:");
	scanf("%d",&b);
	
	if(a==b){
		printf("Valores iguais!");
	}else{
		if(a>b){
			printf("Maior valor = %d",a);
		}else{
			printf("Maior valor = %d",b);
		}
	}
}
