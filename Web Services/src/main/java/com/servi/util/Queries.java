package com.servi.util;

public class Queries {

	public static final String Q_SELECT_ALL_ADMINS = "SELECT DISTINCT user_id, username, password, name, last_seen FROM admins";
	public static final String Q_SELECT_ALL_HORARIO = "SELECT DISTINCT ID, grupo, materia, profesor, salon, lunes, martes, miercoles, jueves, viernes  FROM horario;";
	public static final String Q_SELECT_ALL_REPORTE = "SELECT DISTINCT id, id_horario, ip_alumno, estado, reported_on  FROM reporte;";
	public static final String Q_SELECT_ALL_HUECO = "SELECT DISTINCT salon, dia, hora FROM hueco;";
	public static final String Q_SELECT_BY_DAY_HUECO = "SELECT DISTINCT salon, dia, hora FROM hueco WHERE dia=";

	public static final String Q_SELECT_AVAILABLE_ROOMS(String day) {
		return "SELECT DISTINCT salon\n" +
				"FROM horario\n" +
				"WHERE salon \n" +
				"NOT IN (SELECT salon from horario WHERE "+day+" BETWEEN SUBTIME(CURTIME(),'01:30') AND CURTIME())\n" +
				"ORDER BY salon ASC;";
	}
	public static final String Q_SELECT_HOUR_AVAILABLE_ROOMS(String day, int room){
		return "SELECT DISTINCT "+day+"\n" +
				"FROM horario\n" +
				"WHERE salon = "+room+"\n" +
				"AND CURTIME() < "+day+"\n" +
				"ORDER BY "+day+" ASC\n" +
				"LIMIT 1;";
	}

	public static final String Q_SELECT_NEXT_ROOMS_UP(String day){
		return "SELECT DISTINCT salon\n" +
				"FROM horario \n" +
				"WHERE salon NOT IN (SELECT salon\n" +
				"	from horario \n" +
				"	WHERE "+day+"	BETWEEN CURTIME() AND ADDTIME(CURTIME(), '01:30'))\n" +
				"AND salon IN (SELECT salon \n" +
				"	from horario\n" +
				"	WHERE "+day+" BETWEEN SUBTIME(CURTIME(), '01:30') AND CURTIME())";
	}
	public static final String Q_SELECT_HOUR_FINISH_ROOM(String day, int room){
		return "SELECT ADDTIME("+day+",'01:30') as "+day+"\n" +
				"from horario\n" +
				"WHERE "+day+" BETWEEN SUBTIME(CURTIME(), '01:30') AND CURTIME()\n" +
				"AND salon = "+room;
	}
	public static final String Q_SELECT_DIFF_HOUR_NEXT_ROOM(String hour){
		return "SELECT TIMEDIFF('"+hour+"', CURTIME()) as diff";
	}
}
