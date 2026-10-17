window.showToastify = function(message, type = 'success', duration = 3000) {
    const colors = {
        success: "linear-gradient(to right, #22c55e, #16a34a)",
        error: "linear-gradient(to right, #ef4444, #dc2626)",
        warning: "linear-gradient(to right, #f59e0b, #d97706)",
        info: "linear-gradient(to right, #3b82f6, #2563eb)"
    };

    // Update custom style for progress bar
    document.documentElement.style.setProperty('--toastify-duration', (duration / 1000) + 's');

    Toastify({
        text: message,
        duration: duration,
        close: true,
        gravity: "top",
        position: "right",
        style: {    
            background: colors[type] || colors.success,
        },
        stopOnFocus: true,
        className: "toastify-custom",
        onClick: function() {
            if (type === 'success') {
                window.location.href = wc_add_to_cart_params.cart_url;
            }
        }
    }).showToast();
}