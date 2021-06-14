;(function(){
		function getdados(destino){
			xhr=new XMLHttpRequest()
			urlenvio=destino
			xhr.open("GET",urlenvio)
			xhr.setRequestHeader("Contenty-Type","application/json")
			
			xhr.onreadystatechange=function(){
				if(xhr.readyState==4 && xhr.status==200){
					dataget=xhr.responseText
					
					datagetj=JSON.parse(dataget)
					renderservices(datagetj)	
				}
			}
			xhr.send()

		}

	getdados("/testepraticodsin/App/api/listservices.php")

	var section=document.querySelector("#section")
	var section2=document.querySelector("#section2")
	var section3=document.querySelector("#section3")
	var cardsection=document.querySelectorAll(".cardsection")[0]
	var cardsection2=document.querySelectorAll(".cardsection2")[0]
	var cardsection3=document.querySelectorAll(".cardsection3")[0]
	function renderservices(dadojson){
		
		
		for(i=0;i< 3; i++){
			var newcard=cardsection.cloneNode(true)
			newcard.querySelector(".description_service_card").textContent=dadojson[i].descricao
			newcard.querySelector(".price_service_card").textContent="R$"+dadojson[i].preco
			newcard.querySelector(".horarioest_service_card").textContent="Duração "+dadojson[i].horarioest
			newcard.querySelector(".linkagendamento").href="/testepraticodsin/view/agendamento.php?id="+dadojson[i].id
			section.appendChild(newcard)

		}
		for(i=0;i< dadojson.length; i++){
			if(dadojson[i].serviceid==2){
				var newcard=cardsection2.cloneNode(true)
				newcard.querySelector(".description_service_card").textContent=dadojson[i].descricao
				newcard.querySelector(".price_service_card").textContent="R$"+dadojson[i].preco
				newcard.querySelector(".horarioest_service_card").textContent="Duração "+dadojson[i].horarioest
				newcard.querySelector(".linkagendamento").href="/testepraticodsin/view/agendamento.php?id="+dadojson[i].id
				section2.appendChild(newcard)
			}
		}
		for(i=0;i< dadojson.length; i++){
			if(dadojson[i].serviceid==3){
				var newcard=cardsection3.cloneNode(true)
				newcard.querySelector(".description_service_card").textContent=dadojson[i].descricao
				newcard.querySelector(".price_service_card").textContent="R$"+dadojson[i].preco
				newcard.querySelector(".horarioest_service_card").textContent="Duração "+dadojson[i].horarioest
				newcard.querySelector(".linkagendamento").href="/testepraticodsin/view/agendamento.php?id="+dadojson[i].id

				section3.appendChild(newcard)
			}
		}
		cardsection.remove()
		cardsection2.remove()
		cardsection3.remove()
		
	}
})()