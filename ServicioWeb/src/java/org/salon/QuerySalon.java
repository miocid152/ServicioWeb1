/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.salon;

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
public class QuerySalon {

    Session session;
    String mensaje="";

    public QuerySalon() {
        session = HibernateUtil.getSessionFactory().openSession();
    }

    public List ObtenerSalones() {
        List<Salon> salon = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery("Select s from Salon s where s.idSalon  not in( Select s.idSalon from Salon s, Srsalon where salonIdSalon=IdSalon)");
            salon = (List<Salon>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return salon;
    }//Nos falta Consulta fecha no esta bien

    public String agregarReservacion(int idSalon) {
        mensaje="";
        Srsalon srs = new Srsalon();
        Salon salon = new Salon();
        Calendar cal = new GregorianCalendar();
        Date date = new Date();
        date.setDate(cal.get(Calendar.YEAR));
        date.setMonth(cal.get(Calendar.MONTH));
        date.setDate(cal.get(Calendar.DAY_OF_MONTH));

        Integer id = idSalon;
        Transaction tx = null;
        try {
            tx = session.beginTransaction();
            salon = (Salon) session.get(Salon.class, id);

            srs.setFechaSalon(date);
            srs.setSalon(salon);
            srs.setStatusSalon("RESERVADO");
            session.save(srs);
            tx.commit();
            mensaje="Reservacion Realizada con Exito";
        } catch (HibernateException e) {
            if (tx != null) {
                tx.rollback();
            }
            e.printStackTrace();
            mensaje= "Reservacion No Realizada";
        } finally {
            session.close();
        }
        return mensaje;
    }

    public String cancelarReservacion(int idSalon, String fechaSalon) {
        mensaje="";
        Srsalon srs = new Srsalon();
        Transaction tx = null;
        Session session = HibernateUtil.getSessionFactory().openSession();
        
        Integer IdSrsalon = obtenerIdSalonReservado(idSalon,fechaSalon);
        try {
            
            tx = session.beginTransaction();
            srs = (Srsalon) session.get(Srsalon.class, IdSrsalon);
            srs.setStatusSalon("DISPONIBLE");

            session.update(srs);
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

    private Integer obtenerIdSalonReservado(Integer id, String fechaSalon) {
        List<Srsalon> srsalon = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery("from Srsalon where fechaSalon='"+fechaSalon+"' and salonIdSalon="+id);
            srsalon = (List<Srsalon>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return srsalon.get(0).getIdSrsalon();
       
    }

}
