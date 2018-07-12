import java.util.*;

public class Dados{
	private static Dados instance;
	public static Dados getInstance(){
		if(instance==null){
			instance = new Dados();
		}
		return instance;
	}
	
	private List<Pessoa> lstPessoas;
	private List<Caneta> lstCanetas;
	private List<Donos> lstDonos;
	
	private Dados(){
		lstPessoas = new LinkedList<>();
		lstCanetas = new LinkedList<>();
		lstDonos = new LinkedList<>();
	}
	public List<Pessoa> getPessoas(){
		return lstPessoas;
	}
	public List<Caneta> getCanetas(){
		return lstCanetas;
	}
	public List<Donos> getDonos(){
		return lstDonos;
	}
}
