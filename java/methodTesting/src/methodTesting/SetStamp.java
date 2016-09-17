package methodTesting;

public class SetStamp {
	
	private int cost = 20 ;
	private int nuberOfStamps = 5;
	
	
	public int setStamp(int cost,int numberOfStamps){
		
		System.out.println("set the stamp on the envelope");
		return numberOfStamps + cost;
	}


	public int getNuberOfStamps() {
		return nuberOfStamps;
	}


	public void setNuberOfStamps(int nuberOfStamps) {
		this.nuberOfStamps = nuberOfStamps;
	}


	public int getCost() {
		return cost ;
	}


	public void setCost(int cost) {
		this.cost = cost;
	}

}
