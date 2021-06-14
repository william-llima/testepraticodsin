;(function(){
	
	var loginbtn=document.getElementById("loginbtn")
	

	loginbtn.addEventListener("click",function(event){
		event.preventDefault()
		var email=document.getElementById("emaillogin").value
		var senha=document.getElementById("senhalogin").value
		if(email != "" && senha != ""){
			verifyuser(email,senha)
		}else{
			feedback("Nao e permitido campos vazios",0)
		}

	})
		var span=document.querySelector("#alertas")
		var timeout=false
	

	function feedback(text,codig){
		if(codig==0){
			span.style.display="block"
			span.style.backgroundColor="#C24438"
			span.textContent=text
		}else if(codig==1){
			span.style.display="block"
			span.style.backgroundColor="#90ee90"
			span.textContent=text
		}
		if(timeout){
			clearTimeout(timeout)	
		}
		
		timeout=setTimeout(removefeedback,7000)
	}

	function removefeedback(){
		span.style.display="none"
	}

	

	var registerbtn=document.querySelector("#registerbtn")
	var inputs=document.querySelectorAll("input")
	
	registerbtn.addEventListener("click",function(event){
		event.preventDefault()
		if(inputs[2].value != "" && inputs[3].value != "" &&
		   inputs[4].value != "" && inputs[5].value != "" &&
		   inputs[6].value != ""
		   ){
			registeruser()	
		}else{
			feedback("Preencha todos os campos",0)
		}
		

	})

	function registeruser(){
		dadosusuario={
			"nome":inputs[2].value,
			"email":inputs[3].value,
			"telefone":inputs[4].value,
			"cpf":inputs[5].value,
			"senha":inputs[6].value
		}

		ddusuariosj=JSON.stringify(dadosusuario)
		senddados("/testepraticodsin/App/api/insertuser.php",ddusuariosj)
	}

	
	function verifyuser(textemail,textsenha){

		dadosv={
			"email":textemail,
			"senha":textsenha

		}

		dadosj=JSON.stringify(dadosv)
		senddados("/testepraticodsin/App/api/verifyuser.php",dadosj)

	}

	function sucess(){
					document.location.href="/testepraticodsin/index.php"

	}
	function sucessadm(){
					document.location.href="/testepraticodsin/view/adm.php"

	}
	var time=false
	function senddados(destino,dadosjsf){
		xhr=new XMLHttpRequest()
		urlenvio=destino
		xhr.open("POST",urlenvio)
		xhr.setRequestHeader("Contenty-Type","application/json")
		xhr.send(dadosjsf)
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4 && xhr.status==200){
				console.log(xhr.responseText)
				if(xhr.responseText=="insert200"){
					feedback("Usuario cadastrado com sucesso",1)
				}else if(xhr.responseText=="verify200"){
					feedback("Usuario logado com sucesso",1)
					var email=document.getElementById("emaillogin").value=""
					var senha=document.getElementById("senhalogin").value=""
					if(time){
						clearTimeout(time)
					}
					time= setTimeout(sucess,4000)
				}else if(xhr.responseText=="Usuario ja esta logado"){
					loginbtn.disabled=true
					feedback("Usuario ja esta logado",1)
				}else if(xhr.responseText=="Usuario Ja cadastrado"){
					
					feedback("Usuario Ja cadastrado",0)
				}else if(xhr.responseText=="adm200"){
					feedback("Adm Logado",1)
					if(time){
						clearTimeout(time)
					}
					time= setTimeout(sucessadm,4000)
				}else{
					
					feedback("Erro na operação",0)
				}
			}else if(xhr.readyState==4){
				
			}
		}
	}

})()