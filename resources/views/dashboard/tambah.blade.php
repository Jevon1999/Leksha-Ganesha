<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Leksha Ganesha</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'batik-brown': '#8B4513',
                        'batik-light': '#CD853F',
                        'batik-cream': '#DEB887',
                        'batik-dark': '#654321',
                    },
                    animation: {
                        'slide-in': 'slideIn 0.3s ease-out',
                        'fade-in': 'fadeIn 0.2s ease-out',
                        'pulse-gentle': 'pulseGentle 2s infinite',
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes slideIn {
            from { transform: translateX(-100%); }
            to { transform: translateX(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes pulseGentle {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        .sidebar-shadow {
            box-shadow: 4px 0 15px rgba(139, 69, 19, 0.1);
        }
    </style>
    @livewireStyles
</head>
<body>

    @include('layout.sidebar')

    <div class="lg:ml-72 p-6">
        @livewire('tambah-berita')
        <h1> tai</h1>
    </div>

</body>
    @livewireScripts
</html>

