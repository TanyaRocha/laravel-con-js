Ext.namespace("acl");

var LABEL_LOADING = "Cargando registros ...";
var LABEL_FAILURE_LOAD = "Falla al cargar registros";
var LABEL_TITLE_PANEL_1 = "ALMACENES";

acl.application = {
  init:function(){
    storeUserProcess = function (n, r, i) {
      var myMask = new Ext.LoadMask(Ext.getBody(), {msg: LABEL_LOADING});
      myMask.show();
      Ext.Ajax.request({
        //url: "http:///servicios/blpAlmacenesAjax.php",
        //url: "http://localhost:8080/blpInventario/servicios/blpAlmacenesAjax.php",
		url: "procesos",
        method: "POST",
       params: {"option": "LST", "pageSize": n, "limit": r, "start": i},
		//params: {"option": "LST", "pageSize": n, "limit": r, "start": i},

        success:function (result, request) {
                  storeUser.loadData(Ext.util.JSON.decode(result.responseText));
                  myMask.hide();
                },
        failure:function (result, request) {
                  myMask.hide();
                  Ext.MessageBox.alert("Alert", LABEL_FAILURE_LOAD);
                }
      });
    };

    onMnuContext = function(grid, rowIndex,e) {
      e.stopEvent();
      var coords = e.getXY();
      mnuContext.showAt([coords[0], coords[1]]);
    };

    //Variables mayoristas
    var pageSize = parseInt(20/*CONFIG.pageSize*/);
	
    //store mayoristas
    var storeUser = new Ext.data.GroupingStore({
        proxy:new Ext.data.HttpProxy({
            url:    "../servicios/blpAlmacenesAjax.php",
            method: "POST"
        }),

        reader:new Ext.data.JsonReader({
            root: "resultRoot",
            totalProperty: "resultTotal",
            fields: [
					 {name: "ALMACEN_ID", allowBlank: false},
					 {name: "ALMACEN_CODIGO", allowBlank: false},
					 {name: "ALMACEN_TIPO", allowBlank: false},
					 {name: "ALMACEN_NIT", allowBlank: false},
					 {name: "ALMACEN_DESCRIPCION", allowBlank: false},
					 {name: "ALMACEN_OBSERVACION", allowBlank: false},
					 {name: "ALMACEN_DIRECCION", allowBlank: false},
					 {name: "ALMACEN_TELEFONO", allowBlank: false},
					 {name: "ALMACEN_CAPACIDAD", allowBlank: false},
					 {name: "ALMACEN_REGISTRO", allowBlank: false},
					 {name: "ALMACEN_MODIFICACION", allowBlank: false},
					 {name: "ALMACEN_USUARIO", allowBlank: false},
					 {name: "ALMACEN_ESTADO", allowBlank: false}
                     
                    ]
        }),
        listeners:{
            beforeload:function (store) {
                this.baseParams = {"option": "LST", "pageSize": pageSize};
            }
        }
    });	
	//PIE DE PAGINA DE MAYORISTAS
    var storePageSize = new Ext.data.SimpleStore({
      fields: ["size"],
      data: [["15"], ["25"], ["35"], ["50"], ["100"]],
      autoLoad: true
    });		

    var cboPageSize = new Ext.form.ComboBox({
		id: "cboPageSize",
		mode: "local",
		triggerAction: "all",
		store: storePageSize,
		valueField: "size",
		displayField: "size",
		width: 50,
		editable: false,
		listeners:{
			select: function (combo, record, index) {
				pageSize = parseInt(record.data["size"]);
				pagingUser.pageSize = pageSize;
				pagingUser.moveFirst();
			}
		}
    });
	//PAGINADO
    var pagingUser = new Ext.PagingToolbar({
		id: "pagingUser",
		pageSize: pageSize,
		store: storeUser,
		displayInfo: true,
		displayMsg: "Displaying users " + "{" + "0" + "}" + " - " + "{" + "1" + "}" + " of " + "{" + "2" + "}",
		emptyMsg: "No roles to display",
		items: ["-", "Page size:", cboPageSize]
    });
	//GRILLA
    var cmodel = new Ext.grid.ColumnModel({
		defaults: {
		sortable:true
		},
		columns:[
		{id: "ID", header: "ID", dataIndex: "ALMACEN_ID", hidden: true, hideable: true, width: 50},
		{header: "ALMACEN_CODIGO", dataIndex: "ALMACEN_CODIGO", align: "left",hideable: true, editor: new Ext.form.TextField({})},
		{header: "TIPO", dataIndex: "ALMACEN_TIPO", align: "left",hideable: true, editor: new Ext.form.TextField({})},
		{header: "N. I. T.", dataIndex: "ALMACEN_NIT", align: "left",hideable: true, editor: new Ext.form.TextField({})},
		{header: "DESCRIPCION", dataIndex: "ALMACEN_DESCRIPCION", align: "left", hideable: true, editor: new Ext.form.TextField({})},
		{header: "OBSERVACIONES", dataIndex: "ALMACEN_OBSERVACION", align: "left",hideable: true, editor: new Ext.form.TextField({})},
		{header: "DIRECCION", dataIndex: "ALMACEN_DIRECCION", align: "left",hideable: true, editor: new Ext.form.TextField({})},
		{header: "TELEFONO", dataIndex: "ALMACEN_TELEFONO", align: "left", hideable: true, editor: new Ext.form.TextField({})},
		{header: "CAPACIDAD", dataIndex: "ALMACEN_CAPACIDAD", align: "left",hideable: true, editor: new Ext.form.TextField({})},
		{header: "REGISTRO", dataIndex: "ALMACEN_REGISTRO", align: "left",hideable: true, editor: new Ext.form.TextField({})},
		{header: "MODIFIACION", dataIndex: "ALMACEN_MODIFICACION", align: "left", hideable: true, editor: new Ext.form.TextField({})},
		{header: "USUARIO", dataIndex: "ALMACEN_USUARIO", align: "left",  hideable: true, editor: new Ext.form.TextField({})},
		{header: "ESTADO", dataIndex: "ALMACEN_ESTADO", align: "left",  hideable: false, editor: new Ext.form.TextField({}),
			renderer: function(v, params, data){
				return ((v === 'ACTIVO') ? '<font color="green">ACTIVO</font>' : '<font color="red">INACTIVO</font>')
			}
        }]
    });

    var smodel = new Ext.grid.RowSelectionModel({
		singleSelect: true,
		listeners: {
			rowselect: function (sm) {
			},
			rowdeselect: function (sm) {
			}
		}
    });
	
    var grdpnlUser = new Ext.grid.GridPanel({
		id: "grdpnlUser",
		store: storeUser,
		colModel: cmodel,
		selModel: smodel,
		columnLines: true,
		viewConfig: {forceFit: true},
		enableColumnResize: true,
		enableHdMenu: true, //Menu of the column
		//tbar: [btnNew, btnUpd,btnDel/*, "->", txtSearch, btnTextClear, btnSearch*/],
		bbar: pagingUser,
		style: "margin: 0 auto 0 auto;",
		width: '100%',
		height: '450',
		title: LABEL_TITLE_PANEL_1,
		renderTo: "divMain",
		listeners:{
		}
    });

    //Initialize events
    storeUserProcess(pageSize, pageSize, 0);
    cboPageSize.setValue(pageSize);
    
  }
}

Ext.onReady(acl.application.init, acl.application);
