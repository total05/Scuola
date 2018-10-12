package com.client;


import java.io.BufferedReader;
import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.Socket;
import java.net.UnknownHostException;
import java.util.Scanner;

public class Clienti {

	Clienti(String HOST, int PORT, String Message){
		try {
			Socket S = new Socket (HOST, PORT);
			DataOutputStream dos = new DataOutputStream (S.getOutputStream());
			dos.writeUTF("Ciao");
			dos.close();
			S.close();
			
		} catch (UnknownHostException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
	public static void main(String[] args) {
		Clienti C1 = new Clienti("localhost", 753, "Ciao");

	}

}
