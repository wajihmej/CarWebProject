$(function()
{
	$("#form_prod").validate(
		{

		rules: {
			nom:  {
				required: true,
				minlength: 2
			},
			prix: {
				required: true,
				number: true
			},
			informations: {
				required: true,
				minlength: 3
			},
		},

		messages: {
			nom: {
				required: "Champ obligatoire",
				minlength: " Le nom doit contenir au moins 2 caractères",
			},
			lieu: {
				required: "Champ obligatoire",
				minlength: " Le prix doit etre numerique",
			},
			informations: {
				required: "Champ obligatoire",
				minlength: " L'information doit contenir au moins 3 caractères",
			},


		}
	});
});