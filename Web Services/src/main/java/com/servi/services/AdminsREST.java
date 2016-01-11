package com.servi.services;

import java.util.List;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

import com.google.gson.Gson;
import com.servi.dao.DaoAdmins;
import com.servi.dto.DtoAdmins;

@Path("/admins")
public class AdminsREST {

	private List<DtoAdmins> lstDtoAdmins;
	private DaoAdmins daoAdmins = new DaoAdmins();

	@GET
	@Path("/all")
	@Produces(MediaType.APPLICATION_JSON)
	public Response getAllAdmins() {
		lstDtoAdmins = daoAdmins.getAll();
		String json = new Gson().toJson(lstDtoAdmins);
		return Response.status(Response.Status.OK).entity(json).build();
	}
}
