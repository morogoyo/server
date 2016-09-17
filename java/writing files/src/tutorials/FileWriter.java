package tutorials;

import java.io.File;
import java.io.FileNotFoundException;
import java.util.Scanner;

public class FileWriter {
	Scanner fileReader;

	
	
	public void openFile(){
		
		try {
			fileReader = new Scanner(new File("data.txt"));
			System.out.println("File has been Read \n");
		} catch (FileNotFoundException e) {
			System.out.println("File has Failed to read ");
		}
		
		
		
	}
	
	public void printFile(){
		
		while(fileReader.hasNext()){
			String a = fileReader.next();
			String b = fileReader.next();
			String c = fileReader.next();
			
			System.out.printf("%s %s %s\n",a,b,c);
			
		}
		
	}
	
	public void closeFile(){
		
		fileReader.close();
	}
	

}

