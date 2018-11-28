package com.canal;

import java.net.DatagramPacket;
import java.net.DatagramSocket;

public class Server {

	public static void main(String[] args) throws Exception {
		DatagramSocket ss = new DatagramSocket(9632);
		DatagramPacket p = new DatagramPacket(new byte[160], 160);
		ss.receive(p);
		String data = new String(p.getData(), 0, p.getLength());
		System.out.println(data);
		ss.close();
		//.trim();
	}

}
