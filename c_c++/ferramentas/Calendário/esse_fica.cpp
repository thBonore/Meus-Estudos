#include <iostream>
#include <stdlib.h>
#include <string.h>
#include <ctime>

using namespace std;

int main(void)
{

    setlocale(LC_ALL, "Portuguese");

    time_t now = time(0);
    tm *ltm = localtime(&now);
    //data/hora
    int ano = 1900 + ltm->tm_year;
    int mes = ltm->tm_mon;
    int dia = ltm->tm_mday;
    //meses
    string meses[12];
    meses[0] = "Janeiro";
    meses[1] = "Fevereiro";
    meses[2] = "Março";
    meses[3] = "Abril";
    meses[4] = "Maio";
    meses[5] = "Junho";
    meses[6] = "Julho";
    meses[7] = "Agosto";
    meses[8] = "Setembro";
    meses[9] = "Outubro";
    meses[10] = "Novembro";
    meses[11] = "Dezembro";
    //calendário
    bool first = true;
    int linha = 0;
    int rest = dia % 7;
    int dias_dom = ltm->tm_wday;
    while(rest!=1){
        rest --;
        dias_dom --;
        if(dias_dom < 0){
            dias_dom = 7;
        }
    }
    int dia_mes;
    if(mes == 0 || mes == 2 || mes == 4 || mes == 6 || mes == 8 || mes == 10 || mes == 11)
    {
        dia_mes = 31;
    }
    else
    {
        if(mes == 1)
        {
            if(ano % 4 == 0)
            {
                dia_mes = 29;
            }
            else
            {
                dia_mes = 28;
            }
        }
        else
        {
            dia_mes = 30;
        }
    }

    cout<< "Mês de "<< meses[mes] << " de " << ano << endl << endl;
    cout<< " D    S   T   Q   Q   S   S " << endl;


    for(int a = 1; a <= dia_mes; a++)
    {
        if(first)
        {
            for(int i = 1; i <= dias_dom; i++)
            {
                cout<<"    ";
                linha += 1;
            }
            a -= 1;
            first = false;
        }
        else{

            cout<< " ";
            if(a < 10)
            {
                cout<<" ";
            }
            cout<< a << " ";
            linha += 1;
            if(linha%7 == 0){
                cout<< endl;
            }
        }
    }
    cout<< endl;
    system("PAUSE");
    return 0;
}
