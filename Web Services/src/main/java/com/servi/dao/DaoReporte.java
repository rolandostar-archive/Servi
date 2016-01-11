package com.servi.dao;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import com.mysql.jdbc.Connection;
import com.servi.connector.Conecction;
import com.servi.dto.DtoReporte;
import com.servi.util.Queries;

public class DaoReporte {

	private Connection con;
	private java.sql.Statement stmt;
	private String query;

	public List<DtoReporte> getAll(){
		List<DtoReporte> catalog = new ArrayList<DtoReporte>();
		DtoReporte obj;
		try {
			con = new Conecction().getConection();
			stmt = con.createStatement();
			query = Queries.Q_SELECT_ALL_REPORTE;
			ResultSet rs = stmt.executeQuery(query);
			while (rs.next()) {
				obj=new DtoReporte();
				obj.setId(rs.getInt("id"));
				obj.setIdHorario(rs.getInt("id_horario"));
				obj.setEstado(rs.getInt("estado"));
				obj.setIpAlumno(rs.getString("ip_alumno"));
				obj.setReportedOn(rs.getString("reported_on"));
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
