package tutorials;

public class Main {
	
	public static void main(String arg[]){
	
	//Files f =new Files();
	
	//f.openFile();
	//f.addText();
	//f.close();
	
	FileWriter fw =new FileWriter();
	fw.openFile();
	fw.printFile();	
	fw.closeFile();
	}

}
