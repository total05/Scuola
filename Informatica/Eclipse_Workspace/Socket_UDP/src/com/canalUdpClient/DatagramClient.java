package com.canalUdpClient;

import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.InetAddress;

public abstract class DatagramClient implements Runnable{
	
	DatagramSocket DS;
	InetAddress IP;
	String msg = "ciao";
	DatagramPacket p = new DatagramPacket(msg.getBytes(), msg.getBytes().length, IP, 12345);
		

	public static void main(String[] args) throws Exception{
		
	}

}
