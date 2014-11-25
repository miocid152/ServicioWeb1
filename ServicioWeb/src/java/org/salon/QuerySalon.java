/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.salon;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
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
    String mensaje = "";

    public List ObtenerSalones() {
        session = HibernateUtil.getSessionFactory().openSession();
        SimpleDateFormat formateador = new SimpleDateFormat("yyyy-MM-dd");
        Calendar calendar = Calendar.getInstance();
        calendar.add(Calendar.DAY_OF_YEAR, -7);
        Date ahora = calendar.getTime(); // Devuelve el objeto Date con los nuevos días añadidos
        String fecha = formateador.format(ahora);
        List<Salon> salon = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery("Select s from Salon s where  s.idSalon not in(Select s.idSalon from Salon s, Srsalon where salonIdSalon=IdSalon and statusSalon<>'DISPONIBLE')");
            salon = (List<Salon>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return salon;
    }

    public String agregarReservacion(int idSalon, String fechaReservacionSalon) {
        session = HibernateUtil.getSessionFactory().openSession();
        mensaje = "";
        Date dfrs;
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
            try {
                SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
                dfrs = formatter.parse(fechaReservacionSalon);
                srs.setFechaReservacionSalon(dfrs);
            } catch (ParseException e) {
                e.printStackTrace();
            }
            session.save(srs);
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

    public String actualizarReservacion(int idSalon,String fechaReservacionSalon) {
        Date dfrs;
        mensaje = "";
        List<Srsalon> srsalon = existenciaParaReservar(idSalon, obtenerFechaActual());
        Srsalon srs = null;
        Salon salon = new Salon();
        Calendar cal = new GregorianCalendar();
        Date date = new Date();
        date.setDate(cal.get(Calendar.YEAR));
        date.setMonth(cal.get(Calendar.MONTH));
        date.setDate(cal.get(Calendar.DAY_OF_MONTH));

        Integer id = idSalon;
        Transaction tx = null;
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            tx = session.beginTransaction();
            salon = (Salon) session.get(Salon.class, id);
            srs = (Srsalon) session.get(Srsalon.class, srsalon.get(0).getIdSrsalon());
            try {
                SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
                dfrs = formatter.parse(fechaReservacionSalon);
                srs.setFechaReservacionSalon(dfrs);
            } catch (ParseException e) {
                e.printStackTrace();
            }
            srs.setStatusSalon("RESERVADO");
            session.update(srs);
            tx.commit();
            mensaje = "Reservacion Realizada con Exito";
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

    public String cancelarReservacion(int idSalon, String fechaSalon) {
        mensaje = "";
        List<Srsalon> srsalon = existenciaParaReservar(idSalon, fechaSalon);
        Srsalon srs = null;
        Salon salon = new Salon();

        Integer id = idSalon;
        Transaction tx = null;
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            tx = session.beginTransaction();
            salon = (Salon) session.get(Salon.class, id);
            srs = (Srsalon) session.get(Srsalon.class, srsalon.get(0).getIdSrsalon());
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

    public String confirmarReservacion(int idSalon, String fechaSalon) {

        mensaje = "";
        Srsalon srs = new Srsalon();
        Transaction tx = null;
        Integer IdSrsalon = obtenerIdSalonReservado(idSalon, fechaSalon);
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            tx = session.beginTransaction();
            srs = (Srsalon) session.get(Srsalon.class, IdSrsalon);
            srs.setStatusSalon("CONFIRMADO");
            session.update(srs);
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

    private Integer obtenerIdSalonReservado(Integer id, String fechaSalon) {
        session = HibernateUtil.getSessionFactory().openSession();
        List<Srsalon> srsalon = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery("from Srsalon where fechaSalon='" + fechaSalon + "' and salonIdSalon=" + id);
            srsalon = (List<Srsalon>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        if (srsalon.size() == 0) {
            return 0;
        } else {
            return srsalon.get(0).getIdSrsalon();
        }
    }

    private List<Srsalon> existenciaParaReservar(Integer id, String fechaSalon) {
        session = HibernateUtil.getSessionFactory().openSession();
        List<Srsalon> srsalon = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery("from Srsalon where fechaSalon='" + fechaSalon + "' and salonIdSalon=" + id);
            srsalon = (ArrayList<Srsalon>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return srsalon;
    }

    String obtenerFechaActual() {
        SimpleDateFormat formateador = new SimpleDateFormat("yyyy-MM-dd");
        Calendar calendar = Calendar.getInstance();
        calendar.add(Calendar.DAY_OF_YEAR, 0);
        Date ahora = calendar.getTime(); // Devuelve el objeto Date con los nuevos días añadidos
        String fecha = formateador.format(ahora);
        return fecha;
    }

    int verificarStatus(Integer idSalon) {
        List<Srsalon> srsalon = existenciaParaReservar(idSalon, obtenerFechaActual());
        int valor = 0;
        if (srsalon.size() == 0) {
            valor = 0;
        }
        for (int i = 0; i < srsalon.size(); i++) {
            if (srsalon.get(i).getStatusSalon().equals("RESERVADO")) {
                valor = 1;
            }
            if (srsalon.get(i).getStatusSalon().equals("DISPONIBLE")) {
                valor = 2;
            }
            if (srsalon.get(i).getStatusSalon().equals("CONFIRMADO")) {
                valor = 3;
            }
        }
        return valor;
    }

    int verificarStatus(Integer idSalon, String fecha) {
        List<Srsalon> srsalon = existenciaParaReservar(idSalon, fecha);
        int valor = 0;
        if (srsalon.size() == 0) {
            valor = 0;
        }
        for (int i = 0; i < srsalon.size(); i++) {
            if (srsalon.get(i).getStatusSalon().equals("RESERVADO")) {
                valor = 1;
            }
            if (srsalon.get(i).getStatusSalon().equals("DISPONIBLE")) {
                valor = 2;
            }
            if (srsalon.get(i).getStatusSalon().equals("CONFIRMADO")) {
                valor = 3;
            }
        }
        return valor;
    }

}
