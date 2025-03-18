<style>
    .animate-fade-down {
        animation: fade-down 1s ease-out;
    }
    .animate-fade-up {
        animation: fade-up 1s ease-out;
    }
    @keyframes fade-down {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes fade-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style> 