package com.servi.services;

import java.util.HashSet;
import java.util.Set;

import javax.ws.rs.ApplicationPath;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.core.Application;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

import com.google.gson.Gson;

@ApplicationPath("/rest")
public class ApplicationREST extends Application {

	/**
	 * Classes that have RESTful Web Services
	 */
	@Override
	public Set<Class<?>> getClasses() {
		Set<Class<?>> classes = new HashSet<Class<?>>();
		classes.add(AdminsREST.class);
		classes.add(HorarioREST.class);
		classes.add(HuecoREST.class);
		classes.add(ReporteREST.class);
		return classes;
	}
}
