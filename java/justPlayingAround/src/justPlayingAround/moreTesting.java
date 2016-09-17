package justPlayingAround;

import java.util.ArrayList;

public class moreTesting {
	
	
	
	public static void main(String[] args){
	
		
	
		try {
			String [] text = {"welcome!"};
			System.out.println(text[1]);
		} catch (ArrayIndexOutOfBoundsException e) {
			// TODO Auto-generated catch block
			//e.printStackTrace();
			System.out.println("there was an error with this array ");
		}
 System.out.println("this code is working with and exeption");

	
	int [] num = new int [5];
	
	num[0]=5;
	num[1]=4;
	num[2]=3;
	num[3]=2;
	num[4]=1;
	
	for (int i = 0; i < num.length; i++) {
		System.out.println(num[i]);
		
	}
	
	System.out.println(num.length);
	
	System.out.println("");
	
	String[][] str ={ {"car","motorcycle","air plane"},{"mercedes","ducati","boeing"}};
	
	    for (int i = 0; i < str.length; i++) {
			for (int j = 0; j < str[i].length; j++) {
				System.out.println(str[i][j]);
			}
			
		}
	
}
}

 