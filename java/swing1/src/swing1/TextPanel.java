package swing1;

import java.awt.BorderLayout;

import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTextArea;

public class TextPanel extends JPanel {

	private JTextArea tx;

	TextPanel() {

		tx = new JTextArea();

		setLayout(new BorderLayout());

		add(new JScrollPane(tx), BorderLayout.CENTER);

	}

	public void appendText(String text) {

		tx.append(text);

	}

}
