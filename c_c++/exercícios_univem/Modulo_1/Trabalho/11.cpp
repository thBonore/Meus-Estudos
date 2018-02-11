#include <stdio.h>

main(){
	int num,sd=0;
	printf("Digite o numero:");
	scanf("%d",&num);
	
	for(int d=1;d<=num/2;d++){
		if(num%d==0){
			sd+=d;
		}
	}
	if(sd==num){
		printf("%d e perfeito",num);
	}else{
		printf("%d nao e perfeito",num);
	}
}
