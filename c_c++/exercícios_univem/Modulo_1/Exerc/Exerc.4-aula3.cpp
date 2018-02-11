#include <stdio.h>

main(){
	int a,b,c;
	
	printf("Digite o valor de A:");
	scanf("%d",&a);
	
	printf("Digite o valor de B:");
	scanf("%d",&b);
	
	c=a;
	a=b;
	b=c;
	
	printf("O valor de A = %d e B = %d", a,b);
}
