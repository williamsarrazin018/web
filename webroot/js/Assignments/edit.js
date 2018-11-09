$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#level-id').on('change', function () {
        var levelId = $(this).val();
        if (levelId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'level_id=' + levelId,
                success: function (chambers) {
                    $select = $('#chamber-id');
                    $select.find('option').remove();
                    $.each(chambers, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.number + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#chamber-id').html('<option value="">Select Level first</option>');
        }
    });
});


