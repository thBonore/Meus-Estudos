public class Caneta{
	public String modelo;
	public String cor;
	protected boolean tampada;
	
	public void setModelo(String m){this.modelo=m;}
	public void setCor(String c){this.cor=c;}
	public void setTampada(boolean t){this.tampada=t;}
	
	public String getModelo(){return this.modelo;}
	public String getCor(){return this.cor;}
	public boolean getTampada(){return this.tampada;}
	
	public Caneta(String m, String c){
		this.modelo=m;
		this.cor=c;
		this.tampar();
	}
	
	@Override public String toString(){
		return "Modelo: " + this.getModelo() + "; Cor: " + this.getCor() + ";";
	}
	
	void rabiscar(){
		if(this.tampada)
			System.out.printf("ERRO : A CANETA ESTA TAMPADA");
		else
			System.out.printf("Rabisco");
	}
	
	void tampar(){
		this.tampada=true;
	}
	
	void destampar(){
		this.tampada=false;
	}
}
