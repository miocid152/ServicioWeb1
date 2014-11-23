/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.salon;

import java.util.List;
import org.Salon;
import org.hibernate.HibernateException;
import org.hibernate.Query;
import org.hibernate.Session;

/**
 *
 * @author lomen_000
 */
public class ObtenerSalon {

    Session session;

    public ObtenerSalon() {
        session = HibernateUtil.getSessionFactory().openSession();
    }

    public List getSalones() {
        List<Salon> salon = null;
        try {
            session.beginTransaction();
            Query q = session.createQuery("from Salon");
            salon = (List<Salon>) q.list();
        } catch (HibernateException e) {
            e.printStackTrace();
        } finally {
            session.close();
        }
        return salon;
    }

}
