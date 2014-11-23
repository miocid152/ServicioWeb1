/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.salon;

import java.io.IOException;
import java.io.StringWriter;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.LinkedList;
import java.util.List;
import java.util.Map;
import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.ejb.Stateless;
import org.hibernate.Session;
import org.*;
import org.json.simple.JSONArray;
import org.json.simple.JSONValue;

/**
 *
 * @author lomen_000
 */
@WebService(serviceName = "ServicioWebSalon")
@Stateless()
public class ServicioWebSalon {

    /**
     * Web service operation
     */
    @WebMethod(operationName = "ListaSalones")
    public String ListaSalones()  throws IOException{
        List<Salon> valor = new ObtenerSalon().getSalones();
        List  l1 = new LinkedList();
        for (int i = 0; i < valor.size(); i++) {
            Map map = new LinkedHashMap();
            map.put("idSalon", valor.get(i).getIdSalon());
            map.put("nombreSalon", valor.get(i).getNombreSalon());
            map.put("precio", valor.get(i).getPrecio());
            map.put("direccion", valor.get(i).getDireccion());
            l1.add(map);
        }
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
        
    }

    /**
     * Web service operation
     *
     * @return
     */
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
