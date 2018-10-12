package com.CanalSocketCloning;

import java.io.IOException;
import java.net.*;

public class Server {

	ServerSocket SS;
	Socket S;
	
	Server(int PORT){
		try {
			this.SS = new ServerSocket(PORT);
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
	
	
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Server S = new Server (80);
	}

}
