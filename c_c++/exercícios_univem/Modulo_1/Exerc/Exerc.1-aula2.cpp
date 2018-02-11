#include <stdio.h>

main(){
	float n1,n2,media;
	printf("Digite a primeira nota:");
	scanf("%f",&n1);
	printf("Digite a segunda nota:");
	scanf("%f",&n2);
	media=(n1+n2)/2;
	printf("A media das notas: %.2f", media);
}
