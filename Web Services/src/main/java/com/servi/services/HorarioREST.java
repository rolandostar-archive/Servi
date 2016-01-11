package com.servi.services;


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
	
	private List<DtoHorario> lstDtoHorario;
	private DaoHorario daoHorario = new DaoHorario();
	
	@GET
	@Path("all")
	@Produces(MediaType.APPLICATION_JSON)
	public Response getAllHorario(){
		lstDtoHorario = daoHorario.getAll();
		String json = new Gson().toJson(lstDtoHorario);
		return Response.status(Response.Status.OK).entity(json).build();
	}
}
