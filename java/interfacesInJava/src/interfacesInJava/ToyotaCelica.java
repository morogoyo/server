package interfacesInJava;

public class ToyotaCelica implements Vehicle {

	String name = "Celica\n";

	@Override
	public void speed() {
		System.out.println("Super fast ");

	}

	@Override
	public void accelerate() {
		System.out.println("0 to 60 in 3.5 sec ");

	}

	@Override
	public void topSpeed() {
		System.out.println("160 mph");

	}

	@Override
	public void carName() {
		System.out.println(name);

	}

}
