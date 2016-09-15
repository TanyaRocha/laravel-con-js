/**
 * @class GetIt.GridPrinterIngreso
 * @author Ed Spencer (edward@domine.co.uk)
 * Helper class to easily print the contents of a grid. Will open a new window with a table where the first row
 * contains the headings from your column model, and with a row for each item in your grid's store. When formatted
 * with appropriate CSS it should look very similar to a default grid. If renderers are specified in your column
 * model, they will be used in creating the table. Override headerTpl and bodyTpl to change how the markup is generated
 * 
 * Usage:
 * 
 * var grid = new Ext.grid.GridPanel({
 *   colModel: //some column model,
 *   store   : //some store
 * });
 * 
 * Ext.ux.GridPrinterIngreso.print(grid);
 * 
 */

Ext.ux.GridPrinterIngreso = {
    /**
    * Prints the passed grid. Reflects on the grid's column model to build a table, and fills it using the store
    * @param {Ext.grid.GridPanel} grid The grid to print
    */
    print: function (grid, curl, stitulo) {
        //We generate an XTemplate here by using 2 intermediary XTemplates - one to create the header,
        //the other to create the body (see the escaped {} below)
        var columns = grid.getColumnModel().config;
        //build a useable array of store data for the XTemplate
        var data = [];
        grid.store.data.each(function (item) {
            var convertedData = [];
            //apply renderers from column model
            for (var key in item.data) {
                var value = item.data[key];
                Ext.each(columns, function (column) {
                    if (column.dataIndex == key) {
                        convertedData[key] = column.renderer ? column.renderer(value) : value;
                    }
                }, this);
            }
            data.push(convertedData);
        });

        //use the headerTpl and bodyTpl XTemplates to create the main XTemplate below
        var headings = Ext.ux.GridPrinterIngreso.headerTpl.apply(columns);
        var body = Ext.ux.GridPrinterIngreso.bodyTpl.apply(columns);

        var vUrl = curl;
        var vTitulo = stitulo.toString();
        var vTitulos = vTitulo.split('|');
		var meses = new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		var dateNow = new Date();
        var anio = dateNow.getFullYear();
        var mes = meses[dateNow.getMonth()];
        var diames = dateNow.getDate();
             

        
        var html = new Ext.XTemplate( 
		'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
      '<html>',
        '<head>',
          '<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />',
          '<link href="' + Ext.ux.GridPrinterIngreso.stylesheetPath + '" rel="stylesheet" type="text/css" media="screen,print" />',        
          '<title>SISTEMA MUNICIPAL DE GESTIÓN DE PROCESOS</title>',
        '</head>',
        '<body>',
        '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="pagedTable">',
          '<tr>',
            '<th width="50%" scope="col"><center><img src="' + vUrl + '" width="85" height="85" /></center></th>',
            '<th width="50%" scope="col"><center><p>Gobierno Autonomo Municipal de La Paz</p>',
            '<p></p></center></th>',
          '</tr>',
        '</table>',
        '<table width="100%" border="1" cellspacing="0" cellpadding="0" class="pagedTable">',
		   '<tr>',
				'<th width="25%" scope="col" colspan="4"><font face="Arial, Helvetica, sans-serif" size="1px"><center>NOTA DE INGRESO</center></H5></td>',
	      '</tr>',
          '<tr>',
			'<th width="25%" scope="col"><font face="Arial, Helvetica, sans-serif" size="1px"> <center>ALMACEN ORIGEN </center></font></th>',
            '<th width="25%" scope="col"><font face="Arial, Helvetica, sans-serif" size="1px"> <center> ' + vTitulos[2] + ' </center></font></th>',
			'<th width="25%" scope="col"><font face="Arial, Helvetica, sans-serif" size="1px"> <center> FECHA </center></font></th>',
            '<th width="25%" scope="col"><font face="Arial, Helvetica, sans-serif" size="1px"> <center> ' + diames + '-' + mes+ '-' + anio + ' </center></font></th>',		
		 '</tr>',
		 '<tr>',
			'<th width="25%" scope="col"><font face="Arial, Helvetica, sans-serif" size="1px"> <center>ALMACEN/PROVEEDOR:</center></font></th>',
            '<th width="25%" scope="col"><font face="Arial, Helvetica, sans-serif" size="1px"> <center> ' + vTitulos[3] + ' </center></font></th>',
			'<th width="25%" scope="col"><font face="Arial, Helvetica, sans-serif" size="1px"> <center></center></font></th>',
            '<th width="25%" scope="col"><font face="Arial, Helvetica, sans-serif" size="1px"> <center></center></font></th>',	
          '</tr>',
        '</table>',
        '<table width="100%" border="1" cellspacing="0" cellpadding="0" class="pagedTable">',
          headings,
            '<tpl for=".">',
              body,
            '</tpl>',
        '</table>',
        '</body>',
      '</html>'
    ).apply(data);

        //open up a new printing window, write to it, print it and close
        //alert('Usted imprimir\xe1 el documento ...');
        var win = window.open('', 'printgrid');
        win.document.write(html);
        //alert(html);
        win.print(html);

        win.document.close();
        win.close();
    },

    /**
    * @property stylesheetPath
    * @type String
    * The path at which the print stylesheet can be found (defaults to '/stylesheets/print.css')
    */
    //stylesheetPath: '/stylesheets/print.css',
    //stylesheetPath: '../Content/css/print.css',
    stylesheetPath: 'print.css',

    /**
    * @property headerTpl
    * @type Ext.XTemplate
    * The XTemplate used to create the headings row. By default this just uses <th> elements, override to provide your own
    */
    headerTpl: new Ext.XTemplate(
    '<tr>',
      '<tpl for=".">',
        '<th><font face="Arial, Helvetica, sans-serif" size="1px">  {header}</font> </th>',
      '</tpl>',
    '</tr>'
  ),

    /**
    * @property bodyTpl
    * @type Ext.XTemplate
    * The XTemplate used to create each row. This is used inside the 'print' function to build another XTemplate, to which the data
    * are then applied (see the escaped dataIndex attribute here - this ends up as "{dataIndex}")
    */
    bodyTpl: new Ext.XTemplate(
    '<tr>',
      '<tpl for=".">',
        '<td><font face="Arial, Helvetica, sans-serif" size="2px">  \{{dataIndex}\}</font> </td>',
      '</tpl>',
    '</tr>'
  )
};