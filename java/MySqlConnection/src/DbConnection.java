import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;




public class DbConnection {
	
	Statement stmt = null;
	Connection con = null;
	
	public DbConnection() {
		
		
	try {
			
			//find the driver 
			Class.forName("com.mysql.jdbc.Driver");
			
			System.out.println("");
		
		} 
		
		catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		

		
			//connection variable
			
			try {
				
				//connection 
				con = DriverManager.getConnection("localhost/morogoyo_java", "morogoyo_user1", "asshole1%");
				if(con != null )
				{
				
				System.out.println("not connected to data base");
				}
				else{
				System.out.println("not connected to data base");
				
				}
				
				
			} catch (Exception e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
				
			}
		
		
		try {
			stmt = con.prepareStatement("select * from name");
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			//e.printStackTrace();
		}
		
		
		//50.87.146.81     192.185.0.119
		
		try {
			ResultSet rs= stmt.executeQuery(null);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			//e.printStackTrace();
		}
		
	

		
		
	}

}

/* Connection con = DriverManager.getConnection(
        "jdbc:myDriver:myDatabase",
        username,
        password);


ResultSet rs = stmt.executeQuery("SELECT a, b, c FROM Table1");

while (rs.next()) {
int x = rs.getInt("a");
String s = rs.getString("b");
float f = rs.getFloat("c");

*/