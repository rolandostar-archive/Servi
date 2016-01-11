package com.servi.services;

import java.util.Calendar;
import java.util.List;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

import com.google.gson.Gson;
import com.servi.dao.DaoHueco;
import com.servi.dto.DtoHueco;

@Path("/hueco")
public class HuecoREST {

	public static final int MONDAY=2, TUESDAY=3, WEDNESDAY=4, THURSDAY=5, FRIDAY=6;
	private List<DtoHueco> lstDtoHueco;
	private DaoHueco daoHueco = new DaoHueco();
	
	@GET
	@Path("/all")
	@Produces(MediaType.APPLICATION_JSON)
	public Response getAllHueco() {
		lstDtoHueco = daoHueco.getAll();
		String json = new Gson().toJson(lstDtoHueco);
		return Response.status(Response.Status.OK).entity(json).build();
	}
	
	@GET
	@Path("/by-day")
	@Produces(MediaType.APPLICATION_JSON)
	public Response getHuecoByDay(){
		int day;
		Calendar c = Calendar.getInstance();
		c.setFirstDayOfWeek(Calendar.SUNDAY);
		day = c.get(Calendar.DAY_OF_WEEK);
		System.out.println("Day of the Week: "+day);
		lstDtoHueco = daoHueco.getByDay(day);
		String json = new Gson().toJson(lstDtoHueco);
		return Response.status(Response.Status.OK).entity(json).build();
	}
}
