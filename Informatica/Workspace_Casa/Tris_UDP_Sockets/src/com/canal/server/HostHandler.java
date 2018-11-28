package com.canal.server;

import java.net.DatagramPacket;
import java.net.SocketAddress;

public abstract class HostHandler implements Runnable{

	String IP;
	String PORT;
	
	public HostHandler(SocketAddress SA, DatagramPacket Message){
		String Socket = SA.toString();
		IP = Socket.substring(0, Socket.indexOf(":"));
		PORT = Socket.substring(Socket.indexOf(":")+1);
	}
	
	@Override
	public void run() {
		// TODO Auto-generated method stub
		
	}

}
