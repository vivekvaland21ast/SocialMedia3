
$('#registrationForm').on('submit', function (event) {
    event.preventDefault();

    var formData = new FormData(this);
    console.log(formData);
    $.ajax({
        url: "{{ route('register') }}",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            $('#successMessage').text(response.success);
            $('#successMessage').show();
            $('#registrationForm')[0].reset();
        },
        error: function (response) {
            $('#errorMessage').text(response.responseJSON.errors);
            $('#errorMessage').show();
        }
    });
});