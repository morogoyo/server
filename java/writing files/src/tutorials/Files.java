package tutorials;

import java.io.FileNotFoundException;
import java.util.Formatter;

public class Files {
	
	
	  Formatter file;
	  
	  public void openFile(){
	  
	  try {
		file = new Formatter("data.txt");
		  System.out.println("file was created");
	} catch (FileNotFoundException e) {
		System.out.println("file was not created");
	}
	  }

	  public void addText(){
		  
		  
		  file.format("%s%s%s","20","asshole","mother fucker");
		  
	  }
	  
      public void close(){
      
         file.close();
         
      }
	  
}

