
    

<div>
   {{-- {{  dd($date_soutenance) }} --}}
    <h3>Bonjour Mr /Mme{{  $nom }}</h3>
  
      <p>vous êtes membre du jury pour une soutenance du </p>
       <h2>{{$date_soutenance}}</h2>
       <h2> à {{$heure_soutenance}}</h2>
         <h2>a la salle {{ $lib_salle }}</h2>
         <h2>de l'etudiant {{ $etudiant->nom }} {{ $etudiant->prenom }}</h2>
         <h2>en classe de {{ $etudiant->niveau->lib_niveau }} {{ $etudiant->filiere->lib_filiere }}</h2>

        <h3><u> prière de signaler votre absence </u></h3>
        <h3>.Merçi</h3>
        <h5> <i>ITA GESTION-SOUTENANCE</i></h5>

