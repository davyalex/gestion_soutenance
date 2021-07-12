$(function(){
	// cacher le bouton 
	$('.btn-cache').hide()
	// evenement de clic sur le bouton photo
	$('.btn-photo').on('click',function(){
		// ouverture de la fenetre de selection dela photo
		$('.btn-cache').trigger('click')
	});
	function VerifExtension(ext){
         let tabExt = ['jpg','jpeg','png','gif'];
         let trouve = false;
         if (tabExt.indexOf(ext)!=-1)
         	trouve = true;
         return trouve;
	}
	$('.btn-cache').on('change',function(e){
		console.log(e.target.files[0].name)
		let ImageName = e.target.files[0].name;
		let extImage = ImageName.split('.');
		console.log(extImage);
		if (VerifExtension(extImage[1])) {
			let urlImage = URL.createObjectURL(e.target.files[0])
		    console.log(urlImage)
	       $('.image').attr('src',urlImage)
		}else{
			alert('fichier non pris en compte');
		}

		
	})
     
})