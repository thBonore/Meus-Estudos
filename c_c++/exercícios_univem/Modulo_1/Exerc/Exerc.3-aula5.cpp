#include <stdio.h>

main(){
	float vc,desc,vp;
	printf("Digite o valor da compra:");
	scanf("%f",&vc);
	if(vc>=500){
		desc=vc*0.25;
	}else if(vc>=200){
		desc=vc*0.20;
	}else{
		desc=vc*0.15;
	}
	
	vp = vc-desc;
	printf("\nValor da compra = %.2f",vc);
	printf("\nValor do desconto = %.2f",desc);
	printf("\nValor a pagar = %.2f",vp);
}
