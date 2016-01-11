package com.servi.dto;

import java.sql.Time;

public class DtoHorario {

	private int id, salon;
	private String grupo, materia, profesor;
	private String lunes, martes, miercoles, jueves, viernes;

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public int getSalon() {
		return salon;
	}

	public void setSalon(int salon) {
		this.salon = salon;
	}

	public String getGrupo() {
		return grupo;
	}

	public void setGrupo(String grupo) {
		this.grupo = grupo;
	}

	public String getMateria() {
		return materia;
	}

	public void setMateria(String materia) {
		this.materia = materia;
	}

	public String getProfesor() {
		return profesor;
	}

	public void setProfesor(String profesor) {
		this.profesor = profesor;
	}

	public String getLunes() {
		return lunes;
	}

	public void setLunes(String lunes) {
		this.lunes = lunes;
	}

	public String getMartes() {
		return martes;
	}

	public void setMartes(String martes) {
		this.martes = martes;
	}

	public String getMiercoles() {
		return miercoles;
	}

	public void setMiercoles(String miercoles) {
		this.miercoles = miercoles;
	}

	public String getJueves() {
		return jueves;
	}

	public void setJueves(String jueves) {
		this.jueves = jueves;
	}

	public String getViernes() {
		return viernes;
	}

	public void setViernes(String viernes) {
		this.viernes = viernes;
	}

	@Override
	public String toString() {
		return "DtoHorario [ID=" + id + ", grupo=" + grupo + ", materia=" + materia + ", profesor=" + profesor
				+ ", salon=" + salon + ", lunes=" + lunes + ", martes=" + martes + ", miercoles=" + miercoles
				+ ",jueves=" + jueves + ", viernes=" + viernes + "]";
	}
}
