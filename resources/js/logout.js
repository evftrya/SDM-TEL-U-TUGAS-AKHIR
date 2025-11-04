document.addEventListener('DOMContentLoaded', function() {
    // Handle desktop logout
    const logoutForm = document.getElementById('logout-form');
    if (logoutForm) {
        logoutForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            await handleLogout(this);
        });
    }

    // Handle mobile logout
    const logoutFormMobile = document.getElementById('logout-form-mobile');
    if (logoutFormMobile) {
        logoutFormMobile.addEventListener('submit', async function(e) {
            e.preventDefault();
            await handleLogout(this);
        });
    }
});

async function handleLogout(form) {
    try {
        const response = await fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            },
            body: new FormData(form)
        });

        if (response.ok) {
            // Clear any stored auth data
            localStorage.clear();
            sessionStorage.clear();
            
            // Redirect to home page
            window.location.href = '/';
        } else {
            console.error('Logout failed');
        }
    } catch (error) {
        console.error('Logout error:', error);
    }
}