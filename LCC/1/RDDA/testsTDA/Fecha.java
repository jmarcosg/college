package testsTDA;

public class Fecha {
	// Variables de instancia
	private static int numeroDia;
	private static int numeroMes;
	private static int numeroAnio;
				
	// Constructoras
	/*
	public Fecha() {
		Fecha.numeroDia = 0;
		Fecha.numeroMes = 0;
		Fecha.numeroAnio = 0;
	}
	*/
	
	public Fecha (int dia, int mes, int anio) {
		numeroDia = dia;
		numeroMes = mes;
		numeroAnio = anio;
	}
	
	
	// Observadoras
	public static int getNumeroDia () {
		return numeroDia;
	}
	
	public static int getNumeroMes () {
		return numeroMes;
	}
	
	public static int getNumeroAnio () {
		return numeroAnio;
	}
	
	public String toString () {
		return numeroDia + "/" + numeroMes + "/" + numeroAnio;
	}
	
	// Modificadoras
	public static void setNumeroDia (int dia) {
		numeroDia = dia;
	}
	
	public static void setNumeroMes (int mes) {
		numeroMes = mes;
	}
	
	public static void setNumeroAnio (int anio) {
		numeroAnio = anio;
	}
	
	// Propias del tipo
	public boolean equals (Fecha f) {
		return numeroDia == Fecha.getNumeroDia()
				&& numeroMes == Fecha.getNumeroMes()
				&& numeroAnio == Fecha.getNumeroAnio();
	}
	
}
