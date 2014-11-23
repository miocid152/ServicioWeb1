/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.menu;

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
@WebService(serviceName = "ServicioWebMenu")
@Stateless()
public class ServicioWebMenu {

    QueryMenu qm = new QueryMenu();

    /**
     * Web service operation
     *
     * @throws java.io.IOException
     */
    @WebMethod(operationName = "ListaMenu")
    public String ListaMenu() throws IOException {
        List<Menu> valor = qm.ObtenerMenu();
        List l1 = new LinkedList();
        for (int i = 0; i < valor.size(); i++) {
            Map map = new LinkedHashMap();
            map.put("idMenu", valor.get(i).getIdMenu());
            map.put("menuDes", valor.get(i).getMenuDes());
            map.put("precio", valor.get(i).getPrecio());
            map.put("cantidadPersonas", valor.get(i).getCantidadPersonas());
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
        String retorno = qm.agregarReservacion(idSalon);
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
            retorno = qm.cancelarReservacion(idSalon, formatter.format(date));

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
            retorno = qm.confirmarReservacion(idSalon, formatter.format(date));

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
//    @WebMethod(operationName = "ListaMenu")
//    public List<Salon> ListaMenu() {
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
