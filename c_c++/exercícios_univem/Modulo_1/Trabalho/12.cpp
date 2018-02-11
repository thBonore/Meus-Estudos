#include <stdio.h>

main(){
	int ma,me,med;
	
	printf("Digite a media do 1 aluno:");
	scanf("%d",&med);
		
	me = med;
	for(int i=2;i<=5;i++){
		printf("Digite a media do %d aluno:",i);
		scanf("%d",&med);
		
		
		if(med>=0 and med<=10){
					
			if(med >  ma){
				ma = med;
			}
			
			if(med < me){
				me = med;
			}
			
		}else{
			printf("Media invalida. Considere validas de 0 a 10.\n");
		}
	}
	
	printf("A maior media e: %d; e a menor media e: %d",ma,me);
}
