package com.servi.dto;
import java.sql.Date;

public class DtoAdmins {

	private int userId;
	private String userName;
	private String password;
	private Date lastSeen;
	private String name;

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public int getUserId() {
		return userId;
	}

	public void setUserId(int userId) {
		this.userId = userId;
	}

	public String getUserName() {
		return userName;
	}

	public void setUserName(String userName) {
		this.userName = userName;
	}

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	public Date getLastSeen() {
		return lastSeen;
	}

	public void setLastSeen(Date lastSeen) {
		this.lastSeen = lastSeen;
	}

	@Override
	public java.lang.String toString() {
		return "DtoAdmins [user_id=" + userId + ", username=" + userName + ", password=" + password + ", last_seen="
				+ lastSeen + "]";
	}
}
