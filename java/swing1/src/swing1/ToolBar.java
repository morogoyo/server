package swing1;

import java.awt.BorderLayout;
import java.awt.Button;
import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JPanel;

public class ToolBar extends JPanel implements ActionListener {

	private Button helloButton;
	private Button goodByeButton;

	public ToolBar() {

		helloButton = new Button("Hello");
		goodByeButton = new Button("Good Bye");

		helloButton.addActionListener(this);
		goodByeButton.addActionListener(this);

		setLayout(new FlowLayout(FlowLayout.LEFT));

		add(helloButton);
		add(goodByeButton);

	}

	@Override
	public void actionPerformed(ActionEvent e) {
		if (e.getSource() == helloButton) {

			tx.appendText("helloButton");

		}

	}

}
