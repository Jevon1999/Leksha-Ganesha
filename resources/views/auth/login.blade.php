<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Batik Nusantara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'batik-brown': '#8B4513',
                        'batik-light': '#CD853F',
                        'batik-cream': '#DEB887',
                    },
                    animation: {
                        'float': 'float 15s infinite ease-in-out',
                        'batik-pattern': 'batikPattern 20s ease-in-out infinite',
                        'shimmer': 'shimmer 2s infinite linear',
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        @keyframes batikPattern {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        @keyframes ripple {
            to { transform: scale(2); opacity: 0; }
        }
        .batik-bg {
            background-image:
                radial-gradient(circle at 20% 80%, rgba(139, 69, 19, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(160, 82, 45, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(205, 133, 63, 0.2) 0%, transparent 50%);
        }
        .animate-entrance {
            animation: entrance 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
        @keyframes entrance {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-batik-brown via-batik-light to-batik-cream flex items-center justify-center relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 batik-bg animate-batik-pattern"></div>

    <!-- Floating Elements -->
    <div class="absolute inset-0 pointer-events-none z-0">
        <div class="absolute top-[10%] left-[10%] text-4xl opacity-10 animate-float">🎨</div>
        <div class="absolute top-[20%] right-[15%] text-4xl opacity-10 animate-float" style="animation-delay: 5s;">🌸</div>
        <div class="absolute bottom-[20%] left-[20%] text-4xl opacity-10 animate-float" style="animation-delay: 10s;">✨</div>
    </div>

    <!-- Login Container -->
    <div id="loginContainer" class="bg-white/95 backdrop-blur-xl rounded-3xl p-8 sm:p-12 w-full max-w-md mx-4 shadow-2xl shadow-batik-brown/30 border border-white/20 relative z-10 transition-all duration-300 hover:-translate-y-2 hover:shadow-3xl hover:shadow-batik-brown/40 opacity-0">

        <!-- Logo Section -->
        <div class="text-center mb-8">
            <div class="w-20 h-20 bg-gradient-to-br from-batik-brown to-batik-light rounded-2xl mx-auto mb-4 flex items-center justify-center relative overflow-hidden group shadow-lg">
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -skew-x-12 transform -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                <div class="absolute inset-0 opacity-20 bg-gradient-to-br from-transparent to-white/20"></div>
                <span class="text-3xl relative z-10">🎨</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold text-batik-brown mb-2">Batik Nusantara</h1>
            <p class="text-gray-600 text-sm">Portal UMKM Batik Indonesia</p>
        </div>

        <!-- Login Form -->
        <form id="loginForm" class="space-y-6" action="{{route('login.process')}}" method="POST">
            @csrf
            <!-- Email Input -->
            <div class="space-y-2">
                <label for="email" class="block text-sm font-semibold text-batik-brown">Email atau Username</label>
                <div class="relative group">
                    <input
                        type="text"
                        id="email"
                        name="email"
                        required
                        class="w-full pl-12 pr-4 py-4 bg-white/80 border-2 border-gray-200 rounded-2xl text-base transition-all duration-300 focus:border-batik-light focus:bg-white focus:outline-none focus:ring-4 focus:ring-batik-light/10 focus:-translate-y-1 placeholder:text-gray-400"
                        placeholder="Masukkan email atau username"
                        autocomplete="email"
                    >
                    <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-xl transition-colors duration-300 text-gray-400 group-focus-within:text-batik-light pointer-events-none">👤</span>
                </div>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="space-y-2">
                <label for="password" class="block text-sm font-semibold text-batik-brown">Kata Sandi</label>
                <div class="relative group">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="w-full pl-12 pr-12 py-4 bg-white/80 border-2 border-gray-200 rounded-2xl text-base transition-all duration-300 focus:border-batik-light focus:bg-white focus:outline-none focus:ring-4 focus:ring-batik-light/10 focus:-translate-y-1 placeholder:text-gray-400"
                        placeholder="Masukkan kata sandi"
                        autocomplete="current-password"
                    >
                    <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-xl transition-colors duration-300 text-gray-400 group-focus-within:text-batik-light pointer-events-none">🔒</span>
                    <button
                        type="button"
                        id="togglePassword"
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-lg text-gray-400 hover:text-batik-light transition-colors duration-300 focus:outline-none focus:text-batik-light"
                        aria-label="Toggle password visibility"
                    >
                        <span id="toggleIcon">👁️</span>
                    </button>
                </div>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-batik-light focus:ring-batik-light focus:ring-2">
                    <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                </label>
                <a href="#" class="text-sm text-batik-light hover:text-batik-brown font-medium transition-colors duration-300 hover:underline">
                    Lupa kata sandi?
                </a>
            </div>

            <!-- Login Button -->
            <button
                type="submit"
                id="loginButton"
                class="w-full py-4 bg-gradient-to-r from-batik-brown to-batik-light text-white font-semibold rounded-2xl relative overflow-hidden group transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-batik-brown/30 focus:outline-none focus:ring-4 focus:ring-batik-light/20 disabled:opacity-75 disabled:cursor-not-allowed disabled:hover:translate-y-0"
            >
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -skew-x-12 transform -translate-x-full group-hover:animate-shimmer"></div>
                <span class="relative z-10 flex items-center justify-center" id="loginText">
                    <span>Masuk ke Dashboard</span>
                </span>
            </button>
        </form>

        <!-- Divider -->
        <div class="relative my-8">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>




    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        });

        // Form submission
        // document.getElementById('loginForm').addEventListener('submit', function(e) {
        //     e.preventDefault();

        //     const email = document.getElementById('email').value;
        //     const password = document.getElementById('password').value;
        //     const loginBtn = document.getElementById('loginButton');
        //     const loginText = document.getElementById('loginText');

        //     if (email && password) {
        //         // Loading state
        //         const originalText = loginText.innerHTML;
        //         loginText.innerHTML = `
        //             <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        //                 <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        //                 <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        //             </svg>
        //             Sedang masuk...
        //         `;
        //         loginBtn.disabled = true;

        //         // Simulate API call
        //         setTimeout(() => {
        //             // In real implementation, handle the actual login here
        //             alert(`Selamat datang di Dashboard Batik UMKM!\nEmail/Username: ${email}`);
        //             loginText.innerHTML = originalText;
        //             loginBtn.disabled = false;
        //         }, 2000);
        //     }
        // });

        // Entrance animation
        window.addEventListener('load', function() {
            const container = document.getElementById('loginContainer');
            setTimeout(() => {
                container.classList.add('animate-entrance');
            }, 100);
        });

        // Ripple effect
        document.getElementById('loginButton').addEventListener('click', function(e) {
            const button = e.currentTarget;
            const rect = button.getBoundingClientRect();
            const ripple = document.createElement('span');
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s ease-out;
                pointer-events: none;
                z-index: 0;
            `;

            button.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });

        // Input validation feedback
        const inputs = document.querySelectorAll('input[required]');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (!this.value.trim()) {
                    this.classList.add('border-red-300', 'focus:border-red-500', 'focus:ring-red-500/10');
                    this.classList.remove('border-gray-200', 'focus:border-batik-light', 'focus:ring-batik-light/10');
                } else {
                    this.classList.remove('border-red-300', 'focus:border-red-500', 'focus:ring-red-500/10');
                    this.classList.add('border-gray-200', 'focus:border-batik-light', 'focus:ring-batik-light/10');
                }
            });

            input.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.classList.remove('border-red-300', 'focus:border-red-500', 'focus:ring-red-500/10');
                    this.classList.add('border-gray-200', 'focus:border-batik-light', 'focus:ring-batik-light/10');
                }
            });
        });
    </script>
</body>
</html>
