package tpObligatorio;

/**
 *
 * @author Juan Marcos Gonzalez
 */
public class Arbol {
    private String nombre;
    private int altura;
    private int profRaices;
    private boolean frutos;
    private int tempMinima;
        
    // Constructores
    public Arbol(){
        this.nombre = "";
        this.altura = 0;
        this.profRaices = 0;
        this.frutos = false;
        this.tempMinima = 0;
    }
    
    public Arbol(String nom, int alt, int pRaices, boolean fr, int tMin){
        this.nombre = nom;
        this.altura = alt;
        this.profRaices = pRaices;
        this.frutos = fr;
        this.tempMinima = tMin;
    }
    
    // Observadores
    public String getNombre(){
        return this.nombre;
    }
    
    public double getAltura(){
        return this.altura;
    }
    
    public double getprofRaices(){
        return this.profRaices;
    }
    
    public boolean getFrutos(){
        return this.frutos;
    }
    
    public double gettempMinima(){
        return this.tempMinima;
    }
    
    public String toString(){
        return "Arbol: " + nombre + "; Altura: " + altura + "; Profundidad de raices: " + profRaices + "; Tiene frutos?: " + frutos + "; Temperatura minima que soporta: " + tempMinima;
    }
    
    public int equals(Arbol a){
        return a.nombre == nombre && a.altura == altura && a.profRaices == profRaices && a.frutos == frutos && a.tempMinima == tempMinima;         
    }
    
    // Modificadores
    public void setAltura(int altura){
        this.altura = altura;
    }
    
    public void setProfR(int pRaices){
        this.profRaices = pRaices;
    }
    
    public void setFrutos (boolean fr){
        this.frutos = fr;
    }
    
    public void setTempMin (int tMin){
        this.tempMinima = tMin;
    }   
}