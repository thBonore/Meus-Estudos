#include <iostream>
#include <stdlib.h>
#include <string.h>

using namespace std;

    string letra_sexo;
    string moeda_base;
    string nomes_moeda[11];
    float valores_moeda[11];
    int resposta;
    int i=0;
    int a=0;
    int e=0;
    bool prosseguir = false;

string v_sexo(){

    int sexo;

    cout<<"Informe seu sexo\n";
    cout<<"1.Sou do sexo Masculino\n";
    cout<<"2.Sou do sexo Feminino\n";
    cin>>sexo;
    switch(sexo){
        case 1:
            letra_sexo="o";
            break;
        case 2:
            letra_sexo="a";
            break;
        default:
            while(sexo!=1 && sexo!=2){
                cin>>sexo;
                switch(sexo){
                    case 1:
                        letra_sexo="o";
                        break;
                    case 2:
                        letra_sexo="a";
                        break;
                }
            }
    }
    return (letra_sexo);
}

string reg_nome(){

    cout<<"Insira a seguir o nome da "<< i+e <<"ª moeda ser a registrada\n";
    cin>> nomes_moeda[i-1];
    return (nomes_moeda[i-1]);
}

float reg_valor(){

        cout<<"Insira a seguir o preço do "<< nomes_moeda[i-1] <<" em "<< moeda_base <<"\n";
        cin>> valores_moeda[i-1];
        return valores_moeda[i-1];
}

string conf_nome(){

        int prosseg;

        for(a=1;a<i;a++){
            cout<<"\n"<< a <<". "<<nomes_moeda[a-1]<<"\n";
        }
        cout<<"\nQual das moedas deseja modificar?\n";
        cin>>resposta;
        resposta--;
        cout<<"Qual nome deseja dar ao \""<<nomes_moeda[resposta]<<"\"?\n";
        cin>>nomes_moeda[resposta];
        cout<<"\nDeseja modificar o nome de outra moeda?\n1.Sim, desejo modificar o nome de outra moeda\n2.Não, desejo prosseguir\n";
        cin>>prosseg;
        switch(prosseg){
            case 1:
                return (nomes_moeda[resposta]);
                break;
            case 2:
                prosseguir=true;
                return (nomes_moeda[resposta]);
                break;
            default:
                while(prosseg!=1 && prosseg!=2){
                    cin>>prosseg;
                    switch(prosseg){
                        case 1:
                            return (nomes_moeda[resposta]);
                            break;
                        case 2:
                            prosseguir=true;
                            return (nomes_moeda[resposta]);
                            break;
                    }
                }
    }
}

float conf_valor(){

        int prosseg;

        for(a=1;a<i;a++){
            cout<<"\n"<< a <<". "<<nomes_moeda[a-1]<<": "<<valores_moeda[a-1]<<"\n";
        }
        cout<<"\nQual dos valores deseja modificar?\n";
        cin>>resposta;
        resposta--;
        cout<<"Qual valor deseja dar ao "<<nomes_moeda[resposta]<<"?\n";
        cin>>valores_moeda[resposta];
        cout<<"\nDeseja modificar o valor de outra moeda?\n1.Sim, desejo modificar o valor de outra moeda\n2.Não, desejo prosseguir\n";
        cin>>prosseg;
        switch(prosseg){
            case 1:
                return (valores_moeda[resposta]);
                break;
            case 2:
                prosseguir=true;
                return (valores_moeda[resposta]);
                break;
            default:
                while(prosseg!=1 && prosseg!=2){
                    cin>>prosseg;
                    switch(prosseg){
                        case 1:
                            return (valores_moeda[resposta]);
                            break;
                        case 2:
                            prosseguir=true;
                            return (valores_moeda[resposta]);
                            break;
                    }
                }
    }
}

