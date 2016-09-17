package methodTesting;

import java.util.Scanner;

public class Practice {

	
public static void main(String []args){
		int count =0;
		Practica pr =new Practica();
		Lick lk = new Lick();
		Fold fl =new Fold();
		SetStamp st=new SetStamp();
		pr.practica1();
		Practice pt = new Practice();
		fl.fold();
		lk.lick();
		lk.lickingTimes();
		System.out.println("enter cost of the stamp");
		Scanner input = new Scanner(System.in);
		
		while (count <5){
		
		try {
			 
			
			st.setCost(input.nextInt());
			
			System.out.println("the cost of the stamp is " + st.getCost()+ "cents");
		     pt.dinamicly();
		
		} catch (Exception e) {
			// TODO Auto-generated catch block
			
			System.out.println("is not an integer ");
			System.out.println("please enter and integer");
			count ++;
			
			}
		}
		
		
		
		
	}

  public void dinamicly(){
	  
	  System.out.println("mail this letter  ");
	  
  }
}
