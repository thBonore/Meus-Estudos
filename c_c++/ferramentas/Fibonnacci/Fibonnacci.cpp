#include <iostream>
#include <stdlib.h>

using namespace std;

int main(){

    int n_serie;                   //Essa variável armazena o número da ordem da série de Fibonnacci que o usuário deseja ver
    int a;                         //Variável que vai servir de base para o "for"

    setlocale(LC_ALL, "Portuguese");

    cout<<"Digite o número da série de Fibobonnacci que você deseja ver\n";
    cin>>n_serie;

    int fibonnacci[n_serie];     //Esse vetor armazena a série de fibonnacci até a posição que o usuário que ver
    fibonnacci[0]=0;
    fibonnacci[1]=1;             //Aqui introduzo os dois primeiros números da série (0 e 1), que não fazem parte do padrão da série

    for(a=2; a<n_serie; a++){
        fibonnacci[a]=fibonnacci[a-1] + fibonnacci[a-2];
    }

    cout<<"O "<<n_serie<<"º número da série de fibonnacci é "<<fibonnacci[n_serie-1]<<"\n";

    system("PAUSE");

    return 0;
}
