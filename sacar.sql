package modelo;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

public class CienteGeoNames {
	private static Connection con;


public void setCon(Connection con) {
	this.con = con;
}
public ArrayList<String> sacarComplemento(String dia,String hora) throws SQLException{
	Conexion mysql = new Conexion();
	Connection con = mysql.conectar("jdbc:mysql://localhost:3306/servi","root","");//jdbc:mysql://148.204.57.31:3306/mysql","alumno","alumno");
	setCon(con);
	ArrayList<String> A=new ArrayList<String>();
	ArrayList<String> B=new ArrayList<String>();
	try {
		Statement sentenciaBuscar = this.con.createStatement();
		String consulta="select salon from horario where "+dia+"='"+hora+"';";
		ResultSet r=sentenciaBuscar.executeQuery(consulta);
		if(r==null){
			return null;
		}
	while(r.next()){
		A.add(r.getString(1));
		}
	String consulta2="select distinct salon from horario;";
	ResultSet r2=sentenciaBuscar.executeQuery(consulta2);
	if(r2==null){
		return null;
	}
while(r2.next()){
	B.add(r2.getString(1));
	}
	//System.out.println(resultado);
	this.con.close();
	ArrayList<String>C=restar(A,B);
		return C;
	} catch (SQLException e) {
		e.printStackTrace();
	}
	this.con.close();
	
	return null;
}
private ArrayList<String> restar(ArrayList<String> a, ArrayList<String> b) {
	for(int i=0;i<a.size();i++){
			b.remove(a.get(i));
	}
	return b;
}
public void rellenaHueco(ArrayList<Integer> A,String dia,String hora) throws SQLException{
	Conexion mysql = new Conexion();
	Connection con = mysql.conectar("jdbc:mysql://localhost:3306/servi","root","");//jdbc:mysql://148.204.57.31:3306/mysql","alumno","alumno");
	setCon(con);
	try {
		Statement sentenciaBuscar = this.con.createStatement();
		String consulta="";
		ArrayList<String> B=new ArrayList<String>();
		ResultSet r=null;
		String Consulta="insert into hueco()";
	//System.out.println(resultado);
	this.con.close();
	} catch (SQLException e) {
		e.printStackTrace();
	}
}
}
