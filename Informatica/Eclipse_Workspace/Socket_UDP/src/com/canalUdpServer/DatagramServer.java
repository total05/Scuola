package com.canalUdpServer;

import java.net.DatagramPacket;
import java.net.DatagramSocket;

public class DatagramServer {

	public static void main(String[] args) throws Exception {
		DatagramSocket ss = new DatagramSocket(12345);
		DatagramPacket dp = new DatagramPacket(new byte[160], 160);
		ss.receive(dp);
		String data = new String(dp.getData(), 0, dp.getData().length);
		System.out.println(data);
		ss.close();
	}

}
