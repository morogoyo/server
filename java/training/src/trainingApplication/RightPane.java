package trainingApplication;

import java.awt.event.ItemEvent;
import java.awt.event.ItemListener;

import javax.swing.JComboBox;
import javax.swing.JPanel;

public class RightPane {
	
	
	JPanel panel;
	private JComboBox box ;
	MainFrame mf=new MainFrame();
	private static String []cars ={"Mercedes","Bmw","honda","nissan"};
	
	public RightPane(){
		
		panel =new JPanel();
		
		
		box = new JComboBox(cars);
		          
		box.addItemListener(new ItemListener() {
			
			@Override
			public void itemStateChanged(ItemEvent event) {
				if (event.getStateChange()== ItemEvent.SELECTED){
										
				System.out.println(cars[box.getSelectedIndex()]);
										
					
				}
				
			}
		});
		panel.add(box);
		panel.setVisible(true);
		
		
		
		
	}
	
	
	

}
