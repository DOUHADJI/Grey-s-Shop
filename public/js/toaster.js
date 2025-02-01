function showToast(message, type = "success") {
    const toast = document.getElementById("toast");
    const toastMessage = document.getElementById("toast-message");

    toastMessage.textContent = message;

    toast.style.display = "block";

    setTimeout(() => {
        toast.style.display = "none";
    }, 4000);
}

function showErrorToast(message, type = "error") {
    const toast = document.getElementById("error-toast");
    const errorToastMessage = document.getElementById("error-toast-message");

    errorToastMessage.textContent = message;

    toast.style.display = "block";

    setTimeout(() => {
        toast.style.display = "none";
    }, 4000);
}
