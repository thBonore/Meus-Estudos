import javax.swing.*;
import java.awt.*;
import java.util.List;

public class JanelaCadastroCaneta extends JDialog{
	private JList<Caneta> jlCanetas;
	private DefaultListModel<Caneta> lmCanetas;
	private List<Caneta> lstCanetas;
	private JButton btNovo;
	private JScrollPane scrollPane;
	
	public JanelaCadastroCaneta(Frame f){
		super(f,true);
		this.setTitle("Cadatro Caneta");
		
		lstCanetas = Dados.getInstance().getCanetas();
		lmCanetas = new DefaultListModel<>();
		
		for(int i=0;i<lstCanetas.size();i++){
			lmCanetas.add(i,lstCanetas.get(i));
		}
		
		jlCanetas = new JList<>(lmCanetas);
		scrollPane = new JScrollPane(jlCanetas);
		this.add(scrollPane);
		
		btNovo = new JButton("Cadastrar Nova Caneta");
		this.add(btNovo,BorderLayout.SOUTH);
		
		btNovo.addActionListener((e)->{
			boolean ok = false;
			String modelo = null;
			String cor = null;
			
			while(!ok){
				try{
					modelo = JOptionPane.showInputDialog(
						this,
						"Digite o Modelo:"
					); 
					if(modelo.length()==0)
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
					String[] cores = {"Azul","Preto","Verde","Vermelho"};
					cor = (String) JOptionPane.showInputDialog(
						this,
						"Cor:",
						"Entrada",
						JOptionPane.QUESTION_MESSAGE,
						null,
						cores,
						null
					);
					if(cor.length()==0)
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
			
			if(ok){
				Caneta c = new Caneta(modelo,cor);
				
				JOptionPane.showMessageDialog(
					this,"De Padrao a Caneta vem Tampada",
					"Aviso",
					JOptionPane.INFORMATION_MESSAGE
				);
				lmCanetas.add(lmCanetas.getSize(),c);
				lstCanetas.add(c);
			}
		});
		
		this.setSize(300,500);
		this.setLocation(10,178);
		this.setVisible(true);
	}
}

