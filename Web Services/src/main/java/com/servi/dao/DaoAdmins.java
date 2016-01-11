package com.servi.dao;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import com.mysql.jdbc.Connection;
import com.servi.connector.Conecction;
import com.servi.dto.DtoAdmins;
import com.servi.util.Queries;

public class DaoAdmins {

	private Connection con;
	private java.sql.Statement stmt;
	private String query;

	public List<DtoAdmins> getAll(){
		DtoAdmins obj;
		List<DtoAdmins> catalog = new ArrayList<DtoAdmins>();
		try {
			con = new Conecction().getConection();
			stmt = con.createStatement();
			query = Queries.Q_SELECT_ALL_ADMINS;
			ResultSet rs = stmt.executeQuery(query);
			while (rs.next()) {
				obj=new DtoAdmins();
				obj.setUserId(rs.getInt("user_id"));
				obj.setUserName(rs.getString("username"));
				obj.setPassword(rs.getString("password"));
				obj.setName(rs.getString("name"));
				obj.setLastSeen(rs.getDate("last_seen"));
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
