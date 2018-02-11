#include <stdio.h>

main(){
	int idade,ma,me;
	
	printf("Digite uma idade:");
	scanf("%d",&idade);
	
	me=idade;
	do{
		printf("Digite uma idade:");
		scanf("%d",&idade);
		
		if(idade!=0){	
			if(idade >  ma){
				ma = idade;
			}
			if(idade < me){
				me = idade;
			}
		}
		
	}while(idade != 0);
	
	printf("A maior idade e: %d; e a menor idade e: %d",ma,me);
}
