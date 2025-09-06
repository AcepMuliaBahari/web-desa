@if(session('toast'))
    <div id="toast-message" 
         class="fixed bottom-5 right-5 flex items-center p-4 mb-4 text-sm text-white bg-blue-600 rounded-lg shadow-lg z-50" 
         role="alert">
        
        <!-- Icon -->
        <div class="flex items-center justify-center w-8 h-8">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
        </div>

        <!-- Message -->
        <div class="ml-3 text-sm font-medium">
            {{ session('toast') }}
        </div>

        <!-- Close button -->
        <button type="button" 
                class="ml-auto -mx-1.5 -my-1.5 bg-blue-600 text-white rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-700 inline-flex items-center justify-center h-8 w-8" 
                data-dismiss-target="#toast-message" 
                aria-label="Close">
            <span class="sr-only">Tutup</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const toast = document.getElementById('toast-message');
        if (toast) {
            setTimeout(() => {
                toast.style.transition = 'opacity 0.5s ease-out';
                toast.style.opacity = '0';
                setTimeout(() => toast.remove(), 500);
            }, 4000);
        }

        document.querySelectorAll('[data-dismiss-target]').forEach(button => {
            button.addEventListener('click', () => {
                const target = document.querySelector(button.getAttribute('data-dismiss-target'));
                if (target) {
                    target.style.transition = 'opacity 0.5s ease-out';
                    target.style.opacity = '0';
                    setTimeout(() => target.remove(), 500);
                }
            });
        });
    });
    </script>
    @endpush
@endif
