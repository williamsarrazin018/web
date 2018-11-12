function getLevels() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
            function (levels) {
                var levelTable = $('#levelData');
                levelTable.empty();
                var count = 1;
                $.each(levels.data, function (key, value)
                {
                    var editDeleteButtons = '<td>' +
                        '<a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editLevel(' + value.id + ')"></a>' +
                        '<a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\') ? levelAction(\'delete\', ' + value.id + ') : false;"></a>' +
                        '</td></tr>';
                    levelTable.append('<tr><td>' + '#' + count + '</td><td>' + value.number + '</td><td>' + value.user_id + '</td>' + editDeleteButtons);
                    count++;
                });

            }
    });
}

function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}

function levelAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var levelData = '';
    var ajaxUrl = urlToRestApi;
    if (type == 'add') {
        requestType = 'POST';
        levelData = convertFormToJSON($("#addForm").find('.form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
        ajaxUrl = ajaxUrl + "/" + idEdit.value;
        levelData = convertFormToJSON($("#editForm").find('.form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(levelData),
        success: function (msg) {
            if (msg) {
                alert('Level data has been ' + statusArr[type] + ' successfully.');
                getLevels();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}

function editLevel(id) {
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: urlToRestApi+ "/" + id,
        success: function (data) {
            $('#idEdit').val(data.data.id);
            $('#numberEdit').val(data.data.number);
            $('#editForm').slideDown();
        }
    });
}