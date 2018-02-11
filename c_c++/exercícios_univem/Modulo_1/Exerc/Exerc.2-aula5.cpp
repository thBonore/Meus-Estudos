#include <stdio.h>

main(){
	int id;
	
	printf("Digite a idade do nadador:");
	scanf("%d",&id);
	
	if(idade<=8){
		printf("Categoria Infantil A");
	}else if(id<13){
		printf("Categoria Infantil B");
	}else if(id<18){
		printf("Categoria Juvenil A");
	}else if(id<21){
		printf("Categoria Juvenil B");
	}else{
		printf("Categoria Senior");
	}
}
