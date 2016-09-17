package interfacesInJava;

public class HondaAccord implements Vehicle {

	String name = "Accord\n";

	@Override
	public void speed() {
		System.out.println("fast\n");

	}

	@Override
	public void accelerate() {
		System.out.println("0 to 60 in 15 sec\n");

	}

	@Override
	public void topSpeed() {
		System.out.println("120 mph\n");

	}

	@Override
	public void carName() {
		System.out.println(name);

	}

}
