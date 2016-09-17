package drawing;

import javax.swing.JFrame;

public class Main extends JFrame{

	public static void main (String arg[]){

	JFrame	frame = new JFrame();
	frame.setTitle("Drawing plane");
	frame.setSize(400, 600);
	frame.setDefaultCloseOperation(EXIT_ON_CLOSE);
	
	
	
    Dibujo d = new Dibujo();
	
	frame.add(d);
	
	frame.setVisible(true);
}
}