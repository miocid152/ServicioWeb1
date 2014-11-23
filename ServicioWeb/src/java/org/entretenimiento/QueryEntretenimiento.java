/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.entretenimiento;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;
import java.util.List;
import org.*;
import org.Srsalon;
import org.hibernate.HibernateException;
import org.hibernate.Query;
import org.hibernate.Session;
import org.hibernate.Transaction;
import org.salon.HibernateUtil;

/**
 *
 * @author lomen_000
 */
public class QueryEntretenimiento {

    Session session;
    String mensaje = "";

    public List ObtenerEntretenimientos() {
        session = HibernateUtil.getSessionFactory().openSession();
        SimpleDateFormat formateador = new SimpleDateFormat("yyyy-MM-dd");
        Calendar calendar = Calendar.getInstance();
        calendar.add(Calendar.DAY_OF_YEAR, -7);
        Date ahora = calendar.getTime(); // Devuelve el objeto Date con los nuevos días añadidos
        String fecha = formateador.format(ahora);
        List<Entretenimiento> entretenimiento = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery(" Select e from Entretenimiento e where e.idEntretenimiento  not in(Select e.idEntretenimiento from Entretenimiento e, Srentrenimiento where entretenimientoIdEntretenimiento=IdEntretenimiento and (statusEntretenimiento='RESERVADO' or statusEntretenimiento='CONFIRMADO') and fechaEntretenimiento>'"+fecha+"')");
            entretenimiento = (List<Entretenimiento>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return entretenimiento;
    }//Nos falta Consulta fecha no esta bien

    public String agregarReservacion(int idEntretenimiento) {
        session = HibernateUtil.getSessionFactory().openSession();
        mensaje = "";
        Srentrenimiento sre = new Srentrenimiento();
        Entretenimiento entretenimiento = new Entretenimiento();
        Calendar cal = new GregorianCalendar();
        Date date = new Date();
        date.setDate(cal.get(Calendar.YEAR));
        date.setMonth(cal.get(Calendar.MONTH));
        date.setDate(cal.get(Calendar.DAY_OF_MONTH));

        Integer id = idEntretenimiento;
        Transaction tx = null;
        try {
            tx = session.beginTransaction();
            entretenimiento = (Entretenimiento) session.get(Entretenimiento.class, id);

            sre.setFechaEntretenimiento(date);
            sre.setEntretenimiento(entretenimiento);
            sre.setStatusEntretenimiento("RESERVADO");
            session.save(sre);
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

    public String cancelarReservacion(int idEntretenimiento, String fechaEntretenimiento) {
       
        mensaje = "";
        Srentrenimiento sre = new Srentrenimiento();
        Transaction tx = null;

        Integer IdSEntretenimiento = obtenerIdEntretenimientoReservado(idEntretenimiento, fechaEntretenimiento);
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            tx = session.beginTransaction();
            sre = (Srentrenimiento) session.get(Srentrenimiento.class, IdSEntretenimiento);
            sre.setStatusEntretenimiento("DISPONIBLE");
            session.update(sre);
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

    public String confirmarReservacion(int idEntretenimiento, String fechaEntretenimiento) {
        
        mensaje = "";
        Srentrenimiento sre = new Srentrenimiento();
        Transaction tx = null;
       
        Integer IdSEntretenimiento = obtenerIdEntretenimientoReservado(idEntretenimiento, fechaEntretenimiento);
        
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            tx = session.beginTransaction();
            sre = (Srentrenimiento) session.get(Srentrenimiento.class, IdSEntretenimiento);
            sre.setStatusEntretenimiento("CONFIRMADO");
            session.update(sre);
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

    private Integer obtenerIdEntretenimientoReservado(Integer id, String fechaEntretenimiento) {
        session = HibernateUtil.getSessionFactory().openSession();
        List<Srentrenimiento> srentretenimiento = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery("from Srentrenimiento where entretenimientoIdEntretenimiento=" + id + " and fechaEntretenimiento='" + fechaEntretenimiento + "'");
            srentretenimiento = (List<Srentrenimiento>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return srentretenimiento.get(0).getIdSrentrenimiento();

    }
}