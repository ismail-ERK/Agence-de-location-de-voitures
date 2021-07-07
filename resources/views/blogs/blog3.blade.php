<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   	
		<title>Column Layout</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
		<!-- external CSS link -->
    
		<style>
    #container {
      width: 1100px;
      margin: 0 auto 0 auto;
      
      
     }
     
     #header {
     background: rgb(15, 15, 15);
      padding: 50px;
     }
     
     #main {
     background: rgb(208, 210, 211);
      padding: 50px;
      
     }
     .titre {
          
               color: #369;
               font-size: 24px;
               font-weight: 700;
               margin: 40px 0 20px;
           
     }
     
     .he{
     
         color: rgb(172, 73, 16);
     }</style>
	</head>

	<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{url('back')}}">Home</a>
      
      </div>
    </nav> 
<div id="container">



  <div id="main">
      <h2 class="he">Qu’est-ce que la puissance d’un moteur ?</h2>
      
     
   <img src="{{asset('images/car3.jpg')}}" alt="car" width="500"> 
    
   <p>Chaque voiture possède une motorisation adaptée à ses besoins, mais que signifie la puissance pour un moteur thermique ? </p>
  <p>- Comment se traduit elle ? Quelles sont les conséquences financières lorsque l’on possède un moteur puissant ?</p> 
   

 <h3 class="titre">D’où vient l’unité de mesure de la puissance ?</h3>  
<p>Pour comprendre comment fonctionne la puissance il faut d’abord comprendre comment celle-ci se mesure.</p>

  La puissance maximale d’un moteur, exprimée en Europe en cheval-vapeur ou ch était tout simplement
   un terme adopté au 18ème siècle pour comparer la force de traction d’un cheval et d’une machine à <br>
    L’exercice était réalisé en attachant le cheval ou la machine à une corde, elle-même reliée à un poids de 75kg. <br>
    Le but était de tracter le plus rapidement possible le poids sur un mètre de hauteur.<br>
     Il a finalement été trouvé que le cheval possédait une puissance maximum de déplacement de 735,5 watts, <br>
  un cheval-vapeur valait donc 735,5 watts. <br>

  <h3 class="titre">Les Chevaux Fiscaux, véritable unité de calcul fiscale :</h3>  

  
Bien que de nombreux habitants européens parle de la puissance en chevaux DIN, le système juridique européen et français utilise dans tous ses dossiers et démarches administratives le cheval fiscal ou CV. Cette nouvelle unité de puissance est calculée à partir de la puissance du moteur en watts mais également des <br>
émissions de C02 en grammes par kilomètres. Elle permet ainsi de se rendre compte à quel point votre véhicule pollue. <br>

  </div><!-- #main -->

  


  

  	

</div><!-- #container -->


	</body>
</html>