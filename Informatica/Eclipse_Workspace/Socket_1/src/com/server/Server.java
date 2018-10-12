package com.server;

import java.io.DataOutputStream;
import java.io.IOException;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.Scanner;

public class Server {

	Server(int PORT){
		try {
			System.out.println("Listening on port " + PORT +" ...");
			ServerSocket SS = new ServerSocket(PORT);
			System.out.println("in attesa ...");
			Socket S = SS.accept(); //attende la connessione e accetta
			System.out.println("Cyka Blyat");
			Scanner read = new Scanner (S.getInputStream());
			String str = read.nextLine();
			System.out.println(str);
			
			
			
			System.out.println("Server closing to " + S.getInetAddress());
			
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}
	public static void main(String[] args) {
		
		new Server(753);

	}

}
