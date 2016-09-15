/**
 * @class GetIt.GridPrinter
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
 * Ext.ux.NotaPrinter.print(grid);
 * 
 */

Ext.ux.NotaPrinter = {
    /**
    * Prints the passed grid. Reflects on the grid's column model to build a table, and fills it using the store
    * @param {Ext.grid.GridPanel} grid The grid to print
    */
    print: function (grid,stitulo) {
        //alert(cfecha);
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
        var headings = Ext.ux.NotaPrinter.headerTpl.apply(columns);
        var body = Ext.ux.NotaPrinter.bodyTpl.apply(columns);
       // var vUrl = curl;
        var vTitulo = stitulo.toString();
        var vTitulos = vTitulo.split('|');

        var fsist = new Date();
        var diames = fsist.getDate();
        var mes=fsist.getMonth() +1 ;
        var anio = fsist.getFullYear();
        
        if (diames < 10)
            diames = "0" + diames;

        if (mes < 10)
            mes="0"+mes;
        var html = new Ext.XTemplate(
		'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
			'<html xmlns="http://www.w3.org/1999/xhtml">',
			'<head>',
			'<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />',
			'<style type="text/css">',
			'<!--',
			'.Estilo2 {',
				'font-style: italic;',
				'color: #000000;',
			'}',
			'.Estilo3 {color: #006699}',
			'-->',
			'</style>',
			'<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />',
				'<link href="' + Ext.ux.NotaPrinter.stylesheetPath + '" rel="stylesheet" type="text/css" media="screen,print" />',
				'<title>NOTA DE VENTA</title>',
			'</head>',
			'<body>',
			'<table width="814" height="598" border="2" bordercolor="#4691D5" bgcolor="#FFFFFF">',
			   '<tr>',
				'<td height="35" colspan="4" class="Estilo2"><H3 align="center" class="Estilo3">GOBIERNO AUTONOMO MUNICIPAL DE LA PAZ</H3></td>',
			  '</tr>',
			   '<tr>',
				'<td height="38" colspan="4"><H5 align="center" class="Estilo3">NOTA DE VENTA</H5></td>',
			  '</tr>',			
			  '<tr>',
				'<td height="37" colspan="2" valign="middle"><span class="Estilo3">SUCURSAL:</span>',
				'<center>'+vTitulos[4]+'</center></td>',
				'<td colspan="1" valign="middle"><span class="Estilo3">NUMERO:</span><center>'+vTitulos[8]+'</center></td>',
				'<td height="37" colspan="1" valign="middle"><span class="Estilo3">FECHA:</span>',
				'<center> ' + anio + '-' + mes+ '-' + diames + '</center></td>',
			  '</tr>',			
			  '<tr>',
				'<td height="37" colspan="3" valign="middle"><span class="Estilo3">RAZON SOCIAL:</span><center>' + vTitulos[9] + '</center>',
				'<center></center></td>',
				'<td width="248" valign="middle"><span class="Estilo3">NIT:</span><center>' + vTitulos[1] + '</center></td>',
			  '</tr>',
			  '<tr>',
				'<td width="182" valign="middle"><span class="Estilo3">CANTIDAD</span><center></center></td>',
				'<td width="159" valign="middle"><span class="Estilo3">DETALLE</span><center></center></td>',
				'<td width="197" valign="middle"><span class="Estilo3">PRECIO UNITARIO</span><center></center></td>',
				'<td><span class="Estilo3">IMPORTE</span><center></center></td>',
			  '</tr>',
			  '<tr>',
				'<td height="140" valign="middle"><center>' + vTitulos[11] + '</center></td>',
				'<td valign="middle"><center>' + vTitulos[12] + '</center></td>',
				'<td valign="middle"><center>' + vTitulos[13] + '</center></td>',
				'<td valign="middle"><center></center></td>',
			  '</tr>',
			  '<tr>',
				'<td valign="middle"><span class="Estilo3"></span><center></center></td>',
				'<td></td>',
				'<td valign="middle"><span class="Estilo3">TOTAL:</span><center></center></td>',
				'<td></td>',
			  '</tr>',
			  '<tr>',
				'<td colspan="3" valign="middle" height="37"><span class="Estilo3">Son:</span></td>',
				'<td valign="middle" height="37"><span class="Estilo3">Bs.</span></td>',
			  '</tr>',
			'</table>',
			'</body>',
			'</html>'
    ).apply(data);

        //open up a new printing window, write to it, print it and close
        alert('Usted imprimir\xe1 el documento ...');
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
    //'<td><font face="Arial, Helvetica, sans-serif" size="2px">  \{{dataIndex}\}</font> </td>',
        '<td><font face="Arial, Helvetica, sans-serif" size="0px">  \{{dataIndex}\}</font> </td>',
      '</tpl>',
    '</tr>'
  )
};