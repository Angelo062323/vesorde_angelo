
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Student</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            cyan: '#00fff7',
                        },
                        boxShadow: {
                            'glass': '0 8px 32px 0 rgba(31, 38, 135, 0.18)',
                        },
                    }
                }
            }
        </script>
        <style>
            .glass {
                background: rgba(255,255,255,0.15);
                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
                backdrop-filter: blur(10px);
                border-radius: 18px;
                border: 1px solid rgba(255,255,255,0.18);
                transition: background 0.3s;
            }
            .input-glow:focus {
                box-shadow: 0 0 8px #00fff7;
                border-color: #00fff7;
            }
            .btn {
                transition: transform 0.15s, box-shadow 0.15s;
            }
            .btn:hover, .btn:focus {
                transform: scale(1.05);
                box-shadow: 0 0 16px #00fff7;
            }
        </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 via-slate-800 to-slate-700 transition-colors duration-300">
        <div class="glass max-w-lg w-full mx-auto p-8 shadow-glass">
                <h1 class="text-3xl font-extrabold text-cyan-400 mb-8 text-center tracking-wide">Edit Student</h1>
                <form action="/students/update/<?= $student['id'] ?>" method="POST" class="space-y-6">
            <div>
                <label class="block text-base font-semibold text-white mb-2">Last Name</label>
                <input type="text" name="last_name" value="<?= $student['last_name'] ?>" class="input-glow w-full bg-transparent border-2 border-slate-300 px-4 py-3 rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none transition" placeholder="Enter last name" required>
            </div>
            <div>
                <label class="block text-base font-semibold text-white mb-2">First Name</label>
                <input type="text" name="first_name" value="<?= $student['first_name'] ?>" class="input-glow w-full bg-transparent border-2 border-slate-300 px-4 py-3 rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none transition" placeholder="Enter first name" required>
            </div>
            <div>
                <label class="block text-base font-semibold text-white mb-2">Email</label>
                <input type="email" name="email" value="<?= $student['email'] ?>" class="input-glow w-full bg-transparent border-2 border-slate-300 px-4 py-3 rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none transition" placeholder="Enter email" required>
            </div>
                        <div class="flex justify-between mt-8">
                                <a href="/students/index" class="btn bg-slate-900 hover:bg-cyan-700 text-white px-6 py-3 rounded-lg font-bold transition">Back</a>
                                <button type="submit" class="btn bg-cyan-400 hover:bg-cyan-300 text-white px-6 py-3 rounded-lg font-bold transition">Update</button>
                        </div>
                </form>
        </div>
</body>
</html>