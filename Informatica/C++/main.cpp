#include <iostream>
#include <string.h>
/* run this program using the console pauser or add your own getch, system("pause") or input loop */
using namespace std;

int main(int argc, char** argv) {
	string equation;
	cout<<"Calcolatore del Coefficiente di Ruffini"<<endl;
	cout<<"\nEsempio di equazione: 3x^3 + 4x^2 + 5x + 7"<<endl;
	cout<<"--------------------------------------"<<endl;
	cout<<"Inserisci la tua equazione:\n";
	cin>>equation;
	cout<<"\nHai inserito " + equation <<endl;
	return 0;
}
