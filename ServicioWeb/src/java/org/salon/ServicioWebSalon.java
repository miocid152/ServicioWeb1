/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.salon;

import java.io.IOException;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.LinkedHashMap;
import java.util.LinkedList;
import java.util.List;
import java.util.Map;
import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.ejb.Stateless;
import javax.jws.WebParam;
import org.*;
import org.json.simple.JSONValue;

/**
 *
 * @author lomen_000
 */
@WebService(serviceName = "ServicioWebSalon")
@Stateless()
public class ServicioWebSalon {

    QuerySalon qs = new QuerySalon();

    /**
     * Web service operation
     *
     * @throws java.io.IOException
     */
    @WebMethod(operationName = "ListaSalones")
    public String ListaSalones() throws IOException {
        List<Salon> valor = qs.ObtenerSalones();
        List l1 = new LinkedList();
        for (int i = 0; i < valor.size(); i++) {
            Map map = new LinkedHashMap();
            map.put("idSalon", valor.get(i).getIdSalon());
            map.put("nombreSalon", valor.get(i).getNombreSalon());
            map.put("precioSalon", valor.get(i).getPrecioSalon());
            map.put("direccionSalon", valor.get(i).getDireccionSalon());
            l1.add(map);
        }
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "ReservacionSalon")
    public String ReservacionSalon(@WebParam(name = "idSalon" ) int idSalon, @WebParam(name = "fechaReservacionSalon") String fechaReservacionSalon) {
        List l1 = new LinkedList();
        Map map = new LinkedHashMap();

        if (qs.verificarStatus(idSalon) == 1) {
            map.put("mensaje", "ya existe la reservacion");
            map.put("fecha", qs.obtenerFechaActual());
        }
        if (qs.verificarStatus(idSalon) == 3) {
            map.put("mensaje", "Ya fue confirmado");
            map.put("fecha", qs.obtenerFechaActual());
        } 
        if (qs.verificarStatus(idSalon) == 0) {
            map.put("mensaje", qs.agregarReservacion(idSalon,fechaReservacionSalon));
            map.put("fecha", qs.obtenerFechaActual());
        }
        if (qs.verificarStatus(idSalon) == 2) {
            map.put("mensaje", qs.actualizarReservacion(idSalon,fechaReservacionSalon));
            map.put("fecha", qs.obtenerFechaActual());
        }
  
        
        l1.add(map);
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "CancelarReservacionSalon")
    public String CancelarReservacionSalon(@WebParam(name = "idSalon") int idSalon, @WebParam(name = "fechaSalon") String fechaSalon) {
        SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
        List l1 = new LinkedList();
        Map map = new LinkedHashMap();
        try {
            Date date = formatter.parse(fechaSalon);
            if (qs.verificarStatus(idSalon,formatter.format(date)) == 0) {
                map.put("mensaje", "No existe Reservacion");
                map.put("fecha", qs.obtenerFechaActual());
            }
            if (qs.verificarStatus(idSalon,formatter.format(date)) == 3) {
                map.put("mensaje", "Ya fue confirmado");
                map.put("fecha", qs.obtenerFechaActual());
            } 
            if (qs.verificarStatus(idSalon,formatter.format(date)) == 2) {
                map.put("mensaje", "No existe Reservacion");
                map.put("fecha", qs.obtenerFechaActual());
            }
            if (qs.verificarStatus(idSalon,formatter.format(date)) == 1) {
                map.put("mensaje", qs.cancelarReservacion(idSalon, formatter.format(date)));
                map.put("fecha", qs.obtenerFechaActual());
            }

        } catch (ParseException e) {
            e.printStackTrace();
        }
        l1.add(map);
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "ConfirmarReservacionSalon")
    public String ConfirmarReservacionSalon(@WebParam(name = "idSalon") int idSalon, @WebParam(name = "fechaSalon") String fechaSalon) {
        SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
        List l1 = new LinkedList();
        Map map = new LinkedHashMap();
        try {
            Date date = formatter.parse(fechaSalon);

            if (qs.verificarStatus(idSalon, formatter.format(date)) == 0) {
                map.put("mensaje", "No existe Reservacion");
                map.put("fecha", qs.obtenerFechaActual());
            }
            if (qs.verificarStatus(idSalon,formatter.format(date)) == 3) {
                map.put("mensaje", "Ya fue confirmado");
                map.put("fecha", qs.obtenerFechaActual());
            } 
             if (qs.verificarStatus(idSalon,formatter.format(date)) == 2) {
                map.put("mensaje", "No existe Reservacion");
                map.put("fecha", qs.obtenerFechaActual());
            }
            if (qs.verificarStatus(idSalon, formatter.format(date)) == 1) {
                map.put("mensaje", qs.confirmarReservacion(idSalon, formatter.format(date)));
                map.put("fecha", qs.obtenerFechaActual());
            }

        } catch (ParseException e) {
            e.printStackTrace();
        }
        l1.add(map);
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }
}
