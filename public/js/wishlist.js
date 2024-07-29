document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.heart__btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const itemId = this.getAttribute('data-id');
    
            fetch('/wishlist', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ recipe_id: itemId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.innerHTML = '<span class="icon_heart"></span>';
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    document.querySelectorAll('.cart__close .icon_close').forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.closest('tr').getAttribute('data-id');

            fetch('/wishlist/remove', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ recipe_id: itemId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.closest('tr').remove();
                    // Optionally show a success message
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

});