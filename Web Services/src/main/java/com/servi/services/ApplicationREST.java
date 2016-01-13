package com.servi.services;

import java.util.HashSet;
import java.util.Set;

import javax.ws.rs.ApplicationPath;
import javax.ws.rs.core.Application;

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
