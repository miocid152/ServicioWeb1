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
    @WebMethod(operationName = "ListaSalones")
    public String ListaEntretenimiento() throws IOException {
        List<Entretenimiento> valor = qe.ObtenerEntretenimientos();
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
     * @param idEntretenimiento
     * @return 
     */
    @WebMethod(operationName = "ReservacionSalon")
    public String ReservacionEntretenimiento(@WebParam(name = "idEntretenimiento") int idEntretenimiento) {
        String retorno = qe.agregarReservacion(idEntretenimiento);
        return retorno;
    }

    /**
     * Web service operation
     * @param idEntretenimiento
     * @param fechaEntretenimiento
     * @return 
     */
    @WebMethod(operationName = "CancelarReservacionSalon")
    public String CancelarReservacionEntretenimiento(@WebParam(name = "idEntretenimiento") int idEntretenimiento, @WebParam(name = "fechaEntretenimiento") String fechaEntretenimiento) {
        SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
        String retorno = "";
        try {
            Date date = formatter.parse(fechaEntretenimiento);
            retorno = qe.cancelarReservacion(idEntretenimiento, formatter.format(date));

        } catch (ParseException e) {
            e.printStackTrace();
        }

        return retorno;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "ConfirmarReservacionSalon")
    public String ConfirmarReservacionEntretenimiento(@WebParam(name = "idEntretenimiento") int idEntretenimiento, @WebParam(name = "fechaEntretenimiento") String fechaEntretenimiento) {
        SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
        String retorno = "";
        try {
            Date date = formatter.parse(fechaEntretenimiento);
            retorno = qe.confirmarReservacion(idEntretenimiento, formatter.format(date));

        } catch (ParseException e) {
            e.printStackTrace();
        }

        return retorno;
    }
    
}