int main(void){

    setlocale(LC_ALL, "Portuguese");

    string nome_usuario;
    bool pronto=false;

    cout<<"Bem vindo ao seu auxiliar de finanças, versão primária, para começarmos as tarefas, necessitamos de algumas informações\n";
    cout<<"Seu nome:\n";
    cin>>nome_usuario;
    v_sexo();
    cout<< nome_usuario <<" ,"<< letra_sexo <<" senhor";if(letra_sexo=="a"){cout<< letra_sexo;}cout<<" deseja saber sobre nosso sistema de câmbio e as informações que precisa fornecer ou já está informad"<< letra_sexo <<"\nsobre tal?\n1.Sim, quero saber mais\n2.Não, já estou informad"<< letra_sexo <<"\n";
    cin>>resposta;
    switch(resposta){
        case 1:
            cout<<"\nPois bem,"<< nome_usuario <<" ,esta versão do programa tem capacidade para armazenar até 10 valores de câmbio (Dollar, Yemen etc), mas não é por isso que você precisa inserir os valores de 10 moedas , recomendamos apenas a incersão\ndos valores que "<< letra_sexo <<" senhor";if(letra_sexo=="a"){cout<< letra_sexo;}cout<<" vai ultilizar nesta cessão.\n\n";
            break;
        case 2:
            cout<<"\nPois bem,"<< nome_usuario <<" ,vamos prosseguir...\n";
            break;
        default:
            while(resposta!=1 && resposta!=2){
                cin>>resposta;
                switch(resposta){
                    case 1:
                        cout<<"\nPois bem,"<< nome_usuario <<" ,esta versão do programa tem capacidade para armazenar até 10 valores de câmbio (Dollar, Yemen etc), mas não é por isso que você precisa inserir os valores de 10 moedas , recomendamos apenas a incersão\ndos valores que "<< letra_sexo <<" senhor";if(letra_sexo=="a"){cout<< letra_sexo;}cout<<" vai ultilizar nesta cessão.\n\n";
                        break;
                    case 2:
                        cout<<"\nPois bem,"<< nome_usuario <<" ,vamos prosseguir...\n";
                        break;
                }
            }
    }
    cout<<"Insira o nome da moeda que vai usar como base no câmbio\n";
    cin>>moeda_base;
    cout<<"Insira a seguir quantas moedas o senhor";if(letra_sexo=="a"){cout<< letra_sexo;}cout<<" deseja adicionar inicialmente\n";
    cin>>resposta;
    for(i=1;i<=resposta;i++){
        reg_nome();
    }
    for(i=1;i<=resposta;i++){
        reg_valor();
    }

    while(pronto!=true){
        cout<<"Confira a seguir a lista de valores das moedas em "<<moeda_base<<":\n\n";
        for(a=1;a<i;a++){
            cout<<nomes_moeda[a-1]<<": "<<valores_moeda[a-1]<<" "<<moeda_base<<"\n\n";
        }
        cout<<"\nEssa lista está de acordo?\n\n1.Sim, está de acordo e desejo prosseguir\n\n2.Não, desejo mudar o nome de alguma moeda\n\n3.Não,desejo mudar o valor de alguma moeda\n\n4.Não, desejo mudar o nome da minha moeda base\n\n5.Não, desejo trocar a minha moeda base para uma moeda que eu já registrei, e desejo alterar proporcionalmente o valor \nde todas as outras de acordo com o valor da moeda escolhida\n\n6.Não, desejo adicionar mais alguma moeda\n";
        cin>>resposta;
        switch(resposta){
            case 2:
                prosseguir=false;
                while(prosseguir!=true){
                    conf_nome();
                }
                break;
            case 3:
                prosseguir=false;
                while(prosseguir!=true){
                    conf_valor();
                }
                break;
            case 4:
                cout<<"\nSua base atual para o câmbio é o "<<moeda_base;
                cout<<"\nQual nome deseja dar a ela?\n";
                cin>>moeda_base;
                break;
            case 5:
                for(a=1;a<i;a++){
                cout<<"\n"<< a <<". "<<nomes_moeda[a-1]<<"\n";
                }
                cout<<"\nQual dessas moedas você deseja colocar como sua moeda base?\n";
                cin>>resposta;
                resposta--;
                nomes_moeda[10] = moeda_base;
                moeda_base = nomes_moeda[resposta];
                nomes_moeda[resposta] = nomes_moeda[10];
                valores_moeda[resposta] = 1.00 / valores_moeda[resposta];
                for(a=0;a<i;a++){
                    if(a==resposta){
                        continue;
                    }
                    valores_moeda[a]=valores_moeda[a] * valores_moeda[resposta];
                }
                break;
            case 6:
                cout<<"Insira a seguir quantas moedas " << letra_sexo << " senhor";if(letra_sexo=="a"){cout<< letra_sexo;}cout<<" deseja adicionar\n";
                cin>>resposta;
                for(e=0;e<=resposta;e++){
                    reg_nome();
                }
                for(e=0;e<=resposta;e++){
                    reg_valor();
                }
            default:
                pronto=true;
                break;
        }
    }
}
