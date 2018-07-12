import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.util.List;

public class JanelaDono extends JDialog{
	private JLabel lblNome;
	private JTextField txtNome;
	
	private JLabel lblCanetas;
	private JLabel lblCanetasDonos;
	
	private DefaultListModel<Donos> lmDonos;
	private List<Donos> lstDonos;
	
	private JList<Caneta> jlCanetas;
	private DefaultListModel<Caneta> lmCanetas;
	private List<Caneta> lstCanetas;
	private JScrollPane scrollPaneCanetas;
	
	private JList<Caneta> jlCanetasDonos;
	private DefaultListModel<Caneta> lmCanetasDonos;
	private List<Caneta> lstCanetasDonos;
	private JScrollPane scrollPaneCanetasDonos;
	
	private JButton btMoverEsquerda;
	private JButton btMoverDireita;
	
	private JButton btAnterior;
	private JButton btProximo;
	
	public int p=0;
	
	public JanelaDono(Frame f){
		super(f,true);
		this.setTitle("Dono");
		
		lstDonos = Dados.getInstance().getDonos();
		lmDonos = new DefaultListModel<>();
		
		this.setLayout(new GridLayout(5,2));
		
		JLabel lblNome = new JLabel("Nome da Pessoa:");
		txtNome = new JTextField();
		txtNome.setText(lstDonos.get(p).getPessoa().getNome());
		txtNome.setEditable(false);
		
		JLabel lblCanetasDonos = new JLabel("Canetas do Dono");
		JLabel lblCanetas = new JLabel("Canetas");
		
		lstCanetas = Dados.getInstance().getCanetas();
		lmCanetas = new DefaultListModel<>();
		
		for(int i=0;i<lstCanetas.size();i++){
			lmCanetas.add(i,lstCanetas.get(i));
		}
		
		jlCanetas = new JList<>(lmCanetas);
		scrollPaneCanetas = new JScrollPane(jlCanetas);
		
		
		lstCanetasDonos = lstDonos.get(p).getCanetas();
		lmCanetasDonos = new DefaultListModel<>();
		
		for(int i=0;i<lstCanetasDonos.size();i++){
			lmCanetasDonos.add(i,lstCanetasDonos.get(i));
		}
		
		jlCanetasDonos = new JList<>(lmCanetasDonos);
		scrollPaneCanetasDonos = new JScrollPane(jlCanetasDonos);
		
		btMoverEsquerda = new JButton("Mover ->");
		btMoverDireita = new JButton("Mover <-");
		
		btMoverEsquerda.setEnabled(false);
		btMoverDireita.setEnabled(false);
		
		jlCanetas.addMouseListener(new MouseAdapter(){
			public void mousePressed(MouseEvent arg0){
				if(jlCanetas.isSelectionEmpty()==false){
					btMoverDireita.setEnabled(true);
				}
			}
		});
		btMoverDireita.addActionListener((e)->{
			Caneta caneta = jlCanetas.getSelectedValue();
			lmCanetasDonos.add(lmCanetasDonos.getSize(),caneta);
			lstCanetasDonos.add(caneta);
			
			lmCanetas.removeElement(caneta);
			lstCanetas.remove(caneta);
			
			btMoverDireita.setEnabled(false);
		});
		
		jlCanetasDonos.addMouseListener(new MouseAdapter(){
			public void mousePressed(MouseEvent arg0){
				if(jlCanetasDonos.isSelectionEmpty()==false){
					btMoverEsquerda.setEnabled(true);
				}
			}
		});
		btMoverEsquerda.addActionListener((e)->{
			Caneta canetaDonos = jlCanetasDonos.getSelectedValue();
			/*lmCanetas.add(lmCanetas.getSize(),canetaDonos);
			lstCanetas.add(canetaDonos);
			
			lmCanetasDonos.removeElement(canetaDonos);
			lstCanetasDonos.remove(canetaDonos);
			
			btMoverEsquerda.setEnabled(false);*/
		});
		
		btAnterior = new JButton("Anterior");
		btAnterior.addActionListener((e)->{
			p--;
			txtNome.setText(lstDonos.get(p).getPessoa().getNome());
			
			
			for(int i=0;i<lstCanetasDonos.size();i++){
				lmCanetasDonos.add(i,lstCanetasDonos.get(i));
			}
			
			if(p+1==1){
				btProximo.setEnabled(true);
				btAnterior.setEnabled(false);
			}
		});
		btProximo = new JButton("Proximo");
		btProximo.addActionListener((e)->{
			p++;
			txtNome.setText(lstDonos.get(p).getPessoa().getNome());
			
			
			for(int i=0;i<lstCanetasDonos.size();i++){
				lmCanetasDonos.add(i,lstCanetasDonos.get(i));
			}
			
			if(lstDonos.size()==p+1){
				btProximo.setEnabled(false);
				btAnterior.setEnabled(true);
			}
		});
		
		btAnterior.setEnabled(false);
		btProximo.setEnabled(false);
		
		if(lstDonos.size()> p){
			btProximo.setEnabled(true);
		}
		
		this.add(lblNome);this.add(txtNome);
		this.add(lblCanetasDonos);this.add(lblCanetas);
		this.add(scrollPaneCanetasDonos);this.add(scrollPaneCanetas);
		this.add(btMoverEsquerda);this.add(btMoverDireita);
		this.add(btAnterior);this.add(btProximo);
		
		this.setSize(300,200);
		this.setLocation(10,178);
		this.setVisible(true);
	}
}

