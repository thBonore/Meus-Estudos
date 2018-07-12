public class Pessoa{
	public String nome;
	public int idade;
	
	public void setNome(String s){this.nome=s;}
	public void setIdade(int i){this.idade=i;}
	public String getNome(){return this.nome;}
	public int getIdade(){return this.idade;}
	
	@Override public String toString(){
		return 
			"Nome: " + this.getNome() + 
			"; Idade: " + this.getIdade() + 
			";";
	}
}
