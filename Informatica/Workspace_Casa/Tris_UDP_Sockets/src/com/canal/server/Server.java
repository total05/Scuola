package com.canal.server;

import java.io.IOException;
import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.SocketAddress;
import java.net.SocketException;
import java.util.Vector;

import org.json.JSONObject;
import org.json.JSONArray;

import java.lang.instrument.Instrumentation;

public class Server{
	DatagramSocket DS;
	DatagramPacket DP;
	Vector <Host> WaitList;
	final private int PORT = 12365;

	//Costruttore
	Server(int vSize){
		try {
			this.DS = new DatagramSocket(PORT);
			this.DP = new DatagramPacket(new byte[vSize], vSize);
		}catch (SocketException SE) {
			System.err.println(SE.getMessage());
			System.out.println("La porta è gia occupata o inesistente");
		}
	};
	
	//Accetta nuovi host e aggiungi l'host nella waiting list
	void accept() throws IOException {
		for(;;) {
			this.DS.receive(DP);
			String data = new String(this.DP.getData(), 0, this.DP.getLength());
			WaitList.addElement(new Host(DS.getLocalAddress(), DS.getLocalPort(), data));
			System.out.println(WaitList);
		}
	}
	
	//Stampa la waitingList
	void host_list() {
		for(int i=0; i<WaitList.size(); i++) 
			WaitList.get(i).info();	
	}
	

	//Invia la waitingList al client richiedente
	void send_waitingList(SocketAddress Remote) {
		try {
			JSONArray JA = new JSONArray(WaitList);
			DatagramSocket SA_SendRemote = new DatagramSocket(Remote);
			DatagramPacket SendList = new DatagramPacket(
					JA.toString().getBytes(),
					JA.toString().getBytes().length,
					Remote);
			SA_SendRemote.send(SendList);
		} catch (IOException IOE) {
			System.err.println("Errore sull'invio della lista WaitingList!\n" + IOE.getMessage() + "\nSocket: " + Remote);
			System.exit(-1);
		}
		
	}
	

	public static void main(String[] args) throws IOException {
		Server MainServer = new Server(1236);
		MainServer.accept();
	}

}
