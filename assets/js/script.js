$(function(){
  // show and hide message after leave-form application
  $("#closeButton").click(function(){
    $("#alert").toggleClass("hidden");
  });

  // initialize datatable
  $('#example').DataTable({
    lengthMenu: [
        [10],
        [10]
    ],

    language: {
      search : "Rechercher: ",
      emptyTable: "Aucune donnée disponible dans le tableau",
      loadingRecords: "Chargement...",
      processing: "Traitement...",
      info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
      lengthMenu: "",
      infoEmpty: "Pas d'entrée pour le moment...",
    },

    responsive: true,
  });

  // show and hide sidebar
  $("#hideNavbarButton").click(function(){
    $("#sidebar").toggleClass("hidden");
  });
});
