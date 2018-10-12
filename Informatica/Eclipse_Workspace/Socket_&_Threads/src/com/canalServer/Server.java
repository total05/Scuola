package com.canalServer;

import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.Scanner;

public class Server implements Runnable{
	
	Socket S;
	public Server(Socket S){
		this.S = S;
		
	}
	

	public void run() {
		Scanner read;
		try {
			read = new Scanner (S.getInputStream());
			String str = read.nextLine();
			System.out.println(str);
			System.out.println("Server closing to " + S.getInetAddress());
			read.close();
			S.close();
			
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}
}
