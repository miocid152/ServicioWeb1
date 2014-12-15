/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.entretenimiento;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
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
    DateFormat df = new SimpleDateFormat("YYYY-MM-dd");
    QueryEntretenimiento qe = new QueryEntretenimiento();

    /**
     * Web service operation
     *
     * @param fechaReservacionEntretenimiento
     * @return
     */
    @WebMethod(operationName = "ListaEntretenimiento")
    public String ListaEntretenimiento(@WebParam(name = "fechaReservacionEntretenimiento") String fechaReservacionEntretenimiento) {
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
     * @param correoEmpresa
     * @return
     */
    @WebMethod(operationName = "ReservacionEntretenimiento")
    public String ReservacionEntretenimiento(@WebParam(name = "idEntretenimiento") int idEntretenimiento,
            @WebParam(name = "fechaReservacionEntretenimiento") String fechaReservacionEntretenimiento,
            @WebParam(name = "correoClienteEntretenimiento") String correoClienteEntretenimiento,
            @WebParam(name = "correoEmpresa") String correoEmpresa) {
        List l1 = new LinkedList();
        Map map = new LinkedHashMap();
        int estado = qe.verificarStatus(idEntretenimiento, fechaReservacionEntretenimiento);
        if (estado == 1) {
            map.put("mensaje", "Ya existe la reservación");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (estado == 3) {
            map.put("mensaje", "Ya fue confirmado");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (estado == 0) {
            map.put("mensaje", qe.agregarReservacion(idEntretenimiento, fechaReservacionEntretenimiento, correoClienteEntretenimiento,
                    correoEmpresa));
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (estado == 2) {
            map.put("mensaje", qe.actualizarReservacion(idEntretenimiento, fechaReservacionEntretenimiento, correoClienteEntretenimiento,
                    correoEmpresa));
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
            map.put("mensaje", "No existe reservación");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (estado == 3) {
            map.put("mensaje", "Ya fue confirmado");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (estado == 2) {
            map.put("mensaje", "No existe reservación");
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
     *
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
            map.put("mensaje", "No existe reservación");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (estado == 3) {
            map.put("mensaje", "Ya fue confirmado");
            map.put("fecha", fechaReservacionEntretenimiento);
        }
        if (estado == 2) {
            map.put("mensaje", "No existe reservación");
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
     *
     * @param idEntretenimiento
     * @return
     */
    @WebMethod(operationName = "GetEntretenimiento")
    public String GetEntretenimiento(@WebParam(name = "idEntretenimiento") int idEntretenimiento) {
        Entretenimiento entretenimiento = qe.obtenerEntretenimiento(idEntretenimiento);
        Map map = new LinkedHashMap();
        map.put("idEntretenimiento", entretenimiento.getIdEntretenimiento());
        map.put("tipoEntretenimiento", entretenimiento.getTipoEntretenimiento());
        map.put("nombreCompaniaEntretenimiento", entretenimiento.getNombreCompaniaEntretenimiento());
        map.put("horasEntretenimiento", entretenimiento.getHorasEntretenimiento());
        map.put("precioEntretenimiento", entretenimiento.getPrecioEntretenimiento());
        String jsonString = JSONValue.toJSONString(map);
        return jsonString;
    }

    /**
     * Web service operation
     *
     * @param correoEmpresa
     * @return
     */
    @WebMethod(operationName = "MostrarReservacionesEntretenimiento")
    public String MostrarReservacionesEntretenimiento( @WebParam(name = "correoEmpresa") String correoEmpresa) {
        List<Srentrenimiento> valor = qe.obtenerEntretenimientosReservados(correoEmpresa);
        List l1 = new LinkedList();
        for (int i = 0; i < valor.size(); i++) {
            Map map = new LinkedHashMap();
            Entretenimiento entretenimiento = qe.obtenerEntretenimiento(valor.get(i).getEntretenimiento().getIdEntretenimiento());
            map.put("idEntretenimiento", valor.get(i).getEntretenimiento().getIdEntretenimiento());
            map.put("fechaReservacionEntretenimiento", df.format(valor.get(i).getFechaReservacionEntretenimiento()));
            map.put("nombreCompaniaEntretenimiento", entretenimiento.getNombreCompaniaEntretenimiento());
            map.put("precioEntretenimiento", entretenimiento.getPrecioEntretenimiento());
            map.put("correoClienteEntretenimiento", valor.get(i).getCorreoClienteEntretenimiento());
            map.put("tipoEntretenimiento", entretenimiento.getTipoEntretenimiento());
            l1.add(map);
        }
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }
}
