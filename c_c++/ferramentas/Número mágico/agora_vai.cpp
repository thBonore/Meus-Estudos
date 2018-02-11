#include <iostream>
#include <conio.h>
#include <stdlib.h>
#include <time.h>

using namespace std;

int main(void)
{
    setlocale(LC_ALL, "Portuguese");
    int i;
    int valor;
    int tentativas;

    srand(time(NULL));

    int numero=rand()%60;

    cout<<"\nGerando um valor aleat�rio...\n\n";
    cout<<"Agora tente advinhar este valor!!\n\n";

    cin>>valor;

        while(valor!=numero){
            if(valor<numero){
                cout<<"Tente um valor maior do que o digitado\n";
            }
            else{
                cout<<"Tente um valor menor do que o digitado\n";
            }
            cin>>valor;
        }

    cout<<"Parab�ns, voc� acertou o n�mero gerado ";

    getch();
    return 0;
}
