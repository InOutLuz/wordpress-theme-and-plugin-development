document.addEventListener('DOMContentLoaded', function () {
    var importButton = document.getElementById('import-pages-button');
    importButton.addEventListener('click', function () {
        importRequiredPages();
    });

    function importRequiredPages() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', custom_ajax_object.ajax_url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {
                // Success response
                alert('Required pages imported successfully.');
            } else {
                // Error response
                var errorMessage = xhr.responseText || 'Error importing required pages.';
                alert('Error: ' + errorMessage);
            }
        };
        xhr.onerror = function () {
            // Connection error
            alert('Connection error.');
        };
    xhr.send('action=import_required_pages&nonce=' + custom_ajax_object.nonce);
}
});