import javax.swing.*;
import java.awt.GridLayout;
import java.util.*;

public class Principal extends JFrame{
	private JButton btCadastroPessoa;
	private JButton btCadastroCaneta;
	private JButton btDonos;
	
	private boolean quantidadePessoa = false;
	
	public Principal(){
		super("Principal");
		this.setLayout(new GridLayout(3,1));
		
		btCadastroPessoa = new JButton("Cadastrar Pessoa");
		btCadastroPessoa.addActionListener((e)->{
			JanelaCadastroPessoa jCP = new JanelaCadastroPessoa(this);
			quantidadePessoa = ! jCP.getQuantidadePessoa();
			if(quantidadePessoa == true)
				btDonos.setEnabled(true);
			else
				btDonos.setEnabled(false);
		});
		
		btCadastroCaneta = new JButton("Cadastrar Caneta");
		btCadastroCaneta.addActionListener((e)->{
			JanelaCadastroCaneta jCC = new JanelaCadastroCaneta(this);
		});
		
		btDonos = new JButton("Listas de Donos da Canetas");
		btDonos.setEnabled(false);
		btDonos.addActionListener((e)->{
			JanelaDono jD = new JanelaDono(this);
		});
		
		this.add(btCadastroPessoa);
		this.add(btCadastroCaneta);
		this.add(btDonos);
		
		this.setSize(300,168);
		this.setLocation(10,10);
		this.setVisible(true);
	}
	
	public static void main(String args[]){
		new Principal();
	}
}
