package classTesting;

import java.util.ArrayList;
import java.util.Scanner;

public class TestClasses {
	
	
	public TestClasses(){
		//System.out.println("STARTING APPLICATION");
	//	System.out.println("warming up running catalog");
		//System.out.println("testing the program with a constructor ");
		
	}

	public TestClasses(int i) {
		System.out.println("this is the contructor with a int");
	}
	
	public void input(){
	
		
		int count = 0;
		ArrayList<String> list= new ArrayList<>();
		System.out.println("Add your name to the list ");
		Scanner line = new Scanner(System.in);
		
		
	
		while(count <=5){
		
			String name =line.nextLine();
			
			
			list.add(name);

			
			for (int i = 0; i < list.size(); i++) {
				
				System.out.print(list.get(i));
				
				
			}
			count ++;
			System.out.println("its gone around "+ count+ " times");

		
		}
	
			
			System.out.println("your are fucked");
		
			
			
		
		
		System.out.println("this shit is not working");
		
			
			
			
		
		
		
		
		
	}

}



/*line.next();
list.add(name);

System.out.println("its gone around "+ count+ " times");

for (int i = 0; i < list.size(); i++) {
	
	System.out.println(list.get(i));
	
}
count ++;*/

