public class ThreadsTesting {

	public static void main(String[] args) {

		Thread t1 = new Thread() {
			public void run() {

				for (int i = 0; i < 100; i++) {

					System.out.println("this is the first thread t1");

					try {
						sleep(100);
					} catch (InterruptedException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
				}

			}

		};
		
		Thread t2 = new Thread() {
			public void run() {

				for (int i = 0; i < 100; i++) {

					System.out.println("this is the second thread t2");

					try {
						sleep(300);
					} catch (InterruptedException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
				}

			}

		};
		
		t1.start();
		t2.start();

	}

}
