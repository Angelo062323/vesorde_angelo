

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Student</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        colors: {
                            cyan: '#00fff7',
                        },
                        boxShadow: {
                            'neon': '0 0 16px #00fff7, 0 0 32px #00fff7',
                            'glass': '0 8px 32px 0 rgba(31, 38, 135, 0.37)',
                        },
                    }
                }
            }
        </script>
        <style>
            .glass {
                background: rgba(255,255,255,0.15);
                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
                backdrop-filter: blur(12px);
                border-radius: 20px;
                border: 1px solid rgba(255,255,255,0.18);
                transition: background 0.3s;
            }
            .dark .glass {
                background: rgba(30,41,59,0.6);
                border: 1px solid rgba(0,255,247,0.18);
            }
            .neon {
                color: #000000ff;
                text-shadow: 0 0 8px #00fff7, 0 0 16px #00fff7;
            }
            .input-glow:focus {
                box-shadow: 0 0 8px #00fff7;
                border-color: #00fff7;
            }
            .neon-btn {
                box-shadow: 0 0 8px #00fff7, 0 0 16px #00fff7;
                transition: transform 0.15s, box-shadow 0.15s;
            }
            .neon-btn:hover, .neon-btn:focus {
                transform: scale(1.05);
                box-shadow: 0 0 24px #00fff7, 0 0 48px #00fff7;
            }
            .input-glow {
                transition: box-shadow 0.2s, border-color 0.2s;
            }
            .toggle-switch {
                position: absolute;
                top: 2rem;
                right: 2rem;
                z-index: 10;
            }
        </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 via-slate-800 to-slate-700 dark:from-slate-950 dark:via-slate-900 dark:to-slate-800 transition-colors duration-300">
        <button id="themeToggle" class="toggle-switch bg-white dark:bg-slate-900 border border-cyan-400 dark:border-cyan-600 rounded-full px-4 py-2 shadow-md neon font-bold text-slate-900 dark:text-cyan-400 transition">🌙</button>
        <div class="glass max-w-md w-full mx-auto p-8 shadow-glass">
                <h2 class="text-3xl md:text-4xl font-extrabold neon mb-8 text-center tracking-wide">Add New Student</h2>
                <form action="/students/store" method="post" class="space-y-6">
                        <div>
                                <label class="block text-base md:text-lg font-semibold text-slate-700 dark:text-cyan-300 mb-2">Last Name</label>
                                <input type="text" name="last_name" class="input-glow w-full bg-transparent border-2 border-slate-300 dark:border-cyan-700 px-4 py-3 rounded-lg text-white placeholder-slate-400 dark:placeholder-cyan-500 focus:outline-none" placeholder="Enter last name" required>
                        </div>
                        <div>
                                <label class="block text-base md:text-lg font-semibold text-slate-700 dark:text-cyan-300 mb-2">First Name</label>
                                <input type="text" name="first_name" class="input-glow w-full bg-transparent border-2 border-slate-300 dark:border-cyan-700 px-4 py-3 rounded-lg text-white placeholder-slate-400 dark:placeholder-cyan-500 focus:outline-none" placeholder="Enter first name" required>
                        </div>
                        <div>
                                <label class="block text-base md:text-lg font-semibold text-slate-700 dark:text-cyan-300 mb-2">Email</label>
                                <input type="email" name="email" class="input-glow w-full bg-transparent border-2 border-slate-300 dark:border-cyan-700 px-4 py-3 rounded-lg text-white placeholder-slate-400 dark:placeholder-cyan-500 focus:outline-none" placeholder="Enter email" required>
                        </div>
                        <div class="flex flex-col md:flex-row justify-between gap-4 mt-8">
                                <a href="/students/index" class="neon-btn bg-slate-900 dark:bg-cyan-900 hover:bg-cyan-700 dark:hover:bg-cyan-800 text-white px-6 py-3 rounded-lg font-bold transition">⬅ Back</a>
                                <button type="submit" class="neon-btn bg-cyan-400 hover:bg-cyan-300 dark:bg-cyan-500 dark:hover:bg-cyan-400 text-white px-6 py-3 rounded-lg font-bold transition">💾 Add Student</button>
                        </div>
                </form>
        </div>
        <script>
            // Dark/Light mode toggle
            const themeToggle = document.getElementById('themeToggle');
            const html = document.documentElement;
            let darkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
            function setTheme(dark) {
                if (dark) {
                    html.classList.add('dark');
                    themeToggle.textContent = '☀️';
                } else {
                    html.classList.remove('dark');
                    themeToggle.textContent = '🌙';
                }
            }
            setTheme(darkMode);
            themeToggle.addEventListener('click', () => {
                darkMode = !html.classList.contains('dark');
                setTheme(darkMode);
            });
        </script>
</body>
</html>