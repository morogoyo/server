package arrayString;

import java.util.ArrayList;


public class StringArray {
	
	public static void main (String [] args){
	// constructor with no parameters 
	//public StringArray(){
		
	String gout = "good day ";
	
	ArrayList<String> test = new ArrayList<>();
	
	test.add("mr");
	
	test.add("rene");
	test.add("asshole");
	
	System.out.println(test);
	
test.add("this ");
	
	test.add("is a test of ");
	test.add("run time adding of arrayList ");
	
	System.out.println(test);
	
	String value = test.get(1);
			System.out.println(value);
			System.out.println(value);
			System.out.println(value);
			System.out.println(value);
			
			test.add(gout);
			
			System.out.println(test);
	
	
	

}
}