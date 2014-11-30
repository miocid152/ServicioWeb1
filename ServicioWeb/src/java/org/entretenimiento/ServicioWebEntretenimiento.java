/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.entretenimiento;

import java.util.LinkedHashMap;
import java.util.LinkedList;
import java.util.List;
import java.util.Map;
import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.ejb.Stateless;
import org.*;
import org.json.simple.JSONValue;

/**
 *
 * @author lomen_000
 */
@WebService(serviceName = "ServicioWebEntretenimiento")
@Stateless()
public class ServicioWebEntretenimiento {

    QueryEntretenimiento qe = new QueryEntretenimiento();

    /**
     * Web service operation
     *
     * @param fechaReservacionEntretenimiento
     * @return
     */
    @WebMethod(operationName = "ListaEntretenimiento")
    public String ListaEntretenimiento(@WebParam(name = "fechaReservacionEntretenimiento") String fechaReservacionEntretenimiento){
        List<Entretenimiento> valor = qe.ObtenerEntretenimientos(fechaReservacionEntretenimiento);
        List l1 = new LinkedList();
        for (int i = 0; i < valor.size(); i++) {
            Map map = new LinkedHashMap();
            map.put("idEntretenimiento", valor.get(i).getIdEntretenimiento());
            map.put("tipoEntretenimiento", valor.get(i).getTipoEntretenimiento());
            map.put("nombreCompaniaEntretenimiento", valor.get(i).getNombreCompaniaEntretenimiento());
            map.put("horasEntretenimiento", valor.get(i).getHorasEntretenimiento());
            map.put("precioEntretenimiento", valor.get(i).getPrecioEntretenimiento());
            l1.add(map);
        }
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }

    /**
     * Web service operation
     *
     * @param idEntretenimiento
     * @param fechaReservacionEntretenimiento
     * @param correoClienteEntretenimiento
     * @return 
     */
    @WebMethod(operationName = "ReservacionEntretenimiento")
    public String ReservacionEntretenimiento(@WebParam(name = "idEntretenimiento") int idEntretenimiento,
            @WebParam(name = "fechaReservacionEntretenimiento") String fechaReservacionEntretenimiento,
            @WebParam(name = "correoClienteEntretenimiento") String correoClienteEntretenimiento) {
        List l1 = new LinkedList();
        Map map = new LinkedHashMap();
        int estado = qe.verificarStatus(idEntretenimiento, fechaReservacionEntretenimiento);
        if (estado == 1) {
            map.put("mensaje", "ya existe la reservacion");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (estado == 3) {
            map.put("mensaje", "Ya fue confirmado");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (estado == 0) {
            map.put("mensaje", qe.agregarReservacion(idEntretenimiento, fechaReservacionEntretenimiento,correoClienteEntretenimiento));
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (estado == 2) {
            map.put("mensaje", qe.actualizarReservacion(idEntretenimiento, fechaReservacionEntretenimiento,correoClienteEntretenimiento));
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        l1.add(map);
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }

    /**
     * Web service operation
     *
     * @param idEntretenimiento
     * @param fechaReservacionEntretenimiento
     * @return
     */
    @WebMethod(operationName = "CancelarReservacionEntretenimiento")
    public String CancelarReservacionEntretenimiento(@WebParam(name = "idEntretenimiento") int idEntretenimiento, @WebParam(name = "fechaReservacionEntretenimiento") String fechaReservacionEntretenimiento) {
        List l1 = new LinkedList();
        Map map = new LinkedHashMap();
        int estado = qe.verificarStatus(idEntretenimiento, fechaReservacionEntretenimiento);
        if (estado == 0) {
            map.put("mensaje", "No existe Reservacion");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (estado == 3) {
            map.put("mensaje", "Ya fue confirmado");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (estado == 2) {
            map.put("mensaje", "No existe Reservacion");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (estado == 1) {
            map.put("mensaje", qe.cancelarReservacion(idEntretenimiento, fechaReservacionEntretenimiento));
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        l1.add(map);
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }

    /**
     * Web service operation
     * @param idEntretenimiento
     * @param fechaReservacionEntretenimiento
     * @return 
     */
    @WebMethod(operationName = "ConfirmarReservacionEntretenimiento")
    public String ConfirmarReservacionEntretenimiento(@WebParam(name = "idEntretenimiento") int idEntretenimiento, @WebParam(name = "fechaReservacionEntretenimiento") String fechaReservacionEntretenimiento) {
        List l1 = new LinkedList();
        Map map = new LinkedHashMap();
        int estado = qe.verificarStatus(idEntretenimiento, fechaReservacionEntretenimiento);
        if (estado == 0) {
            map.put("mensaje", "No existe Reservacion");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (estado == 3) {
            map.put("mensaje", "Ya fue confirmado");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (estado == 2) {
            map.put("mensaje", "No existe Reservacion");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (estado == 1) {
            map.put("mensaje", qe.confirmarReservacion(idEntretenimiento, fechaReservacionEntretenimiento));
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        l1.add(map);
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }
    
        /**
     * Web service operation
     * @param idEntretenimiento
     * @return 
     */
    @WebMethod(operationName = "precioEntretenimiento")
    public Float precioSalon(@WebParam(name = "idEntretenimiento") int idEntretenimiento) {
        float precio =  qe.ObtenerPrecio(idEntretenimiento);
        return precio;
    }

}
