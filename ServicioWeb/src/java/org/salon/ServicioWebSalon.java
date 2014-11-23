/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.salon;

import java.io.IOException;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
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
            map.put("precio", valor.get(i).getPrecioSalon());
            map.put("direccion", valor.get(i).getDireccionSalon());
            l1.add(map);
        }
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "ReservacionSalon")
    public String ReservacionSalon(@WebParam(name = "idSalon") int idSalon) {
        String retorno = qs.agregarReservacion(idSalon);
        return retorno;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "CancelarReservacionSalon")
    public String CancelarReservacionSalon(@WebParam(name = "idSalon") int idSalon, @WebParam(name = "fechaSalon") String fechaSalon) {
        SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
        String retorno = "";
        try {
            Date date = formatter.parse(fechaSalon);
            retorno = qs.cancelarReservacion(idSalon, formatter.format(date));

        } catch (ParseException e) {
            e.printStackTrace();
        }

        return retorno;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "ConfirmarReservacionSalon")
    public String ConfirmarReservacionSalon(@WebParam(name = "idSalon") int idSalon, @WebParam(name = "fechaSalon") String fechaSalon) {
        SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
        String retorno = "";
        try {
            Date date = formatter.parse(fechaSalon);
            retorno = qs.confirmarReservacion(idSalon, formatter.format(date));

        } catch (ParseException e) {
            e.printStackTrace();
        }

        return retorno;
    }
//    /**
//     * Web service operation
//     *
//     * @return
//     */
//    @WebMethod(operationName = "ListaSalones")
//    public List<Salon> ListaSalones() {
//        ObtenerSalon os = new ObtenerSalon();
//        List<Salon> valor = os.getSalones();
//        List<Salon> salon = new ArrayList<>();
//        for (int i = 0; i < valor.size(); i++) {
//            salon.add(new Salon(
//                    valor.get(i).getIdSalon(),
//                    valor.get(i).getNombreSalon(),
//                    valor.get(i).getPrecio(),
//                    valor.get(i).getDireccion()
//                    )
//            );
//        }
//        return salon;
//    }

}
