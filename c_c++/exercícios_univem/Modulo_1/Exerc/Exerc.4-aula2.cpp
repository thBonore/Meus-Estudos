#include <stdio.h>

main(){
	float pproduto,nv;
	
	printf("Digite o preco do produto:");
	scanf("%f",&pproduto);
	
	nv=pproduto*0.10;
	
	printf("O produto sofreu um desconto de 10%, novo preco e %.2f",nv);
}
