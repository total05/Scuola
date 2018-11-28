package com.canal.client;

import java.io.IOException;
import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.InetAddress;
import java.net.SocketAddress;
import java.net.SocketException;
import java.net.UnknownHostException;

import org.json.JSONArray;
import org.json.JSONObject;

class MatchInfo{
	int M;
	String PSW;
	boolean Hosted;
	
	MatchInfo(){
		this.M = 3;
		this.PSW = "";
		this.Hosted = false;
	}
	
	public void setPSW(String P) {
		this.PSW = P;
	}
	
	public void setMatrix(int n) {
		this.M = n;
	}
	
	public void setMatching(boolean TF) {
		this.Hosted = TF;
	}
	
	public void clear() {
		this.M = 0;
		this.PSW = null;
		this.Hosted = false;
	}
	
	public String toJSONString() {
		return "{\"matrix\" : " + M + ", \"psw\": " + PSW + ", \"hosted\": " + Hosted + "}";
	}
}

public class Client {
	
	DatagramSocket DS;
	MatchInfo MR = new MatchInfo();
	
	Client(InetAddress IP, int PORT) throws IOException{
		this.DS = new DatagramSocket(PORT, IP);
		DS.send(new DatagramPacket("Mi sono collegato".getBytes(), "Mi sono collegato".getBytes().length, DS.getRemoteSocketAddress()));
	}
	
	//Invia lo stato di richiesta: 0 se la partita è cercata, 1 se la partita è hostata
	public void sendStatus() throws IOException {
		JSONObject JO = new JSONObject(MR.toJSONString());
		DS.send(new DatagramPacket(
				String.valueOf(JO).getBytes(),
				String.valueOf(JO).getBytes().length,
				DS.getRemoteSocketAddress())
				);
	}
	
	//Se si vuole cercare/creare un match con password
	public void setMatchRules(int matrix, String Password) {
		MR.setMatrix(matrix);
		MR.setPSW(Password);
	}
	
	//Se non si vuole cercare/creare un match con password
	public void setMatchRules(int matrix) {
		MR.setMatrix(matrix);
	}
	
	public static void main(String[] args) {
		try {
			new Client(InetAddress.getByName("localhost"), 12365);
		} catch (SocketException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (UnknownHostException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}

}
