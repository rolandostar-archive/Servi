package com.servi.dao;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import com.mysql.jdbc.Connection;
import com.servi.connector.Conecction;
import com.servi.dto.DtoHorario;
import com.servi.util.Queries;

public class DaoHorario {

	private Connection con;
	private java.sql.Statement stmt;
	private String query;

	public List<DtoHorario> getAll(){
		List<DtoHorario> catalog = new ArrayList<DtoHorario>();
		DtoHorario obj;
		try {
			con = new Conecction().getConection();
			stmt = con.createStatement();
			query = Queries.Q_SELECT_ALL_HORARIO;
			ResultSet rs = stmt.executeQuery(query);
			while (rs.next()) {
				obj=new DtoHorario();
				obj.setId(rs.getInt("ID"));
				obj.setGrupo(rs.getString("grupo"));
				obj.setMateria(rs.getString("materia"));
				obj.setProfesor(rs.getString("profesor"));
				obj.setSalon(rs.getInt("salon"));
				obj.setLunes(rs.getString("lunes"));
				obj.setMartes(rs.getString("martes"));
				obj.setMiercoles(rs.getString("miercoles"));
				obj.setJueves(rs.getString("jueves"));
				obj.setViernes(rs.getString("viernes"));
				catalog.add(obj);
			}
			rs.close();
			stmt.close();
			con.close();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return catalog;
	}
}
