package com.canal.server;

import java.net.DatagramPacket;
import java.net.SocketAddress;
import java.net.InetAddress;

public class Host {

	InetAddress IP;
	int PORT;
	String UDPMessage;
	
	Host(InetAddress IP, int PORT, String Message){
		System.out.println(IP + " : " + PORT);
		this.IP = IP;
		this.PORT = PORT;
		UDPMessage = Message;
	}
	
	public void info() {
		System.out.println("Socket: " + IP + " : " + PORT);
		System.out.println("Udp Message: " + UDPMessage);
	}
	
}
