package interfacesInJava;

public class Driver {

	public static void main(String[] args) {
		Vehicle honda = new HondaAccord();
		honda.carName();
		honda.accelerate();
		honda.speed();
		honda.topSpeed();

		Vehicle celica = new ToyotaCelica();
		celica.carName();
		celica.accelerate();
		celica.speed();
		celica.topSpeed();

	}

}
