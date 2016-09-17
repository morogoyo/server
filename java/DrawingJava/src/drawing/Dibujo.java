package drawing;

import java.awt.Color;
import java.awt.Graphics;

import javax.swing.JPanel;

public class Dibujo extends JPanel {
	
	
	public void paintComponent(Graphics p){
		super.paintComponent(p);
		this.setBackground(Color.BLACK);
		
		p.setColor(Color.YELLOW);
		p.fillRect(25, 25,200, 400);
		
		p.setColor(Color.ORANGE);
		p.fillOval(100, 100, 100, 100);
		
		
		p.setColor(Color.GREEN);
		
		p.fillRoundRect(150, 300, 100, 200, 100, 100);
		
		
	}
	
	

}
