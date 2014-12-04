/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.salon;

import java.text.SimpleDateFormat;
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
     * @param fechaReservacionSalon
     * @return 
     */
    @WebMethod(operationName = "ListaSalones" )
    public String ListaSalones(@WebParam(name = "fechaReservacionSalon") String fechaReservacionSalon) {
        List<Salon> valor = qs.ObtenerSalones(fechaReservacionSalon);
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
     * @param idSalon
     * @param fechaReservacionSalon
     * @param correoClienteSalon
     * @param correoEmpresa
     * @return 
     */
    @WebMethod(operationName = "ReservacionSalon")
    public String ReservacionSalon(@WebParam(name = "idSalon" ) int idSalon,
            @WebParam(name = "fechaReservacionSalon") String fechaReservacionSalon,
            @WebParam(name = "correoClienteSalon") String correoClienteSalon,
            @WebParam(name = "correoEmpresa") String correoEmpresa
            ) {
        List l1 = new LinkedList();
        Map map = new LinkedHashMap();
        int estado = qs.verificarStatus(idSalon,fechaReservacionSalon);
        if (estado == 1) {
            map.put("mensaje", "ya existe la reservacion");
            map.put("fecha",fechaReservacionSalon);
        }
        if (estado == 3) {
            map.put("mensaje", "Ya fue confirmado");
            map.put("fecha", fechaReservacionSalon);
        } 
        if (estado == 0) {
            map.put("mensaje", qs.agregarReservacion(idSalon,fechaReservacionSalon,correoClienteSalon,
                    correoEmpresa));
            map.put("fecha", fechaReservacionSalon);
        }
        if (estado == 2) {
            map.put("mensaje", qs.actualizarReservacion(idSalon,fechaReservacionSalon,correoClienteSalon,
                    correoEmpresa));
            map.put("fecha",  fechaReservacionSalon);
        }
        l1.add(map);
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }

    /**
     * Web service operation
     * @param idSalon
     * @param fechaReservacionSalon
     * @return 
     */
    @WebMethod(operationName = "CancelarReservacionSalon")
    public String CancelarReservacionSalon(@WebParam(name = "idSalon") int idSalon, @WebParam(name = "fechaReservacionSalon") String fechaReservacionSalon) {
        List l1 = new LinkedList();
        Map map = new LinkedHashMap();
        int estado = qs.verificarStatus(idSalon,fechaReservacionSalon);
            if (estado== 0) {
                map.put("mensaje", "No existe Reservacion");
                map.put("fecha", fechaReservacionSalon);
            }
            if (estado == 3) {
                map.put("mensaje", "Ya fue confirmado");
                map.put("fecha",fechaReservacionSalon);
            } 
            if (estado == 2) {
                map.put("mensaje", "No existe Reservacion");
                map.put("fecha", fechaReservacionSalon);
            }
            if (estado == 1) {
                map.put("mensaje", qs.cancelarReservacion(idSalon, fechaReservacionSalon));
                map.put("fecha",fechaReservacionSalon);
            }
        l1.add(map);
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }

    /**
     * Web service operation
     * @param idSalon
     * @param fechaReservacionSalon
     * @return 
     */
    @WebMethod(operationName = "ConfirmarReservacionSalon")
    public String ConfirmarReservacionSalon(@WebParam(name = "idSalon") int idSalon, @WebParam(name = "fechaReservacionSalon") String fechaReservacionSalon) {
        SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
        List l1 = new LinkedList();
        Map map = new LinkedHashMap();
        int estado =qs.verificarStatus(idSalon, fechaReservacionSalon);
            if (estado == 0) {
                map.put("mensaje", "No existe Reservacion");
                map.put("fecha", fechaReservacionSalon);
            }
            if (estado == 3) {
                map.put("mensaje", "Ya fue confirmado");
                map.put("fecha",fechaReservacionSalon);
            } 
            if (estado == 2) {
                map.put("mensaje", "No existe Reservacion");
                map.put("fecha", fechaReservacionSalon);
            }
            if (estado == 1) {
                map.put("mensaje", qs.confirmarReservacion(idSalon, fechaReservacionSalon));
                map.put("fecha", fechaReservacionSalon);
            }
        l1.add(map);
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }

    /**
     * Web service operation
     * @param idSalon
     * @return 
     */
    @WebMethod(operationName = "GetSalon")
    public String GetSalon(@WebParam(name = "idSalon") int idSalon) {
        Salon salon =  qs.obtenerSalon(idSalon);
            Map map = new LinkedHashMap();
            map.put("idSalon", salon.getIdSalon());
            map.put("nombreSalon", salon.getNombreSalon());
            map.put("precioSalon", salon.getPrecioSalon());
            map.put("direccionSalon", salon.getDireccionSalon());
            String jsonString = JSONValue.toJSONString(map);
        return jsonString;
    }

    /**
     * Web service operation
     * @param fechaReservacionSalon
     * @param correoEmpresa
     * @return 
     */
    @WebMethod(operationName = "MostrarReservacionesSalones")
    public String MostrarReservacionesSalones(@WebParam(name = "fechaReservacionSalon") String fechaReservacionSalon, @WebParam(name = "correoEmpresa") String correoEmpresa) {
        List<Srsalon> valor = qs.obtenerSalonesReservados(fechaReservacionSalon,correoEmpresa);
        List l1 = new LinkedList();
        for (int i = 0; i < valor.size(); i++) {
            Map map = new LinkedHashMap();
            Salon salon = qs.obtenerSalon(valor.get(i).getSalon().getIdSalon());
            map.put("idSalon", valor.get(i).getSalon().getIdSalon());
            map.put("nombreSalon",salon.getNombreSalon());
            map.put("precioSalon", salon.getPrecioSalon());
            map.put("correoClienteSalon", valor.get(i).getCorreoClienteSalon());
            map.put("direccionSalon", salon.getDireccionSalon());
            l1.add(map);
        }
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }
}
