// Cabeleleila@Leila

// Cabeleleila@Leila2021

function getallusr(destino,funct){
					xhr=new XMLHttpRequest()
					urlenvio=destino
					xhr.open("GET",urlenvio)
					xhr.setRequestHeader("Contenty-Type","application/json")
					
					xhr.onreadystatechange=function(){
						if(xhr.readyState==4 && xhr.status==200){
							var dataget=xhr.responseText
						
							funct(dataget)	
						}
					}
					xhr.send()

				}

				getallusr("/testepraticodsin/App/api/listallag.php",valoresaglist)

			var hagad=document.getElementById("historicoagendamentos")
				function valoresaglist(vdata){
					
					var ulag=document.querySelector(".list_agendados")
					vdataj=JSON.parse(vdata)
					hagad.innerHTML=""
					vdataj.forEach(function(elev){

						ncardag=ulag.cloneNode(true)
						ncardag.querySelector(".textag1").textContent="Serviço : "+elev.descricao
						ncardag.querySelector(".textag11").textContent="Nome: "+elev.nome
						ncardag.querySelector(".textag21").textContent="Telefone: "+elev.telefone
						ncardag.querySelector(".textag2").textContent="Preço R$: "+elev.preco
						ncardag.querySelector(".textag3").textContent=
						"Data : "+elev.dataagendamento.substring(0,2)+"/"+
						elev.dataagendamento.substring(2,4)+"/"+
						elev.dataagendamento.substring(4,6)
						ncardag.querySelector(".textag5").textContent="Horario: "+elev.horariomarcado
						hagad.appendChild(ncardag)	
					})
					ulag.remove()
					
				}