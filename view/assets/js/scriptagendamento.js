;(function(){
	window.onload=function(){

	
			function gethorarios(destino,funct,typed){
					xhr=new XMLHttpRequest()
					urlenvio=destino
					xhr.open("GET",urlenvio)
					xhr.setRequestHeader("Contenty-Type","application/json")
					
					xhr.onreadystatechange=function(){
						if(xhr.readyState==4 && xhr.status==200){
							var dataget=xhr.responseText
						var 	datagetj=JSON.parse(dataget)
							funct(datagetj,typed)	
						}
					}
					xhr.send()

				}
				var select=document.querySelector("#selecthorario")
				var idservice=document.querySelector("#idservice").value
				
					



				function getsend(destino,data,funct2){
					xhr=new XMLHttpRequest()
					urlenvio=destino
					xhr.open("POST",urlenvio)
					xhr.setRequestHeader("Contenty-Type","application/json")
					xhr.send(data)

					xhr.onreadystatechange=function(){
						if(xhr.readyState==4 && xhr.status==200){
							var dataget2=xhr.responseText
							// datagetj2=JSON.parse(dataget2)
							funct2(dataget2)	
						}
					}
					

				}

				var iduser2=document.getElementById("iduser")

					var idus={
					"idcli":iduser2.value
				}
				var idusj = JSON.stringify(idus)
				if(!idservice){
				getsend("/testepraticodsin/App/api/listoneag.php",idusj,valoresaglist)	
				}
				

				if(idservice){
							var searchvaluej=makevalue()
						function makevalue(){
								var searchvalue={
								"id":idservice
								}
							return JSON.stringify(searchvalue)

						}

						var searchvaluej=makevalue()
						
						getsend("/testepraticodsin/App/api/listoneservice.php",searchvaluej,demonstraservice)
						
						var priceserviceli=document.querySelector("#priceserviceli")
						var horarioserviceli=document.querySelector("#horarioserviceli")
						var descriptionli=document.querySelector(".descriptionli")
						function demonstraservice(dice){
						
							var dicej=JSON.parse(dice)
							
							descriptionli.querySelector("p").textContent="Descrição : "+dicej[0].descricao
							priceserviceli.querySelector("p").textContent="Preço R$"+dicej[0].preco
							horarioserviceli.querySelector("p").textContent="Horario estimado : "+dicej[0].horarioest
							gethorarios("/testepraticodsin/App/api/listhorarios.php",createoption,dicej[0].serviceid)
						}	
				}

				var typeservag	
				function createoption(dataj,type){

					 typeservag=type
					for(i=0; i<dataj.length; i++){
						if(dataj[i].typeservices==type){
							var selectc=document.createElement("option")
							selectc.value=dataj[i].horario
							selectc.textContent=dataj[i].horario
							select.appendChild(selectc)	
						}
					}
					getsend("/testepraticodsin/App/api/listoneag.php",idusj,valoresaglist)

					
				}
					var timefedh
				function feedbackhorario(textfh,typeal){
					var alsth=document.getElementById("alertastatushorario")
					alsth.style.display="block"
					alsth.textContent=textfh
					if(typeal==0){
						alsth.style.backgroundColor="rgb(194, 68, 56)"
						alsth.style.color="white"
					}else if(typeal==1){
						alsth.style.backgroundColor="rgb(144, 238, 144)"
						alsth.style.color="black"
					}
					if(timefedh){
						clearTimeout(timefedh)
					}
					timefedh=setTimeout(removefeedbackh,4000)
				}

				function removefeedbackh(){
					var alsth=document.getElementById("alertastatushorario")
					alsth.style.display="none"
				}

				

			var horariocerto=false
			var datacerta=false
			var verifiedh=false


				function bollh(data){
					
					if(data=="1200"){
						verifiedh=true
						if(verifiedh){
						horariocerto=true

						feedbackhorario("Horario ok Se possivel agende os serviços para a mesma semana",1)
							if(datacerta && horariocerto){
								agdbtn.disabled=false									
						}
					}
					return
					}
					if(data==200){
						verifiedh=true
						if(verifiedh){
						horariocerto=true
						}
					}else{
						 verifiedh=false
						 horariocerto=false
						feedbackhorario("Horario Indisponivel",0)
					}
					

					if(datacerta && horariocerto){
					agdbtn.disabled=false
					feedbackhorario("Horario Disponivel",1)
					}
					
				}

			var dadosdatahjsf
			var selecthorario=document.getElementById("selecthorario")
			var dataagendam=document.getElementById("dataagendam")
			var iduser=document.getElementById("iduser")
			var data= new Date()
				var day=data.getDate()
				var year=data.getFullYear()
				var month=data.getMonth()+1
				var semana=data.getDay()+1
				var dataarr			

				dataagendam.addEventListener("change",function(){
					datacerta=false
					agdbtn.disabled=true
					selecthorario.value=""
				})

			selecthorario.addEventListener("change",function(event){

				if(dataagendam.value != "" && event.target.value != ""){

					dataarr=dataagendam.value.split("-")
				
				
				
					if(parseInt(dataarr[0]) > year ){
						datacerta=true
					}else if(parseInt(dataarr[0])== year && parseInt(dataarr[1]) > month ){
						datacerta=true
					}else if(parseInt(dataarr[1])== month 
						&& parseInt(dataarr[2]) >= day ){
						datacerta=true
					}else{
						datacerta=false
						feedbackhorario("Data invalida",0)
						dataagendam.value=""
						agdbtn.disabled=true
						event.target.value=""
					}
				}else{
					event.target.value=""
					agdbtn.disabled=true
					feedbackhorario("Selecione uma Data",0)
				}
				
				
				if(datacerta){

					var dadosdatah={
						"hora":event.target.value,
						"data":dataarr[2]+"/"+dataarr[1]+"/"+dataarr[0],
						"types":typeservag
					}
					dadosdatahjsf=JSON.stringify(dadosdatah)
					
					  getsend("/testepraticodsin/App/api/listag.php",dadosdatahjsf,bollh)
				}
				
			})	

			function verifyagenda(data){
				if(data=="200"){
					feedbackhorario("Agendamento realizado com sucesso",1)
					getsend("/testepraticodsin/App/api/listoneag.php",idusj,valoresaglist)
					agdbtn.disabled=true
				datacerta=false
				horariocerto=false
				}
								
			}

			var agdbtn=document.querySelector("#buttonagd")
				agdbtn.disabled=true
				agdbtn.addEventListener("click",function(event){
					event.preventDefault()
					if(datacerta && horariocerto){
							
						var objdadosform={
							"servicetype":idservice,
							"idclient":iduser.value,
							"dataagi":dataarr[2]+"/"+dataarr[1]+"/"+dataarr[0],
							"semana":semana,
							"horario":selecthorario.value
						}
						var objdadosformjsf=JSON.stringify(objdadosform)
						
						getsend("/testepraticodsin/App/api/insertag.php",objdadosformjsf,verifyagenda)


					}
					
				})





				var idagendamento=""
				var hag=document.getElementById("historicoagendamentos")
				function valoresaglist(vdata){
					var ulag=document.querySelector(".list_agendados")
					if(vdata==200)return
					vdataj=JSON.parse(vdata)
					hag.innerHTML=""
					vdataj.forEach(function(elev){
						
						ncardag=ulag.cloneNode(true)
						ncardag.querySelector(".textag1").textContent=elev.descricao
						ncardag.querySelector(".textag2").textContent="Preço R$:"+elev.preco
						ncardag.querySelector(".textag3").textContent=
						"Data : "+elev.dataagendamento.substring(0,2)+"/"+
						elev.dataagendamento.substring(2,4)+"/"+
						elev.dataagendamento.substring(4,6)
						var att=document.createAttribute("data-action")
						att.value=elev.id

						ncardag.querySelector(".textag4 input").setAttributeNode(att)
						ncardag.querySelector(".textag5").textContent="Horario: "+elev.horariomarcado
						hag.appendChild(ncardag)	
					})
					ulag.remove()
					addlistener()
				}
				var idagalter
				var dsp="none"
				function addlistener(){
					var inptalt=document.getElementsByClassName("inptalt")
					
					for(i=0; i< inptalt.length;i++){
						inptalt[i].addEventListener("click",function(evt){
							
							idagalter=evt.target.getAttributeNode("data-action").value
						dsp=="none"?dsp="block":dsp="none" 

						var divat=document.getElementById("formulario_de_alteracao")
							divat.style.display=dsp
							alteradados(idagalter)
							})	

					}		
					
				}


				function alteradados(id){
					
					getdadosupdate2("/testepraticodsin/App/api/listservices.php",chamaservices,id)
				}

				function chamaservices(dupdate,id){
					
					var dupdatej=JSON.parse(dupdate)
						var idserviceupdate=document.querySelector("#idserviceupdate")
						idserviceupdate.innerHTML=" "
					for(i=0; i<dupdatej.length; i++){
						
							var selectc=document.createElement("option")
							selectc.value=dupdatej[i].id
							selectc.textContent=dupdatej[i].descricao
							idserviceupdate.appendChild(selectc)	
						
					}
					addchlist(id)

				}

				var updatebtn=document.getElementById("updatebtn")
				updatebtn.disabled=true

				var datacerta2=false
				var horaupdcerta=false
				function vfh(id){
				
					var dateupdate = document.querySelector("#dateupdate")
					if(dateupdate.value !=""){
					dataarr=dateupdate.value.split("-")
					if(parseInt(dataarr[0]) > year ){
						datacerta2=true
						
					}else if(parseInt(dataarr[0])== year && parseInt(dataarr[1]) > month ){
						datacerta2=true
						
					}else if(parseInt(dataarr[1])== month 
						&& parseInt(dataarr[2]) >= day ){
						
						datacerta2=true
					}else{
						datacerta2=false
						
						dateupdate.value=""
						updatebtn.disabled=true
						
					}
				}else{
					
					updatebtn.disabled=true
					
				}	
					
				}

				var iddesc

				function addchlist(id){
					iddesc=id
						var dateupdate = document.querySelector("#dateupdate")
						var horaupdate = document.querySelector("#horaupdate")
						var idserviceupdate=document.querySelector("#idserviceupdate")
						dateupdate.addEventListener("change",vfh)
						updatebtn.addEventListener("click",sendformupdate)
						horaupdate.addEventListener("change",verifyhoraupdate)
						idserviceupdate.addEventListener("change",buscahoraupdate)

					
			
				}

					var srvid
				function buscahoraupdate(evt){
							srvid=evt.target.value
							gethorarios("/testepraticodsin/App/api/listhorarios.php",getvalueshup,evt.target.value)

				}
				function getvalueshup(valhup,idsup){
						if(valhup){
							var horaupdate = document.querySelector("#horaupdate") 
							horaupdate.innerHTML=""
								for(i=0; i<valhup.length; i++){
								if(valhup[i].typeservices== "1" && idsup <=3 ){
									var selectc=document.createElement("option")
								selectc.value=valhup[i].horario
								selectc.textContent=valhup[i].horario
								horaupdate.appendChild(selectc)		
								}else if(valhup[i].typeservices > 2 && idsup > 3){
										var selectc=document.createElement("option")
								selectc.value=valhup[i].horario
								selectc.textContent=valhup[i].horario
								horaupdate.appendChild(selectc)
								}
								
						
							}
						}
				}

				function verifyhoraupdate(evt){
					
						

						var dateupdate = document.querySelector("#dateupdate").value
						if(dateupdate){
							var dataarr=dateupdate.split("-")
						}
						if(datacerta2){
						
							if(!evt.target.value)return
							var dadosdatah={
								"hora":evt.target.value,
								"data":dataarr[2]+"/"+dataarr[1]+"/"+dataarr[0],
								"types":srvid
								}
					
							var dadosdatahjsf=JSON.stringify(dadosdatah)
							getsend("/testepraticodsin/App/api/verifyhupdate.php",dadosdatahjsf,libagbt)
					 
		
						} else{
							feedupdate("Data invalida",0)
						}
				}

				function libagbt(data){
					if(data=="200" || data=="1200"){
						feedupdate("Horario Disponivel",1)
						horaupdcerta=true
						if(datacerta2 && horaupdcerta){
							updatebtn.disabled=false
						}

					}else{
						feedupdate("Horario Indisponivel",0)
						updatebtn.disabled=true
					}
				}

				function sendformupdate(evt){
					evt.preventDefault()
					
					

					var dataarr=evt.path[1].querySelector("#dateupdate").value.split("-")
					var hrup=evt.path[1].querySelector("#horaupdate").value
					var idservice=evt.path[1].querySelector("#idserviceupdate").value
					var d=new Date()
					var s=d.getDay()
					var dadosupdt={
						"servicetype":idservice,
							"idclient":iduser.value,
							"dataagi":dataarr[2]+"/"+dataarr[1]+"/"+dataarr[0],
							"semana":s,
							"horario":hrup,
							"id":iddesc
					}

					var dadosupdtj=JSON.stringify(dadosupdt)

					getsend("/testepraticodsin/App/api/updateag.php",dadosupdtj,verifyuptodate)
					

				}

				function verifyuptodate(data){
					if(data=="200"){
						updatebtn.disabled=true
						feedupdate("Alteração Concluida",1)
					}else{
						feedupdate("Erro na Alteração",0)
					}
				}

					var timeup=false
				function feedupdate(text,type){
					var fedupdate=document.querySelector("#feedupdate")
						fedupdate.style.display="block"
					if(type==1){
						fedupdate.style.backgroundColor="#90ee90"
						fedupdate.textContent=text
					}else if(type==0){
						fedupdate.style.backgroundColor="#c24438"
						fedupdate.textContent=text
					}
					if(timeup){
						clearTimeout(timeup)

					}
						timeup=setTimeout(removefeedup,4000)
					
				}

				function removefeedup(){
					var fedupdate=document.querySelector("#feedupdate")
					fedupdate.style.display="none"
				}

				function getdadosupdate2(destino,func,id){
			xhr=new XMLHttpRequest()
			urlenvio=destino
			xhr.open("GET",urlenvio)
			xhr.setRequestHeader("Contenty-Type","application/json")
			
			xhr.onreadystatechange=function(){
				if(xhr.readyState==4 && xhr.status==200){
					dataget=xhr.responseText
					
					
					func(dataget,id)	
				}
			}
				xhr.send()

			}






					
				document.getElementById("cancelupdate").addEventListener("click",function(evt){
					evt.preventDefault();
				
					
						dsp=="none"?dsp="block":dsp="none" 

						var divat=document.getElementById("formulario_de_alteracao")
						divat.style.display=dsp

				})
			
						
			
		



	}

})()