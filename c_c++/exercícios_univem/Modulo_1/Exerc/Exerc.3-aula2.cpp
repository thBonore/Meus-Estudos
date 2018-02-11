#include <stdio.h>

main(){	
	float vgasolina,vpago,result;
	
	printf("Informe o preço da gasolina ->	");
	scanf("%f",&vgasolina);
	
	printf("Informe o preço pago ->	");
	scanf("%f",&vpago);
	
	result=vgasolina/vpago;
	printf("Listro colocado é: %.2f",result);
}
