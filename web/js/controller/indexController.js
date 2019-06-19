const arenaActions = {
  getAllAction: function() {
    getAllArenas();
  },
  addAction: function() {
    addArena();
  },
  editAction: function(){
    editArena();
  },
  deleteAction: function(id) {
    deleteArena(id);
  }
};

$(document).ready(function(){
    arenaActions.getAllAction();
});

function getAllArenas() {
  $.ajax({
    url: '../../src/Controller/IndexController.php',
    type:'POST',
    data:{
        'URL': '/arena/list'
    },
    success: function(response) {
      let jsonResponse = JSON.parse(response);
      let listaArenasResponse = JSON.parse(jsonResponse);
      buildTableHead('#arena-table-head', listaArenasResponse.data);
      buildTableBody('#arena-table-body', listaArenasResponse.data);
      injectTableactions('#arena-table-body', 'arena-table', arenaActions);
    },
    error: function(error) {
      console.log(error);
    }
  });
}

function addArena() {
  
}

function deleteArena(idArena) {
  $.ajax({
    url: '../../src/Controller/IndexController.php',
    type:'DELETE',
    data:{
        'URL': '/arena/delete',
        'ID': idArena
    },
    success: function(response) {
      getAllArenas();
    },
    error: function(error) {
      console.log(error);
    }
  });
}

function editArena() {
  console.log('edit arena from index');
}

