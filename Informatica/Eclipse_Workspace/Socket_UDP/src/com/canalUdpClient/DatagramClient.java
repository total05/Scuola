package com.canalUdpClient;

import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.InetAddress;

public class DatagramClient {

	public static void main(String[] args) throws Exception{
		DatagramSocket DS = new DatagramSocket();
		String msg = "ciao";
		DatagramPacket p = new DatagramPacket(
				msg.getBytes(),
				msg.getBytes().length,
				InetAddress.getByName("localhost"),
				12345
				);
		DS.send(p);
		DS.close();
	}

}
