$(function()
{
	$("#form_client").validate(
		{

		rules: {
			nom:  {
				required: true,
				minlength: 2
			},
			prenom: {
				required: true,
				minlength: 2
			},
			email: {
				required: true,
				email: true
			},
			mdp: {
				required: true,
				minlength: 3
			},
			tel: {
				required: true,
				number: true
			},
			adresse: {
				required: true,
				minlength: 3
			},
		},

		messages: {
			nom: {
				required: "Champ obligatoire",
				minlength: " Le nom doit contenir au moins 2 caractères",
			},
			prenom: {
				required: "Champ obligatoire",
				minlength: " Le prenom doit contenir au moins 2 caractères",
			},
			email: {
				required: "Champ obligatoire",
				email: " L email est invalide",
			},
			mdp: {
				required: "Champ obligatoire",
				minlength: " La mot de passe doit contenir au moins 3 caractères",
			},
			tel: {
				required: "Champ obligatoire",
				number: " La telephone doit contenir des numeros",
			},
			adresse: {
				required: "Champ obligatoire",
				minlength: " L adresse doit contenir au moins 3 caractères",
			},


		}
	});
});