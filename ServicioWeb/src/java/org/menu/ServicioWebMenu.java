/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.menu;

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
     * @param fechaReservacionMenu
     * @return
     */
    @WebMethod(operationName = "ListaMenu")
    public String ListaMenu(@WebParam(name = "fechaReservacionMenu") String fechaReservacionMenu) {
        List<Menu> valor = qm.ObtenerMenu(fechaReservacionMenu);
        List l1 = new LinkedList();
        for (int i = 0; i < valor.size(); i++) {
            Map map = new LinkedHashMap();
            map.put("idMenu", valor.get(i).getIdMenu());
            map.put("menuDes", valor.get(i).getMenuDes());
            map.put("precioMenu", valor.get(i).getPrecioMenu());
            map.put("nombreCompaniaMenu", valor.get(i).getNombreCompaniaMenu());
            map.put("cantidadPersonas", valor.get(i).getCantidadPersonas());
            l1.add(map);
        }
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }

    /**
     * Web service operation
     *
     * @param idMenu
     * @param fechaReservacionMenu
     * @param correoClienteMenu
     * @param correoEmpresa
     * @return
     */
    @WebMethod(operationName = "ReservacionMenu")
    public String ReservacionMenu(@WebParam(name = "idMenu") int idMenu,
            @WebParam(name = "fechaReservacionMenu") String fechaReservacionMenu,
            @WebParam(name = "correoClienteMenu") String correoClienteMenu,
            @WebParam(name = "correoEmpresa") String correoEmpresa) {
        List l1 = new LinkedList();
        Map map = new LinkedHashMap();
        int estado = qm.verificarStatus(idMenu, fechaReservacionMenu);
        if (estado == 1) {
            map.put("mensaje", "ya existe la reservacion");
            map.put("fecha", fechaReservacionMenu);
        }
        if (estado == 3) {
            map.put("mensaje", "Ya fue confirmado");
            map.put("fecha", fechaReservacionMenu);
        }
        if (estado == 0) {
            map.put("mensaje", qm.agregarReservacion(idMenu, fechaReservacionMenu, correoClienteMenu,
                    correoEmpresa));
            map.put("fecha", fechaReservacionMenu);
        }
        if (estado == 2) {
            map.put("mensaje", qm.actualizarReservacion(idMenu, fechaReservacionMenu, correoClienteMenu,
                    correoEmpresa));
            map.put("fecha", fechaReservacionMenu);
        }
        l1.add(map);
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }

    /**
     * Web service operation
     *
     * @param idMenu
     * @param fechaReservacionMenu
     * @return
     */
    @WebMethod(operationName = "CancelarReservacionMenu")
    public String CancelarReservacionSalon(@WebParam(name = "idMenu") int idMenu, @WebParam(name = "fechaReservacionMenu") String fechaReservacionMenu) {
        List l1 = new LinkedList();
        Map map = new LinkedHashMap();
        int estado = qm.verificarStatus(idMenu, fechaReservacionMenu);
        if (estado == 0) {
            map.put("mensaje", "No existe Reservacion");
            map.put("fecha", fechaReservacionMenu);
        }
        if (estado == 3) {
            map.put("mensaje", "Ya fue confirmado");
            map.put("fecha", fechaReservacionMenu);
        }
        if (estado == 2) {
            map.put("mensaje", "No existe Reservacion");
            map.put("fecha", fechaReservacionMenu);
        }
        if (estado == 1) {
            map.put("mensaje", qm.cancelarReservacion(idMenu, fechaReservacionMenu));
            map.put("fecha", fechaReservacionMenu);
        }
        l1.add(map);
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }

    /**
     * Web service operation
     *
     * @param idMenu
     * @param fechaReservacionMenu
     * @return
     */
    @WebMethod(operationName = "ConfirmarReservacionMenu")
    public String ConfirmarReservacionMenu(@WebParam(name = "idMenu") int idMenu, @WebParam(name = "fechaReservacionMenu") String fechaReservacionMenu) {
        List l1 = new LinkedList();
        Map map = new LinkedHashMap();
        int estado = qm.verificarStatus(idMenu, fechaReservacionMenu);
        if (estado == 0) {
            map.put("mensaje", "No existe Reservacion");
            map.put("fecha", fechaReservacionMenu);
        }
        if (estado == 3) {
            map.put("mensaje", "Ya fue confirmado");
            map.put("fecha", fechaReservacionMenu);
        }
        if (estado == 2) {
            map.put("mensaje", "No existe Reservacion");
            map.put("fecha", fechaReservacionMenu);
        }
        if (estado == 1) {
            map.put("mensaje", qm.confirmarReservacion(idMenu, fechaReservacionMenu));
            map.put("fecha", fechaReservacionMenu);
        }
        l1.add(map);
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }

    /**
     * Web service operation
     *
     * @param idMenu
     * @return
     */
    @WebMethod(operationName = "GetMenu")
    public String GetMenu(@WebParam(name = "idMenu") int idMenu) {
        Menu menu = qm.obtenerMenu(idMenu);
            Map map = new LinkedHashMap();
            map.put("idMenu", menu.getIdMenu());
            map.put("menuDes", menu.getMenuDes());
            map.put("precioMenu", menu.getPrecioMenu());
            map.put("nombreCompaniaMenu", menu.getNombreCompaniaMenu());
            map.put("cantidadPersonas", menu.getCantidadPersonas());
        String jsonString = JSONValue.toJSONString(map);
        return jsonString;
    }

    /**
     * Web service operation
     *
     * @param fechaReservacionMenu
     * @param correoEmpresa
     * @return
     */
    @WebMethod(operationName = "MostrarReservacionesMenu")
    public String MostrarReservacionesMenu(@WebParam(name = "fechaReservacionMenu") String fechaReservacionMenu, @WebParam(name = "correoEmpresa") String correoEmpresa) {
        List<Srmenu> valor = qm.obtenerMenusReservados(fechaReservacionMenu, correoEmpresa);
        List l1 = new LinkedList();
        for (int i = 0; i < valor.size(); i++) {
            Map map = new LinkedHashMap();
            Menu menu = qm.obtenerMenu(valor.get(i).getMenu().getIdMenu());
            map.put("idMenu", valor.get(i).getMenu().getIdMenu());
            map.put("menuDes", menu.getMenuDes());
            map.put("precioMenu", menu.getPrecioMenu());
            map.put("correoClienteMenu", valor.get(i).getCorreoClienteMenu());
            map.put("cantidadPersonas", menu.getCantidadPersonas());
            l1.add(map);
        }
        String jsonString = JSONValue.toJSONString(l1);
        return jsonString;
    }
}
