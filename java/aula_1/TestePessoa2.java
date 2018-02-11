public class TestePessoa2 {
	public static void main(String args[]) {
		java.util.Scanner teclado = new java.util.Scanner(System.in);
		
		Pessoa p1 = new Pessoa();
		
		System.out.printf("Digite o nome da pessoa: ");
		p1.nome = teclado.nextLine();
		
		System.out.printf("Nome da pessoa: %s\n", p1.nome);
		
		System.out.printf("Digite a idade da pessoa: ");
		p1.idade = teclado.nextInt();
		teclado.nextLine();
		
		System.out.printf("Idade da pessoa: %s\n", p1.idade);
		
		System.out.printf("Digite a peso da pessoa: ");
		p1.peso = teclado.nextFloat();
		teclado.nextLine();
		
		System.out.printf("Peso da pessoa: %.2f\n", p1.peso);
	}
}
