/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.menu;

import org.salon.*;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;
import java.util.List;
import org.Salon;
import org.hibernate.HibernateException;
import org.hibernate.Query;
import org.hibernate.Session;
import org.hibernate.Transaction;
import org.*;

/**
 *
 * @author lomen_000
 */
public class QueryMenu {

    Session session;
    String mensaje = "";


    public List ObtenerMenu() {
        session = HibernateUtil.getSessionFactory().openSession();
        SimpleDateFormat formateador = new SimpleDateFormat("yyyy-MM-dd");
        
        Calendar calendar = Calendar.getInstance();
        calendar.add(Calendar.DAY_OF_YEAR, -7); 
        Date ahora=calendar.getTime(); // Devuelve el objeto Date con los nuevos días añadidos
        String fecha=formateador.format(ahora);
        List<Salon> salon = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery("Select m from Menu m  where m.idMenu  not in(Select m.idMenu from Menu m, Srmenu where menuIdMenu=idMenu and stautsMenu='RESERVADO 'or stautsMenu='CONFIRMADO' and fechaMenu<='"+fecha+"')");
            salon = (List<Salon>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return salon;
    }//Falta Modificar la consulta Query Menu

    public String agregarReservacion(int idMenu) {
        mensaje = "";
        Srmenu srm = new Srmenu();
        Menu menu = new Menu();
        Calendar cal = new GregorianCalendar();
        Date date = new Date();
        date.setDate(cal.get(Calendar.YEAR));
        date.setMonth(cal.get(Calendar.MONTH));
        date.setDate(cal.get(Calendar.DAY_OF_MONTH));

        Integer id = idMenu;
        Transaction tx = null;
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            tx = session.beginTransaction();
            menu = (Menu) session.get(Menu.class, id);
            
            
            srm.setFechaMenu(date);
            srm.setMenu(menu);
            srm.setStautsMenu("RESERVADO");

            session.save(srm);
            tx.commit();
            mensaje = "Reservacion Realizada con Exito";
        } catch (HibernateException e) {
            if (tx != null) {
                tx.rollback();
            }
            e.printStackTrace();
            mensaje = "Reservacion No Realizada";
        } finally {
            session.close();
        }
        return mensaje;
    }

    public String cancelarReservacion(int idMenu, String fechaMenu) {
        mensaje = "";
        Srmenu srm = new Srmenu();
        Transaction tx = null;

        Integer IdMenu = obtenerIdMenuReservado(idMenu, fechaMenu);
        try {
        session = HibernateUtil.getSessionFactory().openSession();
            tx = session.beginTransaction();
            srm = (Srmenu) session.get(Srmenu.class, IdMenu);
            srm.setStautsMenu("DISPONIBLE");

            session.update(srm);
            tx.commit();
            mensaje = "Cancelacion Exitosa";
        } catch (HibernateException e) {
            if (tx != null) {
                tx.rollback();
            }
            e.printStackTrace();
        } finally {
            session.close();
        }
        return mensaje;
    }

    public String confirmarReservacion(int idMenu, String fechaMenu) {
        mensaje = "";
        Srmenu srm = new Srmenu();
        Transaction tx = null;
        

        Integer IdSrmenu = obtenerIdMenuReservado(idMenu, fechaMenu);
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            tx = session.beginTransaction();
            srm = (Srmenu) session.get(Srmenu.class, IdSrmenu);
            srm.setStautsMenu("CONFIRMADO");

            session.update(srm);
            tx.commit();
            mensaje = "Confirmacion Exitosa";
        } catch (HibernateException e) {
            if (tx != null) {
                tx.rollback();
            }
            e.printStackTrace();
        } finally {
            session.close();
        }
        return mensaje;
    }

    private Integer obtenerIdMenuReservado(Integer id, String fechaMenu) {
        List<Srmenu> srmenu = null;
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            session.beginTransaction();
            //Query q = session.createQuery("from Srsalon where fechaSalon='" + fechaSalon + "' and salonIdSalon=" + id);}
            Query q = session.createQuery("from Srmenu where FechaMenu = '"+fechaMenu+"' and menuIdMenu ="+id);
            srmenu = (List<Srmenu>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return srmenu.get(0).getIdSrmenu();

    }

}
