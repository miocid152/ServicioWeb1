package org;
// Generated 23/11/2014 02:27:29 PM by Hibernate Tools 4.3.1


import java.util.HashSet;
import java.util.Set;

/**
 * Entretenimiento generated by hbm2java
 */
public class Entretenimiento  implements java.io.Serializable {


     private Integer idEntretenimiento;
     private String tipoEntretenimiento;
     private String nombreCompaniaEntretenimiento;
     private int horasEntretenimiento;
     private float precioEntretenimiento;
     private Set<Srentrenimiento> srentrenimientos = new HashSet<Srentrenimiento>(0);

    public Entretenimiento() {
    }

	
    public Entretenimiento(String tipoEntretenimiento, String nombreCompaniaEntretenimiento, int horasEntretenimiento, float precioEntretenimiento) {
        this.tipoEntretenimiento = tipoEntretenimiento;
        this.nombreCompaniaEntretenimiento = nombreCompaniaEntretenimiento;
        this.horasEntretenimiento = horasEntretenimiento;
        this.precioEntretenimiento = precioEntretenimiento;
    }
    public Entretenimiento(String tipoEntretenimiento, String nombreCompaniaEntretenimiento, int horasEntretenimiento, float precioEntretenimiento, Set<Srentrenimiento> srentrenimientos) {
       this.tipoEntretenimiento = tipoEntretenimiento;
       this.nombreCompaniaEntretenimiento = nombreCompaniaEntretenimiento;
       this.horasEntretenimiento = horasEntretenimiento;
       this.precioEntretenimiento = precioEntretenimiento;
       this.srentrenimientos = srentrenimientos;
    }
   
    public Integer getIdEntretenimiento() {
        return this.idEntretenimiento;
    }
    
    public void setIdEntretenimiento(Integer idEntretenimiento) {
        this.idEntretenimiento = idEntretenimiento;
    }
    public String getTipoEntretenimiento() {
        return this.tipoEntretenimiento;
    }
    
    public void setTipoEntretenimiento(String tipoEntretenimiento) {
        this.tipoEntretenimiento = tipoEntretenimiento;
    }
    public String getNombreCompaniaEntretenimiento() {
        return this.nombreCompaniaEntretenimiento;
    }
    
    public void setNombreCompaniaEntretenimiento(String nombreCompaniaEntretenimiento) {
        this.nombreCompaniaEntretenimiento = nombreCompaniaEntretenimiento;
    }
    public int getHorasEntretenimiento() {
        return this.horasEntretenimiento;
    }
    
    public void setHorasEntretenimiento(int horasEntretenimiento) {
        this.horasEntretenimiento = horasEntretenimiento;
    }
    public float getPrecioEntretenimiento() {
        return this.precioEntretenimiento;
    }
    
    public void setPrecioEntretenimiento(float precioEntretenimiento) {
        this.precioEntretenimiento = precioEntretenimiento;
    }
    public Set<Srentrenimiento> getSrentrenimientos() {
        return this.srentrenimientos;
    }
    
    public void setSrentrenimientos(Set<Srentrenimiento> srentrenimientos) {
        this.srentrenimientos = srentrenimientos;
    }




}


