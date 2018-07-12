import javax.swing.*;
import java.awt.*;
import java.util.List;

public class JanelaCadastroPessoa extends JDialog{
	private JList<Pessoa> jlPessoas;
	private DefaultListModel<Pessoa> lmPessoas;
	private List<Pessoa> lstPessoas;
	
	private DefaultListModel<Donos> lmDonos;
	private List<Donos> lstDonos;
	
	private JButton btNovo;
	private JScrollPane scrollPane;
	
	public boolean getQuantidadePessoa(){
		return lstPessoas.isEmpty();
	}
	
	public JanelaCadastroPessoa(Frame f){
		super(f,true);
		this.setTitle("Cadatro Pessoa");
		
		lstDonos = Dados.getInstance().getDonos();
		lmDonos = new DefaultListModel<>();
		
		lstPessoas = Dados.getInstance().getPessoas();
		lmPessoas = new DefaultListModel<>();
		
		for(int i=0;i<lstPessoas.size();i++){
			lmPessoas.add(i,lstPessoas.get(i));
		}
		
		jlPessoas = new JList<>(lmPessoas);
		scrollPane = new JScrollPane(jlPessoas);
		this.add(scrollPane);
		
		btNovo = new JButton("Cadastrar Nova Pessoa");
		this.add(btNovo,BorderLayout.SOUTH);
		
		btNovo.addActionListener((e)->{
			String nome = null;
			int idade = 0;
			boolean ok = false;
			
			while(!ok){
				try{
					nome = JOptionPane.showInputDialog(
						this,
						"Digite o Nome:"
					);
					
					if(nome.length()==0)
						throw new CampoVazioException();
					ok=true;
				}catch(CampoVazioException ex){
					JOptionPane.showMessageDialog(
						this,ex.getMessage(),
						"Erro",
						JOptionPane.WARNING_MESSAGE
					);
				}catch(NullPointerException ex){
					
				}
			}
			
			ok = false;
			while(!ok){
				try{
					idade = Integer.parseInt(JOptionPane.showInputDialog(
						this,
						"Digite o Idade:"
					));
					
					if(idade<0)
						throw new NumeroNegativoException(idade);
					
					ok=true;
				}catch(NumeroNegativoException ex){
					JOptionPane.showMessageDialog(
						this,ex.getMessage(),
						"Erro",
						JOptionPane.WARNING_MESSAGE
					);
				}catch(IllegalArgumentException ex){
					JOptionPane.showMessageDialog(
						this,"O Campo dever ser numero",
						"Erro",
						JOptionPane.WARNING_MESSAGE
					);
				}catch(NullPointerException ex){
					
				}
			}
			
			if(ok){
				Pessoa p = new Pessoa();
				p.setNome(nome);
				p.setIdade(idade);
				
				Donos d = new Donos();
				d.setPessoa(p);
				
				lmDonos.add(lmDonos.getSize(),d);
				lstDonos.add(d);
				
				lmPessoas.add(lmPessoas.getSize(),p);
				lstPessoas.add(p);
			}
		});
		
		Pessoa p = new Pessoa();
		p.setNome("a");
		p.setIdade(1);
		
		Donos d = new Donos();
		d.setPessoa(p);
		
		lmDonos.add(lmDonos.getSize(),d);
		lstDonos.add(d);
		
		lmPessoas.add(lmPessoas.getSize(),p);
		lstPessoas.add(p);
		
		Pessoa pa = new Pessoa();
		pa.setNome("b");
		pa.setIdade(2);
		
		Donos da = new Donos();
		da.setPessoa(pa);
		
		lmDonos.add(lmDonos.getSize(),da);
		lstDonos.add(da);
		
		lmPessoas.add(lmPessoas.getSize(),pa);
		lstPessoas.add(pa);
		
		Pessoa paA = new Pessoa();
		paA.setNome("c");
		paA.setIdade(3);
		
		Donos daA = new Donos();
		daA.setPessoa(paA);
		
		lmDonos.add(lmDonos.getSize(),daA);
		lstDonos.add(daA);
		
		lmPessoas.add(lmPessoas.getSize(),paA);
		lstPessoas.add(paA);
		
		this.setSize(300,500);
		this.setLocation(10,178);
		this.setVisible(true);
	}
}
