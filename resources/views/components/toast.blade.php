<style>
    /* resources/css/toast.css */

.toast {
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    padding: 15px;
    background-color: #4CAF50;
    color: white;
    border-radius: 8px;
    display: flex;
    align-items: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    transition: opacity 0.3s ease, transform 0.3s ease;
    opacity: 0;
    visibility: hidden;
}

.toast.show {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(-20px);
}

.toast-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.toast-message {
    font-size: 16px;
    margin-right: 10px;
}

.toast-close {
    background: none;
    border: none;
    font-size: 18px;
    color: white;
    cursor: pointer;
}

/* Responsiveness */
@media (max-width: 600px) {
    .toast {
        width: 90%;
        font-size: 14px;
        padding: 10px;
    }
}

</style><!-- resources/views/components/toast.blade.php -->


<div id="toast" class="toast hidden">
    <div class="toast-content">
        <span class="toast-message">{{ $message ?? 'Data stored successfully!' }}</span>
        <button class="toast-close" onclick="closeToast()">✕</button>
    </div>
</div>

<script>
    // resources/js/toast.js

    function showToast(message) {
        const toast = document.getElementById('toast');
        toast.querySelector('.toast-message').innerText = message;
        toast.classList.add('show');

        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
    }

    function closeToast() {
        const toast = document.getElementById('toast');
        toast.classList.remove('show');
    }

</script>
