/**
 * Build the table body with retrieved data
 * using its thead id and json data headers.
 * 
 * @param {string} tableHeadID 
 * @param {string} tableData 
 */
function buildTableHead(tableHeadID, tableData) {
    let tableHead = $(tableHeadID);
    tableHead.html("");
    let headers = Object.keys(tableData[0]);
    headers.forEach(header => {
        tableHead.append(
        '<th>' + header + '</th>'
        );
    });
    tableHead.append('<th colspan="2">Actions</th>');
}

/**
 * Build the table body with retrieved data
 * using its tbody id and json data.
 * 
 * @param {string} tableBodyID 
 * @param {string} tableData 
 */
function buildTableBody(tableBodyID, tableData) {
    let table = $(tableBodyID);
    table.html("");
  
    tableData.forEach(element => {
      if(Object.keys(element).length > 0 && element.constructor === Object) {
        table.append('<tr>');
        Object.keys(element).forEach(key => {
          table.append(
              '<td>' +
                element[key] +
              '</td>' 
          ); 
        });

        table.append('</tr>');
      }
    });
}

/**
 * Inject action buttons to a table using
 * its id and id prefix.
 * 
 * @param {string} table 
 * @param {string} idPrefix
 * @param {object} actions
 */
function injectTableActions(table, idPrefix, actions) {
    let bodyTable = $(table);
    let actionButtons = [
      {
        id: idPrefix + '-delete-btn',
        actionType: 'delete',
        action: function() {
            actions.deleteAction()
        },
        inputType: 'button',
        label: 'Eliminar',
      },
      {
        id: idPrefix + '-edit-btn',
        actionType: 'edit',
        action: function() {
            actions.editAction();
        },
        inputType: 'button',
        label: 'Editar',
      }
    ];

    actionButtons.forEach(button => {
        bodyTable.append(
          '<td>' +
            '<input type="' + button.inputType + '" value="' + button.label +
            '" class="' + (button.actionType === 'edit' ? 'btn btn-primary' : 'btn btn-danger') + '"' +
            'id="' + button.id + '" />' +
          '</td>'
        );

        $('#' + button.id).on('click', function() {
            button.action();
        });
    });
}