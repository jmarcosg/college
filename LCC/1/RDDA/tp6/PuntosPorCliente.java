package tp6;

public class PuntosPorCliente {
    // Variables de instancia
    private int nroCliente;
    private int puntos;
    private int canje;

    // Constructoras
    public PuntosPorCliente() {
        this.nroCliente = 0;
        this.puntos = 0;
        this.canje = 0;
    }

    public PuntosPorCliente(int nroc) {
        this.nroCliente = nroc;
    }
       
    // Interfaz
    // Observadoras
    public int getNroCliente() {
        return this.nroCliente;
    }

    public int getPuntos() {
        return this.puntos;
    }

    public String ToString() {
        return "Nro Cliente: " + nroCliente + "; Puntos: " + puntos;
    }

    public boolean equals(PuntosPorCliente ppc) {
        return ppc.nroCliente == nroCliente && ppc.puntos == puntos;
    }

    // Modificadoras
    public void setPuntos(int p) {
        this.puntos = p;
    }
    
    // Propias del tipo
    public void sumarPuntos (int p) {
        puntos = puntos + p;
        System.out.println("Se le han sumado puntos. Puntos restantes: " + puntos);
    }
    
    public boolean canjearPuntos (int canje) {
        boolean sePuede = false;
        puntos = puntos - canje;
        
        if (puntos > 0) {
            sePuede = true;
        }
        return sePuede;
    }

}
