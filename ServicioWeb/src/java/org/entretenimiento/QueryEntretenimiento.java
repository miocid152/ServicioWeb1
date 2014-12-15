/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.entretenimiento;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import org.hibernate.HibernateException;
import org.hibernate.Query;
import org.hibernate.Session;
import org.hibernate.Transaction;
import org.*;

/**
 *
 * @author lomen_000
 */
public class QueryEntretenimiento {

    Session session;
    String mensaje = "";

    public List ObtenerEntretenimientos(String fecha) {
        List<Entretenimiento> entretenimiento = null;
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            session.beginTransaction();
            Query q = session.createQuery(" Select e from Entretenimiento e where e.idEntretenimiento  not in(Select e.idEntretenimiento from Entretenimiento e, Srentrenimiento where entretenimientoIdEntretenimiento=IdEntretenimiento and (statusEntretenimiento='RESERVADO' or statusEntretenimiento='CONFIRMADO') and fechaReservacionEntretenimiento='" + fecha + "')");
            entretenimiento = (List<Entretenimiento>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return entretenimiento;
    }

    public String agregarReservacion(int idEntretenimiento, String fechaReservacionEntretenimiento,String correoClienteEntretenimiento,
            String correoElectronico) {
        Empresacliente empresaCliente =obtenerIdEmpresa(correoElectronico);
        session = HibernateUtil.getSessionFactory().openSession();
        mensaje = "";
        Date dfre;
        Srentrenimiento sre = new Srentrenimiento();
        Entretenimiento entretenimiento = new Entretenimiento();
        
        Integer id = idEntretenimiento;
        Transaction tx = null;
        try {
            tx = session.beginTransaction();
            entretenimiento = (Entretenimiento) session.get(Entretenimiento.class, id);
            sre.setEntretenimiento(entretenimiento);
            sre.setStatusEntretenimiento("RESERVADO");
            sre.setCorreoClienteEntretenimiento(correoClienteEntretenimiento);
            sre.setEmpresacliente(empresaCliente);
            try {
                SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
                dfre = formatter.parse(fechaReservacionEntretenimiento);
                sre.setFechaReservacionEntretenimiento(dfre);
            } catch (ParseException ex) {
                System.out.println("" + ex);
            }
            session.save(sre);
            tx.commit();
            mensaje = "Reservación realizada con éxito";
        } catch (HibernateException e) {
            if (tx != null) {
                tx.rollback();
            }
            e.printStackTrace();
            mensaje = "Reservación no realizada";
        } finally {
            session.close();
        }
        return mensaje;
    }

    public String actualizarReservacion(int idEntretenimiento, String fechaReservacionEntretenimiento,String correoClienteEntretenimiento,
            String correoElectronico) {
        Date dfre;
        mensaje = "";
        List<Srentrenimiento> srentretenimiento = existenciaParaReservar(idEntretenimiento, fechaReservacionEntretenimiento);
        Empresacliente empresaCliente =obtenerIdEmpresa(correoElectronico);
        Srentrenimiento sre = null;
        Entretenimiento entretenimiento = new Entretenimiento();
        
        Integer id = idEntretenimiento;
        Transaction tx = null;
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            tx = session.beginTransaction();
            entretenimiento = (Entretenimiento) session.get(Entretenimiento.class, id);
            sre = (Srentrenimiento) session.get(Srentrenimiento.class, srentretenimiento.get(0).getIdSrentrenimiento());
            try {
                SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
                dfre = formatter.parse(fechaReservacionEntretenimiento);
                sre.setFechaReservacionEntretenimiento(dfre);
            } catch (ParseException e) {
                e.printStackTrace();
            }
            sre.setStatusEntretenimiento("RESERVADO");
            sre.setEmpresacliente(empresaCliente);
            sre.setCorreoClienteEntretenimiento(correoClienteEntretenimiento);
            session.update(sre);
            tx.commit();
            mensaje = "Reservación realizada con éxito";
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

    public String cancelarReservacion(int idEntretenimiento, String fechaReservacionEntretenimiento) {
         mensaje = "";
        List<Srentrenimiento> srentretenimiento = existenciaParaReservar(idEntretenimiento, fechaReservacionEntretenimiento);
        Srentrenimiento sre = null;
        Entretenimiento entretenimiento = new Entretenimiento();

        Integer id = idEntretenimiento;
        Transaction tx = null;
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            tx = session.beginTransaction();
            entretenimiento = (Entretenimiento) session.get(Entretenimiento.class, id);
            sre = (Srentrenimiento) session.get(Srentrenimiento.class, srentretenimiento.get(0).getIdSrentrenimiento());
            sre.setStatusEntretenimiento("DISPONIBLE");
            session.update(sre);
            tx.commit();
            mensaje = "Cancelación exitosa";
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

    public String confirmarReservacion(int idEntretenimiento, String fechaReservacionEntretenimiento) {
        mensaje = "";
        Srentrenimiento sre = new Srentrenimiento();
        Transaction tx = null;
        Integer IdSEntretenimiento = obtenerIdEntretenimientoReservado(idEntretenimiento, fechaReservacionEntretenimiento);
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            tx = session.beginTransaction();
            sre = (Srentrenimiento) session.get(Srentrenimiento.class, IdSEntretenimiento);
            sre.setStatusEntretenimiento("CONFIRMADO");
            session.update(sre);
            tx.commit();
            mensaje = "Confirmación exitosa";
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

    private Integer obtenerIdEntretenimientoReservado(Integer id, String fechaReservacionEntretenimiento) {
        session = HibernateUtil.getSessionFactory().openSession();
        List<Srentrenimiento> srentretenimiento = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery("from Srentrenimiento where entretenimientoIdEntretenimiento=" + id + " and fechaReservacionEntretenimiento='" + fechaReservacionEntretenimiento + "'");
            srentretenimiento = (List<Srentrenimiento>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        if(srentretenimiento.size()==0){
            return 0;
        }
        else{
            return srentretenimiento.get(0).getIdSrentrenimiento();
        }

    }

    private List<Srentrenimiento> existenciaParaReservar(Integer id, String fechaReservacionEntretenimiento) {
        session = HibernateUtil.getSessionFactory().openSession();
        List<Srentrenimiento> srentretenimiento = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery("from Srentrenimiento where fechaReservacionEntretenimiento='" + fechaReservacionEntretenimiento + "' and entretenimientoIdEntretenimiento=" + id);
            srentretenimiento = (ArrayList<Srentrenimiento>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return srentretenimiento;
    }

    int verificarStatus(Integer idEntretenimiento, String fechaReservacionEntretenimiento) {
        List<Srentrenimiento> srmentretenimiento = existenciaParaReservar(idEntretenimiento, fechaReservacionEntretenimiento);
        int valor = 0;
        if (srmentretenimiento.size() == 0) {
            valor = 0;
        }
        for (int i = 0; i < srmentretenimiento.size(); i++) {
            if (srmentretenimiento.get(i).getStatusEntretenimiento().equals("RESERVADO")) {
                valor = 1;
            }
            if (srmentretenimiento.get(i).getStatusEntretenimiento().equals("DISPONIBLE")) {
                valor = 2;
            }
            if (srmentretenimiento.get(i).getStatusEntretenimiento().equals("CONFIRMADO")) {
                valor = 3;
            }
        }
        return valor;
    }
    Entretenimiento obtenerEntretenimiento(int idEntretenimiento) {
        session = HibernateUtil.getSessionFactory().openSession();
        List<Entretenimiento> entretenimiento = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery("from Entretenimiento where IdEntretenimiento=" + idEntretenimiento);
            entretenimiento = (ArrayList<Entretenimiento>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return entretenimiento.get(0);
    }
    
    Empresacliente obtenerIdEmpresa(String correoElectronico) {
        session = HibernateUtil.getSessionFactory().openSession();
        List<Empresacliente> empresa = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery("from Empresacliente where correoElectronico='"+correoElectronico+"'");
            empresa = (ArrayList<Empresacliente>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return empresa.get(0);
    }

    List<Srentrenimiento> obtenerEntretenimientosReservados(String correoEmpresa) {
        List<Srentrenimiento> srentretenimiento = null;
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            session.beginTransaction();
            Query q = session.createQuery("Select s from Srentrenimiento s, Empresacliente e where IdEmpresacliente= empresaClienteIdEmpresaCliente and (correoElectronico='"+correoEmpresa+"' and statusEntretenimiento='RESERVADO')");
            srentretenimiento = (List<Srentrenimiento>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return srentretenimiento;
    }
}
