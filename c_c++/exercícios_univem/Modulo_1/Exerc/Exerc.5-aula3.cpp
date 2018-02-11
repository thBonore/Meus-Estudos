#include <stdio.h>

main(){
	int t,h,m,s;
	
	printf("Digite um tempo em segundos:");
	scanf("%d",&t);
	
	h = t/3600;
	m = (t%3600)/60;
	s = (t%60);
	
	printf("%d horas %d minutos %d segundos", h,m,s);
}
