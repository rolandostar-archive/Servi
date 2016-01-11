package com.servi.connector;

import java.sql.DriverManager;
import java.sql.SQLException;

import com.mysql.jdbc.Connection;
import com.servi.util.Config;

public class Conecction {

	public Connection getConection() {

		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			System.out.println("Where is your MySQL JDBC Driver?");
			e.printStackTrace();
			return null;
		}

		System.out.println("MySQL JDBC Driver Registered!");
		Connection connection = null;

		try {
			connection = (Connection) DriverManager.getConnection(Config.URL_DATABASE, Config.USER_DATABASE,
					Config.PASSWORD_DATABASE);

		} catch (SQLException e) {
			System.out.println(Config.CONNECTION_FAILED);
			e.printStackTrace();
			return null;
		}

		if (connection != null) {
			System.out.println(Config.CONNECTION_SUCCESSFULL);
			return connection;
		} else {
			System.out.println(Config.CONNECTION_ERROR);
			return null;
		}
	}

}
