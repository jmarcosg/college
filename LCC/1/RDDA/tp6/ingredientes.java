package tp6;

public class ingredientes {
	// Clase para datos de ingredientes
	private String ingrediente;
	private double cantidad;
	private String unidadDeMedida;
	
	// Constructores
	public Ingrediente (String ingrediente, int cantidad, String unidadDeMedida) {
		ingrediente = null;
		cantidad = 0.0;
		unidadDeMedida = null;
	}
	
	
	// Observadores
	public String getIngrediente () {
		return this.ingrediente;
	}
	
	public double getCantidad () {
		return this.cantidad;
	}
	
	public String getUnidadDeMedida () {
		return this.unidadDeMedida;
	}
	
	// Modificadores
	public void setIngrediente (String ing) {
		this.ingrediente = ing;
	}
	
	public void setCantidad (int r) {
		this.cantidad = r;
	}
	
	public void setUnidadDeMedida (String unid) {
		this.unidadDeMedida = unid;
	}
	
	
	// Unassigned

}
