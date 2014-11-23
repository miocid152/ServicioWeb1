package org;
// Generated 23/11/2014 02:27:29 PM by Hibernate Tools 4.3.1


import java.util.HashSet;
import java.util.Set;

/**
 * Salon generated by hbm2java
 */
public class Salon  implements java.io.Serializable {


     private Integer idSalon;
     private String nombreSalon;
     private float precioSalon;
     private String direccionSalon;
     private Set<Srsalon> srsalons = new HashSet<Srsalon>(0);

    public Salon() {
    }

	
    public Salon(String nombreSalon, float precioSalon, String direccionSalon) {
        this.nombreSalon = nombreSalon;
        this.precioSalon = precioSalon;
        this.direccionSalon = direccionSalon;
    }
    public Salon(String nombreSalon, float precioSalon, String direccionSalon, Set<Srsalon> srsalons) {
       this.nombreSalon = nombreSalon;
       this.precioSalon = precioSalon;
       this.direccionSalon = direccionSalon;
       this.srsalons = srsalons;
    }
   
    public Integer getIdSalon() {
        return this.idSalon;
    }
    
    public void setIdSalon(Integer idSalon) {
        this.idSalon = idSalon;
    }
    public String getNombreSalon() {
        return this.nombreSalon;
    }
    
    public void setNombreSalon(String nombreSalon) {
        this.nombreSalon = nombreSalon;
    }
    public float getPrecioSalon() {
        return this.precioSalon;
    }
    
    public void setPrecioSalon(float precioSalon) {
        this.precioSalon = precioSalon;
    }
    public String getDireccionSalon() {
        return this.direccionSalon;
    }
    
    public void setDireccionSalon(String direccionSalon) {
        this.direccionSalon = direccionSalon;
    }
    public Set<Srsalon> getSrsalons() {
        return this.srsalons;
    }
    
    public void setSrsalons(Set<Srsalon> srsalons) {
        this.srsalons = srsalons;
    }




}


