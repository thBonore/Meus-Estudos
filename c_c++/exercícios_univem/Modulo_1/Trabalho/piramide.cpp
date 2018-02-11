#include <stdio.h>

main(){
	int piramide[15][15],i=0,j=0;
	for(i=0;i<15;i++){
		for(j=0;j<15;j++){
			piramide[i][j]=1;
		}
	}
	
	printf("\nTriangulo 1:\n\n     ");
	
	
	for(i=0;i<15;i++){
		printf("%.2d  ",i);
	}
	printf("\n\n");
	for(i=0;i<15;i++){
		printf("%.2d	|",i);
		for(j=0;j<15;j++){
			if(i>=j){
				printf("%.2d|",piramide[i][j]);
			}else{
				//printf("00  ");
			}
		}
		printf("\n");
	}
}
