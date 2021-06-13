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
					console.log(data)
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


	}

})()