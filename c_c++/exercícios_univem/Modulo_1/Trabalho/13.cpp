#include <stdio.h>

main(){
   int num,td=0;
   
   printf("Digite um numero:");
   scanf("%d",&num);
   
   for(int i=1;i<=num;i++){
		if(num%i==0){
			td++;
		}
   }
   
	if(td>2){
		printf("%d nao e primo",num);
	}else{
		printf("%d e primo",num);
	}
}
