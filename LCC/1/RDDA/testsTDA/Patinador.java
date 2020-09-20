package testsTDA;

public class Patinador {

    private String apellido;
    private String nombre;
    private String dni;
    private int edad;
    private char categoria;

    // Constructoras
    public Patinador() {
        nombre = null;
        apellido = null;
        dni = null;
        edad = 0;
        categoria = 'A';
    }

    public Patinador(String ape, String nom, String dn, int ed, char cat) {
        apellido = ape;
        nombre = nom;
        dni = dn;
        edad = ed;
        categoria = cat;
    }
    //Observadoras
    public String getApellido() {
        return apellido;
    }

    public String getNombre() {
        return nombre;
    }

    public String getDNI() {
        return dni;
    }

    public int getEdad() {
        return edad;
    }

    public char getCategoria() {
        return categoria;
    }

    public String toString() {
        return apellido + " " + nombre + " " + dni + " " + edad + " "+ categoria;
    }
    
    //Modificadoras
    public void setApellido(String n) {
        apellido = n;
    }

    public void setNombre(String n) {
        nombre = n;
    }

    public void setDNI(String n) {
        dni = n;
    }

    public void setEdad(int p) {
        edad = p;
    }

    public void setCategoria(char cat) {
        categoria = cat;
    }
    //Propia del tipo
    public void asciendeCategoria() {
        
        switch (categoria) {
                case 'B': this.setCategoria('A'); break;
                case 'C': this.setCategoria('B'); break;                
                case 'I': this.setCategoria('C'); break;                
                case 'P': this.setCategoria('I'); break;} 
}
    

    public boolean equals(Patinador e) {
        return apellido.equalsIgnoreCase(e.getApellido())
                && nombre.equalsIgnoreCase(e.getNombre())
                && dni.equalsIgnoreCase(e.getNombre())
                && edad == e.getEdad()
                && categoria == e.getCategoria();
    }
    //Math.abs(atribReal-e.getAtributoReal())<0.001;
}
