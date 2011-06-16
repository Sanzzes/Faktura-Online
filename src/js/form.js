	$(document).ready(function() {
   		$('#client_form').dialog({autoOpen: false, width: 800, resizable: false})
   		$('#p_form').dialog({autoOpen: false, width: 600, resizable: false})
   		$('#per_form').dialog({autoOpen: false, width: 800, resizable: false})
   		$('#tat_form').dialog({autoOpen: false, width: 900, height: 600, resizable: false})
 	});
 	

 	
 	function edit_client(p_client_id)
 	{
 		$.ajax({
		   type: "POST",
		   url: "./src/procajax.php",
		   data: "ajax=get_client&clientID= "+p_client_id,
		   dataType: "json",
		   success: function(json){
				document.getElementsByName("clientno")[0].value = json.synetics_clients_clientno;
				document.getElementsByName("client")[0].value = json.synetics_clients_client;
				document.getElementById("clname").value = json.synetics_clients_name;
				document.getElementById("clsurname").value = json.synetics_clients_surname;
				document.getElementById("clstreet").value = json.synetics_clients_street;
				document.getElementById("clno").value = json.synetics_clients_no;
				document.getElementById("cltel").value = json.synetics_clients_tel;
				document.getElementById("clmobile").value = json.synetics_clients_mobile;
				document.getElementById("clmail").value = json.synetics_clients_mail;
				document.getElementById("clfax").value = json.synetics_clients_fax;
				document.getElementById("clzipcode").value = json.synetics_clients_zipcode;
				document.getElementById("clcity").value = json.synetics_clients_city;
				document.getElementsByName("submit_client")[0].value = "Ändern";
				document.getElementsByName("INTaction")[0].value = "2";
				$("#client_form").dialog("open");
		   }
		 });
 	}
 	 
 	function new_client()
 		{
				document.getElementsByName("submit_client")[0].value = "Eintragen";
				document.getElementsByName("INTaction")[0].value = "1";
				$("#client_form").dialog("open"); 
 		}
 			
 			
 	function del_client(p_client_id,client_name)
 		 	
 	{
 		 		
 		var confirm = window.confirm('Wirklich löschen?\n\n'+'Zu löschender Kunde:\nName:'+client_name); 	
 		if(confirm ==true) 		 				
 		{		 						 								
 			$.ajax({	
 				type: "post",	
 				url:'src/client_save.inc.php',
 				data: "clientno="+p_client_id+"&INTaction=3", 				 							
 				success: function()							 							
 				{ 							
 					alert("Kunde: " + client_name + ", wurde gelöscht"); 							
 					setTimeout("location.reload(true);",500); 							
 				}					 	
 			}); 		 				
 		} 		 			
 		else 		 			
 		{ 		 			
			alert("Vorgang abgebrochen"); 		 			
 		} 		 	
 	}
 	
 	 	function new_project(p_project_id)
 	{
			document.getElementsByName("projectname")[0].value = "";
			document.getElementsByName("drivecost")[0].value = "";
			document.getElementsByName("client")[0].value = "keiner";
			document.getElementsByName("projectlead")[0].value = "0";
			document.getElementsByName("clientcontact")[0].value = "";
			document.getElementsByName("client")[0].value = "";
			document.getElementsByName("description")[0].value = "";
			document.getElementsByName("cost")[0].value = "";
			document.getElementsByName("cost_rate")[0].value = "";
			document.getElementsByName("projectID")[0].value = "";
			document.getElementsByName("drivecost_rate")[0].value = "";
			document.getElementsByName("p_submit")[0].value = "Anlegen";
			document.getElementsByName("pAction")[0].value = "1";
			$("#p_form").fadeIn(1500).dialog("open");
 	}
 	
 	function edit_project(p_project_id)
 	{
 		$.ajax({
		   type: "POST",
		   url: "./src/procajax.php",
		   data: "ajax=get_project&projectID= "+p_project_id,
		   dataType: "json",
		   success: function(json){
				document.getElementsByName("projectname")[0].value = json.synetics_projects_projectname;
				document.getElementsByName("drivecost")[0].value = json.synetics_projects_drivecost;
				document.getElementsByName("client")[0].value = json.synetics_clients_synetics_clients_clientno;
				document.getElementsByName("projectlead")[0].value = json.synetics_projects_projecleader;
				document.getElementsByName("clientcontact")[0].value = json.synetics_projects_contactpersonclient;
				document.getElementsByName("client")[0].value = json.synetics_projects_client;
				document.getElementsByName("description")[0].value = json.synetics_projects_description;
				document.getElementsByName("cost")[0].value = json.synetics_projects_cost;
				document.getElementsByName("p_submit")[0].value = "Ändern";
				l_cr = document.getElementsByName("cost_rate");
				document.getElementsByName("projectID")[0].value = json.synetics_projects__ID;
				l_dcr = document.getElementsByName("drivecost_rate");
				document.getElementsByName("pAction")[0].value = "2";
				
				switch (json.synetics_projects_drivecostrate)
				{
				case "1":
				l_dcr[0].checked = true;
				break;
				case "2":
				l_dcr[1].checked = true;
				break;
				}
				
				switch (json.synetics_projects_costrate)
				{
				case "1":
				l_cr[0].checked = true;
				break;
				
				case "2":
				l_cr[1].checked = true;
				break;
				}
				$("#p_form").fadeIn(1500).dialog("open");
		   }
		 });
 	}
 	
 	function del_project(p_project_id,p_name,p_leiter)
	 	{
	 			var confirm = window.confirm('Wirklich löschen?\n\nProjektname: '+p_name+'\nProjektleiter: ' +p_leiter);
	 			if(confirm ==true)
	 				{
	 				
	 				
				$.ajax({
						type: "post",
						url:'src/p_save.inc.php',
						data: "projectID="+p_project_id+"&pAction=3",
						success: function()
							{ 
							alert("Projekt " + p_name + " wurde gelöscht");
							setTimeout("location.reload(true);",500);
							}
				 		});
	 				}
	 				else
	 				{
	 					alert("Vorgang abgebrochen");
	 				}
	 	}
	
 	 function new_personal(p_personal_id)
 	{
			document.getElementsByName("per_submit")[0].value = "Anlegen";
			document.getElementsByName("perAction")[0].value = "1";
			$("#per_form").fadeIn(1500).dialog("open");
 	}
 	
 	 	function edit_personal(p_personal_id)
 	{
 		$.ajax({
		   type: "POST",
		   url: "./src/procajax.php",
		   data: "ajax=get_personal&systemID= "+p_personal_id,
		   dataType: "json",
		   success: function(json){
				document.getElementsByName("name")[0].value = json.synetics_system_name;
				document.getElementsByName("surname")[0].value = json.synetics_system_surname;
				document.getElementById("street").value = json.synetics_system_street;
				document.getElementById("streetno").value = json.synetics_system_no;
				document.getElementById("tele").value = json.synetics_system_tele;
				document.getElementById("mobile").value = json.synetics_system_mobile;
				document.getElementById("mail").value = json.synetics_system_mail;
				document.getElementById("zipcode").value = json.synetics_system_zipcode;
				document.getElementById("city").value = json.synetics_system_city;
				document.getElementById("username").type = "hidden";
				document.getElementById("passwort").type = "hidden";
				document.getElementById("passwort_td").style.display = "none";
				document.getElementById("username_tr").style.display = "none";
				document.getElementsByName("systemID")[0].value = json.synetics_system__ID;
				document.getElementsByName("per_submit")[0].value = "Ändern";
				document.getElementsByName("perAction")[0].value = "2";
				$("#per_form").fadeIn(1500).dialog("open");
		   }
		 });
 	}
 	
 	function del_personal(p_personal_id,per_name,per_surname,sessionid)
 	{
			if(sessionid == p_personal_id){
			alert('Warnung:\n\nDu kannst dich nicht selber löschen');
			}
			else{
					var confirm = window.confirm('Wirklich löschen?\n\n'+'Zu löschende Person:\nName:'+per_name+'\nVorname:'+per_surname);
					if(confirm ==true)
						{
						
						
					$.ajax({
							type: "post",
							url:'src/per_save.inc.php',
							data: "systemID="+p_personal_id+"&perAction=3",
							success: function()
								{ 
								alert("Personal Mitarbeiter: " + per_name + ", wurde gelöscht");
								setTimeout("location.reload(true);",500);
								}
							});
						}
						else
						{
							alert("Vorgang abgebrochen");
						}
				}
 	}
 	
 	 	 function edit_workflow(tat_workflow_id)
 	{
 		 		$.ajax({
		   type: "POST",
		   url: "./src/procajax.php",
		   data: "ajax=get_workflow&workflowID= "+tat_workflow_id,
		   dataType: "json",
		   success: function(json){		   	
				$("#datepicker").val(json.synetics_data_date);
				$("#worker").val(json.synetics_data_system_id);
				$("#client").val(json.synetics_data_client);
				$("#workplace").val(json.synetics_data_city);
				$("#hinfahrt_1").val(json.synetics_data_outjourneyex);
				$("#hinfahrt_2").val(json.synetics_data_outjourneyto);
				$("#zeit_1").val(json.synetics_data_worktimefrom);
				$("#zeit_2").val(json.synetics_data_worktimeto);
				$("#pause_1").val(json.synetics_data_pause);
				$("#pause_2").val(json.synetics_data_wtpause);
				$("#rueckfahrt_1").val(json.synetics_data_returnjourneyex);
				$("#rueckfahrt_2").val(json.synetics_data_returnjourneyto);
				$("#wagen").val(json.synetics_data_whichcar);
				$("#hotelgarni").val(json.synetics_data_hotelgarni);
				$("#rechnungstext").val(json.synetics_data_text);
				$("#kilometer").val(json.synetics_data_km);
				$("#workflow_ID").val(json.synetics_data_ID);
				$("#tat_submit").val("Ändern");
				$("#workAction").val("2");
				$("#project").load("src/ajax/work.ajax.php",
							{
							ajax: "get_projekt",
							dID:   json.synetics_data_client,
							selected: json.synetics_data_projects_id
							});
				
				$("#tat_form").fadeIn(1500).dialog("open");

		   }
		 });
 	}
 	
 	 	  function new_workflow(tat_workflow_id)
 	{
                $("#worker").val(tat_workflow_id);
 		$("#tat_submit").val("Anlegen");
		$("#workAction").val("1");
		$("#tat_form").fadeIn(1500).dialog("open");
 	}
 	 	  
 	 	function del_workflow(tat_workflow_id,tat_date)
 	 	{
 	 			var confirm = window.confirm('Wirklich löschen?');
 	 			if(confirm ==true)
 	 				{
 	 				
 	 				
 				$.ajax({
 						type: "post",
 						url:'src/tat_save.inc.php',
 						data: "workflow_ID="+tat_workflow_id+"&workAction=3",
 						success: function()
 							{ 
 							alert("Tätigkeit vom " + tat_date + " wurde gelöscht");
 							setTimeout("location.reload(true);",500);
 							}
 				 		});
 	 				}
 	 				else
 	 				{
 	 					alert("Vorgang abgebrochen");
 	 				}
 	 	}
                
 	 	
 	 	function ustunden(ustunden_id_user)
 	 	{
 	 			$.ajax({
 						type: "post",
 						url:"src/ustunden.inc.php",
 						data: "userid="+ustunden_id_user,
 						success: function(ustundeng)
 							{ 
 							alert("--Überstundenrechner--\t\t\n\nDu hast:" +ustundeng );
 							}
 				 		});
 	 	}
 				 