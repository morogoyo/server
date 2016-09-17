package learningJava;

import java.awt.Color;
import java.awt.EventQueue;
import java.awt.Font;

import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JRadioButton;
import javax.swing.JTextField;
import java.awt.FlowLayout;
import javax.swing.BoxLayout;
import net.miginfocom.swing.MigLayout;
import java.awt.BorderLayout;

public class EZ1040 {

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
	private JTextField $4TextField;
	private JTextField textField;
	private JTextField textField_1;
	private JTextField textField_2;
	private JTextField textField_$1;
	private JTextField textField_$2;
	private JTextField textField_$3;
	private JTextField textField_$4;
	private JTextField textField_$5;
	private JTextField textField_$6;
	private JTextField textField_$7;
	private JTextField textField_$8;
	private JTextField textField_$8a;
	private JTextField textField_$9;
	private JTextField textField_3;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					EZ1040 window = new EZ1040();
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
	public EZ1040() {
		ez1040();
	}

	/**
	 * Initialize the contents of the frame.
	 */
	private void ez1040() {
		
			frame = new JFrame();
			frame.getContentPane().setForeground(Color.RED);
			frame.getContentPane().setBackground(Color.LIGHT_GRAY);
			frame.setFont(new Font("Agency FB", Font.PLAIN, 12));
			frame.setBackground(Color.BLACK);
			frame.setBounds(100, 100, 675, 669);
			frame.setTitle("1040 ez Estimator");
			frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
			frame.getContentPane().setLayout(null);
			
			JLabel fNameLabel = new JLabel("FIRST NAME ");
			fNameLabel.setBounds(19, 8, 63, 14);
			frame.getContentPane().add(fNameLabel);
			
			firstNameTextField = new JTextField();
			firstNameTextField.setBounds(87, 5, 86, 20);
			frame.getContentPane().add(firstNameTextField);
			firstNameTextField.setColumns(10);
			
			JLabel lblNewLabel_1 = new JLabel("LAST NAME ");
			lblNewLabel_1.setBounds(178, 8, 63, 14);
			frame.getContentPane().add(lblNewLabel_1);
			
			lastNameTextField = new JTextField();
			lastNameTextField.setBounds(251, 5, 86, 20);
			frame.getContentPane().add(lastNameTextField);
			lastNameTextField.setColumns(10);
			
			
			addressTextField_2 = new JTextField();
			addressTextField_2.setBounds(87, 64, 420, 20);
			frame.getContentPane().add(addressTextField_2);
			addressTextField_2.setColumns(10);
			
			
			
			cityTextField = new JTextField();
			cityTextField.setBounds(87, 95, 86, 20);
			frame.getContentPane().add(cityTextField);
			cityTextField.setColumns(10);
			
			
			JLabel addressLabel = new JLabel("ADDRESS");
			addressLabel.setBounds(19, 67, 46, 14);
			frame.getContentPane().add(addressLabel);
			
			
			JLabel cityLabel = new JLabel("CITY");
			cityLabel.setBounds(19, 98, 23, 14);
			frame.getContentPane().add(cityLabel);
			
			JLabel zipCodeLabel = new JLabel("ZIP CODE");
			zipCodeLabel.setBounds(189, 98, 47, 14);
			frame.getContentPane().add(zipCodeLabel);
			
			
			
			zipCodeTextField_2 = new JTextField();
			zipCodeTextField_2.setBounds(251, 95, 86, 20);
			frame.getContentPane().add(zipCodeTextField_2);
			zipCodeTextField_2.setColumns(10);
			
			
			JLabel phoneLabel = new JLabel("PHONE #");
			phoneLabel.setBounds(363, 8, 45, 14);
			frame.getContentPane().add(phoneLabel);
			
			
			
			phoneNumberTextField_3 = new JTextField();
			phoneNumberTextField_3.setBounds(421, 5, 86, 20);
			frame.getContentPane().add(phoneNumberTextField_3);
			phoneNumberTextField_3.setColumns(10);
			
			
			
			$1NewLabel = new JLabel("Wages, salaries, and tips. This should be shown in box 1 of your Form(s) W-2. Attach your Form(s) W-2.");
			$1NewLabel.setBounds(19, 155, 503, 14);
			frame.getContentPane().add($1NewLabel);
			
			
			
			$2NewLabel = new JLabel("Taxable interest. If the total is over $1,500, you cannot use Form 1040EZ");
			$2NewLabel.setBounds(19, 180, 356, 14);
			frame.getContentPane().add($2NewLabel);
			
			
			
			$3NewLabel = new JLabel("Unemployment compensation and Alaska Permanent Fund dividends (see instructions).");
			$3NewLabel.setBounds(19, 230, 415, 14);
			frame.getContentPane().add($3NewLabel);
			
			
			
			$4NewLabel = new JLabel("This is your adjusted income ");
			$4NewLabel.setBounds(19, 205, 138, 14);
			frame.getContentPane().add($4NewLabel);
			
			
			
			$5NewLabel1 = new JLabel("If someone can claim you (or your spouse if a joint return) as a dependent,");
			$5NewLabel1.setBounds(19, 255, 361, 14);
			frame.getContentPane().add($5NewLabel1);
			
			
			$6NewLabel2 = new JLabel("check the applicable box(es) below and enter the amount from the worksheet on back.");
			$6NewLabel2.setBounds(19, 280, 416, 14);
			frame.getContentPane().add($6NewLabel2);
			
			
			
			lblNewLabel_4 = new JLabel("If no one can claim you (or your spouse if a joint return),");
			lblNewLabel_4.setBounds(19, 376, 273, 14);
			frame.getContentPane().add(lblNewLabel_4);
			
			
			lblNewLabel_5 = new JLabel(" enter $10,000 if single; $20,000 if married filing jointly. See back for explanation.");
			lblNewLabel_5.setBounds(15, 401, 393, 14);
			frame.getContentPane().add(lblNewLabel_5);
			
			
			
			$6NewLabel = new JLabel("Subtract line 5 from line 4. If line 5 is larger than line 4, enter -0-. This is your taxable income.");
			$6NewLabel.setBounds(19, 437, 449, 14);
			frame.getContentPane().add($6NewLabel);
			
			
			$7NewLabel = new JLabel("Federal income tax withheld from Form(s) W-2 and 1099.");
			$7NewLabel.setBounds(19, 472, 274, 14);
			frame.getContentPane().add($7NewLabel);
			
			
			
			JRadioButton spouseNewRadioButton_1 = new JRadioButton("Spouse");
			spouseNewRadioButton_1.setBounds(178, 324, 61, 23);
			frame.getContentPane().add(spouseNewRadioButton_1);
			
			JRadioButton rdbtnNewRadioButton = new JRadioButton("You");
			rdbtnNewRadioButton.setBounds(64, 324, 52, 23);
			frame.getContentPane().add(rdbtnNewRadioButton);
			
			textField_$1 = new JTextField();
			textField_$1.setBounds(563, 152, 86, 20);
			frame.getContentPane().add(textField_$1);
			textField_$1.setColumns(10);
			
			textField_$2 = new JTextField();
			textField_$2.setBounds(563, 177, 86, 20);
			frame.getContentPane().add(textField_$2);
			textField_$2.setColumns(10);
			
			textField_$3 = new JTextField();
			textField_$3.setBounds(563, 205, 86, 20);
			frame.getContentPane().add(textField_$3);
			textField_$3.setColumns(10);
			
			textField_$4 = new JTextField();
			textField_$4.setBounds(563, 230, 86, 20);
			frame.getContentPane().add(textField_$4);
			textField_$4.setColumns(10);
			
			textField_$5 = new JTextField();
			textField_$5.setBounds(563, 395, 86, 20);
			frame.getContentPane().add(textField_$5);
			textField_$5.setColumns(10);
			
			textField_$6 = new JTextField();
			textField_$6.setBounds(563, 434, 86, 20);
			frame.getContentPane().add(textField_$6);
			textField_$6.setColumns(10);
			
			textField_$7 = new JTextField();
			textField_$7.setText("");
			textField_$7.setBounds(563, 469, 86, 20);
			frame.getContentPane().add(textField_$7);
			textField_$7.setColumns(10);
			
			JLabel $8aNewLabel = new JLabel("Earned income credit (EIC) (see instructions).");
			$8aNewLabel.setBounds(29, 522, 439, 14);
			frame.getContentPane().add($8aNewLabel);
			
			JLabel $8bNewLabel = new JLabel("Nontaxable combat pay election");
			$8bNewLabel.setBounds(52, 547, 205, 14);
			frame.getContentPane().add($8bNewLabel);
			
			JLabel lblNewLabel = new JLabel("Add lines 7 and 8a. These are your total payments and credits.");
			lblNewLabel.setBounds(29, 572, 439, 14);
			frame.getContentPane().add(lblNewLabel);
			
			textField_$8 = new JTextField();
			textField_$8.setBounds(563, 519, 86, 20);
			frame.getContentPane().add(textField_$8);
			textField_$8.setColumns(10);
			
			textField_$8a = new JTextField();
			textField_$8a.setBounds(563, 544, 86, 20);
			frame.getContentPane().add(textField_$8a);
			textField_$8a.setColumns(10);
			
			textField_$9 = new JTextField();
			textField_$9.setBounds(563, 572, 86, 20);
			frame.getContentPane().add(textField_$9);
			textField_$9.setColumns(10);
			
			JLabel lblNewLabel_2 = new JLabel("EMAIL");
			lblNewLabel_2.setBounds(19, 33, 56, 14);
			frame.getContentPane().add(lblNewLabel_2);
			
			textField_3 = new JTextField();
			textField_3.setBounds(87, 33, 249, 20);
			frame.getContentPane().add(textField_3);
			textField_3.setColumns(10);
		
			
	}
}
