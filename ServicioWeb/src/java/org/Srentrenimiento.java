package org;
// Generated 1/12/2014 10:39:03 PM by Hibernate Tools 4.3.1


import java.util.Date;

/**
 * Srentrenimiento generated by hbm2java
 */
public class Srentrenimiento  implements java.io.Serializable {


     private Integer idSrentrenimiento;
     private Empresacliente empresacliente;
     private Entretenimiento entretenimiento;
     private Date fechaReservacionEntretenimiento;
     private String statusEntretenimiento;
     private String correoClienteEntretenimiento;

    public Srentrenimiento() {
    }

    public Srentrenimiento(Empresacliente empresacliente, Entretenimiento entretenimiento, Date fechaReservacionEntretenimiento, String statusEntretenimiento, String correoClienteEntretenimiento) {
       this.empresacliente = empresacliente;
       this.entretenimiento = entretenimiento;
       this.fechaReservacionEntretenimiento = fechaReservacionEntretenimiento;
       this.statusEntretenimiento = statusEntretenimiento;
       this.correoClienteEntretenimiento = correoClienteEntretenimiento;
    }
   
    public Integer getIdSrentrenimiento() {
        return this.idSrentrenimiento;
    }
    
    public void setIdSrentrenimiento(Integer idSrentrenimiento) {
        this.idSrentrenimiento = idSrentrenimiento;
    }
    public Empresacliente getEmpresacliente() {
        return this.empresacliente;
    }
    
    public void setEmpresacliente(Empresacliente empresacliente) {
        this.empresacliente = empresacliente;
    }
    public Entretenimiento getEntretenimiento() {
        return this.entretenimiento;
    }
    
    public void setEntretenimiento(Entretenimiento entretenimiento) {
        this.entretenimiento = entretenimiento;
    }
    public Date getFechaReservacionEntretenimiento() {
        return this.fechaReservacionEntretenimiento;
    }
    
    public void setFechaReservacionEntretenimiento(Date fechaReservacionEntretenimiento) {
        this.fechaReservacionEntretenimiento = fechaReservacionEntretenimiento;
    }
    public String getStatusEntretenimiento() {
        return this.statusEntretenimiento;
    }
    
    public void setStatusEntretenimiento(String statusEntretenimiento) {
        this.statusEntretenimiento = statusEntretenimiento;
    }
    public String getCorreoClienteEntretenimiento() {
        return this.correoClienteEntretenimiento;
    }
    
    public void setCorreoClienteEntretenimiento(String correoClienteEntretenimiento) {
        this.correoClienteEntretenimiento = correoClienteEntretenimiento;
    }




}


