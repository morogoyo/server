package learningJava;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JButton;
import javax.swing.JOptionPane;
import javax.swing.JPanel;

import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import javax.swing.JList;
import javax.swing.JCheckBoxMenuItem;
import javax.swing.JProgressBar;
import java.awt.Color;
import java.awt.Font;
import javax.swing.JTextField;
import javax.swing.JLabel;
import javax.swing.JRadioButton;
import java.awt.FlowLayout;
import java.awt.GridLayout;
import java.awt.CardLayout;

public class testingSwing {

	private JFrame frame;
	private JTextField firstNameTextField;
	private JTextField lastNameTextField;
	private JTextField addressTextField_2;
	private JTextField cityTextField;
	private JTextField zipCodeTextField_2;
	private JTextField phoneNumberTextField_3;
	private JLabel $1NewLabel;
	private JTextField $1TextField;
	private JLabel $2NewLabel;
	private JTextField $2TextField;
	private JLabel $3NewLabel;
	private JTextField $3TextField;
	private JLabel $4NewLabel;
	private JLabel $5NewLabel1;
	private JLabel $6NewLabel2;
	private JLabel lblNewLabel_4;
	private JLabel lblNewLabel_5;
	private JLabel $6NewLabel;
	private JLabel $7NewLabel;
	//private JTextField $4TextField;
	

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					testingSwing window = new testingSwing();
					window.frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the application.
	 */
	public testingSwing() {
		initialize();
	}

	/**
	 * Initialize the contents of the frame.
	 */
	private void initialize() {
		frame = new JFrame();
		frame.getContentPane().setForeground(Color.RED);
		frame.getContentPane().setBackground(Color.LIGHT_GRAY);
		frame.setFont(new Font("Agency FB", Font.PLAIN, 12));
		frame.setBackground(Color.BLACK);
		frame.setBounds(100, 100, 675, 669);
		frame.setTitle("1040 ez Estimator");
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.getContentPane().setLayout(null);
		
		firstNameTextField = new JTextField();
		firstNameTextField.setBounds(10, 0, 659, 620);
		frame.getContentPane().add(firstNameTextField);
		firstNameTextField.setColumns(10);
		
		JLabel fNameLabel = new JLabel("FIRST NAME ");
		fNameLabel.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add(fNameLabel);
		
		JLabel lblNewLabel_1 = new JLabel("LAST NAME ");
		lblNewLabel_1.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add(lblNewLabel_1);
		
		lastNameTextField = new JTextField();
		lastNameTextField.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add(lastNameTextField);
		lastNameTextField.setColumns(10);
		
		
		addressTextField_2 = new JTextField();
		addressTextField_2.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add(addressTextField_2);
		addressTextField_2.setColumns(10);
		
		
		
		cityTextField = new JTextField();
		cityTextField.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add(cityTextField);
		cityTextField.setColumns(10);
		
		
		JLabel addressLabel = new JLabel("ADDRESS");
		addressLabel.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add(addressLabel);
		
		
		JLabel cityLabel = new JLabel("CITY");
		cityLabel.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add(cityLabel);
		
		JLabel zipCodeLabel = new JLabel("ZIP CODE");
		zipCodeLabel.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add(zipCodeLabel);
		
		
		
		zipCodeTextField_2 = new JTextField();
		zipCodeTextField_2.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add(zipCodeTextField_2);
		zipCodeTextField_2.setColumns(10);
		
		
		JLabel phoneLabel = new JLabel("PHONE #");
		phoneLabel.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add(phoneLabel);
		
		
		
		phoneNumberTextField_3 = new JTextField();
		phoneNumberTextField_3.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add(phoneNumberTextField_3);
		phoneNumberTextField_3.setColumns(10);
		
		
		
		$1NewLabel = new JLabel("Wages, salaries, and tips. This should be shown in box 1 of your Form(s) W-2. Attach your Form(s) W-2.");
		$1NewLabel.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add($1NewLabel);
		
		
		
		$2NewLabel = new JLabel("Taxable interest. If the total is over $1,500, you cannot use Form 1040EZ");
		$2NewLabel.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add($2NewLabel);
		
		
		
		$3NewLabel = new JLabel("Unemployment compensation and Alaska Permanent Fund dividends (see instructions).");
		$3NewLabel.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add($3NewLabel);
		
		
		
		$4NewLabel = new JLabel("This is your adjusted income ");
		$4NewLabel.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add($4NewLabel);
		
		
		
		$5NewLabel1 = new JLabel("If someone can claim you (or your spouse if a joint return) as a dependent,");
		$5NewLabel1.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add($5NewLabel1);
		
		
		$6NewLabel2 = new JLabel("check the applicable box(es) below and enter the amount from the worksheet on back.");
		$6NewLabel2.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add($6NewLabel2);
		
		
		
		lblNewLabel_4 = new JLabel("If no one can claim you (or your spouse if a joint return),");
		lblNewLabel_4.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add(lblNewLabel_4);
		
		
		lblNewLabel_5 = new JLabel(" enter $10,000 if single; $20,000 if married filing jointly. See back for explanation.");
		lblNewLabel_5.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add(lblNewLabel_5);
		
		
		
		$6NewLabel = new JLabel("Subtract line 5 from line 4. If line 5 is larger than line 4, enter -0-. This is your taxable income.");
		$6NewLabel.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add($6NewLabel);
		
		
		$7NewLabel = new JLabel("Federal income tax withheld from Form(s) W-2 and 1099.");
		$7NewLabel.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add($7NewLabel);
		
		
		
		JRadioButton spouseNewRadioButton_1 = new JRadioButton("Spouse");
		spouseNewRadioButton_1.setBounds(-10008, -10030, 659, 631);
		frame.getContentPane().add(spouseNewRadioButton_1);
		
		
	}
}
