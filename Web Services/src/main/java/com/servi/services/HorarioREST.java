package com.servi.services;


import java.util.Calendar;
import java.util.List;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

import com.google.gson.Gson;
import com.servi.dao.DaoHorario;
import com.servi.dto.DtoHorario;

@Path("/horario")
public class HorarioREST {
	
	public static final int MONDAY = 2, TUESDAY = 3, WEDNESDAY = 4,
			THURSDAY = 5, FRIDAY = 6;
	private List<DtoHorario> lstDtoHorario;
	private DaoHorario daoHorario = new DaoHorario();
	private int day;
	
	public HorarioREST() {
		Calendar c = Calendar.getInstance();
		c.setFirstDayOfWeek(Calendar.SUNDAY);
		day = c.get(Calendar.DAY_OF_WEEK);
	}
	
	@GET
	@Path("all")
	@Produces(MediaType.APPLICATION_JSON)
	public Response getAllHorario(){
		lstDtoHorario = daoHorario.getAll();
		String json = new Gson().toJson(lstDtoHorario);
		return Response.status(Response.Status.OK).entity(json).build();
	}
	
	@GET
	@Path("available-rooms")
	@Produces(MediaType.APPLICATION_JSON)
	public Response getAvailableRooms(){
		if (day > 1 & day < 7) {
			lstDtoHorario = daoHorario.getAvailableRooms(getDayString());
		} else {
			lstDtoHorario = null;
		}
		String json = new Gson().toJson(lstDtoHorario);
		return Response.status(Response.Status.OK).entity(json).build();
	}
	
	@GET
	@Path("next-up")
	@Produces(MediaType.APPLICATION_JSON)
	public Response getNextRooms(){
		if (day > 1 & day < 7) {
			lstDtoHorario = daoHorario.getNextAvailableRooms(getDayString());
		} else {
			lstDtoHorario = null;
		}
		String json = new Gson().toJson(lstDtoHorario);
		return Response.status(Response.Status.OK).entity(json).build();
	}
	
	private String getDayString() {
		switch (day) {
		case MONDAY:
			return "lunes";
		case TUESDAY:
			return "martes";
		case WEDNESDAY:
			return "miercoles";
		case THURSDAY:
			return "jueves";
		case FRIDAY:
			return "viernes";
		default:
			return null;
		}
	}
}
