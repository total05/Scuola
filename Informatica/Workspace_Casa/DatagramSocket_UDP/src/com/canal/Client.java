// Client Semplice 
package com.canal;

import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.InetAddress;

public class Client {

	public static void main(String[] args) throws Exception {
		DatagramSocket s = new DatagramSocket();
		String msg = "Ciao";
		DatagramPacket p = new DatagramPacket(
			msg.getBytes(),
			msg.getBytes().length,
			InetAddress.getByName("localhost"),
			12365);
		s.send(p);
		s.close();

	}

}


