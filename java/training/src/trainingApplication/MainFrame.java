package trainingApplication;

import java.awt.GridBagConstraints;
import java.awt.GridBagLayout;
import java.awt.Insets;
import java.awt.Panel;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JTextArea;
import javax.swing.JTextField;

public class MainFrame extends JFrame {

	private JLabel lb1;
	private JLabel lb2;
	private JTextField tx1;
	private JTextField tx2;
	JTextArea tx3;
	private JButton b;

	public MainFrame() {

		setTitle("Main Frame");
		setLayout(new GridBagLayout());

		setSize(450, 600);
		setDefaultCloseOperation(EXIT_ON_CLOSE);

		lb1 = new JLabel("First Name");
		lb2 = new JLabel("Last Name");
		tx1 = new JTextField(50);
		tx2 = new JTextField(50);
		tx3 = new JTextArea();
		b = new JButton("Enter");

		GridBagConstraints gbc = new GridBagConstraints();
		gbc.insets = new Insets(20,20,20,20);
		gbc.fill= GridBagConstraints.HORIZONTAL;
		gbc.weightx=3;

		gbc.gridx = 0;
		gbc.gridy = 0;
		this.add(lb1, gbc);

		gbc.gridx = 0;
		gbc.gridy = 3;
		gbc.fill= GridBagConstraints.HORIZONTAL;
		this.add(lb2, gbc);

		gbc.gridx = 0;
		gbc.gridy = 2;
		gbc.fill= GridBagConstraints.HORIZONTAL;
		this.add(tx1, gbc);

		gbc.gridx = 0;
		gbc.gridy = 4;
		gbc.fill= GridBagConstraints.HORIZONTAL;
		this.add(tx2, gbc);
		
		

		gbc.gridx = 0;
		gbc.gridy = 5;
		this.add(b, gbc);
		gbc.fill= GridBagConstraints.HORIZONTAL;
		
		gbc.gridx = 0;
		gbc.gridy = 7;
		gbc.fill= GridBagConstraints.HORIZONTAL;
		this.add(tx3, gbc);
		
		
		b.addActionListener(new ActionListener() {
			
			@Override
			public void actionPerformed(ActionEvent e) {
				 String name= tx1.getText().toString();
				 String lastName= tx2.getText().toString();
				 tx3.setText("your Name is "+name+""+lastName);
				// tx3.setText("testing");
				
				
			}
		});
		
		
		
		RightPane rp= new RightPane();
		gbc.gridx = 0;
		gbc.gridy = 8;
		this.add(rp.panel,gbc);
		
		
		
		setVisible(true);
		
		
		
	}
	
	 

}
