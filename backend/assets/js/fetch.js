function toggleButtonState(button, isLoading) {
    button.toggleClass('disabled', isLoading);
    button.html(button.data(isLoading ? 'loading-text' : 'default-text'));
}

function handleAjaxError(data) {
    alert(data.responseJSON?.message || data.message);
}

function fetch(url, data, onSuccess, button) {
    toggleButtonState(button, true);
    $.ajax({
        method: 'POST',
        url: url,
        data: data,
        success(data) {
            onSuccess(data)
        },
        error: handleAjaxError,
        complete: () => toggleButtonState(button, false),
    });
}
