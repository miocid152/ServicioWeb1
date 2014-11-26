/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.entretenimiento;

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
     * @return
     * @throws java.io.IOException
     */
    @WebMethod(operationName = "ListaEntretenimiento")
    public String ListaEntretenimiento(@WebParam(name = "fechaReservacionEntretenimiento") String fechaReservacionEntretenimiento) throws IOException {
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
     * @return
     */
    @WebMethod(operationName = "ReservacionEntretenimiento")
    public String ReservacionEntretenimiento(@WebParam(name = "idEntretenimiento") int idEntretenimiento, @WebParam(name = "fechaReservacionEntretenimiento") String fechaReservacionEntretenimiento) {
        List l1 = new LinkedList();
        Map map = new LinkedHashMap();
        if (qe.verificarStatus(idEntretenimiento, fechaReservacionEntretenimiento) == 1) {
            map.put("mensaje", "ya existe la reservacion");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (qe.verificarStatus(idEntretenimiento, fechaReservacionEntretenimiento) == 3) {
            map.put("mensaje", "Ya fue confirmado");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (qe.verificarStatus(idEntretenimiento, fechaReservacionEntretenimiento) == 0) {
            map.put("mensaje", qe.agregarReservacion(idEntretenimiento, fechaReservacionEntretenimiento));
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (qe.verificarStatus(idEntretenimiento, fechaReservacionEntretenimiento) == 2) {
            map.put("mensaje", qe.actualizarReservacion(idEntretenimiento, fechaReservacionEntretenimiento));
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
     * @param fechaEntretenimiento
     * @return
     */
    @WebMethod(operationName = "CancelarReservacionEntretenimiento")
    public String CancelarReservacionEntretenimiento(@WebParam(name = "idEntretenimiento") int idEntretenimiento, @WebParam(name = "fechaReservacionEntretenimiento") String fechaReservacionEntretenimiento) {
        List l1 = new LinkedList();
        Map map = new LinkedHashMap();
        if (qe.verificarStatus(idEntretenimiento, fechaReservacionEntretenimiento) == 0) {
            map.put("mensaje", "No existe Reservacion");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (qe.verificarStatus(idEntretenimiento, fechaReservacionEntretenimiento) == 3) {
            map.put("mensaje", "Ya fue confirmado");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (qe.verificarStatus(idEntretenimiento, fechaReservacionEntretenimiento) == 2) {
            map.put("mensaje", "No existe Reservacion");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (qe.verificarStatus(idEntretenimiento, fechaReservacionEntretenimiento) == 1) {
            map.put("mensaje", qe.cancelarReservacion(idEntretenimiento, fechaReservacionEntretenimiento));
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        l1.add(map);
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "ConfirmarReservacionEntretenimiento")
    public String ConfirmarReservacionEntretenimiento(@WebParam(name = "idEntretenimiento") int idEntretenimiento, @WebParam(name = "fechaReservacionEntretenimiento") String fechaReservacionEntretenimiento) {
        List l1 = new LinkedList();
        Map map = new LinkedHashMap();
        if (qe.verificarStatus(idEntretenimiento, fechaReservacionEntretenimiento) == 0) {
            map.put("mensaje", "No existe Reservacion");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (qe.verificarStatus(idEntretenimiento, fechaReservacionEntretenimiento) == 3) {
            map.put("mensaje", "Ya fue confirmado");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (qe.verificarStatus(idEntretenimiento, fechaReservacionEntretenimiento) == 2) {
            map.put("mensaje", "No existe Reservacion");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (qe.verificarStatus(idEntretenimiento, fechaReservacionEntretenimiento) == 1) {
            map.put("mensaje", qe.confirmarReservacion(idEntretenimiento, fechaReservacionEntretenimiento));
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        l1.add(map);
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }

}
