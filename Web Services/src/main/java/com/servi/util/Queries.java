package com.servi.util;

public class Queries {

	public static final String Q_SELECT_ALL_ADMINS = "SELECT DISTINCT user_id, username, password, name, last_seen FROM admins";
	public static final String Q_SELECT_ALL_HORARIO = "SELECT DISTINCT ID, grupo, materia, profesor, salon, lunes, martes, miercoles, jueves, viernes  FROM horario;";
	public static final String Q_SELECT_ALL_REPORTE = "SELECT DISTINCT id, id_horario, ip_alumno, estado, reported_on  FROM reporte;";
	public static final String Q_SELECT_ALL_HUECO = "SELECT DISTINCT salon, dia, hora FROM hueco;";
	public static final String Q_SELECT_BY_DAY_HUECO = "SELECT DISTINCT salon, dia, hora FROM hueco WHERE dia=";
}
