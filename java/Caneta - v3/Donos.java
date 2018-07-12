import java.util.*;

public class Donos{
	private Pessoa pessoa;
	private Caneta canetas[];
	
	private List<Caneta> lstCanetas;
	
	private int p;
	
	public Donos(){
		p=0;
		canetas = new Caneta[100];
	}
	
	public void setPessoa(Pessoa p){pessoa=p;}
	
	public Pessoa getPessoa(){return pessoa;}
	
	public int getP(){return p;}
	
	public boolean addCaneta(Caneta a){
		if(p<canetas.length){
			canetas[p++] = a;
			return true;
		}
		return false;
	}
	public boolean removeCaneta(int idx){
		if(idx<p){
			canetas[idx] = canetas[--p];
			return true;
		}
		return false;
	}
	public List<Caneta> getCanetas(){
		lstCanetas = new LinkedList<>();
		for(int i=0;i<p;i++){
			lstCanetas.add(canetas[i]);
		}
		return lstCanetas;
	}
}
