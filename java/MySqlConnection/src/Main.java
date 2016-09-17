import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class Main {

	Statement stmt = null;
	Connection con = null;
	String name;

	public static void main(String[] args) {

		Statement stmt = null;
		Connection con = null;
		String name = null;

		// 50.87.146.81 this is the data base ip address i will be using

		try {

			// find the driver
			Class.forName("com.mysql.jdbc.Driver");

			System.out.println("");

		}

		catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			// e.printStackTrace();
		}

		// connection variable

		try {

			// connection
			con = DriverManager.getConnection(
					"jdbc:mysql://50.87.146.81/morogoyo_java",
					"morogoyo_dbUser", "asshole1%");

		} catch (Exception e) {

			e.printStackTrace();
			System.out.println("connection faliur ");

		}

		if (con != null) {

			System.out.println(" connected to data base");
		} else {
			System.out.println("not connected to data base");

		}

		try {
			stmt = con.prepareStatement("select * from name");
		} catch (SQLException e) {

			e.printStackTrace();
		}

		try {
			ResultSet rs = stmt.executeQuery(name);
		} catch (SQLException e) {

			e.printStackTrace();
		}

	}

	/*
	 * Connection con = DriverManager.getConnection( "jdbc:myDriver:myDatabase",
	 * username, password);
	 * 
	 * 
	 * ResultSet rs = stmt.executeQuery("SELECT a, b, c FROM Table1");
	 * 
	 * while (rs.next()) { int x = rs.getInt("a"); String s = rs.getString("b");
	 * float f = rs.getFloat("c");
	 */

}
