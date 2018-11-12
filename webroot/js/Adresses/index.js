function getAdresses() code{
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                function (adresses) {
                    var adressTable = $('#adressData');
                    adressTable.empty();
                    var count = 1;
                    $.each(adresses.data, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editAdress(' + value.id + ')"></a>' +
                                '<a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\') ? adressAction(\'delete\', ' + value.id + ') : false;"></a>' +
                                '</td></tr>';
                        adressTable.append('<tr><td>' + count + '</td><td>' + value.id + '</td><td>'+ '</td><td>' + value.adress + '</td><td>' + value.city + '</td><td>' + value.zip_code 
                                +'</td><td>' + value.province +'</td><td>' + value.country +'</td><td>' + value.details +'</td><td>' + value.user_id + editDeleteButtons);
                        count++;
                    });

                }
    });
}

/* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}

/*
 $('#cocktailAddForm').submit(function (e) {
 e.preventDefault();
 var data = convertFormToJSON($(this));
 alert(data);
 console.log(data);
 });
 */

function adressAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var adressData = '';
    var ajaxUrl = urlToRestApi;
    if (type == 'add') {
        requestType = 'POST';
        adressData = convertFormToJSON($("#addForm").find('.form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
        ajaxUrl = ajaxUrl + "/" + idEdit.value;
        adressData = convertFormToJSON($("#editForm").find('.form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(adressData),
        success: function (msg) {
            if (msg) {
                alert('Adress data has been ' + statusArr[type] + ' successfully.');
                getAdresses();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}

/*** à déboguer ... ***/
function editAdress(id) {
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: urlToRestApi+ "/" + id,
        success: function (data) {
            $('#idEdit').val(data.data.id);
            $('#adressEdit').val(data.data.adress);
            $('#cityEdit').val(data.data.city);
            $('#zip_codeEdit').val(data.data.zip_code);
            $('#provinceEdit').val(data.data.province);
            $('#countryEdit').val(data.data.country);
            $('#detailsEdit').val(data.data.details);
            $('#user_idEdit').val(data.data.user_id);
            $('#editForm').slideDown();
        }
    });
}