<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" x-data="{ 
          darkMode: localStorage.getItem('darkMode') === 'true',
          rtl: localStorage.getItem('rtl') === 'true',
          sidebarOpen: true,
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
      ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?> - AutoReply Dashboard</title>

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
            background-size: 30px 30px;
            opacity: 0.05;
        }

        .glass-sidebar {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
            border-inline-end: 1px solid rgba(255, 255, 255, 0.05);
        }

        .dark .glass-card {
            background: rgba(15, 23, 42, 0.3);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.03);
        }

        .active-link {
            background: linear-gradient(to right, rgba(79, 70, 229, 0.2), transparent);
            border-inline-start: 3px solid #4f46e5;
        }
    </style>
</head>

<body class="antialiased bg-gray-50 dark:bg-slate-900 text-slate-800 dark:text-slate-200 transition-colors duration-300"
    :class="rtl ? 'font-arabic' : 'font-sans'">
    <!-- Decorative Background -->
    <div class="fixed inset-0 -z-10 bg-grid pointer-events-none"></div>

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-72 glass-sidebar flex-shrink-0 relative z-20 flex flex-col transition-all duration-300"
            :class="sidebarOpen ? '' : '-ml-72 rtl:-mr-72'">
            <!-- Logo area -->
            <div class="p-8">
                <div
                    class="text-2xl font-black bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-pink-500">
                    <span x-text="rtl ? 'أوتوـريبلاي' : 'AutoReply'"></span>
                </div>
            </div>

            <!-- Nav Links -->
            <nav class="flex-grow px-4 space-y-2 overflow-y-auto">
                <a href="/user/dashboard"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all hover:bg-white/5 <?php echo e(request()->is('user/dashboard') ? 'active-link' : 'text-gray-400 hover:text-white'); ?>">
                    <svg class="w-5 h-5 <?php echo e(request()->is('user/dashboard') ? 'text-indigo-500' : ''); ?>" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span class="text-sm font-bold" x-text="rtl ? 'لوحة القيادة' : 'Overview'"></span>
                </a>

                <div class="pt-6 pb-2 px-4 text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]"
                    x-text="rtl ? 'القنوات' : 'Channels'"></div>

                <a href="/user/automation"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all hover:bg-white/5 <?php echo e(request()->is('user/automation') ? 'active-link' : 'text-gray-400 hover:text-white'); ?> group">
                    <svg class="w-5 h-5 <?php echo e(request()->is('user/automation') ? 'text-pink-500' : 'group-hover:text-pink-500'); ?>"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span class="text-sm font-semibold" x-text="rtl ? 'ردود التعليقات' : 'Auto Comments'"></span>
                </a>

                <a href="/user/automation"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all hover:bg-white/5 <?php echo e(request()->is('user/automation') ? 'active-link' : 'text-gray-400 hover:text-white'); ?> group">
                    <svg class="w-5 h-5 <?php echo e(request()->is('user/automation') ? 'text-indigo-500' : 'group-hover:text-indigo-500'); ?>"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <span class="text-sm font-semibold" x-text="rtl ? 'الرد على الرسائل' : 'Inbox Automation'"></span>
                </a>

                <div class="pt-6 pb-2 px-4 text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]"
                    x-text="rtl ? 'الإدارة' : 'Management'"></div>

                <a href="/user/inbox"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all hover:bg-white/5 <?php echo e(request()->is('user/inbox') ? 'active-link' : 'text-gray-400 hover:text-white'); ?> group">
                    <svg class="w-5 h-5 <?php echo e(request()->is('user/inbox') ? 'text-pink-500' : ''); ?>" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5.882V19.297A1.711 1.711 0 019.346 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4.346a1.711 1.711 0 011.654 1.118zM21 6.741V21h-3.812A1.711 1.711 0 0115.535 19.297V5.882A1.711 1.711 0 0117.188 4H21a2 2 0 012 2v.741zM10 7H14" />
                    </svg>
                    <span class="text-sm font-semibold" x-text="rtl ? 'الانبوكس الموحد' : 'Unified Inbox'"></span>
                    <span class="ml-auto w-2 h-2 rounded-full bg-pink-500 animate-pulse"></span>
                </a>

                <a href="/user/accounts"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all hover:bg-white/5 <?php echo e(request()->is('user/accounts') ? 'active-link' : 'text-gray-400 hover:text-white'); ?>">
                    <svg class="w-5 h-5 <?php echo e(request()->is('user/accounts') ? 'text-blue-500' : ''); ?>" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="text-sm font-semibold" x-text="rtl ? 'الحسابات المتصلة' : 'My Accounts'"></span>
                </a>
            </nav>

            <!-- Bottom Profile -->
            <div class="p-6 mt-auto border-t border-white/5">
                <a href="/user/profile"
                    class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 hover:bg-white/10 transition-all group">
                    <div
                        class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-500 to-pink-500 flex items-center justify-center font-bold text-white shadow-lg shadow-indigo-500/20 group-hover:scale-110 transition-transform">
                        MA</div>
                    <div class="overflow-hidden">
                        <p class="text-sm font-bold truncate">Mohamed Ali</p>
                        <p class="text-[10px] text-gray-500 truncate" x-text="rtl ? 'خطة المحترفين' : 'Pro Plan'"></p>
                    </div>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-grow flex flex-col min-w-0">
            <!-- Header -->
            <header class="h-20 flex items-center justify-between px-8 border-b border-white/5 relative z-10">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = !sidebarOpen"
                        class="p-2 rounded-xl border border-white/5 hover:bg-white/5 transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h2 class="text-xl font-black" x-text="rtl ? 'مرحباً بك مجدداً' : 'Good Morning!'"></h2>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Notifications -->
                    <button
                        class="w-10 h-10 rounded-xl border border-white/5 flex items-center justify-center relative hover:bg-white/5 transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-pink-500 rounded-full"></span>
                    </button>
                    <!-- Settings -->
                    <button @click="toggleDark()"
                        class="w-10 h-10 rounded-xl border border-white/5 flex items-center justify-center hover:bg-white/5 transition-colors">
                        <svg x-show="!darkMode" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <svg x-show="darkMode" class="w-5 h-5 text-yellow-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </button>
                    <button @click="toggleRtl()"
                        class="h-10 px-4 rounded-xl border border-white/5 font-black text-xs hover:bg-white/5 transition-colors"
                        x-text="rtl ? 'English' : 'العربية'"></button>
                </div>
            </header>

            <!-- Scrollable Content -->
            <main class="flex-grow overflow-y-auto p-8 relative">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>
</body>

</html><?php /**PATH C:\Users\Marketation\Desktop\airespondsass\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>