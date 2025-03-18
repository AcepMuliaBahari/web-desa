@if(session('success'))
    <div id="alert-success" class="flex items-center p-4 mb-4 rounded-lg bg-green-50 dark:bg-gray-800 animate-fade-down" role="alert">
        <div class="flex items-center justify-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg> 
        </div>
        <div class="ms-3 text-sm font-medium text-green-800 dark:text-green-300">
            {{ session('success') }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-100 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-success" aria-label="Close">
            <span class="sr-only">Tutup</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif

@if(session('error'))
    <div id="alert-error" class="flex items-center p-4 mb-4 rounded-lg bg-red-50 dark:bg-gray-800 animate-fade-down" role="alert">
        <div class="flex items-center justify-center w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
            </svg>
        </div>
        <div class="ms-3 text-sm font-medium text-red-800 dark:text-red-300">
            {{ session('error') }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-100 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-error" aria-label="Close">
            <span class="sr-only">Tutup</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif

@if ($errors->any())
    <div id="alert-validation" class="flex p-4 mb-4 rounded-lg bg-red-50 dark:bg-gray-800 animate-fade-down" role="alert">
        <div class="flex items-center justify-center w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
            </svg>
        </div>
        <div class="ms-3 text-sm font-medium text-red-800 dark:text-red-300">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-100 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-validation" aria-label="Close">
            <span class="sr-only">Tutup</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function () {
    console.log("Alert script loaded"); // Periksa apakah script dijalankan.

    const alerts = document.querySelectorAll('[role="alert"]');
    alerts.forEach(alert => {
        console.log("Found alert:", alert); // Debug apakah elemen ditemukan.

        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s ease-out';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 4000);
    });

    const closeButtons = document.querySelectorAll('[data-dismiss-target]');
    closeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetId = button.getAttribute('data-dismiss-target');
            const alert = document.querySelector(targetId);
            console.log("Closing alert:", alert); // Debug saat alert ditutup.
            if (alert) {
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        });
    });
});


</script> 