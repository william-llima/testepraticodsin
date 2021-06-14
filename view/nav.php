
<div id="nav">
	<div id="logonav"></div>
	<div id="listitems">
		<ul>
			<li><a href="/index.php"> Serviços</a></li>
			<li><a href="/view/login.php">Login</a></li>
			<li><a href="/view/agendamento.php">Agendamento</a></li>
			<li><a href="/testepraticodsin/index.php?logout=true">Logout</a></li>
		</ul>
	</div>
	<div id="menuamb">
		<div></div>
		<div></div>
		<div></div>
	</div>
	<script>
		a = document.querySelectorAll("a")
		

		a[0].href="/testepraticodsin/index.php"
		a[1].href="/testepraticodsin/view/login.php"
		a[2].href="/testepraticodsin/view/agendamento.php"

		var listitem=document.getElementById("listitems")
		var menuamb=document.getElementById("menuamb")
		var state="none"
		menuamb.onclick=function(){

			state=="block"?state="none":state="block"


			listitem.style.display=state
			listitem.style.position="absolute"
			listitem.style.backgroundColor="black"
			listitem.style.top="0"
							listitem.style.zIndex="100"
			
			listitem.style.bottom="0"
		
			listitem.style.left="0"
			listitem.style.width="60%"
			listitem.querySelector("ul").style.flexDirection="column"

			listitem.querySelector("ul").style.zIndex="100"
			listitem.querySelector("ul").style.fontSize="23px"
			listitem.querySelector("ul").style.marginTop="20px"
			var list=listitem.querySelectorAll("ul li")
			for(i=0; i < list.length; i++){
				list[i].style.marginTop="30px"
			}
		}
	</script>
</div>
