
	function drawNode(x, y, r, c, index, value){
			var canvas = document.getElementById('lienzo');
			var contexto = canvas.getContext('2d');

		
		//relleno
		contexto.beginPath();
		contexto.arc(x,y,r,0,2*Math.PI, false);
		contexto.fillStyle = c;
		contexto.fill();

		//borde
		contexto.lineWidth = 3;
		contexto.strokeStyle = 'black';
      	contexto.stroke();

      	//zona Indice
      	contexto.beginPath();
      	var ny = y - (r/2);
      	var nr = r/4;
		contexto.arc(x,ny,nr,0,2*Math.PI, false);
		contexto.fillStyle = 'white';
		contexto.fill();

		//numero del indice
		contexto.fillStyle = 'black';
		contexto.font="18px Georgia";
		nx = x - nr/2;
		ny = ny + nr/2;
		contexto.fillText(index,nx,ny);

		//zona valor
		contexto.fillStyle = 'white';
		var c1 = x - (r/2);
		var c2 = y  + (r/5);
		contexto.fillRect(c1,c2,50,20);

		//valor
		contexto.fillStyle = 'black';
		contexto.font="18px Georgia";
		c2 = c2 + (c1/5);
		contexto.fillText(value,c1,c2);

	}
