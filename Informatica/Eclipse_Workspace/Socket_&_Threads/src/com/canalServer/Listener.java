package com.canalServer;


import java.io.IOException;
import java.net.NetworkInterface;
import java.net.ServerSocket;
import java.net.Socket;
import java.net.SocketException;
import java.net.UnknownHostException;
import java.util.Enumeration;
import java.net.InetAddress;

public class Listener {
	
	ServerSocket waitClient;
	Socket S;
	InetAddress IP;
	Enumeration e;
	
	Listener(){
		try {
			this.waitClient = new ServerSocket(2048);
		} catch (IOException e) {
			System.out.println("Non ho potuto creare il ServerSocket");
			e.printStackTrace();
		}
	}
	
	Listener(int PORT){
		try {
			this.waitClient = new ServerSocket(PORT);
		} catch (IOException e) {
			System.out.println("Non ho potuto creare il ServerSocket");
			e.printStackTrace();
		}
	}
	
	
	public void multiClient() throws UnknownHostException {
		System.out.println("Server IP: " + InetAddress.getLocalHost());
		System.out.println("Opening listener to port >> " + waitClient.getLocalPort() );
		while(true) {
			try {
				S = this.waitClient.accept();
				System.out.println("\nStarting server Thread for >> " + S.getInetAddress());
				new Server(S).run();
			} catch (IOException e) {
				e.printStackTrace();
			}
		}
	}

	public static void main(String[] args) throws Exception {
		Listener L = new Listener (80);	
		L.multiClient();
	}

}
