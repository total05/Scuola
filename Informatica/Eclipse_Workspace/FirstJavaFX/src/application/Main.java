package application;
	
import javafx.application.Application;
import javafx.stage.Stage;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.StackPane;


public class Main extends Application {
	
	Button myButton;
	
	public static void main(String[] args) {
		launch(args);
	}
	 
	@Override
	public void start(Stage primaryStage) {
		
		primaryStage.setTitle("First JavaFX GUI");
		myButton = new Button("Click Me :)");
		StackPane layout = new StackPane();
		layout.getChildren().add(myButton);
		Scene scene = new Scene(layout, 400, 400);
		primaryStage.setScene(scene);
		primaryStage.show();
		
	}
	
	
}
