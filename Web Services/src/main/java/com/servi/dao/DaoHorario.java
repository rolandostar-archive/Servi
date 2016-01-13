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

	public List<DtoHorario> getAll() {
		List<DtoHorario> catalog = new ArrayList<DtoHorario>();
		DtoHorario obj;
		try {
			con = new Conecction().getConection();
			stmt = con.createStatement();
			query = Queries.Q_SELECT_ALL_HORARIO;
			ResultSet rs = stmt.executeQuery(query);
			while (rs.next()) {
				obj = new DtoHorario();
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

	public List<DtoHorario> getAvailableRooms(String day) {
		List<DtoHorario> catalog = new ArrayList<DtoHorario>();
		DtoHorario obj;
		try {
			con = new Conecction().getConection();
			stmt = con.createStatement();
			query = Queries.Q_SELECT_AVAILABLE_ROOMS(day);
			ResultSet rs = stmt.executeQuery(query);
			/* Obtain only the available rooms, not the hour to finish */
			while (rs.next()) {
				obj = new DtoHorario();
				obj.setSalon(rs.getInt("salon"));
				catalog.add(obj);
			}
			for (int i = 0; i < catalog.size(); i++) {
				query = Queries.Q_SELECT_HOUR_AVAILABLE_ROOMS(day, catalog.get(i).getSalon());
				rs = stmt.executeQuery(query);
				while (rs.next()) {
					catalog.get(i).setUntil(rs.getString(day));
					
				}
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
	
	public List<DtoHorario> getNextAvailableRooms(String day) {
		List<DtoHorario> catalog = new ArrayList<DtoHorario>();
		DtoHorario obj;
		String hourFinish="";
		try {
			con = new Conecction().getConection();
			stmt = con.createStatement();
			query = Queries.Q_SELECT_NEXT_ROOMS_UP(day);
			ResultSet rs = stmt.executeQuery(query);
			/* Obtain only the available rooms, not the hour to finish */
			while (rs.next()) {
				obj = new DtoHorario();
				obj.setSalon(rs.getInt("salon"));
				catalog.add(obj);
			}
			for (int i = 0; i < catalog.size(); i++) {
				/* Obtaint the finish hour of the class */
				query = Queries.Q_SELECT_HOUR_FINISH_ROOM(day, catalog.get(i).getSalon());
				rs = stmt.executeQuery(query);
				if(rs.next()) {
					hourFinish = rs.getString(day);
				}
				System.out.println("@hourFinish "+hourFinish);
				/* Obtain the difference of actual hour and finish hour of the class */
				query = Queries.Q_SELECT_DIFF_HOUR_NEXT_ROOM(hourFinish);
				rs = stmt.executeQuery(query);
				while (rs.next()) {
					catalog.get(i).setDiff(rs.getString("diff"));
				}
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
