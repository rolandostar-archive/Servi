package com.servi.services;

import java.util.List;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

import com.google.gson.Gson;
import com.servi.dao.DaoReporte;
import com.servi.dto.DtoReporte;

@Path("/reporte")
public class ReporteREST {

	private List<DtoReporte> lstDtoReporte;
	private DaoReporte daoReporte = new DaoReporte();
	
	@GET
	@Path("/all")
	@Produces(MediaType.APPLICATION_JSON)
	public Response getAllAdmins() {
		lstDtoReporte = daoReporte.getAll();
		String json = new Gson().toJson(lstDtoReporte);
		return Response.status(Response.Status.OK).entity(json).build();
	}
}
