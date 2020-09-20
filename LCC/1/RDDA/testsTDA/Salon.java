package testsTDA;

public class Salon {
	// Variables de instancia
	private String nombreSalon;
	private int disponibilidadSalon;
	private boolean musicaSalon;
	private String direccionSalon;
	private String numeroTelefono;
	
	// Constructoras
	public Salon() {
		nombreSalon = null;
		disponibilidadSalon = 0;
		musicaSalon = false;
		direccionSalon = null;
		numeroTelefono = null;
	}
	
	public Salon (String nom, int disp, boolean musica, String dire, String tel) {
		nombreSalon = nom;
		disponibilidadSalon = disp;
		musicaSalon = musica;
		direccionSalon = dire;
		numeroTelefono = tel;
	}
	
	// Obsevadoras
	public String getNombreSalon () {
		return nombreSalon;
	}
	
	public int getDisponibilidadSalon () {
		return disponibilidadSalon;
	}
	
	public boolean getMusicaSalon () {
		return musicaSalon;
	}
	
	public String getDireccionSalon () {
		return direccionSalon;
	}
	
	public String getNumeroTelefono () {
		return numeroTelefono;
	}
	
	public String toString () {
		return "Nombre del salon: " + nombreSalon +
				"; Disponibilidad: " + disponibilidadSalon +
				"; Se permite musica: " + musicaSalon + 
				"; Direccion: " + direccionSalon +
				"; Telefono: " + numeroTelefono;
	}
	
	// Modificadoras
	public void setNombreSalon (String nom) {
		nombreSalon = nom;
	}
	
	public void setDisponibilidadSalon (int disp) {
		disponibilidadSalon = disp;
	}
	
	public void setMusicaSalon (boolean musica) {
		musicaSalon = musica;
	}
	
	public void setDireccionSalon (String dire) {
		direccionSalon = dire;
	}
	
	public void setNumeroTelefono (String tel) {
		numeroTelefono = tel;
	}
	
	// Propias del tipo
	public boolean equals (Salon s) {
		return nombreSalon.equalsIgnoreCase(s.getNombreSalon())
				&& direccionSalon.equals(s.direccionSalon)
				&& numeroTelefono.equals(s.numeroTelefono);
	}
	
	
}
