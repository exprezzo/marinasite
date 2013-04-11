var Busquedapublicaciones=function(){
	this.tituloNuevo='Nueva Publicacion';
	this.eliminar=function(){
	
	var id = this.selected.id;
	var me=this;
	$.ajax({
			type: "POST",
			url: '/'+kore.modulo+'/'+this.controlador.nombre+'/eliminar',
			data: { id: id}
		}).done(function( response ) {		
			var resp = eval('(' + response + ')');
			var msg= (resp.msg)? resp.msg : '';
			var title;
			if ( resp.success == true	){
				icon='/web/apps/fastorder/images/yes.png';
				title= 'Success';				
				var gridBusqueda=$(me.tabId+" .grid_busqueda");				
				gridBusqueda.wijgrid('ensureControl', true);  
			}else{
				icon= '/web/apps/fastorder/images/error.png';
				title= 'Error';
			}
			
			//cuando es true, envia tambien los datos guardados.
			//actualiza los valores del formulario.
			$.gritter.add({
				position: 'bottom-left',
				title:title,
				text: msg,
				image: icon,
				class_name: 'my-sticky-class'
			});
		});
}
	this.nuevo=function(){		
		TabManager.add('/'+kore.modulo+'/'+this.controlador.nombre+'/nuevo',this.tituloNuevo);
	};
	this.activate=function(){
		// vuelve a renderear estos elementos que presentaban problemas. (correccion de bug)		
		$(this.tabId+" .tbPedido").removeClass('ui-tabs-hide');
		$(this.tabId+" .tbPedido  ~ .wijmo-wijribbon-panel").removeClass('ui-tabs-hide');		
		$(this.tabId+" .lista_de_pedidos").wijcombobox('doRefresh');
	}
	this.borrar=function(){
		if (this.selected==undefined) return false;
		var r=confirm("¿Eliminar Orden de Compra?");
		if (r==true){
		  this.eliminar();
		}
	}
	this.agregarClase=function(clase){
		var tabId=this.tabId;		
		var tab=$('div'+this.tabId);						
		tab.addClass(clase);		
		tab=$('a[href="'+tabId+'"]');
		tab.addClass(clase);
	}
	this.init=function(config){		
		//-------------------------------------------Al nucleo		*/		
		this.controlador=config.controlador;
		this.catalogo=config.catalogo;
		//-------------------------------------------
		var tab=config.tab;		
		tabId = '#' + tab.id;
		this.tabId = tabId;
		var jTab=$('div'+tabId);				
		jTab.data('tabObj',this);		
				
		var jTab=$('a[href="'+tabId+'"]');		//// this.agregarClase('busqueda_'+this.controlador.nombre);
	    jTab.html(this.catalogo.nombre);		 
		 jTab.addClass('busqueda_'+this.controlador.nombre); 
		//-------------------------------------------
		$('div'+tabId).css('padding','0px 0 0 0');
		$('div'+tabId).css('margin-top','0px');
		$('div'+tabId).css('border','0 1px 1px 1px');
		//-------------------------------------------
		//Comportamiento de los filtros de fecha
		this.omitirFI=false;
		this.omitirFF=false;
		this.omitirFV=false;
		//-------------------------------------------		
		// console.log("config");console.log(config);
		this.configurarToolbar(tabId);		
		 this.configurarGrid(tabId);
	};
	this.configurarToolbar=function(tabId){
		var me=this;
		
		$(tabId+ " > .lista_toolbar").wijribbon({
			click: function (e, cmd) {
				switch(cmd.commandName){
					case 'nuevo':						
						me.nuevo();
					break;
					case 'editar':
						if (me.selected!=undefined){													
							TabManager.add('/'+kore.modulo+'/'+me.controlador.nombre+'/editar','Editar '+me.catalogo.nombre,me.selected.id);
						}
					break;
					case 'eliminar':
						if (me.selected==undefined) return false;
						var r=confirm("¿Eliminar?");
						if (r==true){
						  me.eliminar();
						}
					break;
					case 'refresh':
						
						var gridBusqueda=$(me.tabId+" .grid_busqueda");
						gridBusqueda.wijgrid('ensureControl', true);
					break;
										
					default:						 
						$.gritter.add({
							position: 'bottom-left',
							title:cmd.commandName,
							text: "Acciones del toolbar en construcci&oacute;n",
							image: '/web/apps/fastorder/images/info.png',
							class_name: 'my-sticky-class'
						});
						
					break;
					case 'imprimir':
						alert("Imprimir en construcción");
					break;
				}
				
			}
		});
		
	};
	this.configurarGrid=function(tabId){
		//						Al nucleo
		// var wh=$(window).height();	
		// var offset = $(tabId + ' .grid_busqueda');
		// var altoHeaderGrid = $(tabId + ' .grid_busqueda thead > tr').height();		
		// altoHeaderGrid=37 //TODAVIA NO ESTA RENDEREADO
		// var disponible = wh - (offset.top +altoHeaderGrid);		
		// nh=parseInt(disponible/altoHeaderGrid);		
		// pageSize=nh -1;		
		pageSize=10;
		//-----------------------------------
		
		var campos=[
			{ name: "id"  },
			{ name: "titulo"},
			{ name: "fecha"}
			
		];
		var dataReader = new wijarrayreader(campos);
	
		// console.log('this.controlador'); console.log(this.controlador);
		var dataSource = new wijdatasource({
			proxy: new wijhttpproxy({
				url: '/'+kore.modulo+'/'+this.controlador.nombre+'/paginar',
				dataType: "json"
			}),
			dynamic:true,			
			reader:new wijarrayreader(campos)
		});
		
		
		dataSource.reader.read= function (datasource) {			
			var totalRows=datasource.data.totalRows;			
			//alert("totalRows: "+totalRows);
			datasource.data = datasource.data.rows;
			datasource.data.totalRows = totalRows;
			dataReader.read(datasource);
		};				
		this.dataSource=dataSource;
		var gridBusqueda=$(".grid_busqueda");

		// gridBusqueda.wijgrid();
		var me=this;
		 // alert("pageSize: "+pageSize);
		gridBusqueda.wijgrid({
			dynamic: true,
			allowColSizing:true,
			//allowEditing:false,
			allowKeyboardNavigation:true,
			allowPaging: true,
			pageSize:pageSize,
			selectionMode:'singleRow',
			showFilter:true,
			data:dataSource,
			columns: [ 
			    { dataKey: "id", visible:true, headerText: "ID" },								
				{ dataKey: "titulo",  visible:true, headerText: "Titulo" },								
				{ dataKey: "fecha", visible:true, headerText: "Fecha" },								
				// {dataKey: "idestado", headerText: "Estado",width:'12%',
					// cellFormatter: function (args) {
                            // if (args.row.type & $.wijmo.wijgrid.rowType.data) {
                                // args.$container
                                    // .css("text-align", "center")
                                    // .empty()
                                    // .append($("<div title='"+args.row.data.estado+"'></div><span style='background:none;vertical-align:middle;margin-left:6px;'>"+args.row.data.estado+"</div>") 
                                    // .addClass('estado_pedido_'+args.row.data.idestado)); 				
                                // return true; 
                            // } 
                        // }  
				// }
			],
			rowStyleFormatter: function(args) {
				// console.log('args.$rows'); console.log(args.$rows);
				// if (args.dataRowIndex>-1)
					// args.$rows.attr('pedidoId',args.data.id);
			},
			loadingx: function (dataSource, userData) {
				// var fi=$('#tabs '+me.tabId+' .txtFechaI').val();
				// var ff=$('#tabs '+me.tabId+' .txtFechaF').val();
				// var fv = $('#tabs '+me.tabId+' .txtVencimiento').val();
				// var idproveedor = $('#tabs '+me.tabId+' .cmbProveedor').wijcombobox('option','selectedValue');
				// var idestado = $('#tabs '+me.tabId+' .cmbEstado').wijcombobox('option','selectedValue');
                // me.dataSource.proxy.options.data={idproveedor:idproveedor, idestado:idestado};
				
				// if ( !me.omitirFI) me.dataSource.proxy.options.data.fechai=fi;
				// if ( !me.omitirFF) me.dataSource.proxy.options.data.fechaf=ff;
				// if ( !me.omitirFV) me.dataSource.proxy.options.data.vencimiento=fv;
            },
			cellStyleFormatter: function(args) {
				if (args.column._originalDataKey=='fecha' || args.column._originalDataKey=='vencimiento'){
					args.$cell.addClass("colFecha");
				}
			}
		});
		
		var me=this;
		
		gridBusqueda.wijgrid({ selectionChanged: function (e, args) { 					
			var item=args.addedCells.item(0);
			var row=item.row();
			var data=row.data;			
			me.selected=data;			
		} });
		
		gridBusqueda.wijgrid({ loaded: function (e) { 
			$(me.tabId + ' .grid_busqueda tr').bind('dblclick', function (e) { 			
				// var pedidoId=$(e.currentTarget).attr('pedidoId');
				// if (pedidoId==undefined || pedidoId=='' || pedidoId==0) return false;				
				
				var pedidoId=me.selected.id;
				TabManager.add('/'+kore.modulo+'/'+me.controlador.nombre+'/editar','Editar '+me.catalogo.nombre,pedidoId);				
			});			
		} });
	};
};