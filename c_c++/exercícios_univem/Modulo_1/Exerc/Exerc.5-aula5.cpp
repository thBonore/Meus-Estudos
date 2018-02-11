#include <stdio.h>

main(){
	float a,b,c;
	
	printf("Digite a medida A:");
	scanf("%f",&a);
	
	printf("Digite a media B:");
	scanf("%f",&b);
	
	printf("Digite a media C:");
	scanf("%f",&c);
	
	if((a<b+c) && (b<a+c) && (c<a+b)){
		printf("E um triangulo ...");
		if((a==b)&&(a==c)){
			printf("Equilatero!");
		}else if((a==b)||(a==c)||(b==c)){
			printf("Isosceles!");
		}
	}else{
		printf("Nao e triangulo");
	}
}
