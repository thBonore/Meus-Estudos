public class NumeroNegativoException extends IllegalArgumentException{
	public NumeroNegativoException(double n){
		super("O Numero nao pode ser Negativo: " + n);
	}
}
