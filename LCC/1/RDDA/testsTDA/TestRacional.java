package testsTDA;
import java.io.*;

public class TestRacional {
	public static void main(String[]args){
		Racional r1 = new Racional(7,8);
		Racional r2 = new Racional(5,3);
		Racional suma = r1.suma(r2);
		Racional resta = r1.resta(r2);
		Racional division = r1.divide(r2);
		Racional multiplicacion = r1.multiplica(r2);
		Racional reduccion = r1.reducir();
		Boolean e1 = r1.equivalente(r2);
		Boolean e2 = r1.equals(r2);


		System.out.println("entrada 1:" + r1.toString());
		System.out.println("entrada 2:" + r2.toString());
		System.out.println("suma:" + suma.toString());
		System.out.println("resta:" + resta.toString());
		System.out.println("division:" + division.toString());
		System.out.println("multiplicacion:" + multiplicacion.toString());
	}
}
