<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" x-data="{ 
          darkMode: localStorage.getItem('darkMode') === 'true',
          rtl: localStorage.getItem('rtl') === 'true',
          toggleDark() { 
              this.darkMode = !this.darkMode; 
              localStorage.setItem('darkMode', this.darkMode); 
              if (this.darkMode) {
                  document.documentElement.classList.add('dark');
              } else {
                  document.documentElement.classList.remove('dark');
              }
          },
          toggleRtl() { 
              this.rtl = !this.rtl; 
              localStorage.setItem('rtl', this.rtl); 
              document.documentElement.dir = this.rtl ? 'rtl' : 'ltr';
          }
      }" x-init="
          if (darkMode) document.documentElement.classList.add('dark');
          document.documentElement.dir = rtl ? 'rtl' : 'ltr';
      }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title'); ?> - AutoReply Pro</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&family=Outfit:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <style>
        [x-cloak] {
            display: none !important;
        }

        .bg-grid {
            background-image: radial-gradient(circle, #4f46e5 1px, transparent 1px);
            background-size: 40px 40px;
            opacity: 0.1;
        }

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }

        .dark .glass-dark {
            background: transparent;
            backdrop-filter: blur(40px);
            border: 1px solid rgba(255, 255, 255, 0.02);
            box-shadow: 0 0 50px -10px rgba(79, 70, 229, 0.4);
        }
    </style>
</head>

<body class="antialiased bg-gray-50 dark:bg-slate-900 text-slate-800 dark:text-slate-200 transition-colors duration-300"
    :class="rtl ? 'font-arabic' : 'font-sans'">
    <!-- Decorative Background -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 bg-grid dark:opacity-[0.05]"></div>
        <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-indigo-500/20 rounded-full blur-[120px] opacity-50">
        </div>
        <div
            class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-purple-500/10 rounded-full blur-[120px] opacity-50">
        </div>
    </div>

    <!-- Language & Dark Mode Toggles (Fixed Corner) -->
    <div class="fixed top-6 right-6 lg:right-10 flex gap-4 z-50">
        <button @click="toggleDark()"
            class="w-10 h-10 rounded-full glass dark:glass-dark flex items-center justify-center hover:scale-110 transition-all">
            <svg x-show="!darkMode" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
            <svg x-show="darkMode" class="w-5 h-5 text-yellow-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 3v1m0 16v1m9-9h-1M4 9h-1m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
        </button>
        <button @click="toggleRtl()"
            class="h-10 px-4 rounded-full glass dark:glass-dark text-xs font-black uppercase tracking-widest hover:scale-110 transition-all">
            <span x-text="rtl ? 'English' : 'العربية'"></span>
        </button>
    </div>

    <main class="min-h-screen flex items-center justify-center p-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>

</html><?php /**PATH C:\Users\Marketation\Desktop\airespondsass\resources\views/layouts/auth.blade.php ENDPATH**/ ?>