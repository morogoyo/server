package swing1;

import java.awt.BorderLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JTextArea;

public class Frame extends JFrame {

	private JButton bt;
	private TextPanel textPanel;
	private ToolBar tb;

	public Frame() {

		super("Hello World");
		setDefaultCloseOperation(EXIT_ON_CLOSE);
		setLayout(new BorderLayout());

		textPanel = new TextPanel();
		tb = new ToolBar();
		bt = new JButton("click me");

		// button action
		bt.addActionListener(new ActionListener() {

			public void actionPerformed(ActionEvent arg0) {

				textPanel.appendText("Te quiero mucho chulita");

			}

		}

		);

		// toolbar being added to main frame
		add(tb, BorderLayout.NORTH);
		// textpanel being added to the main frame
		add(textPanel, BorderLayout.CENTER);
		// button being added to the main frame
		add(bt, BorderLayout.SOUTH);

		setVisible(true);
		setSize(600, 400);

	}

}
