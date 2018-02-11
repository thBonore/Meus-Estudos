public class TestePessoa {
	public static void main(String args[]) {
		Pessoa p1;
		
		p1 = new Pessoa();
		p1.nome = "João";
		p1.idade = 30;
		p1.peso = 70;
		
		p1.andar();
		p1.fazerAniversario();
		
		System.out.printf("Nome: %s\n", p1.nome);
		System.out.printf("Idade: %d\n", p1.idade);
		System.out.printf("Peso: %.2f\n\n", p1.peso);
		
		Pessoa p2 = new Pessoa();
		p2.nome = "José";
		p2.idade = 50;
		p2.peso = 80;
		
		System.out.printf("Nome: %s\n", p2.nome);
		System.out.printf("Idade: %d\n", p2.idade);
		System.out.printf("Peso: %.2f\n\n", p2.peso);
		
		Pessoa p3 = p1;
		p3.andar();
		p3.andar();
		System.out.printf("p3 andou 2 vezes!\n");
		
		System.out.printf("Nome: %s\n", p1.nome);
		System.out.printf("Idade: %d\n", p1.idade);
		System.out.printf("Peso: %.2f\n\n", p1.peso);
	}
}
