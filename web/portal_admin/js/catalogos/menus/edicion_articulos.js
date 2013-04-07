
var EdicionArticulo=function (tabId){
		
	
	this.init=function(tabId, padre, articulos){									
		this.tmp_id=0;
		this.tabId=tabId;
		this.padre=padre;
		//this.configurarFormulario(tabId);	
		this.configurarGrid(tabId, articulos);		
		this.configurarToolbar(tabId);		
		return true;
				
		var me=this;
								
		this.configurarComboArticulo();
		$(me.tabId+' .frmEditInlinePedido .txtCantidad').wijinputnumber({
            type: 'numeric',           
            decimalPlaces: 2,
            showSpinner: true			
        });
				
		this.configurarComboUM();
		$(me.tabId+' .frmEditInlinePedido .txtExistencia').change(function(){
			me.calcularSugerencia();
		});
		
		$(me.tabId+' .frmEditInlinePedido .txtPedido').change(function(){
			me.calcularSugerencia();
		});		

		
	};
	this.calcularSugerencia=function(){
		var me=this;
		var reorden=parseInt( $(me.tabId+' .frmEditInlinePedido .txtPuntoReorden').val() );
		var existencia=parseInt( $(me.tabId+' .frmEditInlinePedido .txtExistencia').val() );
		var maximo=parseInt( $(me.tabId+' .frmEditInlinePedido .txtMaximo').val() );
		var sugerido=0;
		var pendiente=0;
		if (existencia<=reorden){
			sugerido = maximo-existencia;
			var pedido=$(me.tabId+' .frmEditInlinePedido .txtPedido').val();
			pendiente= sugerido - pedido;
		}
		$(me.tabId+' .frmEditInlinePedido .txtSugerido').val(sugerido);
		$(me.tabId+' .frmEditInlinePedido .txtPendiente').val(pendiente);
	};
	this.configurarComboArticulo=function(target){
		
		var tabId=this.tabId;
		 
		var fields=[			
			{name: 'presentacion'},
			{name: 'idarticulopre'},
			{name: 'codigo'},
			{name: 'existencia'},
			{name: 'minimo'},
			{name: 'maximo'},
			{name: 'puntoreorden'},
		{
			name: 'label',
			mapping: 'nombre'
		}, {
			name: 'value',
			mapping: 'id'
		}, {
			name: 'selected',
			defaultValue: false
		}];
		var me = this;
		var myReader = new wijarrayreader(fields);
		
		var proxy = new wijhttpproxy({
			url: '/'+kore.modulo+'/pedidoi/getArticulos',
			dataType:"json"			
		});
		
		var datasource = new wijdatasource({
			reader:  new wijarrayreader(fields),
			proxy: proxy,	
			loaded: function (data) {				
				// var val=$('#tabs '+tabId+' .txtFkAlmacen').val();
				// $.each(data.items, function(index, datos) {					
					// if (parseInt(val)==parseInt(datos.id) ){						
						// $('#tabs '+tabId+' .cmbAlmacen').wijcombobox({selectedIndex:index});
					// }
				// });				
			},
			loading: function (dataSource, userData) {                            				
				 
				 dataSource.proxy.options.data=dataSource.proxy.options.data || {};
				 dataSource.proxy.options.data.idalmacen = $('#tabs '+me.tabId+' .txtFkAlmacen').val();		
            }
		});
		
		// datasource.proxy.options.data={
			// id		:$(this.tabId+' .frmPedidoi .txtId').val(),
			// IdTmp	:$(this.tabId+' .frmPedidoi .txtIdTmp').val()
		// };
		
		// datasource.proxy.options.data={
			// id		:5,
			// IdTmp	:6
		// };
		
		datasource.reader.read= function (datasource) {
			var totalRows=datasource.data.totalRows;
			datasource.data = datasource.data.rows;
			datasource.data.totalRows = totalRows;
			myReader.read(datasource);
		};
		
		datasource.load();
		var me=this;
		var combo=$(target).wijcombobox({
			data: datasource,
			showTrigger: true,
			autoFilter: false,
			minLength: 1,
			animationOptions: {
				animated: "Drop",
				duration: 1000
			},
			forceSelectionText: false,
			search: function (e, obj) {
				//obj.datasrc.proxy.options.data.name_startsWith = obj.term.value;
			},
			select: function (e, item) 
			{		
				 
				var rowdom=$(me.tabId+' .grid_articulos tbody tr:eq('+me.selected.sectionRowIndex +')');				
				me.articulo=item;
				rowdom.find('td:eq(0) div').html(item.codigo);
				rowdom.find('td:eq(2) div').html(item.presentacion);
				rowdom.find('td:eq(3) div').html(item.maximo);
				rowdom.find('td:eq(4) div').html(item.minimo);
				rowdom.find('td:eq(5) div').html(item.puntoreorden);
				rowdom.find('td:eq(6) div').html(item.existencia);
				
				
				var reorden=parseInt( item.puntoreorden );
				var existencia=parseInt( item.existencia );
				var maximo=parseInt( item.maximo );
				var sugerido=0;
				var pendiente=0;
				if (existencia<=reorden){
					sugerido = maximo-existencia;					
				}
			
				rowdom.find('td:eq(7) div').html(sugerido);
				rowdom.find('td:eq(8) div').html(sugerido);
				rowdom.find('td:eq(9) div').html(0);
				me.articulo.pedido=sugerido;
				me.articulo.sugerido=sugerido;
				
				return true;
				
			}
		});
		combo.focus();
	}
	this.guardar=function(){
		
		//Obtener todos los datos del formulario inline, obtener el id_temp del pedido
		//Enviar datos al servidor
		//En la respuesta, refrescar el grid
			
		var datos={
			id			:$(this.tabId+' .frmEditInlinePedido .txtId').val(),
			id_tmp		:$(this.tabId+' .frmEditInlinePedido .txtIdTmp').val(),
			pedido		:$(this.tabId+' .frmEditInlinePedido .txtPedido').val(),
			IdTmp		: $(this.tabId+' .frmEditInlinePedido .txtIdTmp').val(),
			idarticulopre	:$(this.tabId+' .frmEditInlinePedido .txtIdArticuloPre').val(),
			//um			:$(this.tabId+' .frmEditInlinePedido .txtUm').val(),
			maximo		:$(this.tabId+' .frmEditInlinePedido .txtMaximo').val(),
			minimo		: $(this.tabId+' .frmEditInlinePedido .txtMinimo').val(),
			puntoreorden		: $(this.tabId+' .frmEditInlinePedido .txtPuntoReorden').val(),
			existencia		: $(this.tabId+' .frmEditInlinePedido .txtExistencia').val(),
			minimo		: $(this.tabId+' .frmEditInlinePedido .txtMinimo').val(),			
			idarticulopre	:$(this.tabId+' .frmEditInlinePedido .txtIdArticuloPre').val(),
			fk_articulo	:$(this.tabId+' .frmEditInlinePedido .txtFkArticulo').val(),
			fk_pedido	:$(this.tabId+' .frmPedidoi .txtId').val(),
			fk_tmp		:$(this.tabId+' .frmPedidoi .txtIdTmp').val()
		}
		
		var iActual=$(this.tabId+' .frmEditInlinePedido .txtDataItemIndex').val();
		
		var iActual=parseInt(iActual);
		
		var me=this;
		$.ajax({
			type: "POST",
			url: '/'+kore.modulo+'/pedidoi/guardarArticulo',
			data: {datos:datos}
		}).done(function( response ) {
									
			var resp = eval('(' + response + ')');
			var msg= (resp.msg)? resp.msg : '';
			var title;
			if ( resp.success == true	){				
				icon='/web/apps/fastorder/images/yes.png';
				title= 'Success';
				
				
				me.padre.editado=true;
				var siguiente=parseInt(iActual)+1;				
				if (siguiente>-1){					
					var data = $(me.tabId+" .grid_articulos").wijgrid("data");										
					var siguiente=parseInt(iActual)+1;
					if (data[siguiente] != undefined){
						me.selected=data[siguiente];
						me.selected.dataItemIndex=siguiente;						
						me.selected.editandoId=me.selected.id_tmp;
						me.editar();
					}else{
						me.selected=data[0];
						me.selected.dataItemIndex=0;						
						me.selected.editandoId=me.selected.id_tmp;
						me.editar();
					}
				}else{
					$(me.tabId+' .frmEditInlinePedido').css('visibility','hidden');								
				}
				$(me.tabId+' .grid_articulos').wijgrid('ensureControl', true);				
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
	},
	this.configurarGrid=function(tabId, articulos){
		// var fields=[			
			// { name: "codigo"},			
			// { name: "nombre"},
			// { name: "presentacion"},
			// { name: "maximo"},
			// { name: "minimo"},
			// { name: "puntoreorden"},
			// { name: "almacen"},			
			// { name: "existencia"},
			// { name: "nombreGpo"},
			// { name: "grupoposicion"},
			// { name: "sugerido"},
			// { name: "pedido"},
			// { name: "pendiente"},			
			// { name: "fk_articulo"},		 
			// { name: "idarticulopre"},
			// { name: "eliminado",default:false},
			// { name: "id"  },
			// { name: "origen"  },
			// { name: "fk_producto"  },
			// { name: "pedidoi"  }						
		// ];
		
		var fields=[			
			{ name: "id"},			
			{ name: "nombre"}
		];
		this.fields=fields;
		// var rec={};
		
		// $.each( fields, function(indexInArray, valueOfElement){
			// var campo=valueOfElement.name;
			// rec[campo]='';
		
		// } );
		// this.rec=rec;		
		
		var gridPedidos=$('#tabs '+tabId+" .grid_articulos");				
		
		var me=this;
		gridPedidos.bind('keydown', function(e) {		
			var code = e.keyCode || e.which;
			code=parseInt(code);	
			
			// alert(e.keyCode);
			if(e.keyCode==46){
				me.eliminar();
			}else if(e.keyCode==13){	
				//Saltar al siguiente registro
				me.navegarEnter(true);			 
			}else if(e.keyCode==9  && e.shiftKey){	
				e.preventDefault();								
				me.seleccionarSiguiente(true);				
			}else if(e.keyCode==9 ){
				e.preventDefault();
				me.seleccionarSiguiente();
			}
		});
		var formatMoney='n'+kore.decimalPlacesMoney;
		gridPedidos.wijgrid({
			allowColSizing:true,
			allowPaging: true,
			pageSize:9,
			allowEditing:true,
			allowColMoving: false,
			allowKeyboardNavigation:true,
			selectionMode:'singleRow',
			data:articulos,
			groupText:function(e,args){
				console.log("args"); console.log(args); 
				// var obj=$.parseJSON(args.groupText);
				 // Tuve que modificar wijmo para lograr esto.
				 // console.log("obj"); console.log(obj);
				// if (obj && obj.nombre) {
					// gridPedidos.wijgrid('option','tmpText', obj.nombre);
				// }else{
					// gridPedidos.wijgrid('option','tmpText', '');
				// }
				
				// args.groupText='aaaa';
				// args.text='bbbbb'
				// return true;
			},
			groupAggregate: function (e, args) { 
						 console.log("args groupAggregate"); console.log( args);					
						// console.log("args.column.dataKey"); console.log(args.column.dataKey);
					switch( args.column.dataKey ){					
						 
						case 'maximo_pi':							
							// alert(  args.data[args.groupingStart][args.column.dataIndex].value );
							 // var data=gridPedidos.wijgrid('data');							
							// if ( args.text=data[args.column.dataIndex-1]==undefined)return ;							
							// args.text=data[args.column.dataIndex-1].maximo;
							 args.text=args.data[args.groupingStart][5].value;
						break;
						case 'minimo_pi':
							// var data=gridPedidos.wijgrid('data');							
							// if ( args.text=data[args.column.dataIndex-1]==undefined)return ;							
							// args.text=data[args.column.dataIndex -1].minimo;
							// args.text=args.data[4].puntoreorden;
							args.text=args.data[args.groupingStart][6].value;
						break;
						case 'reorden_pi':
							// var data=gridPedidos.wijgrid('data');							
							// console.log("data dataIndex: " + args.column.dataIndex); console.log(data);
							// if ( args.text=data[args.column.dataIndex-1]!=undefined){
								// args.text=data[args.column.dataIndex-1].puntoreorden;
							// }							
							// args.text= args.data[args.groupingStart][5]
							args.text=args.data[args.groupingStart][7].value;
						break;
						case 'inicial_pi':
							args.text=args.data[args.groupingStart][8].value;
						break;
					}
					// conso
					// data[args.column.dataIndex].maximo
					// console.log("data"); console.log(data);
					
				 },
			columns: [
				
				{  dataKey: "nombreGpo", groupInfo:{
					 position: "header", 
					outlineMode: "startExpanded", 
					headerText: "custom"
				},visible:false },			
				{dataKey: "producto", headerText: "Art&iacute;culo",width:"300px",cellFormatter: function(args) { args.formattedValue='';},
					groupInfo:{
						position: "header", 
						outlineMode: "startExpanded", 
						headerText: "{0}",					  
						groupSingleRow: true
				},visible:false, editable:false, aggregate:'custom'},
				{dataKey: "codigo", visible:false, headerText: "Codigo",width:"300px",aggregate:'custom', editable:false, cellFormatter: function(args) { args.formattedValue='';}},
				{dataKey: "producto_pi", headerText: "Origen", aggregate:'custom', editable:false},
				{dataKey: "almacen_pi", headerText: "Almacen", aggregate:'custom', editable:false, },
				{dataKey: "maximo",  visible:false, headerText: "M&aacute;ximo",editable:false, dataType: "number", dataFormatString: formatMoney, aggregate: "average"},
				{dataKey: "minimo",  visible:false, headerText: "M&iacute;nimo",editable:false, dataType: "number", dataFormatString: formatMoney, aggregate: "average"},
				{dataKey: "puntoreorden",visible:false,  headerText: "Reorden",editable:false, dataType: "number", dataFormatString: formatMoney, aggregate: "average"},
				{dataKey: "existencia",visible:false , headerText: "Existencia", dataType: "number", dataFormatString: formatMoney,  aggregate: "average"},
				{dataKey: "maximo_pi",  visible:true, headerText: "M&aacute;ximo",editable:false, dataType: "number", dataFormatString: formatMoney, aggregate: "custom"},				
				{dataKey: "minimo_pi",  visible:true, headerText: "Minimo",editable:false, dataType: "number", dataFormatString: formatMoney, aggregate: "custom"},
				{dataKey: "reorden_pi",  visible:true, headerText: "Reorden",editable:false, dataType: "number", dataFormatString: formatMoney, aggregate: "custom"},
				{dataKey: "inicial_pi", headerText: "Existencia", dataType: "number", dataFormatString: formatMoney,  aggregate: "custom"},
				{dataKey: "sugerido_pi", headerText: "Sugerido"},
				{dataKey: "cantidad_pi", headerText: "Ped. Int.", dataType: "number", dataFormatString: formatMoney,  aggregate: "sum"},
				{dataKey: "cantidad", headerText: "Ordenado", dataType: "number", dataFormatString: formatMoney,  aggregate: "sum"},
				
				{dataKey: "productoJson",visible:true,width:'1%'},				
				{dataKey: "idproducto",visible:false},				
				{dataKey: "idalmacen_pi",visible:false},
				{dataKey: "id", visible:false, headerText: "ID" },
				{dataKey: "pro_pi", visible:false }
				// {dataKey: "codigo", headerText: "Codigo",width:"300px"},
				// {  dataKey: "nombreGpo", groupInfo:{
					 // position: "header", 
					// outlineMode: "startExpanded", 
					// headerText: "{0}"
				// },visible:false },			
				// {dataKey: "nombre", headerText: "Art&iacute;culo",width:"300px",groupInfo:{
					// position: "header", 
					// outlineMode: "startExpanded", 
					 // headerText: "{0}",
					 // groupSingleRow: true
				// }},
				// {dataKey: "fk_articulo", headerText: "fk_articulo",visible:false},				
				// {dataKey: "almacen", headerText: "Almacen",editable:false},
				// {dataKey: "origen", headerText: "Origen",width:"100px",editable:false},
				// {dataKey: "presentacion", headerText: "Presentacion", editable:false},
				// {dataKey: "maximo",  visible:true, headerText: "M&aacute;ximo",editable:false, dataType: "number", dataFormatString: formatMoney, aggregate: "sum"},
				// {dataKey: "minimo",  visible:true, headerText: "M&iacute;nimo",editable:false, dataType: "number", dataFormatString: formatMoney, aggregate: "sum"},
				// {dataKey: "puntoreorden",visible:true,  headerText: "Reorden",editable:false, dataType: "number", dataFormatString: formatMoney, aggregate: "sum"},
				// {dataKey: "existencia", headerText: "I. Inicial", dataType: "number", dataFormatString: formatMoney,  aggregate: "sum"},
				// {dataKey: "pedidoi", headerText: "Pedido I",editable:false,  dataType: "number", dataFormatString: formatMoney, aggregate: "sum"},
				// {dataKey: "sugerido", headerText: "Sugerido",editable:false,cellFormatter: function (args) {
					// if (args.row.type & $.wijmo.wijgrid.rowType.data) {
						// var sugerido=0;
						
						// var existencia = args.row.data.existencia - args.row.data.pedidoi;
						
						// if ( parseInt(args.row.data.puntoreorden) > existencia ){														
							// sugerido = args.row.data.maximo-existencia;
							// args.row.data.pendiente=sugerido - args.row.data.pedido;
						// }else{							
							// args.row.data.pendiente=0;
						// }
						// sugerido=sugerido.toFixed( kore.decimalPlacesMoney );
						// args.row.data.sugerido=sugerido;
						// args.$container
							// .css("text-align", "right")
							// .empty()
							// .append(args.row.data.sugerido);
						// return true;
					// }
				// }, dataType: "number", dataFormatString: formatMoney,aggregate: "sum"},				
				// {dataKey: "pedido", headerText: "Pedido",  dataType: "number", dataFormatString: formatMoney, aggregate: "sum" },
				// {dataKey: "pendiente", headerText: "Pendiente",editable:false, dataType: "number", dataFormatString: formatMoney,aggregate: "sum"},
				// {dataKey: "id", visible:false, headerText: "ID" },				
				// {dataKey: "fk_orden_compra", headerText: "fk_orden_compra", visible:false},
				// {dataKey: "cantidad", headerText: "cantidad", visible:false},
				// {dataKey: "idarticulopre", headerText: "idarticulopre", visible:false},				
				// {visible:false,dataKey: "grupoposicion"},
				// {dataKey: "fk_producto_origen", headerText: "fk_producto", visible:false},
				// {dataKey: "fk_pedido_detalle", headerText: "fk_pedido_detalle", visible:false},
				// {dataKey: "fk_almacen", headerText: "fk_almacen", visible:false},
				// {dataKey: "producto", headerText: "producto", visible:false},
			],
			rowStyleFormatter: function(args) {
				if (args.dataRowIndex>-1)
					args.$rows.attr('rowId',args.data.id_tmp);
			},
			cellStyleFormatter: function(args) {
				 if (args.column._originalDataKey=='fecha'){
					 args.$cell.addClass("colFecha");
				 }
			}
		});
		var me=this;
		
		gridPedidos.wijgrid({ groupText: function (e, args) { 
			// console.log("args); console.log(args);
			
		}} );
		
		gridPedidos.wijgrid({ beforeGroupEdit: function(e, args) { //agregada al nucleo de Wijmo el 11-03-2013		
			
			var input=$("<input style='text-align:right;' />");			
				input.val(args.target.innerText) 
				.appendTo( $(args.target ).empty() ); 				
				
			 
				
			jQuery.data( input, 'celda', args.target )				
			input.focus();
			
			input.bind('change',function(){
				alert('change');
			});
			
			input.bind('blur',function(){
				// alert('blur');
				var input=$(this);				
				
				
				// celda=jQuery.data(this,'celda');					
				 var div=$('<div class="swijmo-wijgrid-innercell">'+input.val()+'</div>');									
				// input.remove();
				
				 div.appendTo( input.parent().empty() );
							
				
			});
		}});
		
		gridPedidos.wijgrid({ beforeCellEditX: function(e, args) {
				var row = args.cell.row();								
				var index = args.cell.rowIndex();				
				
				var column=args.cell.column();
				
				if (column.editable === false){
								
					
					return false;
				}
				
				var sel=gridPedidos.wijgrid('selection');				
				sel.addRows(index);				

				switch (args.cell.column().dataKey) { 					
					case "codigo": 
						var combo=
						$("<input />")
							.val(args.cell.value()) 
							.appendTo(args.cell.container().empty());   
						args.handled = true;   
						
						var domCel = args.cell.tableCell();
						combo.css('width',	$(domCel).width()-10 );
						combo.css('height',	$(domCel).height()-10 );
						
						me.configurarComboCodigo(combo);
					break;
					case "nombre": 
						var combo=
						$("<input />")
							.val(args.cell.value()) 
							.appendTo(args.cell.container().empty());   
						args.handled = true;   
						
						var domCel = args.cell.tableCell();
						combo.css('width',	$(domCel).width()-10 );
						combo.css('height',	$(domCel).height()-10 );
						
						me.configurarComboArticulo(combo);
					break;
					default:
						var input=$("<input />")
							.val(args.cell.value())
							.appendTo(args.cell.container().empty()).focus().select();
						args.handled = true;
						
						var domCel = args.cell.tableCell();
						input.css('width',	$(domCel).width()  -10 );
						input.css('height',	$(domCel).height() -10 );
						
						
					break;						
				} 
			}
		});
		gridPedidos.wijgrid({beforeCellUpdateX:function(e, args) {
				switch (args.cell.column().dataKey) {
					case "nombre":
						args.value = args.cell.container().find("input").val();
						
						if (me.articulo!=undefined){
							var row=args.cell.row();
							row.data.presentacion=me.articulo.presentacion;
							row.data.fk_articulo=me.articulo.value;
							row.data.codigo=me.articulo.codigo;
							row.data.maximo=me.articulo.maximo;
							row.data.minimo=me.articulo.minimo;
							row.data.puntoreorden=me.articulo.puntoreorden;
							row.data.existencia=me.articulo.existencia;
							row.data.sugerido=me.articulo.sugerido;
							row.data.pedido=me.articulo.pedido;
							row.data.pendiente=me.articulo.pendiente;
							row.data.nombreGpo=me.articulo.grupo;		
							// gridPedidos.wijgrid('ensureControl');
						}
						break;
					case "codigo":
						args.value = args.cell.container().find("input").val();
						if (me.articulo!=undefined){
							var row=args.cell.row();
							row.data.presentacion=me.articulo.presentacion;
							row.data.nombre=me.articulo.nombre;
							row.data.fk_articulo=me.articulo.value;
							row.data.maximo=me.articulo.maximo;
							row.data.minimo=me.articulo.minimo;
							row.data.puntoreorden=me.articulo.puntoreorden;
							row.data.existencia=me.articulo.existencia;
							row.data.sugerido=me.articulo.sugerido;
							row.data.pedido=me.articulo.pedido;
							row.data.pendiente=me.articulo.pendiente;							
							row.data.nombreGpo=me.articulo.grupo;
							gridPedidos.wijgrid('ensureControl',true);
							
						}
						break;
					case "existencia":
						args.value=args.cell.container().find("input").val();						
						var row=args.cell.row();
						
						if (args.value <= row.data.puntoreorden){
							row.data.sugerido = row.data.maximo - args.value;
							row.data.pendiente=row.data.sugerido-row.data.pedido
						}else{
							row.data.sugerido = 0;
							row.data.pendiente=row.data.sugerido;
						}
						$(row.$rows).find('td:eq(7) div').html(row.data.sugerido);
						$(row.$rows).find('td:eq(9) div').html(row.data.pendiente);
						
						// var gridPedidos=$('#tabs '+tabId+" .grid_articulos");						
						break;
				}
				me.articulo=undefined;
			}
		});
		
		$(me.tabId+' .grid_articulos').wijgrid({ afterCellUpdateX: function (e, args) {
			$(me.tabId+' .grid_articulos').wijgrid('doRefresh');
		} });
		
		gridPedidos.wijgrid({cancelEdit:function(){
				// $(me.tabId+' .grid_articulos').wijgrid('ensureControl',true);
				$(me.tabId+' .grid_articulos').wijgrid('doRefresh');
			}
		});
		
		gridPedidos.wijgrid({ selectionChanged: function (e, args) {
			// alert('selectionChanged');
			var item=args.addedCells.item(0);
			var row=item.row();
			var data=row.data;
			me.selected=data;
			me.selected.dataItemIndex=row.dataItemIndex;
			me.selected.sectionRowIndex=row.sectionRowIndex;
			
		} });
		
		//corregir bug al expandir/colapsar
		gridPedidos.click(function(){
			
                if($(this).hasClass("ui-icon-triangle-1-e"))
                {
				   gridPedidos.wijgrid('endEdit');
					var selectionObj = gridPedidos.wijgrid("selection");
				   selectionObj.clear();
                   gridPedidos.wijgrid('doRefresh');
				   
                }
				
                else if($(this).hasClass("ui-icon-triangle-1-se"))
                {
					gridPedidos.wijgrid('endEdit');
					var selectionObj = gridPedidos.wijgrid("selection");
					selectionObj.clear();
                   gridPedidos.wijgrid('doRefresh');                   
                }
            });	
		this.numCols=$(tabId+' .grid_articulos thead th').length;
		
		gridPedidos.find('td').bind('mousedown',function(e){ 
			// alert("editar");
		});
	};
	
	this.configurarFormulario=function(tabId){
		 // $(tabId+" .txtCantidad").wijinputnumber( 
        // {
            // type: 'numeric',
            // minValue: -100,
            // maxValue: 1000,
            // decimalPlaces: 4,
            // showSpinner: true
        // });		
		// this.configurarComboArticulos(tabId);
		// this.configurarComboUM(tabId);
	};
	this.eliminar=function(){
		
		var cellInfo= $(this.tabId+" .grid_articulos").wijgrid("currentCell");
		var row = cellInfo.row();
		var container=cellInfo.container();
		$(this.tabId+" .grid_articulos 	tbody tr:eq("+cellInfo.rowIndex()+")").addClass('eliminado');		
		row.data.eliminado=true;
		
	}
	this.navegarEnter=function(){		
		this.seleccionarSiguiente(false, true, true);		
	}
	this.seleccionarSiguiente = function(alreves, saltar,mantenerColumna){
		//dos direcciones, hacia atras y hacia adelante.
		//de la ultima caja editable de la fila, pasa a la siguiente fila.
		//si se esta navegando alreves, del primer registro editable, pasa al registro anterior.
		//si no hay otra fila, agrega un nuevo elemento.
		//si est� ubicado en el ultimo elemento de la pagina, pasar a la pagina siguiente .
		//si est� nvegando alrev�s, y est� ubicado en el primer elemento de la pagina, pasar a la pagina anterior.
		
		//Obtengo la celda seleccionada
		var tabId, cellInfo, cellIndex, rowIndex,  row, nextCell, nextRow; 
		tabId=this.tabId;
		cellInfo= $(tabId+" .grid_articulos").wijgrid("currentCell");
		
		var direccion=	(alreves)? -1 : 1;
		cellIndex=cellInfo.cellIndex();
		rowIndex = cellInfo.rowIndex();
		nextRow=rowIndex;
		nextCell = cellIndex + direccion;
		
		
		if (saltar){
			nextCell=(alreves)? -1 : this.numCols + 1			
		}
		
		
		
		
		if ( nextCell<0 ){
			//ir al registro anterior, cambiar de pagina
			row=cellInfo.row();
			var data = $(tabId+" .grid_articulos").wijgrid('data');
			var pageSize = $(tabId+" .grid_articulos").wijgrid('option','pageSize');
			var pageIndex = $(tabId+" .grid_articulos").wijgrid('option','pageIndex');
			
			dataItemIndex = row.dataItemIndex;
			var fi= (pageSize * pageIndex);
						
			if ( dataItemIndex == fi){
				if (pageIndex==0){
					return false;
				}
				$(tabId+" .grid_articulos").wijgrid('option','pageIndex',pageIndex-1);
				nextCell=0;
				nextRow=pageSize*2;
			}
			
			nextCell=this.numCols-1;
			nextRow	= nextRow - 1;
			
			var cell;

			if (nextCell>-1 && nextRow>-1){
				while (true)
				 {
					cell = $(tabId+" .grid_articulos").wijgrid('currentCell',nextCell, nextRow);
					if (cell.column == undefined ){
						nextRow--;
					}else{					
						break;
					}
				}			
			}else{
				return false;
			}
		} else if ( nextCell>=this.numCols || saltar){
			nextCell=0;
			if (mantenerColumna){
				// alert(' mantenerColumna: '+ cellIndex);
				nextCell=cellIndex;
			}
			//ir al registro siguiente, cambiar de pagina o agregar nuevo registro,
			row=cellInfo.row();			
			var data = $(tabId+" .grid_articulos").wijgrid('data');			 
			var pageSize = $(tabId+" .grid_articulos").wijgrid('option','pageSize');
			var pageIndex = $(tabId+" .grid_articulos").wijgrid('option','pageIndex');			 
			//voy a ver si es el ultimo registro de la pagina
			dataItemIndex = row.dataItemIndex;
			var ip= (pageSize * (pageIndex+1) )-1;
			// var index = collection.indexOf(0, 0);			
			// alert(index);
			
			//alert("pageSize: "+pageSize+" pageIndex:" + pageIndex + " dataItemIndex: " + dataItemIndex + ' ip:' + ip);
			
			if ( (dataItemIndex+1) == data.length ){
				//esta en el ultimo registro de la ultima pagina
				//agregar nuevo, si esta al final de la pagina, despues de agregar registro, mover a la siguiente pagina
				
				//
				var rec={};		
				$.each( this.fields, function(indexInArray, valueOfElement){
					var campo=valueOfElement.name;
					rec[campo]='';
				
				} );
				data.push(rec);
				//
				
				$(tabId+" .grid_articulos").wijgrid("ensureControl", true);
				$(tabId+" .grid_articulos").wijgrid('option','pageIndex',pageIndex+1);			 								
			}else if ( ip==dataItemIndex ){
				//esta al final de la pagina, cambiar de p�gina				
				nextCell=0;
				nextRow=-1;				
				$(tabId+" .grid_articulos").wijgrid('option','pageIndex',pageIndex+1);			 
				
			}
						
			nextRow	= nextRow + 1;			
			var cell;
			
			while (true)
			 {
				cell = $(tabId+" .grid_articulos").wijgrid('currentCell',nextCell, nextRow);
				if (cell.column == undefined ){
					nextRow++;
				}else{						
					break;
				}
			}
			
		}
		
		
		var nuevo = $(tabId+" .grid_articulos").wijgrid("currentCell",nextCell, nextRow);
		
		if ( nuevo.column().editable===false ){
			this.seleccionarSiguiente(alreves);
		}else{			
			$(tabId+' .grid_articulos').wijgrid('doRefresh');
			$(tabId+" .grid_articulos").wijgrid("beginEdit");
			
		}
		
		
		
	};
	this.configurarComboCodigo=function(target){		
		var tabId=this.tabId;
		var me=this;
		var fields=[			
			{name: 'presentacion'},
			{name: 'idarticulopre'},
			{name: 'nombre'},
			{name: 'existencia'},
			{name: 'minimo'},
			{name: 'maximo'},
			{name: 'grupo'},
			{name: 'puntoreorden'},
		{
			name: 'label',
			mapping: 'codigo'
		}, {
			name: 'value',
			mapping: 'id'
		}, {
			name: 'selected',
			defaultValue: false
		}];
		
		var myReader = new wijarrayreader(fields);
		
		var proxy = new wijhttpproxy({
			url: '/'+kore.modulo+'/pedidoi/getCodigos',
			dataType:"json"			
		});
		
		var datasource = new wijdatasource({
			reader:  new wijarrayreader(fields),
			proxy: proxy,
			loaded: function (data) {	
							
			},
			loading: function (dataSource, userData) {                            				
				 
				 dataSource.proxy.options.data=dataSource.proxy.options.data || {};
				 dataSource.proxy.options.data.idalmacen = $('#tabs '+me.tabId+' .txtFkAlmacen').val();		
            }
		});
		
		datasource.reader.read= function (datasource) {			
			var totalRows=datasource.data.totalRows;			
			datasource.data = datasource.data.rows;
			datasource.data.totalRows = totalRows;
			myReader.read(datasource);
		};			
		
		datasource.load();	
		
		var combo=target.wijcombobox({
			data: datasource,
			showTrigger: true,
			minLength: 1,
			forceSelectionText: false,
			autoFilter: true,
			// animationOptions: {
				// animated: "Drop",
				// duration: 1000
			// },
			
			search: function (e, obj) {
				
			},
			select: function (e, item) 
			{			
				var rowdom=$(me.tabId+' .grid_articulos tbody tr:eq('+me.selected.sectionRowIndex +')');				
				me.articulo=item;
				
				rowdom.find('td:eq(1) div').html(item.nombre);
				rowdom.find('td:eq(2) div').html(item.presentacion);
				rowdom.find('td:eq(3) div').html(item.maximo);
				rowdom.find('td:eq(4) div').html(item.minimo);
				rowdom.find('td:eq(5) div').html(item.puntoreorden);
				rowdom.find('td:eq(6) div').html(item.existencia);
				
				
				var reorden=parseInt( item.puntoreorden );
				var existencia=parseInt( item.existencia );
				var maximo=parseInt( item.maximo );
				var sugerido=0;
				var pendiente=0;
				if (existencia<=reorden){
					sugerido = maximo-existencia;					
				}
			
				rowdom.find('td:eq(7) div').html(sugerido);
				rowdom.find('td:eq(8) div').html(sugerido);
				rowdom.find('td:eq(9) div').html(0);
				me.articulo.pedido=sugerido;
				me.articulo.sugerido=sugerido;
				
				return true;
			}
		});
		combo.focus();			
	};
	
	
	this.nuevo=function(){	
		var rec={};
		
		$.each( this.fields, function(indexInArray, valueOfElement){
			var campo=valueOfElement.name;
			rec[campo]='';
		
		} );
		
		var nuevo=new Array(rec);
		
		var tabId=this.padre.tabId;
		var data= $(tabId+" .grid_articulos").wijgrid('data');									
		this.tmp_id++;
		nuevo[0].tmp_id=this.tmp_id;
		var array3 = nuevo.concat(data); // Merges both arrays
		data.length=0;
		for(var i=0; i<array3.length; i++){
			data.push( array3[i] );
		}

		//data.slice([]);
		
		$(tabId+" .grid_articulos").wijgrid("ensureControl", true);
		$(tabId+" .grid_articulos").wijgrid('option','pageIndex',0);			 
		nuevo = $(tabId+" .grid_articulos").wijgrid("currentCell", 0, 0);
		$(tabId+" .grid_articulos").wijgrid("beginEdit");
		
	};
	
	
	
	this.configurarToolbar=function(tabId){
		var me=this;
		
		$(this.tabId+ ' .btnAgregar').click(function(){		
			
			me.nuevo();
			
		});
	}
}