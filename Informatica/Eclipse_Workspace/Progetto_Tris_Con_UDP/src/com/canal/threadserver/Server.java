package com.canal.threadserver;

import java.net.DatagramPacket;
import java.net.DatagramSocket;

public abstract class Server implements Runnable{
	DatagramSocket SS;
	DatagramPacket DP;
	final private int PORT = 8192;
	
	Server(int PORT, byte[] vector, int vect_index){
		try {
			this.SS = new DatagramSocket(PORT);
		}catch (Exception E) {
			System.err.println(E.getMessage());
			System.out.println("La porta è gia occupata o inesistente");
		}
		
		this.DP = new DatagramPacket(vector, vect_index);
	};
	
	@Override
	public void run() {
		
		
	}
	
	public static void main(String[] args) {
		// TODO Auto-generated method stub

	}

}
