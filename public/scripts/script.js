	$( "#datepicker" ).datepicker({
		altField: "#datepicker",
		closeText: 'Fermer',
		prevText: 'Précédent',
		nextText: 'Suivant',
		currentText: 'Aujourd\'hui',
		monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
		monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
		dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
		dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
		dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
		weekHeader: 'Sem.',
		dateFormat: 'yy-mm-dd',
	    firstDay: 1 ,
	});

	$("#getDate").click(function(){
		alert($("#datepicker").val());
	});

  $(function()
  {
    $( "ul.droptrue" ).sortable(
    {
      connectWith: "ul",
      stop:function(event, ui)
      {
      	var id = $(ui.item).find('[name="id"]').val();
      	// var etat = $(ui.item).parent('ul').parent('div').find('h2').data('etat');
      	$.post('home', {id:id,action:'change_state'});
      }
    });
 
    $( "#sortable1, #sortable2, #sortable3, #sortable4, #sortable5" ).disableSelection();
  });


  //  $(function() {
  //       $( "#accordion" ).accordion();
  //  		// collapsible: true
  // });