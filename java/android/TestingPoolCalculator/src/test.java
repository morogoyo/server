import java.util.Scanner;


public class test {
	
	
	public static void main (String arg[]){
	
	
		
		
		int adjustment=0;
		
		Scanner sc = new Scanner(System.in);
		System.out.println("enter chemical adjustment");
		adjustment=sc.nextInt();
		
		
		double result = 13 * (53000/10000)*((40-adjustment)/10);
		result = result/16;
	
	System.out.println(result);

}
}  