package org;
// Generated 1/12/2014 10:39:03 PM by Hibernate Tools 4.3.1


import java.util.Date;

/**
 * Srmenu generated by hbm2java
 */
public class Srmenu  implements java.io.Serializable {


     private Integer idSrmenu;
     private Empresacliente empresacliente;
     private Menu menu;
     private String stautsMenu;
     private Date fechaReservacionMenu;
     private String correoClienteMenu;

    public Srmenu() {
    }

    public Srmenu(Empresacliente empresacliente, Menu menu, String stautsMenu, Date fechaReservacionMenu, String correoClienteMenu) {
       this.empresacliente = empresacliente;
       this.menu = menu;
       this.stautsMenu = stautsMenu;
       this.fechaReservacionMenu = fechaReservacionMenu;
       this.correoClienteMenu = correoClienteMenu;
    }
   
    public Integer getIdSrmenu() {
        return this.idSrmenu;
    }
    
    public void setIdSrmenu(Integer idSrmenu) {
        this.idSrmenu = idSrmenu;
    }
    public Empresacliente getEmpresacliente() {
        return this.empresacliente;
    }
    
    public void setEmpresacliente(Empresacliente empresacliente) {
        this.empresacliente = empresacliente;
    }
    public Menu getMenu() {
        return this.menu;
    }
    
    public void setMenu(Menu menu) {
        this.menu = menu;
    }
    public String getStautsMenu() {
        return this.stautsMenu;
    }
    
    public void setStautsMenu(String stautsMenu) {
        this.stautsMenu = stautsMenu;
    }
    public Date getFechaReservacionMenu() {
        return this.fechaReservacionMenu;
    }
    
    public void setFechaReservacionMenu(Date fechaReservacionMenu) {
        this.fechaReservacionMenu = fechaReservacionMenu;
    }
    public String getCorreoClienteMenu() {
        return this.correoClienteMenu;
    }
    
    public void setCorreoClienteMenu(String correoClienteMenu) {
        this.correoClienteMenu = correoClienteMenu;
    }




}


