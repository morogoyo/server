import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JButton;
import java.awt.GridLayout;
import javax.swing.JLabel;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import javax.swing.JTextField;
import java.awt.GridBagLayout;
import java.awt.GridBagConstraints;
import java.awt.Insets;


public class calculatorFace1 extends JFrame {

	private JPanel contentPane;
	private JTextField mainScreen;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					calculatorFace1 frame = new calculatorFace1();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public calculatorFace1() {
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 601, 308);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		mainScreen = new JTextField();
		mainScreen.setBounds(5, 5, 460, 27);
		contentPane.add(mainScreen);
		mainScreen.setColumns(10);
		
		JButton buttonAdd = new JButton("+");
		buttonAdd.setBounds(355, 37, 110, 27);
		contentPane.add(buttonAdd);
		
		JButton button1 = new JButton("1");
		button1.setBounds(5, 37, 110, 27);
		contentPane.add(button1);
		
		JButton buttonSub = new JButton("-");
		buttonSub.setBounds(355, 69, 115, 27);
		buttonSub.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
			}
		});
		
		JButton button2 = new JButton("2");
		button2.setBounds(120, 37, 110, 27);
		button2.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
			}
		});
		contentPane.add(button2);
		
		JButton button3 = new JButton("3");
		button3.setBounds(235, 37, 110, 27);
		contentPane.add(button3);
		contentPane.add(buttonSub);
		
		JButton buttondiv = new JButton("/");
		buttondiv.setBounds(355, 113, 115, 27);
		contentPane.add(buttondiv);
		
		JButton button4 = new JButton("4");
		button4.setBounds(5, 69, 110, 27);
		contentPane.add(button4);
		
		JButton button5 = new JButton("5");
		button5.setBounds(120, 69, 110, 27);
		contentPane.add(button5);
		
		JButton button6 = new JButton("6");
		button6.setBounds(235, 75, 110, 27);
		contentPane.add(button6);
		
		JButton btnNewButton_3 = new JButton("*");
		btnNewButton_3.setBounds(355, 151, 115, 27);
		contentPane.add(btnNewButton_3);
		
		JButton button7 = new JButton("7");
		button7.setBounds(5, 113, 110, 27);
		contentPane.add(button7);
		
		JButton button8 = new JButton("8");
		button8.setBounds(120, 113, 110, 27);
		contentPane.add(button8);
		
		JButton button9 = new JButton("9");
		button9.setBounds(235, 113, 110, 27);
		contentPane.add(button9);
		
		JButton buttonClear = new JButton("Clear");
		buttonClear.setBounds(355, 192, 110, 27);
		contentPane.add(buttonClear);
		
		JButton button0 = new JButton("0");
		button0.setBounds(5, 151, 110, 32);
		contentPane.add(button0);
	}

}
