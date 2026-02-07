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
      }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title'); ?> - Admin Control Center</title>

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
            background-image: radial-gradient(circle, #f43f5e 1px, transparent 1px);
            background-size: 35px 35px;
            opacity: 0.03;
        }

        .glass-sidebar {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(30px);
            border-inline-end: 1px solid rgba(255, 255, 255, 0.05);
        }

        .active-link-admin {
            background: linear-gradient(to right, rgba(244, 63, 94, 0.15), transparent);
            border-inline-start: 3px solid #f43f5e;
            color: white !important;
        }
    </style>
</head>

<body class="antialiased bg-gray-50 dark:bg-slate-950 text-slate-800 dark:text-slate-200 transition-colors duration-300"
    :class="rtl ? 'font-arabic' : 'font-sans'">
    <!-- Admin Decorative Background -->
    <div class="fixed inset-0 -z-10 bg-grid pointer-events-none"></div>

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-72 glass-sidebar flex-shrink-0 relative z-20 flex flex-col transition-all duration-300"
            :class="sidebarOpen ? '' : '-ml-72 rtl:-mr-72'">
            <!-- Logo area -->
            <div class="p-8">
                <div class="flex items-center gap-3">
                    <div
                        class="w-8 h-8 rounded-lg bg-rose-600 shadow-lg shadow-rose-600/30 flex items-center justify-center text-white font-black text-xs">
                        HQ</div>
                    <div
                        class="text-xl font-black bg-clip-text text-transparent bg-gradient-to-r from-rose-500 to-orange-500">
                        <span x-text="rtl ? 'لوحة الإدارة' : 'App Central'"></span>
                    </div>
                </div>
            </div>

            <!-- Admin Nav Links -->
            <nav class="flex-grow px-4 space-y-2 overflow-y-auto">
                <div class="pt-2 pb-2 px-4 text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]"
                    x-text="rtl ? 'الرئيسية' : 'Main Control'"></div>

                <a href="/admin/dashboard"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all hover:bg-white/5 <?php echo e(request()->is('admin/dashboard') ? 'active-link-admin' : 'text-gray-400 hover:text-white'); ?>">
                    <svg class="w-5 h-5 <?php echo e(request()->is('admin/dashboard') ? 'text-rose-500' : ''); ?>" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <span class="text-sm font-bold" x-text="rtl ? 'الإحصائيات العامة' : 'Global Overview'"></span>
                </a>

                <div class="pt-6 pb-2 px-4 text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]"
                    x-text="rtl ? 'المستخدمين' : 'Users Management'"></div>

                <a href="/admin/users"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all hover:bg-white/5 <?php echo e(request()->is('admin/users') ? 'active-link-admin' : 'text-gray-400 hover:text-white'); ?> group">
                    <svg class="w-5 h-5 <?php echo e(request()->is('admin/users') ? 'text-rose-500' : 'group-hover:text-rose-500'); ?>"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="text-sm font-semibold" x-text="rtl ? 'قائمة المشتركين' : 'Users List'"></span>
                </a>

                <a href="/admin/plans"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all hover:bg-white/5 <?php echo e(request()->is('admin/plans') ? 'active-link-admin' : 'text-gray-400 hover:text-white'); ?> group">
                    <svg class="w-5 h-5 <?php echo e(request()->is('admin/plans') ? 'text-rose-500' : 'group-hover:text-rose-500'); ?>"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    <span class="text-sm font-semibold" x-text="rtl ? 'خطط الاشتراك' : 'Pricing Plans'"></span>
                </a>

                <div class="pt-6 pb-2 px-4 text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]"
                    x-text="rtl ? 'الإعدادات المتقدمة' : 'AI & Systems'"></div>

                <a href="/admin/ai-providers"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all hover:bg-white/5 <?php echo e(request()->is('admin/ai-providers') ? 'active-link-admin' : 'text-gray-400 hover:text-white'); ?> group">
                    <svg class="w-5 h-5 <?php echo e(request()->is('admin/ai-providers') ? 'text-rose-500' : 'group-hover:text-rose-500'); ?>"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    <span class="text-sm font-semibold" x-text="rtl ? 'مفاتيح الـ AI' : 'AI Providers'"></span>
                </a>

                <a href="/admin/settings"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all hover:bg-white/5 <?php echo e(request()->is('admin/settings') ? 'active-link-admin' : 'text-gray-400 hover:text-white'); ?> group">
                    <svg class="w-5 h-5 <?php echo e(request()->is('admin/settings') ? 'text-rose-500' : 'group-hover:text-rose-500'); ?>"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="text-sm font-semibold" x-text="rtl ? 'الإعدادات العامة' : 'Site Settings'"></span>
                </a>
            </nav>

            <!-- Bottom Exit -->
            <div class="p-6 mt-auto border-t border-white/5">
                <a href="/user/dashboard"
                    class="flex items-center gap-4 p-4 rounded-2xl bg-rose-500/5 hover:bg-rose-500/10 transition-all group">
                    <div
                        class="w-10 h-10 rounded-xl bg-rose-600 flex items-center justify-center text-white shadow-lg shadow-rose-600/20 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-rose-500"
                            x-text="rtl ? 'خروج من الإدارة' : 'Exit Admin'"></p>
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
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-rose-500 animate-ping"></span>
                        <h2 class="text-xl font-black" x-text="rtl ? 'مركز التحكم الشامل' : 'Global Headquarters'"></h2>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Status Indicator -->
                    <div
                        class="hidden md:flex items-center gap-3 px-4 py-2 rounded-xl bg-white/5 border border-white/5">
                        <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest"
                            x-text="rtl ? 'حالة السيرفر' : 'System Status'"></span>
                        <span class="text-[10px] font-black text-green-500">OPTIMAL</span>
                    </div>

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

</html><?php /**PATH C:\Users\Marketation\Desktop\airespondsass\resources\views/layouts/admin.blade.php ENDPATH**/ ?>