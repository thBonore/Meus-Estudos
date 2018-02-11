#include <stdio.h>
#include <stdlib.h>
#include <conio.h>

main(){
	char sexo,avaliacao;
	int aux=0,fg=0,fn=0,mg=0,mn=0,qn=0,qg=0;
	
	printf("Nossa empresa gosatia de saber sua satisfacao do produto\n");
	for(int i=1;i<=2000;i++){
		printf("\nInforme seu sexo: (f/m)");
		sexo=getch();
		printf("%c\n",sexo);
		fflush(stdin);
		
		if(sexo == 'f' || sexo == 'm'){
			printf("Informe seu gostou: (s/n)");
			avaliacao=getch();
			printf("%c\n",avaliacao);
			fflush(stdin);
			
			if(avaliacao == 's' || avaliacao == 'n'){
				if(avaliacao == 's'){
					if(sexo == 'f'){
						fg++;
					}else{
						mg++;
					}
				}else{
					if(sexo == 'f'){
						fn++;
					}else{
						mn++;
					}
				}
			}else{
				printf("Resposta incorreta para esta pergunta!\n");
			}
		}else{
			printf("Resposta incorreta para esta pergunta!\n");
		}
	}
	aux = fg+fn;
	printf("\nQuantidade de Mulheres (%d), Gostaram (%d) Nao gostaram (%d)",aux,fg,fn);
	aux = mg+mn;
	printf("\nQuantidade de Homens (%d), Gostaram (%d) Nao gostaram (%d)",aux,mg,mn);
	
	qg = fg+mg;
	qn = fn+mn;
	
	if(qg>qn){
		printf("\n\nA empresa ira lancar mais desse produto!");
	}else{
		printf("\n\nA empresa nao ira lancar mais desse produto!");
	}
	
	aux= qg+qn;
	printf(" Com um total de %d avaliaçoes",aux);

}	
