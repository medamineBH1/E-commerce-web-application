const deleteButtons = document.querySelectorAll('.delete-btn');

deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
        const clientId = this.getAttribute('data-id');
        // Perform an AJAX request or submit a form to delete the client with the specified ID
        // Display success or error message accordingly
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete-client.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log('Client deleted successfully');
                // Optionally, you can update the UI to remove the deleted client row
                // For example:
                this.closest('tr').remove();
            } else {
                console.log('Error deleting client');
            }
        };
        xhr.send('clientId=' + encodeURIComponent(clientId));
    });
});
