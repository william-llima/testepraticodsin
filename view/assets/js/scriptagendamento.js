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

					
				function createoption(dataj,type){
					
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

				var agdbtn=document.querySelector("#buttonagd").disabled=true
				


			var selecthorario=document.getElementById("selecthorario")
			var dataagendam=document.getElementById("dataagendam")
			selecthorario.addEventListener("change",function(event){
				if(dataagendam.value != "" && event.target.value != ""){
				var dataarr=dataagendam.value.split("-")
				var data= new Date()
				var day=data.getDate()
				var year=data.getFullYear()
				var month=data.getMonth()+1
				console.log(data)
				console.log(dataarr,day,year,month)
					if(dataagendam.value ){

					}
				console.log(event.target.value)	
				}else{
					event.target.value=""
					feedbackhorario("Selecione uma Data",0)
				}
				
			})	

	}

})()