package org;
// Generated 22/11/2014 09:15:36 PM by Hibernate Tools 4.3.1


import java.util.Date;

/**
 * Srsalon generated by hbm2java
 */
public class Srsalon  implements java.io.Serializable {


     private Integer idSrsalon;
     private Salon salon;
     private String statusSalon;
     private Date fechaSalon;

    public Srsalon() {
    }

    public Srsalon(Salon salon, String statusSalon, Date fechaSalon) {
       this.salon = salon;
       this.statusSalon = statusSalon;
       this.fechaSalon = fechaSalon;
    }
   
    public Integer getIdSrsalon() {
        return this.idSrsalon;
    }
    
    public void setIdSrsalon(Integer idSrsalon) {
        this.idSrsalon = idSrsalon;
    }
    public Salon getSalon() {
        return this.salon;
    }
    
    public void setSalon(Salon salon) {
        this.salon = salon;
    }
    public String getStatusSalon() {
        return this.statusSalon;
    }
    
    public void setStatusSalon(String statusSalon) {
        this.statusSalon = statusSalon;
    }
    public Date getFechaSalon() {
        return this.fechaSalon;
    }
    
    public void setFechaSalon(Date fechaSalon) {
        this.fechaSalon = fechaSalon;
    }




}


