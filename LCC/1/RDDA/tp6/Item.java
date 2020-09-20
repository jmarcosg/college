package tp6;

public class Item {

    // Variables de instancia
    private int codigo;
    private String descripcion;
    private int stock;
    private String nombre;
    private double costo;
    private double importe;

    // Constructoras
    public Item(int cod, String desc, int st, String nom, double cost, double imp) {
        codigo = cod;
        stock = st;
        costo = cost;
        importe = imp;
        descripcion = desc;
        nombre = nom;
    }

}
