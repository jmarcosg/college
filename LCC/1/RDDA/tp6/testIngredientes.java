package tp6;
import tp6.ingredientes;

public class testIngredientes {
	
	public static void main(String[] args) {
		Ingrediente i1 = new Ingrediente();
		
		i1.setingrediente("Harina");
		i1.setCantidad(2);
		i1.setUnidadDeMedida("taza");
		i1.muestraIngrediente();
	}

}
