public class Pessoa {

	String nome;
	float peso;
	int idade;
	
	void andar() {
		peso -= 1;
	}
	
	void comer() {
		peso += 1;
	}
	
	void fazerAniversario() {
		idade++;
	}
}
