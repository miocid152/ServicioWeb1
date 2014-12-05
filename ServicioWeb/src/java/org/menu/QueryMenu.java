/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.menu;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
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

    public List ObtenerMenu(String fecha) {
        List<Menu> Menu = null;
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            session.beginTransaction();
            Query q = session.createQuery("Select m from Menu m  where m.idMenu  not in(Select m.idMenu from Menu m, Srmenu where menuIdMenu=idMenu and (stautsMenu='RESERVADO 'or stautsMenu='CONFIRMADO') and fechaReservacionMenu='" + fecha + "')");
            Menu = (List<Menu>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return Menu;
    }

    public String agregarReservacion(int idMenu, String fechaReservacionMenu, String correoClienteMenu,
            String correoElectronico) {
        Empresacliente empresaCliente = ObtenerIdEmpresa(correoElectronico);
        session = HibernateUtil.getSessionFactory().openSession();
        mensaje = "";
        Date dfrm;
        Srmenu srm = new Srmenu();
        Menu menu = new Menu();

        Integer id = idMenu;
        Transaction tx = null;
        try {
            tx = session.beginTransaction();
            menu = (Menu) session.get(Menu.class, id);
            srm.setMenu(menu);
            srm.setStautsMenu("RESERVADO");
            srm.setCorreoClienteMenu(correoClienteMenu);
            srm.setEmpresacliente(empresaCliente);
            try {
                SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
                dfrm = formatter.parse(fechaReservacionMenu);
                srm.setFechaReservacionMenu(dfrm);
            } catch (ParseException ex) {
                Logger.getLogger(QueryMenu.class.getName()).log(Level.SEVERE, null, ex);
            }
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

    public String actualizarReservacion(int idMenu, String fechaReservacionMenu, String correoClienteMenu,
            String correoElectronico) {
        Date dfrm;
        mensaje = "";
        List<Srmenu> srmenu = existenciaParaReservar(idMenu, fechaReservacionMenu);
        Empresacliente empresaCliente = ObtenerIdEmpresa(correoElectronico);
        Srmenu srm = null;
        Menu menu = new Menu();

        Integer id = idMenu;
        Transaction tx = null;
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            tx = session.beginTransaction();
            menu = (Menu) session.get(Menu.class, id);
            srm = (Srmenu) session.get(Srmenu.class, srmenu.get(0).getIdSrmenu());
            try {
                SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
                dfrm = formatter.parse(fechaReservacionMenu);
                srm.setFechaReservacionMenu(dfrm);
            } catch (ParseException e) {
                e.printStackTrace();
            }
            srm.setCorreoClienteMenu(correoClienteMenu);
            srm.setStautsMenu("RESERVADO");
            srm.setEmpresacliente(empresaCliente);
            session.update(srm);
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

    public String cancelarReservacion(int idMenu, String fechaReservacionMenu) {
        mensaje = "";
        List<Srmenu> srmenu = existenciaParaReservar(idMenu, fechaReservacionMenu);
        Srmenu srm = null;
        Menu menu = new Menu();

        Integer id = idMenu;
        Transaction tx = null;
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            tx = session.beginTransaction();
            menu = (Menu) session.get(Menu.class, id);
            srm = (Srmenu) session.get(Srmenu.class, srmenu.get(0).getIdSrmenu());
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

    public String confirmarReservacion(int idMenu, String fechaReservacionMenu) {
        mensaje = "";
        Srmenu srm = new Srmenu();
        Transaction tx = null;
        Integer IdSrmenu = obtenerIdMenuReservado(idMenu, fechaReservacionMenu);
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

    private Integer obtenerIdMenuReservado(Integer id, String fechaReservacionMenu) {
        session = HibernateUtil.getSessionFactory().openSession();
        List<Srmenu> srmenu = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery("from Srmenu where fechaReservacionMenu='" + fechaReservacionMenu + "' and menuIdMenu=" + id);
            srmenu = (List<Srmenu>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        if (srmenu.size() == 0) {
            return 0;
        } else {
            return srmenu.get(0).getIdSrmenu();
        }
    }

    private List<Srmenu> existenciaParaReservar(Integer id, String fechaReservacionMenu) {
        session = HibernateUtil.getSessionFactory().openSession();
        List<Srmenu> srmenu = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery("from Srmenu where fechaReservacionMenu='" + fechaReservacionMenu + "' and menuIdMenu=" + id);
            srmenu = (ArrayList<Srmenu>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return srmenu;
    }

    int verificarStatus(Integer idMenu, String fecha) {
        List<Srmenu> srmenu = existenciaParaReservar(idMenu, fecha);
        int valor = 0;
        if (srmenu.size() == 0) {
            valor = 0;
        }
        for (int i = 0; i < srmenu.size(); i++) {
            if (srmenu.get(i).getStautsMenu().equals("RESERVADO")) {
                valor = 1;
            }
            if (srmenu.get(i).getStautsMenu().equals("DISPONIBLE")) {
                valor = 2;
            }
            if (srmenu.get(i).getStautsMenu().equals("CONFIRMADO")) {
                valor = 3;
            }
        }
        return valor;
    }

    Menu obtenerMenu(int idMenu) {
        session = HibernateUtil.getSessionFactory().openSession();
        List<Menu> menu = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery("from Menu where IdMenu=" + idMenu);
            menu = (ArrayList<Menu>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return menu.get(0);
    }

    Empresacliente ObtenerIdEmpresa(String correoElectronico) {
        session = HibernateUtil.getSessionFactory().openSession();
        List<Empresacliente> empresa = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery("from Empresacliente where correoElectronico='" + correoElectronico + "'");
            empresa = (ArrayList<Empresacliente>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return empresa.get(0);
    }

    List<Srmenu> obtenerMenusReservados(String correoEmpresa) {
        List<Srmenu> srmenu = null;
        try {
            session = HibernateUtil.getSessionFactory().openSession();
            session.beginTransaction();
            Query q = session.createQuery("Select s from Srmenu s, Empresacliente e where IdEmpresacliente= empresaClienteIdEmpresaCliente and (correoElectronico='" + correoEmpresa + "' and stautsMenu='RESERVADO')");
            srmenu = (List<Srmenu>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return srmenu;
    }
}
