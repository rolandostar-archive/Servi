package com.servi.dto;

import java.sql.Time;

public class DtoHueco {
	
	private int salon;
	private String dia;
	private Time hora;
	
	public int getSalon() {
		return salon;
	}
	public void setSalon(int salon) {
		this.salon = salon;
	}
	public String getDia() {
		return dia;
	}
	public void setDia(String dia) {
		this.dia = dia;
	}
	public Time getHora() {
		return hora;
	}
	public void setHora(Time hora) {
		this.hora = hora;
	}
	
	@Override
	public String toString() {
		return "DtoHueco [salon=" + salon + ", dia=" + dia + ", hora=" + hora +"]";
	}
}
