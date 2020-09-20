package tp7;

 class Perro {
    // Variables de instancia
    private String nombrePerro;
    private String apellidoDuenio;
    private int anioNacimiento;
    private int edadPerro;
    private double costoDiario;
    private String cuidadoEspecial;
    private String tamanioPerro;
    private String razaPerro;
    private static double porcIncremento = 1.15;
    
    // Constructoras
    public Perro() {
        nombrePerro = null;
        apellidoDuenio = null;
        anioNacimiento = 0;
        edadPerro = 0;
        costoDiario = 0.0;
        cuidadoEspecial = null;
        tamanioPerro = null;
        razaPerro = null;
    }
    
    public Perro (String nom, String ape, int an, int edad, double costo, String cuidados, String tam, String raza) {
        nombrePerro = nom;
        apellidoDuenio = ape;
        anioNacimiento = an;
        edadPerro = edad;
        costoDiario = costo;
        cuidadoEspecial = cuidados;
        tamanioPerro = tam;
        razaPerro = raza;
    }
    
    
    // Observadoras
    public String getNombrePerro () {
        return nombrePerro;
    }
    
    public String getApellidoDuenio () {
        return apellidoDuenio;
    }
    
    public int getAnioNacimiento () {
        return anioNacimiento;
    }
    
    public int getEdadPerro () {
        return edadPerro;
    }
    
    public double getCostoDiario () {
        return costoDiario;
    }
    
    public String getCuidadoEspecial () {
        return cuidadoEspecial;
    }
    
    public String getTamanioPerro () {
        return tamanioPerro;
    }
    
    public String getRazaPerro () {
        return razaPerro;
    }
    
    public double getPorcIncremento () {
        return porcIncremento;
    }
    
    public String toString() {
        return "Nombre del perro: " + nombrePerro + 
        		"; Apellido del dueño: " + apellidoDuenio + 
        		"; Año de nacimiento del perro: " + anioNacimiento +
        		"; Edad del perro: " + edadPerro + 
        		"; Costo diario: " + costoDiario + 
        		"; Cuidado especial? " + cuidadoEspecial + 
        		"; Tamaño del perro: " + tamanioPerro +
        		"; Raza del perro: " + razaPerro;
    }   
    
    // Modificadoras
    public void setNombrePerro (String nom) {
        nombrePerro = nom;
    }
    
    public void setApellidoDuenio (String ape) {
        apellidoDuenio = ape;
    }
    
    public void setAnioNacimiento (int an) {
        anioNacimiento = an;
    }
    
    public void setEdadPerro (int edad) {
        edadPerro = edad;
    }
    
    public void setCostoDiario (double costo) {
        costoDiario = costo;
    }
    
    public void setCuidadoEspecial (String cuidados) {
        cuidadoEspecial = cuidados;
    }
    
    public void setTamanioPerro (String tam) {
        tamanioPerro = tam;
    }
    
    public void setRazaPerro (String raza) {
        razaPerro = raza;
    }
    
    
    // Propias del tipo      
    public boolean equals (Perro p) {
        return nombrePerro.equals(p.getNombrePerro())
                && apellidoDuenio.equals(p.getApellidoDuenio())
                && anioNacimiento == p.anioNacimiento
                && edadPerro == p.edadPerro
                && costoDiario == p.costoDiario
                && cuidadoEspecial.equals(p.cuidadoEspecial)
                && tamanioPerro.equals(p.cuidadoEspecial)
                && razaPerro.equals(p.razaPerro);
    }
         
}
