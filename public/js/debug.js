// Debug script to help trace form submission and cookies
(function() {
    console.log('Debug script loaded');
    
    // Log all cookies
    console.log('Current cookies:', document.cookie);
    
    // Watch form submission
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.querySelector('form[action*="login"]');
        if (loginForm) {
            console.log('Found login form');
            loginForm.addEventListener('submit', function(e) {
                console.log('Form submitted');
                // Don't prevent default - let it submit normally
            });
        }
    });
    
    // Watch for redirects
    let lastUrl = location.href;
    new MutationObserver(() => {
        if (location.href !== lastUrl) {
            console.log('URL changed to', location.href);
            lastUrl = location.href;
        }
    }).observe(document, {subtree: true, childList: true});
})();