
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Students List</title>
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
            .table-glass {
                background: rgba(255,255,255,0.25);
                backdrop-filter: blur(4px);
                border-radius: 12px;
            }
            .dark .table-glass {
                background: rgba(30,41,59,0.7);
            }
        </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 via-slate-800 to-slate-700 dark:from-slate-950 dark:via-slate-900 dark:to-slate-800 transition-colors duration-300">
        <button id="themeToggle" class="toggle-switch bg-white dark:bg-slate-900 border border-cyan-400 dark:border-cyan-600 rounded-full px-4 py-2 shadow-md neon font-bold text-slate-900 dark:text-cyan-400 transition">🌙</button>
        <div class="glass max-w-5xl w-full mx-auto p-8 shadow-glass">
                <h1 class="text-3xl md:text-4xl font-extrabold neon mb-8 text-center tracking-wide">Students List</h1>
                <div class="flex flex-col md:flex-row gap-4 justify-center mb-6">
                        <a href="/students/create" class="neon-btn bg-cyan-400 hover:bg-cyan-300 text-white px-6 py-3 rounded-lg font-bold transition text-center">+ Add Student</a>
                        <a href="/students/delete_all"
                                onclick="return confirm('Are you sure you want to delete ALL records?')"
                                class="neon-btn bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-bold transition text-center">Delete All</a>
                </div>
                <div class="overflow-x-auto mt-6">
                        <table class="min-w-full table-glass border border-gray-300 dark:border-cyan-700">
                <thead>
                    <tr class="bg-gray-200 dark:bg-slate-800 text-left">
                        <th class="py-3 px-4 border-b text-white">ID</th>
                        <th class="py-3 px-4 border-b text-white">Last Name</th>
                        <th class="py-3 px-4 border-b text-white">First Name</th>
                        <th class="py-3 px-4 border-b text-white">Email</th>
                        <th class="py-3 px-4 border-b text-center text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($students)): ?>
                        <?php foreach ($students as $student): ?>
                            <tr class="hover:bg-cyan-50 dark:hover:bg-slate-900 transition">
                                <td class="py-3 px-4 border-b text-white"><?= $student['id'] ?></td>
                                <td class="py-3 px-4 border-b text-white"><?= $student['last_name'] ?></td>
                                <td class="py-3 px-4 border-b text-white"><?= $student['first_name'] ?></td>
                                <td class="py-3 px-4 border-b text-white"><?= $student['email'] ?></td>
                                <td class="py-3 px-4 border-b text-center">
                                    <a href="/students/edit/<?= $student['id'] ?>" 
                                         class="neon-btn bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg font-bold transition">Edit</a>
                                    <a href="/students/delete/<?= $student['id'] ?>" 
                                         onclick="return confirm('Are you sure you want to delete this student?')"
                                         class="neon-btn bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-bold transition ml-2">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-6 text-white">No students found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                        </table>
                </div>
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