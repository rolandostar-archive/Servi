package com.servi.dao;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import com.mysql.jdbc.Connection;
import com.servi.connector.Conecction;
import com.servi.dto.DtoHueco;
import com.servi.services.HuecoREST;
import com.servi.util.Queries;

public class DaoHueco {

	private Connection con;
	private java.sql.Statement stmt;
	private String query;

	public List<DtoHueco> getAll() {
		List<DtoHueco> catalog = new ArrayList<DtoHueco>();
		DtoHueco obj;
		try {
			con = new Conecction().getConection();
			stmt = con.createStatement();
			query = Queries.Q_SELECT_ALL_HUECO;
			ResultSet rs = stmt.executeQuery(query);
			while (rs.next()) {
				obj = new DtoHueco();
				obj.setSalon(rs.getInt("salon"));
				obj.setDia(rs.getString("dia"));
				obj.setHora(rs.getTime("hora"));
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

	public List<DtoHueco> getByDay(int day) {
		List<DtoHueco> catalog = new ArrayList<DtoHueco>();
		DtoHueco obj;
		switch (day) {
		case HuecoREST.MONDAY:
			query = Queries.Q_SELECT_BY_DAY_HUECO + "'lunes'";
			break;
		case HuecoREST.TUESDAY:
			query = Queries.Q_SELECT_BY_DAY_HUECO + "'martes'";
			break;
		case HuecoREST.WEDNESDAY:
			query = Queries.Q_SELECT_BY_DAY_HUECO + "'miercoles'";
			break;
		case HuecoREST.THURSDAY:
			query = Queries.Q_SELECT_BY_DAY_HUECO + "'jueves'";
			break;
		case HuecoREST.FRIDAY:
			query = Queries.Q_SELECT_BY_DAY_HUECO + "'viernes'";
			break;
		default:
			return null;
		}
		try {
			con = new Conecction().getConection();
			stmt = con.createStatement();
			ResultSet rs = stmt.executeQuery(query);
			while (rs.next()) {
				obj = new DtoHueco();
				obj.setSalon(rs.getInt("salon"));
				obj.setDia(rs.getString("dia"));
				obj.setHora(rs.getTime("hora"));
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
