package com.canalClient;

import java.io.DataOutputStream;
import java.io.IOException;
import java.net.Socket;
import java.net.UnknownHostException;

public class Client {
		
	Client (String HOST, int PORT, String Message){
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
		Client C1 = new Client("localhost", 2048, "Cyka Blyat");

	}
	
}

